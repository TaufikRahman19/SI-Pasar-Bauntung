<?php $__env->startSection('title', 'Daftar pembayaran Belum Lunas'); ?>


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
                        <a href="#">Daftar Pembayaran Belum Lunas</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Daftar Pembayaran Belum Lunas</h4>

                                <a class="btn btn-danger btn-round ml-auto" href="<?php echo e(route('cetak_belum')); ?>"
                                    target="_blank">
                                    <i class="fas fa-print"></i>
                                    Cetak
                                </a>
                                
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                
                            </div>
                            <br>
                            <div class="table-responsive">
                                <table id="daftarpembayaran" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Petugas</th>
                                            <th>Nama Pedagang</th>
                                            <th>Nomor Register</th>
                                            <th>Nomor Toko</th>
                                            <th>Jenis Toko</th>
                                            <th>Ukuran</th>
                                            <th>Massa Kontrak</th>
                                            <th>Harga Pajak</th>
                                            <th>Total</th>
                                            <th>Bayar</th>
                                            <th>Kembali</th>
                                            <th>Keterangan</th>
                                            <th>Bukti Pembayaran</th>
                                            <th style="width: 10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $pembayarans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pembayaran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td>
                                                    <?php if($pembayaran->pegawai_id): ?>
                                                    <?php echo e($pembayaran->pegawai_id); ?>

                                                    <?php else: ?>
                                                    Online
                                                    <?php endif; ?>
                                                </td>
                                                <td><?php echo e($pembayaran->pedagang->nama); ?></td>
                                                <td><?php echo e($pembayaran->pedagang->no_register); ?></td>
                                                <td><?php echo e($pembayaran->pedagang->toko->no_toko); ?></td>
                                                <td><?php echo e($pembayaran->pedagang->toko->jenis_toko); ?></td>
                                                <td><?php echo e($pembayaran->pedagang->toko->ukuran); ?></td>
                                                <td><?php echo e($pembayaran->pedagang->massa_kontrak); ?> Bulan</td>
                                                <td>Rp.<?php echo e(currency($pembayaran->pajak_id)); ?></td>
                                                <td>Rp.<?php echo e(currency($pembayaran->total)); ?></td>
                                                <td>Rp.<?php echo e(currency($pembayaran->bayar)); ?></td>
                                                <td>Rp.<?php echo e(currency($pembayaran->kembali)); ?></td>
                                                <td>
                                                    <?php if($pembayaran->status): ?>
                                                    <?php echo badge($pembayaran->status); ?>

                                                    <?php else: ?>
                                                    Online
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($pembayaran->bukti): ?>
                                                    <a href="<?php echo e(asset('buktibyr/'.$pembayaran->bukti)); ?>" target="#blank" rel="noopener noreferrer">Lihat Gambar</a>
                                                    <?php else: ?>
                                                    Pembayaran Langsung
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary btn-border dropdown-toggle"
                                                        type="button" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">Aksi</button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="<?php echo e(route('pembayaran.detail', $pembayaran->id)); ?>">Cetak
                                                            Struk</a>
                                                        <div role="separator" class="dropdown-divider"></div>
                                                        <a class="dropdown-item"
                                                            href="<?php echo e(route('pembayaran.edit', $pembayaran->id)); ?>">Edit</a>
                                                        <div role="separator" class="dropdown-divider"></div>
                                                        <a class="dropdown-item" data-toggle="modal"
                                                            data-target="#hapusModal<?php echo e($pembayaran->id); ?>">Hapus</a>
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
    <?php $__currentLoopData = $pembayarans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pembayaran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="modal fade" id="hapusModal<?php echo e($pembayaran->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header no-bd">
                        <h5 class="modal-title">
                            <span class="fw-mediumbold">
                                Hapus Data pembayaran</span>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo e(route('pembayaran.hapus', $pembayaran->id)); ?>" method="POST">
                        <?php echo method_field('DELETE'); ?>
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <p>Yakin untuk menghapus data dengan nama <?php echo e($pembayaran->pedagang->nama); ?> ?</p>
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
    <script type="text/javascript">
        let status = $('#filter-status').val()

        // data: function(s) {
        //     s.status = status;
        //     return d
        // }
        $(document).ready(function() {
            $('#daftarpembayaran').DataTable({
                "responsive": true,
                "autoWidth": true,
                "pageLength": 10,
            });

            $('.btn-filter').click(function(e) {
                e.preventDefault();

                $('#modal-filter').modal();
            })


        });


        $(".filter").on('change', function() {
            status = $('#filter-status').val()
            console.log([status])
            // daftarpembayaran.ajax.reload(null,false)

        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/pembayaran/belum_pembayaran.blade.php ENDPATH**/ ?>