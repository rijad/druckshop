
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
                       {{--  <th>Additional Email</th> --}}
                        <th>DOB</th>
                        <th>Phone</th>
                        <th>Billing Address</th>
                        <th>Status</th>
                        {{-- <th>Image</th> --}}
                        <th>Created at</th>
                    </tr>
                </thead> 
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        {{-- <th>Additional Email</th> --}}
                        <th>DOB</th>
                        <th>Phone</th>
                        <th>Billing Address</th>
                        <th>Status</th>
                        {{-- <th>Image</th> --}}
                        <th>Created at</th>
                    </tr>
                </tfoot>
                <tbody>
                @if(!empty($customerdata))
                    @foreach($customerdata as $cust)
                    <tr>
                        <td>{{ $cust->name }}</td>
                        <td>{{ $cust->email }}</td>

                        @if($cust->customer)
                            {{-- <td>{{ $cust->customer->email }}</td> --}}
                            <td>{{ $cust->customer->dob }}</td>
                            <td>{{ $cust->customer->phone }}</td>
                            <td>{{ $cust->customer->billing_address }}</td>
                            <td><?= ($cust->customer->status == 1)? 'Active' : 'InActive'?></td>
                            {{-- <td>
                                <img src="{{ asset($cust->customer->image)}}" height="50" width="100" alt="...">
                            </td> --}}
                        @else
                           {{--  <td></td> --}}
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        @endif
                        
                        <td>{{ changeTimeZone($cust->created_at)}}</td>
                    </tr>  
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>