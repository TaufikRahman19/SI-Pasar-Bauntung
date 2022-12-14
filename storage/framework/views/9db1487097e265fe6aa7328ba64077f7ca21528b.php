<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('contain'); ?>

<div class="content">
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                    <h5 class="text-white op-7 mb-2">Sistem Informasi Pasar Bauntung</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="col-md-12">
            <div class="card full-height">
                <div class="card-body">
                    <div class="card-title">Administrator</div><br>
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="card card-stats card-primary card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fas fa-shopping-cart"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Pembelian</p>
                                                <h4 class="card-title"><?php echo e($purchaseCount); ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="card card-stats card-info card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="fas fa-users"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Suppliers</p>
                                                <h4 class="card-title"><?php echo e($supplierCount); ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="card card-stats card-success card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-analytics"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Sales</p>
                                                <h4 class="card-title"><?php echo e($salesCount); ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <h4><b>Panduan Penggunaan Sistem</b></h4>
                        <div role="separator" class="dropdown-divider"></div>
                        <p style="font-size:15px;">1. &nbsp;Daftar pembelian dapat diakses dengan klik menu <b>pembelian</b> kemudian pilih <b>daftar pembelian</b> atau klik <a href="<?php echo e(route('pembelian.index')); ?>">disini</a></p>
                        <div role="separator" class="dropdown-divider"></div>
                        <p style="font-size:15px;">2. &nbsp;Tambah pembelian dapat diakses dengan klik menu <b>pembelian</b> kemudian pilih <b>tambah pembelian</b> atau klik <a href="<?php echo e(route('pembelian.form.tambah')); ?>">disini</a></p>
                        <div role="separator" class="dropdown-divider"></div>
                        <p style="font-size:15px;">3. &nbsp;Daftar supplier dapat diakses dengan klik menu <b>supplier</b> kemudian pilih <b>daftar supplier</b> atau klik <a href="<?php echo e(route('supplier.index')); ?>">disini</a></p>
                        <div role="separator" class="dropdown-divider"></div>
                        <p style="font-size:15px;">4. &nbsp;Tambah supplier dapat diakses dengan klik menu <b>supplier</b> kemudian pilih <b>tambah supplier</b> atau klik <a href="<?php echo e(route('supplier.form.tambah')); ?>">disini</a></p>
                        <div role="separator" class="dropdown-divider"></div>
                        <p style="font-size:15px;">5. &nbsp;Daftar sales dapat diakses dengan klik menu <b>supplier</b> kemudian pilih <b>daftar sales</b> atau klik <a href="<?php echo e(route('sales.index')); ?>">disini</a></p>
                        <div role="separator" class="dropdown-divider"></div>
                        <p style="font-size:15px;">6. &nbsp;Tambah sales dapat diakses dengan klik menu <b>supplier</b> kemudian pilih <b>tambah sales</b> atau klik <a href="<?php echo e(route('sales.form.tambah')); ?>">disini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI-Toko-Bagunan-master\resources\views/dashboard.blade.php ENDPATH**/ ?>