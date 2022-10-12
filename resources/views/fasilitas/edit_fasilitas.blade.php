@extends('layout.main')
@section('title', 'Edit Fasilitas')

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
                        <a href="{{ route('fasilitas.index') }}">Fasilitas</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Fasilitas</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Edit Fasilitas</h4>
                            </div>
                        </div>
                        <form method="POST" id="fasilitas" action="{{ route('fasilitas.update', $fasilitas->id) }}"
                            enctype="multipart/form-data">
                            @method ('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Kode Barang</label>
                                            <input type="text" class="form-control form-control"
                                                id="kode_barangFasilitasEdit" name="kode_barangFasilitasEdit"
                                                value="{{ $fasilitas->kode_barang }}" readonly required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input type="text" class="form-control form-control"
                                                id="nama_barangFasilitasEdit" name="nama_barangFasilitasEdit"
                                                value="{{ $fasilitas->nama_barang }}" autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <input type="number" class="form-control form-control" id="jumlahFasilitasEdit"
                                                name="jumlahFasilitasEdit" value="{{ $fasilitas->jumlah }}" required>
                                        </div>
                                        <div class="form-group">
                                            <center><img src="{{ asset('fotobarang/' . $fasilitas->fotobarang) }}" width="30%"
                                                alt="" srcset=""></center>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Tanggal Masuk</label>
                                            <input type="date" class="form-control form-control" id="tanggalmasukfasilitasEdit" name="tanggalmasukfasilitasEdit"  value="{{$fasilitas->tgl_masuk}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kualitas</label>
                                            <select class="form-control form-control" name="kualitasFasilitasEdit"
                                                id="kualitasFasilitasEdit ">
                                                <option value="" selected disabled>- Pilih Kualitas -</option>
                                                <option
                                                    value="BARU"{{ $fasilitas->kualitas == 'BARU' ? 'selected' : '' }}>
                                                    BARU</option>
                                                <option
                                                    value="OKE"{{ $fasilitas->kualitas == 'OKE' ? 'selected' : '' }}>OKE
                                                </option>
                                                <option
                                                    value="RUSAK"{{ $fasilitas->kualitas == 'RUSAK' ? 'selected' : '' }}>
                                                    RUSAK</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <input type="text" class="form-control form-control"
                                                id="keteranganFasilitasEdit" name="keteranganFasilitasEdit"
                                                value="{{ $fasilitas->keterangan }}" autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <label for="fotobarang">Masukan Foto Barang</label>
                                            <input type="file" class="form-control form-control" id="fotobarang"
                                                name="fotobarang">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('fasilitas.index') }}" class="btn btn-danger">Batal</a>&nbsp;
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
