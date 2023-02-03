@extends('layouts.common.with-right-column')


@section('header')
    <header>
        <div style="background-image: url(@themeUri('assets/images/header-01.png')); background-size: contain; background-position: 50%; background-repeat: no-repeat; height: 50vh;"></div>
        <div class="site-header-title" style=";">
            <div class="site-title fancy">DelJdlx Forge</div>
            <div class="site-pitch fancy">Code snippets vault</div>
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



