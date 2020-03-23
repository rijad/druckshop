<div class="card mb-4 mt-4">
    <div class="card-header"><span>Art Management</span>

        <a href="#" class="btn btn-primary float-right ">
            <span>Add New</span>
        </a>
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
                <tbody>
                    @foreach($art as $artlist)
                    <tr>
                        <td>{{ $artlist->check_list }}</td>
                        <td>
                            <a href="#" class="btn btn-success">
                                <span>Edit</span>
                            </a>
                            <a href="#" class="btn btn-danger">
                                <span>Delete</span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>