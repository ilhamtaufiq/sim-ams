<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tfl extends Model
{
    use HasFactory;
    protected $table = 'db_tfl';
    protected $fillable = ['user_id','pekerjaan_id'];

    /**
     * Get all of the comments for the Tfl
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pekerjaan()
    {
        return $this->hasOne(Pekerjaan::class, 'id', 'pekerjaan_id');
    }

    /**
     * Get the user associated with the Pekerjaan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function detail()
    {
        return $this->hasOne(Kontrak::class, 'pekerjaan_id', 'id');
    }

    /**
     * Get all of the comments for the Tfl
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}
