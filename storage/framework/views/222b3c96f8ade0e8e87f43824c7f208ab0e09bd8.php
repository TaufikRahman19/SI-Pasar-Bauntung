<?php $__env->startSection('title', 'Tambah Pajak'); ?>

<?php $__env->startSection('contain'); ?>

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Bauntung</h4>
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
                        <a href="<?php echo e(route('pajak.index')); ?>">Pajak</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tambah Pajak</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tambah Pajak</h4>
                            </div>
                        </div>
                        <?php if($errors->any): ?>
                            <ul class="list-group">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item list-group-item-danger"><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                        <form action="<?php echo e(route('pajak.tambah')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Jenis Toko</label>
                                            <input type="text" class="form-control form-control" id="jenis_toko"
                                                name="jenis_toko">
                                        </div>
                                        <div class="form-group">
                                            <label>Ukuran</label>
                                            <input type="text" class="form-control form-control" id="ukuran" name="ukuran">
                                        </div>
                                        <div class="form-group">
                                            <label>Per Meter</label>
                                            <input type="number" class="form-control form-control" id="per_meter"
                                                name="per_meter">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Harga Pajak</label>
                                            <input type="number" class="form-control form-control" id="harga_pajak"
                                                name="harga_pajak">
                                        </div>
                                        <div class="form-group">
                                            <label>Per Hari</label>
                                            <input type="number" class="form-control form-control" id="per_hari"
                                                name="per_hari">
                                        </div>
                                        <div class="form-group">
                                            <label>Bulan</label>
                                            <input type="number" class="form-control form-control" id="bulan" name="bulan">
                                        </div>
                                        <div class="form-group">
                                            <label>Total</label>
                                            <input type="number" class="form-control form-control" id="total" name="total"
                                            onclick="hitungPajak()" required readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="<?php echo e(route('pajak.index')); ?>" class="btn btn-danger">Batal</a>&nbsp;
                                <button type="reset" class="btn btn-info">Reset</button>&nbsp;
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/js/plugin/sweetalert/sweetalert2.all.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/alert.js')); ?>"></script>
    <script>
        function hitungPajak() {
            var harga_pajak = document.getElementById("harga_pajak").value;
            var bulan = document.getElementById("bulan").value;

            var hitung = harga_pajak * bulan;
            document.getElementById("total").value = hitung;
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/pajak/tambah_pajak.blade.php ENDPATH**/ ?>