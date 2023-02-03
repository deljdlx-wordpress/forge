<?php $__env->startSection('header'); ?>
    <header style="display: flex" class="container">
        <img src="<?=get_theme_file_uri('assets/images/present-01.png');?>" style="background-size: contain; background-position: 0 50%; background-repeat: no-repeat; height: 50vh;"/>
        <div style="text-align: center;">
            <div class="site-title fancy" style="padding-top: 20vh">
                <h1 style="font-size: 4rem; text-align: center"><?php echo e($post->getTitle()); ?></h1>
            </div>
        </div>
    </header>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content-main'); ?>
    <div style="">
        <div class="col col-12" style="height: 400px; width: 100%; background-image: url(<?php echo e($post->getThumbnail()); ?>); background-size: cover; background-position: 50%">
        </div>
        <?php echo $post->getContent(); ?>

    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.common.with-right-column', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/forge/public/content/themes/forge/templates/layouts/singular.blade.php ENDPATH**/ ?>