<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="img/rsuns.ico" type="image/x-icon" />
    {{-- <link rel="shortcut icon" href="https://simpeg.rs.uns.ac.id/assets/img/logo-sh.png" /> --}}

    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

    <!-- Bootstrap ICONS -->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"> --}}

    


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <!-- <link rel='stylesheet' id='roboto-subset.css-css'  href='https://mdbcdn.b-cdn.net/wp-content/themes/mdbootstrap4/docs-app/css/mdb5/fonts/roboto-subset.css?ver=3.9.0-update.5' type='text/css' media='all' /> -->
    
    <!-- MDB 5 Pro Default CSS -->
    <link rel="stylesheet" href="/assets/css/mdb.min.css" />



    <!-- My Style -->
    <link rel="stylesheet" href="/assets/css/style.css"/>



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

    {{-- meletakkan komponen footer --}}
    {{-- HIRARKI LUAR -> DALAM --}}
    @include('partials.footer') {{-- JANGAN GUNAKAN SEMICOLON `;` UTK MENUTUP SUATU Directives  --}}

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}

    <!-- MDB 5 Pro Default JS -->
    <script type="text/javascript" src="/assets/js/mdb.min.js"></script>

  </body>
</html>