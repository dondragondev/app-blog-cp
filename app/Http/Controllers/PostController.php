<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
  public function index()
  {
    $title = "";
    $posts = Post::latest()->filter(request(['search', 'catagory', 'author']))->paginate(7)->withQueryString();
    if (request(['catagory'])) {
      $catagory = Catagory::firstWhere('slug', request(['catagory']));
      $title = " in  " . $catagory->name;
    }
    if (request(['author'])) {
      $author = User::firstWhere('username', request(['author']));
      $title = " By  " . $author->name;
    }
    return view("posts", [
      "title" => "All Posts" . $title,
      "active" => "posts",
      "posts" => $posts
    ]);
  }

  public function show(Post $post)
  {
    return view('post', [
      "title" => "Single Post",
      "active" => "posts",
      "post" => $post
    ]);
  }
}
