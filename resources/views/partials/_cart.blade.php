@if($product_data->count() > 0)
<div class="mycart cart-rv">
        <div class="container">
            <div class="Product_qeue">
                <form id="cart-form" method = "POST" action="{{route('orders-details')}}">
                              @csrf
                <div class="w-100">
                    <div class="w-65">
                        <div class="left_productdetail">   
                            <div class="text-center quote_heading"> 
                                <p>Product list</p>
                            </div>  
 
                            <div class="product">
 
                              @if(isset($product_data)) 
                              @foreach ($product_data as $key=>$data)
 
                                <div class="product_listing">
                                    <img src="http://druckshop.trantorglobal.com/public/images/product1.jpg" alt="" width="75px" />
                                    <div class="product_description">
                                        <p class="thisproduct_head">{{$data->product}}</p>
                                        <p class="thisproduct_subhead more">{{$data->attribute_desc}}</p>
                                    </div>
                                    <ul class="product_price" id="product_price"> 
                                        <li class="inputcard_quantity" style="display: none"><h6><strong>€ <span id="price_per_product_{{$data->id}}" class = "price_per_product">{{$data->price_per_product}}</span><span class="text-muted">x</span></strong></h6>
                                            <input id ="qty_{{$data->id}}" name = "qty_{{$data->id}}" type="text" class="form-control input-sm" placeholder="" onchange ="setQuantity({{count($product_data)}});" value = "{{$data->quantity}}"><div><span id="qty_msg"></span></div>
                                        </li> 
                                        <li>
                                        {{-- <button class="remove_btn" type="button" onclick = "decrementQuantity('qty_{{$data->id}}',{{count($product_data)}})">-</button>
                                        <button class="remove_btn" type="button" onclick = "incrementQuantity('qty_{{$data->id}}',{{count($product_data)}})">+</button> --}}
                                        
                                        <button type="button" onclick="window.location='{{route('remove-item',['id'=>$data->id]) }}'" class="remove_btn" > Remove Product</button> 
                                    </li>
                                    </ul>
                                    <div class="rv-formCart" id = {{"appendContents".$key}}>
                                      <div class="rv-casualBioFields" id = {{"cloneBioFields".$key}}>
                                        <div class="form-group">
                                      <label for="text">{{ trans('cart.no_of_copies') }}*:</label>
                                     {{--  <label id="binding_price_per_product_{{$data->id}}" class = "price_per_product"></label> --}}
                                      <input type="number" id="no_of_copies" onchange="setQuantity({{count($product_data)}});InsertSplitOrder({{$data->id}} , {{$key}}, this)"; name={{"no_of_copies[".$key."]"}}  class="form-control" placeholder="{{ trans('cart.enter_here') }}" value=@if(isset($data->attribute)) <?php $array = json_decode($data->attribute); ?>  {{$array->no_of_copies}} @else {{1}} @endif >
                                      @if($errors->has('no_of_copies.'.$key))
                                      <div class="error">{{ $errors->first('no_of_copies.'.$key) }}</div>
                                      @endif 
                                    </div>
                                    <div class="form-group">
                                      <label for="pwd">{{ trans('cart.no_of_cds') }}:</label>
                                      {{-- <label id="cd_price_per_product_{{$data->id}}" class = "cd price_per_product">Price/qty: 2.00 € </label> --}}
                                      <input id="no_of_cds" type="number" name={{"no_of_cds[".$key."]"}}  class="form-control" placeholder="0" onchange="setQuantity({{count($product_data)}}); InsertSplitOrder({{$data->id}} , {{$key}} , this);" value=@if(isset($data->attribute)) <?php $array = json_decode($data->attribute); ?>  {{$array->number_of_cds}} @else {{0}} @endif>
                                       @if($errors->has('no_of_cds.'.$key))
                                      <div class="error">{{ $errors->first('no_of_cds.'.$key) }}</div>
                                      @endif
                                    </div>
                                     <div class="form-group">
                                      <label for="pwd">{{ trans('cart.ship_add') }}*:</label>
                                      <select class="form-control" name={{"shipping_address[".$key."]"}} id="address_data" onchange="displayAddress(this,'{{'ship-address-'.$key}}'); InsertSplitOrder({{$data->id}} , {{$key}} , this);"> <option value ="-1">Select</option> 
                                      @foreach($shipping_address_data as $keysss=>$shipping_address)<option value = "{{$shipping_address->first_name." ".$shipping_address->last_name .
                                        
                                       (($shipping_address->company_name) ? ", ".$shipping_address->company_name : "" )
                                       
                                       . ", ".$shipping_address->street." ".$shipping_address->house_no.", ".$shipping_address->zip_code." ".$shipping_address->city.", ".$shipping_address->state}}" @if($shipping_address->default == 1) selected @endif>{{$shipping_address->first_name." ".$shipping_address->last_name.

                                        (($shipping_address->company_name) ? ", ".$shipping_address->company_name : "" )

                                        .", ".$shipping_address->street." ".$shipping_address->house_no.", ".$shipping_address->zip_code." ".$shipping_address->city.", ".$shipping_address->state}}</option> 
                                      @endforeach
                                      </select>
                                       @if($errors->has('shipping_address.'.$key))
                                            <div class="error">{{ $errors->first('shipping_address.'.$key) }}</div>
                                            @endif
                                    </div>



                                   {{--   <div class="form-group">
                                      <label for="pwd">{{ trans('cart.bill_add') }}*:</label>
                                      <select class="form-control" name={{"billing_address[".$key."]"}} id="address_data" onchange="displayAddress(this,'{{'bill-address-'.$key}}');"> 
                                        <option value ="-1">Select</option>
                                      @foreach($billing_address_data as $keyss=>$billing_address)
                                      <option value = "{{$billing_address->first_name." ".$billing_address->last_name.", Company Name: ".$billing_address->company_name.", House No: ".$billing_address->house_no.", City: ".$billing_address->city.", State: ".$billing_address->state.", Zip Code: ".$billing_address->zip_code}}" @if($billing_address->default == 1) selected @endif>{{$billing_address->first_name." ".$billing_address->last_name.", Company Name: ".$billing_address->company_name.", House No: ".$billing_address->house_no.", City: ".$billing_address->city.", State: ".$billing_address->state.", Zip Code: ".$billing_address->zip_code}}</option> 
                                      @endforeach
                                      </select>
                                       @if($errors->has('billing_address.'.$key))
                                            <div class="error">{{ $errors->first('billing_address.'.$key) }}</div>
                                            @endif
                                    </div> --}}

                                    <div class="form-group">
                                      <label for="email">{{ trans('cart.ship_comp') }}*:</label>
                                      <select class="form-control" name={{"shipping_company[".$key."]"}} id="shipping_company" onchange = "InsertSplitOrder({{$data->id}} , {{$key}} , this);"> 
                                      <option value ="-1">Select</option>
                                      @foreach($shipping_company as $value)<option value = "{{$value->id}}">{{$value->delivery_service}}</option> @endforeach
                                      </select>
                                      @if($errors->has('shipping_company.'.$key))
                                      <div class="error">{{ $errors->first('shipping_company.'.$key) }}</div>
                                      @endif
                                    </div>

                                     <button type="button" onclick="RemoveSplitOrder({{$data->id}} , {{$key}});" class="remove_btn" > X </button> 


                                      </div>
                                      <div class="add-multi-address">
                                        <button type = "button" name="add_multi_address_click" id="{{'add_multi_address_'.$key}}" class="rv-adressesfields" onclick="splitOrder({{$data->id}} , {{$key}});">Split Your Order</button>
                                      </div>
                                      <div class="rv-manageAddressFields">
                                        <h4>{{ trans('cart.manage_add') }}</h4>
                                        <div class="rv-adressesfields">
                                         <div class="form-group">
                                            <label for="email">{{ trans('cart.ship_add') }}*:</label>
                                             <p id="{{'ship-address-'.$key}}" class="filled-shippingAdress">
                                              @foreach($shipping_address_data as $keysss=>$shipping_address)
                                              @if($shipping_address->default == 1)
                                                {{$shipping_address->first_name." ".$shipping_address->last_name.

                                                  (($shipping_address->company_name) ? ", ".$shipping_address->company_name : "" )

                                                .", ".$shipping_address->street." ".$shipping_address->house_no.", ".$shipping_address->zip_code." ".$shipping_address->city.", ".$shipping_address->state}}
                                             @endif
                                             @endforeach
                                            </p>
                                            <button type = "button" name="shipping_address_click" id="{{'shipping_address_'.$key}}" class="form-control" data-toggle="modal" data-target="#rv-Modal-shipping" data-ids = "{{$key}}" onclick="resetModal('shippingForm');">Add Shipping address</button>
                                            
                                          </div>
                                           {{-- <div class="form-group">
                                            <label for="email">{{ trans('cart.bill_add') }}*:</label>
                                            <p id="{{'bill-address-one'}}" class="filled-billingAdress">
                                             @foreach($billing_address_data as $keyss=>$billing_address)
                                             @if($billing_address->default == 1) 
                                                {{$billing_address->first_name." ".$billing_address->last_name.", Company Name: ".$billing_address->company_name.", House No: ".$billing_address->house_no.", City: ".$billing_address->city.", State: ".$billing_address->state.", Zip Code: ".$billing_address->zip_code}}
                                             @endif
                                             @endforeach
                                            </p>
                                            <button type = "button" name="billing_address_click" id="billing_address" class="form-control" data-toggle="modal" data-target="#rv-Modal-billing">Add Billing Address</button>
                                             @if($errors->has('billing_address'))
                                            <div class="error">{{ $errors->first('billing_address') }}</div>
                                            @endif
                                          </div> --}}
                                        </div>   
                                      </div>
                                      
                                     </div>
                                </div>
                                <hr>
                                @endforeach  
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="w-35">
                        <div class="right_productdetail">
                          <div class="text-center quote_heading">
                              <p>{{ trans('cart.summary') }}</p>
                          </div>
                          <div class="summary">
                              <h4>Items <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>{{count($product_data)}}</b></span></h4>
                              @foreach ($product_data as $data) 
                              <p><a href="#">{{$data->product}} </a> <span style="float: right;">{{-- € per copy --}}</span>
                                <label id="binding_price_per_product_{{$data->id}}" class = "price_per_product"></label>
                                <label id="cd_price_per_product_{{$data->id}}" class = "price_per_product">Unit Price per CD : 2.00 €</label>
                                <label id="datacheck_price_per_product_{{$data->id}}" class = "price_per_product">Data Check Price : 1.00 €</label>
                                <span id = "total_price_per_item_{{$data->id}}" class="price total_price_per_item">{{$data->price_product_qty}}</span>
                                <input type="hidden" id = "total_price_hidden" name="total_price_hidden" value="{{$data->price_product_qty}}"></p>
                             @endforeach
                              <hr style="margin-top:20%;">
                              <p>Total <span style="float: right;">€</span><span id ="checkout_total" class="price" style="color:black"><b>€</b></span></p>
                          </div>
                        </div>
                        <div class="rv-DiscountCheckout">
                        <h4>{{ trans('cart.bill_add') }}</h4>

                        <div class="form-group">
                          {{-- <label for="email">{{ trans('cart.bill_add') }}*:</label> --}}
                          <p id="{{'bill-address-one'}}" class="filled-billingAdress">
                           @foreach($billing_address_data as $keyss=>$billing_address)
                           @if($billing_address->default == 1) 
                              {{$billing_address->first_name." ".$billing_address->last_name.", ".$billing_address->company_name.", ".$billing_address->street.", ".$billing_address->house_no.", ".$billing_address->zip_code.", ".$billing_address->city.", ".$billing_address->state}}
                           @endif
                           @endforeach
                          </p>
                          <button type = "button" name="billing_address_click" id="billing_address" class="form-control" data-toggle="modal" data-target="#rv-Modal-billing">{{ trans('cart.change_bill_add') }}</button>
                           @if($errors->has('billing_address'))
                          <div class="error">{{ $errors->first('billing_address') }}</div>
                          @endif
                        </div> 
                        <div class="form-group">

                       {{--  <select class="form-control" name={{"billing_address"}} id="billing_address_data" > 
                          <option value ="-1">Select</option> --}}
                        @if(!empty($billing_address_data))
                        @foreach($billing_address_data as $keyss=>$billing_address)
                        @if($billing_address->default == 1)

                         <input type="hidden" id="billing_address_data"  name={{"billing_address"}} value = "{{$billing_address->first_name." ".$billing_address->last_name.", ".$billing_address->company_name.", ".$billing_address->street.", ".$billing_address->house_no.", ".$billing_address->zip_code.", ".$billing_address->city.", ".$billing_address->state}}">
                        {{-- <option value = "{{$billing_address->first_name." ".$billing_address->last_name.", ".$billing_address->company_name.", ".$billing_address->street.", ".$billing_address->house_no.", ".$billing_address->zip_code.", ".$billing_address->city.", ".$billing_address->state}}" @if($billing_address->default == 1) selected @endif>{{$billing_address->first_name." ".$billing_address->last_name.", ".$billing_address->company_name.", ".$billing_address->street.", ".$billing_address->house_no.", ".$billing_address->zip_code.", ".$billing_address->city.", ".$billing_address->state}}</option>  --}}
                        @endif
                        @endforeach
                        @endif
                       {{--  </select> --}}
                         @if($errors->has('billing_address'))
                              <div class="error">{{ $errors->first('billing_address.'.$key) }}</div>
                              @endif
                      </div>
  
                          <h4>{{ trans('cart.dist_code') }}</h4>
                          <div class="form-group">
                            <label for="email">{{ trans('cart.dist_detail') }}:</label>
                            <input type="text" name="code" id="code" class="form-control" placeholder="{{ trans('cart.enter_here') }}" oninput="discountCode(this);">
                            <p id = "discount-code-error"></p>
                            @if($errors->has('code'))
                            <div  class="error">{{ $errors->first('code') }}</div>
                            @endif
                          </div> 
                          
                          @if((Auth::check() && Auth::user()->name == "Guest") || ! Auth::check())
                          <div class="form-group">
                            <label for="email">{{ trans('cart.email') }}:</label>
                             <input type="text" name="email_id" id="email_id" class="form-control" placeholder="{{ trans('cart.enter_here') }}">
                              @if($errors->has('email_id'))
                              <div class="error">{{ $errors->first('email_id') }}</div>
                              @endif
                          </div>
                          @endif

                          <div class="text-right">
                              <button type= "submit" class="continue_btn">{{ trans('cart.checkout') }}</button>
                          </div>
                        </div>
                    </div>
                 
                </div> 
              </form> 
            </div>   
            <!-- <div class="cart-form-shop w-100">
                <p>Please Fill in Details</p>
                        <form method = "POST" action="{{route('orders-details')}}">
                          @csrf
                            <div class="form-group">
                              <label for="text">No of Copies*:</label>
                              <input type="text" name="no_of_copies" id="no_of_copies" class="form-control" placeholder="enter here" >
                              @if($errors->has('no_of_copies'))
                              <div class="error">{{ $errors->first('no_of_copies') }}</div>
                              @endif 
                            </div>
                            <div class="form-group">
                              <label for="pwd">No of CDS*:</label>
                              <input type="text" name="no_of_cds" id="no_of_cds" class="form-control" placeholder="enter here">
                               @if($errors->has('no_of_cds'))
                              <div class="error">{{ $errors->first('no_of_cds') }}</div>
                              @endif
                            </div>
                            <div class="form-group">
                              <label for="pwd">E-mail*:</label>
                              <input type="text" name="email_id" id="email_id" class="form-control" placeholder="enter here">
                              @if($errors->has('email_id'))
                              <div class="error">{{ $errors->first('email_id') }}</div>
                              @endif
                            </div>
                            <div class="form-group">
                              <label for="email">Shipping Company*:</label>
                              <select class="form-control" name="shipping_company" id="shipping_company" > <option value ="-1">Select</option>
                              @foreach($shipping_company as $value)<option value = "{{$value->delivery_service}}">{{$value->delivery_service}}</option> @endforeach
                              </select>
                              @if($errors->has('shipping_company'))
                              <div class="error">{{ $errors->first('shipping_company') }}</div>
                              @endif
                            </div>
                             <div class="form-group">
                              <label for="email">Dicount Code:</label>
                              <input type="text" name="code" id="code" class="form-control" placeholder="enter here">
                              @if($errors->has('code'))
                              <div class="error">{{ $errors->first('code') }}</div>
                              @endif
                            </div> 
                            <div class="form-group">
                              <label for="email">Shipping Address*:</label>
                              <textarea name="shipping_address" id="shipping_address" class="form-control"></textarea>
                               @if($errors->has('shipping_address'))
                              <div class="error">{{ $errors->first('shipping_address') }}</div>
                              @endif
                            </div>
                             <div class="form-group">
                              <label for="email">Billing Address*:</label>
                              <textarea name="billing_address" id="billing_address" class="form-control"></textarea>
                               @if($errors->has('billing_address'))
                              <div class="error">{{ $errors->first('billing_address') }}</div>
                              @endif
                            </div>
                           
                            <div class="text-right">
                                <button type= "submit" class="continue_btn">Proceed to Checkout</button>
                            </div>
                        </form>
                    </div>      -->
        </div>
    </div>


