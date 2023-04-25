<h1>Categories</h1>
<form action="?page=test" method="post">
    <input placeholder="new category" name="categoryName"/>
    <button>Save</button>
</form>
<ul>
    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li>
            <?php echo e($category->name); ?> <a href="?page=test&delete=<?php echo e($category->id); ?>">❌</a>

        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</ul>
<?php if (isset($component)) { $__componentOriginal09e944d8f030dc4b911306b49dc9c9981ac9ddbf = $component; } ?>
<?php $component = Deljdlx\WPForge\Components\RandomNumber::resolve(['min' => '50','max' => '75'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('random-number'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Deljdlx\WPForge\Components\RandomNumber::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal09e944d8f030dc4b911306b49dc9c9981ac9ddbf)): ?>
<?php $component = $__componentOriginal09e944d8f030dc4b911306b49dc9c9981ac9ddbf; ?>
<?php unset($__componentOriginal09e944d8f030dc4b911306b49dc9c9981ac9ddbf); ?>
<?php endif; ?>
<?php /**PATH /var/www/html/forge/public/content/themes/forge/templates/categories.blade.php ENDPATH**/ ?>