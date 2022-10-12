<?php

namespace App\Http\Controllers;

use App\Models\Pedagang;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Pengguna;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $penggunas = Pengguna::with('pedagang')->get();
        $pedagangs = Pedagang::all();
        return view('pengguna.daftar_pengguna', compact('penggunas','pedagangs'));
    }

    public function penggunaPedagang($id)
    {
        $pengguna = Pengguna::findorfail($id);
        $pedagangs = Pedagang::all();
        return view('pengguna.verifikasi_pengguna', compact('pengguna','pedagangs'));
    }

    public function verifikasiPengguna(Request $request, $id)
    {
        //
        $pengguna = Pengguna::find($id);

        $pengguna->name = $request->input('namePengguna');
        $pengguna->email = $request->input('emailPengguna');
        $pengguna->username = $request->input('usernamePengguna');
        $pengguna->level = $request->input('levelPengguna');
        $pengguna->pedagang_id = $request->input('pedagang_id');

        $pengguna->save();

        return redirect()->route('pengguna.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $penggunas = Pengguna::all();
        $pegawais = Pegawai::all();
        return view('pengguna.tambah_pengguna', compact('penggunas','pegawais'));
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
        $data = [
            'name'        => $request->input('namePengguna'),
            'email'        => $request->input('emailPengguna'),
            'username'       => $request->input('usernamePengguna'),
            'password'       => Hash::make($request['passwordPengguna']),
            'level'       => $request->input('levelPengguna'),
        ];
        Pengguna::create($data,$request);
        return redirect()->route('pengguna.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pengguna = Pengguna::find($id);
        $histories = $pengguna->histories()->orderBy('send_at','DESC')->get();

        return view('pengguna.detail-pengguna', compact('pengguna','histories'));
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
        $pengguna = Pengguna::find($id);
        $pedagangs = Pedagang::all();
        return view('pengguna.edit_pengguna', compact('pengguna','pedagangs'));
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
        $pengguna = Pengguna::find($id);

        $pengguna->name = $request->input('namePengguna');
        $pengguna->email = $request->input('emailPengguna');
        $pengguna->username = $request->input('usernamePengguna');
        $pengguna->password = $request->input('passwordPengguna');
        $pengguna->level = $request->input('levelPengguna');
        $pengguna->pedagang_id = $request->input('pedagang_id');

        $pengguna->save();

        return redirect()->route('pengguna.index');
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
        $pengguna = Pengguna::find($id);

        $pengguna->delete();

        return redirect()->route('pengguna.index');
    }
}
