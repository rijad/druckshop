<div class="card mb-4 mt-4">
  <div class="card-header">
    <h2>Create New FAQ</h2>

    <div class="card-body col-md-12">

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
      <form  class="form-group-inline" method="POST" action="{{ route('FAQ.store') }}" enctype="multipart/form-data">

        @csrf
        <div class="form-group">
          <label class="small mb-1" for="title_english">English Title</label>
          <input class="form-control" type="text" name="title_english" value="{{ old('title_english') }}" required>
          <span class="text-danger">{{ $errors->first('title_english') }}</span>
        </div>

        <div class="form-group">
          <label class="small mb-1" for="title_german">German Title</label>
          <input class="form-control" type="text" name="title_german" value="{{ old('title_german') }}" required>
          <span class="text-danger">{{ $errors->first('title_german') }}</span>
        </div>

        <div class="form-group">
          <label class="small mb-1" for="text_english">English Text</label>
          <textarea class="form-control summernote" rows="7" type="text" name="text_english" required>{{ old('text_english') }}</textarea>
          <span class="text-danger">{{ $errors->first('text_english') }}</span>
        </div>

        <div class="form-group">
          <label class="small mb-1" for="text_german">German Text</label>
          <textarea class="form-control summernote" rows="7" type="text" name="text_german" required>{{ old('text_german') }}</textarea>
          <span class="text-danger">{{ $errors->first('text_german') }}</span>
        </div>

        
        <div class="form-inline">
          <a href="{{ url('/admin/FAQ') }}" class="btn btn-secondary btn-user btn-block col-md-3">Back</a>
          <input type="submit" class="btn btn-primary btn-user btn-block col-md-3" value="Add">
        </div>
      </form>
    </div>
  </div>

</div>

<style type="text/css">
body .popover{display:none !important; }
</style>