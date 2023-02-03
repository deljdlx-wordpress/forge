<?php $__env->startSection('header'); ?>
    <header>
        <div style="background-image: url(<?php echo get_theme_file_uri('assets/images/header-01.png');?>); background-size: contain; background-position: 50%; background-repeat: no-repeat; height: 50vh;"></div>
        <div class="site-header-title" style=";">
            <div class="site-title fancy">DelJdlx Forge</div>
            <div class="site-pitch fancy">Code snippets vault</div>
        </div>
    </header>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content-main'); ?>
    <?php echo $__env->yieldContent('content'); ?>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.with-right-column', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/forge/public/content/themes/forge/templates/layouts/main.blade.php ENDPATH**/ ?>