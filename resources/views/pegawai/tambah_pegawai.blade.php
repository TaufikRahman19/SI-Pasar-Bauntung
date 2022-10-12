@extends('layout.main')
@section('title', 'Tambah Pegawai')

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
                        <a href="{{ route('pegawai.index') }}">Pegawai</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tambah Pegawai</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tambah Pegawai</h4>
                            </div>
                        </div>
                        @if ($errors->any)
                            <ul class="list-group">
                                @foreach ($errors->all() as $error)
                                    <li class="list-group-item list-group-item-danger">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{ route('pegawai.tambah') }}" method="POST" id="pegawai" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input type="number" class="form-control form-control" id="nik_pegawai"
                                                name="nik_pegawai" autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control form-control" id="nama_pegawai"
                                                name="nama_Pegawai" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jabatan</label>
                                            <select class="form-control form-control" name="jabatan" id="jabatan">
                                                <option value="" selected disabled>- Pilih Jabatan -</option>
                                                <option value="Kepala UPT">Kepala UPT</option>
                                                <option value="Tata Usaha">Tata Usaha</option>
                                                <option value="Pengelola Keuangan">Pengelola Keuangan</option>
                                                <option value="Pengelola Kepegawaian">Pengelola Kepegawaian</option>
                                                <option value="Pranata Kearsipan">Pranata Kearsipan</option>
                                                <option value="Juru Pungut Retribusi">Juru Pungut Retribusi</option>
                                                <option value="Pengawas Ketertiban Pasar">Pengawas Ketertiban Pasar</option>
                                                <option value="Pengawas Kebersihan Pasar">Pengawas Kebersihan Pasar</option>
                                                <option value="Petugas IPAL">Petugas IPAL</option>
                                                <option value="Petugas Listrik">Petugas Listrik</option>
                                                <option value="Petugas Jaga Malam">Petugas Jaga Malam</option>
                                                <option value="Petugas Toilet UPT Pasar">Petugas Toilet UPT Pasar</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control form-control" name="jeniskelamin" id="jeniskelamin">
                                                <option value="" selected disabled>- Pilih Jenis Kelamin -</option>
                                                <option value="Laki-laki">Laki-laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>No Telepon</label>
                                            <input type="number" class="form-control form-control" id="notelpon"
                                                name="notelpon" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control form-control" name="status" id="status">
                                                <option value="" selected disabled>- Pilih Status -</option>
                                                <option value="PNS">PNS</option>
                                                <option value="Honorer">Honorer</option>
                                                <option value="Kontrak">Kontrak</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>TMT</label>
                                            <input type="date" class="form-control form-control" id="tmt" name="tmt"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="sk_pegawai">Masukan SK Pegawai</label>
                                            <input type="file" class="form-control form-control" id="sk_pegawai"
                                                name="sk_pegawai">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('pegawai.index') }}" class="btn btn-danger">Batal</a>&nbsp;
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
