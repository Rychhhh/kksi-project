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
      <button type="button" class="btn btn-primary btn-sm" onClick="create()">
         Create course
      </button>
   </div>
</div>

@foreach ($data as $item)
<div class="row mt-2">
 <div class="col-12">
     <div class="card">
         <div class="card-body d-flex justify-content-between">
             <h5 type="button" style="text-transform: capitalize">
                   {{ $item->title }}
                </h5>
                <div class="action">
                    <button class="btn btn-success" onClick="show({{ $item->id }})">Edit</button>
                    <button class="btn btn-danger" onClick="destroy({{ $item->id }})">Delete</button>
                </div>
            </div>
     </div>
 </div>
</div>
@endforeach

     <!-- General Modal -->
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="background-color:black"></button>
                </div>
                <div class="modal-body">
                    <div id="page" class="p-2"></div>
                </div>
            </div>
        </div>
    </div>


   </div>
@endsection

@section('c_js')
<script>

        // Untuk modal halaman create
        function create() {
                $.get("{{ url('course/create') }}", {}, function(data, status) {
                    $("#exampleModalLabel").html('Create Courses')
                    $("#page").html(data);
                    $("#exampleModal").modal('show');

                });
            }

        // untuk proses create data
        function store() {
            var title = $("#title").val();
            $.ajax({
                type: "get",
                url: "{{ url('course/store') }}",
                data: "title=" + title,
                success: function(data) {
                    $(".btn-close").click();
                    $.get("{{ url('course/store') }}");
                }
            });
        }

        // edit function
        function show(id) {
            $.get("{{ url('course/show') }}/" + id, {}, function (data, status) {
                $('#exampleModalLabel').html('Edit Courses');
                $('#page').html(data);
                $('#exampleModal').modal('show');
            });
        }

        // untuk proses edit data
        function update(id) {
            var title = $("#title").val();
            $.ajax({
                type: "get",
                url: "{{ url('course/update') }}/" + id,
                data: "title=" + title,
                success: function(data) {
                    $(".btn-close").click();
                    $.get("{{ url('course/update') }}/" + id);
                }
            });
        }

        // untuk menghapus data 
        function destroy(id) {
            var title = $('#title').val();
            confirm("Apa anda yakin untuk hapus data ? ");
            $.ajax({
                type: "get",
                url: "{{ url('course/destroy') }}/" + id,
                data: "title=" + title,
                success: function(data) {
                    $.get("{{ url('course/destroy') }}/" + id);
                }
            });
        }
</script>
@endsection