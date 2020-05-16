<div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Payment</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Payment_type</th>
                                        <th>Status</th>
                                        <th>User_id</th>
                                        <th>Transaction</th>
                                        <th>Amount</th>
                                        <th>Order_id</th>
                                        <th>Payment Date</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Payment_type</th>
                                        <th>Status</th>
                                        <th>User_id</th>
                                        <th>Transaction</th>
                                        <th>Amount</th>
                                        <th>Order_id</th>
                                        <th>Payment Date</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if(!empty($payment))
                                        @foreach($payment as $pay)
                                            <tr>
                                                <td>{{ $pay->payment_type }}</td>
                                                <td>{{ $pay->status }}</td>
                                                <td>    @php
                                                        echo App\Http\Controllers\Admin\PaymentController::users($pay->user_id);
                                                        @endphp
                                                </td>
                                                <td>{{ $pay->txn }}</td>
                                                <td>{{ $pay->amount }}</td>
                                                <td>{{ $pay->order_id }}</td>
                                                <td>{{ $pay->created_at }}</td>
                                            </tr> 
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>