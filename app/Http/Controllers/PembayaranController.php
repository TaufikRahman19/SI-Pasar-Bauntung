<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Aut;
use App\Models\Pedagang;
use App\Models\Pajak;
use App\Models\Pembayaran;
use Illuminate\Foundation\Auth\User;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pembayarans = Pembayaran::where('status','lunas')->get();
        $pembayarans = Pembayaran::all();
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('pembayaran.daftar_pembayaran', compact('pembayarans','pedagangs','pajaks'));
    }

    // public function data($request)
    // {
    //     $data = Pembayaran::all();
    //     if($request->input('status')==1){
    //         $data = $data->whereNotNull('status');
    //     } else if ($request->input('status')==0){
    //         $data = $data->whereNull('status');
    //     }
    // }

    public function cetakPembayaran()
    {
        // $pembayarans = Pembayaran::where('status','lunas')->get();
        $pembayarans = Pembayaran::all();
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('pembayaran.cetak_pembayaran', compact('pembayarans','pedagangs','pajaks'));
    }

    public function online()
    {
        $pembayarans = Pembayaran::whereNull('status')->get();
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('pembayaran.online_pembayaran', compact('pembayarans','pedagangs','pajaks'));
    }

    public function Cetakonline()
    {
        $pembayarans = Pembayaran::whereNull('status')->get();
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('pembayaran.cetak_pembayaran', compact('pembayarans','pedagangs','pajaks'));
    }

    public function lunas()
    {
        $pembayarans = Pembayaran::where('status','lunas')->get();
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('pembayaran.lunas_pembayaran', compact('pembayarans','pedagangs','pajaks'));
    }

    public function Cetaklunas()
    {
        $pembayarans = Pembayaran::where('status','lunas')->get();
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('pembayaran.cetak_pembayaran', compact('pembayarans','pedagangs','pajaks'));
    }

    public function belum()
    {
        $pembayarans = Pembayaran::where('status','belum lunas')->get();
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('pembayaran.belum_pembayaran', compact('pembayarans','pedagangs','pajaks'));
    }

    public function Cetakbelum()
    {
        $pembayarans = Pembayaran::where('status','belum lunas')->get();
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('pembayaran.cetak_pembayaran', compact('pembayarans','pedagangs','pajaks'));
    }

    public function cetakForm()
    {
        return view('pembayaran.cetak_pembayaran_form');
    }

    public function cetakPembayaranPertanggal($tglawal, $tglakhir){
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $cetakPertanggal = Pembayaran::with('pedagang','pajak')->whereBetween('created_at',[$tglawal, $tglakhir])->get();
        return view('pembayaran.cetak_pembayaran_pertanggal', compact('cetakPertanggal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pembayaran_kontrak($kontrak_id){
        $kontrak = Pembayaran::with('pedagang')->where('massa_kontrak',[$kontrak_id]);
        return view('pembayaran/pembayaran_kontrak', compact('kontrak'));
    }

    public function create()
    {
        //
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('pembayaran/tambah_pembayaran', compact('pedagangs','pajaks'));
    }

    public function pertama(User $user)
    {
        //
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('pembayaran.pertama_pembayaran', compact('pedagangs','pajaks'));
    }

    public function tunggakan()
    {
        //
        $pembayaran = Pembayaran::with('pedagang','pajak');
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('pembayaran.tunggakan_pembayaran', compact('pembayaran','pedagangs','pajaks'));
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
        $data = Pembayaran::create($request->all());
        if($request->hasFile('bukti')){
            $request->file('bukti')->move('buktibyr/', $request->file('bukti')->getClientOriginalName());
            $data->bukti = $request->file('bukti')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pembayaran.index');
    }

    public function bayar(Request $request)
    {
        //
        $data = Pembayaran::create($request->all());
        if($request->hasFile('bukti')){
            $request->file('bukti')->move('buktibyr/', $request->file('bukti')->getClientOriginalName());
            $data->bukti = $request->file('bukti')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('home');
    }

    public function bayarTunggakan(Request $request)
    {
        //
        $data = Pembayaran::create($request->all());
        if($request->hasFile('bukti')){
            $request->file('bukti')->move('buktibyr/', $request->file('bukti')->getClientOriginalName());
            $data->bukti = $request->file('bukti')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pembayaran = Pembayaran::with('pedagang','pajak')->findOrFail($id);
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('pembayaran.detail_pembayaran', compact('pembayaran','pedagangs','pajaks'));
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
        $pembayaran = Pembayaran::find($id);
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('pembayaran.edit_pembayaran', compact('pembayaran','pedagangs','pajaks'));
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
        $pembayaran = Pembayaran::findorfail($id);
        $data = [
            'pegawai_id'        => $request->input('pegawai_id'),
            'pedagang_id'        => $request->input('pedagang_id'),
            'perbulan'       => $request->input('perbulan'),
            'pajak_id'       => $request->input('pajak_id'),
            'total'       => $request->input('total'),
            'bayar'       => $request->input('bayar'),
            'kembali'       => $request->input('kembali'),
            'status'       => $request->input('status'),
        ];
        $pembayaran->update($data);
        return redirect()->route('pembayaran.index');
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
        $pembayaran = Pembayaran::find($id);

        $pembayaran->delete();

        return redirect()->route('pembayaran.index');
    }
}
