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
                                        <th>Actions</th>
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
                                        <th>Actions</th>
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
                                                <td>{{ $odr->created_at }}</td>
                                                <td>
                                                    <button onclick="window.location='{{route('order-details' , 
                                                        ['id'=>$odr->order_id ]) }}'" 
                                                        class="remove_btn" > Details </button> 
                                                    @if($odr->state == "Done")
                                                    <button type="button" class="btn btn-success btn-sm"  onclick="mailModal('<?php echo $odr->user_id ?>', '<?php echo $odr->order_id ?>');" data-toggle="modal" data-target="#myModal" > Send Tracking Number via E-mail </button>
                                                    @endif    
                                                </td>
                                            </tr>  
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



                <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"><center>Send Order Tracking Link to User</center></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="{{ route('trackingNumberSendMail') }}" method="POST">

        {{ csrf_field() }}
        <div class="modal-body">
          <center><h6>Order ID: <span id="orderId"></span></h6></center>

          <input type="hidden" id='user' name="user" value="" >
          <input type="hidden" id='order_id' name="order_id" value="" >
          <input class="form-control" type="text" id='tracking_link' name="tracking_link" value="" placeholder="Enter Order Tracking Link" required> <br>
          <textarea name='description' class="form-control"></textarea>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-default" value="Submit">
      </div>
  </form>
</div>

</div>
</div>
 


<script>
    function mailModal(user,id) {
        $('input#user').val(user);
        $('#orderId').html(id);
        $('#order_id').val(id);
    }
</script>