<?php $__env->startSection('title', 'Tambah Pembayaran'); ?>

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
                    <a href="<?php echo e(route('pembayaran.index')); ?>">Pembayaran</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Tambah Pembayaran</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah Pembayaran</h4>
                        </div>
                    </div>
                    <form action="<?php echo e(route('pembayaran.tambah')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nama Pedagang</label>
                                        <select class="form-control form-control" name="pedagang_id" id="pedagang_id" autofocus required>
                                            <option value="" selected disabled>- Pilih Nama Pedagang -</option>
                                            <?php $__currentLoopData = $pedagangs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pedagang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($pedagang->id); ?>"><?php echo e($pedagang->nama); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Bulan</label>
                                        <input type="number" class="form-control form-control" id="perbulan" name="perbulan">
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Pajak</label>
                                        <select class="form-control form-control" name="pajak_id" id="pajak_id" required>
                                            <option value="" selected disabled>- Pilih Jenis Pajak -</option>
                                            <?php $__currentLoopData = $pajaks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pajak): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($pajak->harga_pajak); ?>"><?php echo e($pajak->jenis_toko); ?> - <?php echo e($pajak->harga_pajak); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                    <label>Total</label>
                                    <input type="number" class="form-control form-control" id="total" name="total" onclick="hitungHarga()" readonly required >
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control form-control" name="status" id="status">
                                        <option value="" selected disabled>- Pilih Status -</option>
                                        <option value="Lunas">Lunas</option>
                                        <option value="Belum Lunas">Belum Lunas</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="<?php echo e(route('pembayaran.index')); ?>" class="btn btn-danger">Batal</a>&nbsp;
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

<script>
    function hitungHarga(){
          var harga_pajak=document.getElementById("pajak_id").value;
          var perbulan=document.getElementById("perbulan").value;

          var hitung=harga_pajak*perbulan;
          document.getElementById("total").value=hitung;
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/pembayaran/tambah_pembayaran.blade.php ENDPATH**/ ?>