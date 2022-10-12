@extends('layout.main')
@section('title', 'Filter pedagang')

@section('contain')

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Bauntung</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('home') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('pedagang.index') }}">Pedagang</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Filter Pedagang</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <h3>Print Data Toko Pedagang</h3>
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <label for="label">Tanggal Awal</label>
                            <input type="date" name="tglawal" id="tglawal" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <label for="label">Tanggal Akhir</label>
                            <input type="date" name="tglakhir" id="tglakhir" class="form-control">
                        </div>
                        <div class="input-group mb-3">
                            <a href=""
                                onclick="this.href='/cetak_filter-pertanggal/'+ document.getElementById('tglawal').value +
                                '/' + document.getElementById('tglakhir').value " target="_blank" class="btn btn-primary col-12">Cetak Laporan Pertanggal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
