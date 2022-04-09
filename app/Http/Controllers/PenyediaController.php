<?php

namespace App\Http\Controllers;

use App\Models\Penyedia;
use Illuminate\Http\Request;

class PenyediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Penyedia::get();
        return view('halaman.penyedia.index',[
           'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('halaman.penyedia.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $rules = [
            'nama' => 'required|unique:db_penyedia,nama',
            'npwp' => 'required',

        ];
    
        $customMessages = [
            'required' => ':attribute tidak boleh kosong '
        ];

        $attributeNames = array(
            'nama' => 'Nama Penyedia',
            'npwp' => 'NPWP Penyedia',
        );
    
        $this->validate($request, $rules, $customMessages, $attributeNames);
        $file_sbu = $request->nama.'-SBU'.'.'.$request->file('sbu')->extension();
        $path_sbu = $request->file('sbu')->storeAs('dok_penyedia', $file_sbu, 'public');

        $file_iujk = $request->nama.'-IUJK'.'.'.$request->file('iujk')->extension();
        $path_iujk = $request->file('iujk')->storeAs('dok_penyedia', $file_iujk, 'public');
        
        
        $penyedia = Penyedia::firstOrCreate([
            'sbu' => '/storage/'.$path_sbu,
            'iujk' => '/storage/'.$path_iujk,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_tlp' => $request->no_tlp,
            'npwp' => $request->npwp,

        ]);     
        return redirect()->route('penyedia')->with('pesan', 'Data Penyedia Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penyedia  $penyedia
     * @return \Illuminate\Http\Response
     */
    public function show(Penyedia $penyedia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penyedia  $penyedia
     * @return \Illuminate\Http\Response
     */
    public function edit(Penyedia $penyedia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penyedia  $penyedia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penyedia $penyedia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penyedia  $penyedia
     * @return \Illuminate\Http\Response
     */
    public function destroy($penyedia)
    {
        //
        $penyedia = Penyedia::find($penyedia);
        $penyedia->delete();
        return redirect()->route('penyedia')->with('pesan', 'Data Penyedia Berhasil Dihapus ');
    }
}
