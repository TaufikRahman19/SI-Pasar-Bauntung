<?php $__env->startSection('title', 'Tambah pedagang'); ?>

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
                    <a href="<?php echo e(route('pedagang.index')); ?>">Pedagang</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tambah Pedagang</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah Pedagang</h4>
                        </div>
                    </div>
                    <form action="<?php echo e(route('pedagang.tambah')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control form-control" id="namaPedagang" name="namaPedagang" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="number" class="form-control form-control" id="nikPedagang" name="nikPedagang" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Dagang</label>
                                        <input type="text" class="form-control form-control" id="jenis_dagangPedagang" name="jenis_dagangPedagang" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control form-control" id="alamatPedagang" name="alamatPedagang" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="<?php echo e(route('pedagang.index')); ?>" class="btn btn-danger">Batal</a>&nbsp;
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

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI-Toko-Bagunan-master\resources\views/pedagang/tambah_pedagang.blade.php ENDPATH**/ ?>