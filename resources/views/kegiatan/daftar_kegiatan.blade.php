@extends('layout.main')
@section('title', 'Daftar Kegiatan')


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
                    <a href="{{route('kegiatan.index')}}">Kegiatan</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Daftar Kegiatan</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar Kegiatan</h4>
                            <a class="btn btn-primary btn-round ml-auto" href="{{route('kegiatan.form.tambah')}}">
                                <i class="fa fa-plus"></i>
                                Tambah
                            </a>
                            <a class="btn btn-danger btn-round ml-3" href="{{route('cetak_kegiatan')}}" target="_blank">
                                <i class="fas fa-print"></i>
                                Cetak
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="daftarkegiatan" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Kegiatan</th>
                                        <th>Judul Kegiatan</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Tempat</th>
                                        <th>Perihal</th>
                                        <th>Keterangan</th>
                                        {{-- <th>Foto</th> --}}
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kegiatans as $kegiatan)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$kegiatan->kode_kegiatan}}</td>
                                        <td>{{$kegiatan->judul_kegiatan}}</td>
                                        <td>{{$kegiatan->tanggal_mulai}}</td>
                                        <td>{{$kegiatan->tanggal_selesai}}</td>
                                        <td>{{$kegiatan->tempat}}</td>
                                        <td>{{$kegiatan->perihal}}</td>
                                        <td>{{$kegiatan->keterangan}}</td>
                                        {{-- <td>{!!badges($kegiatan->keterangan)!!}</td>
                                        <td>
                                            <a href="{{asset('fotoKegiatan/'.$kegiatan->foto) }}" target="#blank" rel="noopener noreferrer">Lihat Gambar</a>
                                        </td> --}}
                                        <td>
                                            <button class="btn btn-primary btn-border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('kegiatan.detail', $kegiatan->id) }}">Surat Kegiatan</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{route('kegiatan.edit', $kegiatan->id)}}">Edit</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#hapusModal{{$kegiatan->id}}">Hapus</a>
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
@foreach ($kegiatans as $kegiatan)
<div class="modal fade" id="hapusModal{{$kegiatan->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Hapus Data kegiatan</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('kegiatan.hapus', $kegiatan->id)}}" method="POST">
                @method ('DELETE')
                @csrf
                <div class="modal-body">
                    <p>Yakin untuk menghapus data dengan kode kegiatan {{$kegiatan->kode_kegiatan}} ?</p>
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
        $('#daftarkegiatan').DataTable({
            "pageLength": 10,
        });
    });
</script>
@endsection
