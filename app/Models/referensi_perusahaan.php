<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class referensi_perusahaan extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'email', 'nama_akun_bank', 'nomor_akun_bank',];
    
}
