<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Edit Back Cover</h2>

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
    <form  class="form-group-inline" method="POST" action="{{ route('backcover.update' , $backcover->id) }}" enctype="multipart/form-data" 
            target="_blank">
        @method('PUT')
        @csrf
            <div class="form-group">
                <label class="small mb-1" for="back_cover">Name</label>
                <input class="form-control" type="text" name="back_cover" value="{{ $backcover->back_cover }}">
                <span class="text-danger">{{ $errors->first('back_cover') }}</span>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="name_english">Name in English</label>
                <input class="form-control" type="text" name="name_english" value="{{ $backcover->name_english }}">
                <span class="text-danger">{{ $errors->first('name_english') }}</span>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="name_german">Name in German</label>
                <input class="form-control" type="text" name="name_german" value="{{ $backcover->name_german }}">
                <span class="text-danger">{{ $errors->first('name_german') }}</span>
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox small">
                    <input class="custom-control-input" type="checkbox" id="status" name="status" checked>
                    <label class="custom-control-label" for="status">Active</label>
                </div>
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