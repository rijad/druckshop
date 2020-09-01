<div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>State</th>
                                        <th>User</th>
                                        <th>Order Id</th>
                                        {{-- <th>Shipping Address</th>
                                        <th>Billing Address</th>
                                        <th>CD</th> 
                                        <th>No. of copies</th> --}}
                                        <th>Order Assigned To</th>
                                        <th>Priority</th>
                                        <th>Order Date</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr> 
                                        <th>State</th>
                                        <th>User</th>
                                        <th>Order Id</th>
                                        {{-- <th>Shipping Address</th>
                                        <th>Billing Address</th>
                                        <th>CD</th>
                                        <th>No. of copies</th> --}}
                                        <th>Order Assigned To</th> 
                                        <th>Priority</th>
                                        <th>Order Date</th>
                                    </tr>
                                </tfoot>
                                <tbody>  
                                    @if(!empty($order))
                                        @foreach($order as $odr)
                                            <tr>
                                                <td>{{ $odr->state }}</td>
                                                <td>{{ customer($odr->user_id) }}</td>
                                                <td>{{$odr->order_id}}</td>
                                                {{-- <td>{{ $odr->billing_address }}</td>
                                                <td>{{ $odr->shipping_address }}</td>
                                                <td>{{ $odr->no_of_cds }}</td>
                                                <td>{{ $odr->no_of_copies }}</td> --}}
                                                <td>    @php
                                                        echo App\Http\Controllers\Admin\OrderController::users($odr->assigned_to);
                                                        @endphp
                                                </td>
                                                <td>{{ $odr->priority }}</td>
                                                <td>{{ changeTimeZone($odr->created_at) }}</td>
                                                
                                            </tr>  
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



               