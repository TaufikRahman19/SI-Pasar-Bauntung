@extends('layout.main')
@section('title', 'Edit Pedagang')

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
                    <a href="{{route('pedagang.index')}}">Pedagang</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Pedagang</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Pedagang</h4>
                        </div>
                    </div>
                    <form method="POST" action="{{route('pedagang.update', $pedagang->id)}}" enctype="multipart/form-data">
                        @method ('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="number" class="form-control form-control" id="nikPedagangEdit" name="nikPedagangEdit" value="{{$pedagang->nik}}" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control form-control" id="namaPedagangEdit" name="namaPedagangEdit" value="{{$pedagang->nama}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Dagang</label>
                                        <input type="text" class="form-control form-control" id="jenis_dagangPedagangEdit" name="jenis_dagangPedagangEdit" value="{{$pedagang->jenis_dagang}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Toko</label>
                                        <select class="form-control form-control" name="toko_id" id="toko_id" value="{{$pedagang->toko->jenis_toko}}">
                                            <option disabled value="">- Pilih Nomor Toko -</option>
                                            <option value="{{$pedagang->toko_id}}">{{$pedagang->toko->no_toko}} - {{$pedagang->toko->jenis_toko}}</option>
                                            @foreach ($tokos as $toko)
                                            <option value="{{$toko->id}}">{{$toko->no_toko}} - ({{$toko->jenis_toko}})</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control form-control" id="alamatPedagangEdit" name="alamatPedagangEdit" value="{{$pedagang->alamat}}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>No Telepon</label>
                                        <input type="number" class="form-control form-control" id="notelponPedagangEdit" name="notelponPedagangEdit" value="{{$pedagang->notelpon}}" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label>Massa Kontrak</label>
                                        <select class="form-control form-control" name="massa_kontrakPedagangEdit" id="massa_kontrakPedagangEdit ">
                                            <option value="" selected disabled>- Pilih Massa Kontrak -</option>
                                            <option value="6"{{ $pedagang->massa_kontrak == "6" ? 'selected' : ''}}>6 Bulan</option>
                                            <option value="12"{{ $pedagang->massa_kontrak == "12" ? 'selected' : ''}}>12 Bulan</option>
                                            <option value="24"{{ $pedagang->massa_kontrak == "24" ? 'selected' : ''}}>24 Bulan</option>
                                            <option value="36"{{ $pedagang->massa_kontrak == "36" ? 'selected' : ''}}>36 Bulan</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="pasfoto">Masukan Pas Foto</label>
                                        <input type="file" class="form-control form-control" id="pasfoto" name="pasfoto">
                                        <a href="{{asset('pasfoto/'.$pedagang->pasfoto) }}" target="#blank" rel="noopener noreferrer">Lihat File Sebelumnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{route('pedagang.index')}}" class="btn btn-danger">Batal</a>&nbsp;
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
