<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Edit Page Format</h2>

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

            <form class="form-group-inline" method="POST" action="{{ route('pageformat.update', $format->id) }}" enctype="multipart/form-format">
                @method('PUT')    
                @csrf
                <div class="form-group">
                    <label class="small mb-1" for="page_format">Name</label>
                    <input class="form-control" id="page_format" name="page_format" value="{{ $format->page_format }}" type="text" placeholder="page_format" required />
                    <span class="text-danger">{{ $errors->first('page_format') }}</span>
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="name_english">Name in English</label>
                    <input class="form-control" id="name_english" name="name_english" value="{{ $format->name_english }}" type="text" placeholder="Name" required />
                    <span class="text-danger">{{ $errors->first('name_english') }}</span>
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="name_german">Name In German</label>
                    <input class="form-control" id="name_german" name="name_german" value="{{ $format->name_german }}" type="text" placeholder="Name" required />
                    <span class="text-danger">{{ $errors->first('name_german') }}</span>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" <?php echo ($format->can_add_din_A2) ? 'checked' : ''; ?> id="can_add_din_A2" name="can_add_din_A2" <?php echo ($format->can_add_din_A2) ? 'checked' : ''; ?>>
                        <label class="custom-control-label" for="can_add_din_A2">Can Add Din A2</label>
                    </div>
                </div>

                <div class="form-group" id="max_a22">
                    <label class="small mb-1" for="max_pages_A2">Max Pages A2</label>
                    <input class="form-control" id="max_pages_A2" name="max_pages_A2" value="{{ $format->max_pages_A2 }}" type="text" placeholder="max_pages_A2"  />
                    <span class="text-danger">{{ $errors->first('max_pages_A2') }}</span>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" <?php echo ($format->can_add_din_A3) ? 'checked' : ''; ?> id="can_add_din_A3" name="can_add_din_A3" <?php echo ($format->can_add_din_A3) ? 'checked' : ''; ?>>
                        <label class="custom-control-label" for="can_add_din_A3">Can Add Din A3</label>
                    </div>
                </div>

                <div class="form-group" id="max_a33">
                    <label class="small mb-1" for="max_pages_A2">Max Pages A3</label>
                    <input class="form-control" id="max_pages_A3" name="max_pages_A3" value="{{ $format->max_pages_A3 }}" type="text" placeholder="max_pages_A3"  />
                    <span class="text-danger">{{ $errors->first('max_pages_A3') }}</span>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="status" <?php echo ($format->status) ? 'checked' : ''; ?>>
                        <label class="custom-control-label" for="customCheck">Active</label>
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-user btn-block col-md-3" value="Update">
                </div>


            </form>

        </div>

    </div>


    <style>
    tr>th {
        padding: 8px;
    }

    tr>td {
        padding: 8px;
    }
</style>