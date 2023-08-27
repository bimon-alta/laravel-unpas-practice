@extends('dashboard.layouts.main')


@section('container')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
  </div>
  <div class="col-lg-8">

    <!-- auto mengarah ke method `store` pada resource controller DashboardPostController -->
    <form method="post" action="/dashboard/posts/{{ $post->slug }}" class="mb-5" enctype="multipart/form-data"> 

      @method('put')
      
      @csrf
      <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" required autofocus value="{{ old('title', $post->title) }}" >
        @error('title') 
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" class="form-control  @error('slug') is-invalid @enderror" id="slug" name="slug" required value="{{ old('slug', $post->slug) }}" >
        @error('slug') 
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="category" class="form-label">Category</label>
        <select class="form-select" name="category_id">

          @foreach ($categories as $category)
            @if(old('category_id', $post->category_id) == $category->id) 
              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
            @else
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endif
          @endforeach

        </select>
      </div>

      <div class="mb-3">
        <label for="image" class="form-label">Post Image</label>

        <input type="hidden" name="oldImage" value="{{ $post->image }}" />
        @if($post->image)
          <img src="{{ asset('storage/' . $post->image) }}" alt=""class="img-preview img-fluid mb-3 col-sm-5 d-block"/>
        @else
          <img src="" alt=""class="img-preview img-fluid mb-3 col-sm-5"/>
        @endif
        
        

        <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image"  onchange="previewImage()">
        @error('image') 
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        @error('body')
          <p class="text-danger">{{ $message }}</p>
        @enderror
        
        <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}" >
        <trix-editor input="body"></trix-editor>

      </div>


      <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
    
  </div>


  <!-- JS SCRIPT UTK MELAKUKAN REQUEST/FETCH PEMBUATAN SLUG OTOMATIS -->
  <script>
    // MODE REQUEST/FETCH API
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
      fetch('/dashboard/posts/createMySlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });


    // // MODE CLIENT SIDE (JS MANIPULATION)
    // const title = document.querySelector("#title");
    // const slug = document.querySelector("#slug");

    // title.addEventListener("keyup", function() {
    //   let preslug = title.value;
    //   preslug = preslug.replace(/ /g,"-");
    //   slug.value = preslug.toLowerCase();
    // });

    document.addEventListener('trix-file-accept', function(e) {
      e.preventDefault();
    });

  </script>

  <!-- JS SCRIPT UTK Menampilkan Preview Image -->
  <script>
    function previewImage(){
      
    
      const iamge = document.querySelector('#image');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';
      const OFReader = new FileReader();
      OFReader.readAsDataURL(image.files[0]);
      OFReader.onload = function(e){
        imgPreview.src = e.target.result;
      }

    }
  </script>


@endsection