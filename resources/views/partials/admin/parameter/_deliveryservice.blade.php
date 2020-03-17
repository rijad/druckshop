<div class="card mb-4 mt-4">
    <div class="card-header"><span>Delivery Service</span>

        <a href="#" class="btn btn-primary float-right ">
            <span>Create New Delivery Service</span>
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
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($deliveryservice as $service)
                    <tr>
                        <td>{{ $service->delivery_service }}</td>
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