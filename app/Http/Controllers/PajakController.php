<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pajak;
use App\Models\Pedagang;
use App\Models\Toko;
use Barryvdh\DomPDF\Facade as PDF;

class PajakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pajaks = Pajak::with('toko','pedagang')->get();
        return view('pajak/daftar_pajak', compact('pajaks'));
    }

    public function cetakPajak()
    {
        //
        $pajaks = Pajak::with('toko','pedagang')->get();
        // $pdf = PDF::loadview('pedagang.cetak_pedagang',[
        //     'pajaks' => $pajaks
        // ]);
        // return $pdf->stream();
        return view('pajak.cetak_pajak', compact('pajaks'));
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
        $pedagangs = Pedagang::all();
        return view('pajak/tambah_pajak',compact('tokos','pedagangs'));

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
            'jenis_toko' => 'required|unique:pajaks,jenis_toko',
        ],[
            'jenis_toko.required' => 'Jenis Toko Sudah Terdaftar',
            'jenis_toko.unique' => 'Jenis Toko Sudah Terdaftar',
        ]);

        $data = [
            'jenis_toko'       => $request->jenis_toko,
            'ukuran'       => $request->ukuran,
            'per_meter'       => $request->per_meter,
            'harga_pajak'       => $request->harga_pajak,
            'per_hari'       => $request->per_hari,
            'bulan'       => $request->bulan,
            'total'       => $request->total,
        ];


        Pajak::create($data);
        return redirect()->route('pajak.index');
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
        $pajak = Pajak::find($id);
        $tokos = Toko::all();
        $pedagangs = Pedagang::all();
        return view('pajak.edit_pajak', compact('pajak','tokos','pedagangs'));
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
        $pajak = Pajak::find($id);

        $pajak->jenis_toko = $request->input('jenis_toko');
        $pajak->ukuran = $request->input('ukuran');
        $pajak->per_meter = $request->input('per_meter');
        $pajak->harga_pajak = $request->input('harga_pajak');
        $pajak->per_hari = $request->input('per_hari');
        $pajak->bulan = $request->input('bulan');
        $pajak->total = $request->input('total');

        $pajak->save();

        return redirect()->route('pajak.index');
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
        $pajak = Pajak::find($id);

        $pajak->delete();

        return redirect()->route('pajak.index');
    }
}
