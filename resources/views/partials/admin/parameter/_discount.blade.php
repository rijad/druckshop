<div class="card mb-4 mt-4">
    <div class="card-header"><span>Discount</span>

        <div class="float-right">
            <form method="GET" action="{{ route('discount.create') }}">
                <input type="submit" value="Create New Discount" class="btn btn-primary">
                <a href="{{ url('/admin/parameter') }}" class="btn btn-secondary">Back</a>
            </form>
        </div>

    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if(!empty($discount))
                                        @foreach($discount as $disc)
                                        <tr>
                                            <td>{{ $disc->code }}</td>
                                            <td><?= ($disc->status == 1)? 'Active' : 'InActive'?></td>
                                            <td class="form-inline">
                                            <form method="GET" action="{{ route('discount.edit' , $disc->id) }}">
                                                    <input type="submit" value="edit" class="btn btn-success">
                                                </form>
                                                <form method="POST" action="{{ route('discount.destroy' , $disc->id) }}" class="ml-2">
                                                @method('DELETE')
                                                @csrf
                                                    <input type="submit" value="delete" class="btn btn-danger">
                                                </form>
                                            </td>
                                        </tr> 
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>