@extends('layouts.main')

@section('container')

  {{-- <div class="row justify-content-center"> --}}
    
      
    <section class="vh-100">

      {{-- jika dlm session terdapat pesan `success` dari proses registrasi yg berhasil --}}
      @if(session()->has('success'))
        {{-- ALERT/FLASHING MESSAGE from another form (Registration) --}}
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <i class="fas fa-check-circle me-3"></i>{{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      {{-- jika dlm session terdapat pesan `loginError` dari proses Auth yg GAGAL --}}
      @if(session()->has('loginError'))
        {{-- ALERT/FLASHING MESSAGE from Login Controller - Auth Failed --}}
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <i class="fas fa-check-circle me-3"></i>{{ session('loginError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-9 col-lg-6 col-xl-5">
            {{-- <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Sample image"> --}}
            <img src="img/login_page_01.png" class="img-fluid" alt="Sample image">
          </div>
          <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
            <form action="/login" method="post">
              
              @csrf

              <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                <p class="lead fw-normal mb-0 me-3">Sign in with</p>
                <button type="button" class="btn btn-primary btn-floating mx-1">
                  <i class="fab fa-facebook-f"></i>
                </button>
    
                <button type="button" class="btn btn-primary btn-floating mx-1">
                  <i class="fab fa-twitter"></i>
                </button>
    
                <button type="button" class="btn btn-primary btn-floating mx-1">
                  <i class="fab fa-linkedin-in"></i>
                </button>
              </div>
    
              <div class="divider d-flex align-items-center my-4">
                <hr class="hr half-width" />
                <p class="text-center fw-bold mx-3 mb-0">Or</p>
                <hr class="hr half-width" />
              </div>
    
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" name="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Enter a valid email address" value="{{ old('email') }}" autofocus required />
                <label class="form-label" for="email">Email address</label>
                @error('email')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              </div>
    
              <!-- Password input -->
              <div class="form-outline mb-3">
                <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Enter password" required />
                <label class="form-label" for="password">Password</label>
              </div>
    
              <div class="d-flex justify-content-between align-items-center">
                <!-- Checkbox -->
                <div class="form-check mb-0">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                  <label class="form-check-label" for="form2Example3">
                    Remember me
                  </label>
                </div>
                <a href="#!" class="text-body">Forgot password?</a>
              </div>
    
              <div class="text-center text-lg-start mt-4 pt-2">
                <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="/register" class="link-danger">Register Now</a></p>
              </div>
    
            </form>
          </div>
        </div>
      </div>
    </section>


    
  {{-- </div> --}}

  
@endsection