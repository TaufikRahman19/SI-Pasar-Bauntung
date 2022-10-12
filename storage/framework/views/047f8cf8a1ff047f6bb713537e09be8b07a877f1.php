<?php $__env->startSection('title', 'Login Page'); ?>

<?php $__env->startSection('content'); ?>
<!-- Container -->
<div class="content">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <br>
        <div class="card-pricing2 card-warning">
            <div class="pricing-header">
                <h3 class="fw-bold">LOGIN</h3>
                <span class="sub-title">Aplikasi Pengelolaan Data</span>
                <span class="sub-title">UPT Pasar Bauntung </span>
            </div>
            <div class="price-value">
                <div class="value">
                    <span class="logo"><img src="<?php echo e(asset('/assets/img/Logo_B_Mini.png')); ?>" alt="..." ></span>
                </div>
            </div>w
            <div class="card-body">
                <div class="col-md-12">
                    <br>
                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <input type="text" class="form-control form-control" id="name" name="name" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-warning btn-border btn-lg w-100 fw-bold mb-3"><i class="fas fa-key"> Login</i></button>
                        </div>
                    </form>
                    <label>Belum punya akun ? <a href="<?php echo e(route('register')); ?>">Daftar disini</a></label>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Container -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/auth/login.blade.php ENDPATH**/ ?>