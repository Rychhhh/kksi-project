@extends('layouts.main')
@section('title', 'Materi')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm text-dark" aria-current="page"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a href="/materi">Materi</a></li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Materi</h6>
    </nav>
@endsection
@section('content')
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <div class="container-fluid">
         @foreach ($courses as $course)
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" data-bs-toggle="collapse"
                                data-bs-target="#{{ Str::slug($course->title) }}" aria-expanded="false"
                                aria-controls="{{ Str::slug($course->title) }}"
                                class="list-group-item list-group-item-action">
                                {{ $course->title }}
                            </button>
                            <a href="/detail/{{ $course->id }}/materi/create" class="btn btn-primary mt-2">Tambah materi</a>
                            <div class="collapse" id="{{ Str::slug($course->title) }}">
                                <div class="container-fluid">
                                    @foreach ($course->materis as $materi)
                                    
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <div class="card card-body">
                                                    <a href="/detail/{{ $course->id }}/materi/{{ $materi->id }}" class="list-group-item list-group-item-action">
                                                        {{ $materi->title }}
                                                    </a>
                                                    @if (Auth::user()->role == 'admin' || 'guru')
                                                    <form action="/detail/{{ $course->id }}/materi/{{ $materi->id }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type='submit' class="btn btn-danger" onclick="return confirm('R u sure to delete this Materi ?')">Delete</button>
                                                    </form>

                                                    <a href="/detail/{{ $course->id }}/materi/{{ $materi->id }}/edit" class="btn btn-warning d-inline">
                                                        Edit Materi
                                                    </a>

                                                    @else
                                                        <a href="/detail/{{ $course->id }}/materi/{{ $materi->id }}" class="list-group-item list-group-item-action">
                                                        {{ $materi->title }}
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
