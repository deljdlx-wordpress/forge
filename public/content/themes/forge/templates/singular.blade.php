@extends('layouts.singular')

@section('content')

<section>


    <h1>{{$post->getTitle()}}</h1>


    <div>
        <div class="single-post__title__meta">
            <h2><?=get_the_date('d');?></h2>
            <span><?=get_the_date('M');?></span>
        </div>
        <div class="single-post__title__text">
            <ul class="label">
                <?php
                    forge_display_categories('<li><a href="%url">name</a></li>')
                ?>
            </ul>

            <ul class="widget">
                <li>by {{$post->getAuthor()}}</li>
                <li>3 min read</li>
                <li>20 Comment</li>
            </ul>
        </div>
    </div>


    

    <div class="single-post__tags">
        <?php
                        forge_display_categories();
                        $categories = get_the_category();
                    ?>
    </div>


    <div class="single-post__next__previous">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <a href="#" class="single-post__previous">
                    <h6><span class="arrow_carrot-left"></span> Previous posts</h6>
                    <div class="single-post__previous__meta">
                        <h4>08</h4>
                        <span>Aug</span>
                    </div>
                    <div class="single-post__previous__text">
                        <span>Dinner</span>
                        <h5>The Best Weeknight Baked <br />Potatoes, 3 Creative Ways</h5>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">
                <a href="#" class="single-post__next">
                    <h6>Next posts <span class="arrow_carrot-right"></span> </h6>
                    <div class="single-post__next__meta">
                        <h4>05</h4>
                        <span>Aug</span>
                    </div>
                    <div class="single-post__next__text">
                        <span>Smoothie</span>
                        <h5>The $8 French Rosé I Buy in <br />Bulk Every Summer</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <?php
                // dump($__env);
                ?>


    @wp_include('templates/partials/author-profile')
    {{-- @wp_include('partials/comments')
                @wp_include('partials/comment-form') --}}

    <!--
                <?=get_template_part('partials/comment-form')?>
                //-->


</section>

@endsection