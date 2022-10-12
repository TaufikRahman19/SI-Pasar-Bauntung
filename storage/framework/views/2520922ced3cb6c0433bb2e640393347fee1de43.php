<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="<?php echo e(asset('/assets/img/Logo_B.png')); ?>" alt="..." class="avatar-img">
                </div>
                <div class="info">
                    <a aria-expanded="true">
                        <span>
                            <span class="user-level"><?php echo e(Auth::user()->name); ?> (<?php echo e(Auth::user()->level); ?>)</span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item <?php echo e(set_active('home')); ?>">
                    <a href="<?php echo e(url('/dashboard')); ?>" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php if(auth()->user()->level == 'Kepala Pasar'): ?>
                    <li
                        class="nav-item <?php echo e(set_active(['cetak_pedagang', 'cetak_pegawai', 'cetak_toko', 'cetak_fasilitas', 'cetak_kegiatan', 'cetak_tunggakan', 'cetak_pajak', 'cetak_pembayaran', 'cetak_perpanjangan'])); ?>">
                        <a data-toggle="collapse" href="#laporan">
                            <i class="fas fa-university"></i>
                            <p>Laporan</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse <?php echo e(set_show(['cetak_pedagang', 'cetak_pegawai', 'cetak_toko', 'cetak_fasilitas', 'cetak_kegiatan', 'cetak_tunggakan', 'cetak_pajak', 'cetak_pembayaran', 'cetak_perpanjangan'])); ?>"
                            id="laporan">
                            <ul class="nav nav-collapse">
                                <li class="<?php echo e(set_active('cetak_pedagang')); ?>">
                                    <a href="<?php echo e(route('cetak_pedagang')); ?>">
                                        <i class="fas fa-users"></i>
                                        Laporan Pedagang
                                    </a>
                                </li>
                                <li class="<?php echo e(set_active('cetak_pegawai')); ?>">
                                    <a href="<?php echo e(route('cetak_pegawai')); ?>">
                                        <i class="fas fa-user-tie"></i>
                                        Laporan Pegawai
                                    </a>
                                </li>
                                <li class="<?php echo e(set_active('cetak_toko')); ?>">
                                    <a href="<?php echo e(route('cetak_toko')); ?>">
                                        <i class="fas fa-store-alt"></i>
                                        Laporan Toko
                                    </a>
                                </li>
                                <li class="<?php echo e(set_active('cetak_fasilitas')); ?>">
                                    <a href="<?php echo e(route('cetak_fasilitas')); ?>">
                                        <i class="fas fa-toolbox"></i>
                                        Laporan Fasilitas
                                    </a>
                                </li>
                                <li class="<?php echo e(set_active('cetak_kegiatan')); ?>">
                                    <a href="<?php echo e(route('cetak_kegiatan')); ?>">
                                        <i class="fas fa-toolbox"></i>
                                        Laporan Kegiatan
                                    </a>
                                </li>
                                <li class="<?php echo e(set_active('cetak_event')); ?>">
                                    <a href="<?php echo e(route('cetak_event')); ?>">
                                        <i class="fas fa-toolbox"></i>
                                        Laporan Keterangan Kegiatan
                                    </a>
                                </li>
                                <li class="<?php echo e(set_active('cetak_tunggakan')); ?>">
                                    <a href="<?php echo e(route('cetak_tunggakan')); ?>">
                                        <i class="fas fa-toolbox"></i>
                                        Laporan Tunggakan
                                    </a>
                                </li>
                                <li class="<?php echo e(set_active('cetak_pajak')); ?>">
                                    <a href="<?php echo e(route('cetak_pajak')); ?>">
                                        <i class="fas fa-file-invoice-dollar"></i>
                                        Laporan Pajak
                                    </a>
                                </li>
                                <li class="<?php echo e(set_active('cetak_pembayaran')); ?>">
                                    <a href="<?php echo e(route('cetak_pembayaran')); ?>">
                                        <i class="fas fa-file-invoice-dollar"></i>
                                        Laporan Pembayaran
                                    </a>
                                </li>
                                <li class="<?php echo e(set_active('cetak_perpanjangan')); ?>">
                                    <a href="<?php echo e(route('cetak_perpanjangan')); ?>">
                                        <i class="fas fa-file-invoice-dollar"></i>
                                        Laporan Perpanjangan
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if(auth()->user()->level == 'Pegawai'): ?>
                    <li
                        class="nav-item <?php echo e(set_active(['pedagang.index', 'pegawai.index', 'toko.index', 'fasilitas.index', 'kegiatan.index','event.index'])); ?>">
                        <a data-toggle="collapse" href="#master">
                            <i class="fas fa-university"></i>
                            <p>Data Master</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse <?php echo e(set_show(['pedagang.index', 'pegawai.index', 'toko.index', 'fasilitas.index', 'kegiatan.index','event.index'])); ?>"
                            id="master">
                            <ul class="nav nav-collapse">
                                <li class="<?php echo e(set_active('pedagang.index')); ?>">
                                    <a href="<?php echo e(route('pedagang.index')); ?>">
                                        <i class="fas fa-users"></i>
                                        Data Pedagang
                                    </a>
                                </li>
                                <li class="<?php echo e(set_active('pegawai.index')); ?>">
                                    <a href="<?php echo e(route('pegawai.index')); ?>">
                                        <i class="fas fa-user-tie"></i>
                                        Data Pegawai
                                    </a>
                                </li>
                                <li class="<?php echo e(set_active('toko.index')); ?>">
                                    <a href="<?php echo e(route('toko.index')); ?>">
                                        <i class="fas fa-store-alt"></i>
                                        Data Toko
                                    </a>
                                </li>
                                <li class="<?php echo e(set_active('fasilitas.index')); ?>">
                                    <a href="<?php echo e(route('fasilitas.index')); ?>">
                                        <i class="fas fa-toolbox"></i>
                                        Data Fasilitas
                                    </a>
                                </li>
                                <li class="dropdown <?php echo e(set_active('kegiatan.index','event.index')); ?>">
                                    <a href="kegiatan" class="data-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-toolbox"></i>
                                        Data Kegiatan
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="<?php echo e(route('kegiatan.index')); ?>">
                                                <i class="fas fa-toolbox"></i>
                                                Pemberitahuan Kegiatan
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('event.index')); ?>">
                                                <i class="fas fa-toolbox"></i>
                                                Keterangan Kegiatan
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

                <?php if(auth()->user()->level == 'Pegawai'): ?>
                    <li class="nav-item <?php echo e(set_active(['pajak.index', 'online_pembayaran','pembayaran.form.tambah', 'lunas_pembayaran', 'belum_pembayaran', 'tunggakan.index','perpanjangan.index'])); ?>">
                        <a data-toggle="collapse" href="#pajak">
                            <i class="fas fa-cart-plus"></i>
                            <p>Data Transaksi</p>
                            <span class="caret"></span>
                        </a>

                        <div class="collapse <?php echo e(set_show(['pajak.index','online_pembayaran', 'pembayaran.form.tambah', 'tunggakan.index','lunas_pembayaran','belum_pembayaran','perpanjangan.index'])); ?>"
                            id="pajak">
                            <ul class="nav nav-collapse">
                                <li class="<?php echo e(set_active('pembayaran.form.tambah')); ?>">
                                    <a href="<?php echo e(route('pembayaran.form.tambah')); ?>">
                                        <i class="fas fa-receipt"></i>
                                        Transaksi Pembayaran
                                    </a>
                                </li>
                                <li class="<?php echo e(set_active('online_pembayaran')); ?>">
                                    <a href="<?php echo e(route('online_pembayaran')); ?>">
                                        <i class="fas fa-receipt"></i>
                                        Transaksi Online
                                    </a>
                                </li>
                                <li class="<?php echo e(set_active('lunas_pembayaran')); ?>">
                                    <a href="<?php echo e(route('lunas_pembayaran')); ?>">
                                        <i class="fas fa-receipt"></i>
                                        Transaksi Lunas
                                    </a>
                                </li>
                                <li class="<?php echo e(set_active('belum_pembayaran')); ?>">
                                    <a href="<?php echo e(route('belum_pembayaran')); ?>">
                                        <i class="fas fa-receipt"></i>
                                        Transaksi Belum Lunas
                                    </a>
                                </li>
                                <li class="<?php echo e(set_active('tunggakan.index')); ?>">
                                    <a href="<?php echo e(route('tunggakan.index')); ?>">
                                        <i class="fas fa-toolbox"></i>
                                        Transaksi Tunggakan
                                    </a>
                                </li>
                                <li class="<?php echo e(set_active('perpanjangan.index')); ?>">
                                    <a href="<?php echo e(route('perpanjangan.index')); ?>">
                                        <i class="fas fa-user-tie"></i>
                                        Perpanjangan Pedagang
                                    </a>
                                </li>
                                <li class="<?php echo e(set_active('pajak.index')); ?>">
                                    <a href="<?php echo e(route('pajak.index')); ?>">
                                        <i class="fas fa-file-invoice-dollar"></i>
                                        Data Pajak
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item <?php echo e(set_active('pengguna.index')); ?>">
                        <a href="<?php echo e(route('pengguna.index')); ?>" aria-expanded="false">
                            <i class="fas fa-users"></i>
                            <p>Data Pengguna</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo e(set_active('pengujian.index')); ?>">
                        <a href="<?php echo e(route('pengujian.index')); ?>" aria-expanded="false">
                            <i class="fas fa-users"></i>
                            <p>Data Pengujian</p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(auth()->user()->level == 'Pedagang'): ?>
                    <li class="nav-item <?php echo e(set_active(['datadiri', 'data_pedagang', 'perpanjangan.form.tambah'])); ?>">
                        <a data-toggle="collapse" href="#pedagang">
                            <i class="fas fa-university"></i>
                            <p>Pedagang</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse <?php echo e(set_show(['datadiri', 'data_pedagang', 'perpanjangan.form.tambah'])); ?>"
                            id="pedagang">
                            <ul class="nav nav-collapse">
                                <li class="<?php echo e(set_active('datadiri')); ?>">
                                    <a href="<?php echo e(route('datadiri')); ?>">
                                        <i class="fas fa-users"></i>
                                        Pendaftaran Pedagang
                                    </a>
                                </li>
                                <li class="<?php echo e(set_active('data_pedagang')); ?>">
                                    <a href="<?php echo e(route('data_pedagang')); ?>">
                                        <i class="fas fa-user"></i>
                                        Data Diri Pedagang
                                    </a>
                                </li>
                                <li class="<?php echo e(set_active('perpanjangan.form.tambah')); ?>">
                                    <a href="<?php echo e(route('perpanjangan.form.tambah')); ?>">
                                        <i class="fas fa-user-tie"></i>
                                        Perpanjangan Pedagang
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item <?php echo e(set_active(['pertama', 'tunggakan'])); ?>">
                        <a data-toggle="collapse" href="#pembayaran">
                            <i class="fas fa-shopping-cart"></i>
                            <p>Pembayaran</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse <?php echo e(set_show(['pertama', 'tunggakan'])); ?>" id="pembayaran">
                            <ul class="nav nav-collapse">
                                <li class="<?php echo e(set_active('pertama')); ?>">
                                    <a href="<?php echo e(route('pertama')); ?>">
                                        <i class="fas fa-users"></i>
                                        Pembayaran Pajak
                                    </a>
                                </li>
                                <li class="<?php echo e(set_active('tunggakan')); ?>">
                                    <a href="<?php echo e(route('tunggakan')); ?>">
                                        <i class="fas fa-user"></i>
                                        Pembayaran Tunggakan
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    
                <?php endif; ?>


            </ul>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/layout/sidebar.blade.php ENDPATH**/ ?>