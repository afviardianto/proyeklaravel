<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permintaan_jasa extends Model
{
    use HasFactory;
    protected $fillable = ['klien_id', 'nama_permintaan_jasa', 'keterangan_permintaan_jasa', 'tanggal_permintaan_jasa',];

}
