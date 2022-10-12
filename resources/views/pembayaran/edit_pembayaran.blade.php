@extends('layout.main')
@section('title', 'Edit Pembayaran')

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
                        <a href="{{ route('pembayaran.index') }}">Pembayaran</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Pembayaran</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Edit Pembayaran</h4>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('pembayaran.update', $pembayaran->id) }}">
                            @method ('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nama Petugas</label>
                                            <input type="text" class="form-control form-control" id="pegawai_id"
                                                name="pegawai_id" value="{{ $pembayaran->pegawai_id }}" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pedagang</label>
                                            <select class="form-control form-control" name="pedagang_id" id="pedagang_id"
                                                autofocus required>
                                                <option disabled value="">- Pilih Nama Pedagang -</option>
                                                <option value="{{ $pembayaran->pedagang_id }}">
                                                    {{ $pembayaran->pedagang->nama }}</option>
                                                @foreach ($pedagangs as $pedagang)
                                                    <option value="{{ $pedagang->id }}">{{ $pedagang->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Massa Kontrak</label>
                                            <select class="form-control form-control" name="perbulan" id="perbulan"
                                                autofocus required>
                                                <option disabled value="">- Pilih Massa Kontrak -</option>
                                                <option value="{{ $pembayaran->perbulan }}">
                                                    {{ $pembayaran->pedagang->massa_kontrak }}</option>
                                                @foreach ($pedagangs as $pedagang)
                                                    <option value="{{ $pedagang->massa_kontrak }}">
                                                        {{ $pedagang->massa_kontrak }} Bulan</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Pajak</label>
                                            <select class="form-control form-control" name="pajak_id" id="pajak_id"
                                                required>
                                                <option disabled value="">- Pilih Jenis Pajak -</option>
                                                <option value="{{ $pembayaran->pajak_id }}">
                                                    {{ $pembayaran->pajak_id }}
                                                </option>
                                                @foreach ($pajaks as $pajak)
                                                    <option value="{{ $pajak->harga_pajak }}">{{ $pajak->jenis_toko }}
                                                        -
                                                        {{ $pajak->harga_pajak }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Total</label>
                                            <input type="number" class="form-control form-control" id="total" name="total"
                                                value="{{ $pembayaran->total }}" onclick="hitungHarga()" readonly
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label>Bayar</label>
                                            <input type="number" class="form-control form-control" id="bayar" name="bayar"
                                                value="{{ $pembayaran->bayar }}" onclick="hitungHarga()" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Kembalian</label>
                                            <input type="number" class="form-control form-control" id="kembali"
                                                name="kembali" value="{{ $pembayaran->kembali }}"
                                                onclick="kembalianBayar()" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control form-control" name="status" id="status ">
                                                <option value="" selected disabled>- Pilih Status -</option>
                                                <option value="Lunas"
                                                    {{ $pembayaran->status == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                                                <option value="Belum Lunas"
                                                    {{ $pembayaran->status == 'Belum Lunas' ? 'selected' : '' }}>Belum
                                                    Lunas</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('pembayaran.index') }}" class="btn btn-danger">Batal</a>&nbsp;
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function hitungHarga() {
            var harga_pajak = document.getElementById("pajak_id").value;
            var perbulan = document.getElementById("perbulan").value;

            var hitung = harga_pajak * perbulan;
            document.getElementById("total").value = hitung;
        }

        function kembalianBayar() {
            var bayar = document.getElementById("bayar").value;
            var total = document.getElementById("total").value;

            var kembali = bayar - total;
            document.getElementById("kembali").value = kembali;
        }
    </script>
@endsection
