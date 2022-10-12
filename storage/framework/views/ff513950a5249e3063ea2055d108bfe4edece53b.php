<?php $__env->startSection('title', 'Edit Pedagang'); ?>

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
                    <a href="<?php echo e(route('pedagang.index')); ?>">pedagang</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Edit pedagang</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit pedagang</h4>
                        </div>
                    </div>
                    <form method="POST" action="<?php echo e(route('pedagang.update', $pedagang->id)); ?>">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control form-control" id="namapedagangEdit" name="namapedagangEdit" value="<?php echo e($pedagang->name); ?>" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label>Telephone</label>
                                        <input type="number" class="form-control form-control" id="phonepedagangEdit" name="phonepedagangEdit" value="<?php echo e($pedagang->phone); ?>" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="<?php echo e(route('pedagang.index')); ?>" class="btn btn-danger">Batal</a>&nbsp;
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

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI-Toko-Bagunan-master\resources\views/pedagang/edit_pedagang.blade.php ENDPATH**/ ?>