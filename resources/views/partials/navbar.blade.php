
{{-- Cara buat komponen terpisah di blade PHP --}}
{{-- Buat folder partials di bawah layouts, dan buat komponen2 di sana spt komp nav ini --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <div class="container">
    <a class="navbar-brand" href="/">RS UNS Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          {{-- <!-- <a class="nav-link {{ ($active === "home") ? "active" : "" }}" href="/">Home</a> --> --}}
          <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
        </li>
        <li class="nav-item">
          {{-- <a class="nav-link {{ ($active === "about") ? "active" : "" }}" href="/about">About</a> --}}
          <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="/about">About</a>
        </li>
        <li class="nav-item">
          {{-- <a class="nav-link {{ ($active === "posts") ? "active" : "" }}" href="/posts">Blog</a> --}}
          <a class="nav-link {{ Request::is('posts') ? 'active' : '' }}" href="/posts">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === "categories") ? "active" : "" }}" href="/categories">Categories</a>
        </li>
      </ul>

      <ul class="navbar-nav ms-auto">
        
        @auth
          {{-- <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Welcome back, {{  auth()->user()->name }}</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">My Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Logout</a></li>
            </ul>
          </li> --}}

          <!-- Dropdown -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              Welcome back, {{  auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li>
                <a class="dropdown-item" href="/dashboard"><i class="fa-solid fa-chalkboard me-2"></i>My Dashboard</a>
              </li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="post">
                  @csrf
                  <button type="submit" class="dropdown-item" href="/logout"><i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Logout</button>
                </form>
              </li>
            </ul>
          </li>

        @else

          <li class="nav-item">
            <!-- Using Bootstrap Icons -->
            <!-- <a href="/login" class="nav-link {{ ($active === "login") ? "active" : "" }}" ><i class="bi bi-box-arrow-in-right"></i>Login</a> -->
            
            <!-- using Font Awesome Icon -->
            <a href="/login" class="nav-link {{ ($active === "login") ? "active" : "" }}" ><i class="fa-solid fa-arrow-right-to-bracket"></i>Login</a>
          </li>

        @endauth
        
      </ul>


      



    </div>
  </div>
</nav>