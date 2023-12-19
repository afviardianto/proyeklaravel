<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran_atas_pembelian extends Model
{
    use HasFactory;
    protected $fillable = ['tagihan_id', 'jumlah_pembayaran', 'tanggal_pembayaran',];
    
}
