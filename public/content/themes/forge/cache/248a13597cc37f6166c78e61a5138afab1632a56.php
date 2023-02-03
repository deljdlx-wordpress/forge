<?php $__env->startSection('page-content'); ?>

    <?php echo $__env->yieldContent('header'); ?>


    <div class="container">
        <div class="row navbar-header">
            <div class="col">
                <?php echo $__env->make('partials/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>


        <div class="row" style="margin-top: 1rem">
            <div class="col col-8">
                <div class="content-block">
                    <?php echo $__env->yieldContent('content-main'); ?>
                </div>
            </div>

            <div class="col col-4 sidebar-right">
                <?php echo $__env->make('partials/navbar-right', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>




<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/forge/public/content/themes/forge/templates/layouts/with-right-column.blade.php ENDPATH**/ ?>