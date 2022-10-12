@extends('layout.main')
@section('title', 'Tambah Pengguna')

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
                        <a href="{{ route('pengguna.index') }}">Pengguna</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Verifikasi Pengguna</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Verifikasi Pengguna</h4>
                            </div>
                        </div>
                        @if ($errors->any)
                            <ul class="list-group">
                                @foreach ($errors->all() as $error)
                                    <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{route('verifikasi_pengguna', $pengguna->id)}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control form-control" id="namePengguna"
                                                name="namePengguna" value="{{ $pengguna->name }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control form-control" id="emailPengguna"
                                                name="emailPengguna" value="{{ $pengguna->email }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control form-control" id="usernamePengguna"
                                                name="usernamePengguna" value="{{ $pengguna->username }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Level</label>
                                            <select name="levelPengguna" id="" class="form-control"
                                                value="{{ $pengguna->level }}">
                                                <option value="{{ $pengguna->level }}">{{ $pengguna->level }}</option>
                                                <option value="Kepala Pasar">Kepala Pasar</option>
                                                <option value="Pegawai">Pegawai</option>
                                                <option value="Pedagang">Pedagang</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pedagang</label>
                                            <select class="form-control form-control" name="pedagang_id" id="pedagang_id"
                                                onchange="autofill()" autofocus required>
                                                <option value="" selected disabled>- Pilih Nama Pedagang -</option>
                                                @foreach ($pedagangs as $pedagang)
                                                    <option value="{{ $pedagang->id }}">{{ $pedagang->nama }} -
                                                        {{ $pedagang->toko->no_toko }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('pengguna.index') }}" class="btn btn-danger">Batal</a>&nbsp;
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
@section('script')
    <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/alert.js') }}"></script>

@endsection
