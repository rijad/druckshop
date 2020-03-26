<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Create New Page Format</h2>

        <div class="card-body col-md-6">

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

            <form class="form-group-inline" method="POST" action="{{ route('pageformat.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="small mb-1" for="page_format">Name</label>
                    <input class="form-control" id="page_format" name="page_format" value="{{ old('page_format') }}" type="text" placeholder="page_format" required />
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="name_english">Name in English</label>
                    <input class="form-control" id="name_english" name="name_english" value="{{ old('name_english') }}" type="text" placeholder="Name" required />
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="name_german">Name In German</label>
                    <input class="form-control" id="name_german" name="name_german" value="{{ old('name_german') }}" type="text" placeholder="Name" required />
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="can_add_din_A2" name="can_add_din_A2">
                        <label class="custom-control-label" for="can_add_din_A2">Can Add Din A2</label>
                    </div>
                </div>

                <div class="form-group" id="max_a2">
                    <label class="small mb-1" for="max_pages_A2">max_pages_A2</label>
                    <input class="form-control" id="max_pages_A2" name="max_pages_A2" value="{{ old('max_pages_A2') }}" type="text" placeholder="max_pages_A2"  />
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="can_add_din_A3" name="can_add_din_A3">
                        <label class="custom-control-label" for="can_add_din_A3">Can Add Din A3</label>
                    </div>
                </div>

                <div class="form-group" id="max_a3">
                    <label class="small mb-1" for="max_pages_A2">max_pages_A3</label>
                    <input class="form-control" id="max_pages_A3" name="max_pages_A3" value="{{ old('max_pages_A3') }}" type="text" placeholder="max_pages_A3"  />
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


    <style>
    tr>th {
        padding: 8px;
    }

    tr>td {
        padding: 8px;
    }
</style>