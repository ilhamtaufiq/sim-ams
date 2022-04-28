<?php

namespace App\Http\Controllers;

use App\Models\OutputRealisasi;
use Illuminate\Http\Request;
use Alert;

class OutputRealisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $rules = [
            'pekerjaan_id' => 'required',
            'output_id' => 'required',
            // 'realisasi' => 'required',
            // 'satuan' => 'required',

        ];
    
        $customMessages = [
            'required' => ':attribute tidak boleh kosong '
        ];

        $attributeNames = array(
            'pekerjaan_id' => 'Kegiatan',
            'output_id' => 'Komponen',
            'realisasi' => 'Volume Realisasi',
            // 'satuan' => 'Satuan',
      
        );
    
        $this->validate($request, $rules, $customMessages, $attributeNames);
        $realisasi = $request->realisasi;   
        foreach($realisasi as $r)
        {
            $output = OutputRealisasi::updateOrCreate([
                'output_id' => $request->output_id,
                'pekerjaan_id' => $request->pekerjaan_id,
                'realisasi' => $r,
                'satuan' => $request->satuan,
            ]);    
        }
           
        Alert::success('Target Output', 'Data Target Output Berhasil Ditambahkan');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OutputRealisasi  $outputRealisasi
     * @return \Illuminate\Http\Response
     */
    public function show(OutputRealisasi $outputRealisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OutputRealisasi  $outputRealisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(OutputRealisasi $outputRealisasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OutputRealisasi  $outputRealisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OutputRealisasi $outputRealisasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OutputRealisasi  $outputRealisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(OutputRealisasi $outputRealisasi)
    {
        //
    }
}
