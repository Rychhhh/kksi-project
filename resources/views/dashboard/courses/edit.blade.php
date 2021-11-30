<div class="p2">
    <div class="form-group">
        <input type="text" name="title" id="title" value="{{ $data->title }}" class="form-control"
            placeholder="Title Course">
    </div>
    <div class="form-group mt-2">
        <button class="btn btn-warning" onClick="update({{ $data->id }})">Update</button>
    </div>
</div>