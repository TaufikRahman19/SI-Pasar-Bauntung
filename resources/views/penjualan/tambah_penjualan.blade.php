@extends('layout.main')
@section('title', 'Tambah Penjualan')


@section('contain')

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Penjualan</h4>
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
                    <a href="{{route('penjualan.index')}}">Penjualan</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tambah Penjualan</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah Penjualan</h4>
                        </div>
                    </div>
                    <form id="purchaseForm" action="{{route('penjualan.tambah')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4 pr-0">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control form-control" id="tglPembelian" name="tglPembelian">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Nama Pembeli</label>
                                        <input type="text" class="form-control form-control" name="namaPembeli">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamatPembeli" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4 pr-0">
                                    <div class="form-group">
                                        <label>Status Pembayaran</label>
                                        <select class="form-control" id="status" name="paymentStatus">
                                            <option value="Lunas">Lunas</option>
                                            <option value="Sebagian">Sebagian</option>
                                            <option value="Belum" selected>Belum</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4 pr-0">
                                    <div class="form-group">
                                        <label>Jumlah yang Dibayarkan</label>
                                        <input type="number" class="form-control form-control" id="jmlBayar" name="jmlBayar" value="0">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card-header">
                                    <div class="d-flex align-items-center">
                                        <span class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#tambahModal">
                                            <i class="fa fa-plus"></i>
                                            Tambah Item
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="daftarItem" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama Item</th>
                                                    <th>Jumlah</th>
                                                    <th>Unit</th>
                                                    <th>Harga Satuan</th>
                                                    <th>Total</th>
                                                    <th style="width: 10%">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="5" style="text-align: center;"><b>Total</b></td>
                                                    <td><b><span id="grandTotal">0</span></b></td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{route('penjualan.index')}}" class="btn btn-danger">Batal</a>&nbsp;
                            <button type="reset" class="btn btn-info">Reset</button>&nbsp;
                            <button type="submit" class="btn btn-success" id="submitPurchase">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')
<!-- Tambal Modal -->
<div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Tambah Data Item</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="tambahItem">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Item</label>
                                <input type="text" class="form-control form-control" id="namaItem">
                            </div>
                        </div>
                        <div class="col-md-6 pr-0">
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" class="form-control form-control" id="jumlahItem">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Unit</label>
                                <input type="text" class="form-control form-control" id="unitItem">
                                <small class="form-text text-muted">Contoh Unit : Sak, Kg, Meter</small>
                            </div>
                        </div>
                        <div class="col-md-6 pr-0">
                            <div class="form-group">
                                <label>Harga Satuan</label>
                                <input type="text" class="form-control form-control" id="hargaItem" value="0">
                                <small id="hargahelp" class="form-text text-muted">Kosongi jika tidak ada harga satuan</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Total</label>
                                <input type="number" class="form-control form-control" id="totalItem">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer no-bd">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success" id="simpan" data-dismiss="modal">Simpan</button>
            </div>

        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Edit Data Item</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{url('/')}}">
                <div class="modal-body">
                    <input type="hidden" id="idItemEdit">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Nama Item</label>
                                <input type="text" class="form-control form-control" id="namaItemEdit">
                            </div>
                        </div>
                        <div class="col-md-6 pr-0">
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" class="form-control form-control" id="jumlahItemEdit">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Unit</label>
                                <input type="text" class="form-control form-control" id="unitItemEdit">

                            </div>
                        </div>
                        <div class="col-md-6 pr-0">
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" class="form-control form-control" id="hargaItemEdit">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Total</label>
                                <input type="number" class="form-control form-control" id="totalItemEdit">
                                <input type="hidden" id="totalItemEditHidden">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button class="btn btn-success" id="simpanEdit" data-dismiss="modal">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Hapus Modal -->
<div class="modal fade" id="hapusModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Hapus Data Item</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Yakin untuk menghapus data ini ?</p>
                <input type="hidden" id="hapusItemId">
            </div>
            <div class="modal-footer no-bd">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button id="hapusItemBtn" class="btn btn-success" data-dismiss="modal">Hapus</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{asset('assets/js/plugin/sweetalert/sweetalert2.all.min.js')}}"></script>
