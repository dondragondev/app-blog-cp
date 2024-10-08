@extends('layouts.main')

@section('container')
<h1 class="mb-5">{{ $title }} </h1>
<div class="container">
  <div class="row">
    @foreach($catagories as $catagory)
    <div class="col-md-4">
      <a href="/posts?catagory={{ $catagory->slug }}">
        <div class="card bg-dark text-white">
          <img src="https://fakeimg.pl/500x500/?text={{ $catagory->name }}" class="card-img" alt="{{ $catagory->name }}">
          <div class="card-img-overlay d-flex align-items-center p-0">
            <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color: rgba(0,0,0, 0.7)">{{ $catagory->name }}</h5>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>
</div>


@endsection