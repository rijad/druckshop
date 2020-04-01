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
            <label class="small mb-1" for="title_english">English Title</label>
            <input class="form-control" type="text" name="title_english" value="{{ $slider->title_english }}">
            <span class="text-danger">{{ $errors->first('title_english') }}</span>
          </div>
          <div>
            <label class="small mb-1" for="title_german">German Title</label>
            <input class="form-control" type="text" name="title_german" value="{{ $slider->title_german }}">
            <span class="text-danger">{{ $errors->first('title_german') }}</span>
          </div>
          <div>
            <label class="small mb-1" for="title_color">Title Color</label>
            <input class="form-control" type="text" name="title_color" value="{{ $slider->title_color }}">
            <span class="text-danger">{{ $errors->first('title_color') }}</span>
          </div>
          <div>
            <label class="small mb-1" for="title_size">Title Size</label>
            <input class="form-control" type="text" name="title_size" value="{{ $slider->title_size }}">
            <span class="text-danger">{{ $errors->first('title_size') }}</span>
          </div>
          <div>
            <label class="small mb-1" for="image_path">Upload Image</label>
            <input type="file" name="image_path" value="{{ $slider->image_path }}">
            <span class="text-danger">{{ $errors->first('image_path') }}</span>
          </div>
          <div>
            <label class="small mb-1" for="content_english">English Text</label>
            <textarea class="form-control" rows="7" type="text" name="content_english" >{{ $slider->content_english }}</textarea>
            <span class="text-danger">{{ $errors->first('content_english') }}</span>
          </div>
          <div>
            <label class="small mb-1" for="content_german">German Text</label>
            <textarea class="form-control" rows="7" type="text" name="content_german" >{{ $slider->content_german }}</textarea>
            <span class="text-danger">{{ $errors->first('content_german') }}</span>
          </div>
          <div>
            <label class="small mb-1" for="is_active">
            <input type="checkbox" name="is_active" <?php echo ($slider->is_active) ? 'checked' : ''; ?> checked > Active</label>
            <label class="small mb-1" for="is_slide">
            <input type="checkbox" name="is_slide" <?php echo ($slider->is_slide) ? 'checked' : ''; ?>> Is Slide</label>
          </div>
          <div class="form-group">
                <input type="submit" class="btn btn-primary btn-user btn-block col-md-3" value="Update">
            </div>
      </form>
    </div>

  </div>

</div>

