<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    use HasFactory;
    protected $fillable = ['pesanan_pembelian_id', 'tanggal_tagihan', 'jumlah_tagihan', 'status_tagihan',];

}
