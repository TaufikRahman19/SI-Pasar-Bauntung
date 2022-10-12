<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Pedagang;
use App\Models\Pajak;
use App\Models\Perpanjangan;

class PerpanjanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $perpanjangans = Perpanjangan::all();
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('perpanjangan/daftar_perpanjangan', compact('perpanjangans','pedagangs','pajaks'));
    }

    // public function data($request)
    // {
    //     $data = perpanjangan::all();
    //     if($request->input('status')==1){
    //         $data = $data->whereNotNull('status');
    //     } else if ($request->input('status')==0){
    //         $data = $data->whereNull('status');
    //     }
    // }

    public function cetakPerpanjangan()
    {
        //
        $perpanjangans = Perpanjangan::all();
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('perpanjangan.cetak_perpanjangan', compact('perpanjangans','pedagangs','pajaks'));
    }

    public function cetakForm()
    {
        return view('perpanjangan.cetak_perpanjangan_form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function pembayaran_kontrak($kontrak_id){
    //     $kontrak = perpanjangan::with('pedagang')->where('massa_kontrak',[$kontrak_id]);
    //     return view('pembayaran/pembayaran_kontrak', compact('kontrak'));
    // }

    public function create()
    {
        //
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('perpanjangan/tambah_perpanjangan', compact('pedagangs','pajaks'));
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
        ];
        Perpanjangan::create($data);
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
        $perpanjangan = Perpanjangan::with('pedagang','pajak')->findOrFail($id);
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('perpanjangan.detail_perpanjangan', compact('perpanjangan','pedagangs','pajaks'));
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
        $perpanjangan = Perpanjangan::find($id);
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('perpanjangan.edit_perpanjangan', compact('perpanjangan','pedagangs','pajaks'));
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
        $perpanjangan = Perpanjangan::findorfail($id);
        $data = [
            'pedagang_id'        => $request->input('pedagang_id'),
            'pajak_id'       => $request->input('pajak_id'),
            'bulan'       => $request->input('bulan'),
            'total'       => $request->input('total'),
        ];
        $perpanjangan->update($data);
        return redirect()->route('perpanjangan.index');
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
        $perpanjangan = Perpanjangan::find($id);

        $perpanjangan->delete();

        return redirect()->route('perpanjangan.index');
    }
}
