<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Variabel Statistik
        $pekerjaan = Pekerjaan::with('kegiatan')->get();
        $total_pagu = $pekerjaan->sum('pagu');
        $total_pekerjaan = $pekerjaan->count();
        // Kurang dari sejuta
        if ($total_pagu < 1000000) {
            $pagu = number_format($number);
        // Kurang dari semiliar
        } else if ($total_pagu < 1000000000) {
            $pagu = number_format($total_pagu / 1000000, 1, ',', '') . ' Juta';
        } else {
        // Sama dengan atau lebih satu miliar
            $pagu = number_format($total_pagu / 1000000000, 1, ',', '') . ' Miliar';
        };
        //  dd($pekerjaan);
        $am1 = Pekerjaan::where('program_id', '=', 3)->get();
        $am2 = Pekerjaan::where('program_id', '=', 4)->get();
        $am3 = Pekerjaan::where('program_id', '=', 5)->get();
        $sandak = Pekerjaan::where('program_id','=',1)->get(); 
        $mck = Pekerjaan::where('program_id','=',2)->get();        
       
        return view ('pages.dashboard',[
            'title' => 'Dashboard',
            'am1' => $am1,
            'am2' => $am2,
            'am3' => $am3,
            'sandak'=> $sandak,
            'mck'=> $mck,
            'pagu' => $pagu,
            'total_pagu' => $total_pagu,
            'total_pekerjaan' => $total_pekerjaan
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
