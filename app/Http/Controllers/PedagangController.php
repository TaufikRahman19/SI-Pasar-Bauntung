<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\Pedagang;
use App\Models\Pembayaran;
use App\Models\Pengguna;
use App\Models\Toko;
use App\Models\Tunggakan;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

class PedagangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // $keyword = $request->keyword;
        // $pedagangs = Pedagang::where('nama', 'LIKE', '%'.$keyword.'%')
        // ->get();
        $pedagangs = Pedagang::with('toko')->get();
        return view('pedagang.daftar_pedagang', compact('pedagangs'));
    }

    public function cetakPedagang()
    {
        //
        $pedagangs = Pedagang::with('toko')->get();
        // $pdf = PDF::loadview('pedagang.cetak_pedagang',[
        //     'pedagangs' => $pedagangs
        // ]);
        // return $pdf->stream();
        return view('pedagang.cetak_pedagang', compact('pedagangs'));
    }

    public function cetakFilter()
    {
        return view('pedagang.filter_pedagang');
    }

    public function cetakPedagangPertanggal($tglawal, $tglakhir)
    {
        dd:
        Pedagang::all();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tokos = Toko::all();
        $tanggals = Carbon::now()->format('Y-m-d');
        $now = Carbon::now();
        $thnBulan = $now->year . $now->month;
        $cek = Pedagang::count();
        if ($cek == 0) {
            $urut = 100001;
            $nomor = 'PSRBJB' . $thnBulan . $urut;
            // dd($nomor);
        } else {
            $ambil = Pedagang::all()->last();
            $urut = (int)substr($ambil->no_register, -6) + 1;
            $nomor = 'PSRBJB' . $thnBulan . $urut;
        }
        return view('pedagang.tambah_pedagang', compact('tokos', 'tanggals', 'nomor'));
    }

    public function datadiri()
    {
        //
        $tokos = Toko::all();
        $tanggals = Carbon::now()->format('Y-m-d');
        $now = Carbon::now();
        $thnBulan = $now->year . $now->month;
        $cek = Pedagang::count();
        if ($cek == 0) {
            $urut = 100001;
            $nomor = 'PSRBJB' . $thnBulan . $urut;
            // dd($nomor);
        } else {
            $ambil = Pedagang::all()->last();
            $urut = (int)substr($ambil->no_register, -6) + 1;
            $nomor = 'PSRBJB' . $thnBulan . $urut;
        }
        return view('pedagang.datadiri_pedagang', compact('tokos', 'tanggals', 'nomor'));
    }

    public function dataPedagang(Request $request)
    {
        $penggunas = Pengguna::all();
        return view('pedagang.data_pedagang', compact('penggunas'));
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
        $this->validate($request, [
            'nik' => 'required|unique:pedagangs,nik|max:16',
            'notelpon' => 'max:13'
        ], [
            'nik.required' => 'NIK Tidak Boleh Kosong',
            'nik.unique' => 'NIK Sudah Terdaftar',
            'nik.max' => 'NIK Tidak Boleh lebih dari 16 Karakter',
            'notelpon.max' => 'No Telepon Tidak Boleh lebih dari 13 Karakter',

        ]);
        $data = Pedagang::create($request->all());
        if ($request->hasFile('pasfoto')) {
            $request->file('pasfoto')->move('pasfoto/', $request->file('pasfoto')->getClientOriginalName());
            $data->pasfoto = $request->file('pasfoto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pedagang.index');
    }

    public function tambahkan(Request $request)
    {
        //
        $this->validate($request, [
            'nik' => 'required|unique:pedagangs,nik|max:16',
            'notelpon' => 'max:13'
        ], [
            'nik.required' => 'NIK Tidak Boleh Kosong',
            'nik.unique' => 'NIK Sudah Terdaftar',
            'nik.max' => 'NIK Tidak Boleh lebih dari 16 Karakter',
            'notelpon.max' => 'No Telepon Tidak Boleh lebih dari 13 Karakter',

        ]);
        $data = Pedagang::create($request->all());
        if ($request->hasFile('pasfoto')) {
            $request->file('pasfoto')->move('pasfoto/', $request->file('pasfoto')->getClientOriginalName());
            $data->pasfoto = $request->file('pasfoto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('home');
    }

    public function show($id)
    {
        $pedagang = Pedagang::with('toko')->findOrFail($id);
        $tokos = Toko::all();
        return view('pedagang.kartu_pedagang', compact('pedagang', 'tokos'));
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
        $pedagang = Pedagang::find($id);
        $tokos = Toko::all();
        $pembayarans = Pembayaran::all();
        $tunggakans = Tunggakan::all();
        return view('pedagang.edit_pedagang', compact('pedagang', 'tokos', 'pembayarans', 'tunggakans'));
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
        $ubah = Pedagang::findorfail($id);
        $awal = $ubah->pasfoto;
        $pedagang = [
            'no_register' => $request['no_registerPedagangEdit'],
            'nama' => $request['namaPedagangEdit'],
            'nik' => $request['nikPedagangEdit'],
            'jenis_dagang' => $request['jenis_dagangPedagangEdit'],
            'toko_id' => $request['toko_id'],
            'alamat' => $request['alamatPedagangEdit'],
            'notelpon' => $request['notelponPedagangEdit'],
            'massa_kontrak' => $request['massa_kontrakPedagangEdit'],
            'pembayaran_id' => $request['pembayaran_id'],
            'tunggakan_id' => $request['tunggakan_id'],
            'pasfoto' => $awal,
        ];
        $request->pasfoto->move(public_path() . '/pasfoto', $awal);
        $ubah->update($pedagang);
        return redirect()->route('pedagang.index');
    }

    public function verif($id)
    {
        //
        $pedagang = Pedagang::findorfail($id);
        $tokos = Toko::all();
        $pembayarans = Pembayaran::all();
        $tunggakans = Tunggakan::all();
        return view('pedagang.verif_pedagang', compact('pedagang', 'tokos', 'pembayarans', 'tunggakans'));
    }

    public function verifikasiPedagang(Request $request, $id)
    {
        //
        $pedagang = Pedagang::find($id);

        $pedagang->nik = $request->input('nik');
        $pedagang->nama = $request->input('nama');
        $pedagang->no_register = $request->input('no_register');
        $pedagang->jenis_dagang = $request->input('jenis_dagang');
        $pedagang->toko_id = $request->input('toko_id');
        $pedagang->alamat = $request->input('alamat');
        $pedagang->notelpon = $request->input('notelpon');
        $pedagang->massa_kontrak = $request->input('massa_kontrak');
        $pedagang->pembayaran_id = $request->input('pembayaran_id');

        $pedagang->save();

        return redirect()->route('pedagang.index');
    }

    public function tunggakan($id)
    {
        //
        $pedagang = Pedagang::findorfail($id);
        $tokos = Toko::all();
        $pembayarans = Pembayaran::all();
        $tunggakans = Tunggakan::all();
        return view('pedagang.tunggakan_pedagang', compact('pedagang', 'tokos', 'pembayarans', 'tunggakans'));
    }

    public function tunggakanPedagang(Request $request, $id)
    {
        //
        $pedagang = Pedagang::find($id);

        $pedagang->nik = $request->input('nik');
        $pedagang->nama = $request->input('nama');
        $pedagang->no_register = $request->input('no_register');
        $pedagang->jenis_dagang = $request->input('jenis_dagang');
        $pedagang->toko_id = $request->input('toko_id');
        $pedagang->alamat = $request->input('alamat');
        $pedagang->notelpon = $request->input('notelpon');
        $pedagang->massa_kontrak = $request->input('massa_kontrak');
        $pedagang->tunggakan_id = $request->input('tunggakan_id');

        $pedagang->save();

        return redirect()->route('pedagang.index');
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
        $pedagang = pedagang::find($id);

        $pedagang->delete();

        return redirect()->route('pedagang.index');
    }
}
