<div class="card">
    <div class="card-body">
        <img src="<?php echo e($post->getThumbnail()); ?>" class="post-thumbnail" alt="...">
        <h2 class="fancy"><a href="<?php echo e($post->getPermalink()); ?>"><?php echo e($post->getTitle()); ?></a></h2>
        <p class="card-text"><?php echo e($post->getExcerpt()); ?></p>
    </div>
</div><?php /**PATH /var/www/html/forge/public/content/themes/forge/templates/components/card.blade.php ENDPATH**/ ?>