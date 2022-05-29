<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;

use App\Models\Kegiatan;
use App\Models\Kecamatan;
use App\Models\Foto;
use App\Models\Dokumen;
use App\Models\Tfl;
use App\Models\OutputRealisasi;
use App\Models\Output;



use Auth;
use Alert;


use DateTime;

class PekerjaanController extends Controller
{
    
    public function tfl_index()
    {
        //Get User ID
        $userId = Auth::id();
        if (Auth::user()->roles->first()->name == 'admin') {
            # Admin...
            $data = Tfl::with('pekerjaan.kegiatan','pekerjaan.output','pekerjaan.realisasi_output')->get();
        } else {
            # TFL
            $data = Tfl::with('pekerjaan.kegiatan','pekerjaan.output','pekerjaan.realisasi_output')->where('user_id',$userId)->get();
        }
        $realisasi = OutputRealisasi::get();
        foreach($data as $d)  
        return view('pages.tfl.home',[
            'data' => $data,
            'title' => 'Sanitasi DAK',
            'realisasi_output' => $d->pekerjaan->realisasi_output,
            'realisasi' => $realisasi
        ]);

    }

    public function tfl_show($pekerjaan)
    {
        $userId = Auth::id();

        if (Auth::user()->roles->first()->name == 'admin') {
            # Role Admin
            $tfl = Tfl::with('pekerjaan.kegiatan','pekerjaan.output','pekerjaan.realisasi_output')->where('pekerjaan_id',$pekerjaan)->first();
        } else {
            # Role TFL
            $tfl = Tfl::with('pekerjaan.kegiatan','pekerjaan.output','pekerjaan.realisasi_output')->where('user_id',$userId)
            ->where('pekerjaan_id',$pekerjaan)->first();
        }
        $pekerjaan_id = $pekerjaan;
        $foto = Foto::where('pekerjaan_id',$pekerjaan_id)->get();
        $dokumen = Dokumen::where('pekerjaan_id',$pekerjaan_id)->get();
        if( empty($tfl)){
            return redirect(url('/tfl') );
        }else{
            if (!is_null($tfl->pekerjaan->detail)) {
                # code...
                $mulai = new DateTime($tfl->pekerjaan->detail->tgl_mulai);
                $selesai = new DateTime($tfl->pekerjaan->detail->tgl_selesai);
                $interval = $mulai->diff($selesai);
                $days = $interval->format('%a')." Hari Kalender";
                return view('pages.tfl.info', compact('pekerjaan'),[
                    'title' => $tfl->pekerjaan->nama_pekerjaan,
                    'foto' => $foto,
                    'dokumen' => $dokumen,
                    'days' => $days,
                    'pagu' => $tfl->pekerjaan->pagu,
                    'tfl' => $tfl,
    
                ]);
    
            } else {
                # code...
                return view('pages.tfl.info', compact('pekerjaan'),[
                    'title' => $tfl->pekerjaan->nama_pekerjaan,
                    'foto' => $foto,
                    'dokumen' => $dokumen,
                    'pagu' => $tfl->pekerjaan->pagu,
                    'tfl' => $tfl,
    
                    // 'days' => $days,
    
    
                ]);
    
            }     
        }

    }   

    public function kegiatan($id)
    {
        //Air Minum
        $data = Pekerjaan::with('kegiatan','desa','kec')->where('program_id',$id)->get();
        $kec = Kecamatan::get();
        $kegiatan = kegiatan::where('id', $id)->get('sub_kegiatan');
        return view('pages.pekerjaan.index',[
            'data' => $data,
            'title' => $kegiatan[0]->sub_kegiatan,
            'kec' => $kec
        ]);

    }

    //custom
    public function getPekerjaan($keg_id)
    {
        $data = Pekerjaan::with('detail','paket_pekerjaan')->get()
        ->where('program_id', $keg_id)->where('detail', null)->whereNotNull('paket_pekerjaan');
        // ->pluck('nama_pekerjaan', 'id');
        return response()->json($data);
    }

    public function getPaket($keg_id)
    {
        $data = Pekerjaan::with('paket_pekerjaan')->get()
        ->where('program_id', $keg_id)->where('paket_pekerjaan', null);
        // ->pluck('nama_pekerjaan', 'id');

        return response()->json($data);
    }

