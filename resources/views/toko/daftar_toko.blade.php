@extends('layout.main')
@section('title', 'Daftar Toko')


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
                    <a href="{{route('toko.index')}}">Toko</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Daftar Toko</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar Toko</h4>
                            <a class="btn btn-primary btn-round ml-auto" href="{{route('toko.form.tambah')}}">
                                <i class="fa fa-plus"></i>
                                Tambah
                            </a>
                            <a class="btn btn-danger btn-round ml-3" href="{{route('cetak_toko')}}" target="_blank">
                                <i class="fas fa-print"></i>
                                Cetak
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="daftartoko" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nomor Toko</th>
                                        <th>Jenis Toko</th>
                                        <th>Ukuran</th>
                                        <th>Zonasi</th>
                                        <th>Foto</th>
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tokos as $toko)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$toko->no_toko}}</td>
                                        <td>{{$toko->jenis_toko}}</td>
                                        <td>{{$toko->ukuran}}</td>
                                        <td>{{$toko->zonasi}}</td>
                                        <td>
                                            <a href="{{asset('fotoToko/'.$toko->foto) }}" target="#blank" rel="noopener noreferrer">Lihat Gambar</a>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('toko.edit', $toko->id)}}">Edit</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#hapusModal{{$toko->id}}">Hapus</a>
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
@foreach ($tokos as $toko)
<div class="modal fade" id="hapusModal{{$toko->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Hapus Data toko</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('toko.hapus', $toko->id)}}" method="POST">
                @method ('DELETE')
                @csrf
                <div class="modal-body">
                    <p>Yakin untuk menghapus data Nomor Toko {{$toko->no_toko}} ?</p>
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
        $('#daftartoko').DataTable({
            "pageLength": 10,
        });
    });
</script>
@endsection
