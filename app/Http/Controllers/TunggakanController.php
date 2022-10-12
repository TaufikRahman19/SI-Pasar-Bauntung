<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Pedagang;
use App\Models\Pajak;
use App\Models\Pembayaran;
use App\Models\Tunggakan;

class TunggakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tunggakans = Tunggakan::all();
        $pembayarans = Pembayaran::all();
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('tunggakan/daftar_tunggakan', compact('tunggakans','pembayarans','pedagangs','pajaks'));
    }

    // public function data($request)
    // {
    //     $data = Tunggakan::all();
    //     if($request->input('status')==1){
    //         $data = $data->whereNotNull('status');
    //     } else if ($request->input('status')==0){
    //         $data = $data->whereNull('status');
    //     }
    // }

    public function cetakTunggakan()
    {
        //
        $tunggakans = Tunggakan::all();
        $pembayarans = Pembayaran::all();
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('tunggakan.cetak_tunggakan', compact('tunggakans','pedagangs','pajaks'));
    }

    public function cetakForm()
    {
        return view('tunggakan.cetak_tunggakan_form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function pembayaran_kontrak($kontrak_id){
    //     $kontrak = Tunggakan::with('pedagang')->where('massa_kontrak',[$kontrak_id]);
    //     return view('pembayaran/pembayaran_kontrak', compact('kontrak'));
    // }

    public function create()
    {
        //
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        $pembayarans = Pembayaran::all();
        return view('tunggakan/tambah_tunggakan', compact('pedagangs','pajaks','pembayarans'));
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
            'pedagang_id'        => $request->input('pedagang_id'),
            'pajak_id'       => $request->input('pajak_id'),
            'bulan'       => $request->input('bulan'),
            'total'       => $request->input('total'),
            'keterangan'       => $request->input('keterangan'),

        ];
        Tunggakan::create($data);
        return redirect()->route('tunggakan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tunggakan = Tunggakan::with('pedagang','pembayaran','pajak')->findOrFail($id);
        $pedagangs = Pedagang::all();
        $pembayarans = Pembayaran::all();
        $pajaks = Pajak::all();
        return view('tunggakan.detail_tunggakan', compact('tunggakan','pembayarans','pedagangs','pajaks'));
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
        $tunggakan = Tunggakan::find($id);
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('tunggakan.edit_tunggakan', compact('tunggakan','pedagangs','pajaks'));
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
        $tunggakan = Tunggakan::findorfail($id);
        $data = [
            'pedagang_id'        => $request->input('pedagang_id'),
            'pajak_id'       => $request->input('pajak_id'),
            'bulan'       => $request->input('bulan'),
            'total'       => $request->input('total'),
            'keterangan'       => $request->input('keterangan'),
        ];
        $tunggakan->update($data);
        return redirect()->route('tunggakan.index');
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
        $tunggakan = Tunggakan::find($id);

        $tunggakan->delete();

        return redirect()->route('tunggakan.index');
    }
}
