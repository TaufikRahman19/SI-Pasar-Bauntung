@extends('layout.main')
@section('title', 'Edit Pengguna')

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
                    <a href="{{route('pengguna.index')}}">Pengguna</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Pengguna</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Pengguna</h4>
                        </div>
                    </div>
                    <form method="POST" action="{{route('pengguna.update', $pengguna->id)}}">
                        @method ('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control form-control" id="namePengguna" value="{{$pengguna->name}}"
                                            name="namePengguna">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control form-control" id="emailPengguna" value="{{$pengguna->email}}"
                                            name="emailPengguna">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control form-control" id="usernamePengguna" value="{{$pengguna->username}}"
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
                                            <option value="Kepala Pasar"{{ $pengguna->level == "Kepala Pasar" ? 'selected' : ''}}>Kepala Pasar</option>
                                            <option value="Pegawai"{{ $pengguna->level == "Pegawai" ? 'selected' : ''}}>Pegawai</option>
                                            <option value="Pedagang"{{ $pengguna->level == "Pedagang" ? 'selected' : ''}}>Pedagang</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{route('pengguna.index')}}" class="btn btn-danger">Batal</a>&nbsp;
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
