<?php

namespace App\Repository;

use App\Models\Proyek;

class ProyekRepository
{
    public function allProyek(){
        return Proyek::latest()->paginate(10);
    }

    public function storeProyek($data){
        return Proyek::create($data);
    }
    public function findProyek($id){
        return Proyek::find($id);
    }
    public function updateProyek($data, $id){
        $proyek = Proyek::where('id', $id)->first();
        $proyek->nama_proyek = $data['nama_proyek'];
        $proyek->keterangan_proyek = $data['keterangan_proyek'];
        $proyek->save();
    }
    public function destroyProyek($id){
        $proyek = Proyek::find($id);
        $proyek->delete();
    }
}