@extends('layout.main')
@section('title', 'Tambah Keterangan Kegiatan')

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
                        <a href="{{ route('event.index') }}">Keterangan Kegiatan</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tambah Keterangan</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tambah Keterangan</h4>
                            </div>
                        </div>
                        @if ($errors->any)
                            <ul class="list-group">
                                @foreach ($errors->all() as $error)
                                    <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{ route('event.tambah') }}" method="POST" id="event"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Kode Kegiatan</label>
                                            <select class="form-control form-control" name="kegiatan_id" id="kegiatan_id">
                                                <option value="" selected disabled>- Pilih Kode Kegiatan -</option>
                                                @foreach ($kegiatans as $kegiatan)
                                                    <option value="{{ $kegiatan->id }}">
                                                        {{ $kegiatan->kode_kegiatan }} -
                                                        ({{ $kegiatan->judul_kegiatan }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="foto">Masukan Foto</label>
                                            <input type="file" class="form-control form-control" id="foto"
                                                name="foto">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control form-control" name="status" id="status">
                                                <option value="" selected disabled>- Pilih Status -</option>
                                                <option value="Terlaksana">Terlaksana</option>
                                                <option value="Ditunda">Ditunda</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('event.index') }}" class="btn btn-danger">Batal</a>&nbsp;
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
