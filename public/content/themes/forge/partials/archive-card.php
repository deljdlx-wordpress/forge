<div class="categories__list__post__item">
    <div class="row">

        <div class="col-lg-6 col-md-6">
            <div class="categories__post__item__pic set-bg" data-setbg="<?=get_the_post_thumbnail_url()?>">
                <div class="post__meta">
                    <h4><?=get_the_date('d');?></h4>
                    <span><?=get_the_date('M');?></span>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="categories__post__item__text">

                <?=forge_display_categories('<a href="%url" class="post__label">%name</a> ')?>

                <h3><a href="<?=get_the_permalink()?>"><?=get_the_title()?></a></h3>
                <ul class="post__widget">
                    <li>by <span><?=get_the_author_meta('display_name')?></span></li>
                    <li>3 min read</li>
                    <li>20 Comment</li>
                </ul>
                <p><?=get_the_excerpt()?></p>
            </div>
        </div>
    </div>
</div>