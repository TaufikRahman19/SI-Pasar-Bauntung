<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Toko;
use App\Models\Pedagang;
use App\Models\Pegawai;
use App\Models\Fasilitas;
use App\Models\Pajak;
use App\Models\Kegiatan;
use App\Models\Pengguna;
use App\Models\Perpanjangan;
use App\Models\Tunggakan;
use App\Pembayaran;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function index()
    {
        return view('users/login');
    }
    public function login()
    {
        $pegawaiCount = Pegawai::count();
        $pedagangCount = Pedagang::count();
        $tokoCount = Toko::count();
        $fasilitasCount = Fasilitas::count();
        $pajakCount = Pajak::count();
        $kegiatanCount = Kegiatan::count();
        $pembayaranCount = Pembayaran::count();
        $tunggakanCount = Tunggakan::count();
        $perpanjanganCount = Perpanjangan::count();


        if (Auth::user()->level == 'Admin') {
            return view('dashboard', compact('pegawaiCount', 'pedagangCount', 'tokoCount', 'fasilitasCount', 'pajakCount', 'kegiatanCount', 'pembayaranCount', 'tunggakanCount','perpanjanganCount'));
        } elseif (Auth::user()->level == 'Pegawai') {
            return view('dashboard', compact('pegawaiCount', 'pedagangCount', 'tokoCount', 'fasilitasCount', 'pajakCount', 'kegiatanCount', 'pembayaranCount', 'tunggakanCount','perpanjanganCount'));
        } elseif (Auth::user()->level == 'Pedagang') {
            $penggunas = Pengguna::all();
            return view('dashboard_pedagang', compact('penggunas','pegawaiCount', 'pedagangCount', 'tokoCount', 'fasilitasCount', 'pajakCount', 'kegiatanCount', 'pembayaranCount', 'tunggakanCount'));
        } elseif (Auth::user()->level == 'Kepala Pasar') {
            return view('dashboard', compact('pegawaiCount', 'pedagangCount', 'tokoCount', 'fasilitasCount', 'pajakCount', 'kegiatanCount', 'pembayaranCount', 'tunggakanCount','perpanjanganCount'));
        }
    }
    public function __construct()
    {
        $this->middleware('auth');
    }
}
