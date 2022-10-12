@extends('layout.main')
@section('title', 'Edit Pembelian')


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
                    <a href="#">Edit Pembelian</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Pembelian</h4>
                        </div>
                    </div>
                    <form id="purchaseForm" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-5 pr-0">
                                    <div class="form-group">
                                        <label>Nomor Refrensi</label>
                                        <input type="text" class="form-control form-control" name="nomorRefrensi" value="{{$purchase->reference_no}}" disabled>
                                    </div>
                                </div>
                                <div class="col-sm-5 pr-0">
                                    <div class="form-group">
                                        <label>Nomor Nota</label>
                                        <input type="text" class="form-control form-control" id="nota" name="nota" value="{{$purchase->nota_no}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5 pr-0">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control form-control" id="tglPembelian" name="tglPembelian" value="{{$purchase->purchase_date}}">
                                    </div>
                                </div>
                                <div class="col-sm-5 pr-0">
                                    <div class="form-group">
                                        <label>Supplier</label>
                                        <select class="form-control" id="supplier" name="supp">
                                            <option>- Pilih Supplier -</option>
                                            <option value="{{$purchase->supplier_id}}" selected>{{$purchase->supplier->name}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5 pr-0">
                                    <div class="form-group">
                                        <label>Status Pembayaran</label>
                                        <select class="form-control" id="status" name="paymentStatus" disabled>
                                            <option value="Lunas" {{$purchase->payment_status == 'lunas'? 'selected': '' }}>Lunas</option>
                                            <option value="Sebagian" {{$purchase->payment_status == 'sebagian'? 'selected': '' }}>Sebagian</option>
                                            <option value="Belum" {{$purchase->payment_status == 'belum' ? 'selected': '' }}>Belum</option>
                                        </select>
                                        <small><i>Mengganti status pembayaran dapat dilakukan di edit pembayaran atau tambah pembayaran</i></small>
                                    </div>
                                </div>
                                <div class="col-sm-5 pr-0">
                                    <div class="form-group">
                                        <label>Jumlah yang telah dibayarkan</label>
                                        <input type="number" class="form-control form-control" id="jmlBayar" name="jmlBayar" value="{{$purchase->paid_amount}}" disabled>
                                        <small><i>Mengganti jumlah yang telah dibayarkan dapat dilakukan di edit pembayaran</i></small>
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
                                                @foreach ($purchase->purchase_items as $item)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$item->product_name}}</td>
                                                    <td>{{$item->quantity}}</td>
                                                    <td>{{$item->unit->name_unit}}</td>
                                                    <td>{{$item->unit_price}}</td>
                                                    <td>{{$item->total}}</td>
                                                    <td>
                                                        <button class="btn btn-primary btn-border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                                        <div class="dropdown-menu">
                                                            <span class="dropdown-item editDaftarItem" data-toggle="modal" data-target="#editModal" data-row="{{$loop->iteration}}">Edit</span>
                                                            <div role="separator" class="dropdown-divider"></div>
                                                            <span class="dropdown-item hapusDaftarItem" data-toggle="modal" data-target="#hapusModal" data-row="{{$loop->iteration}}">Hapus</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="5" style="text-align: center;"><b>Total</b></td>
                                                    <td><b><span id="grandTotal">{{$purchase->total}}</span></b></td>
                                                    <td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
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
                <button type="button" class="btn btn-success" id="simpan" data-dismiss="modal" disabled>Simpan</button>
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
                <p>Yakin untuk menghapus item ini ?</p>
                <input type="hidden" id="hapusItemId">
            </div>
            <div class="modal-footer no-bd">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="button" id="hapusItemBtn" class="btn btn-success" data-dismiss="modal">Hapus</button>
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
        var listItem = $('#daftarItem').DataTable({
            "pageLength": 10,
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



        var counter = listItem.rows().data().length + 1;
        $('#simpan').click(function() {
            dataItem = listItem.rows().data();


            let data = {
                'nomor': counter,
                'nama': $('#namaItem').val(),
                'jumlahItem': $('#jumlahItem').val(),
                'unitItem': $('#unitItem').val(),
                'hargaItem': $('#hargaItem').val(),
                'totalItem': $('#totalItem').val(),
                'action': `<button class="btn btn-primary btn-border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>\
                                                            <div class="dropdown-menu">\
                                                            <span class="dropdown-item editDaftarItem" data-toggle="modal" data-target="#editModal"  data-row="${counter}">Edit</span>\
                                                            <div role="separator" class="dropdown-divider"></div>\
                                                            <span class="dropdown-item hapusDaftarItem" data-toggle="modal" data-target="#hapusModal" data-row="${counter}">Hapus</span>\
                                                        </div>`
            };

            listItem.row.add(data).draw();
            $('#submitPurchase').removeAttr("disabled");

            $('#grandTotal').html(parseInt($('#grandTotal').html()) + parseInt($('#totalItem').val()));


            counter++;
            $('#tambahModal').modal('toggle');
            $('#simpan').attr("disabled", "disabled");
            $('#tambahItem').trigger('reset');

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
            temp = listItem.row(id).data();
            temp.nama = $('#namaItemEdit').val();
            temp.jumlahItem = $('#jumlahItemEdit').val();
            temp.unitItem = $('#unitItemEdit').val();
            temp.hargaItem = $('#hargaItemEdit').val();
            temp.totalItem = $('#totalItemEdit').val();
            listItem.row(id).data(temp);

            grandtotal = parseInt($('#grandTotal').html());
            newgrandTotal = (grandtotal - parseInt($('#totalItemEditHidden').val())) + parseInt($('#totalItemEdit').val());
            $('#grandTotal').html(newgrandTotal);

        })

        $('#submitPurchase').click(function(event) {
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
                url: "{!!  route('pembelian.edit',['pembelian'=>$purchase->id]) !!}",
                type: "POST",
                dataType: 'json',
                success: function(data) {
                    swal.close();
                    swalSuccess('Ubah data pembelian berhasil');
                    window.location.href = "{!!route('pembelian.detail',['id'=>$purchase->id])!!}";
                },
                error: function(data) {
                    swalError('Error,tidak dapat menambah data');

                }
            });

        });

        //tampil modal konfirmasi
        $('#daftarItem').on('click', '.hapusDaftarItem', function() {
            $('#hapusItemId').val($(this).data('row'));
        });

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

            if (dataItem.length <= 0) {
                $('#submitPurchase').attr("disabled", "disabled");
            }
        });


    });

    $('#namaItem').change(function() {
        if ($(this).val() == "") {
            $('#simpan').attr("disabled", "disabled");
        } else {
            $('#simpan').removeAttr("disabled");

        }
    })

    $('#hargaItem').change(function() {
        if (parseInt($(this).val()) > 0) {
            jumlah = parseInt($('#jumlahItem').val());

            totalItem = jumlah * parseInt($(this).val());
            $('#totalItem').val(totalItem);

        }
    });
</script>
@endsection