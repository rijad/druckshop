<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Edit FAQ</h2>

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
        <form  class="form-group-inline" method="POST" action="{{ route('FAQ.update' , $faq->id) }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
          <div class="form-group">
            <label class="small mb-1" for="title_english">English Title</label>
            <input class="form-control" type="text" name="title_english" value="{{ $faq->title_english }}">
            <span class="text-danger">{{ $errors->first('title_english') }}</span>
          </div>

          <div class="form-group">
            <label class="small mb-1" for="title_german">German Title</label>
            <input class="form-control" type="text" name="title_german" value="{{ $faq->title_german }}">
            <span class="text-danger">{{ $errors->first('title_german') }}</span>
          </div>

          <div class="form-group">
            <label class="small mb-1" for="text_english">English Text</label>
            <textarea class="form-control" rows="7" type="text" name="text_english" >{{ $faq->text_english }}</textarea>
            <span class="text-danger">{{ $errors->first('text_english') }}</span>
          </div>
          
          <div class="form-group">
            <label class="small mb-1" for="text_german">German Text</label>
            <textarea class="form-control" rows="7" type="text" name="text_german" >{{ $faq->text_german }}</textarea>
            <span class="text-danger">{{ $errors->first('text_german') }}</span>
          </div>

          <div class="form-group">
                <input type="submit" class="btn btn-primary btn-user btn-block col-md-3" value="Update">
            </div>
      </form>
    </div>
  </div>

</div>