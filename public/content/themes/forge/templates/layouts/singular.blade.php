@extends('layouts.common.with-right-column')


@section('header')
    <header style="display: flex" class="container">
        <img src="<?=get_theme_file_uri('assets/images/present-01.png');?>" style="background-size: contain; background-position: 0 50%; background-repeat: no-repeat; height: 50vh;"/>
        <div style="text-align: center;">
            <div class="site-title fancy" style="padding-top: 20vh">
                <h1 style="font-size: 4rem; text-align: center">{{$post->getTitle()}}</h1>
            </div>
        </div>
    </header>
@endsection


@section('content-main')
    <div style="">
        <div class="col col-12" style="height: 400px; width: 100%; background-image: url({{$post->getThumbnail()}}); background-size: cover; background-position: 50%">
        </div>
        {!!$post->getContent()!!}
    </div>
@endsection


