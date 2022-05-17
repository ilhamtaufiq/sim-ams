<?php

namespace App\Http\Controllers;

use App\Models\Aspirasi;
use Illuminate\Http\Request;
use Alert;

class AspirasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data = Aspirasi::with('pekerjaan')->get();
        $title = "Aspirasi";
        return view('pages.pekerjaan.aspirasi',compact('data','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //tambah aspirasi
        $rules = [
            'pekerjaan_id' => 'required',
            'nama_pelaksana' => 'required',
            'alamat_pelaksana' => 'required',
            'npwp_pelaksana' => 'required',



        ];
    
        $customMessages = [
            'required' => ':attribute tidak boleh kosong ',
            // 'unique'    => ':attribute sudah digunakan',

        ];
        $attributeNames = array(
            'pekerjaan_id' => 'Pekerjaan',
            'nama_pelaksana' => 'Nama Pelaksana',
            'alamat_pelaksana' => 'Alamat Pelaksana',
            'npwp_pelaksana' => 'NPWP Pelaksana',   
        );
    
        $valid = $this->validate($request, $rules, $customMessages, $attributeNames);


        $pekerjaan = Aspirasi::firstOrCreate([
            'pekerjaan_id' => $request->pekerjaan_id,
            'nama_pelaksana' => $request->nama_pelaksana,
            'npwp_pelaksana' => $request->npwp_pelaksana,
            'alamat_pelaksana' => $request->alamat_pelaksana,
            'keterangan' => $request->keterangan,
        ]);     
        Alert::success('Aspirasi', 'Data Kegiatan Aspirasi Berhasil Ditambahkan');

        return redirect('aspirasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aspirasi  $aspirasi
     * @return \Illuminate\Http\Response
     */
    public function show(Aspirasi $aspirasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aspirasi  $aspirasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Aspirasi $aspirasi)
    {
        //
    }

    public function edit_aspirasi(Request $request)
    {
        $data = Aspirasi::with('pekerjaan','pekerjaan.kegiatan')->where('id' , $request->id)->first();

        return response()->json($data, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aspirasi  $aspirasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aspirasi $aspirasi)
    {
        //
        $rules = [
            'pekerjaan_id' => 'required',
            'nama_pelaksana' => 'required',
            'alamat_pelaksana' => 'required',
            'npwp_pelaksana' => 'required',



        ];
    
        $customMessages = [
            'required' => ':attribute tidak boleh kosong ',
            // 'unique'    => ':attribute sudah digunakan',

        ];
        $attributeNames = array(
            'pekerjaan_id' => 'Pekerjaan',
            'nama_pelaksana' => 'Nama Pelaksana',
            'alamat_pelaksana' => 'Alamat Pelaksana',
            'npwp_pelaksana' => 'NPWP Pelaksana',   
        );
    
        $valid = $this->validate($request, $rules, $customMessages, $attributeNames);


        $aspirasi->update([
            'pekerjaan_id' => $request->pekerjaan_id,
            'nama_pelaksana' => $request->nama_pelaksana,
            'npwp_pelaksana' => $request->npwp_pelaksana,
            'alamat_pelaksana' => $request->alamat_pelaksana,
            'keterangan' => $request->keterangan,
        ]);     
        Alert::success('Aspirasi', 'Data Kegiatan Aspirasi Berhasil Diubah');

        return redirect('aspirasi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aspirasi  $aspirasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aspirasi $aspirasi)
    {
        $aspirasi->delete();
        Alert::success('Aspirasi', 'Data Kegiatan Aspirasi Berhasil Dihapus');
        return redirect('aspirasi');
    }
}
