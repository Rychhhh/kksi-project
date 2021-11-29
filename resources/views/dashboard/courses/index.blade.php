@extends('layouts.main')
@section('title', 'Course')
@section('breadcrumb')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm text-dark" aria-current="page"><a href="/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page"><a href="/course">Course</a></li>
        </ol>
        <h6 class="font-weight-bolder mb-0">Course</h6>
    </nav>
@endsection
@section('content')
    <div class="container-fluid">
       <div class="row mt-2 float-right">
          <div class="col">
         <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Create course
         </button>
      </div>
   </div>
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
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
      
      
      <!-- Modal -->
      
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <form action="/courses" method="post">
                     @csrf
                     <div class="mb-3">
                       <label for="title" class="col-form-label">Title:</label>
                       <input type="text" class="form-control" id="title" name="title">
                     </div>
                     <button type="submit" class="btn btn-primary">Save changes</button>
                   </form>
            </div>
         </div>
         </div>
       </div>
   </div>
@endsection