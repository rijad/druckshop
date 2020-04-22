
<div class="card mb-4 mt-4">
    <div class="card-header"><span>Customers</span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created at</th>
                    </tr>
                </thead> 
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created at</th>
                    </tr>
                </tfoot>
                <tbody>

                    @foreach($customer as $cust)
                    <tr>
                        <td>{{ $cust->name }}</td>
                        <td>{{ $cust->email }}</td>
                        <td>{{ $cust->created_at->format('d M,Y') }}</td>
                    </tr>  
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>