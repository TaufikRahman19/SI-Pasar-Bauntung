@extends('layout.main')
@section('title', 'Tambah Pengujian')

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
                        <a href="{{ route('pengujian.index') }}">Pengujian</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tambah Pengujian</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tambah Pengujian</h4>
                            </div>
                        </div>
                        {{-- @if ($errors->any)
                    <ul class="list-group">
                        @foreach ($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif --}}
                        <form action="{{ route('pengujian.tambah') }}" method="POST" id="pengujian"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input type="text" class="form-control form-control" id="nik"
                                                name="nik" autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Petugas</label>
                                            <input type="text" class="form-control form-control" id="nama_petugas"
                                                name="nama_petugas" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control form-control" name="jenis_kelamin"
                                                id="jenis_kelamin">
                                                <option value="" selected disabled>- Pilih Jenis Kelamin -
                                                </option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="fotopengujian">Masukan Foto</label>
                                            <input type="file" class="form-control form-control" id="fotopengujian"
                                                name="fotopengujian">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <a href="{{ route('pengujian.index') }}" class="btn btn-danger">Batal</a>&nbsp;
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
