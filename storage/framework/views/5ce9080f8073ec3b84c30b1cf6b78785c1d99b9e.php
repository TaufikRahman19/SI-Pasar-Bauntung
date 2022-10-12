<?php $__env->startSection('title', 'Daftar Penjualan'); ?>


<?php $__env->startSection('contain'); ?>

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Penjualan</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="<?php echo e(route('home')); ?>">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="<?php echo e(route('penjualan.index')); ?>">Penjualan</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Daftar Penjualan</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar Penjualan</h4>
                            <a class="btn btn-primary btn-round ml-auto" href="<?php echo e(route('penjualan.form.tambah')); ?>">
                                <i class="fa fa-plus"></i>
                                Tambah
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="daftarPenjualan" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>No. Referensi</th>
                                        <th>Nama Pembeli</th>
                                        <th>Alamat Pembeli</th>
                                        <th>Total</th>
                                        <th>Status Pembelian</th>
                                        <th>Status Pembayaran</th>
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($sale->date); ?></td>
                                        <td><?php echo e($sale->reference_no); ?></td>
                                        <td><?php echo e($sale->nama_pembeli); ?></td>
                                        <td><?php echo e($sale->alamat_pembeli); ?></td>
                                        <td><?php echo e(number_format($sale->grandtotal, 2)); ?></td>
                                        <td><?php echo badge($sale->sale_status); ?></td>
                                        <td><?php echo badge($sale->payment_status); ?></td>
                                        <td>
                                            <button class="btn btn-primary btn-border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?php echo e(route('penjualan.detail',['penjualan'=>$sale])); ?>">Detail Penjualan</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="<?php echo e(route('penjualan.form.edit', $sale->id)); ?>">Edit Penjualan</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item tambahPembayaran" id="tambahPembayaran" data-toggle="modal" data-target="#tambahModal" data-sale="<?php echo e($sale->id); ?>">Tambah Pembayaran</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="<?php echo e(route('pembayaransale.list', $sale->id)); ?>">Detail Pembayaran</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="<?php echo e(route('pengiriman.tambah.form', $sale->id)); ?>">Tambah Pengiriman</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#hapusModal<?php echo e($sale->id); ?>">Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
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

            <form id="formPembayaran" method="POST">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="sale_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" class="form-control form-control" id="tglPembayaran" name="tglPembayaran">
                            </div>
                            <div class="form-group">
                                <label>Jumlah yang Harus Dibayar</label>
                                <input type="number" class="form-control form-control" id="totalTagihan" value="" disabled>
                            </div>
                            <div class="form-group">
                                <label>Jenis Pembayaran</label>
                                <select class="form-control" id="jenisPembayaran" disabled>
                                    <option>--Pilih Jenis--</option>
                                    <option value="lunas">Bayar Lunas</option>
                                    <option value="sebagian">Bayar Sebagian</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Pembayaran</label>
                                <input type="number" class="form-control form-control" id="totalPembayaran" name="totalPembayaran">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" class="btn btn-danger close-pembayaran" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Hapus Modal -->
<?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="hapusModal<?php echo e($sale->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Hapus Data Penjualan</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo e(route('penjualan.hapus', $sale->id)); ?>" method="POST">
                <?php echo method_field('DELETE'); ?>
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <p>Yakin untuk menghapus data ini ?</p>
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function() {
        $('#daftarPenjualan').DataTable({
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
        var sale_id = $(this).data('sale');
        // console.log(purchase_id);
        $('#formPembayaran').attr("action", "<?php echo e(route('pembayaransale.tambah',['id'=>':id'])); ?>".replace(':id', sale_id));
        var _url = "<?php echo e(route('pembayaransale.form.tambah',['id'=>':id'])); ?>".replace(':id', sale_id);
        $.ajax({
            url: _url,
            type: "GET",
            dataType: 'json',
            success: function(data) {
                $('#sale_id').val(sale_id);
                $('#totalTagihan').val(data.must_pay);
                $('#jenisPembayaran').removeAttr("disabled");

            },
            error: function(data) {
                console.log("Error");
            }
        });

    })

    $('#jenisPembayaran').change(function() {
        if ($(this).val() == 'lunas') {
            $('#totalPembayaran').val($('#totalTagihan').val());
        } else if ($(this).val() == 'sebagian') {
            $('#totalPembayaran').val(0);
        }
    });

    $('#totalPembayaran').blur(function() {
        $totalTagihan = parseInt($('#totalTagihan').val());
        $totalPembayaran = parseInt($(this).val());


    });

    function tambah_pembayaran() {
        var jml_bayar = document.getElementById("totalPembayaran").value;
        var jml_beli = document.getElementById("totalPembelian").value;

        if (jml_bayar < jml_beli || jml_bayar > jml_beli) {
            alert("Jumlah pembayaran tidak sesuai !");
        } else {
            // window.location.href = "<?php echo e(url('pembelian')); ?>";
            alert("Sukses !");
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/penjualan/daftar_penjualan.blade.php ENDPATH**/ ?>