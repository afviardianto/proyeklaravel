<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;
use App\Models\tipe_pekerjaan;
use App\Repository\PekerjaanRepository;

class PekerjaanController extends Controller
{
    private $pekerjaanRepository;
    public function __construct(PekerjaanRepository $pekerjaanRepository)
    {
        $this->pekerjaanRepository = $pekerjaanRepository;
    }

    /**
     * menampilkan halaman utama pekerjaan.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /** mengambil data pekerjaan */
        $pekerjaans =  $this->pekerjaanRepository->allPekerjaan();

        return view('pekerjaans.index', compact('pekerjaans'));
    }

    /**
     * menampilkan halaman untuk menambah pekerjaan.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /**mengambil data tipe pekerjaan  */
        $tipe_pekerjaan= tipe_pekerjaan::select('id','nama_tipe_pekerjaan')->get();
        return view('pekerjaans.create',compact('tipe_pekerjaan'));
    }

    /**
     * Menyimpan data pekerjaan yang ditambahkan.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** validasi type data*/
        $data = $request->validate([
            'tipe_pekerjaan_id' => 'required|integer',
            'nama_pekerjaan' => 'required|string|max:50',
            'keterangan_pekerjaan' => 'required|string|max:255',
        ]);

        /** penyimpanan data pekerjaan baru */
        $this->pekerjaanRepository->storePekerjaan($data);

        return redirect()->route('pekerjaans.index')->with('message', 'Pekerjaan berhasil ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Manampilkan halaman untuk edit pekerjaan.
     * 
     * @param  \App\Models\Pekerjaan   $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        /** mengambil data pekerjaan untuk di edit */
        $pekerjaan = $this->pekerjaanRepository->findPekerjaan($id);
        /** mengambil data tipe pekerjaan */
        $tipe_pekerjaan= tipe_pekerjaan::select('id','nama_tipe_pekerjaan')->get();
        return view('pekerjaans.edit', compact('pekerjaan', 'tipe_pekerjaan'));
    }

    /**
     * Menyimpan data pekerjaan yang diedit.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pekerjaan   $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        /** validasi type data*/
        $request->validate([
            'tipe_pekerjaan_id' => 'required|integer',
            'nama_pekerjaan' => 'required|string|max:50',
            'keterangan_pekerjaan' => 'required|string|max:255',
        ]);

        /**menyimpan data pekerjaan setelah di edit*/
        $this->pekerjaanRepository->updatePekerjaan($request->all(), $id);

        return redirect()->route('pekerjaans.index')->with('message', 'Pekerjaan berhasil di edit');
    }

    /**
     * menghapus data pekerjaan.
     * 
     * @param  \App\Models\Pekerjaan   $pekerjaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        $this->pekerjaanRepository->destroyPekerjaan($id);

        return redirect()->route('pekerjaans.index')->with('status', 'Pekerjaan berhasil di hapus');
    }
}
