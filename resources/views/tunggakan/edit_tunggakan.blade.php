@extends('layout.main')
@section('title', 'Edit Tunggakan Pedagang')

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
                        <a href="{{ route('tunggakan.index') }}">Tunggakan</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Tunggakan</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Edit Tunggakan</h4>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('tunggakan.update', $tunggakan->id) }}">
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
                                                <option value="{{ $tunggakan->pedagang_id }}">
                                                    {{ $tunggakan->pedagang->nama }}</option>
                                                @foreach ($pedagangs as $pedagang)
                                                    <option value="{{ $pedagang->id }}">{{ $pedagang->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Massa Tunggakan</label>
                                            <input type="number" class="form-control form-control" id="bulan" name="bulan" value="{{ $tunggakan->bulan}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Pajak</label>
                                            <select class="form-control form-control" name="pajak_id" id="pajak_id"
                                                required>
                                                <option disabled value="">- Pilih Jenis Pajak -</option>
                                                <option value="{{ $tunggakan->pajak_id }}">
                                                    {{ $tunggakan->pajak_id }}
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
                                                name="total" value="{{ $tunggakan->total }}" onclick="hitungHarga()"
                                                readonly required>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <select class="form-control form-control" name="keterangan" id="keterangan ">
                                                <option value="" selected disabled>- Pilih Keterangan -</option>
                                                <option value="Terkirim"
                                                    {{ $tunggakan->keterangan == 'Terkirim' ? 'selected' : '' }}>Terkirim</option>
                                                <option value="Belum Terkirim"
                                                    {{ $tunggakan->keterangan == 'Belum Terkirim' ? 'selected' : '' }}>Belum
                                                    Terkirim</option>
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
