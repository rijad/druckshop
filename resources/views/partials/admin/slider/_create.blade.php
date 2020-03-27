<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Create New FAQ</h2>

        <div class="card-body col-md-6">

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                @endforeach
            </ul>
        @endif
        <form  class="form-group-inline" method="POST" action="{{ route('slider.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>English title</label>
        <input type="text" name="title_english" value="{{ old('title_english') }}" />
        <span class="text-danger">{{ $errors->first('title_english') }}</span>
    </div>
    <div class="form-group">
        <label>German title</label>
        <input type="text" name="title_german" value="{{ old('title_german') }}" />
        <span class="text-danger">{{ $errors->first('title_german') }}</span>
    </div>
    <div class="form-group">
        <label>Title color</label>
        <input type="text" name="title_color" value="{{ old('title_color') }}" />
        <span class="text-danger">{{ $errors->first('title_color') }}</span>
    </div>
    <div class="form-group">
        <label>Title size</label>
        <input type="text" name="title_size" value="{{ old('title_size') }}" />
        <span class="text-danger">{{ $errors->first('title_size') }}</span>
    </div>
    <div class="form-group">
        <label>Image</label>
        <input type="file" name="image_path"/>
        <span class="text-danger">{{ $errors->first('image_path') }}</span>
    </div>

    <div class="form-group">  
        <label>English_text</label>
        <textarea type="text" name="content_english" >{{ old('content_english') }}</textarea>
        <span class="text-danger">{{ $errors->first('content_english') }}</span>
    </div>
    <div class="form-group">
        <label>German text</label>
        <textarea type="text" name="content_german" >{{ old('content_german') }}</textarea>
        <span class="text-danger">{{ $errors->first('content_german') }}</span>
    </div>
    <div class="form-group">
        <label>Redirect_url</label>
        <textarea type="text" name="redirect_url" >{{ old('content_german') }}</textarea>
        <span class="text-danger">{{ $errors->first('content_german') }}</span>
    </div>
    <div class="form-group">
        <label>Active</label>
        <input type="checkbox" name="is_active"  checked />
    </div>
    <div class="form-group">
        <label>Is_slide</label>
        <input type="checkbox" name="is_slide"  />
    </div>
    <div class="form-group">
            <input type="submit" class="btn btn-primary btn-user btn-block col-md-3" value="Add">
          </div>
    
</form>