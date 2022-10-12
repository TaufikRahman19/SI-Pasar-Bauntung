<?php $__env->startSection('title', 'Tambah Keterangan Kegiatan'); ?>

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
                        <a href="<?php echo e(route('keterangan.index')); ?>">Keterangan Kegiatan</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tambah Keterangan Kegiatan</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tambah Keterangan Kegiatan</h4>
                            </div>
                        </div>
                        <?php if($errors->any): ?>
                            <ul class="list-group">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group-item list-group-item-danger"><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                        <form action="<?php echo e(route('keterangan.tambah')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Kode Kegiatan</label>
                                            <input type="text" class="form-control form-control" id="kode_keterangan" name="kode_keterangan" autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <label>Judul Kegiatan</label>
                                            <input type="text" class="form-control form-control" id="judul_kegiatan" name="judul_kegiatan">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Mulai</label>
                                            <input type="date" class="form-control form-control" id="tanggal_mulai" name="tanggal_mulai">
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <input type="text" class="form-control form-control" id="keterangan" name="keterangan">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Tanggal Selesai</label>
                                            <input type="date" class="form-control form-control" id="tanggal_selesai" name="tanggal_selesai">
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat</label>
                                            <input type="text" class="form-control form-control" id="tempat" name="tempat">
                                        </div>
                                        <div class="form-group">
                                            <label>Perihal</label>
                                            <input type="text" class="form-control form-control" id="perihal" name="perihal">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control form-control" name="status" id="status">
                                                <option value="" selected disabled>- Pilih Status -</option>
                                                <option value="Terlaksana">Terlaksana</option>
                                                <option value="Ditunda">Ditunda</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="foto">Masukan Foto</label>
                                            <input type="file" class="form-control form-control" id="foto" name="foto">
                                        </div>
                                    </div>
                                    <div class="col-6">

                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="<?php echo e(route('keterangan.index')); ?>" class="btn btn-danger">Batal</a>&nbsp;
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

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/keterangan/tambah_keterangan.blade.php ENDPATH**/ ?>