    public function ubahPekerjaan(Request $request)
    {
        $data = Pekerjaan::with('kegiatan','desa','kec')->where('id' , $request->id)->first();

        return response()->json($data, 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //wtf
        $kec = Kecamatan::get();

        $data = Pekerjaan::with('kegiatan','desa','kec')->get();
        return view('pages.pekerjaan.index',[
            'title' => 'Bidang Air Minum dan Sanitasi',
            'data' => $data,
            'kec' => $kec
        ]);

    }

    public function pekerjaan($tahun)
    {
        //wtf
        $data = Pekerjaan::with('kegiatan','desa','kec')->where('tahun_anggaran',$tahun)->get();
        // dd($data);
        return view('halaman.pekerjaan.index',[
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
        $keg = Kegiatan::get();
        $kec = Kecamatan::get();
        return view('halaman.pekerjaan.tambah',[
            'keg' => $keg,
            'kec' => $kec
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

        $rules = [
            'program_id' => 'required',
            'nama_pekerjaan' => 'required|unique:db_pekerjaan,nama_pekerjaan',
            'kecamatan_id' => 'required',
            'desa_id' => 'required',
            'pagu' => 'required',
            'tahun_anggaran' => 'required',

        ];
    
        $customMessages = [
            'required' => ':attribute tidak boleh kosong '
        ];

        $attributeNames = array(
            'program_id' => 'Kegiatan',
            'nama_pekerjaan' => 'Nama Pekerjaan',
            'kecamatan_id' => 'Kecamatan',
            'desa_id' => 'Desa',
            'pagu' => 'Pagu',  
            'tahun_anggaran' => 'Tahun Anggaran',
      
        );
    
        $this->validate($request, $rules, $customMessages, $attributeNames);
        $string = ['Rp',',00','.'];
        $pekerjaan = Pekerjaan::firstOrCreate([
            'program_id' => $request->program_id,
            'nama_pekerjaan' => $request->nama_pekerjaan,
            'kecamatan_id' => $request->kecamatan_id,
            'desa_id' => $request->desa_id,
            'pagu' => str_replace($string, '', $request->pagu),
            'tahun_anggaran' => $request->tahun_anggaran,
        ]);     
        Alert::success('Kegiatan', 'Data Kegiatan Berhasil Ditambahkan');

        return redirect('pekerjaan');
    }
  
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pekerjaan $pekerjaan)
    {
        //
        $pekerjaan = Pekerjaan::with('kec','desa','kegiatan','detail','detail.realisasi','dokumen')->where('id',$pekerjaan->id)->first();
        $pekerjaan_id = $pekerjaan->id;
        $foto = Foto::where('pekerjaan_id',$pekerjaan_id)->get();
        $dokumen = Dokumen::where('pekerjaan_id',$pekerjaan_id)->get();
        $output = Output::where('pekerjaan_id',$pekerjaan_id)->get();

        if (!is_null($pekerjaan->detail)) {
            # code...
            $mulai = new DateTime($pekerjaan->detail->tgl_mulai);
            $selesai = new DateTime($pekerjaan->detail->tgl_selesai);
            $interval = $mulai->diff($selesai);
            $days = $interval->format('%a')." Hari Kalender";
            return view('pages.pekerjaan.info', compact('pekerjaan'),[
                'title' => $pekerjaan->nama_pekerjaan,
                'foto' => $foto,
                'dokumen' => $dokumen,
                'days' => $days,
                'output' => $output,

            ]);

        } else {
            # code...
            return view('pages.pekerjaan.info', compact('pekerjaan'),[
                'title' => $pekerjaan->nama_pekerjaan,
                'foto' => $foto,
                'dokumen' => $dokumen,
                'output' => $output,
                // 'days' => $days,
            ]);

        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pekerjaan $pekerjaan)
    {
        //
        $keg = Kegiatan::get();
        $kec = Kecamatan::get();
        // $pekerjaan = Pekerjaan::with('kec','desa','kegiatan')->first();
        return view('halaman.pekerjaan.edit', compact('pekerjaan', 'keg','kec'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pekerjaan $pekerjaan)
    {
        $rules = [
            'program_id' => 'required',
            'nama_pekerjaan' => 'required',
            'kecamatan_id' => 'required',
            'desa_id' => 'required',
            'pagu' => 'required',
            'tahun_anggaran' => 'required',
        ];
    
        $customMessages = [
            'required' => ':attribute tidak boleh kosong '
        ];

        $attributeNames = array(
            'program_id' => 'Kegiatan',
            'nama_pekerjaan' => 'Nama Pekerjaan',
            'kecamatan_id' => 'Kecamatan',
            'desa_id' => 'Desa',
            'pagu' => 'Pagu',        
            'tahun_anggaran' => 'Tahun Anggaran',
        );
    
        $this->validate($request, $rules, $customMessages, $attributeNames);
        $string = ['Rp',',00','.'];

        $pekerjaan->update([
            'program_id' => $request->program_id,
            'nama_pekerjaan' => $request->nama_pekerjaan,
            'kecamatan_id' => $request->kecamatan_id,
            'desa_id' => $request->desa_id,
            'pagu' => str_replace($string, '', $request->pagu),
            'tahun_anggaran' => $request->tahun_anggaran,
        ]);
    
        return redirect()->route('pekerjaan')->with('pesan', 'Data Pekerjaan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pekerjaan  $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pekerjaan $pekerjaan)
    {
        //
        $pekerjaan->delete();
        Alert::success('Kegiatan', 'Data Kegiatan Berhasil Dihapus');

        return redirect('pekerjaan');
    }
}
