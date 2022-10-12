@extends('layout.main')
@section('title', 'Tambah Kegiatan')

@section('contain')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Pengiriman</h4>
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
                    <a href="{{route('kegiatan.index')}}">Kegiatan</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tambah Kegiatan</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah Kegiatan</h4>
                        </div>
                    </div>
                    @if ($errors->any)
                    <ul class="list-group">
                        @foreach ($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">{{$error}}</li>
                        @endforeach
                    </ul>
                    @endif
                    <form action="{{route('kegiatan.tambah')}}" method="POST" id="kegiatan" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kode Kegiatan</label>
                                        <input type="text" value="{{$nomor}}" readonly class="form-control form-control" id="kode_kegiatan" name="kode_kegiatan" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label>Judul Kegiatan</label>
                                        <input type="text" class="form-control form-control" id="judul_kegiatan" name="judul_kegiatan">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Mulai</label>
                                        <input type="date" class="form-control form-control" id="tanggal_mulai" name="tanggal_mulai">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tanggal Selesai</label>
                                        <input type="date" class="form-control form-control" id="tanggal_selesai" name="tanggal_selesai">
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat</label>
                                        <input type="text" class="form-control form-control" id="tempat" name="tempat">
                                    </div>
                                    <div class="form-group">
                                        <label>Perihal</label>
                                        <input type="text" class="form-control form-control" id="perihal" name="perihal">
                                    </div>
                                    {{-- <div class="form-group">
                                        <label>Keterangan</label>
                                        <select class="form-control form-control" name="keterangan" id="keterangan">
                                            <option value="" selected disabled>- Pilih Keterangan -</option>
                                            <option value="Terlaksana">Terlaksana</option>
                                            <option value="Belum Terlaksana">Belum Terlaksana</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="foto">Masukan Foto</label>
                                        <input type="file" class="form-control form-control" id="foto" name="foto">
                                    </div> --}}
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" class="form-control form-control" id="keterangan" name="keterangan">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{route('kegiatan.index')}}" class="btn btn-danger">Batal</a>&nbsp;
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
