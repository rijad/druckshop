@if(Auth::user()->name != "Guest")
<section class="customer-profile-section">
	<div class="container">
		<div class="col-xl-12"> 
			<div class="row">
				<div class="col-lg-7">
					    <div class="customer-profile-text">
                            <h2>{{ ucwords(Auth::user()->name) }}</h2>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed dod tempor incididunt labore.</p> -->
                            </div>
                            <div class="customer-profile-info">  
                            <h2>{{ trans('customer.info') }}</h2>  
                            <div class="UserIdEdit">
                                <button onclick="enableFieldFunction()">{{ trans('customer.edit_info') }}</button>
                                <input type="button" onclick="javascript:saveProfile();" class="userSaveInfo" value="{{ trans('customer.save') }}">
                            </div>
                            <ul class="GeneralInfoListing">
                              <li><span>{{ trans('customer.birth') }}</span>
                                  <span><input name="dob" id="userIdBirth" value="" disabled></span></li>
                              
                              <li><span>E-mail</span>
                                  <span><input name="email" id="userIdEmail" value="" disabled></span></li>
                              <li><span>{{ trans('customer.phone') }} </span>
                                  <span><input name="phone" id="userIdPhone" value="" disabled></span></li>
                            {{--  <li><span>{{ trans('customer.address') }} </span>
                                  <span><textarea name="shipping_address" id="userIdshipping" value="" disabled></textarea>
                                      <a  type = "button" name="billing_address_click" id="billing_address" class="form-control" data-toggle="modal" data-target="#rv-Modal-shipping">Edit Address</a>
                                  </span>
                              </li> --}}
                              <li><span>{{ trans('customer.address') }} </span>
                                  <span><textarea name="billing_address" id="userIdBilling" value="" disabled></textarea>
                                  <button  type = "button" name="billing_address_click" id="billing_address" class="form-control" data-toggle="modal" data-target="#rv-Modal-billing">{{ trans('customer.edit_add') }}</button>
                                </span>
                              </li>
                              <li>
                                <span>
                                  <a type = "button" href="{{route('shipping-address.index')}}" name="shipping_address_click" id="shipping_address" class="form-control" >{{ trans('customer.manage_ship_add') }}</a>
                                </span>
                              </li>
                            </ul>
                            </div>
              </div> 
                       {{--  <div class="col-lg-5">
                            <figure class="customer-profile-image">
                            <div id="img-preview-block" class="avatar avatar-original center-block" style="background-size:cover; 
                                background-image:url(http://druckshop.trantorglobal.com/public/images/customer-profile.jpg)"></div>
                                <span class="btn btn-link btn-file">Edit Profile <input type="file" name="image" id="upload-img" accept="image/*"></span>
                            </figure>
                        </div> --}}
          </div>
        </div>
      </div>
    </div>
</section>
@endif
 <div class="mycart customer-area-rv">
    <div class="container"> 
        <div class="Product_qeue">
            <div class="w-100">
                <div class="left_productdetail"> 
                  @foreach($OrderHistory as $data) 
                  @if(count($data->orderProductHistory) >=1)
                    <div class="text-center quote_heading">
                      <p>{{ trans('customer.order') }} : {{$data->order_id}}    Order date: {{DATE('M j Y',strtotime($data->created_at))}} </p>
                    </div>
                    <div class="customer-info">
                      @foreach($splitOrderDetails as $splitKey => $splitValue) 
                        @if($data->order_id == $splitValue->unique_id)
                        <p>{{ trans('customer.no_of_copies') }}: {{$splitValue->no_of_copies}}</p>   
                        <p>{{ trans('customer.no_of_cds') }}: {{$splitValue->no_of_cds}}</p> 
                        <p>{{ trans('customer.ship_add') }}: {{$splitValue->shipping_address}}</p>
                        <hr>
                        @else
                        {{-- <p>{{ trans('customer.no_of_copies') }}: {{$data->no_of_copies}}</p>   
                        <p>{{ trans('customer.no_of_cds') }}: {{$data->no_of_cds}}</p> 
                        <p>{{ trans('customer.ship_add') }}: {{$data->shipping_address}}</p>
                        <p>{{ trans('customer.bill_add') }}: {{$data->billing_address}}</p>
                        <hr> --}}
                        @endif
                      @endforeach
                       <p>{{ trans('customer.bill_add') }}: {{$data->billing_address}}</p>
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
                        	<p class="total-amount-rv"><b>{{ trans('customer.total') }}: {{$data->total}} €<b></p>
                    	  </div>
                        <div class="text-left repeat-cancel-order">
                          <p> @if(isset($data->admin_response)) {{ "Comments: " . $data->admin_response}} @endif</p>
                        </div>
                        <div class="text-right repeat-cancel-order" id="return-order-status">
                        	<button class="paypaypal" onclick="window.location='{{route('repeat-order',['order_id'=>$data->order_id])}}'">{{ trans('customer.repeat') }}</button>
                        	@if($data->state == "New")
                        	  <button class="paycash" onclick="window.location='{{route('cancel-order',['order_id'=>$data->order_id])}}'">{{ trans('customer.cancel') }}</button>
                        	@elseif($data->state == "Cancelled")
                         	  <button class="paycash" onclick="#">{{ trans('customer.cancelled') }}</button>
                          @elseif($data->state == "Done")
                            <button id = "order-status" type="button" class="paycash" onclick="#" data-toggle="modal" data-oid="{{$data->order_id}}" data-uid="{{$data->user_id}}" data-target="#returnModal">{{ trans('customer.return') }}</button>
                          @elseif($data->state == "Reversal Request")
                              <button class="paycash" onclick="#">{{ trans('customer.request') }}</button>
                          @elseif($data->state == "Reversal declined")
                              <button class="paycash" onclick="#">{{ trans('customer.decline') }}</button>
                          @elseif($data->state == "Reversal approved")
                              <button class="paycash" onclick="#">{{ trans('customer.approve') }}</button>    
                        	@endif
                    	  </div> 
                    </div>    
                  @endif
                  @endforeach
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
            <h4 class="modal-title">{{ trans('customer.add_bill_add') }}</h4>
          </div>
          <div class="modal-body">
             <div class="cart-form-shop w-100">
               <form method = "POST" action="javascript:addAddress('billing');" id = "billingForm">
               @csrf
                      <div class="form-group"> 
                          <label for="text">{{ trans('customer.first_name') }}*</label>
                        <input type="text" class="form-control" placeholder="enter here" name="billing_first_name" id="billing_first_name">
                        <p class="error" id="error_billing_first_name"></p>
                      </div>
                      <div class="form-group">
                          <label for="text">{{ trans('customer.last_name') }}*</label>
                          <input type="text"  class="form-control" placeholder="enter here" name="billing_last_name" id="billing_last_name">
                           <p class="error" id="error_billing_last_name"></p>
                      </div>
                      <div class="form-group w-100">
                          <label for="text">{{ trans('customer.company') }}</label>
                          <input type="text"  class="form-control" placeholder="enter here" name = "billing_company_name" id = "billing_company_name">
                           <p class="error" id="error_billing_company_name"></p>
                      </div>
                      <div class="form-group">
                          <label for="text">{{ trans('customer.street') }}*</label>
                          <input type="text"  class="form-control" placeholder="enter here" name = "billing_street"  id = "billing_street">
                          <p class="error" id="error_billing_street"></p>
                      </div>
                       <div class="form-group">
                           <label for="text">{{ trans('customer.house_no') }}*</label>
                           <input type="text"  class="form-control" placeholder="enter here" name = "billing_house_no" id = "billing_house_no">
                           <p class="error" id="error_billing_house_no"></p>
                      </div>
                     
                      <div class="form-group">
                          <label for="text">{{ trans('customer.zip_code') }}*</label>
                           <input type="text"  class="form-control" placeholder="Zip Code" name="billing_zip_code" id="billing_zip_code">
                        <p class="error" id="error_billing_zip_code"></p>
                      </div>
                      <div class="form-group">
                          <label for="text">{{ trans('customer.city') }}*</label>
                          <input type="text"  class="form-control" placeholder="enter here" name="billing_city" id="billing_city">
                          <p class="error" id="error_billing_city"></p>
                      </div>
                      <div class="form-group">
                          <label for="text">{{ trans('customer.state') }}*</label>
                          <input type="text"  class="form-control" placeholder="enter here" name="billing_state" id="billing_state">
                          <p class="error" id="error_billing_state"></p>
                      </div>
                       <div class="form-group">
                          <label for="text">{{ trans('customer.add_to_address') }}</label>
                          <input type="text"  class="form-control" placeholder="enter here" name = "billing_addition" id = "billing_addition">
                           <p class="error" id="error_billing_addition"></p>
                      </div>

                      <div class="text-right">
                          <button type= "submit" class="continue_btn">{{ trans('customer.add') }}</button>
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
                            <h5 class="modal-title" id="exampleModalLabel">{{ trans('customer.req_return') }}</h5>
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
                              <label for="desc">{{ trans('customer.describe') }}*:</label>
                              <textarea name="return_desc" id="return_desc" class="form-control"></textarea>
                              <p class="error" id="error_return_desc"></p>
                            </div>
                            
                             <div class="form-group">
                              <label for="email">{{ trans('customer.upload') }}*:</label>
                              <input type="file" name="return_image" id="return_image" accept="image/*">
                               <p class="error" id="error_return_image"></p>
                            </div>
                        </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ trans('customer.close') }}</button>
                    <button type="button" class="btn btn-primary" onclick="javascript:submitReturnRequest()">{{ trans('customer.send_req') }}</button>
                </div>
            </div>
        </div>
    </div>
    

<div class="clearfix"></div>    
<script src="{{ asset('public/js/frontend/customerarea.js') }}" type="text/javascript" ></script>


<script>
  
   $(document).ready( function () {

      $('#billingForm').on('submit', function() {
          $('#rv-Modal-billing').on('hide.bs.modal', function ( e ) {
            e.preventDefault();
          }) 
      });

  });

</script>
