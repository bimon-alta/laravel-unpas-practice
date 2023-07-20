
{{-- page (child) ini menggunakan layout `main` di folder `layouts` --}}
{{-- JANGAN GUNAKAN SEMICOLON `;` UTK MENUTUP SUATU Directives  --}}
@extends('layouts.main')

{{-- HIRARKI DALAM -> LUAR --}}

{{-- define what you want to display on layout's container section --}}
@section('container')
<h1>Ini Halaman Home</h1>
@endsection