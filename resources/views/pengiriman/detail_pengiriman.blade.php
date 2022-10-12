@extends('layout.main')
@section('title', 'Detail Pengiriman')


@section('contain')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Pengiriman</h4>
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
                    <a href="{{route('pengiriman.index')}}">Pengiriman</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Detail Pengiriman</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Detail Pengiriman</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3 pr-0">
                                <div class="form-group">
                                    <label>Nama Pembeli</label>
                                    <input type="text" class="form-control form-control" value="{{$pengiriman->nama_pembeli}}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-3 pr-0">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control form-control" value="{{$pengiriman->alamat_pembeli}}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-3 pr-0">
                                <div class="form-group">
                                    <label>Telephone</label>
                                    <input type="text" class="form-control form-control" value="{{$pengiriman->phone}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 pr-0">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" class="form-control form-control" value="{{$pengiriman->tanggal_pengiriman}}" disabled>
                                </div>
                            </div>
                            <div class="col-sm-3 pr-0">
                                <div class="form-group">
                                    <label>Prioritas Pengiriman</label>
                                    <select class="form-control" name="prioritas" disabled>
                                        <option value="penting" {{$pengiriman->prioritas == 'penting' ? 'selected' : ''}}>Penting</option>
                                        <option value="sedang" {{$pengiriman->prioritas == 'sedang' ? 'selected' : ''}}>Sedang</option>
                                        <option value="normal" {{$pengiriman->prioritas == 'normal' ? 'selected' : ''}}>Normal</option>
                                    </select>
                                </div>
                            </div>
                            @isset($pengiriman->driver_id)
                            <div class="col-sm-3 pr-0">
                                <div class="form-group">
                                    <label>Driver</label>
                                    <select class="form-control" name="driver" disabled>
                                        @foreach ($drivers as $driver)
                                        <option value="{{$driver->id}}" {{$driver->id == $pengiriman->driver_id ? 'selected' : ''}}>{{$driver->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endisset
                            @isset($pengiriman->uk_kendaraan)
                            <div class="col-sm-3 pr-0">
                                <div class="form-group">
                                    <label>Uk. Kendaraan</label>
                                    <select class="form-control" name="driver" disabled>
                                        <option value="besar" {{$pengiriman->uk_kendaraan == 'besar' ? 'selected' : ''}}>Besar</option>
                                        <option value="kecil" {{$pengiriman->uk_kendaraan == 'kecil' ? 'selected' : ''}}>Kecil</option>
                                    </select>
                                </div>
                            </div>
                            @endisset
                        </div>
                        <div class="col-md-12">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Daftar Item</h4>
                                </div>
                            </div><br>
                            <div class="table-responsive">
                                <table id="daftarItemPenjualan" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Nama Item</th>
                                            <th class="text-center">Unit</th>
                                            <th class="text-center">Jumlah Dikirim</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pengiriman->items as $item)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->product->nama_produk}}</td>
                                            <td>{{$item->unit->name_unit}}</td>
                                            <td>{{$item->quantity}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="{{route('pengiriman.index')}}" class="btn btn-info">Kembali</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('assets/js/plugin/sweetalert/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('assets/js/alert.js')}}"></script>

@endsection