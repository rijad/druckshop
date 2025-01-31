<div class="card mb-4 mt-4">
    <div class="card-header"><span>Cover Color</span>

        <div class="float-right">
            <form method="GET" action="{{ route('covercolor.create') }}">
                <input type="submit" value="Create New Cover Color" class="btn btn-primary">
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
                                    @foreach($covercolor as $color)
                                    <tr>
                                        <td>{{ $color->color }}</td>
                                        <td class="form-inline">
                                            <form method="GET" action="{{ route('covercolor.edit' , $color->id) }}">
                                                <input type="submit" value="edit" class="btn btn-success">
                                            </form>
                                            <form method="POST" action="{{ route('covercolor.destroy' , $color->id) }}" class="ml-2">
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