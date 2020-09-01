<div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Payment</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Payment_type</th>
                                        <th>Status</th>
                                        <th>Customer Name</th>
                                        <th>Transaction</th>
                                        <th>Amount</th>
                                        <th>Order_id</th>
                                        <th>Payment Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Payment_type</th>
                                        <th>Status</th>
                                        <th>Customer Name</th>
                                        <th>Transaction</th>
                                        <th>Amount</th>
                                        <th>Order_id</th>
                                        <th>Payment Date</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if(!empty($payment))
                                        @foreach($payment as $pay)
                                            <tr>
                                                <td>{{ $pay->type }}</td>
                                                <td>{{ $pay->status }}</td>
                                                <td>{{ customer($pay->user_id) }}</td>
                                                <td>{{ $pay->txn }}</td>
                                                <td>{{number_format($pay->amount,2)}}</td>
                                                <td>{{ $pay->order_id }}</td>
                                                <td>{{ changeTimeZone($pay->created_at) }}</td>
                                                <td class="form-inline">
                                                    <form method="GET" action="{{ route('payment-edit' , $pay->id) }}">
                                                
                                                    <input type="submit" value="edit" class="btn btn-success">
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