<!-- =============== modal form  =============== -->

<!-- Modal -->
<div class="modal fade rv-modalFormCustom" id="rv-Modal-shipping" role="dialog">
    <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">{{ trans('cart.add_ship_add') }}</h4> 
          </div>
          <div class="modal-body">
             <div class="cart-form-shop w-100">
               <form method = "POST"  id = "shippingForm">
                      <div class="form-group">
                          <label for="text">{{ trans('cart.first_name') }}*</label>
                        <input type="text" class="form-control" placeholder="{{ trans('cart.enter_here') }}" name="shipping_first_name" id="shipping_first_name">
                          <p class="error" id="error_shipping_first_name"></p>
                      </div>
                      <div class="form-group">
                          <label for="text">{{ trans('cart.last_name') }}*</label>
                          <input type="text"  class="form-control" placeholder="{{ trans('cart.enter_here') }}" name="shipping_last_name" id="shipping_last_name">
                            <p class="error" id="error_shipping_last_name"></p>
                      </div>
                      <div class="form-group w-100">
                          <label for="text">{{ trans('cart.company') }}</label>
                          <input type="text"  class="form-control" placeholder="{{ trans('cart.enter_here') }}" name = "shipping_company_name" id = "shipping_company_name">
                      </div>
                      <div class="form-group">
                          <label for="text">{{ trans('cart.street') }}*</label>
                          <input type="text"  class="form-control" placeholder="{{ trans('cart.enter_here') }}" name = "shipping_street" id = "shipping_street">
                            <p class="error" id="error_shipping_street"></p>
                      </div>
                       <div class="form-group">
                           <label for="text">{{ trans('cart.house_no') }}*</label>
                           <input type="text"  class="form-control" placeholder="{{ trans('cart.enter_here') }}" name = "shipping_house_no" id = "shipping_house_no">
                           <p class="error" id="error_shipping_house_no"></p>
                      </div>
                      <div class="form-group">
                          <label for="text">{{ trans('cart.zip_code') }}*</label>
                          <input type="text"  class="form-control" placeholder="{{ trans('cart.enter_here') }}" name="shipping_zip_code" id="shipping_zip_code">
                        <p class="error" id="error_shipping_zip_code"></p>
                      </div>
                      <div class="form-group">
                          <label for="text">{{ trans('cart.city') }}*</label>
                          <input type="text"  class="form-control" placeholder="{{ trans('cart.enter_here') }}" name="shipping_city" id="shipping_city">
                           <p class="error" id="error_shipping_city"></p>
                      </div>
                      <div class="form-group">
                          <label for="text">{{ trans('cart.state') }}*</label>
                          <input type="text"  class="form-control" placeholder="{{ trans('cart.enter_here') }}" name="shipping_state" id="shipping_state">
                          <p class="error" id="error_shipping_state"></p>
                      </div>
                       <div class="form-group">
                          <label for="text">{{ trans('cart.add_to_address') }}</label>
                          <input type="text"  class="form-control" placeholder="{{ trans('cart.enter_here') }}" name = "shipping_addition" id = "shipping_addition">
                      </div>

                      <div class="text-right">
                          <button type= "submit" class="continue_btn">{{ trans('cart.add') }}</button>
                      </div>

                      <p id = "success-msg" style="color:green;"></p>
               </form>

            </div>   
          </div>
      </div>
  </div>
