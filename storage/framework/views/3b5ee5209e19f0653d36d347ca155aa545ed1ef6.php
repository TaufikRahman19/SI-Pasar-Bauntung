<?php $__env->startSection('title', 'Edit Pengguna'); ?>

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
                    <a href="#">Edit Pengguna</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Pengguna</h4>
                        </div>
                    </div>
                    <form method="POST" action="<?php echo e(route('pengguna.update', $pengguna->id)); ?>">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control form-control" id="namePengguna" value="<?php echo e($pengguna->name); ?>"
                                            name="namePengguna">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control form-control" id="emailPengguna" value="<?php echo e($pengguna->email); ?>"
                                            name="emailPengguna">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control form-control" id="usernamePengguna" value="<?php echo e($pengguna->username); ?>"
                                            name="usernamePengguna">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input id="password" type="password"
                                            class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                            name="passwordPengguna" required autocomplete="new-password"
                                            placeholder="Password">
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Level</label>
                                        <select name="levelPengguna" id="" class="form-control">
                                            <option value="" selected disabled>- Pilih Level -</option>
                                            <option value="Kepala Pasar"<?php echo e($pengguna->level == "Kepala Pasar" ? 'selected' : ''); ?>>Kepala Pasar</option>
                                            <option value="Pegawai"<?php echo e($pengguna->level == "Pegawai" ? 'selected' : ''); ?>>Pegawai</option>
                                            <option value="Pedagang"<?php echo e($pengguna->level == "Pedagang" ? 'selected' : ''); ?>>Pedagang</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="<?php echo e(route('pengguna.index')); ?>" class="btn btn-danger">Batal</a>&nbsp;
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

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/pengguna/edit_pengguna.blade.php ENDPATH**/ ?>