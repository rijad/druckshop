 
<section class="customer-profile-section">
	<div class="container">
		<div class="col-xl-12">
			<div class="row">
				<div class="col-lg-7">
					    <div class="customer-profile-text">
                            <h2>Maria Williams</h2>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed dod tempor incididunt labore.</p> -->
                            </div>
                            <div class="customer-profile-info"> 
                            <h2>General Info</h2>
                            <div class="UserIdEdit">
                                <button onclick="enableFieldFunction()">Edit Info</button>
                                <input type="button" onclick="javascript:saveProfile();" class="userSaveInfo" value="Save">
                            </div>
                            <ul class="GeneralInfoListing">
                            <li><span>Date of Birth</span>
                                <span><input name="dob" id="userIdBirth" value="" disabled></span></li>
                            <li><span>Address</span>
                                <span><textarea name="address" id="userIdAddress" value="" disabled></textarea></span></li>
                            <li><span>E-mail</span>
                                <span><input name="email" id="userIdEmail" value="" disabled></span></li>
                            <li><span>Phone </span>
                                <span><input name="phone" id="userIdPhone" value="" disabled></span></li>
                            <li><span>Shipping Address </span>
                                <span><textarea name="shipping_address" id="userIdshipping" value="" disabled></textarea></span></li>
                            <li><span>Billing Address </span>
                                <span><textarea name="billing_address" id="userIdBilling" value="" disabled></textarea></span></li>
                            </ul>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <figure class="customer-profile-image">
                            <div id="img-preview-block" class="avatar avatar-original center-block" style="background-size:cover; 
                                background-image:url(http://druckshop.trantorglobal.com/public/images/customer-profile.jpg)"></div>
                                <span class="btn btn-link btn-file">Edit Profile <input type="file" name="image" id="upload-img" accept="image/*"></span>
                            </figure>
                        </div>
                </div>
			</div>
		</div>
	</div>
</section>

 <div class="mycart customer-area-rv">
    <div class="container">
        <div class="Product_qeue">
            <div class="w-100">
                <div class="left_productdetail"> 
                        @foreach($OrderHistory as $data) 
                        @if(count($data->orderProductHistory) >=1)
                    <div class="text-center quote_heading">
                        <p>Order id : {{$data->order_id}}    Order date: {{DATE('M j Y',strtotime($data->created_at))}} </p>
                    </div>
                    <div class="customer-info">
                        <p>No of Copies: {{$data->no_of_copies}}</p>   
                        <p>No of CDs: {{$data->no_of_cds}}</p> 
                        <p>Shipping Address: {{$data->shipping_address}}</p>
                        <p>Billing Address: {{$data->billing_address}}</p>
                    </div>    
                    <div class="product"> 
                    	
                    	 @foreach($data->orderProductHistory as $details)
                    	 
                        <div class="product_listing">  
                            <img src="images/product_frame.png" alt="" width="100px">
                            <div class="product_description">
                                <p class="thisproduct_head">{{$details->product}}</p>
                                <p class="thisproduct_subhead">{{$details->attribute_desc}}</p>
                            </div>
                            <ul class="product_price">
                                <li class="inputcard_quantity"><h6>
                                    <strong>{{$details->price_product_qty}}€</strong></h6>
                                </li>
                            </ul>
                        </div>  
                        <hr> 
                       
                        @endforeach
                        
                        <div class="text-right quote_heading">
                        	<p class="total-amount-rv"><b>Total Amount: {{$data->total}} €<b></p>
                    	</div>
                        <div class="text-right repeat-cancel-order">
                        	<button class="paypaypal" onclick="window.location='{{route('repeat-order',['order_id'=>$data->order_id])}}'">Repeat Order</button>
                        	@if($data->state == "New")
                        	<button class="paycash" onclick="window.location='{{route('cancel-order',['order_id'=>$data->order_id])}}'">Cancel Order</button>
                        	@elseif($data->state == "Cancelled")
                         	<button class="paycash" onclick="#">Cancelled</button>
                            @elseif($data->state == "Done")
                            <button type="button" class="paycash" onclick="#" data-toggle="modal" data-oid="{{$data->order_id}}" data-uid="{{$data->user_id}}" data-target="#returnModal">Return</button>
                            @elseif($data->state == "Reversal Request")
                              <button class="paycash" onclick="#">Return Requested</button>
                            @elseif($data->state == "Reversal declined")
                              <button class="paycash" onclick="#">Return Declined</button>
                            @elseif($data->state == "Reversal approved")
                              <button class="paycash" onclick="#">Return Approved</button>    
                        	@endif
                    	</div> 
                        @endif
                        @endforeach
                    </div>
                </div>
            </div> 
        </div>  
    </div>
</div>
 
                    {{-- Return Details Modal --}}
                    <div class="modal fade" id="returnModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Please Fill in Details to Request a Return</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                        <p></p>
                        <form>
                            <input type="hidden" id="order_id" name="order_id" />
                            <input type="hidden" id="user_id" name="user_id" />
                            <div class="form-group">
                              <label for="desc">Describe Reason of Return*:</label>
                              <textarea name="return_desc" id="return_desc" class="form-control"></textarea>
                              <p class="error" id="error_return_desc"></p>
                            </div>
                            
                             <div class="form-group">
                              <label for="email">Upload Product Image*:</label>
                              <input type="file" name="return_image" id="return_image" accept="image/*">
                               <p class="error" id="error_return_image"></p>
                            </div>
                        </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="javascript:submitReturnRequest()">Send Request</button>
                </div>
            </div>
        </div>
    </div>

<script>

// fetch data for customer profile
    window.onload = function WindowLoad(event) {

        $.ajax({ 
          type: 'get', 
          url: '/druckshop/customer-area-data',
          success:function(response) { 
           var data = JSON.parse(response);  
           document.getElementById('userIdBirth').value = data['dob'];
           document.getElementById('userIdAddress').value = data['address'];
           document.getElementById('userIdEmail').value = data['email'];
           document.getElementById('userIdPhone').value = data['phone'];
           document.getElementById('userIdshipping').value = data['shipping_address'];
           document.getElementById('userIdBilling').value = data['billing_address'];
           $("#img-preview-block").css({'background-image': 'url('+ data['image'] +')', "background-size": "cover"});
        }

      });
} 


</script>

<script>
function enableFieldFunction() {
    
    document.getElementById("userIdBirth").disabled = false;
    document.getElementById("userIdAddress").disabled = false;
    document.getElementById("userIdEmail").disabled = false;
    document.getElementById("userIdPhone").disabled = false;
    document.getElementById("userIdAddress").disabled = false;
    document.getElementById("userIdshipping").disabled = false;
    document.getElementById("userIdBilling").disabled = false;
}

function saveProfile(){  
    var dob = document.getElementById('userIdBirth').value;
    var address = document.getElementById('userIdAddress').value; 
    var email = document.getElementById('userIdEmail').value;  
    var phone = document.getElementById('userIdPhone').value;  
    var shipping_address = document.getElementById('userIdshipping').value;   
    var billing_address = document.getElementById('userIdBilling').value;  
    var image = document.getElementById('upload-img').files[0];   //file object

         var form_data = new FormData();                  
        form_data.append('image', image);
        form_data.append('dob', dob);
        form_data.append('address', address);
        form_data.append('email', email);
        form_data.append('phone', phone);
        form_data.append('shipping_address', shipping_address);
        form_data.append('billing_address', billing_address);
        form_data.append( "_token", "{{ csrf_token() }}");

	$.ajax({ 
        type: 'POST',
        url: '/druckshop/customer-area-update',
        contentType: false,
        processData: false,
        data: form_data,
        success:function(response) {  
                document.getElementById("userIdBirth").disabled = true;
                document.getElementById("userIdAddress").disabled = true;
                document.getElementById("userIdEmail").disabled = true;
                document.getElementById("userIdPhone").disabled = true;
                document.getElementById("userIdAddress").disabled = true;
                document.getElementById("userIdshipping").disabled = true;
                document.getElementById("userIdBilling").disabled = true;
        }
	});
    
}

</script>
<script>

// fetching data in modal
$('#returnModal').on('show.bs.modal', function(e) {
    var orderId = $(e.relatedTarget).data('oid');
    var userId = $(e.relatedTarget).data('uid');
    //populate the hidden textbox in modal
    $(e.currentTarget).find('input[id="order_id"]').val(orderId);
    $(e.currentTarget).find('input[id="user_id"]').val(userId);
});
  
  function submitReturnRequest(){
    var order_id = document.getElementById('order_id').value; 
    var user_id = document.getElementById('user_id').value; 
    var desc = document.getElementById('return_desc').value;  
    var file = document.getElementById('return_image').files[0];   //file object

    if(desc == ""){
      document.getElementById('error_return_desc').innerHTML = "Kindly mention reason of return.";
      return false;
    }

    if(document.getElementById('return_image').files.length == 0){
      document.getElementById('error_return_image').innerHTML = "Kindly upload image of product.";
      return false;
    }
    
      var form_data = new FormData();                  
      form_data.append('file', file); 
      form_data.append('order_id', order_id);
      form_data.append('user_id', user_id);
      form_data.append('desc', desc);
      form_data.append( "_token", "{{ csrf_token() }}");
        $.ajax({ 
          type: 'POST', 
          url: '/print-shop/return-order',
          contentType: false,
          processData: false,
          data: form_data,
          success:function(response) {  
              $('#returnModal').modal('hide');
              Location.reload();
        }

      });
}
</script>