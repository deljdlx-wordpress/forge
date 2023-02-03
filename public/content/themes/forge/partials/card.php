<div class="col-lg-3 col-md-4 col-sm-6">
    <div class="categories__post__item">
        <div class="categories__post__item__pic small__item set-bg"
            data-setbg="<?=get_the_post_thumbnail_url()?>">
            <div class="post__meta">
                <h4>08</h4>
                <span>Aug</span>
            </div>
        </div>
        <div class="categories__post__item__text">


            <?php
                forge_display_categories('<a href="%url" class="post__label">%name</a>')
            ?>


            <h3><a href="<?=get_the_permalink()?>"><?=get_the_title();?></a></h3>
            <ul class="post__widget">
                <li>by <span><?=get_the_author();?></span></li>
                <!--
                <li>3 min read</li>
                <li>20 Comment</li>
                //-->
            </ul>
            <p><?=get_the_excerpt()?></p>
        </div>
    </div>
</div>