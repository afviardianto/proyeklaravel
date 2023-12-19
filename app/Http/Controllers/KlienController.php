<?php

namespace App\Http\Controllers;

use App\Models\Klien;
use Illuminate\Http\Request;
use App\Repository\KlienRepository;

class KlienController extends Controller
{
    private $klienRepository;
    public function __construct(KlienRepository $klienRepository)
    {
        $this->klienRepository = $klienRepository;
    }

    /** Manampilkan halaman utama klien.
     * 
     * @return \Illuminate\Http\Response */
    public function index()
    {
        /**mengambil data klien */
        $kliens =  $this->klienRepository->allKlien();

        return view('kliens.index', compact('kliens'));
    }

    /** Manampilkan halaman untuk tambah klien.
     * 
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kliens.create');
    }

    /**
     * Menyimpan data klien yang ditambahkan.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**validasi type data*/
        $data = $request->validate([
            'nama' => 'required|string|max:50',
            'email' => 'required|string|unique:kliens,email',
        ]);

        /**menyimpan data baru klien */
        $this->klienRepository->storeKlien($data);

        return redirect()->route('kliens.index')->with('message', 'Klien berhasil ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Manampilkan halaman untuk edit klien.
     * 
     * @param  \App\Models\Klien  $klien
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        /**mengambil data klien berdasar id*/
        $klien = $this->klienRepository->findKlien($id);

        return view('kliens.edit', compact('klien'));
    }

    /**
     * Menyimpan data klien yang diedit.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Klien  $klien
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        /**validasi type data*/
        $request->validate([
            'nama' => 'required|string|max:50',
            'email' => 'required|string|unique:kliens,email',
        ]);

        /**menyimpan data klien setelah di edit*/
        $this->klienRepository->updateKlien($request->all(), $id);

        return redirect()->route('kliens.index')->with('message', 'Klien berhasil di edit');
    }

    /**
     * Menghapus data klien.
     * 
     * @param  \App\Models\Klien  $klien
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $this->klienRepository->destroyKlien($id);

        return redirect()->route('kliens.index')->with('status', 'Klien berhasil di hapus');
    }
}
