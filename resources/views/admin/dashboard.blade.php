@extends('layouts.admin.adminmain')

@section('breadcrumb')
<h6 class="h2 text-white d-inline-block mb-0">Course</h6>
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fas fa-home"></i></a></li>
        <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboards</a></li>
        {{-- <li class="breadcrumb-item active" aria-current="page">Course</li> --}}
        </ol>
    </nav>
@endsection


@php
    use App\Models\Materi;
    use App\Models\Course;
@endphp


@section('header')
     <!-- Card stats -->
     <div class="row">
        <div class="col-xl-4 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Total</h5>
                  <span class="h2 font-weight-bold mt-5"><span style="color: red"> {{ Auth::user()->where('role','admin')->count() }}</span>  Admin  </span>
                  <span class="h2 font-weight-bold mb-0"><span style="color: blue">{{ Auth::user()->where('role','siswa')->count() }}</span>  Siswa  </span>
                  <span class="h2 font-weight-bold mb-0"><span style="color: rgb(169, 169, 8)">{{ Auth::user()->where('role','guru')->count() }}</span>  Guru </span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                    <i class="ni ni-active-40"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Total Materi</h5>
                  
                  <span class="h2 font-weight-bold mb-0">{{ Materi::all()->count() }} Materi</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                    <i class="ni ni-money-coins"></i>
                  </div>
                </div>
              </div>
         
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Total Course</h5>
                  <span class="h2 font-bold mb-0">{{ Course::all()->count() }} Course</span>
                </div>
                <div class="col-auto">
                  <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                    <i class="ni ni-chart-bar-32"></i>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
@endsection
