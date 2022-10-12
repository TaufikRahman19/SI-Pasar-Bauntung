<?php $__env->startSection('title', 'Riwayat Pengiriman'); ?>


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
                    <a href="#">Riwayat Pengiriman</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Daftar Riwayat Pengiriman</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="daftarPengiriman" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th width="10%">Tanggal</th>
                                        <th>Nama Pembeli</th>
                                        <th>Driver</th>
                                        <th>Uk. Kendaraan</th>
                                        <th width="10%">Status Pengiriman</th>
                                        <th width="10%">Prioritas Pengiriman</th>

                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $shippings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shipping): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr <?php echo rowColor($shipping->prioritas); ?>>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($shipping->tanggal_pengiriman); ?></td>
                                        <td><?php echo e($shipping->nama_pembeli); ?></td>
                                        <td><?php echo e(@$shipping->driver->name?? "-"); ?></td>
                                        <td><?php echo e($shipping->uk_kendaraan); ?></td>
                                        <td><?php echo badge($shipping->status); ?></td>
                                        <td><?php echo badge($shipping->prioritas); ?></td>

                                        <td>
                                            <button class="btn btn-primary btn-border dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                                            <div class="dropdown-menu">
                                                
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="<?php echo e(url('/pengiriman/cetak_invoice', $shipping->id)); ?>" target="_blank">Cetak Surat Jalan</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="<?php echo e(route('pengiriman.detail',['pengiriman'=>$shipping])); ?>">Detail</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="<?php echo e(route('pengiriman.form.edit',['pengiriman'=>$shipping])); ?>">Edit</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <form class="formDelete" action="<?php echo e(route('pengiriman.hapus',['pengiriman'=>$shipping])); ?>" method="post">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="dropdown-item">Hapus</button>
                                                </form>
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

<!-- Edit Modal -->
<div class=" modal fade" id="kirimPesanan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                    <span class="fw-mediumbold">
                        Kirim Pesanan</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo e(route('pengiriman.kirim',['pengiriman'=>':pengiriman'])); ?>" id="sendPengiriman" method="POST">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" name="idPengiriman" id="idPengiriman">
                        <div class="col-md-12 pr-0">
                            <div class="form-group">
                                <label>Driver</label>
                                <select class="form-control" name="driver" id="optionDriver">
                                    <option value="" selected disabled>- Pilih Driver -</option>
                                    <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($driver->id); ?>"><?php echo e($driver->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Uk. Kendaraan</label>
                                <select class="form-control" name="kendaraan" id="optionKendaraan">
                                    <option value="besar">Besar</option>
                                    <option value="kecil">Kecil</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer no-bd">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" id="closePesananBtn">Batal</button>
                    <button type="submit" class="btn btn-success" id="kirimPesananBtn" disabled>Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('assets/js/plugin/sweetalert/sweetalert2.all.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/alert.js')); ?>"></script>
<script>
    $(document).ready(function() {
        $('#daftarPengiriman').DataTable({
            "pageLength": 10,
        });

        $('#sendPengiriman').submit(function(e) {
            e.preventDefault();
            $('#kirimPesanan').modal('toggle');
            swalLoading();
            var data = $(this).serializeArray();
            const idPengiriman = $('#idPengiriman').val();
            var url = $(this).attr('action').replace(':pengiriman', idPengiriman);
            $.post(url, data, function(response) {
                    swal.close();
                    if (response.success) {
                        swalSend().then((result) => {
                            if (result.value) {
                                window.open(`/pengiriman/cetak_invoice/${idPengiriman}`);
                            }
                            swalLoading();
                            location.reload();
                        })
                    } else {
                        swalError(response.message);
                    }
                })
                .fail(function() {
                    swalError('Maaf Terjadi Error');
                });
        })

        $(document).on('click','.sendBtn',function(){
            $('#idPengiriman').val($(this).data('pengiriman'));
        });

        $('#kirimPesanan').on('hidden.bs.modal', function() {
            $("#sendPengiriman").trigger("reset");
            $('#kirimPesananBtn').attr('disabled', 'disabled');
        })


        $('.formDelete').on('submit', function(e) {
            e.preventDefault();

            swalDelete('Apakah anda yakin ingin menghapus pengiriman?')
                .then((result) => {
                    if (result.value) {
                        swalLoading();
                        var url = $('.formDelete').attr('action');
                        var data = $('.formDelete').serializeArray();
                        $.post(url, data, function(response) {
                            swal.close();
                            if (response.success) {
                                swalSuccess('Hapus data berhasil');
                                location.reload();
                            }
                        })
                    }
                })

        })
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI-Toko-Bagunan-master\resources\views/pengiriman/riwayat_pengiriman.blade.php ENDPATH**/ ?>