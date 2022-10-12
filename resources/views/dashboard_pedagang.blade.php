@extends('layout.main')
@section('title', 'Dashboard Pedagang')

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
                        <h2 class="text-white pb-2 fw-bold">Dashboard Pedagang</h2>
                        <h5 class="text-white op-7 mb-2">Aplikasi Pembayaran Pajak dan Pengelolaan Pedagang Pada Kantor UPT Pasar Bauntung</h5>
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
                            <img src="{{ asset('/assets/img/dpnpsr.jpg') }}" width="100%" alt="..." class="">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner mt--5">
            <div class="col-12">
                <div class="card full-height">
                    <h2 class="text-black pb-2 fw-bold text-center">Denah Pasar Bauntung</h2>
                    <div class="card-body"></div>
                    <div class="card-title"></div><br>
                    <div class="row">
                        <img src="{{ asset('/assets/img/peta1.jpg') }}" width="100%" alt="..." class="">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
