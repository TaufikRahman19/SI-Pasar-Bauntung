@extends('layout.main')
@section('title', 'Edit Kegiatan')

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
                    <a href="{{route('kegiatan.index')}}">Kegiatan</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Kegiatan</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Kegiatan</h4>
                        </div>
                    </div>
                    <form method="POST" id="kegiatan" action="{{route('kegiatan.update', $kegiatan->id)}}" enctype="multipart/form-data">
                        @method ('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kode Kegiatan</label>
                                        <input type="text" class="form-control form-control" id="kodekegiatanEdit" name="kodekegiatanEdit" value="{{$kegiatan->kode_kegiatan}}" readonly required>
                                    </div>
                                    <div class="form-group">
                                        <label>Judul Kegiatan</label>
                                        <input type="text" class="form-control form-control" id="judulkegiatanEdit" name="judulkegiatanEdit" value="{{$kegiatan->judul_kegiatan}}" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Mulai</label>
                                        <input type="date" class="form-control form-control" id="tanggalmulaikegiatanEdit" name="tanggalmulaikegiatanEdit"  value="{{$kegiatan->tanggal_mulai}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Selesai</label>
                                        <input type="date" class="form-control form-control" id="tanggalselesaikegiatanEdit" name="tanggalselesaikegiatanEdit"  value="{{$kegiatan->tanggal_selesai}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tempat</label>
                                        <input type="text" class="form-control form-control" id="tempatkegiatanEdit" name="tempatkegiatanEdit"  value="{{$kegiatan->tempat}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Perihal</label>
                                        <input type="text" class="form-control form-control" id="perihalkegiatanEdit" name="perihalkegiatanEdit"  value="{{$kegiatan->perihal}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" class="form-control form-control" id="keterangankegiatanEdit" name="keterangankegiatanEdit"  value="{{$kegiatan->keterangan}}" required>
                                    </div>
                                </div>
                                {{-- <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="foto">Masukan Foto</label>
                                        <input type="file" class="form-control form-control" id="foto" name="foto">
                                    </div>
                                    <div class="form-group">
                                        <img src="{{asset('fotoKegiatan/'.$kegiatan->foto) }}" width="100%" alt="" srcset="">
                                    </div>
                                </div> --}}

                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{route('kegiatan.index')}}" class="btn btn-danger">Batal</a>&nbsp;
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
