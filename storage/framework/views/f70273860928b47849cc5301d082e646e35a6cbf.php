<?php $__env->startSection('title', 'Edit Pajak'); ?>

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
                    <a href="#">Edit Pajak</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Pajak</h4>
                        </div>
                    </div>
                    <form method="POST" action="<?php echo e(route('pajak.update', $pajak->id)); ?>">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Jenis Toko</label>
                                        <input type="text" class="form-control form-control" id="jenis_toko" name="jenis_toko" value="<?php echo e($pajak->jenis_toko); ?>" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label>Harga Pajak</label>
                                        <input type="number" class="form-control form-control" id="harga_pajak" name="harga_pajak" value="<?php echo e($pajak->harga_pajak); ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="<?php echo e(route('pajak.index')); ?>" class="btn btn-danger">Batal</a>&nbsp;
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

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/pajak/edit_pajak.blade.php ENDPATH**/ ?>