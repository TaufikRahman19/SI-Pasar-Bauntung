@extends('layout.main')
@section('title', 'Tambah Tunggakan Pedagang')

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
                        <a href="#">Tambah Tunggakan</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tambah Tunggakan</h4>
                            </div>
                        </div>
                        <form action="{{ route('tunggakan.tambah') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nama Pedagang</label>
                                            {{-- <input type="text" class="form-control form-control" id="pedagang_id" name="pedagang_id" onkeyup="autofill()"> --}}
                                            <select class="form-control form-control" name="pedagang_id" id="pedagang_id" onchange="autofill()"
                                                autofocus required>
                                                <option value="" selected disabled>- Pilih Nama Pedagang -</option>
                                                @foreach ($pembayarans as $pembayaran)
                                                    <option value="{{ $pembayaran->pedagang->id }}">{{ $pembayaran->pedagang->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Jenis Pajak</label>
                                            <select class="form-control form-control" name="pajak_id" id="pajak_id"
                                                required>
                                                <option value="" selected disabled>- Pilih Jenis Pajak -</option>
                                                @foreach ($pajaks as $pajak)
                                                    <option value="{{ $pajak->harga_pajak }}">{{ $pajak->jenis_toko }} -
                                                        {{ $pajak->harga_pajak }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Massa Tunggakan</label>
                                            <input type="number" class="form-control form-control" id="bulan" name="bulan">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Total</label>
                                            <input type="number" class="form-control form-control" id="total" name="total"
                                                onclick="hitungHarga()" readonly required>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <select class="form-control form-control" name="keterangan" id="keterangan">
                                                <option value="" selected disabled>- Pilih Keterangan -</option>
                                                <option value="Terkirim">Terkirim</option>
                                                <option value="Belum Terkirim">Belum Terkirim</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="{{ route('tunggakan.index') }}" class="btn btn-danger">Batal</a>&nbsp;
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

        // function autofill(){
        //     let pedagang_id = $("#pedagang_id").val()
        //     console.log(pedagang_id);
        // }
    </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@endsection
