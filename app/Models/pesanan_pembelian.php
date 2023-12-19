<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan_pembelian extends Model
{
    use HasFactory;
    protected $fillable = ['klien_id', 'nama_pesanan_pembelian', 'keterangan_pesanan_pembelian', 'tanggal_pesanan_pembelian',];

}
