<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $foto = Foto::get();
        return view('halaman.foto.index',compact('foto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('halaman.foto.tambah');
    }

    public function progress(Pekerjaan $pekerjaan)
    {
        //

        return view('halaman.foto.progress', compact('pekerjaan'));
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
            'images' => 'required',
          ]);
  
          if ($request->hasfile('images')) {
              $images = $request->file('images');
  
              foreach($images as $image) {
                  $name1 = $request->pekerjaan_id; 
                //   $name2 = $image->getClientOriginalName();
                  $name = $name1.'-'.uniqid().'.'.$image->extension();
                  $path = $image->storeAs('uploads', $name, 'public');
  
                  Foto::create([
                      'nama' => $name,
                      'path' => '/storage/'.$path,
                      'pekerjaan_id' => $request->pekerjaan_id,
                      'lat' => $request->lat,
                      'long' => $request->long,
                      'keterangan' => $request->keterangan


                    ]);
              }
           }
  
          return back()->with('success', 'Images uploaded successfully');
    }
    public function storeFoto(Request $request)
    {
        //
        $request->validate([
            'images' => 'required',
            'pekerjaan_id' => 'required',
        ]);

        if ($request->hasfile('images')) {
            $images = $request->file('images');
            $p = 1;
            foreach($images as $image) {

            $name1 = $request->pekerjaan_id; 
            $progress = $p++;
            $name = $name1.'-'.uniqid().'.'.$image->extension();
            $path = $image->storeAs('foto', $name, 'public');
  
                Foto::create([
                    'nama' => $name,
                    'path' => '/storage/'.$path,
                    'pekerjaan_id' => $request->pekerjaan_id,
                    'keterangan' => $request->keterangan,
                    'progress' => $request->progress[$progress],
                ]);
            }
        }
  
        return back()->with('success', 'Images uploaded successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function show(Foto $foto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function edit(Foto $foto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Foto $foto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Foto $foto)
    {
        //
    }
}
