<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Kegiatan;
use Barryvdh\DomPDF\Facade as PDF;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Event::with('kegiatan')->get();
        return view('event.daftar_event', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $events = Event::all();
        $kegiatans = Kegiatan::all();
        return view('event.tambah_event',compact('events','kegiatans'));
    }

    public function show($id)
    {
        $event = Event::with('kegiatan')->findorfail($id);
        $kegiatans = Kegiatan::all();
        return view('event.detail_event', compact('event','kegiatans'));
    }

    public function cetakEvent()
    {
        $events = Event::all();
        return view('event.cetak_event', compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Event::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotoKegiatan/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('event.index');
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
        $event = Event::findorfail($id);
        $kegiatans = Kegiatan::all();
        return view('event.edit_event', compact('event','kegiatans'));
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
        $ubah = Event::findorfail($id);
        $awal = $ubah->foto;
        $event = [
            'kegiatan_id' => $request['kegiatan_id'],
            'status' => $request['status'],
            'foto' => $awal,
        ];

        $request->foto->move('/fotoKegiatan', $awal);
        $ubah->update($event);
        return redirect()->route('event.index');
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
        $event = Event::find($id);

        $event->delete();

        return redirect()->route('event.index');
    }
}
