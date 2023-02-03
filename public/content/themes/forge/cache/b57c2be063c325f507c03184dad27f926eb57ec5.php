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

        <header>
            <div style="background-image: url(<?=get_theme_file_uri('assets/images/header-01.png');?>); background-size: contain; background-position: 50%; background-repeat: no-repeat; height: 50vh;"></div>



            <div class="site-header-title" style=";">
                <div class="site-title fancy">DelJdlx Forge</div>
                <div class="site-pitch fancy">Code snippets vault</div>
            </div>
        </header>


        <div class="container">

            <div class="row">
                <div class="col">
                    <?php echo $__env->make('partials/navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>


            <div class="row" style="margin-top: 1rem">
                <div class="col col-8">
                    <div class="content-block">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>
                </div>

                <div class="col col-4">
                    <?php echo $__env->make('partials/navbar-right', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>


            </div>

            



        </div>
        <footer>
            <?php echo $__env->make('partials/footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </footer>
    </div>
    <?php wp_footer(); ?>

</body>
</html>
<?php /**PATH /var/www/html/forge/public/content/themes/forge/templates/layouts/main.blade.php ENDPATH**/ ?>