</div>
 

<!-- Modal -->
<div class="modal fade rv-modalFormCustom" id="rv-Modal-billing" role="dialog">
    <div class="modal-dialog">
       <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">{{ trans('cart.add_bill_add') }}</h4>
          </div>
          <div class="modal-body">
             <div class="cart-form-shop w-100">
               <form method = "POST" action="javascript:addAddress('billing');" id = "billingForm"> 
                @if(! empty($billing_address_data))
                 @foreach($billing_address_data as $keyss=>$billing_address)
                        @if($billing_address->default == 1)
                      <div class="form-group"> 
                          <label for="text">{{ trans('cart.first_name') }}*</label>
                        <input type="text" class="form-control" placeholder="{{ trans('cart.enter_here') }}" name="billing_first_name" id="billing_first_name" value="{{$billing_address->first_name}}">
                        <p class="error" id="error_billing_first_name"></p>
                      </div>
                      <div class="form-group">
                          <label for="text">{{ trans('cart.last_name') }}*</label>
                          <input type="text"  class="form-control" placeholder="{{ trans('cart.enter_here') }}" name="billing_last_name" id="billing_last_name" value="{{$billing_address->last_name}}">
                           <p class="error" id="error_billing_last_name"></p>
                      </div>
                      <div class="form-group w-100">
                          <label for="text">{{ trans('cart.company') }}</label>
                          <input type="text"  class="form-control" placeholder="{{ trans('cart.enter_here') }}" name = "billing_company_name" id = "billing_company_name" value="{{$billing_address->company_name}}">
                           <p class="error" id="error_billing_company_name"></p>
                      </div>
                      <div class="form-group">
                          <label for="text">{{ trans('cart.street') }}*</label>
                          <input type="text"  class="form-control" placeholder="{{ trans('cart.enter_here') }}" name = "billing_street"  id = "billing_street" value="{{$billing_address->street}}">
                          <p class="error" id="error_billing_street"></p>
                      </div>
                       <div class="form-group">
                           <label for="text">{{ trans('cart.house_no') }}*</label>
                           <input type="text"  class="form-control" placeholder="{{ trans('cart.enter_here') }}" name = "billing_house_no" id = "billing_house_no" value="{{$billing_address->house_no}}">
                           <p class="error" id="error_billing_house_no"></p>
                      </div>
                     
                      <div class="form-group">
                          <label for="text">{{ trans('cart.zip_code') }}*</label>
                           <input type="text"  class="form-control" placeholder="ename="billing_zip_code" id="billing_zip_code" value="{{$billing_address->zip_code}}">
                        <p class="error" id="error_billing_zip_code"></p>
                      </div>
                      <div class="form-group">
                          <label for="text">{{ trans('cart.city') }}*</label>
                          <input type="text"  class="form-control" placeholder="{{ trans('cart.enter_here') }}" name="billing_city" id="billing_city" value="{{$billing_address->city}}">
                          <p class="error" id="error_billing_city"></p>
                      </div>
                      <div class="form-group">
                          <label for="text">{{ trans('cart.state') }}*</label>
                          <input type="text"  class="form-control" placeholder="{{ trans('cart.enter_here') }}" name="billing_state" id="billing_state" value="{{$billing_address->state}}">
                          <p class="error" id="error_billing_state"></p>
                      </div>
                       <div class="form-group">
                          <label for="text">{{ trans('cart.add_to_address') }}</label>
                          <input type="text"  class="form-control" placeholder="{{ trans('cart.enter_here') }}" name = "billing_addition" id = "billing_addition" value="{{$billing_address->addition}}">
                           <p class="error" id="error_billing_addition"></p>
                      </div>

                      <div class="text-right">
                          <button type= "submit" class="continue_btn">{{ trans('cart.add') }}</button>
                      </div>
                      @endif
                      @endforeach 
                      @else
                       <div class="form-group"> 
                          <label for="text">{{ trans('cart.first_name') }}*</label>
                        <input type="text" class="form-control" placeholder="{{ trans('cart.enter_here') }}" name="billing_first_name" id="billing_first_name" value="">
                        <p class="error" id="error_billing_first_name"></p>
                      </div>
                      <div class="form-group">
                          <label for="text">{{ trans('cart.last_name') }}*</label>
                          <input type="text"  class="form-control" placeholder="{{ trans('cart.enter_here') }}" name="billing_last_name" id="billing_last_name" value="">
                           <p class="error" id="error_billing_last_name"></p>
                      </div>
                      <div class="form-group w-100">
                          <label for="text">{{ trans('cart.company') }}</label>
                          <input type="text"  class="form-control" placeholder="{{ trans('cart.enter_here') }}" name = "billing_company_name" id = "billing_company_name" value="">
                           <p class="error" id="error_billing_company_name"></p>
                      </div>
                      <div class="form-group">
                          <label for="text">{{ trans('cart.street') }}*</label>
                          <input type="text"  class="form-control" placeholder="{{ trans('cart.enter_here') }}" name = "billing_street"  id = "billing_street" value="">
                          <p class="error" id="error_billing_street"></p>
                      </div>
                       <div class="form-group">
                           <label for="text">{{ trans('cart.house_no') }}*</label>
                           <input type="text"  class="form-control" placeholder="{{ trans('cart.enter_here') }}" name = "billing_house_no" id = "billing_house_no" value="">
                           <p class="error" id="error_billing_house_no"></p>
                      </div>
                     
                      <div class="form-group">
                          <label for="text">{{ trans('cart.zip_code') }}*</label>
                           <input type="text"  class="form-control" placeholder="ename="billing_zip_code" id="billing_zip_code" value="">
                        <p class="error" id="error_billing_zip_code"></p>
                      </div>
                      <div class="form-group">
                          <label for="text">{{ trans('cart.city') }}*</label>
                          <input type="text"  class="form-control" placeholder="{{ trans('cart.enter_here') }}" name="billing_city" id="billing_city" value="">
                          <p class="error" id="error_billing_city"></p>
                      </div>
                      <div class="form-group">
                          <label for="text">{{ trans('cart.state') }}*</label>
                          <input type="text"  class="form-control" placeholder="{{ trans('cart.enter_here') }}" name="billing_state" id="billing_state" value="">
                          <p class="error" id="error_billing_state"></p>
                      </div>
                       <div class="form-group">
                          <label for="text">{{ trans('cart.add_to_address') }}</label>
                          <input type="text"  class="form-control" placeholder="{{ trans('cart.enter_here') }}" name = "billing_addition" id = "billing_addition" value="">
                           <p class="error" id="error_billing_addition"></p>
                      </div>

                      <div class="text-right">
                          <button type= "submit" class="continue_btn">{{ trans('cart.add') }}</button>
                      </div>
                      @endif

                       <p id = "success-msg" style="color:green;"></p>
               </form>
            </div>   
          </div> 
      </div> 
  </div>
