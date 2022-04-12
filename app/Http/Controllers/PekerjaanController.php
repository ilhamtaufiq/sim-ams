<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;

use App\Models\Kegiatan;
use App\Models\Kecamatan;
use App\Models\Foto;
use App\Models\Dokumen;
use App\Models\Tfl;
use Auth;


use DateTime;

class PekerjaanController extends Controller
{
    
    public function tfl_index()
    {
        //TFL
        $userId = Auth::id();
        $data = Tfl::with('pekerjaan.kegiatan')->where('user_id',$userId)->get();
        return view('tfl.home',[
            'data' => $data,
            'title' => 'Sanitasi DAK'
        ]);

    }

    public function am_index()
    {
        //Air Minum
        $data = Pekerjaan::with('kegiatan','desa','kec')->where('program_id',[3,4,5])->get();
        return view('am.index',[
            'data' => $data,
            'title' => 'Air Minum'
        ]);

    }

    //custom
    public function getPekerjaan($keg_id)
    {
        $data = Pekerjaan::with('detail')->get()
        ->where('program_id', $keg_id);
        // ->pluck('nama_pekerjaan', 'id');

        return response()->json($data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //wtf
        $data = Pekerjaan::with('kegiatan','desa','kec')->get();
        return view('pages.pekerjaan.index',[
            'title' => 'Bidang Air Minum dan Sanitasi',
            'data' => $data
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
        return redirect()->route('pekerjaan')->with('pesan', 'Data Pekerjaan Berhasil Ditambahkan');
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
        $pekerjaan = Pekerjaan::with('kec','desa','kegiatan','detail.realisasi','dokumen')->where('id',$pekerjaan->id)->first();
        $pekerjaan_id = $pekerjaan->id;
        $foto = Foto::where('pekerjaan_id',$pekerjaan_id)->get();
        $dokumen = Dokumen::where('pekerjaan_id',$pekerjaan_id)->get();
        // dd($pekerjaan);

        if (!is_null($pekerjaan->detail)) {
            # code...
            $mulai = new DateTime($pekerjaan->detail->tgl_mulai);
            $selesai = new DateTime($pekerjaan->detail->tgl_selesai);
            $interval = $mulai->diff($selesai);
            $days = $interval->format('%a')." Hari Kalender";
            return view('halaman.pekerjaan.detail', compact('pekerjaan'),[
                'foto' => $foto,
                'dokumen' => $dokumen,
                'days' => $days,

            ]);

        } else {
            # code...
            return view('halaman.pekerjaan.detail', compact('pekerjaan'),[
                'foto' => $foto,
                'dokumen' => $dokumen,
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
        return redirect()->route('pekerjaan')->with('pesan', 'Data Pekerjaan Berhasil Dihapus ');
    }
}
