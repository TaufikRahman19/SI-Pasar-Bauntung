@extends('layout.main')
@section('title', 'Daftar Pegawai')


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
                        <a href="{{ route('pegawai.index') }}">Pegawai</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Daftar Pegawai</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Daftar Pegawai</h4>
                                <a class="btn btn-primary btn-round ml-auto" href="{{ route('pegawai.form.tambah') }}">
                                    <i class="fa fa-plus"></i>
                                    Tambah
                                </a>
                                <a class="btn btn-danger btn-round ml-3" href="{{ route('cetak_pegawai') }}"
                                    target="_blank">
                                    <i class="fas fa-print"></i>
                                    Cetak
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="daftarpegawai" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIK</th>
                                            <th>Nama Pegawai</th>
                                            <th>Jabatan</th>
                                            <th>Jenis Kelamin</th>
                                            <th>No Telepon</th>
                                            <th>Status</th>
                                            <th>TMT</th>
                                            <th>SK Pegawai</th>
                                            <th style="width: 10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pegawais as $pegawai)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $pegawai->nik_pegawai }}</td>
                                                <td>{{ $pegawai->nama_pegawai }}</td>
                                                <td>{{ $pegawai->jabatan }}</td>
                                                <td>{{ $pegawai->jeniskelamin }}</td>
                                                <td>{{ $pegawai->notelpon }}</td>
                                                <td>{{ $pegawai->status }}</td>
                                                <td>{{ $pegawai->tmt }}</td>
                                                <td>
                                                    @if ($pegawai->sk_pegawai)
                                                        <a href="{{ asset('sk_pegawai/' . $pegawai->sk_pegawai) }}"
                                                            target="#blank" rel="noopener noreferrer">Lihat SK Pegawai</a>
                                                    @else
                                                        Tidak Ada Data
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary btn-border dropdown-toggle"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">Aksi</button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="{{ route('pegawai.edit', $pegawai->id) }}">Edit</a>
                                                        <div role="separator" class="dropdown-divider"></div>
                                                        <a class="dropdown-item" data-toggle="modal"
                                                            data-target="#hapusModal{{ $pegawai->id }}">Hapus</a>
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
    @foreach ($pegawais as $pegawai)
        <div class="modal fade" id="hapusModal{{ $pegawai->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header no-bd">
                        <h5 class="modal-title">
                            <span class="fw-mediumbold">
                                Hapus Data pegawai</span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('pegawai.hapus', $pegawai->id) }}" method="POST">
                        @method ('DELETE')
                        @csrf
                        <div class="modal-body">
                            <p>Yakin untuk menghapus data dengan nama {{ $pegawai->nama_pegawai }} ?</p>
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
            $('#daftarpegawai').DataTable({
                "pageLength": 10,
            });
        });
    </script>
@endsection
