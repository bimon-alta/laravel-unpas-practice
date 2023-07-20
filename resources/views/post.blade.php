{{-- Directives `@` pada blade  --}}
{{-- Directives @dd (dump & die) bisa digunakan spt halnya var_dump, utk melihat isi variabel --}}
{{-- @dd($post) --}}

@extends('layouts.main')    {{-- JANGAN GUNAKAN SEMICOLON `;` UTK MENUTUP SUATU Directives  --}}


@section('container')

  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-8">

        <h1 class="mb-3">{{ $post->title }}</h1>
        {{-- <h5>{{ $post->author }}</h5> --}}
        
        <p>By. <a href="/authors/{{ $post->author->username }}" class="text-decoration-none">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}"  class="text-decoration-none" >{{ $post->category->name }}</a></p>

        <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid" />
        
        <article class="my-3 fs-5">
          {{-- tidak melakukan escaping HTML --}}
          {!! $post->body !!}   
        </article>

        <a href="/posts" class="d-block mt-3">Back To Posts</a>

      </div>
    </div>
  </div>

  
@endsection



