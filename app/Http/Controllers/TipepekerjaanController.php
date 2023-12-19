<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tipe_pekerjaan;
use App\Repository\TipepekerjaanRepository;

class TipepekerjaanController extends Controller
{
    private $tipepekerjaanRepository;
    public function __construct(TipepekerjaanRepository $tipepekerjaanRepository)
    {
        $this->tipepekerjaanRepository = $tipepekerjaanRepository;
    }

    /**
     * menampilkan halaman utama tipe pekerjaan.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         /** mengambil data tipe pekerjaan */
        $tipepekerjaans =  $this->tipepekerjaanRepository->allTipepekerjaan();

        return view('tipepekerjaans.index', compact('tipepekerjaans'));
    }

    /**
     * menampilkan halaman untuk tambah tipe pekerjaan .
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipepekerjaans.create');
    }

    /**
     * Menyimpan data tipe pekerjaan yang ditambahkan.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** validasi type data*/
        $data = $request->validate([
            'nama_tipe_pekerjaan' => 'required|string|max:50',
            'keterangan_tipe_pekerjaan' => 'required|string|max:255',
        ]);

        /** penyimpanan data tipe pekerjaan baru */
        $this->tipepekerjaanRepository->storeTipepekerjaan($data);

        return redirect()->route('tipepekerjaans.index')->with('message', 'Tipe Pekerjaan berhasil ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Manampilkan halaman untuk edit tipe pekerjaan.
     * 
     * @param  \App\Models\tipe_pekerjaan   $tipe_pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        /** mengambil data tipe pekerjaan untuk di edit */
        $tipe_pekerjaan = $this->tipepekerjaanRepository->findTipepekerjaan($id);

        return view('tipepekerjaans.edit', compact('tipe_pekerjaan'));
    }

    /**
     * Menyimpan data tipe pekerjaan yang diedit.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tipe_pekerjaan  $tipe_pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        /**validasi type data*/
        $request->validate([
            'nama_tipe_pekerjaan' => 'required|string|max:50',
            'keterangan_tipe_pekerjaan' => 'required|string|max:255',
        ]);

        /**menyimpan data tipe pekerjaan setelah di edit*/
        $this->tipepekerjaanRepository->updateTipepekerjaan($request->all(), $id);

        return redirect()->route('tipepekerjaans.index')->with('message', 'Tipe Pekerjaan berhasil di edit');
    }

    /**
     * menghapus data tipe pekerjaan.
     * 
     * @param  \App\Models\tipe_pekerjaan  $tipe_pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $this->tipepekerjaanRepository->destroyTipepekerjaan($id);

        return redirect()->route('tipepekerjaans.index')->with('status', 'Tipe Pekerjaan berhasil di hapus');
    }
}
