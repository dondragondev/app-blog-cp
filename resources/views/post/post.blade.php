@extends('layouts.main')
@section('container')
    
<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <h1 class="mb-3"> {{ $post->title }} </h2>
            
            <p>By <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/posts?catagory={{ $post->catagory->slug }}" class="text-decoration-none">{{ $post->catagory->name }}</a> </p>
            
            <img src="https://fakeimg.pl/1200x400/?text={{ $post->catagory->name }}" class="img-fluid" alt="{{ $post->catagory->name }}"><p>

            <article class="my-3 fs-5">
                {!! $post->body !!}
            </article>
    
            <a href="/posts" class="d-block mt-3">Back to Post</a>
        </div>
    </div>
</div>


            @endsection
