<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Kontrak;

class Realisasi extends Model
{
    use HasFactory;
    protected $table = 'db_realisasi';
    protected $fillable = ['kontrak_id','no_nphd','no_bast','jumlah_sp2d','no_sp2d'];

    /**
     * Get the user associated with the Realisasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function kontrak()
    {
        return $this->hasOne(Kontrak::class, 'id', 'kontrak_id');
    }
}
