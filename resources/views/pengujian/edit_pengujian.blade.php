@extends('layout.main')
@section('title', 'Edit Pengujian')

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
                        <a href="#">Edit Pengujian</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Edit Pengujian</h4>
                            </div>
                        </div>
                        <form method="POST" id="pengujian" action="{{ route('pengujian.update', $pengujian->id) }}"
                            enctype="multipart/form-data">
                            @method ('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input type="text" class="form-control form-control" id="nikPengujianEdit"
                                                name="nikPengujianEdit" value="{{ $pengujian->nik }}"autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Petugas</label>
                                            <input type="text" class="form-control form-control"
                                                id="nama_petugasPengujianEdit" name="nama_petugasPengujianEdit"
                                                value="{{ $pengujian->nama_petugas }}" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control form-control" name="jenis_kelaminPengujianEdit"
                                                id="jenis_kelaminPengujianEdit ">
                                                <option value="" selected disabled>- Pilih Jenis Kelamin -</option>
                                                <option
                                                    value="Laki-laki"{{ $pengujian->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                                    Laki-laki</option>
                                                <option value="Perempuan"{{ $pengujian->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                                    Perempuan
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="fotopengujian">Masukan Foto Pengujian</label>
                                            <input type="file" class="form-control form-control" id="fotopengujian"
                                                name="fotopengujian">
                                        </div>
                                        <div class="form-group">
                                            <center><img src="{{ asset('fotopengujian/' . $pengujian->fotopengujian) }}" width="50%"
                                                alt="" srcset=""></center>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('pengujian.index') }}" class="btn btn-danger">Batal</a>&nbsp;
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
