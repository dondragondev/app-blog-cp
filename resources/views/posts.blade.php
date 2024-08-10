@extends('layouts.main')

@section('container')
<h1 class="mb-5">{{ $title }}</h1>

<div class="row justify-content-center mb-3">
  <div class="col-md-6">
    <form action="/posts">
      <div class="input-group mb-3">
        @if(request('catagory'))
        <input type="hidden" name="catagory" value="{{ request('catagory') }}">
        @endif
        @if(request('author'))
        <input type="hidden" name="author" value="{{ request('author') }}">@endif
        <input type="text" class="form-control" placeholder="Search.." name="search" value="{{ request('search') }}">
        <button class="btn btn-danger" type="submit">Search</buttton>
      </div>
    </form>
  </div>
</div>

@if ($posts->count())
    
<div class="card mb-3">
  <img src="https://fakeimg.pl/1200x400/?text={{ $posts[0]->catagory->name }}" class="card-img-top" alt="{{ $posts[0]->catagory->name }}">
  <div class="card-body text-center">
    <h3 class="card-title"><a href="/posts/{{$posts[0]->slug}}" class="text-decoration-none text-dark">{{ $posts[0]->title}}</a></h3>
    <p>
      <small class="text-muted">
        By <a href="/posts?author={{ $posts[0]->author->username }}" class="text-decoration-none">{{ $posts[0]->author->name }}</a> in <a href="/posts?catagory={{ $posts[0]->catagory->slug }}" class="text-decoration-none">{{ $posts[0]->catagory->name }}</a>
         {{ $posts[0]->created_at->diffForHumans() }}    
      </small>
    </p>
    <p class="card-text">{{$posts[0]->excerpt }}</p>
    <a href="/posts/{{$posts[0]->slug}}" class="text-decoration-none btn btn-primary">Read More</a>
  </div>
</div>

<div class="container">
  <div class="row">
    @foreach($posts->skip(1) as $post)
    <div class="col-md-4 mb-3">
      <div class="card">
        <div class="position-absolute px-3 py-2" style="background-color:rgba(0,0,0,0.7)" ><a class="text-decoration-none text-white" href="/posts?catagory={{ $post->catagory->slug }}">{{ $post->catagory->name }}</a></div>
        <img src="https://fakeimg.pl/500x400/?text={{ $post->catagory->name }}" class="card-img-top" alt="{{ $post->catagory->name }}">       
        <div class="card-body">
          <h3 class="card-title"><a href="/posts/{{$post->slug}}" class="text-decoration-none text-dark">{{ $post->title}}</a></h3>
          <p>
            <small class="text-muted">
              By <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a>
               {{ $post->created_at->diffForHumans() }}    
            </small>
          </p> 
          <p class="card-text">{{$post->excerpt }}</p>
          <a href="/posts/{{$post->slug}}" class="text-decoration-none btn btn-primary">Read More</a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@else
  <p class="text-center fs-4">No post found</p>    
@endif

{{ $posts->links() }}
@endsection