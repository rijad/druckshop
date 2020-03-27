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
        <form  class="form-group-inline" method="POST" action="{{ route('FAQ.store') }}" enctype="multipart/form-data">
        
        @csrf
          <div>
            <label class="small mb-1" for="title_english">English Title</label>
            <input class="form-control" type="text" name="title_english" value="{{ old('title_english') }}">
            <span class="text-danger">{{ $errors->first('title_english') }}</span>
          </div>
          <div>
            <label class="small mb-1" for="title_german">German Title</label>
            <input class="form-control" type="text" name="title_german" value="{{ old('title_german') }}">
            <span class="text-danger">{{ $errors->first('title_german') }}</span>
          </div>
          <div>
            <label class="small mb-1" for="text_english">English Text</label>
            <textarea type="text" name="text_english" >{{ old('text_english') }}</textarea>
            <span class="text-danger">{{ $errors->first('text_english') }}</span></div>
          <div>
            <label class="small mb-1" for="text_german">German Text</label>
            <textarea type="text" name="text_german" >{{ old('text_german') }}</textarea>
            <span class="text-danger">{{ $errors->first('text_german') }}</span>
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary btn-user btn-block col-md-3" value="Add">
          </div>
      </form>
    </div>
  </div>

</div>