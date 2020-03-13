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
<form method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>English title</label>
        <input type="text" name="title_english" value="{{ old('title_english') }}" />
    </div>
    <div class="form-group">
        <label>German title</label>
        <input type="text" name="title_german" value="{{ old('title_german') }}" />
    </div>
    <div class="form-group">
        <label>Title color</label>
        <input type="text" name="title_color" value="{{ old('title_color') }}" />
    </div>
    <div class="form-group">
        <label>Title size</label>
        <input type="text" name="title_size" value="{{ old('title_size') }}" />
    </div>
    <div class="form-group">
        <label>Image</label>
        <input type="file" name="image_path" value="{{ old('image_path') }}" />
    </div>
    <div class="form-group">
        <label>English text</label>
        <textarea type="text" name="content_english" >{{ old('content_english') }}</textarea>
    </div>
    <div class="form-group">
        <label>German text</label>
        <textarea type="text" name="content_german" >{{ old('content_german') }}</textarea>
    </div>
    <div class="form-group">
        <label>Active</label>
        <input type="checkbox" name="is_active" value="{{ old('is_active') }}" checked />
    </div>
    <div class="form-group">
        <label>Is_slide</label>
        <input type="checkbox" name="is_slide" value="{{ old('is_slide') }}" />
    </div>
    <div class="form-group">
        <input name="create" type="submit"/>
    </div>
    
</form>