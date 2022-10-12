<?php $__env->startSection('title', 'Tambah pedagang'); ?>

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
                    <?php if($errors->any): ?>
                        <ul class="list-group">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item list-group-item-danger"><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <?php endif; ?>
                    <form action="<?php echo e(route('tambahkan')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="number" class="form-control form-control" id="nik" name="nik" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" readonly value="<?php echo e(Auth::user()->name); ?>" class="form-control form-control" id="nama" name="nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Register</label>
                                        <input type="text" value="<?php echo e($nomor); ?>" class="form-control form-control" id="no_register" name="no_register" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Dagang</label>
                                        <input type="text" class="form-control form-control" id="jenis_dagang" name="jenis_dagang" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Toko</label>
                                        <select class="form-control form-control" name="toko_id" id="toko_id">
                                            <option value="" selected disabled>- Pilih Nomor Toko -</option>
                                            <?php $__currentLoopData = $tokos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $toko): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($toko->id); ?>"><?php echo e($toko->no_toko); ?> - (<?php echo e($toko->jenis_toko); ?>)</option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control form-control" id="alamat" name="alamat" required>
                                    </div>
                                    <div class="form-group">
                                        <label>No Telepon</label>
                                        <input type="number" class="form-control form-control" id="notelpon" name="notelpon" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label>Massa Kontrak</label>
                                        <select class="form-control form-control" name="massa_kontrak" id="massa_kontrak">
                                            <option value="" selected disabled>- Pilih Massa Kontrak -</option>
                                            <option value="6">6 Bulan</option>
                                            <option value="12">12 Bulan</option>
                                            <option value="24">24 Bulan</option>
                                            <option value="36">36 Bulan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="pasfoto">Masukan Pas Foto</label>
                                        <input type="file" class="form-control form-control" id="pasfoto" name="pasfoto">
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

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/pedagang/datadiri_pedagang.blade.php ENDPATH**/ ?>