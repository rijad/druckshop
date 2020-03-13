<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html>
<head>
    <META http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

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

<div>
  <div>
    <div>
        <form  method="POST" action="{{ route('slider.update' , $slider->id) }}" enctype="multipart/form-data" 
            target="_blank">
        @method('PUT')
        @csrf
          <div>
            <label>English Title</label>
            <input type="text" name="title_english" value="{{ $slider->title_english }}">
          </div>
          <div>
            <label>German Title</label>
            <input type="text" name="title_german" value="{{ $slider->title_german }}">
          </div>
          <div>
            <label>Title Color</label>
            <input type="text" name="title_color" value="{{ $slider->title_color }}">
          </div>
          <div>
            <label>Title Size</label>
            <input type="text" name="title_size" value="{{ $slider->title_size }}">
          </div>
          <div>
            <label>Upload Image</label>
            <input type="file" name="image_path" value="{{ $slider->image_path }}">
          </div>
          <div>
            <label>English Text</label>
            <textarea type="text" name="content_english" >{{ $slider->content_english }}</textarea>
          </div>
          <div>
            <label>German Text</label>
            <textarea type="text" name="content_german" >{{ $slider->content_german }}</textarea>
          </div>
          <div>
            <label>
            <input type="checkbox" name="is_active" value="{{ $slider->is_active }}" checked > Active</label>
            <label>
            <input type="checkbox" name="is_slide" value="{{ $slider->is_slide }}"> Is Slide</label>
          </div>
          <div>
              <button type="submit">Update</button>
          </div>
      </form>
    </div>
  </div>

</div>

</body>
</html>