@extends('layout.main')
@section('title', 'Daftar pembayaran Online')


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
                        <a href="{{ route('pembayaran.index') }}">Pembayaran</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Daftar Pembayaran Online</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Daftar Pembayaran Online</h4>

                                <a class="btn btn-danger btn-round ml-auto" href="{{ route('cetak_online') }}"
                                    target="_blank">
                                    <i class="fas fa-print"></i>
                                    Cetak
                                </a>
                                {{-- <a class="btn btn-warning btn-round ml-3" href="{{ route('cetak_pembayaran_form') }}"
                                    target="_blank">
                                    <i class="fas fa-filter"></i>
                                    Filter
                                </a> --}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                {{-- <div class="col-md-4">
                                    <label>Status</label>
                                    <select name="filter-status" class="form-control filter" id="filter-status">
                                        <option value="">- Pilih Status -</option>
                                        <option value="Lunas">Lunas</option>
                                        <option value="Belum Lunas">Belum Lunas</option>
                                    </select>
                                </div> --}}
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table id="daftarpembayaran" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Petugas</th>
                                            <th>Nama Pedagang</th>
                                            <th>Nomor Register</th>
                                            <th>Nomor Toko</th>
                                            <th>Jenis Toko</th>
                                            <th>Ukuran</th>
                                            <th>Massa Kontrak</th>
                                            <th>Harga Pajak</th>
                                            <th>Total</th>
                                            <th>Bayar</th>
                                            <th>Kembali</th>
                                            <th>Keterangan</th>
                                            <th>Bukti Pembayaran</th>
                                            <th style="width: 10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pembayarans as $pembayaran)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if ($pembayaran->pegawai_id)
                                                    {{$pembayaran->pegawai_id}}
                                                    @else
                                                    Online
                                                    @endif
                                                </td>
                                                <td>{{ $pembayaran->pedagang->nama }}</td>
                                                <td>{{ $pembayaran->pedagang->no_register }}</td>
                                                <td>{{ $pembayaran->pedagang->toko->no_toko }}</td>
                                                <td>{{ $pembayaran->pedagang->toko->jenis_toko }}</td>
                                                <td>{{ $pembayaran->pedagang->toko->ukuran }}</td>
                                                <td>{{ $pembayaran->pedagang->massa_kontrak }} Bulan</td>
                                                <td>Rp.{{ currency($pembayaran->pajak_id) }}</td>
                                                <td>Rp.{{ currency($pembayaran->total) }}</td>
                                                <td>Rp.{{ currency($pembayaran->bayar) }}</td>
                                                <td>Rp.{{ currency($pembayaran->kembali) }}</td>
                                                <td>
                                                    @if ($pembayaran->status)
                                                    {!! badge($pembayaran->status) !!}
                                                    @else
                                                    Online
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($pembayaran->bukti)
                                                    <a href="{{asset('buktibyr/'.$pembayaran->bukti) }}" target="#blank" rel="noopener noreferrer">Lihat Gambar</a>
                                                    @else
                                                    Pembayaran Langsung
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary btn-border dropdown-toggle"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">Aksi</button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="{{ route('pembayaran.detail', $pembayaran->id) }}">Cetak
                                                            Struk</a>
                                                        <div role="separator" class="dropdown-divider"></div>
                                                        <a class="dropdown-item"
                                                            href="{{ route('pembayaran.edit', $pembayaran->id) }}">Edit</a>
                                                        <div role="separator" class="dropdown-divider"></div>
                                                        <a class="dropdown-item" data-toggle="modal"
                                                            data-target="#hapusModal{{ $pembayaran->id }}">Hapus</a>
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
    @foreach ($pembayarans as $pembayaran)
        <div class="modal fade" id="hapusModal{{ $pembayaran->id }}" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header no-bd">
                        <h5 class="modal-title">
                            <span class="fw-mediumbold">
                                Hapus Data pembayaran</span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('pembayaran.hapus', $pembayaran->id) }}" method="POST">
                        @method ('DELETE')
                        @csrf
                        <div class="modal-body">
                            <p>Yakin untuk menghapus data dengan nama {{ $pembayaran->pedagang->nama }} ?</p>
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
    <script type="text/javascript">
        let status = $('#filter-status').val()

        // data: function(s) {
        //     s.status = status;
        //     return d
        // }
        $(document).ready(function() {
            $('#daftarpembayaran').DataTable({
                "responsive": true,
                "autoWidth": true,
                "pageLength": 10,
            });

            $('.btn-filter').click(function(e) {
                e.preventDefault();

                $('#modal-filter').modal();
            })


        });


        $(".filter").on('change', function() {
            status = $('#filter-status').val()
            console.log([status])
            // daftarpembayaran.ajax.reload(null,false)

        })
    </script>
@endsection
