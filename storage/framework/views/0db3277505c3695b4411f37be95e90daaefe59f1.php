<?php $__env->startSection('title', 'Daftar Kegiatan'); ?>


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
                    <a href="<?php echo e(route('kegiatan.index')); ?>">Kegiatan</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Daftar Kegiatan</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar Kegiatan</h4>
                            <a class="btn btn-primary btn-round ml-auto" href="<?php echo e(route('kegiatan.form.tambah')); ?>">
                                <i class="fa fa-plus"></i>
                                Tambah
                            </a>
                            <a class="btn btn-danger btn-round ml-3" href="<?php echo e(route('cetak_kegiatan')); ?>" target="_blank">
                                <i class="fas fa-print"></i>
                                Cetak
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="daftarkegiatan" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Kegiatan</th>
                                        <th>Judul Kegiatan</th>
                                        <th>Tanggal</th>
                                        <th>Tempat</th>
                                        <th>Perihal</th>
                                        <th>Foto</th>
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $kegiatans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kegiatan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($kegiatan->kode_kegiatan); ?></td>
                                        <td><?php echo e($kegiatan->judul_kegiatan); ?></td>
                                        <td><?php echo e($kegiatan->tanggal); ?></td>
                                        <td><?php echo e($kegiatan->tempat); ?></td>
                                        <td><?php echo e($kegiatan->perihal); ?></td>
                                        <td>
                                            <a href="<?php echo e(asset('fotoKegiatan/'.$kegiatan->foto)); ?>" target="#blank" rel="noopener noreferrer">Lihat Gambar</a>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary btn-border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?php echo e(route('kegiatan.edit', $kegiatan->id)); ?>">Edit</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#hapusModal<?php echo e($kegiatan->id); ?>">Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('modal'); ?>
<!-- Hapus Modal -->
<?php $__currentLoopData = $kegiatans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kegiatan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="hapusModal<?php echo e($kegiatan->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Hapus Data kegiatan</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo e(route('kegiatan.hapus', $kegiatan->id)); ?>" method="POST">
                <?php echo method_field('DELETE'); ?>
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <p>Yakin untuk menghapus data jenis kegiatan <?php echo e($kegiatan->jenis_kegiatan); ?> ?</p>
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script>
    $(document).ready(function() {
        $('#daftarkegiatan').DataTable({
            "pageLength": 10,
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/kegiatan/daftar_kegiatan.blade.php ENDPATH**/ ?>