<script src="{{asset('assets/js/alert.js')}}"></script>
<script>
    $(document).ready(function() {
        document.getElementById("tglPembelian").valueAsDate = new Date()


        var listItem = $('#daftarItem').DataTable({
            "pageLength": 7,
            "columns": [{
                    "data": "nomor"
                },
                {
                    "data": "nama"
                },
                {
                    "data": "jumlahItem"
                },
                {
                    "data": "unitItem"
                },
                {
                    "data": "hargaItem"
                },
                {
                    "data": "totalItem"
                },
                {
                    "data": "action"
                }
            ]

        });
        var counter = 1;
        $('#simpan').click(function() {
            let data = {
                'nomor': counter,
                'nama': $('#namaItem').val(),
                'jumlahItem': $('#jumlahItem').val(),
                'unitItem': $('#unitItem').val(),
                'hargaItem': $('#hargaItem').val(),
                'totalItem': $('#totalItem').val(),
                'action': `<button class="btn btn-primary btn-border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                                            <div class="dropdown-menu">
                                                            <span class="dropdown-item editDaftarItem" data-toggle="modal" data-target="#editModal"  data-row="${counter}">Edit</span>
                                                            <div role="separator" class="dropdown-divider"></div>
                                                            <span class="dropdown-item hapusDaftarItem" data-toggle="modal" data-target="#hapusModal" data-row="${counter}">Hapus</span>
                                                        </div>`
            };


            listItem.row.add(data).draw();


            $('#grandTotal').html(parseInt($('#grandTotal').html()) + parseInt($('#totalItem').val()));
            counter++;
            $('#tambahItem').trigger('reset');
        });

        $('#purchaseForm').submit(function(event) {
            event.preventDefault();
            swalLoading();

            var purchase = $('#purchaseForm').serializeArray().reduce(function(obj, item) {
                obj[item.name] = item.value;
                return obj;
            }, {});
            purchase['grandTotal'] = parseInt($('#grandTotal').html());
            purchase['dataItem'] = [];

            dataItem = listItem.rows().data();

            for (let i = 0; i < dataItem.length; i++) {
                purchase['dataItem'].push(dataItem[i]);
            }


            $.ajax({
                data: purchase,
                url: "{!!  route('penjualan.tambah') !!}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    swal.close();
                    swalSuccess('Tambah Penjualan Sukses');
                    window.location.href = "{!!route('penjualan.index')!!}";
                },
                error: function(data) {
                    swalError('Error, Silahkan coba lagi');

                }
            });

        });

        //tampil modal konfirmasi


    });


    $('#daftarItem').on('click', '.hapusDaftarItem', function() {

        $('#hapusItemId').val($(this).data('row'));
    });

    $('#daftarItem').on('click', '.editDaftarItem', function() {
        index = parseInt($(this).data('row')) - 1;
        let row = $('#daftarItem').DataTable().row(index).data();

        $('#idItemEdit').val(index);
        $('#namaItemEdit').val(row.nama);
        $('#jumlahItemEdit').val(row.jumlahItem);
        $('#unitItemEdit').val(row.unitItem);
        $('#hargaItemEdit').val(row.hargaItem);
        $('#totalItemEdit').val(row.totalItem);
        $('#totalItemEditHidden').val(row.totalItem)

    });

    $('#simpanEdit').click(function(e) {
        e.preventDefault();
        id = parseInt($('#idItemEdit').val());
        temp = $('#daftarItem').DataTable().row(id).data();
        temp.nama = $('#namaItemEdit').val();
        temp.jumlahItem = $('#jumlahItemEdit').val();
        temp.unitItem = $('#unitItemEdit').val();
        temp.hargaItem = $('#hargaItemEdit').val();
        temp.totalItem = $('#totalItemEdit').val();
        $('#daftarItem').DataTable().row(id).data(temp);

        grandtotal = parseInt($('#grandTotal').html());
        newgrandTotal = (grandtotal - parseInt($('#totalItemEditHidden').val())) + parseInt($('#totalItemEdit').val());
        $('#grandTotal').html(newgrandTotal);

    })

    $('#hapusItemBtn').click(function() {
        row = parseInt($('#hapusItemId').val()) - 1;

        deletedRow = $('#daftarItem').DataTable().row(row).data();
        grandtotal = parseInt($('#grandTotal').html());
        newgrandTotal = (grandtotal - parseInt(deletedRow.totalItem));
        $('#grandTotal').html(newgrandTotal);

        $('#daftarItem').DataTable().row(row).remove().draw();

        dataItem = $('#daftarItem').DataTable().rows().data();
        for (let index = 0; index < dataItem.length; index++) {

            dataItem[index].nomor = index + 1;
            dataItem[index].action = `<button class="btn btn-primary btn-border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                                            <div class="dropdown-menu">
                                                            <span class="dropdown-item editDaftarItem" data-toggle="modal" data-target="#editModal"  data-row="${index+1}">Edit</span>
                                                            <div role="separator" class="dropdown-divider"></div>
                                                            <span class="dropdown-item hapusDaftarItem" data-toggle="modal" data-target="#hapusModal" data-row="${index+1}">Hapus</span>
                                                        </div>`;
            $('#daftarItem').DataTable().row(index).data(dataItem[index]);

        }


    });

    $('#supp').on('change', function() {
        swalLoading();
        var value = $(this).val();
        $.get(`/supplier/${value}/sales`, function(data) {
            data.forEach(function(item) {
                $('#sales').append(
                    `<option value="${item.id}" selected> ${item.name} </option>`
                );
            });
        });
        swal.close();
    });

    $('#hargaItem').change(function() {
        if (parseInt($(this).val()) > 0) {
            jumlah = parseInt($('#jumlahItem').val());

            totalItem = jumlah * parseInt($(this).val());
            $('#totalItem').val(totalItem);

        }
    });

    $('#jmlBayar').change(function() {
        console.log("sda");
        jumlahBayar = parseInt($(this).val());
        grandTotal = parseInt($('#grandTotal').html());

        if (jumlahBayar >= grandTotal) {
            $('#status').val('Lunas').change();
        } else if (jumlahBayar < grandTotal && jumlahBayar > 0) {
            $('#status').val('Sebagian').change();
        } else if (jumlahBayar <= 0) {
            $('#status').val('Belum').change();
        }

    });



    function tambah_pembelian() {
        var status = document.getElementById("status").value;
        var jml_beli = 1000;
        var jml_bayar = document.getElementById("jmlBayar").value;

        if (status == 'lunas') {
            if (jml_bayar < jml_beli || jml_bayar > jml_beli) {
                alert("Jumlah pembayaran tidak sesuai !");
            } else {
                alert("Sukses !");
            }
        } else {
            if (jml_bayar <= 0) {
                alert("Jumlah pembayaran harus lebih dari 0 !");
            } else if (jml_bayar == jml_beli) {
                alert("Status pembayaran tidak sesuai !");
            } else {
                // window.location.href = "{{route('pembelian.tambah')}}";
                alert("Sukses !");
            }
        }
    }
</script>
@endsection
