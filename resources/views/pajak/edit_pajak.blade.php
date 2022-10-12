@extends('layout.main')
@section('title', 'Edit Pajak')

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
                    <a href="{{route('pajak.index')}}">Pajak</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Pajak</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Pajak</h4>
                        </div>
                    </div>
                    <form method="POST" action="{{route('pajak.update', $pajak->id)}}">
                        @method ('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Jenis Toko</label>
                                        <input type="text" class="form-control form-control" id="jenis_toko" name="jenis_toko" value="{{$pajak->jenis_toko}}" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label>Ukuran</label>
                                        <input type="text" class="form-control form-control" id="ukuran" name="ukuran" value="{{$pajak->ukuran}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Per Meter</label>
                                        <input type="number" class="form-control form-control" id="per_meter" name="per_meter" value="{{$pajak->per_meter}}" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Harga Pajak</label>
                                        <input type="number" class="form-control form-control" id="harga_pajak" name="harga_pajak" value="{{$pajak->harga_pajak}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Per Hari</label>
                                        <input type="number" class="form-control form-control" id="per_hari" name="per_hari" value="{{$pajak->per_hari}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Bulan</label>
                                        <input type="number" class="form-control form-control" id="bulan" name="bulan" value="{{$pajak->bulan}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Total</label>
                                        <input type="number" class="form-control form-control" id="total" name="total" value="{{$pajak->total}}" onclick="hitungPajak()" required readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{route('pajak.index')}}" class="btn btn-danger">Batal</a>&nbsp;
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
@section('script')
    <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('assets/js/alert.js') }}"></script>
    <script>
        function hitungPajak() {
            var harga_pajak = document.getElementById("harga_pajak").value;
            var bulan = document.getElementById("bulan").value;

            var hitung = harga_pajak * bulan;
            document.getElementById("total").value = hitung;
        }
    </script>
@endsection
