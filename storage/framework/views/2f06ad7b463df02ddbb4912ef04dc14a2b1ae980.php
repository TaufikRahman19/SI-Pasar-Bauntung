<?php $__env->startSection('title', 'Tambah Toko'); ?>

<?php $__env->startSection('contain'); ?>

    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Pengiriman</h4>
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
                        <a href="<?php echo e(route('toko.index')); ?>">Toko</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tambah Toko</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tambah Toko</h4>
                            </div>
                        </div>
                        <?php if($errors->any): ?>
                        <ul class="list-group">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item list-group-item-danger"><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <?php endif; ?>
                        <form action="<?php echo e(route('toko.tambah')); ?>" method="POST" id="toko" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nomor Toko</label>
                                            <input type="text" class="form-control form-control" id="no_toko" name="no_toko"
                                                autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Toko</label>
                                            <input type="text" class="form-control form-control" id="jenis_toko"
                                                name="jenis_toko">
                                        </div>
                                        <div class="form-group">
                                            <label>Ukuran</label>
                                            <input type="text" class="form-control form-control" id="ukuran"
                                                name="ukuran">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Zonasi</label>
                                            <input type="text" class="form-control form-control" id="zonasi"
                                                name="zonasi">
                                        </div>
                                        <div class="form-group">
                                            <label for="foto">Masukan Foto</label>
                                            <input type="file" class="form-control form-control" id="foto" name="foto">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="<?php echo e(route('toko.index')); ?>" class="btn btn-danger">Batal</a>&nbsp;
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.5/dist/sweetalert2.all.min.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/toko/tambah_toko.blade.php ENDPATH**/ ?>