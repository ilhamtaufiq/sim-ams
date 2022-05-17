<?php

namespace App\Http\Controllers;

use App\Models\Output;
use Illuminate\Http\Request;
use Alert;


class OutputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'komponen' => 'required',
            'volume' => 'required',
            'satuan' => 'required',

        ];
    
        $customMessages = [
            'required' => ':attribute tidak boleh kosong '
        ];

        $attributeNames = array(
            'pekerjaan_id' => 'Kegiatan',
            'komponen' => 'Komponen',
            'volume' => 'Volume',
            'satuan' => 'Satuan',
      
        );
    
        $this->validate($request, $rules, $customMessages, $attributeNames);
        $output = Output::firstOrCreate([
            'pekerjaan_id' => $request->pekerjaan_id,
            'komponen' => $request->komponen,
            'volume' => $request->volume,
            'satuan' => $request->satuan,
        ]);     
        Alert::success('Target Output', 'Data Target Output Berhasil Ditambahkan');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Output  $output
     * @return \Illuminate\Http\Response
     */
    public function show(Output $output)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Output  $output
     * @return \Illuminate\Http\Response
     */
    public function edit(Output $output)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Output  $output
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Output $output)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Output  $output
     * @return \Illuminate\Http\Response
     */
    public function destroy(Output $output)
    {
        //
    }
}
