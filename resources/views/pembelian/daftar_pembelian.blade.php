@extends('layout.main')
@section('title', 'Daftar Pembelian')


@section('contain')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Pembelian</h4>
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
                    <a href="{{route('pembelian.index')}}">Pembelian</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Daftar Pembelian</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar Pembelian</h4>
                            <a class="btn btn-primary btn-round ml-auto" href="{{route('pembelian.form.tambah')}}">
                                <i class="fa fa-plus"></i>
                                Tambah
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="daftarPembelian" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Supplier</th>
                                        <th>No. Referensi</th>
                                        <th>Total Pembelian</th>
                                        <th>Total Pembayaran</th>
                                        <th>Sisa Pembayaran</th>
                                        <th>Status Pembayaran</th>
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchases as $purchase)
                                    <tr>
                                        <td>{{$purchase->purchase_date}}</td>
                                        <td>{{$purchase->supplier->name}}</td>
                                        <td>{{$purchase->reference_no}}</td>
                                        <td class="text-right">{{number_format($purchase->total, 2)}}</td>
                                        <td class="text-right">{{number_format($purchase->paid_amount, 2)}}</td>
                                        <td class="text-right">{{number_format($purchase->total-$purchase->paid_amount, 2)}}</td>
                                        <td>{!!badge($purchase->payment_status)!!}</td>
                                        <td>
                                            <button class="btn btn-primary btn-border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('pembelian.detail', $purchase->id)}}">Detail Pembelian</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{route('pembelian.form.edit', $purchase->id)}}">Edit Pembelian</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item tambahPembayaran" id="tambahPembayaran" data-toggle="modal" data-target="#tambahModal" data-purchase="{{$purchase->id}}">Tambah Pembayaran</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="{{route('pembayaran.list', $purchase->id)}}">Detail Pembayaran</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#hapusModal{{$purchase->id}}">Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" style="text-align: center;"><b>Total Tagihan Keseluruhan </b></td>
                                        <td class="text-right"><b><span id="grandTotal">{{number_format($purchases->sum('bill'), 2)}}</span></b></td>
                                        <td colspan="2"></td>
                                    </tr>
                                </tfoot>
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
<!-- Tambah Modal -->
<div class=" modal fade" id="tambahModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Tambah Pembayaran</span>
                </h5>
                <button type="button" class="close close-pembayaran" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="formPembayaran" method="POST" onsubmit="return validateFormPembayaran()">
                @csrf
                <input type="hidden" name="purchase_id" id="purchase_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" class="form-control form-control" id="tglPembayaran" name="tglPembayaran">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Jumlah yang Harus Dibayar</label>
                                <input type="number" class="form-control form-control" id="totalTagihan" value="" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Jenis Pembayaran</label>
                                <select class="form-control" id="jenisPembayaran" disabled>
                                    <option>- Pilih Jenis -</option>
                                    <option value="lunas">Bayar Lunas</option>
                                    <option value="sebagian">Bayar Sebagian</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Jumlah Pembayaran</label>
                                <input type="number" class="form-control form-control" id="totalPembayaran" name="totalPembayaran">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Sales</label>
                                <input type="text" class="form-control form-control" id="namaSales" name="namaSales">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Telephone</label>
                                <input type="number" class="form-control form-control" id="phoneSales" name="phoneSales">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" class="btn btn-danger close-pembayaran" data-dismiss="modal">Batal</button>
                    <button type="submit" id="simpanPembayaranBtn" class="btn btn-success" disabled>Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class=" modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Edit Data Pembelian</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('/')}}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" class="form-control form-control" id="tglPembelianEdit">
                            </div>
                        </div>
                        <div class="col-md-6 pr-0">
                            <div class="form-group">
                                <label>Supplier</label>
                                <select class="form-control" id="supplierEdit">
                                    <option>--Pilih Supplier--</option>
                                    <option>Dimas</option>
                                    <option>Icha</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sales</label>
                                <select class="form-control" id="salesEdit">
                                    <option>--Pilih Sales</option>
                                    <option>Dimas</option>
                                    <option>Icha</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Total</label>
                                <input type="number" class="form-control form-control" id="totalEdit">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Hapus Modal -->
