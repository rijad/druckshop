<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Upload File</h2>

        <div class="card-body col-md-6">
 
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }} 
    </div>
    @endif  

        <form class="form-group-inline" method="post" action="{{route('defectfile-update')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="order_id" name="order_id" value={{ Request()->order_id }}>  
            <input type="hidden" id="oldfile" name="oldfile" value={{ Request()->old_file }}>
            <div class="form-group">
                <label class="small mb-1" for="image">Upload File</label>
                <input type="file" name="newfile" id="newfile" accept="application/pdf"/>
                <div>
                <span class="text-danger">{{ $errors->first('file') }}</span>
            </div>
            </div>
    
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-user btn-block col-md-3" value="Update">
            </div>
    
        </form>
    </div>
  </div>

</div> 