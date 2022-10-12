<?php $__env->startSection('title', 'Edit Pembayaran'); ?>


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
                    <a href="<?php echo e(route('pembayaran.list', $sale->id)); ?>">Pembayaran</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit Pembayaran</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Pembayaran</h4>
                        </div>
                    </div>
                    <form method="POST" action="<?php echo e(route('pembayaransale.update', $payment->id)); ?>">
                        <?php echo method_field('GET'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Tanggal</label>
                                        <input type="date" class="form-control form-control" name="tglPembayaranEdit" id="tglPembayaranEdit" value="<?php echo e($payment->payment_date); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah yang Harus Dibayar</label>
                                        <input type="text" class="form-control form-control" value="<?php echo e(number_format($new_bill, 2)); ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Pembayaran</label>
                                        <input type="number" class="form-control form-control" name="jmlPembayaranEdit" id="jmlPembayaranEdit" value="<?php echo e($payment->amount); ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/penjualan/edit_pembayaran.blade.php ENDPATH**/ ?>