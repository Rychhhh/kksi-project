@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <title>{{ $title }}</title>
        <div class="pull-left">
            <h2>Update Materi</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('materi') }}"> Back</a>
        </div>
    </div>
</div>
<br>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong>Muka kamu jelek<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
     
<form action="/detail/{{ $course->id }}/materi/{{ $materi->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title..." value="{{ old('title', $materi->title) }}">
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mb-3">

                <label for="content" class="form-label">Content</label>
                <textarea class="editor" name="content" id="content" rows="10">{{ old('content', $materi->content) }}</textarea>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    <script src="{{ asset('assets/js/ckeditor.js') }}"></script>
		<script>ClassicEditor
				.create( document.querySelector( '.editor' ), {
					
					licenseKey: '',
					
					
					
				} )
				.then( editor => {
					window.editor = editor;
			
					
					
					
				} )
				.catch( error => {
					console.error( 'Oops, something went wrong!' );
					console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
					console.warn( 'Build id: rvq42d2sz8tk-jkf7y5n90bcu' );
					console.error( error ); 
				} );
		</script>
     
</form>
@endsection