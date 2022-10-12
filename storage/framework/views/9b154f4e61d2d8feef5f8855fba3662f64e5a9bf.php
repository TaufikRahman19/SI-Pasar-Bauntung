<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />

    <!-- Fonts and icons -->
    <script src="<?php echo e(asset('/assets/js/plugin/webfont/webfont.min.js')); ?>">
    </script>
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

    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/assets/css/atlantis.min.css')); ?>">

</head>

<body>
    <div class="wrapper">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

</body>

</html><?php /**PATH C:\xampp\htdocs\SI-Pasar-Bauntung\resources\views/layout/user.blade.php ENDPATH**/ ?>