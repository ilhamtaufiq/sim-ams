<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Pekerjaan;

class Aspirasi extends Model
{
    use HasFactory;

    protected $table = 'db_aspirasi';
    protected $fillable = ['pekerjaan_id','nama_pelaksana','alamat_pelaksana','npwp_pelaksana','keterangan'];

    /**
     * Get the user associated with the Aspirasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pekerjaan()
    {
        return $this->hasOne(Pekerjaan::class, 'id', 'pekerjaan_id');
    }
}
