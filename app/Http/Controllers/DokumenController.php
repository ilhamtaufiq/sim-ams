<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;

use App\Models\Pekerjaan;


class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pekerjaan = Pekerjaan::get();
        return view('halaman.dokumen.index',[
            'pekerjaan' => $pekerjaan,
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
        $pekerjaan = Pekerjaan::get();
        
        return view('halaman.dokumen.tambah',[
            'pekerjaan' => $pekerjaan,
        ]);
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
        $request->validate([
            'files' => 'required',
          ]);
  
          if ($request->hasfile('files')) {
              $files = $request->file('files');
  
              foreach($files as $file) {
                  $name1 = $request->pekerjaan_id; 
                  $ket = $request->keterangan;
                  $name = $name1.'-'.$ket.'.'.$file->extension();
                  $path = $file->storeAs('dokumen', $name, 'public');
  
                  Dokumen::create([
                      'file' => $name,
                      'path' => '/storage/'.$path,
                      'pekerjaan_id' => $request->pekerjaan_id,
                      'keterangan' => $request->keterangan
                    ]);
              }
           }
  
          return back()->with('pesan', 'Dokumen Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dokumen  $dokumen
     * @return \Illuminate\Http\Response
     */
    public function show(Dokumen $dokumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dokumen  $dokumen
     * @return \Illuminate\Http\Response
     */
    public function edit(Dokumen $dokumen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dokumen  $dokumen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dokumen $dokumen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dokumen  $dokumen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dokumen $dokumen)
    {
        //
    }
}
