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
                <button type="button" class="btn btn-primary btn-sm" onclick="create()">
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
                                <button class="btn btn-success" onclick="show({{ $item->id }})">Edit</button>
                                <button class="btn btn-danger" onclick="destroy({{ $item->id }})">Delete</button>
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
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            style="background-color:black"></button>
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
        // function untuk ajax
        function HitData(url, data, type) {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: url,
                    data: data,
                    type: type,
                    success: (response) => {
                        resolve(response)
                    },
                    error: (error) => {
                        reject(error)
                    }
                })
            })
        }

        // function meng-handle error form
        function inputInvalid(responseError) {
            for (var i in responseError) {
                $(`#${i}`).addClass("is-invalid");
                for (var j in responseError[i]) {
                    $(`#${i}`).parent().find('.invalid-feedback').html(`${responseError[i][j]}`)
                }
            }
        }

        // Untuk modal halaman create
        async function create() {
            try {
                const response = await HitData("{{ url('course/create') }}", null, 'GET')
                $("#exampleModal").modal('show');
                $("#exampleModalLabel").html('Create Courses')
                $("#page").html(response);
            } catch (error) {
                console.log(error)
            }
        }
        
        // untuk proses create data
        async function store() {
            try {
                var data = `title=${$('#title').val()}`
                const response = await HitData("{{ url('course/store') }}", data, 'GET')
                window.location.reload()
            } catch (error) {
                var responseError = error.responseJSON.errors
                inputInvalid(responseError)
                console.log(error);
            }
        }

        // edit function
        async function show(id) {
            try {
                const response = await HitData(`{{ url('/course/show/${id}') }}`, null, 'GET')
                $('#exampleModalLabel').html('Edit Courses');
                $('#exampleModal').modal('show');
                $('#page').html(response);
            } catch (error) {
                console.log(error);
            }
        }

        // untuk proses edit data
        async function update(id) {
            try {
                var data = `title=${$('#title').val()}`
                const response = await HitData(`{{ url('/course/update/${id}') }}`, data, 'GET')
                window.location.reload()
            } catch (error) {
                var responseError = error.responseJSON.errors
                inputInvalid(responseError)
                console.log(error);
            }
        }

        // untuk menghapus data 
        async function destroy(id) {
            try {
                if (!confirm('Apa anda yakin untuk hapus data ?')) {
                    return false;
                };
                var data = `title=${$('#title').val()}`
                const response = await HitData(`{{ url('/course/destroy/${id}') }}`, data, 'GET')
                window.location.reload()
            } catch (error) {
                console.log(error)
            }
        }
    </script>
@endsection