</div>
@else

<p class = "empty-cart">Your Cart is Empty.<p>
@endif

<script src="{{ asset('public/js/frontend/checkout.js') }}" type="text/javascript" ></script>
<script src="{{ asset('public/js/frontend/dragdrop.js') }}" type="text/javascript" ></script>

<script>
  $(document).ready( function () {

    setQuantity({{count($product_data)}});


    $('#rv-Modal-shipping').on('show.bs.modal', function(e) {
      //get data-id attribute of the clicked element
      var Id = $(e.relatedTarget).data('ids');
      $('#shippingForm').attr('action', "javascript:addAddress('shipping','ship-address-"+Id+"','shipping_address["+Id+"]')");
    });


        $('#shippingForm').on('submit', function() {
          $('#rv-Modal-shipping').on('hide.bs.modal', function ( e ) {
            e.preventDefault();
          }) 
      });


      $('#billingForm').on('submit', function() {
          $('#rv-Modal-billing').on('hide.bs.modal', function ( e ) {
            e.preventDefault();
          }) 
      });


  });


function resetModal(form = ""){

  $('form#shippingForm').trigger("reset");
  $('form#shippingForm').trigger("change");
  $('#success-msg').text('');  
  $('#error_shipping_first_name').text('');
  $('#error_shipping_last_name').text('');  
  $('#shipping_company_name').text('');  
  $('#error_shipping_street').text('');  
  $('#error_shipping_house_no').text('');  
  $('#error_shipping_zip_code').text('');  
  $('#error_shipping_city').text('');  
  $('#error_shipping_state').text('');  

}


