<div class="card mb-4 mt-4">
    <div class="card-header"><span>Delivery Service</span>

        <div class="float-right">
            <form method="GET" action="{{ route('deliveryService.create') }}">
                <input type="submit" value="Create New Delivery Service" class="btn btn-primary">
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
                    @if(!empty($deliveryservice))
                        @foreach($deliveryservice as $service)
                        <tr>
                            <td>{{ $service->delivery_service }}</td>
                            <td><?= ($service->status == 1)? 'Active' : 'InActive'?></td>
                            <td class="form-inline">
                                <form method="GET" action="{{ route('deliveryService.edit' , $service->id) }}">
                                    <input type="submit" value="edit" class="btn btn-success">
                                </form>

                                <form method="POST" action="{{ route('deliveryService.destroy' , $service->id) }}" class="ml-2">
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