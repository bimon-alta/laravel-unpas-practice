<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>RS UNS | {{ $title }}</title>
  </head>
  <body>
    
    {{-- meletakkan komponen navbar --}}
    {{-- HIRARKI LUAR -> DALAM --}}
    @include('partials.navbar') {{-- JANGAN GUNAKAN SEMICOLON `;` UTK MENUTUP SUATU Directives  --}}


    <div class="container mt-4">
      <!-- test komen di blade -->
      {{-- Konten yang berbeda tiap child (page), maka dibuat spt ini --}}
      @yield('container')

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>