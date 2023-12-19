<?php

namespace App\Repository;

use App\Models\tipe_pekerjaan;

class TipepekerjaanRepository
{
    public function allTipepekerjaan(){
        return tipe_pekerjaan::latest()->paginate(10);
    }

    public function storeTipepekerjaan($data){
        return tipe_pekerjaan::create($data);
    }
    public function findTipepekerjaan($id){
        return tipe_pekerjaan::find($id);
    }
    public function updateTipepekerjaan($data, $id){
        $tipe_pekerjaan = tipe_pekerjaan::where('id', $id)->first();
        $tipe_pekerjaan->nama_tipe_pekerjaan = $data['nama_tipe_pekerjaan'];
        $tipe_pekerjaan->keterangan_tipe_pekerjaan = $data['keterangan_tipe_pekerjaan'];
        $tipe_pekerjaan->save();
    }
    public function destroyTipepekerjaan($id){
        $tipe_pekerjaan = tipe_pekerjaan::find($id);
        $tipe_pekerjaan->delete();
    }

}