<div class="card mb-4 mt-4">
    <div class="card-header"><span>Binding Sample Image</span>

        <div class="float-right">
            <form method="GET" action="{{ route('bindingsample.create') }}">
                <input type="submit" value="Create New Binding Sample Image" class="btn btn-primary">
            </form>
        </div>
    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product_id</th>
                                        <th>Pageformat_id</th>
                                        <th>Covercolor_id</th>
                                        <th>Status</th>
                                        <th>Actions</th> 
                                    </tr>
                                </thead> 
                                <tfoot>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product_id</th>
                                        <th>Pageformat_id</th>
                                        <th>Covercolor_id</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot> 
                                <tbody>
                                    @if(!empty($binding))
                                        @foreach($binding as $bind)
                                            <tr>
                                                <td><img src="{{ asset($bind->image) }}" height="50" width="100" alt="..."></td>
                                                <td>{{ productNameById($bind->product_id) }}</td>
                                                <td>{{ pageformatById($bind->pageformat_id) }}</td>
                                                <td>{{ colorById($bind->covercolor_id) }}</td>
                                                <td>{{ $bind->status }}</td>
                                                <td class="form-inline">
                                                    <form method="POST" action="{{ route('bindingsample.destroy' , $bind->id) }}">
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