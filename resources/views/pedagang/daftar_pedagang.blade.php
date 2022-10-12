@extends('layout.main')
@section('title', 'Daftar Pedagang')


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
                    <a href="#">Daftar Pedagang</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar Pedagang</h4>
                            @if (auth()->user()->level=="Pegawai")
                            <a class="btn btn-primary btn-round ml-auto" href="{{route('pedagang.form.tambah')}}">
                                <i class="fa fa-plus"></i>
                                Tambah
                            </a>
                            @endif
                            @if (auth()->user()->level=="Pedagang")
                            <a class="btn btn-primary btn-round ml-auto" href="{{route('datadiri')}}">
                                <i class="fa fa-plus"></i>
                                Tambah
                            </a>
                            @endif
                            <a class="btn btn-danger btn-round ml-3" href="{{route('cetak_pedagang')}}" target="_blank">
                                <i class="fas fa-print"></i>
                                Cetak
                            </a>
                            {{-- <a class="btn btn-warning btn-round ml-3" href="{{ route('cetak_filter') }}"
                                    target="_blank">
                                    <i class="fas fa-filter"></i>
                                    Filter
                                </a> --}}
                            {{-- <div class="col-md-2.3">
                                <form method="GET" class="form-control" action="{{route('pedagang.index')}}">
                                <label>Filter Toko</label>
                                <input type="text" name="keyword">
                                <button type="submit">Seacrh</button>
                            </form>
                            </div> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">

                        </div>
                        <div class="table-responsive">
                            <table id="daftarpedagang" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NIK</th>
                                        <th>No Register</th>
                                        <th>Nama</th>
                                        <th>Jenis Dagang</th>
                                        <th>Jenis Toko</th>
                                        <th>Nomor Toko</th>
                                        <th>Alamat</th>
                                        <th>No Telepon</th>
                                        <th>Massa Kontrak</th>
                                        <th>Pas Foto</th>
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pedagangs as $pedagang)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$pedagang->nik}}</td>
                                        <td>{{$pedagang->no_register}}</td>
                                        <td>{{$pedagang->nama}}</td>
                                        <td>{{$pedagang->jenis_dagang}}</td>
                                        <td>{{$pedagang->toko->jenis_toko}}</td>
                                        <td>{{$pedagang->toko->no_toko}}</td>
                                        <td>{{$pedagang->alamat}}</td>
                                        <td>{{$pedagang->notelpon}}</td>
                                        <td>{{$pedagang->massa_kontrak}} Bulan</td>
                                        <td>
                                            @if ($pedagang->pasfoto)
                                            <a href="{{asset('pasfoto/'.$pedagang->pasfoto) }}" target="#blank" rel="noopener noreferrer">Lihat Pas Foto</a>
                                            @else
                                            Tidak Ada Data
                                        @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('pedagang.kartu', $pedagang->id) }}">Cetak Kartu Pedagang</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{route('pedagang_verif', $pedagang->id)}}">Verifikasi Pembayaran</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{route('pedagang_tunggak', $pedagang->id)}}">Kirim Surat Tunggakan</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{route('pedagang.edit', $pedagang->id)}}">Edit</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#hapusModal{{$pedagang->id}}">Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')
<!-- Hapus Modal -->
@foreach ($pedagangs as $pedagang)
<div class="modal fade" id="hapusModal{{$pedagang->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Hapus Data pedagang</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('pedagang.hapus', $pedagang->id)}}" method="POST">
                @method ('DELETE')
                @csrf
                <div class="modal-body">
                    <p>Yakin untuk menghapus data dengan nama {{$pedagang->nama}} ?</p>
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#daftarpedagang').DataTable({
            "pageLength": 10,
        });
    });
</script>
@endsection
