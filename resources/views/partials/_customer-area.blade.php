 
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
						<input type="submit" name="" class="userSaveInfo" value="Save">
					</div>	
					<ul class="GeneralInfoListing">
					<li><span>Date of Birth</span><span><input id="userIdBirth" value="Nov 29, 1968" disabled></span></li>
					<li><span>Address</span><span><textarea id="userIdAddress" value="" disabled>Rosia Road 55, Downtown Eastside Gibraltar, US</textarea></span></li>
					<li><span>E-mail</span><span><input id="userIdEmail" value="mariawilliams@company.com" disabled></span></li>
					<li><span>Phone </span><span><input id="userIdPhone" value="+993 5266 22 345" disabled></span></li>
					<li><span>Shipping Address </span><span><textarea id="userIdshipping" value="" disabled>Rosia Road 55, Downtown Eastside Gibraltar, US</textarea></span></li>
					<li><span>Billing Address </span><span><textarea id="userIdBilling" value="" disabled>Rosia Road 55, Downtown Eastside Gibraltar, US</textarea></span></li>
					</ul>
					</div>
				</div>
				<div class="col-lg-5">
					<figure class="customer-profile-image">
					<div id="img-preview-block" class="avatar avatar-original center-block" style="background-size:cover; 
					                background-image:url(http://druckshop.trantorglobal.com/public/images/customer-profile.jpg)"></div>
					                <span class="btn btn-link btn-file">Edit Profile <input type="file" id="upload-img"></span>
					</figure>
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
                                <li class="inputcard_quantity"><h6><strong>{{$details->price_product_qty}}€</strong></h6>
                                   
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
                            <button type="button" class="paycash" onclick="#" data-toggle="modal" data-target="#returnModal">Return</button>
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
                        <form method = "POST" action="">
                            @csrf 
                            <div class="form-group">
                              <label for="email">Describe Reason of Return*:</label>
                              <textarea name="shipping_address" id="shipping_address" class="form-control"></textarea>
                               @if($errors->has('shipping_address'))
                              <div class="error">{{ $errors->first('shipping_address') }}</div>
                              @endif
                            </div>
                             <div class="form-group">
                              <label for="email">Upload Product Image*:</label>
                              <input type="file" name="return_image" id="return_image" accept="image/*">
                               @if($errors->has('billing_address'))
                              <div class="error">{{ $errors->first('billing_address') }}</div>
                              @endif
                            </div>
                        </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="submitRequest();">Send Request</button>
                </div>
            </div>
        </div>
    </div>




<script type="text/javascript">
  $(function() {
    $("#upload-img").on("change", function()
    {
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onload = function(e){ // set image data as background of div
              
              $("#img-preview-block").css({'background-image': 'url('+e.target.result +')', "background-size": "cover"});
            }
        }
    });
});
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
</script>

