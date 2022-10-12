@extends('layout.main')
@section('title', 'Edit Toko')

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
                    <a href="{{route('toko.index')}}">Toko</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Toko</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Toko</h4>
                        </div>
                    </div>
                    <form method="POST" action="{{route('toko.update', $toko->id)}}" enctype="multipart/form-data">
                        @method ('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nomor Toko</label>
                                        <input type="text" class="form-control form-control" id="no_tokoTokoEdit" name="no_tokoTokoEdit"  value="{{$toko->no_toko}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Toko</label>
                                        <input type="text" class="form-control form-control" id="jenis_tokoTokoEdit" name="jenis_tokoTokoEdit" value="{{$toko->jenis_toko}}" autofocus required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Ukuran</label>
                                        <input type="text" class="form-control form-control" id="ukuranTokoEdit" name="ukuranTokoEdit"  value="{{$toko->ukuran}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Zonasi</label>
                                        <input type="text" class="form-control form-control" id="zonasiTokoEdit" name="zonasiTokoEdit"  value="{{$toko->zonasi}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="foto">Masukan Foto</label>
                                        <input type="file" class="form-control form-control" id="foto" name="foto">
                                    </div>
                                    <div class="form-group">
                                        <img src="{{asset('fotoToko/'.$toko->foto) }}" width="100%" alt="" srcset="">
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{route('toko.index')}}" class="btn btn-danger">Batal</a>&nbsp;
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
