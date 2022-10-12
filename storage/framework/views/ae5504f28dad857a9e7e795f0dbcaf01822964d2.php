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
                            <span class="user-level">Administrator</span>
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
                
                <li class="nav-item <?php echo e(set_active(['pedagang.index','pegawai.index','toko.index','fasilitas.index','kegiatan.index'])); ?>">
                    <a data-toggle="collapse" href="#master">
                        <i class="fas fa-university"></i>
                        <p>Data Master</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse <?php echo e(set_show(['pedagang.index','pegawai.index','toko.index','fasilitas.index','kegiatan.index'])); ?>" id="master">
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
                            <li class="<?php echo e(set_active('kegiatan.index')); ?>">
                                <a href="<?php echo e(route('kegiatan.index')); ?>">
                                    <i class="far fa-calendar-alt"></i>
                                    Data Kegiatan
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                <li class="nav-item <?php echo e(set_active(['pajak.index','pembayaran.index'])); ?>">
                    <a data-toggle="collapse" href="#pajak">
                        <i class="fas fa-cart-plus"></i>
                        <p>Data Pembayaran</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse <?php echo e(set_show(['pajak.index','pembayaran.index'])); ?>" id="pajak">
                        <ul class="nav nav-collapse">
                            <li class="<?php echo e(set_active('pajak.index')); ?>">
                                <a href="<?php echo e(route('pajak.index')); ?>">
                                    <i class="fas fa-file-invoice-dollar"></i>
                                    Data Pajak
                                </a>
                            </li>
                            <li class="<?php echo e(set_active('pembayaran.index')); ?>">
                                <a href="<?php echo e(route('pembayaran.index')); ?>">
                                    <i class="fas fa-receipt"></i>
                                    Data Bayar
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
                
            </ul>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/layout/sidebar.blade.php ENDPATH**/ ?>