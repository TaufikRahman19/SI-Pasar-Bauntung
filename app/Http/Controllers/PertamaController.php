<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Pedagang;
use App\Models\Pajak;
use App\Models\Pertama;

class PertamaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pertamas = Pertama::all();
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('pertama/daftar_pertama', compact('pertamas','pedagangs','pajaks'));
    }

    // public function data($request)
    // {
    //     $data = pertama::all();
    //     if($request->input('status')==1){
    //         $data = $data->whereNotNull('status');
    //     } else if ($request->input('status')==0){
    //         $data = $data->whereNull('status');
    //     }
    // }

    public function cetakPertama()
    {
        //
        $pertamas = Pertama::all();
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('pertama.cetak_pertama', compact('pertamas','pedagangs','pajaks'));
    }

    public function cetakForm()
    {
        return view('pertama.cetak_pertama_form');
    }

    public function cetakPertamaPertanggal($tglawal, $tglakhir){
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $cetakPertanggal = Pertama::with('pedagang','pajak')->whereBetween('created_at',[$tglawal, $tglakhir])->get();
        return view('pertama.cetak_pertama_pertanggal', compact('cetakPertanggal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pertama_kontrak($kontrak_id){
        $kontrak = Pertama::with('pedagang')->where('massa_kontrak',[$kontrak_id]);
        return view('pertama/pertama_kontrak', compact('kontrak'));
    }

    public function create()
    {
        //
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('pertama/tambah_pertama', compact('pedagangs','pajaks'));
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
        $data = Pertama::create($request->all());
        if($request->hasFile('bukti')){
            $request->file('bukti')->move('buktibyr/', $request->file('bukti')->getClientOriginalName());
            $data->bukti = $request->file('bukti')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pertama.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pertama = Pertama::with('pedagang','pajak')->findOrFail($id);
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('pertama.detail_pertama', compact('pertama','pedagangs','pajaks'));
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
        $pertama = Pertama::find($id);
        $pedagangs = Pedagang::all();
        $pajaks = Pajak::all();
        return view('pertama.edit_pertama', compact('pertama','pedagangs','pajaks'));
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
        $pertama = Pertama::findorfail($id);
        $data = [
            'pegawai_id'        => $request->input('pegawai_id'),
            'pedagang_id'        => $request->input('pedagang_id'),
            'perbulan'       => $request->input('perbulan'),
            'pajak_id'       => $request->input('pajak_id'),
            'total'       => $request->input('total'),
            'bayar'       => $request->input('bayar'),
            'kembali'       => $request->input('kembali'),
            'keterangan'       => $request->input('keterangan'),
        ];
        $pertama->update($data);
        return redirect()->route('pertama.index');
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
        $pertama = Pertama::find($id);

        $pertama->delete();

        return redirect()->route('pertama.index');
    }
}
