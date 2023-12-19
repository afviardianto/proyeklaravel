<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penawaran_jasa extends Model
{
    use HasFactory;
    protected $fillable = ['klien_id', 'nama_penawaran_jasa', 'keterangan_penawaran_jasa', 'tanggal_penawaran_jasa',];

}
