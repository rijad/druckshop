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
      <form  class="form-group-inline" method="POST" action="{{ route('slider.update' , $slider->id) }}" 
        enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
          <label class="small mb-1" for="title_english">English Title</label>
          <input class="form-control" type="text" name="title_english" value="{{ $slider->title_english }}" required>
          <span class="text-danger">{{ $errors->first('title_english') }}</span>
        </div>
        <div class="form-group">
          <label class="small mb-1" for="title_german">German Title</label>
          <input class="form-control" type="text" name="title_german" value="{{ $slider->title_german }}" required>
          <span class="text-danger">{{ $errors->first('title_german') }}</span>
        </div>
        <div class="form-group">
          <label class="small mb-1" for="title_color">Title Color</label>
          <input class="form-control" type="color" name="title_color" value="{{ $slider->title_color }}" required>
          <span class="text-danger">{{ $errors->first('title_color') }}</span>
        </div>
        <div class="form-group">
          <label class="small mb-1" for="title_size">Title Size</label>
          <input class="form-control" type="number" name="title_size" value="{{ $slider->title_size }}" required>
          <span class="text-danger">{{ $errors->first('title_size') }}</span>
        </div>
        <div class="form-group">
          <label class="small mb-1" for="image_path">Upload Image</label>
          <input type="file" name="image_path" value="{{ $slider->image_path }}" >
          <img src="{{ url('/').'/'.@$slider->image_path }}" height="100px; weight:200px;">
          <span class="text-danger">{{ $errors->first('image_path') }}</span>
        </div>
        <div class="form-group">
          <label class="small mb-1" for="content_english">English Text</label>
          <textarea class="form-control" rows="7" type="text" name="content_english" required>{{ $slider->content_english }}</textarea>
          <span class="text-danger">{{ $errors->first('content_english') }}</span>
        </div>
        <div class="form-group">
          <label class="small mb-1" for="content_german">German Text</label>
          <textarea class="form-control" rows="7" type="text" name="content_german" required>{{ $slider->content_german }}</textarea>
          <span class="text-danger">{{ $errors->first('content_german') }}</span>
        </div>

        <div class="form-group">
         <label class="small mb-1" for="name">Select For Redirect On Latest Artical</label>
         <select name="redirect_url" class="select2 form-control" required>

          @if(!empty($latest))
          @foreach($latest as $key => $item)
          <option value="{{ $item['id'] }}" @if(@$slider->redirect_url == @$item['id']) {{ 'selected' }} @endif>{{ $item['title_english'] }}</option>
          @endforeach
          @endif

        </select>
      </div>

      <div class="form-group">
        <label class="small mb-1" for="is_active">
          <input type="checkbox" name="is_active" <?php echo ($slider->is_active) ? 'checked' : ''; ?> > Active</label>
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

