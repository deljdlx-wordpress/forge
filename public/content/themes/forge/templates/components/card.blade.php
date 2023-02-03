<div class="card">
    <div class="card-body">
        <img src="{{$post->getThumbnail()}}" class="post-thumbnail" alt="...">
        <h2 class="fancy"><a href="{{$post->getPermalink()}}">{{$post->getTitle()}}</a></h2>
        <p class="card-text">{{$post->getExcerpt()}}</p>
    </div>
</div>