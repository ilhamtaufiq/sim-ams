<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    use HasFactory;
    protected $table = "db_kontrak";
    protected $fillable =['program_id','pekerjaan_id','harga_kontrak','no_spk','tgl_spk','tgl_mulai','tgl_selesai','nama_pelaksana','nama_pengawas'];

    /**
     * Get the user associated with the Kontrak
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pekerjaan()
    {
        return $this->hasOne(Pekerjaan::class, 'id', 'pekerjaan_id');
    }
    
    /**
     * Get the user associated with the Kontrak
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kegiatan()
    {
        return $this->hasOne(Kegiatan::class, 'id', 'program_id');
    }

}
