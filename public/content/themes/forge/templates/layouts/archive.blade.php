@extends('layouts.common.with-right-column')


@section('header')
<header style="display: flex" class="container">
    <img src="<?=get_theme_file_uri('assets/images/header-archive-00.png');?>" style="background-size: contain; background-position: 0 50%; background-repeat: no-repeat; height: 50vh;"/>
    <div style="text-align: center;">
        <div class="site-title fancy" style="padding-top: 20vh">
            <h1 style="font-size: 4rem; text-align: center">
                Catégorie <br/>
                {{single_cat_title( '', false )}}
            </h1>
        </div>
    </div>
</header>
@endsection


@section('content-main')
    @foreach(wp_forge()->loop->getPosts() as $post)
    <div class="col-12 mb-3">
        <x-card :post="$post"></x-card>
    </div>
    @endforeach
@endsection



