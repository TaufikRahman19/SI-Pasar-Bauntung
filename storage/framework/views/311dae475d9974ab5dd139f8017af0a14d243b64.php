<?php $__env->startSection('title', 'Edit Pedagang'); ?>

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
                    <a href="#">Edit Pedagang</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Edit Pedagang</h4>
                        </div>
                    </div>
                    <form method="POST" action="<?php echo e(route('pedagang.update', $pedagang->id)); ?>" enctype="multipart/form-data">
                        <?php echo method_field('PUT'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label>NIK</label>
                                        <input type="number" class="form-control form-control" id="nikPedagangEdit" name="nikPedagangEdit" value="<?php echo e($pedagang->nik); ?>" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" class="form-control form-control" id="namaPedagangEdit" name="namaPedagangEdit" value="<?php echo e($pedagang->nama); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Dagang</label>
                                        <input type="text" class="form-control form-control" id="jenis_dagangPedagangEdit" name="jenis_dagangPedagangEdit" value="<?php echo e($pedagang->jenis_dagang); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Nomor Toko</label>
                                        <select class="form-control form-control" name="toko_id" id="toko_id" value="<?php echo e($pedagang->toko->jenis_toko); ?>">
                                            <option disabled value="">- Pilih Nomor Toko -</option>
                                            <option value="<?php echo e($pedagang->toko_id); ?>"><?php echo e($pedagang->toko->no_toko); ?> - <?php echo e($pedagang->toko->jenis_toko); ?></option>
                                            <?php $__currentLoopData = $tokos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $toko): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($toko->id); ?>"><?php echo e($toko->no_toko); ?> - (<?php echo e($toko->jenis_toko); ?>)</option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <input type="text" class="form-control form-control" id="alamatPedagangEdit" name="alamatPedagangEdit" value="<?php echo e($pedagang->alamat); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>No Telepon</label>
                                        <input type="number" class="form-control form-control" id="notelponPedagangEdit" name="notelponPedagangEdit" value="<?php echo e($pedagang->notelpon); ?>" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <label>Massa Kontrak</label>
                                        <select class="form-control form-control" name="massa_kontrakPedagangEdit" id="massa_kontrakPedagangEdit ">
                                            <option value="" selected disabled>- Pilih Massa Kontrak -</option>
                                            <option value="6"<?php echo e($pedagang->massa_kontrak == "6" ? 'selected' : ''); ?>>6 Bulan</option>
                                            <option value="12"<?php echo e($pedagang->massa_kontrak == "12" ? 'selected' : ''); ?>>12 Bulan</option>
                                            <option value="24"<?php echo e($pedagang->massa_kontrak == "24" ? 'selected' : ''); ?>>24 Bulan</option>
                                            <option value="36"<?php echo e($pedagang->massa_kontrak == "36" ? 'selected' : ''); ?>>36 Bulan</option>
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="pasfoto">Masukan Pas Foto</label>
                                        <input type="file" class="form-control form-control" id="pasfoto" name="pasfoto">
                                        <a href="<?php echo e(asset('pasfoto/'.$pedagang->pasfoto)); ?>" target="#blank" rel="noopener noreferrer">Lihat File Sebelumnya</a>
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

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/pedagang/edit_pedagang.blade.php ENDPATH**/ ?>