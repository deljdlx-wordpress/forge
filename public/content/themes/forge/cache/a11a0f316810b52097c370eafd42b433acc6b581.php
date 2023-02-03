<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>


    <style>
        body {
            background-color: <?php echo e(wp_forge()->customizer->getSetting('background-color')); ?>

        }
        #header-menu {
            background-color: <?php echo e(wp_forge()->customizer->getSetting('header-background-color')); ?>

        }
    </style>


</head>
<body class="forge">
    <div class="layout">


        <?php echo $__env->yieldContent('page-content'); ?>

        <footer class="forge-layout-footer">
            <div class="container">
                <?php echo $__env->make('partials/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </footer>

    </div>
    <?php wp_footer(); ?>

</body>
</html>
<?php /**PATH /var/www/html/forge/public/content/themes/forge/templates/layouts/home.blade.php ENDPATH**/ ?>