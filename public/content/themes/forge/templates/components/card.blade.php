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
            <div class="post-thumbnail {{$thumbnailClass}}" style="background-image: url({{$thumbnail}})">
                <div class="post-date">
                    <div class="date">{{$post->getDate('d')}}</div>
                    <div class="month">{{$post->getDate('M')}}</div>
                </div>

                @if($thumbnailClass)
                <div class="categories">
                    @foreach($post->getCategories() as $category)
                        {{$category->name}}
                        @break
                    @endforeach
                </div>
                @endif

            </div>
        </div>

        <div class="card-content">
            <h2 class="fancy"><a href="{{$post->getPermalink()}}">{{$post->getTitle()}}</a></h2>

            <div class="categories">
                @foreach($post->getCategories() as $category)
                    @termLink($category)
                @endforeach
            </div>

            <hr/>


            <p class="card-text">{{$post->getExcerpt()}}</p>
        </div>
    </div>
</div>