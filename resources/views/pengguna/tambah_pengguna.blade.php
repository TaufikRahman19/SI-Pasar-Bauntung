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
                        <a href="#">Tambah Pengguna</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tambah Pengguna</h4>
                            </div>
                        </div>
                        @if ($errors->any)
                            <ul class="list-group">
                                @foreach ($errors->all() as $error)
                                    <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{ route('pengguna.tambah') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nama Pegawai</label>
                                            <select class="form-control form-control" name="namePengguna" id="namePengguna">
                                                <option value="" selected disabled>- Pilih Nama Pegawai -</option>
                                                @foreach ($pegawais as $pegawai)
                                                <option value="{{$pegawai->nama_pegawai}}">{{$pegawai->nama_pegawai}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{-- <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control form-control" id="namePengguna"
                                                name="namePengguna">
                                        </div> --}}
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control form-control" id="emailPengguna"
                                                name="emailPengguna">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control form-control" id="usernamePengguna"
                                                name="usernamePengguna">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="passwordPengguna" required autocomplete="new-password"
                                                placeholder="Password">
                                        </div>

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Level</label>
                                            <select name="levelPengguna" id="" class="form-control">
                                                <option value="" selected disabled>- Pilih Level -</option>
                                                <option value="Kepala Pasar">Kepala Pasar</option>
                                                <option value="Pegawai">Pegawai</option>
                                                <option value="Pedagang">Pedagang</option>
                                            </select>
                                        </div>
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
