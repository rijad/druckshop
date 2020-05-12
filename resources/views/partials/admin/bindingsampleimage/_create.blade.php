<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Create Binding Sample Image</h2>

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
    <form  class="form-group-inline" method="POST" action="{{ route('bindingsample.store') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="small mb-1" for="product_id">Product</label>
        <select name="product_id">
            <option>Select</option>
            @foreach($product as $pro)
            <option value="{{ $pro->id }}">{{ $pro->title_english }}</option>
            @endforeach
        </select>
        <span class="text-danger">{{ $errors->first('product_id') }}</span>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="pageformat_id">Page Format</label>
        <select name="pageformat_id">
            <option>Select</option>
            @foreach($pageformat as $format)
            <option value="{{ $format->id }}">{{ $format->page_format }}</option>
            @endforeach
        </select>
        <span class="text-danger">{{ $errors->first('pageformat_id') }}</span>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="covercolor_id">Cover color</label>
        <select name="covercolor_id">
            <option>Select</option>
            @foreach($covercolor as $color)
            <option value="{{ $color->id }}">{{ $color->color }}</option>
            @endforeach
        </select>
        <span class="text-danger">{{ $errors->first('covercolor_id') }}</span>
    </div>
    <div class="form-group">
        <label class="small mb-1" for="image">Image</label>
        <input type="file" name="image"/>
        <span class="text-danger">{{ $errors->first('image') }}</span>
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox small">
            <input type="checkbox" class="custom-control-input" id="customCheck" name="status" checked>
            <label class="custom-control-label" for="customCheck">Active</label>
        </div>
    </div>
    <div class="form-inline">
        <a href="{{ url('/admin/bindingsample') }}" class="btn btn-secondary btn-user btn-block col-md-3">Back</a>
        <input type="submit" class="btn btn-primary btn-user btn-block col-md-3" value="Add">
    </div>
    
</form>