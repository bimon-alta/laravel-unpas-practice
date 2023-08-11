
{{-- page (child) ini menggunakan layout `main` di folder `layouts` --}}
@extends('layouts.main')    {{-- JANGAN GUNAKAN SEMICOLON `;` UTK MENUTUP SUATU Directives  --}}


{{-- define what you want to display on layout's container section --}}
@section('container')
  <section class="vh-100">
    <h1>Halaman About</h1>
    <h3>{{ $name  }}</h3>
    <p>{{ $email  }}</p>
    <img src="img/{{  $image  }}" alt="{{  $name  }}" width="200" class="img-thumbnail rounded-circle" />
  </section>
@endsection


