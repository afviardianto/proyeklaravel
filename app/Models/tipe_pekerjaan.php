<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipe_pekerjaan extends Model
{
    use HasFactory;
    protected $fillable = ['nama_tipe_pekerjaan', 'keterangan_tipe_pekerjaan',];

}
