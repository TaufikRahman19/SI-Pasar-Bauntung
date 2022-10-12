<?php $__env->startSection('title', 'Detail Pengiriman'); ?>


<?php $__env->startSection('contain'); ?>

<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Pengiriman</h4>
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
                    <a href="<?php echo e(route('pengiriman.index')); ?>">Pengiriman</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Detail Pengiriman</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Detail Pengiriman</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3 pr-0">
                                <div class="form-group">
                                    <label>Nama Pembeli</label>
                                    <input type="text" class="form-control form-control" value="<?php echo e($pengiriman->nama_pembeli); ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-3 pr-0">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control form-control" value="<?php echo e($pengiriman->alamat_pembeli); ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-3 pr-0">
                                <div class="form-group">
                                    <label>Telephone</label>
                                    <input type="text" class="form-control form-control" value="<?php echo e($pengiriman->phone); ?>" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3 pr-0">
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input type="date" class="form-control form-control" value="<?php echo e($pengiriman->tanggal_pengiriman); ?>" disabled>
                                </div>
                            </div>
                            <div class="col-sm-3 pr-0">
                                <div class="form-group">
                                    <label>Prioritas Pengiriman</label>
                                    <select class="form-control" name="prioritas" disabled>
                                        <option value="penting" <?php echo e($pengiriman->prioritas == 'penting' ? 'selected' : ''); ?>>Penting</option>
                                        <option value="sedang" <?php echo e($pengiriman->prioritas == 'sedang' ? 'selected' : ''); ?>>Sedang</option>
                                        <option value="normal" <?php echo e($pengiriman->prioritas == 'normal' ? 'selected' : ''); ?>>Normal</option>
                                    </select>
                                </div>
                            </div>
                            <?php if(isset($pengiriman->driver_id)): ?>
                            <div class="col-sm-3 pr-0">
                                <div class="form-group">
                                    <label>Driver</label>
                                    <select class="form-control" name="driver" disabled>
                                        <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($driver->id); ?>" <?php echo e($driver->id == $pengiriman->driver_id ? 'selected' : ''); ?>><?php echo e($driver->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <?php endif; ?>
                            <?php if(isset($pengiriman->uk_kendaraan)): ?>
                            <div class="col-sm-3 pr-0">
                                <div class="form-group">
                                    <label>Uk. Kendaraan</label>
                                    <select class="form-control" name="driver" disabled>
                                        <option value="besar" <?php echo e($pengiriman->uk_kendaraan == 'besar' ? 'selected' : ''); ?>>Besar</option>
                                        <option value="kecil" <?php echo e($pengiriman->uk_kendaraan == 'kecil' ? 'selected' : ''); ?>>Kecil</option>
                                    </select>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-12">
                            <div class="card-header">
                                <div class="d-flex align-items-center">
                                    <h4 class="card-title">Daftar Item</h4>
                                </div>
                            </div><br>
                            <div class="table-responsive">
                                <table id="daftarItemPenjualan" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Nama Item</th>
                                            <th class="text-center">Unit</th>
                                            <th class="text-center">Jumlah Dikirim</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $pengiriman->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($item->product->nama_produk); ?></td>
                                            <td><?php echo e($item->unit->name_unit); ?></td>
                                            <td><?php echo e($item->quantity); ?></td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a href="<?php echo e(route('pengiriman.index')); ?>" class="btn btn-info">Kembali</a>
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
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/pengiriman/detail_pengiriman.blade.php ENDPATH**/ ?>