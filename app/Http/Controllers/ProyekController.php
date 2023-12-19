<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyek;
use App\Repository\ProyekRepository;


class ProyekController extends Controller
{
    private $proyekRepository;
    public function __construct(ProyekRepository $proyekRepository)
    {
        $this->proyekRepository = $proyekRepository;
    }

    /**
     * menampilkan halaman utama proyek.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         /** mengambil data proyek */
        $proyeks =  $this->proyekRepository->allProyek();

        return view('proyeks.index', compact('proyeks'));
    }

    /**
     * menampilkan halaman untuk tambah proyek.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proyeks.create');
    }

    /**
     * Menyimpan data proyek yang ditambahkan.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** validasi type data*/
        $data = $request->validate([
            'nama_proyek' => 'required|string|max:50',
            'keterangan_proyek' => 'required|string|max:255',
        ]);

        /** penyimpanan data proyek baru */
        $this->proyekRepository->storeProyek($data);

        return redirect()->route('proyeks.index')->with('message', 'proyek berhasil ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

     /**
     * Manampilkan halaman untuk edit proyek.
     * 
     * @param  \App\Models\Proyek   $proyek
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        /** mengambil data proyek untuk di edit */
        $proyeks =  $this->proyekRepository->findProyek($id);

        return view('proyeks.edit', compact('proyeks'));
    }

    /**
     * Menyimpan data proyek yang diedit.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyek   $proyek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        /**validasi type data*/
        $request->validate([
            'nama_proyek' => 'required|string|max:50',
            'keterangan_proyek' => 'required|string|max:255',
        ]);

        /**menyimpan data proyek setelah di edit*/
        $this->proyekRepository->updateProyek($request->all(), $id);

        return redirect()->route('proyeks.index')->with('message', 'Proyek berhasil di edit');
    }

    /**
     * menghapus data proyek.
     * 
     * @param  \App\Models\Proyek   $proyek
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $this->proyekRepository->destroyProyek($id);

        return redirect()->route('proyeks.index')->with('status', 'Proyek berhasil di hapus');
    }
}
