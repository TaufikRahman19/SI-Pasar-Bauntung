@extends('layout.main')
@section('title', 'Daftar Keterangan Kegiatan')


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
                    <a href="{{route('event.index')}}">Keterangan Kegiatan</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Daftar Keterangan</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar Keterangan</h4>
                            <a class="btn btn-primary btn-round ml-auto" href="{{route('event.form.tambah')}}">
                                <i class="fa fa-plus"></i>
                                Tambah
                            </a>
                            <a class="btn btn-danger btn-round ml-3" href="{{route('cetak_event')}}" target="_blank">
                                <i class="fas fa-print"></i>
                                Cetak
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="daftarevent" class="display table table-striped table-hover">
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
                                        <th>Status</th>
                                        <th>Foto</th>
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $event)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$event->kegiatan->kode_kegiatan}}</td>
                                        <td>{{$event->kegiatan->judul_kegiatan}}</td>
                                        <td>{{$event->kegiatan->tanggal_mulai}}</td>
                                        <td>{{$event->kegiatan->tanggal_selesai}}</td>
                                        <td>{{$event->kegiatan->tempat}}</td>
                                        <td>{{$event->kegiatan->perihal}}</td>
                                        <td>{{$event->kegiatan->keterangan}}</td>
                                        <td>{{$event->status}}</td>
                                        <td>
                                            <a href="{{asset('fotoKegiatan/'.$event->foto) }}" target="#blank" rel="noopener noreferrer">Lihat Gambar</a>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('event.detail', $event->id) }}">Surat Kegiatan</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{route('event.edit', $event->id)}}">Edit</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#hapusModal{{$event->id}}">Hapus</a>
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
@foreach ($events as $event)
<div class="modal fade" id="hapusModal{{$event->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Hapus Data event</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('event.hapus', $event->id)}}" method="POST">
                @method ('DELETE')
                @csrf
                <div class="modal-body">
                    <p>Yakin untuk menghapus data dengan kode kegiatan {{$event->kegiatan->kode_kegiatan}} ?</p>
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
        $('#daftarevent').DataTable({
            "pageLength": 10,
        });
    });
</script>
@endsection
