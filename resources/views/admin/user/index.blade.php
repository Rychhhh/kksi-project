@extends('layouts.admin.adminmain')

@section('breadcrumb')
<h6 class="h2 text-white d-inline-block mb-0">Course</h6>
<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboards</a></li>
    <li class="breadcrumb-item active" aria-current="page">Users</li>
    </ol>
</nav>
@endsection


@section('header')
    <div class="mr-5">
        <a href="{{ url('siswa') }}" class="btn btn-warning">
            Data User Siswa
        </a>
        <a href="{{ url('guru') }}" class="btn btn-danger">
            Data User Guru
        </a>
        <a href="{{ url('admin') }}" class="btn btn-info">
            Data User Admin
        </a>
    </div>
@endsection