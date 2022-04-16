<?php

namespace App\Http\Controllers;

use App\Models\Kontrak;
use Illuminate\Http\Request;
use App\Models\Pekerjaan;
use Alert;

class KontrakController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Data Kontrak
        $data = Kontrak::with('pekerjaan.kegiatan')->get();
        $title = 'Data Kontrak';
        // dd($data);
        return view('pages.kontrak.index',compact('data','title'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Tambah data kontrak
        $pekerjaan = Pekerjaan::with('detail')->get();
        return view('halaman.kontrak.tambah', compact('pekerjaan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $s = Pekerjaan::where('id',$request->pekerjaan_id)->pluck('pagu')->first();
        // $s = $kontrak->pagu;
        $rules = [
            'program_id' => 'required',
            'pekerjaan_id' => 'required',
            'harga_kontrak' => 'required|numeric|max:'.$s,
            'no_spk' => 'required|unique:db_kontrak,no_spk',
            'tgl_spk' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'nama_pelaksana' => 'required',
            'nama_pengawas' => 'required',



        ];
    
        $customMessages = [
            'required' => ':attribute tidak boleh kosong '
        ];
        $string = ['Rp',',00','.'];
        $attributeNames = array(
            'program_id' => 'Kegiatan',
            'pekerjaan_id' => 'Pekerjaan',
            'harga_kontrak' => 'Harga Kontrak',
            'no_spk' => 'Nomor SPK',
            'tgl_spk' => 'Tanggal SPK',
            'tgl_mulai' => 'Tanggal Mulai',
            'tgl_selesai' => 'Tanggal Selesai',
            'nama_pelaksana' => 'Nama Pelaksana',
            'nama_pengawas' => 'Nama Pengawas',        
        );
    
        $valid = $this->validate($request, $rules, $customMessages, $attributeNames);

        // if ($valid->fails()) {
        //     return Redirect::to('/kontrak/create')
        //     ->withErrors($valid)
        //     ->withInput();
        // } else {
        // }

        $pekerjaan = Kontrak::firstOrCreate([
            'program_id' => $request->program_id,
            'pekerjaan_id' => $request->pekerjaan_id,
            'harga_kontrak' => str_replace($string, '', $request->harga_kontrak),
            'no_spk' => $request->no_spk,
            'tgl_spk' => $request->tgl_spk,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'nama_pelaksana' => $request->nama_pelaksana,
            'nama_pengawas'=>$request->nama_pengawas,
        ]);     
        Alert::success('Kontrak', 'Data Kontrak Berhasil Ditambahkan');

        return redirect('kontrak');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function cover(Kontrak $kontrak)
    {
        //
        return view('halaman.print.coverkontrak',compact('kontrak'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function show(Kontrak $kontrak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function edit(Kontrak $kontrak)
    {
        //
        $kontrak = Kontrak::with('pekerjaan','kegiatan')->first();
        // dd($kontrak);
        return view('halaman.kontrak.edit', compact('kontrak'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kontrak $kontrak)
    {
        //edit
        $rules = [
            'program_id' => 'required',
            'pekerjaan_id' => 'required',
            'harga_kontrak' => 'required',
            'no_spk' => 'required',
            'tgl_spk' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'nama_pelaksana' => 'required',
            'nama_pengawas' => 'required',



        ];
    
        $customMessages = [
            'required' => ':attribute tidak boleh kosong '
        ];

        $attributeNames = array(
            'program_id' => 'Kegiatan',
            'pekerjaan_id' => 'Pekerjaan',
            'harga_kontrak' => 'Harga Kontrak',
            'no_spk' => 'Nomor SPK',
            'tgl_spk' => 'Tanggal SPK',
            'tgl_mulai' => 'Tanggal Mulai',
            'tgl_selesai' => 'Tanggal Selesai',
            'nama_pelaksana' => 'Nama Pelaksana',
            'nama_pengawas' => 'Nama Pengawas',        
        );
    
        $this->validate($request, $rules, $customMessages, $attributeNames);
        $kontrak->update($request->all());
        Alert::success('Kontrak', 'Data Kontrak Berhasil Diubah');
        return redirect('kontrak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kontrak  $kontrak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kontrak $kontrak)
    {
        //
        $kontrak->delete();
        Alert::success('Kontrak', 'Data Kontrak Berhasil Dihapus');
        return redirect('kontrak');
    }
}
