<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Kecamatan;

class Desa extends Model
{
    use HasFactory;
    protected $table = "db_desa";

    /**
     * Get the user associated with the Desa
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kec()
    {
        return $this->hasOne(Kecamatan::class, 'kec_id', 'id');
    }
}
