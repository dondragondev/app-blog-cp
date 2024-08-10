<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\Catagory;

Route::get('/', function () {
    return view("home", [
        "title" => "Home",
        "active" => "home"
      ]);
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified', 'normal'])
    ->name('dashboard');
Route::view('admin', 'admin')
    ->middleware(['auth', 'verified', 'admin'])
    ->name('admin');
Route::view('superadmin', 'superadmin')
    ->middleware(['auth', 'verified', 'superadmin'])
    ->name('superadmin');
    
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get("/about", function () {
    return view("about", [
      "title" => "About",
      "name" => "Monkichi",
      "email" => "monkichiemail@gmail.com",
      "image" => "monkichi.jpg",
      "active" => "about"
    ]);
  });
  
  Route::get("/posts", [PostController::class, 'index']);
  // halaman single post
  Route::get('posts/{post:slug}', [PostController::class, 'show']);
  
  Route::get("/catagories", function () {
    return view("catagories", [
      "title" => "Post Catagory",
      "active" => "catagory",
      "catagories" => Catagory::all()
    ]);
  });

require __DIR__.'/auth.php';
