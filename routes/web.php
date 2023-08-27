<?php

// use App\Models\Post;
// use App\Models\User;
use App\Models\Post;


use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\AdminCategoryController;



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


// Authentication Routes
// 1. route diberi nama (spt halnya NAMESPACE), bertujuan agar routing lbh mudah diakses, tidak harus pakai '/'
// 2. penambahan middleware checking, login page hanya bisa diakses by `guest` (NOT logged in)
// 3. cth routing yg mengakses 'login' ini ada di middleware Authenticate.php , ketika akses page dgn credentials, tapi credentials tdk ditemukan maka diredirect ke route login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);   // logout route


// Registration Routes
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');  // penambahan middleware checking, registration page hanya bisa diakses by `guest` (NOT logged in)
Route::post('/register', [RegisterController::class, 'store']);


// // Dashboard Routes
// // Routes lama pake controller -> Dashboar idealnya dibuat route khusus terpisah
// Route::get('/dashboard', [DashboardController::class, 'index'] )->middleware('auth');  // penambahan middleware checking, dashboard page hanya bisa diakses by `authenticated user` (LOGGED in)
Route::get('dashboard', function(){
  return view('dashboard.index');
})->middleware('auth');


// Route utk menangani request pembuatan slug otomatis
// ini Route terpisah dari entity Dashboard post, walau controller nya menuju ke DashboardPostController (Resource Controller)
// karena ini route spesifik, maka harus didahulukan ( ROUTE SPESIFIK HARUS DI TARUS DI ATAS ROUTE GENERIK/ENTITY )
Route::get('/dashboard/posts/createMySlug', [DashboardPostController::class, 'createMySlug'])->middleware('auth');


// Route::get('/dashboard/posts/{posts:slug}', [DashboardPostController::class, 'index'])->middleware('auth');

// memanfaatkan RESOURCE CONTROLLER
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');


/**
* 1. Route Admin Category ke Resource Controller
* 2. Mengecualikan show dari category controller (ga dipakai) -> `except`
* 3. middleware `isAdmin` adalah middleware custom buatan kita utk otorisasi role user
*
*/
Route::resource('/dashboard/categories', AdminCategoryController::class)
  ->except('show')
  ->middleware('isAdmin');