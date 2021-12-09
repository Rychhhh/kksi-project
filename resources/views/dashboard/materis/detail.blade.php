@extends('layouts.detail')

@section('title')
    {{ $materi->title }}
@endsection

@section('content')
<div class="container">
   <div class="row justify-content-center mb-5">
      <div class="col-md-8">
         <h1 class="text-center">{{ $materi->title }}</h1> 
         <hr class="mb-5">
        
         <article class="my-3 fs-5" id="editor">
            {!! $materi->content !!}
         </article>

         <a href="/materi" id="back" class="btn bg-gradient-secondary mt-5 col-4 float-start">Back</a>
         <a onclick="updateProgress({{ $materi->id }})" href="/materi" id="done" class="btn bg-gradient-success mt-5 col-4 float-end">Done</a>
        
      </div>
   </div>
</div>
@endsection

@section('c_js')
    @include('_partials.c_js.ajaxPromise')
    <script>
        async function updateProgress(materi_id) {
            try {
                var data = {
                    _token: "{{ csrf_token() }}",
                }
                const response = await HitData(`/progress/update/${materi_id}`, data, 'POST');
                console.log(response);
            } catch (error) {
                console.log(error);
            }
        }
        $(function() {
            // $("#done").click(function () {
            //     id = $(this).data("id")
            //     console.log($(this).data("id"))
            //     // $.ajax({
            //     //     type: "GET",
            //     //     url: `{{ url('/progress/update/${id}') }}`,
            //     //     data: null,
            //     //     success: (data) => {
            //     //         console.log("success")
            //     //     },
            //     //     error: (error) => {
            //     //         console.log(error.responseJSON)
            //     //     }
            //     // });
            // });
        });
    </script>
    <script src="{{ asset('assets/js/ckeditor.js') }}"></script>
    <script>
    ClassicEditor
          .create( document.querySelector( '#editor' ), {
             
             licenseKey: '',
          } )
          .then( editor => {
             window.editor = editor;
             const toolbarElement = editor.ui.view.toolbar.element;
            editor.isReadOnly = true;
            toolbarElement.style.display = 'none';
          } )
          .catch( error => {
             console.error( 'Oops, something went wrong!' );
             console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
             console.warn( 'Build id: rvq42d2sz8tk-jkf7y5n90bcu' );
             console.error( error ); 
          } );
    </script>
@endsection