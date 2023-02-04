<?php
$thumbnail = $post->getThumbnail();
$thumbnailClass = '';

if(!$thumbnail) {
    $thumbnail = get_theme_file_uri('assets/images/no-thumbnail-01.png');
    $thumbnailClass = 'no-thumbnail';
}
?>

<div class="card card--post">
    <div class="card-body">

        <div class="card-left">
            <div class="post-thumbnail <?php echo e($thumbnailClass); ?>" style="background-image: url(<?php echo e($thumbnail); ?>)">
                <div class="post-date">
                    <div class="date"><?php echo e($post->getDate('d')); ?></div>
                    <div class="month"><?php echo e($post->getDate('M')); ?></div>
                </div>

                <?php if($thumbnailClass): ?>
                <div class="categories">
                    <?php $__currentLoopData = $post->getCategories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($category->name); ?>

                        <?php break; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>

            </div>
        </div>

        <div class="card-content">
            <h2 class="fancy"><a href="<?php echo e($post->getPermalink()); ?>"><?php echo e($post->getTitle()); ?></a></h2>

            <div class="categories">
                <?php $__currentLoopData = $post->getCategories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="<?php echo get_term_link($category);?>" class="forge-wp-term wp-term"><?php echo $category->name;?></a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <hr/>


            <p class="card-text"><?php echo e($post->getExcerpt()); ?></p>
        </div>
    </div>
</div><?php /**PATH /var/www/html/forge/public/content/themes/forge/templates/components/card.blade.php ENDPATH**/ ?>