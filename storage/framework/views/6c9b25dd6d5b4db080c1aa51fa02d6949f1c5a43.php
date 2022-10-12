<?php $__env->startSection('title', 'Daftar Pajak'); ?>


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
                    <a href="<?php echo e(route('pajak.index')); ?>">Pajak</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Daftar Pajak</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar Pajak</h4>
                            <a class="btn btn-primary btn-round ml-auto" href="<?php echo e(route('pajak.form.tambah')); ?>">
                                <i class="fa fa-plus"></i>
                                Tambah
                            </a>
                            <a class="btn btn-danger btn-round ml-3" href="<?php echo e(route('cetak_pajak')); ?>" target="_blank">
                                <i class="fas fa-print"></i>
                                Cetak
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="daftarpajak" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Jenis Toko</th>
                                        <th>Harga Pajak</th>
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $pajaks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pajak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($pajak->jenis_toko); ?></td>
                                        <td>Rp.<?php echo e(currency($pajak->harga_pajak)); ?></td>
                                        <td>
                                            <button class="btn btn-primary btn-border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="<?php echo e(route('pajak.edit', $pajak->id)); ?>">Edit</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" data-toggle="modal" data-target="#hapusModal<?php echo e($pajak->id); ?>">Hapus</a>
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
<?php $__currentLoopData = $pajaks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pajak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="modal fade" id="hapusModal<?php echo e($pajak->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Hapus Data pajak</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo e(route('pajak.hapus', $pajak->id)); ?>" method="POST">
                <?php echo method_field('DELETE'); ?>
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <p>Yakin untuk menghapus data dengan nama <?php echo e($pajak->nama); ?> ?</p>
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
        $('#daftarpajak').DataTable({
            "pageLength": 10,
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/pajak/daftar_pajak.blade.php ENDPATH**/ ?>