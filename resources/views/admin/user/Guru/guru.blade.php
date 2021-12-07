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
<div class="row">
    <div class="col">
      <div class="card bg-default shadow">
        <div class="card-header bg-transparent border-0">
          <h3 class="text-white mb-0">Admin Table</h3>

          @if (session('success'))
            <div class="alert alert-info" role="alert">
              {{ session('success') }}
            </div>
          @endif

        </div>
        <div class="table-responsive">
          <table class="table align-items-center table-dark table-flush">
            <thead class="thead-dark">
              <tr>
                <th scope="col" class="sort" data-sort="name">Name</th>
                <th scope="col" class="sort" data-sort="budget">Role</th>
                <th scope="col" class="sort" data-sort="status">Email</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody class="list">
                @foreach ($gurus as $guru)
                    
                <tr>
                    <th scope="row">
                        <div class="media align-items-center">
                            <a href="#" class="avatar rounded-circle mr-3">
                                <img alt="Image placeholder" src="{{ asset('assets/img/theme/bootstrap.jpg') }}">
                            </a>
                    <div class="media-body">
                      <span class="name mb-0 text-sm">{{ $guru->name }}</span>
                    </div>
                </div>
            </th>
            <td class="budget">
                {{ $guru->role }}
            </td>
            <td>
                  <span class="badge badge-dot mr-4">
                      <i class="bg-warning"></i>
                      <span class="status">{{ $guru->email }}</span>
                    </span>
                </td>
                <td class="d-flex flex-row" style="cursor: pointer">
                    <a href="{{ url('guru/'. $guru->id.'/edit') }}">
                      <button class="btn btn-success mr-4">
                        Edit
                      </button>
                      </a>
                      <form action="{{ url('guru/'.$guru->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" onsubmit="return confirm('Anda yakin ingin menghapus ? ')"> Delete </button>
                      </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
    </div>
  </div>
@endsection