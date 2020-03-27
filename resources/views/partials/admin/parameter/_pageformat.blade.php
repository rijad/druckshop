<div class="card mb-4 mt-4">
    <div class="card-header"><span>Page Format</span>

        <div class="float-right">
            <form method="GET" action="{{ route('pageformat.create') }}">
                <input type="submit" value="Create New Page Format" class="btn btn-primary">
            </form>
        </div>

    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($pageformat as $format)
                                    <tr>
                                        <td>{{ $format->page_format }}</td>
                                        <td class="form-inline">
                                            <form method="GET" action="{{ route('pageformat.edit' , $format->id) }}">
                                                <input type="submit" value="edit" class="btn btn-success">
                                            </form>

                                            <form method="POST" action="{{ route('pageformat.destroy' , $format->id) }}" class="ml-2">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" value="delete" class="btn btn-danger">
                                            </form>
                                        </td>
                                    </tr> 
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>