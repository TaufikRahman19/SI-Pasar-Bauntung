@extends('layout.main')
@section('title', 'Edit Pegawai')

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
                        <a href="#">Edit Pegawai</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Edit Pegawai</h4>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('pegawai.update', $pegawai->id) }}" id="pegawai"
                            enctype="multipart/form-data">
                            @method ('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>NIK</label>
                                            <input type="text" class="form-control form-control" id="nikPegawaiEdit"
                                                name="nikPegawaiEdit" value="{{ $pegawai->nik_pegawai }}" autofocus
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control form-control" id="namaPegawaiEdit"
                                                name="namaPegawaiEdit" value="{{ $pegawai->nama_pegawai }}" autofocus
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jabatan</label>
                                            <select class="form-control form-control" name="jabatanPegawaiEdit"
                                                id="jabatanPegawaiEdit">
                                                <option value="" selected disabled>- Pilih Tipe Toko -</option>
                                                <option
                                                    value="Kepala UPT"{{ $pegawai->jabatan == 'Kepala UPT' ? 'selected' : '' }}>
                                                    Kepala UPT</option>
                                                <option
                                                    value="Tata Usaha"{{ $pegawai->jabatan == 'Tata Usaha' ? 'selected' : '' }}>
                                                    Tata Usaha</option>
                                                <option
                                                    value="Pengelola Keuangan"{{ $pegawai->jabatan == 'Pengelola Keuangan' ? 'selected' : '' }}>
                                                    Pengelola Keuangan</option>
                                                <option
                                                    value="Pengelola Kepegawaian"{{ $pegawai->jabatan == 'Pengelola Kepegawaian' ? 'selected' : '' }}>
                                                    Pengelola Kepegawaian</option>
                                                <option
                                                    value="Pranata Kearsipan"{{ $pegawai->jabatan == 'Pranata Kearsipan' ? 'selected' : '' }}>
                                                    Pranata Kearsipan</option>
                                                <option
                                                    value="Juru Pungut Retribusi"{{ $pegawai->jabatan == 'Juru Pungut Retribusi' ? 'selected' : '' }}>
                                                    Juru Pungut Retribusi</option>
                                                <option value="Pengawas Ketertiban Pasar"
                                                    {{ $pegawai->jabatan == 'Pengawas Ketertiban Pasar' ? 'selected' : '' }}>
                                                    Pengawas Ketertiban Pasar</option>
                                                <option value="Pengawas Kebersihan Pasar"
                                                    {{ $pegawai->jabatan == 'Pengawas Kebersihan Pasar' ? 'selected' : '' }}>
                                                    Pengawas Kebersihan Pasar</option>
                                                <option value="Petugas IPAL"
                                                    {{ $pegawai->jabatan == 'Petugas IPAL' ? 'selected' : '' }}>Petugas
                                                    IPAL</option>
                                                <option value="Petugas Listrik"
                                                    {{ $pegawai->jabatan == 'Petugas Listrik' ? 'selected' : '' }}>
                                                    Petugas Listrik</option>
                                                <option value="Petugas Jaga Malam"
                                                    {{ $pegawai->jabatan == 'Petugas Jaga Malam' ? 'selected' : '' }}>
                                                    Petugas Jaga Malam</option>
                                                <option value="Petugas Toilet UPT Pasar"
                                                    {{ $pegawai->jabatan == 'Petugas Toilet UPT Pasar' ? 'selected' : '' }}>
                                                    Petugas Toilet UPT Pasar</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select class="form-control form-control" name="jeniskelaminPegawaiEdit"
                                                id="jeniskelamin ">
                                                <option value="" selected disabled>- Pilih Jenis Kelamin -</option>
                                                <option
                                                    value="Laki-laki"{{ $pegawai->jeniskelamin == 'Laki-laki' ? 'selected' : '' }}>
                                                    Laki-laki</option>
                                                <option
                                                    value="Perempuan"{{ $pegawai->jeniskelamin == 'Perempuan' ? 'selected' : '' }}>
                                                    Perempuan</option>
                                            </select>
                                        </div>


                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>No Telepon</label>
                                            <input type="number" class="form-control form-control" id="notelponPegawaiEdit"
                                                name="notelponPegawaiEdit" value="{{ $pegawai->notelpon }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control form-control" name="statusPegawaiEdit"
                                                id="statuspegawai ">
                                                <option value="" selected disabled>- Pilih Status -</option>
                                                <option value="PNS"{{ $pegawai->status == 'PNS' ? 'selected' : '' }}>
                                                    PNS</option>
                                                <option
                                                    value="Honorer"{{ $pegawai->status == 'Honorer' ? 'selected' : '' }}>
                                                    Honorer</option>
                                                <option
                                                    value="Kontrak"{{ $pegawai->status == 'Kontrak' ? 'selected' : '' }}>
                                                    Kontrak</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>TMT</label>
                                            <input type="date" class="form-control form-control" id="tmtPegawaiEdit"
                                                name="tmtPegawaiEdit" value="{{ $pegawai->tmt }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="sk_pegawai">Masukan SK Pegawai</label>
                                            <input type="file" class="form-control form-control" id="sk_pegawai"
                                                name="sk_pegawai">
                                            <a href="{{ asset('sk_pegawai/' . $pegawai->sk_pegawai) }}" target="#blank"
                                                rel="noopener noreferrer">Lihat File Sebelumnya</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('pegawai.index') }}" class="btn btn-danger">Batal</a>&nbsp;
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
