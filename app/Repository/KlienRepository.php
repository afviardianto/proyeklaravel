<?php

namespace App\Repository;

use App\Models\Klien;

class KlienRepository
{

    public function allKlien(){
        return Klien::latest()->paginate(10);
    }

    public function storeKlien($data){
        return Klien::create($data);
    }
    public function findKlien($id){
        return Klien::find($id);
    }
    public function updateKlien($data, $id){
        $klien = Klien::where('id', $id)->first();
        $klien->nama = $data['nama'];
        $klien->email = $data['email'];
        $klien->save();
    }
    public function destroyKlien($id){
        $klien = Klien::find($id);
        $klien->delete();
    }

    

}