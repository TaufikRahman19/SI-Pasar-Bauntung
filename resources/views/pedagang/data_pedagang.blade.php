@extends('layout.main')
@section('title', 'Data Pedagang')

@section('contain')

    <div class="content">
        {{-- Selamat Datang {{ Auth::user()->level}} --}}
        <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    {{-- <div class="card text-white bg-success">
                  <div class="card-body">
                    <img class="card-img-top" src="assets/img/logo_bauntung.png" alt="">
                </div>
                </div> --}}
                    <div>
                        {{-- <img class="card-img-top" src="assets/img/bg_pasar.png" alt=""> --}}
                        <h2 class="text-white pb-2 fw-bold">Data Pedagang</h2>
                        <h5 class="text-white op-7 mb-2">Aplikasi Pengelolaan Data Pada Kantor UPTD Pasar Bauntung</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title"></div><br>
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div class="card card-stats card-round">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-2 col-stats">
                                                <div class="text">
                                                    <p class="card-category">Nama Pedagang</p>
                                                    <h4>{{ Auth::user()->pedagang->nama }}</h4>
                                                </div>
                                            </div>
                                            <div class="col-2 col-stats">
                                                <div class="text">
                                                    <p class="card-category">NIK</p>
                                                    <h4>{{ Auth::user()->pedagang->nik }}</h4>
                                                </div>
                                            </div>
                                            <div class="col-2 col-stats">
                                                <div class="text">
                                                    <p class="card-category">Jenis Dagang</p>
                                                    <h4>{{ Auth::user()->pedagang->jenis_dagang }}</h4>
                                                </div>
                                            </div>
                                            <div class="col-2 col-stats">
                                                <div class="text">
                                                    <p class="card-category">Alamat</p>
                                                    <h4>{{ Auth::user()->pedagang->alamat }}</h4>
                                                </div>
                                            </div>
                                            <div class="col-2 col-stats">
                                                <div class="text">
                                                    <p class="card-category">No Telpon</p>
                                                    <h4>{{ Auth::user()->pedagang->notelpon }}</h4>
                                                </div>
                                            </div>
                                            <div class="col-2 col-stats">
                                                <div class="text">
                                                    <p class="card-category">Foto</p>
                                                    <img src="{{ asset('pasfoto/' . Auth::user()->pedagang->pasfoto) }}"
                                                        width="50%" alt="">
                                                    {{-- <a href="{{ asset('pasfoto/' . Auth::user()->pedagang->pasfoto) }}" target="#blank"
                                                        rel="noopener noreferrer">Lihat Pas Foto</a> --}}
                                                    {{-- <h4>{{ Auth::user()->pedagang->pasfoto }}</h4> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12">
                                <div class="card card-stats card-round">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-4 col-stats">
                                                <div class="text">
                                                    <p class="card-category">Kartu Pedagang</p>
                                                    @if (Auth::user()->pedagang->id)
                                                        <a class=""
                                                            href="{{ route('pedagang.kartu', Auth::user()->pedagang->id) }}">Cetak
                                                        </a>
                                                    @else
                                                        <h4>Belum Ada Data</h4>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="col-4 col-stats">
                                                <div class="text">
                                                    <p class="card-category">Bukti Pembayaran Pajak</p>
                                                    @if (Auth::user()->pedagang->pembayaran_id)
                                                        <a class=""
                                                            href="{{ route('pembayaran.detail', Auth::user()->pedagang->pembayaran->id) }}">Cetak
                                                        </a>
                                                    @else
                                                        <h4>Belum Ada Data</h4>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-4 col-stats">
                                                <div class="text">
                                                    <p class="card-category">Surat Tunggakan</p>
                                                    @if (Auth::user()->pedagang->tunggakan_id)
                                                        <a class=""
                                                            href="{{ route('tunggakan.detail', Auth::user()->pedagang->tunggakan->id) }}">Cetak
                                                        </a>
                                                    @else
                                                        <h4>Belum Ada Data</h4>
                                                    @endif


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
