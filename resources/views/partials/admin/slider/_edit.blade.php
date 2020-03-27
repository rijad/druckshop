<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Edit Slider</h2>

        <div class="card-body col-md-8">

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
    <div>
        <form  class="form-group-inline" method="POST" action="{{ route('slider.update' , $slider->id) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
          <div>
            <label>English Title</label>
            <input type="text" name="title_english" value="{{ $slider->title_english }}">
            <span class="text-danger">{{ $errors->first('title_english') }}</span>
          </div>
          <div>
            <label>German Title</label>
            <input type="text" name="title_german" value="{{ $slider->title_german }}">
            <span class="text-danger">{{ $errors->first('title_german') }}</span>
          </div>
          <div>
            <label>Title Color</label>
            <input type="text" name="title_color" value="{{ $slider->title_color }}">
            <span class="text-danger">{{ $errors->first('title_color') }}</span>
          </div>
          <div>
            <label>Title Size</label>
            <input type="text" name="title_size" value="{{ $slider->title_size }}">
            <span class="text-danger">{{ $errors->first('title_size') }}</span>
          </div>
          <div>
            <label>Upload Image</label>
            <input type="file" name="image_path" value="{{ $slider->image_path }}">
            <span class="text-danger">{{ $errors->first('image_path') }}</span>
          </div>
          <div>
            <label>English Text</label>
            <textarea type="text" name="content_english" >{{ $slider->content_english }}</textarea>
            <span class="text-danger">{{ $errors->first('content_english') }}</span>
          </div>
          <div>
            <label>German Text</label>
            <textarea type="text" name="content_german" >{{ $slider->content_german }}</textarea>
            <span class="text-danger">{{ $errors->first('content_german') }}</span>
          </div>
          <div>
            <label>
            <input type="checkbox" name="is_active" <?php echo ($slider->is_active) ? 'checked' : ''; ?> checked > Active</label>
            <label>
            <input type="checkbox" name="is_slide" <?php echo ($slider->is_slide) ? 'checked' : ''; ?>> Is Slide</label>
          </div>
          <div class="form-group">
                <input type="submit" class="btn btn-primary btn-user btn-block col-md-3" value="Update">
            </div>
      </form>
    </div>

  </div>

</div>

</body>
</html>

