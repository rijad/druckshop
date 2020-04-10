<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Edit Defect File</h2>

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
        <form class="form-group-inline" method="GET" action="#" enctype="multipart/form-data">
            <!-- {{ route('defectfile.update' , [ $defect->order_id, $defect->user_id ]) }} -->
            @csrf
            <input type="hidden" id="order_id" name="order_id" />
            <input type="hidden" id="user_id" name="user_id" />
            <input type="hidden" id="oldfile" name="oldfile" />
            <div class="form-group">
                <label class="small mb-1" for="image">Image</label>
                <input type="file" name="image"/>
                <span class="text-danger">{{ $errors->first('image') }}</span>
            </div>
    
            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-user btn-block col-md-3" value="Update">
            </div>
    
        </form>
    </div>
  </div>

</div>