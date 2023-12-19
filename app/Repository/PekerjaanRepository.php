<?php

namespace App\Repository;

use App\Models\Pekerjaan;
use Illuminate\Support\Facades\DB;

class PekerjaanRepository
{
    public function allPekerjaan(){
        return DB::table("pekerjaans")
        ->leftjoin("tipe_pekerjaans", "pekerjaans.tipe_pekerjaan_id", "=", "tipe_pekerjaans.id")
        ->select ("pekerjaans.id", "tipe_pekerjaans.nama_tipe_pekerjaan", "pekerjaans.nama_pekerjaan", "pekerjaans.keterangan_pekerjaan")
        ->get();
    }

    public function storePekerjaan($data){
        return Pekerjaan::create($data);
    }
    public function findPekerjaan($id){
        return Pekerjaan::find($id);
    }
    public function updatePekerjaan($data, $id){
        $pekerjaan = Pekerjaan::where('id', $id)->first();
        $pekerjaan->tipe_pekerjaan_id = $data['tipe_pekerjaan_id'];
        $pekerjaan->nama_pekerjaan = $data['nama_pekerjaan'];
        $pekerjaan->keterangan_pekerjaan = $data['keterangan_pekerjaan'];
        $pekerjaan->save();
    }
    public function destroyPekerjaan($id){
        $pekerjaan = Pekerjaan::find($id);
        $pekerjaan->delete();
    }

}