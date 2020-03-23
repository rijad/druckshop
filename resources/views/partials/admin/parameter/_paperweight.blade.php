<div class="card mb-4 mt-4">
    <div class="card-header"><span>Paper Weight List</span>

        <div class="float-right">
            <form method="GET" action="{{ route('paper.create') }}">
                <input type="submit" value="Create New Paper Weight" class="btn btn-primary">
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
                    @foreach($paperweight as $weight)
                    <tr>
                        <td>{{ $weight->paper_weight }}</td>
                        <td>
                        <form method="GET" action="{{ route('paper.edit' , $weight->id) }}">
                                <input type="submit" value="edit" class="btn btn-success">
                            </form>
                            
                            <form method="POST" action="{{ route('paper.destroy' , $weight->id) }}">
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