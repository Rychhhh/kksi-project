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
                                class="list-group-item list-group-item-action" style="border:none; border-radius:50px">
                                {{ $course->title }}
                            </button>
                            
                        @auth
                            @if (Auth::user()->role != 'siswa')
                                <a href="/detail/{{ $course->id }}/materi/create" class="btn btn-primary mt-2">Tambah materi</a>
                            @endif
                        @endauth
                            <div class="collapse" id="{{ Str::slug($course->title) }}">
                                <div class="container-fluid">
                                    @foreach ($course->materis as $materi)
                                        <div class="row mt-2">
                                            <div class="col-12">
                                                <div class="card card-body">
                                                    <a href="/detail/{{ $course->id }}/materi/{{ $materi->id }}" class="accordion-button list-group-item list-group-item-action" id="materi" onclick="CreateProgress({{ $course->id }}, {{ $materi->id }})">
                                                        {{ $materi->title }}
                                                    </a>
                                                @auth
                                                    @if (Auth::user()->role != 'siswa')
                                                    <form action="/detail/{{ $course->id }}/materi/{{ $materi->id }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type='submit' class="btn btn-danger mt-4 float-end" onclick="return confirm('R u sure to delete this Materi ?')">Delete</button>
                                                    </form>
                                                    
                                                    <a href="/detail/{{ $course->id }}/materi/{{ $materi->id }}/edit" class="btn btn-warning d-inline">
                                                        Edit Materi
                                                    </a>
                                                    
                                                    @endif
                                                @endauth
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

@section('c_js')
@include('_partials.c_js.ajaxPromise')
    <script>
        async function CreateProgress(course_id, materi_id){
            try {
                var data = {
                    _token: "{{ csrf_token() }}",
                    course_id,
                    materi_id
                }
                const response = await HitData('/progress/store', data, 'POST')
                console.log(response);
                window.location.href = `/detail/${data.course_id}/materi/${data.materi_id}`;
            } catch (error) {
                if(error.responseJSON.message == "The given data was invalid."){
                    window.location.href = `/detail/${data.course_id}/materi/${data.materi_id}`;
                }z
                console.log('error', error)
            }
        }
    </script>
@endsection
