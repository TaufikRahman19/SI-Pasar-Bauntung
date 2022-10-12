<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Fasilitas;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fasilitass = Fasilitas::all();
        return view('fasilitas/daftar_fasilitas', compact('fasilitass'));
    }

    public function cetakFasilitas()
    {
        //
        $fasilitass = Fasilitas::all();
        return view('fasilitas.cetak_fasilitas', compact('fasilitass'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cek = Fasilitas::count();
        if ($cek == 0) {
            $urut = 01;
            $nomor = 'BRG' . $urut;
            // dd($nomor);
        }else{
            $ambil = Fasilitas::all()->last();
            $urut = (int)substr($ambil->kode_barang, -1) + 1;
            $nomor = 'BRG' . $urut;
        }
        return view('fasilitas.tambah_fasilitas', compact('nomor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $this->validate($request, [
        //     'kode_barang' => 'required|unique:fasilitass,kode_barang',
        // ],[
        //     'kode_barang.required' => 'Kode Barang Sudah Terdaftar',
        //     'kode_barang.unique' => 'Kode Barang Sudah Terdaftar',
        // ]);
        $data = Fasilitas::create($request->all());
        if($request->hasFile('fotobarang')){
            $request->file('fotobarang')->move('fotobarang/', $request->file('fotobarang')->getClientOriginalName());
            $data->fotobarang = $request->file('fotobarang')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('fasilitas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fasilitas = Fasilitas::find($id);

        return view('fasilitas.detail-fasilitas', compact('fasilitas'));
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
        $fasilitas = Fasilitas::find($id);

        return view('fasilitas.edit_fasilitas', compact('fasilitas'));
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
        $ubah = Fasilitas::findorfail($id);
        $awal = $ubah->fotobarang;
        $fasilitas = [
            'kode_barang' => $request['kode_barangFasilitasEdit'],
            'nama_barang' => $request['nama_barangFasilitasEdit'],
            'tgl_masuk' => $request['tanggalmasukfasilitasEdit'],
            'jumlah' => $request['jumlahFasilitasEdit'],
            'kualitas' => $request['kualitasFasilitasEdit'],
            'keterangan' => $request['keteranganFasilitasEdit'],
            'fotobarang' => $awal,
        ];

        $request->fotobarang->move('/fotobarang', $awal);
        $ubah->update($fasilitas);
        return redirect()->route('fasilitas.index');
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
        $fasilitas = Fasilitas::find($id);

        $fasilitas->delete();

        return redirect()->route('fasilitas.index');
    }
}
