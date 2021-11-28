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
                            <div class="collapse" id="{{ Str::slug($course->title) }}">
                                <div class="container-fluid">
                                    @foreach ($course->materis as $materi)
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <div class="card card-body">
                                                    <a href="#" class="list-group-item list-group-item-action">
                                                        {{ $materi->title }}
                                                    </a>
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
