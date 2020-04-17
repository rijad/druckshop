<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Upload Refinement Style Sheet</h2>

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
        <form class="form-group-inline" method="post" action="{{route('stylesheet.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="small mb-1" for="image">Upload File</label>
                <input type="file" name="newfile" id="newfile" accept="application/pdf"/>
                <div>
                <span class="text-danger">{{ $errors->first('newfile') }}</span>
            </div>
            </div>
    
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-user btn-block col-md-3" value="Upload">
            </div>
    
        </form>
    </div>
  </div>

</div> 