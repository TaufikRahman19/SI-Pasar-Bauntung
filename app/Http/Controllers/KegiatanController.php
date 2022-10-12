<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kegiatan;
use Barryvdh\DomPDF\Facade as PDF;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $kegiatans = Kegiatan::all();
        $kegiatans = Kegiatan::whereNull('foto')->get();
        return view('kegiatan.daftar_kegiatan', compact('kegiatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cek = Kegiatan::count();
        if ($cek == 0) {
            $urut = 01;
            $nomor = 'KGT' . $urut;
            // dd($nomor);
        }else{
            $ambil = Kegiatan::all()->last();
            $urut = (int)substr($ambil->kode_kegiatan, -1) + 1;
            $nomor = 'KGT' . $urut;
        }
        return view('kegiatan.tambah_kegiatan',compact('nomor'));
    }

    public function show($id)
    {
        $kegiatan = Kegiatan::findorfail($id);
        return view('kegiatan.detail_kegiatan', compact('kegiatan'));
    }

    public function cetakKegiatan()
    {
        $kegiatans = Kegiatan::all();
        return view('kegiatan.cetak_kegiatan', compact('kegiatans'));
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
        // $this->validate($request, [
        //     'kode_kegiatan' => 'required|unique:kegiatans,kode_kegiatan',
        // ],[
        //     'kode_kegiatan.required' => 'Kode Kegiatan Tidak Boleh Kosong',
        //     'kode_kegiatan.unique' => 'Kode Kegiatan Sudah Terdaftar',
        // ]);
        $data = Kegiatan::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotoKegiatan/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('kegiatan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kegiatan = Kegiatan::findorfail($id);
        return view('kegiatan.edit_kegiatan', compact('kegiatan'));
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
        $ubah = Kegiatan::findorfail($id);
        $kegiatan = [
            'kode_kegiatan' => $request['kodekegiatanEdit'],
            'judul_kegiatan' => $request['judulkegiatanEdit'],
            'tanggal_mulai' => $request['tanggalmulaikegiatanEdit'],
            'tanggal_selesai' => $request['tanggalselesaikegiatanEdit'],
            'tempat' => $request['tempatkegiatanEdit'],
            'perihal' => $request['perihalkegiatanEdit'],
            'keterangan' => $request['keterangankegiatanEdit'],
        ];
        $ubah->update($kegiatan);
        return redirect()->route('kegiatan.index');
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
        $kegiatan = Kegiatan::find($id);

        $kegiatan->delete();

        return redirect()->route('kegiatan.index');
    }
}
