<div class="card mb-4 mt-4">
    <div class="card-header"><span>Cover Sheet</span>

        <div class="float-right">
            <form method="GET" action="{{ route('coversheet.create') }}">
                <input type="submit" value="Create New Cover Sheet" class="btn btn-primary">
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
                                    @foreach($coversheet as $sheet)
                                    <tr>
                                        <td>{{ $sheet->sheet }}</td>
                                        <td class="form-inline">
                                        <form method="GET" action="{{ route('coversheet.edit' , $sheet->id) }}">
                                                <input type="submit" value="edit" class="btn btn-success">
                                            </form>
                                            <form method="POST" action="{{ route('coversheet.destroy' , $sheet->id) }}" class="ml-2">
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