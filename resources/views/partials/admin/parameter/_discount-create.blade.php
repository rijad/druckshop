<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Create New Discount</h2>

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
            <form class="form-group-inline" method="POST" action="{{ route('discount.store') }}" 
                    enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="small mb-1" for="code">Name</label>
                    <input class="form-control" type="text" name="code" value="{{ old('code') }}">
                    <span class="text-danger">{{ $errors->first('code') }}</span>
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
                    <label class="small mb-1" for="from_date">From Date</label>
                    <input type="date" id="from_date" name="from_date" value="{{ old('from_date') }}">
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="to_date">To Date</label>
                    <input type="date" id="to_date" name="to_date" value="{{ old('to_date') }}">
                </div>
                <div class="form-group">
                    <input type="radio" id="by_price" name="by_discount" value="by_price">
                    <label class="small mb-1" for="by_price">By_Price</label><br>
                    <input type="radio" id="by_percent" name="by_discount" value="by_percent">
                    <label class="small mb-1" for="by_percent">By_Percent</label><br>
                    
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="discount">Discount</label>
                    <input class="form-control" type="text" name="discount" value="{{ old('discount') }}">
                    <span class="text-danger">{{ $errors->first('discount') }}</span>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                    <input type="checkbox" class="custom-control-input" id="needs_code" name="needs_code" checked>
                    <label class="custom-control-label" for="needs_code">Needs Code</label>
                </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="status">
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