</script>

<script>
$(document).ready(function() {



  var showChar = 100;
  var ellipsestext = "..."; 
  var moretext = "Read more";
  var lesstext = "Read less";
  $('.more').each(function() {
    var content = $(this).html();

    if(content.length > showChar) {

      var c = content.substr(0, showChar);
      var h = content.substr(showChar-1, content.length - showChar);

      var html = c + '<span class="moreelipses">'+ellipsestext+'</span>&nbsp;<span class="morecontent"><span>' + h + '</span><a href="" class="morelink">'+moretext+'</a></span>';

      $(this).html(html);
    }

  });

  $(".morelink").click(function(){
    if($(this).hasClass("less")) {
      $(this).removeClass("less");
      $(this).html(moretext);
    } else {
      $(this).addClass("less"); 
      $(this).html(lesstext);
    } 
    $(this).parent().prev().toggle(); 
    $(this).prev().toggle(); 
    return false; 
  }); 

});  

 
function displayAddress(select="", address=""){  

 var ship_address=$(select).children("option:selected").val();  //alert(ship_address);

  $("[id='"+address+"']").empty();
  $("[id='"+address+"']").text(ship_address);

  //document.getElementById(address).innerHTML = ship_address ;

}


function discountCode(code = ""){

  var code = ($(code).val()).trim();  

  if(code == ''){

     $('#discount-code-error').text('');

  }else{

    $.ajax({
    url: base_url+'/get-discount-code-status', 
    type: 'GET', 
    data: {'code':code},
    success: function (response){
        var data = JSON.parse(response); 
         if(data == true){  //alert("T");

          $('#discount-code-error').text('The Discount Code Applied Successfully');
          $('#discount-code-error').css('color','black');

         }else if(data == false){  // alert("F");
          $('#discount-code-error').css('color','red');
           $('#discount-code-error').text('The Discount Code is Invalid');
         }else if(data == ''){

          $('#discount-code-error').text('');

         } 
    }
  });

  } 
 
}


</script>

<style>
a.morelink {
  text-decoration:none;
  outline: none;
}
.morecontent span {
  display: none;

}

div#rv-Modal {
    z-index: 99999999;
}

</style>



