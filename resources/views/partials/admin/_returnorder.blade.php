<div class="card mb-4 mt-4">
    <div class="card-header"><span>Return Orders</span>
    </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>State</th>
                            <th>Order id</th>
                            <th>Image</th>
                            <th>Return Description</th> 
                            <th>Admin Response</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>State</th>
                            <th>Order id</th>
                            <th>Image</th>
                            <th>Return Description</th>
                            <th>Admin Response</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                                <tbody>
                                    @if(!empty($return))
                                        @foreach($return as $order)
                                            <tr>
                                                <td>{{ $order->status }}</td>
                                                <td>{{ $order->order_id }}</td>
                                                <td><img src="{{ asset($order->image_path)}}" height="50" width="100" alt="..."></td>
                                                <td>{{ $order->return_desc }}</td>
                                                <td>{{ $order->admin_response}}</td>
                                                <td>
                                                    <button type="button" class="paycash" onclick="#" data-toggle="modal" data-oid="{{$order->order_id}}" data-uid="{{$order->user_id}}" data-status="Reversal approved" data-target="#returnModal">Redeliver</button>
                                                    <button type="button" class="paycash" onclick="#" data-toggle="modal" data-oid="{{$order->order_id}}" data-uid="{{$order->user_id}}" data-status="Reversal coupon" data-target="#returnModal">Coupon</button>
                                                    <button type="button" class="paycash" onclick="#" data-toggle="modal" data-oid="{{$order->order_id}}" data-uid="{{$order->user_id}}" data-status="Reversal declined" data-target="#returnModal">Declined</button>

                                                    <div class="modal fade" id="returnModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Response</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p></p>
                                                        <form method="POST" action="{{ route('returnorder.update', $order->id) }}">
                                                            @method('PUT')
                                                            @csrf
                                                            <input type="hidden" id="order_id" name="order_id" />
                                                            <input type="hidden" id="status" name="status" />
                                                            <input type="hidden" id="user_id" name="user_id" />
                                                            <div class="form-group">
                                                            <label for="desc">Admin Response</label>
                                                            <textarea name="admin_response" id="return_desc" class="form-control"></textarea>
                                                            <p class="error" id="error_return_desc"></p>
                                                            </div>
                                                        
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr> 
                                        @endforeach
                                    @endif
                                </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $('#returnModal').on('show.bs.modal', function(e) {
            var orderId = $(e.relatedTarget).data('oid');
            var userId = $(e.relatedTarget).data('uid');
            var status = $(e.relatedTarget).data('status');
            //populate the hidden textbox in modal
            $(e.currentTarget).find('input[id="order_id"]').val(orderId);
            $(e.currentTarget).find('input[id="status"]').val(status);
            $(e.currentTarget).find('input[id="user_id"]').val(userId);
        });
    </script>