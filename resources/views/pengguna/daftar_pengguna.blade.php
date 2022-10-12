@extends('layout.main')
@section('title', 'Daftar Pengguna')


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
                    <a href="{{route('pengguna.index')}}">Pengguna</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Daftar Pengguna</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar Pengguna</h4>
                            <a class="btn btn-primary btn-round ml-auto" href="{{route('pengguna.form.tambah')}}">
                                <i class="fa fa-plus"></i>
                                Tambah
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="daftarpengguna" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        {{-- <th>Nama Pedagang</th> --}}
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th>Level</th>
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penggunas as $pengguna)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$pengguna->name}}</td>
                                        {{-- <td>{{$pengguna->pedagang->id}}</td> --}}
                                        <td>{{$pengguna->email}}</td>
                                        <td>{{$pengguna->username}}</td>
                                        <td>{{$pengguna->level}}</td>
                                        <td>
                                            <button class="btn btn-primary btn-border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('pengguna.edit', $pengguna->id)}}">Edit</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{route('pengguna_pedagang', $pengguna->id)}}">Verifikasi Pedagang</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#hapusModal{{$pengguna->id}}">Hapus</a>
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
@foreach ($penggunas as $pengguna)
<div class="modal fade" id="hapusModal{{$pengguna->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Hapus Data pengguna</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('pengguna.hapus', $pengguna->id)}}" method="POST">
                @method ('DELETE')
                @csrf
                <div class="modal-body">
                    <p>Yakin untuk menghapus data dengan nama {{$pengguna->name}} ?</p>
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
        $('#daftarpengguna').DataTable({
            "pageLength": 10,
        });
    });
</script>
@endsection
