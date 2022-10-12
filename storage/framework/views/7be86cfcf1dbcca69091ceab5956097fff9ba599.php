
<?php $__env->startSection('title', 'Tambah Sales'); ?>

<?php $__env->startSection('contain'); ?>

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Supplier</h4>
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
                    <a href="<?php echo e(route('sales.index')); ?>">Sales</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tambah Sales</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah Sales</h4>
                        </div>
                    </div>
                    <form action="<?php echo e(route('sales.tambah')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Supplier</label>
                                        <select class="form-control" id="supplierTambah" name="supplierTambah">
                                            <option value="">--Pilih Supplier--</option>
                                            <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value=<?php echo e($supplier->id); ?>><?php echo e($supplier->name); ?></option>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control form-control" id="namaSales" name="namaSales">
                                    </div>
                                    <div class="form-group">
                                        <label>Telephone</label>
                                        <input type="number" class="form-control form-control" id="phoneSales" name="phoneSales">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="reset" class="btn btn-info">Reset</button>&nbsp;
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/supplier/tambah_sales.blade.php ENDPATH**/ ?>