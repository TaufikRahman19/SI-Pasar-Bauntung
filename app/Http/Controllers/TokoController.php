<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Toko;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Validator;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tokos = Toko::all();
        return view('toko/daftar_toko', compact('tokos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('toko/tambah_toko');
    }

    public function cetakToko()
    {
        $tokos = Toko::all();
        return view('toko.cetak_toko', compact('tokos'));
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
        //     'jenis_toko'        => $request->input('jenis_tokoToko'),
        //     'deskripsi'       => $request->input('deskripsiToko'),
        //     'foto'       => $request->input('foto'),
        // ];

        $this->validate($request, [
            'no_toko' => 'required|unique:tokos,no_toko',
            'jenis_toko' => 'required',
            'ukuran' => 'required',
            'zonasi' => 'required',
        ],[
            'no_toko.required' => 'Nomor Toko Tidak Boleh Kosong',
            'no_toko.unique' => 'Nomor Toko Sudah Terdaftar',
            'jenis_toko.required' => 'Jenis Toko Tidak Boleh Kosong',
            'ukuran.required' => 'Ukuran Tidak Boleh Kosong',
            'zonasi.required' => 'Zonasi Tidak Boleh Kosong',
        ]);
        // $rules = [
        //     'no_toko' => 'required|unique:tokos,no_toko',
        //     'jenis_toko' => 'required',
        //     'deskripsi' => 'required',
        //     'foto' => 'required',
        // ];

        // $text = [
        //     'no_toko.required' => 'Nomor Toko Tidak Boleh Kosong',
        //     'no_toko.unique' => 'Nomor Toko Sudah Terdaftar',
        //     'jenis_toko.required' => 'Jenis Toko Tidak Boleh Kosong',
        //     'deskripsi.required' => 'Deskripsi Tidak Boleh Kosong',
        // ];
        $data = Toko::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotoToko/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('toko.index');
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
        $toko = Toko::findorfail($id);
        return view('toko.edit_toko', compact('toko'));
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
        $ubah = Toko::findorfail($id);
        $awal = $ubah->foto;
        $toko = [
            'no_toko' => $request['no_tokoTokoEdit'],
            'jenis_toko' => $request['jenis_tokoTokoEdit'],
            'ukuran' => $request['ukuranTokoEdit'],
            'zonasi' => $request['zonasiTokoEdit'],
            'foto' => $awal,
        ];

        $request->foto->move('/fotoToko', $awal);
        $ubah->update($toko);
        return redirect()->route('toko.index');
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
        $toko = toko::find($id);

        $toko->delete();

        return redirect()->route('toko.index');
    }
}
