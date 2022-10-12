@extends('layout.main')
@section('title', 'Edit Perpanjangan Pedagang')

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
                        <a href="{{ route('perpanjangan.index') }}">Perpanjangan</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Perpanjangan</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Edit Perpanjangan</h4>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('perpanjangan.update', $perpanjangan->id) }}">
                            @method ('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Nama Pedagang</label>
                                            <select class="form-control form-control" name="pedagang_id" id="pedagang_id"
                                                autofocus required>
                                                <option disabled value="">- Pilih Nama Pedagang -</option>
                                                <option value="{{ $perpanjangan->pedagang_id }}">
                                                    {{ $perpanjangan->pedagang->nama }}</option>
                                                @foreach ($pedagangs as $pedagang)
                                                    <option value="{{ $pedagang->id }}">{{ $pedagang->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Massa Perpanjangan</label>
                                            <input type="number" class="form-control form-control" id="bulan"
                                                name="bulan" value="{{ $perpanjangan->bulan }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Pajak</label>
                                            <select class="form-control form-control" name="pajak_id" id="pajak_id"
                                                required>
                                                <option disabled value="">- Pilih Jenis Pajak -</option>
                                                <option value="{{ $perpanjangan->pajak_id }}">
                                                    {{ $perpanjangan->pajak_id }}
                                                </option>
                                                @foreach ($pajaks as $pajak)
                                                    <option value="{{ $pajak->harga_pajak }}">{{ $pajak->jenis_toko }}
                                                        -
                                                        {{ $pajak->harga_pajak }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Total</label>
                                            <input type="number" class="form-control form-control" id="total"
                                                name="total" value="{{ $perpanjangan->total }}" onclick="hitungHarga()"
                                                readonly required>
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
            var bulan = document.getElementById("bulan").value;

            var hitung = harga_pajak * bulan;
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
