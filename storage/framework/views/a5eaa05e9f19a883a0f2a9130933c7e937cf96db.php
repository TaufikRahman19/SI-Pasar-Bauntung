<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?php echo e(asset('/assets/img/Logo_B.ico')); ?>" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="<?php echo e(asset('/assets/js/plugin/webfont/webfont.min.js')); ?>"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['<?php echo e(url("/assets/css/fonts.min.css")); ?>']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/atlantis.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.21/datatables.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.3.5/dist/sweetalert2.all.min.js">

</head>

<body>
    <div class="wrapper">

        <!-- Header -->
        <?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Header -->

        <!-- Sidebar -->
        <?php echo $__env->make('layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- End Sidebar -->

        <div class="main-panel">
            <!-- Container -->
            <?php echo $__env->yieldContent('contain'); ?>
            <!-- End Container -->

            <!-- Footer -->
            <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- End Footer -->

        </div>
    </div>

    <?php echo $__env->yieldContent('modal'); ?>

    <!--   Core JS Files   -->
    <script src="<?php echo e(asset('/assets/js/core/jquery.3.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/js/core/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/js/core/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')); ?>"></script>
    <!-- jQuery UI -->
    <script src="<?php echo e(asset('/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')); ?>"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?php echo e(asset('/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')); ?>"></script>
    <!-- Datatables -->
    <script src="<?php echo e(asset('/assets/js/plugin/datatables/datatables.min.js')); ?>"></script>

    <!-- Atlantis JS -->
    <script src="<?php echo e(asset('/assets/js/atlantis.min.js')); ?>"></script>

    <?php echo $__env->yieldContent('script'); ?>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/layout/main.blade.php ENDPATH**/ ?>