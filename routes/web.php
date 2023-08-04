<?php

use App\Models\Post;
use App\Models\Category;
use App\Models\User;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('home', [
    'title' => 'Home',
    'active' => 'home',
  ]);
});

Route::get('/about', function () {
  return view('about', [
    'title' => 'About',
    'active' => 'about',
    'name' => 'Paijem binti Kartolo',
    'email' => '5Gk0M@example.com',
    'image' => 'user_01.jpeg'
  ]);
});


// NON CONTROLLER way
// Route::get('/posts', function () {

//   return view('posts', [
//     'title' => 'Posts',
//     'posts' => Post::all()
//   ]);
// });

// CONTROLLER way
Route::get('/posts', [PostController::class, 'index'] );



// Halaman single post
// NON CONTROLLER way
// Route::get('posts/{slug}', function($slug){

//   return view('post', [
//     'title' => 'Single Post',
//     'post' => Post::find($slug),
//   ]);
// });

// CONTROLLER way
Route::get('/posts/{post:slug}', [PostController::class, 'show'] );    // using feature `Route Model Binding`
// `Routes Model Binding` Menggunakan default value = id (post)




// NOT CONTROLLER WAY , routes for Category
Route::get('/categories', function(){
  return view('categories', [
    'title' => 'Post Categories',
    'active' => 'categories',
    'categories' => Category::all(),
  ]);
});

// Route::get('/categories/{category:slug}', function(Category $category){
//   return view('posts', [
//     'title' => "Post By Category : " . $category->name,
//     'active' => 'categories',
//     'posts' => $category->posts->load('author', 'category'),      // using feature Lazy Eager Loading (Lazy loading on parents, once the parent is gotten, then loads all the rest data )
//   ]);
// });

// // TRY AND ERROR
// Route::get('/categories/{category:slug}',  [PostController::class, 'bycategory']);

// // NOT CONTROLLER WAY , routes for Authors (User)
// Route::get('/authors/{author:username}', function(User $author){
//   return view('posts', [
//     'title' => 'Post By Author : ' . $author->name,
//     'active' => 'posts',
//     'posts' => $author->posts->load(['category', 'author']),    // using feature Lazy Eager Loading (Lazy loading on parents, once the parent is gotten, then loads all the rest data )
//   ]);
// });

