<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pekerjaan extends Model
{
    use HasFactory;
    protected $fillable = ['tipe_pekerjaan_id', 'nama_pekerjaan', 'keterangan_pekerjaan',];
}
