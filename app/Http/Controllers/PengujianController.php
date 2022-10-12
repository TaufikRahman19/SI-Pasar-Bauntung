<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pengujian;

class PengujianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pengujians = Pengujian::all();
        return view('pengujian/daftar_pengujian', compact('pengujians'));
    }

    public function cetakPengujian()
    {
        //
        $pengujians = Pengujian::all();
        return view('pengujian.cetak_pengujian', compact('pengujians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $pengujian = Pengujian::all();
        return view('pengujian.tambah_pengujian', compact('pengujian'));
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
        //     'kode_barang' => 'required|unique:pengujians,kode_barang',
        // ],[
        //     'kode_barang.required' => 'Kode Barang Sudah Terdaftar',
        //     'kode_barang.unique' => 'Kode Barang Sudah Terdaftar',
        // ]);
        $data = Pengujian::create($request->all());
        if($request->hasFile('fotopengujian')){
            $request->file('fotopengujian')->move('fotopengujian/', $request->file('fotopengujian')->getClientOriginalName());
            $data->fotopengujian = $request->file('fotopengujian')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pengujian.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengujian = Pengujian::find($id);

        return view('pengujian.detail-pengujian', compact('pengujian'));
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
        $pengujian = Pengujian::find($id);

        return view('pengujian.edit_pengujian', compact('pengujian'));
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
        $ubah = Pengujian::findorfail($id);
        $awal = $ubah->fotopengujian;
        $pengujian = [
            'nik' => $request['nikPengujianEdit'],
            'nama_petugas' => $request['nama_petugasPengujianEdit'],
            'jenis_kelamin' => $request['jenis_kelaminPengujianEdit'],
            'fotopengujian' => $awal,
        ];

        $request->fotopengujian->move('/fotopengujian', $awal);
        $ubah->update($pengujian);
        return redirect()->route('pengujian.index');
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
        $pengujian = Pengujian::find($id);

        $pengujian->delete();

        return redirect()->route('pengujian.index');
    }
}
