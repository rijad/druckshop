<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Create New Backcover</h2>

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
        <form class="form-group-inline" method="POST" action="{{ route('backcover.store') }}" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label class="small mb-1" for="back_cover">Name</label>
                <input class="form-control" type="text" name="back_cover" value="{{ old('back_cover') }}">
                <span class="text-danger">{{ $errors->first('back_cover') }}</span>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="name_english">Name in English</label>
                <input class="form-control" type="text" name="name_english" value="{{ old('name_english') }}">
                <span class="text-danger">{{ $errors->first('name_english') }}</span>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="name_german">Name in German</label>
                <input class="form-control" type="text" name="name_german" value="{{ old('name_german') }}">
                <span class="text-danger">{{ $errors->first('name_german') }}</span>
            </div>
            <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="status" checked>
                        <label class="custom-control-label" for="customCheck">Active</label>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-user btn-block col-md-3" value="Add">
                </div>
      </form>
    </div>
  </div>

</div>

</body>
</html>