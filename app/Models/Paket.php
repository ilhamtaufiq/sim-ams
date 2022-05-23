<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Pekerjaan;

class Paket extends Model
{
    use HasFactory;

    protected $table = 'db_paket';
    protected $fillable = ['pekerjaan_id','nama_pelaksana','alamat_pelaksana','npwp_pelaksana','keterangan','tahap','aspirasi'];
    public function setAspirasiAttribute($value)
    {
        $this->attributes['aspirasi'] = $value ?? 0;
    }
    /**
     * Get the user associated with the Paket
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pekerjaan()
    {
        return $this->hasOne(Pekerjaan::class, 'id', 'pekerjaan_id');
    }
}
