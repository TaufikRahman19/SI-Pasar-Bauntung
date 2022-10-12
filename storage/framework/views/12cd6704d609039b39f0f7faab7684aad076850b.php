<?php $__env->startSection('title', 'Tambah Fasilitas'); ?>

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
                        <a href="<?php echo e(route('fasilitas.index')); ?>">Fasilitas</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tambah Fasilitas</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tambah Fasilitas</h4>
                            </div>
                        </div>
                        
                        <form action="<?php echo e(route('fasilitas.tambah')); ?>" method="POST" id="fasilitas" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Kode Barang</label>
                                            <input type="text" value="<?php echo e($nomor); ?>" class="form-control form-control" id="kode_barang"
                                                name="kode_barang" readonly autofocus required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input type="text" class="form-control form-control" id="nama_barang"
                                                name="nama_barang" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Masuk</label>
                                            <input type="date" class="form-control form-control" id="tgl_masuk"
                                                name="tgl_masuk" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah</label>
                                            <input type="number" class="form-control form-control" id="jumlah"
                                                name="jumlah" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Kualitas</label>
                                            <select class="form-control form-control" name="kualitas"
                                                id="kualitas">
                                                <option value="" selected disabled>- Pilih Kualitas -</option>
                                                <option value="BARU">BARU</option>
                                                <option value="OKE">OKE</option>
                                                <option value="RUSAK">RUSAK</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <input type="text" class="form-control form-control" id="keterangan"
                                                name="keterangan" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="fotobarang">Masukan Foto</label>
                                            <input type="file" class="form-control form-control" id="fotobarang" name="fotobarang">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <a href="<?php echo e(route('fasilitas.index')); ?>" class="btn btn-danger">Batal</a>&nbsp;
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

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/fasilitas/tambah_fasilitas.blade.php ENDPATH**/ ?>