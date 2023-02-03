<?php $__env->startSection('content'); ?>
        <?php $__currentLoopData = wp_forge()->loop->getPosts(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 mb-3">
                <?php if (isset($component)) { $__componentOriginalc3d588f985d789f569777a4a96a8f87dd882a6cf = $component; } ?>
<?php $component = Deljdlx\WPForge\Components\Card::resolve(['post' => $post] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Deljdlx\WPForge\Components\Card::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc3d588f985d789f569777a4a96a8f87dd882a6cf)): ?>
<?php $component = $__componentOriginalc3d588f985d789f569777a4a96a8f87dd882a6cf; ?>
<?php unset($__componentOriginalc3d588f985d789f569777a4a96a8f87dd882a6cf); ?>
<?php endif; ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.homepage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/forge/public/content/themes/forge/templates/homepage.blade.php ENDPATH**/ ?>