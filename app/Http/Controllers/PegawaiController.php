<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pegawai;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pegawais = Pegawai::all();
        return view('pegawai.daftar_pegawai', compact('pegawais'));
    }

    public function cetakPegawai()
    {
        //
        $pegawais = Pegawai::all();
        return view('pegawai.cetak_pegawai', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('pegawai.tambah_pegawai');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nik_pegawai' => 'required|unique:pegawais,nik_pegawai|max:16',
            'notelpon' => 'max:13'
        ], [
            'nik_pegawai.required' => 'Nik Pegawai Tidak Boleh Kosong',
            'nik_pegawai.unique' => 'NIK Pegawai Sudah Terdaftar',
            'nik_pegawai.max' => 'NIK Pegawai Tidak Boleh lebih dari 16 Karakter',
            'notelpon.max' => 'No Telepon Tidak Boleh lebih dari 13 Karakter',
        ]);
        $data = Pegawai::create($request->all());
        if ($request->hasFile('sk_pegawai')) {
            $request->file('sk_pegawai')->move('sk_pegawai/', $request->file('sk_pegawai')->getClientOriginalName());
            $data->sk_pegawai = $request->file('sk_pegawai')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pegawai = Pegawai::find($id);

        return view('pegawai.detail-pegawai', compact('pegawai'));
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
        $pegawai = Pegawai::find($id);

        return view('pegawai.edit_pegawai', compact('pegawai'));
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
        $ubah = Pegawai::findorfail($id);
        $awal = $ubah->sk_pegawai;
        $data = [
            'nik_pegawai' => $request['nikPegawaiEdit'],
            'nama_pegawai' => $request['namaPegawaiEdit'],
            'jabatan' => $request['jabatanPegawaiEdit'],
            'jeniskelamin' => $request['jeniskelaminPegawaiEdit'],
            'status' => $request['statusPegawaiEdit'],
            'notelpon' => $request['notelponPegawaiEdit'],
            'tmt' => $request['tmtPegawaiEdit'],
            'sk_pegawai' => $awal,
        ];
        $request->sk_pegawai->move(public_path() . '/sk_pegawai', $awal);
        $ubah->update($data);
        return redirect()->route('pegawai.index');
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
        $pegawai = Pegawai::find($id);

        $pegawai->delete();

        return redirect()->route('pegawai.index');
    }
}
