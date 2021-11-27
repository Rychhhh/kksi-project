@extends('layouts.auth.main')

@section('title')
    Login
@endsection

@section('content')

    <!-- Main content -->
    <div class="main-content">
      <!-- Header -->
      <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
        <div class="container">
          <div class="header-body text-center mb-7">
            <div class="row justify-content-center">
              <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                <h1 class="text-white">Hii People!</h1>
                <p class="text-lead text-white">Welcome my website .</p>
              
              </div>
            </div>
          </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
          <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div>
      </div>
      
  
  
       <!-- Page content -->
      <div class="container mt--8 pb-5">
        <div class="row justify-content-center">
          <div class="col-lg-5 col-md-7">
            <div class="card bg-secondary border-0 mb-0">
              <div class="card-header bg-transparent pb-5">
                <div class="text-muted text-center mt-2 mb-3"><small>Log in dengan</small></div>
                <div class="btn-wrapper text-center">
                  <a href="#" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--icon"><img src="{{ asset('assets/img/icons/common/github.svg') }}"></span>
                    <span class="btn-inner--text">Github</span>
                  </a>
                  <a href="#" class="btn btn-neutral btn-icon">
                    <span class="btn-inner--icon"><img src="{{ asset('assets/img/icons/common/google.svg') }}"></span>
                    <span class="btn-inner--text">Google</span>
                  </a>
                </div>
              </div>
              <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                  <small>Atau log in dengan </small>
                </div>
                <form role="form" action="/login" method="POST">
                  @csrf
  
                  @if (session('loginGagal'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      {{ session ('loginGagal') }}
                  </div>
                 @endif
                  <div class="form-group mb-3">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                      </div>
                      <input class="form-control" placeholder="Email" name="email" type="email">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group input-group-merge input-group-alternative">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                      </div>
                      <input class="form-control" placeholder="Password" name="password" type="password">
                    </div>
                  </div>
                  <div class="custom-control custom-control-alternative custom-checkbox">
                    <a href="{{ url('/register') }}" class="text-dark"><small>Buat akun baru ?</small></a>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-primary my-4">Login</button>
                  </div>
                </form>
              </div>
            </div>
              <
          </div>
        </div>
      </div>
    </div>
  

@endsection