<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyedia extends Model
{
    use HasFactory;
    protected $table = "db_penyedia";
    protected $fillable = ['nama','alamat','no_tlp','npwp','sbu','iujk'];
}
