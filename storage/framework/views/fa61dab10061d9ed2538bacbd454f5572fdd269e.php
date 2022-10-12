<?php $__env->startSection('title', 'Daftar pembayaran'); ?>


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
                        <a href="#">Daftar Pembayaran</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Daftar Pembayaran</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control form-control" name="status" id="status">
                                    <option value="" selected disabled>- Pilih Status -</option>
                                    <option value="Lunas">Lunas</option>
                                    <option value="Belum Lunas">Belum Lunas</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="" onclick="this.href='/cetak_pembayaran_status/'+document.getElementById('status').value "
                             target="_blank" class="btn btn-primary col-md-12">Cetak Laporan Per Status</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $('#daftarpembayaran').DataTable({
                "pageLength": 10,
            });

            $('.btn-filter').click(function(e) {
                e.preventDefault();

                $('#modal-filter').modal();
            })


        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/pembayaran/cetak_pembayaran_perstatus.blade.php ENDPATH**/ ?>