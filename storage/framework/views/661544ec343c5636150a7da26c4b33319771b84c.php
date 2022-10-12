<?php $__env->startSection('title', 'Edit Keterangan Kegiatan'); ?>

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
                        <a href="<?php echo e(route('event.index')); ?>">Kegiatan</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Edit Kegiatan</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Edit Kegiatan</h4>
                            </div>
                        </div>
                        <form method="POST" id="event" action="<?php echo e(route('event.update', $event->id)); ?>"
                            enctype="multipart/form-data">
                            <?php echo method_field('PUT'); ?>
                            <?php echo csrf_field(); ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Kode Kegiatan</label>
                                            <select class="form-control form-control" name="kegiatan_id" id="kegiatan_id" readonly
                                                value="<?php echo e($event->kegiatan->kode_kegiatan); ?>">
                                                <option disabled value="">- Pilih Kode Kegiatan -</option>
                                                <option value="<?php echo e($event->kegiatan->kode_kegiatan); ?>">
                                                    <?php echo e($event->kegiatan->kode_kegiatan); ?></option>
                                                <?php $__currentLoopData = $kegiatans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kegiatan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($kegiatan->id); ?>">
                                                        <?php echo e($kegiatan->kode_kegiatan); ?> -
                                                        (<?php echo e($kegiatan->judul_kegiatan); ?>)
                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="foto">Masukan Foto</label>
                                            <input type="file" class="form-control form-control" id="foto"
                                                name="foto">
                                        </div>
                                        <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control form-control" name="status" id="status ">
                                                <option value="" selected disabled>- Pilih Status -</option>
                                                <option value="Terlaksana"
                                                    <?php echo e($event->status == 'Terlaksana' ? 'selected' : ''); ?>>Terlaksana
                                                </option>
                                                <option value="Ditunda"
                                                    <?php echo e($event->status == 'Ditunda' ? 'selected' : ''); ?>>Ditunda</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <img src="<?php echo e(asset('fotoKegiatan/' . $event->foto)); ?>" width="100%"
                                                alt="" srcset="">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="<?php echo e(route('kegiatan.index')); ?>" class="btn btn-danger">Batal</a>&nbsp;
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

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/event/edit_event.blade.php ENDPATH**/ ?>