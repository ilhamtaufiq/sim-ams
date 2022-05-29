<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use Alert;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $data = Paket::with('pekerjaan')->get();
        $title = "Paket Pekerjaan";
        return view('pages.pekerjaan.paket',compact('data','title'));
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
        //tambah Paket
        $rules = [
            'pekerjaan_id' => 'required',
            'nama_pelaksana' => 'required',
            'alamat_pelaksana' => 'required',
            'npwp_pelaksana' => 'required',
            'tahap' => 'required',



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
            'tahap' => 'Tahap Pelaksanaan',   
  
        );
    
        $valid = $this->validate($request, $rules, $customMessages, $attributeNames);


        $pekerjaan = Paket::firstOrCreate([
            'pekerjaan_id' => $request->pekerjaan_id,
            'nama_pelaksana' => $request->nama_pelaksana,
            'npwp_pelaksana' => $request->npwp_pelaksana,
            'alamat_pelaksana' => $request->alamat_pelaksana,
            'tahap' => $request->tahap,
            'aspirasi' => $request->aspirasi,
            'keterangan' => $request->keterangan,

        ]);     
        Alert::success('Paket Pekerjaan', 'Data Paket Pekerjaan Berhasil Ditambahkan');
        return redirect('paket');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paket  $Paket
     * @return \Illuminate\Http\Response
     */
    public function show(Paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paket  $Paket
     * @return \Illuminate\Http\Response
     */
    public function edit(Paket $paket)
    {
        //
    }

    public function edit_paket(Request $request)
    {
        $data = Paket::with('pekerjaan','pekerjaan.kegiatan')->where('id' , $request->id)->first();

        return response()->json($data, 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Paket  $Paket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paket $paket)
    {
        //
        $rules = [
            'pekerjaan_id' => 'required',
            'nama_pelaksana' => 'required',
            'alamat_pelaksana' => 'required',
            'npwp_pelaksana' => 'required',
            'tahap' => 'required',



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
            'tahap' => 'Tahapan Pelaksanaan'
        );
    
        $valid = $this->validate($request, $rules, $customMessages, $attributeNames);


        $paket->update([
            'pekerjaan_id' => $request->pekerjaan_id,
            'nama_pelaksana' => $request->nama_pelaksana,
            'npwp_pelaksana' => $request->npwp_pelaksana,
            'alamat_pelaksana' => $request->alamat_pelaksana,
            'aspirasi' => $request->aspirasi,
            'tahap' => $request->tahap,
            'keterangan' => $request->keterangan,
        ]);     
        Alert::success('Paket Pekerjaan', 'Data Paket Pekerjaan Berhasil Diubah');
        return redirect('paket');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paket  $Paket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paket $paket)
    {
        $paket->delete();
        Alert::success('Paket Pekerjaan', 'Data Paket Pekerjaan Berhasil Dihapus');
        return redirect('paket');
    }
}
