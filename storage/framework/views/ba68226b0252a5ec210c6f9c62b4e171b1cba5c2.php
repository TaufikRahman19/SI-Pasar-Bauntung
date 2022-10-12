<?php $__env->startSection('title', 'Tambah Pengguna'); ?>

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
                        <a href="<?php echo e(route('pengguna.index')); ?>">Pengguna</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Verifikasi Pengguna</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Verifikasi Pengguna</h4>
                            </div>
                        </div>
                        <?php if($errors->any): ?>
                            <ul class="list-group">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item list-group-item-danger"><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                        <form action="<?php echo e(route('verifikasi_pengguna', $pengguna->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" class="form-control form-control" id="namePengguna"
                                                name="namePengguna" value="<?php echo e($pengguna->name); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control form-control" id="emailPengguna"
                                                name="emailPengguna" value="<?php echo e($pengguna->email); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control form-control" id="usernamePengguna"
                                                name="usernamePengguna" value="<?php echo e($pengguna->username); ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Level</label>
                                            <select name="levelPengguna" id="" class="form-control"
                                                value="<?php echo e($pengguna->level); ?>">
                                                <option value="<?php echo e($pengguna->level); ?>"><?php echo e($pengguna->level); ?></option>
                                                <option value="Kepala Pasar">Kepala Pasar</option>
                                                <option value="Pegawai">Pegawai</option>
                                                <option value="Pedagang">Pedagang</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pedagang</label>
                                            <select class="form-control form-control" name="pedagang_id" id="pedagang_id"
                                                onchange="autofill()" autofocus required>
                                                <option value="" selected disabled>- Pilih Nama Pedagang -</option>
                                                <?php $__currentLoopData = $pedagangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedagang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($pedagang->id); ?>"><?php echo e($pedagang->nama); ?> -
                                                        <?php echo e($pedagang->toko->no_toko); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="<?php echo e(route('pengguna.index')); ?>" class="btn btn-danger">Batal</a>&nbsp;
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/pengguna/verifikasi_pengguna.blade.php ENDPATH**/ ?>