@extends('layout.main')
@section('title', 'Tambah pedagang')

@section('contain')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Bauntung</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{route('home')}}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{route('pedagang.index')}}">Pedagang</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tambah Pedagang</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah Pedagang</h4>
                        </div>
                    </div>
                    @if ($errors->any)
                        <ul class="list-group">
                            @foreach ($errors->all() as $error)
                            <li class="list-group-item list-group-item-danger">{{$error}}</li>
                            @endforeach
                        </ul>
                        @endif
                    <form action="{{route('pedagang.tambah')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="number" class="form-control form-control" id="nik" name="nik" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control form-control" id="nama" name="nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Register</label>
                                        <input type="text" value="{{$nomor}}" class="form-control form-control" id="no_register" name="no_register" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Dagang</label>
                                        <input type="text" class="form-control form-control" id="jenis_dagang" name="jenis_dagang" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Toko</label>
                                        <select class="form-control form-control" name="toko_id" id="toko_id">
                                            <option value="" selected disabled>- Pilih Nomor Toko -</option>
                                            @foreach ($tokos as $toko)
                                            <option value="{{$toko->id}}">{{$toko->no_toko}} - ({{$toko->jenis_toko}})</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control form-control" id="alamat" name="alamat" required>
                                    </div>
                                    <div class="form-group">
                                        <label>No Telepon</label>
                                        <input type="number" class="form-control form-control" id="notelpon" name="notelpon" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label>Massa Kontrak</label>
                                        <select class="form-control form-control" name="massa_kontrak" id="massa_kontrak">
                                            <option value="" selected disabled>- Pilih Massa Kontrak -</option>
                                            <option value="6">6 Bulan</option>
                                            <option value="12">12 Bulan</option>
                                            <option value="24">24 Bulan</option>
                                            <option value="36">36 Bulan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="pasfoto">Masukan Pas Foto</label>
                                        <input type="file" class="form-control form-control" id="pasfoto" name="pasfoto">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{route('pedagang.index')}}" class="btn btn-danger">Batal</a>&nbsp;
                            <button type="reset" class="btn btn-info">Reset</button>&nbsp;
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection
