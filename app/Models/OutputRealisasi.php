<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutputRealisasi extends Model
{
    use HasFactory;
    protected $table = 'db_output_realisasi';
    protected $fillable = ['pekerjaan_id', 'output_id', 'realisasi', 'satuan'];

    /**
     * Get all of the comments for the OutputRealisasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function output()
    {
        return $this->hasOne(Output::class, 'id', 'output_id');
    }

    /**
     * Get all of the comments for the OutputRealisasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pekerjaan()
    {
        return $this->hasOne(Pekerjaan::class, 'id', 'pekerjaan_id');
    }
}
