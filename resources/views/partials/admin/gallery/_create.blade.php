@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('gallery.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Image</label>
        <input type="file" name="image"/>
    </div>
    <div class="form-group">
        <label>Active</label>
        <input type="checkbox" name="status"/>
    </div>
    <div>
        <button type="submit" value="create" name="create">Create</button>
    </div>
    
</form>