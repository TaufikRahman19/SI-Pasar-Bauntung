<?php $__env->startSection('title', 'Daftar Pegawai'); ?>


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
                        <a href="<?php echo e(route('pegawai.index')); ?>">Pegawai</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Daftar Pegawai</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Daftar Pegawai</h4>
                                <a class="btn btn-primary btn-round ml-auto" href="<?php echo e(route('pegawai.form.tambah')); ?>">
                                    <i class="fa fa-plus"></i>
                                    Tambah
                                </a>
                                <a class="btn btn-danger btn-round ml-3" href="<?php echo e(route('cetak_pegawai')); ?>"
                                    target="_blank">
                                    <i class="fas fa-print"></i>
                                    Cetak
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="daftarpegawai" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIK</th>
                                            <th>Nama Pegawai</th>
                                            <th>Jabatan</th>
                                            <th>Jenis Kelamin</th>
                                            <th>No Telepon</th>
                                            <th>Status</th>
                                            <th>TMT</th>
                                            <th>SK Pegawai</th>
                                            <th style="width: 10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $pegawais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td><?php echo e($pegawai->nik_pegawai); ?></td>
                                                <td><?php echo e($pegawai->nama_pegawai); ?></td>
                                                <td><?php echo e($pegawai->jabatan); ?></td>
                                                <td><?php echo e($pegawai->jeniskelamin); ?></td>
                                                <td><?php echo e($pegawai->notelpon); ?></td>
                                                <td><?php echo e($pegawai->status); ?></td>
                                                <td><?php echo e($pegawai->tmt); ?></td>
                                                <td>
                                                    <?php if($pegawai->sk_pegawai): ?>
                                                        <a href="<?php echo e(asset('sk_pegawai/' . $pegawai->sk_pegawai)); ?>"
                                                            target="#blank" rel="noopener noreferrer">Lihat SK Pegawai</a>
                                                    <?php else: ?>
                                                        Tidak Ada Data
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary btn-border dropdown-toggle"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">Aksi</button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="<?php echo e(route('pegawai.edit', $pegawai->id)); ?>">Edit</a>
                                                        <div role="separator" class="dropdown-divider"></div>
                                                        <a class="dropdown-item" data-toggle="modal"
                                                            data-target="#hapusModal<?php echo e($pegawai->id); ?>">Hapus</a>
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
    <?php $__currentLoopData = $pegawais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pegawai): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="hapusModal<?php echo e($pegawai->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header no-bd">
                        <h5 class="modal-title">
                            <span class="fw-mediumbold">
                                Hapus Data pegawai</span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo e(route('pegawai.hapus', $pegawai->id)); ?>" method="POST">
                        <?php echo method_field('DELETE'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <p>Yakin untuk menghapus data dengan nama <?php echo e($pegawai->nama_pegawai); ?> ?</p>
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
            $('#daftarpegawai').DataTable({
                "pageLength": 10,
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/pegawai/daftar_pegawai.blade.php ENDPATH**/ ?>