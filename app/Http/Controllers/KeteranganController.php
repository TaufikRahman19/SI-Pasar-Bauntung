<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Keterangan;

class KeteranganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $keterangans = Keterangan::all();
        return view('keterangan.daftar_keterangan', compact('keterangans'));
    }

    public function cetakKeterangan()
    {
        //
        $keterangans = Keterangan::all();
        return view('keterangan.cetak_keterangan', compact('keterangans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $keterangans = Keterangan::all();
        return view('keterangan.tambah_keterangan', compact('keterangans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = [
        //     'jenis_kegiatan'        => $request->input('jenis_kegiatankegiatan'),
        //     'deskripsi'       => $request->input('deskripsikegiatan'),
        //     'foto'       => $request->input('foto'),
        // ];
        $this->validate($request, [
            'kode_keterangan' => 'required|unique:kegiatans,kode_keterangan',
        ],[
            'kode_keterangan.required' => 'Kode Kegiatan Tidak Boleh Kosong',
            'kode_keterangan.unique' => 'Kode Kegiatan Sudah Terdaftar',
        ]);
        $data = Keterangan::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotoKegiatan/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('keterangan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $keterangan = Keterangan::find($id);

        return view('keterangan.detail-keterangan', compact('keterangan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $keterangan = Keterangan::find($id);

        return view('keterangan.edit_keterangan', compact('keterangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $ubah = Keterangan::findorfail($id);
        $awal = $ubah->foto;
        $keterangan = [
            'kode_barang' => $request['kode_barangFasilitasEdit'],
            'nama_barang' => $request['nama_barangFasilitasEdit'],
            'jumlah' => $request['jumlahFasilitasEdit'],
            'kualitas' => $request['kualitasFasilitasEdit'],
            'keterangan' => $request['keteranganFasilitasEdit'],
            'foto' => $awal,
        ];

        $request->foto->move('/fotoKeterangan', $awal);
        $ubah->update($keterangan);
        return redirect()->route('keterangan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $keterangan = Keterangan::find($id);

        $keterangan->delete();

        return redirect()->route('keterangan.index');
    }
}
