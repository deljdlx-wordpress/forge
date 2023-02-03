@extends('layouts.main')

@section('content')



        @foreach(wp_forge()->loop->getPosts() as $post)
            <div class="col-12 mb-3">
                <x-card :post="$post"></x-card>
            </div>
        @endforeach

@endsection
