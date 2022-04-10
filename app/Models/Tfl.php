<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tfl extends Model
{
    use HasFactory;
    protected $table = 'db_tfl';

    /**
     * Get all of the comments for the Tfl
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pekerjaan()
    {
        return $this->hasOne(Pekerjaan::class, 'id', 'pekerjaan_id');
    }
}
