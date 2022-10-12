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
                
                <li class="nav-item <?php echo e(set_active(['pedagang.index','pedagang.form.tambah'])); ?>">
                    <a data-toggle="collapse" href="#pedagang">
                        <i class="fas fa-users"></i>
                        <p>Pedagang</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse <?php echo e(set_show(['pedagang.index','pedagang.form.tambah'])); ?>" id="pedagang">
                        <ul class="nav nav-collapse">
                            <li class="<?php echo e(set_active('pedagang.index')); ?>">
                                <a href="<?php echo e(route('pedagang.index')); ?>">
                                    <span class="sub-item">Daftar Pedagang</span>
                                </a>
                            </li>
                            <li class="<?php echo e(set_active('pedagang.form.tambah')); ?>">
                                <a href="<?php echo e(route('pedagang.form.tambah')); ?>">
                                    <span class="sub-item">Tambah Pedagang</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                
            </ul>
        </div>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\SI-Toko-Bagunan-master\resources\views/layout/sidebar.blade.php ENDPATH**/ ?>