@foreach ($purchases as $purchase)
<div class="modal fade" id="hapusModal{{$purchase->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Hapus Data Pembelian</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('pembelian.hapus', $purchase->id)}}" method="POST">
                @method ('DELETE')
                @csrf
                <div class="modal-body">
                    <p>Yakin untuk menghapus data dengan nomor {{$purchase->reference_no}}?</p>
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
<script src="{{asset('assets/js/plugin/sweetalert/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('assets/js/alert.js')}}"></script>
<script>
    $(document).ready(function() {
        document.getElementById("tglPembayaran").valueAsDate = new Date()
        $('#daftarPembelian').DataTable({
            "pageLength": 10,
            "order": [
                [0, "desc"]
            ]
        });


    });

    $('.close-pembayaran').click(function() {
        $('#formPembayaran').trigger('reset');
        $('#jenisPembayaran').attr("disabled", "disabled");
        $('#formPembayaran').removeAttr("action");
        document.getElementById("tglPembayaran").valueAsDate = new Date()


    })

    $('.tambahPembayaran').click(function() {
        var purchase_id = $(this).data('purchase');

        $('#formPembayaran').attr("action", "{{route('pembayaran.tambah',['id'=>':id'])}}".replace(':id', purchase_id));
        var _url = "{{route('pembayaran.form.tambah',['id'=>':id'])}}".replace(':id', purchase_id);
        // console.log($('#formPembayaran').serializeArray());
        $.ajax({
            url: _url,
            type: "GET",
            dataType: 'json',
            success: function(data) {
                $('#purchase_id').val(purchase_id);
                $('#totalTagihan').val(data.must_pay);
                $('#jenisPembayaran').removeAttr("disabled");
                $('#simpanPembayaranBtn').removeAttr("disabled");

            },
            error: function(data) {
                console.log("Error");
            }
        });

    })

    $('#formPembayaran').submit(function(e) {
        e.preventDefault();
        var data = $(this).serializeArray();
        var _url = $(this).attr('action');


        if (validateFormPembayaran()) {
            swalLoading();
            $.ajax({
                data: data,
                url: _url,
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    swal.close();
                    swalSuccess("Tambah Pembayaran Berhasil")
                    window.location.href = "{!!route('pembayaran.list',['id'=>':id'])!!}".replace(':id', $('#purchase_id').val());
                },
                error: function(data) {
                    swalError('Maaf Terjadi Error');

                }
            });
        }

    });

    $('#jenisPembayaran').change(function() {
        if ($(this).val() == 'lunas') {
            $('#totalPembayaran').val($('#totalTagihan').val());
        }
    });

    $('#totalPembayaran').blur(function() {
        totalTagihan = parseInt($('#totalTagihan').val());
        totalPembayaran = parseInt($(this).val());

        if (totalPembayaran >= totalTagihan) {
            $('#jenisPembayaran').val('lunas').change();
        } else if (totalPembayaran < totalTagihan && totalPembayaran > 0) {
            $('#jenisPembayaran').val('sebagian').change();
        }

    });

    function tambah_pembayaran() {
        var jml_bayar = document.getElementById("totalPembayaran").value;
        var jml_beli = document.getElementById("totalPembelian").value;

        if (jml_bayar < jml_beli || jml_bayar > jml_beli) {
            alert("Jumlah pembayaran tidak sesuai !");
        } else {
            // window.location.href = "{{url('pembelian')}}";
            alert("Sukses !");
        }
    }

    function validateFormPembayaran() {
        if ($('#jenisPembayaran').val() == "") {
            swalError("Jenis Pembayaran Tidak Boleh Kosong");
            return false;
        } else if ($('#totalPembayaran').val() == "" || $('#totalPembayaran').val() == "0") {
            swalError("Jumlah yang dibayarkan tidak Boleh Kosong");
            return false;
        }
        return true;
    }
</script>
@endsection