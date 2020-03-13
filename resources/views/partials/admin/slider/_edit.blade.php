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
<form method="POST" action="{{ route('slider.update' , $slider->id) }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="form-group">
        <label class="small mb-1" for="inputEmailAddress">English_title</label>
        <input type="text" name="title_english" value="{{ $slider->title_english }}" />
    </div>
    <div class="form-group">
        <label class="small mb-1" for="inputEmailAddress">German_title</label>
        <input type="text" name="title_german" value="{{ $slider->title_german }}" />
    </div>
    <div class="form-group">
        <label class="small mb-1" for="inputEmailAddress">Title_color</label>
        <input type="text" name="title_color" value="{{ $slider->title_color }}" />
    </div>
    <div class="form-group">
        <label class="small mb-1" for="inputEmailAddress">Title_size</label>
        <input type="text" name="title_size" value="{{ $slider->title_size }}" />
    </div>
    <div class="form-group">
        <label class="small mb-1" for="inputEmailAddress">Image</label>
        <input type="file" name="image_path" value="{{ $slider->image_path }}" />
    </div>
    <div class="form-group">
        <label class="small mb-1" for="inputEmailAddress">English_text</label>
        <textarea type="text" name="content_english" >{{ $slider->content_english }}</textarea>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="inputEmailAddress">German_text</label>
        <textarea type="text" name="content_german" >{{ $slider->content_german }}</textarea>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="inputEmailAddress">Active</label>
        <input type="checkbox" name="is_active" checked />
    </div>
    <div class="form-group">
        <label class="small mb-1" for="inputEmailAddress">Is_slide</label>
        <input type="checkbox" name="is_slide" />
    </div>
    <div class="form-group">
        <input name="update" value="update" type="submit"/>
    </div>
    
</form>