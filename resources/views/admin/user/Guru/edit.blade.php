@extends('layouts.admin.adminmain');

@section('breadcrumb')
<h6 class="h2 text-white d-inline-block mb-0">Edit</h6>
<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
    <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}"><i class="fas fa-home"></i></a></li>
    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboards</a></li>
    <li class="breadcrumb-item"><a href="{{ url('coba') }}">Users</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit Guru</li>
    </ol>
</nav>
@endsection


@section('header')
<div class="col-xl-8 order-xl-1">
    <div class="card">
      <div class="card-header">
        <div class="row align-items-center">
          <div class="col-8">
            <h3 class="mb-0">Edit profile </h3>
          </div>
          <div class="col-4 text-right">
            <a href="{{ URL::previous() }}" class="btn btn-sm btn-primary">Back</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <form action="{{ url('guru/'.$updateGuru->id) }}" method="POST">
          @csrf

          @method('PUT')
          
          <h6 class="heading-small text-muted mb-4">User information</h6>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-username">Name</label>
                  <input type="text" name="name" class="form-control" value="{{ $updateGuru->name }}"> 
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-email">Role</label>
                  <input type="text" name="role" class="form-control" value="{{ $updateGuru->role }}">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label" for="input-first-name">Email</label>
                  <input type="text" name="email" class="form-control" value="{{ $updateGuru->email }}">
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-success">Edit</button>
          </div>
        </form>
@endsection