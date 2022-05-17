<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;
    protected $table = 'db_foto';
    protected $fillable = ['pekerjaan_id','nama','path','progress','lat','long','keterangan'];
}
