<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller {

  public function index() {
    return view('posts', [
      'title' => 'All Posts',
      'active' => 'posts',
      // 'posts' => Post::all()

      // Gunakan keyword WITH utk menyertakan model terelasi yg dibutuhkan
      // dengan hal ini akan mencegah Eloquent memilih LAZY LOADING utk get data
      // Metode ini disebut EAGER LOAD
      // 'posts' => Post::with(['author', 'category'])->latest()->get()

      // with sudah ditempatkan di MODELS
      'posts' => Post::latest()->get()
    ]);
  }

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
