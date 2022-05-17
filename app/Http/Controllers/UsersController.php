<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Alert;
use Auth;

use App\Models\Tfl;

use App\Models\Pekerjaan;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:admin']);
    }
    /**
     * Display all users
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        // $userId = Auth::id();
        $users = User::latest()->with('tfl.pekerjaan')->paginate(10);
        $pekerjaan = Pekerjaan::with('tfl')->get()->where('program_id',1);
        $title = "Daftar Pengguna";

        return view('acl.users.index', compact('users','title','pekerjaan'));
    }
  
    /**
     * Show form for creating user
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        return view('acl.users.create');
    }

    /**
     * Store a newly created user
     * 
     * @param User $user
     * @param StoreUserRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, StoreUserRequest $request) 
    {
        //For demo purposes only. When creating user or inviting a user
        // you should create a generated random password and email it to the user
        $user->create(array_merge($request->validated(), [
            'password' => 'password' 
        ]));

        return redirect()->route('users.index')
            ->withSuccess(__('User created successfully.'));
    }

    public function lokasi(Request $request)
    {
        $rules = [
            'user_id' => 'required',
            'pekerjaan_id' => 'required|unique:db_tfl,pekerjaan_id',        
        ];
        $customMessages = [
            'required' => ':attribute tidak boleh kosong ',
            'unique'    => ':attribute sudah digunakan',
        ];
        $attributeNames = array(
            'user_id' => 'Pengguna',
            'pekerjaan_id' => 'Pekerjaan',      
        );
        $lokasi = $request->pekerjaan_id;

        foreach ($lokasi as $l)
        $pekerjaan = Tfl::firstOrCreate([
            'user_id' => $request->user_id,
            'pekerjaan_id' => $l
        ]);     
        Alert::success('Lokasi', 'Data Lokasi TFL Berhasil Ditambahkan');

        return redirect('users');
    }

    /**
     * Show user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) 
    {
        return view('acl.users.show', [
            'user' => $user
        ]);
    }

    /**
     * Edit user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) 
    {
        return view('acl.users.edit', [
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            'roles' => Role::latest()->get()
        ]);
    }

    /**
     * Update user data
     * 
     * @param User $user
     * @param UpdateUserRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function update(User $user, UpdateUserRequest $request) 
    {
        $user->update($request->validated());

        $user->syncRoles($request->get('role'));

        return redirect()->route('users.index')
            ->withSuccess(__('User updated successfully.'));
    }

    /**
     * Delete user data
     * 
     * @param User $user
     * 
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) 
    {
        $user->delete();

        return redirect()->route('users.index')
            ->withSuccess(__('User deleted successfully.'));
    }
}