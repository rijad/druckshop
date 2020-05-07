 
<section class="customer-profile-section">
	<div class="container">
		<div class="col-xl-12"> 
			<div class="row">
				<div class="col-lg-7">
					    <div class="customer-profile-text">
                            <h2>{{ Auth::user()->name }}</h2>
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
                            
                            <li><span>E-mail</span>
                                <span><input name="email" id="userIdEmail" value="" disabled></span></li>
                            <li><span>Phone </span>
                                <span><input name="phone" id="userIdPhone" value="" disabled></span></li>
                           {{--  <li><span>Shipping Address </span>
                                <span><textarea name="shipping_address" id="userIdshipping" value="" disabled></textarea>
                                    <a  type = "button" name="billing_address_click" id="billing_address" class="form-control" data-toggle="modal" data-target="#rv-Modal-shipping">Edit Address</a>
                                </span>
                            </li> --}}
                            <li><span>Address </span>
                                <span><textarea name="billing_address" id="userIdBilling" value="" disabled></textarea>
                                <button  type = "button" name="billing_address_click" id="billing_address" class="form-control" data-toggle="modal" data-target="#rv-Modal-billing">Edit Address</button>
                            </span></li>
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
                      <div class="text-left repeat-cancel-order">
                        <p> @if(isset($data->admin_response)) {{ "Comments: " . $data->admin_response}} @endif</p>
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
        
                    
                    <!-- =============== modal form  =============== -->

{{-- <!-- Modal -->
<div class="modal fade rv-modalFormCustom" id="rv-Modal-shipping" role="dialog">
    <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Shipping Address</h4>
          </div>
          <div class="modal-body">
             <div class="cart-form-shop w-100">
               <form method = "POST" action="javascript:addAddress('shipping');">
                @csrf
                      <div class="form-group">
                          <label for="text">First Name*</label>
                        <input type="text" class="form-control" placeholder="enter here" name="shipping_first_name" id="shipping_first_name">
                          <p class="error" id="error_shipping_first_name"></p>
                      </div>
                      <div class="form-group">
                          <label for="text">last Name*</label>
                          <input type="text"  class="form-control" placeholder="enter here" name="shipping_last_name" id="shipping_last_name">
                            <p class="error" id="error_shipping_last_name"></p>
                      </div>
                      <div class="form-group w-100">
                          <label for="text">Company</label>
                          <input type="text"  class="form-control" placeholder="enter here" name = "shipping_company_name" id = "shipping_company_name">
                      </div>
                      <div class="form-group">
                          <label for="text">Street*</label>
                          <input type="text"  class="form-control" placeholder="enter here" name = "shipping_street" id = "shipping_street">
                            <p class="error" id="error_shipping_street"></p>
                      </div>
                       <div class="form-group">
                           <label for="text">House Number*</label>
                           <input type="text"  class="form-control" placeholder="enter here" name = "shipping_house_no" id = "shipping_house_no">
                           <p class="error" id="error_shipping_house_no"></p>
                      </div>
                      <div class="form-group">
                          <label for="text">Zip Code*</label>
                          <input type="text"  class="form-control" placeholder="enter here" name="shipping_zip_code" id="shipping_zip_code">
                        <p class="error" id="error_shipping_zip_code"></p>
                      </div>
                      <div class="form-group">
                          <label for="text">City*</label>
                          <input type="text"  class="form-control" placeholder="enter here" name="shipping_city" id="shipping_city">
                           <p class="error" id="error_shipping_city"></p>
                      </div>
                      <div class="form-group">
                          <label for="text">State*</label>
                          <input type="text"  class="form-control" placeholder="enter here" name="shipping_state" id="shipping_state">
                          <p class="error" id="error_shipping_state"></p>
                      </div>
                       <div class="form-group">
                          <label for="text">Addition to Adrress</label>
                          <input type="text"  class="form-control" placeholder="enter here" name = "shipping_addition" id = "shipping_addition">
                      </div>

                      <div class="text-right">
                          <button type= "submit" class="continue_btn">Add</button>
                      </div>
               </form>
            </div>   
          </div>
      </div>  
  </div>
</div> --}}
 
{{-- data-backdrop="false" show = "true"  --}}
<!-- Modal -->
<div class="modal fade rv-modalFormCustom" id="rv-Modal-billing" role="dialog">
    <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button> 
            <h4 class="modal-title">Add Billing Address</h4>
          </div>
          <div class="modal-body">
             <div class="cart-form-shop w-100">
               <form method = "POST" action="javascript:addAddress('billing');">
               @csrf
                      <div class="form-group"> 
                          <label for="text">First Name*</label>
                        <input type="text" class="form-control" placeholder="enter here" name="billing_first_name" id="billing_first_name">
                        <p class="error" id="error_billing_first_name"></p>
                      </div>
                      <div class="form-group">
                          <label for="text">last Name*</label>
                          <input type="text"  class="form-control" placeholder="enter here" name="billing_last_name" id="billing_last_name">
                           <p class="error" id="error_billing_last_name"></p>
                      </div>
                      <div class="form-group w-100">
                          <label for="text">Company</label>
                          <input type="text"  class="form-control" placeholder="enter here" name = "billing_company_name" id = "billing_company_name">
                           <p class="error" id="error_billing_company_name"></p>
                      </div>
                      <div class="form-group">
                          <label for="text">Street*</label>
                          <input type="text"  class="form-control" placeholder="enter here" name = "billing_street"  id = "billing_street">
                          <p class="error" id="error_billing_street"></p>
                      </div>
                       <div class="form-group">
                           <label for="text">House Number*</label>
                           <input type="text"  class="form-control" placeholder="enter here" name = "billing_house_no" id = "billing_house_no">
                           <p class="error" id="error_billing_house_no"></p>
                      </div>
                     
                      <div class="form-group">
                          <label for="text">Zip Code*</label>
                           <input type="text"  class="form-control" placeholder="Zip Code" name="billing_zip_code" id="billing_zip_code">
                        <p class="error" id="error_billing_zip_code"></p>
                      </div>
                      <div class="form-group">
                          <label for="text">City*</label>
                          <input type="text"  class="form-control" placeholder="enter here" name="billing_city" id="billing_city">
                          <p class="error" id="error_billing_city"></p>
                      </div>
                      <div class="form-group">
                          <label for="text">State*</label>
                          <input type="text"  class="form-control" placeholder="enter here" name="billing_state" id="billing_state">
                          <p class="error" id="error_billing_state"></p>
                      </div>
                       <div class="form-group">
                          <label for="text">Addition to Adrress</label>
                          <input type="text"  class="form-control" placeholder="enter here" name = "billing_addition" id = "billing_addition">
                           <p class="error" id="error_billing_addition"></p>
                      </div>

                      <div class="text-right">
                          <button type= "submit" class="continue_btn">Add</button>
                      </div>
               </form>
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
<script src="{{ asset('public/js/frontend/customerarea.js') }}" type="text/javascript" ></script>
