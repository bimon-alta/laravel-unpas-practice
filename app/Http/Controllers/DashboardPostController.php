<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

// service dari package EloquentSlugable utk fitur auto slug thd title post
use Cviebrock\EloquentSluggable\Services\SlugService;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // return Post::where('user_id', auth()->user()->id)->get();

      return view('dashboard.posts.index', [
        'posts' => Post::where('user_id', auth()->user()->id)->get()
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
      return view('dashboard.posts.create', [
        'categories' => Category::all(),
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // ddd($request);    // dump die & debug

      // return $request->file('image')->store('post-images');
      
      // return $request;
      $validatedData = $request->validate([
        'title' => 'required|max:255',
        'slug' => 'required|unique:posts',
        'category_id' => 'required',
        'image' => 'image|file|max:1024',     // max file size 1MB
        'body' => 'required'
      ]);


      // validasi inputan upload file image
      if($request->file('image')){
        $validatedData['image'] = $request->file('image')->store('post-images');
      }

      $validatedData['user_id'] = auth()->user()->id;
      $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

      Post::create($validatedData);

      return redirect('/dashboard/posts')->with('success', 'New Post has been created');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
      return view('dashboard.posts.show', [
        'post' => $post
      ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
      return view('dashboard.posts.edit', [
        'post' => $post,
        'categories' => Category::all()
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      $rules = [
        'title' => 'required|max:255',
        'category_id' => 'required',
        'image' => 'image|file|max:1024',     // max file size 1MB
        'body' => 'required'
      ];

      

      // Validasi thd prop slug hanya jika slug yg diinputkan berbeda
      // dari nilai pada data sebelumnya
      if($request->slug != $post->slug){
        $rules['slug'] = 'required|unique:posts';
      }

      $validatedData = $request->validate($rules);

      // validasi inputan upload file image
      if($request->file('image')){

        // Jika postingan sebelumnya memiliki gambar, 
        // maka gambar lama tersebut harus dihapus dari storage (file system) dulu
        if($request->oldImage){
          Storage::delete($request->oldImage);
        }
        
        // upload gambar baru men-OVERWRITE gambar lama
        $validatedData['image'] = $request->file('image')->store('post-images');

      }

      $validatedData['user_id'] = auth()->user()->id;
      $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

      Post::where('id', $post->id)
            ->update($validatedData);

      return redirect('/dashboard/posts')->with('success', 'Post has been updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
      
      // Jika postingan memiliki gambar, 
      // maka gambar tsb harus dihapus dari storage (file system) 
      // ketika postingan dihapus
      if($post->image){
        Storage::delete($post->image);
      }

      Post::destroy($post->id);

      return redirect('/dashboard/posts')->with('success', 'Post has been deleted');
    }


    // method utk menangani request pembuatan slug otomatis
    public function createMySlug(Request $request){

      $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
      return response()->json(['slug' => $slug]);

    }

}
