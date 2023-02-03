@extends('layouts.common.default')

@section('page-content')

    @yield('header')


    <div class="container">
        <div class="row navbar-header">
            <div class="col">
                @include('partials/navbar')
            </div>
        </div>

        <div class="row sidebar-top">
            <div class="col">
                {{wp_forge()->sidebar->render('sidebar-top')}}
            </div>
        </div>


        <div class="row" style="margin-top: 1rem">
            <div class="col col-8">
                <div class="content-block">
                    @yield('content-main')
                </div>
            </div>

            <div class="col col-4 sidebar-right">
                @include('partials/navbar-right')
            </div>
        </div>
    </div>

@endsection



