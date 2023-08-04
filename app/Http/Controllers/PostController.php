<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller {

  public function index() {
    // dd(request('search'));

    // TANPA SCOPE FILTERING pd MODELS
    // $posts = Post::latest();
    // if (request('search')) {
    //   $posts->where('title', 'like', '%' . request('search') . '%')
    //         ->orWhere('body', 'like', '%' . request('search') . '%');
    //   // dd($posts->get());
    // }

    $title = '';
    if(request('category')) {
      $category = Category::firstWhere('slug', request('category'));
      $title = ' in ' . $category->name;
    }

    if(request('author')) {
      $author = User::firstWhere('username', request('author'));
      $title = ' by ' . $author->name;
    }

    return view('posts', [
      'title' => 'All Posts' . $title,
      'active' => 'posts',
      // 'posts' => Post::all()

      // Gunakan keyword WITH utk menyertakan model terelasi yg dibutuhkan
      // dengan hal ini akan mencegah Eloquent memilih LAZY LOADING utk get data
      // Metode ini disebut EAGER LOAD
      // 'posts' => Post::with(['author', 'category'])->latest()->get()

      // with sudah ditempatkan di MODELS
      // 'posts' => Post::latest()->get()

      // dengan SCOPE FILTERING pd MODELS
      // 'posts' => Post::latest()->filter(request(['search','category', 'author']))->get()

      //PAGINATION with PAGINATE
      // withQueryString berarti menyertakan req query params pd pagination, jika tidak akan tereset
      'posts' => Post::latest()->filter(request(['search','category', 'author']))->paginate(4)->withQueryString()

      // TANPA SCOPE FILTERING pd MODELS
      // 'posts' => $posts->get()

    ]);
  }

  // TRY AND ERROR
  // public function bycategory($category) {

  //   return view('posts', [
  //     'title' => 'Post By Category : ' . $category,
  //     'active' => 'posts',
  //     // 'posts' => Post::latest()->filter(request(['category']))->get()
  //     'posts' => Post::latest()->get()

  //   ]);
  // }

  public function show(Post $post) {    // using feature `Routes Model Binding`
    // return view('post', [
    //   'title' => 'Single Post',
    //   'post' => Post::find($slug),
    // ]);

    // feature `Routes Model Binding` enables you to pass a model directly 
    // without querying
    return view('post', [
      'title' => 'Single Post',
      'active' => 'posts',
      'post' => $post,
    ]);
    
  }
    
}
