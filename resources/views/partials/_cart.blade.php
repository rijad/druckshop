  @if($product_data->count() > 0)
  <div class="mycart cart-rv">
          <div class="container">
              <div id="order-alerts"></div>

              <div class="Product_qeue">
                  <form id="cart-form" method = "POST" action="{{route('orders-details')}}">
                                @csrf
                  <div class="w-100">
                      <div class="w-65">
                          <div class="left_productdetail">   
                              <div class="text-center quote_heading"> 
                                  <p>{{ trans('cart.product_list') }}</p>
                              </div>  

   
                              <div class="product">
   
                                @if(isset($product_data)) 
                                @foreach ($product_data as $key=>$data) 


                                              <div class="product_listing">
                                                  <img src="http://druckshop.trantorglobal.com/public/images/product1.jpg" alt="" width="75px" />
                                                  <div class="product_description">
                                                      <p class="thisproduct_head">{{$data->product}}</p>
                                                      <p id="thisproduct_subhead" class="thisproduct_subhead more">{{$data->attribute_desc}}</p>
                                                  </div>
                                                  <ul class="product_price" id="product_price"> 
                                                      <li class="inputcard_quantity" style="display: none"><h6><strong>€ <span id="price_per_product_{{$data->id}}" class = "price_per_product">{{$data->price_per_product}}</span><span class="text-muted">x</span></strong></h6></li> 
                                                      <li><button type="button" onclick="window.location='{{route('remove-item',['id'=>$data->id]) }}'" class="remove_btn" > {{ trans('cart.remove') }}</button></li>
                                                  </ul>
                                                  <div class="rv-formCart" id = {{"appendContents".$key}}>

             
                                                    {{-- all odl data --}}
                                                    @if(isset($split_record_unique_id) && count($split_record_unique_id) != 0 )

                                                         @php $is_found = 0  @endphp
                                                          
                                                          @foreach($split_record_unique_id as $split_key => $split_orders)

                                                          @if($is_found == 1) @break; @endif

                                                                  @if($data->id == $split_key)   

                                                                      @php $is_found = 1;
                                                                            $counter = 0;
                                                                      @endphp
                                                                
                                                                       @foreach($split_orders as $plit_order_id => $split_details)

                                                                                  <div class="rv-casualBioFields" id = {{"cloneBioFields_".$key}} name = {{"cloneBioFields_".$split_details['prod_sequence']."_".$split_details['sequence']}}>

                                                                                    <div class="form-group">
                                                                                  <label for="text">{{ trans('cart.no_of_copies') }}*:</label>

                                                                                 <input type="hidden" id = "{{'sequence_'.$split_details['prod_sequence']}}" value="0" name={{"sequence_".$split_details['prod_sequence']."_".$split_details['sequence']}}>
                                                                                  <input type="number" id="no_of_copies" min="0" onchange="InsertSplitOrder({{$data->id}} , {{$split_details['sequence']}}, this,{{$split_details['prod_sequence']}}); setTimeout(function(){ setQuantity({{count($product_data)}}) },2000);" name={{"no_of_copies[".$split_details['prod_sequence'].'_'.$split_details['sequence']."]"}}  class="form-control" placeholder="{{ trans('cart.enter_here') }}" value="{{$split_details['no_of_copies']}}" >
                                                                                  @if($errors->has('no_of_copies.'.$split_details['prod_sequence']))
                                                                                  <div class="error">{{ $errors->first('no_of_copies.'.$split_details['prod_sequence']) }}</div>
                                                                                  @endif 
                                                                                </div>
                                                                                <div class="form-group">
                                                                                  <label for="pwd">{{ trans('cart.no_of_cds') }}:</label>

                                                                                  <input id="no_of_cds" type="number" min="0" name={{"no_of_cds[".$split_details['prod_sequence'].'_'.$split_details['sequence']."]"}} class="form-control" placeholder="0" onchange="InsertSplitOrder({{$data->id}} , {{$split_details['sequence']}} , this ,{{$split_details['prod_sequence']}}); setTimeout(function(){ setQuantity({{count($product_data)}}) },2000)" value= @if(isset($data->no_of_cds) || ! is_nan($data->no_of_cds)) {{$split_details['no_of_cds']}} @else {{0}} @endif @if($split_details['no_of_cds'] <=0) {{"readonly"}}  @endif>
                                                                                   @if($errors->has('no_of_cds.'.$split_details['prod_sequence']))
                                                                                  <div class="error">{{ $errors->first('no_of_cds.'.$split_details['prod_sequence']) }}</div>
                                                                                  @endif
                                                                                </div>
                                                                                 <div class="form-group">
                                                                                  <label for="pwd">{{ trans('cart.ship_add') }}*:</label>
                                                                                  <select class="form-control" name={{"shipping_address[".$split_details['prod_sequence'].'_'.$split_details['sequence']."]"}} id="address_data" onchange="displayAddress(this,'{{'ship-address-'.$split_details['prod_sequence']}}'); InsertSplitOrder({{$data->id}} , {{$split_details['sequence']}} , this ,{{$split_details['prod_sequence']}} );"> <option value ="-1">{{ trans('cart.select') }}</option> 
                                                                                  @foreach($shipping_address_data as $keysss=>$shipping_address)<option value = "{{$shipping_address->first_name." ".$shipping_address->last_name .
                                                                                    
                                                                                   (($shipping_address->company_name) ? ", ".$shipping_address->company_name : "" )
                                                                                   
                                                                                   . ", ".$shipping_address->street." ".$shipping_address->house_no.", ".$shipping_address->zip_code." ".$shipping_address->city.", ".$shipping_address->state}}" @if($shipping_address->default == 1) selected @endif>{{$shipping_address->first_name." ".$shipping_address->last_name.

                                                                                    (($shipping_address->company_name) ? ", ".$shipping_address->company_name : "" )

                                                                                    .", ".$shipping_address->street." ".$shipping_address->house_no.", ".$shipping_address->zip_code." ".$shipping_address->city.", ".$shipping_address->state}}</option> 
                                                                                  @endforeach
                                                                                  </select>
                                                                                   @if($errors->has('shipping_address.'.$split_details['prod_sequence'].'_'.$split_details['sequence']))
                                                                                        <div class="error">{{ $errors->first('shipping_address.'.$split_details['prod_sequence'].'_'.$split_details['sequence']) }}</div>
                                                                                        @endif
                                                                                </div>

                                                                                <div class="form-group">
                                                                                  <label for="email">{{ trans('cart.ship_comp') }}*:</label>
                                                                                  <select class="form-control" name={{"shipping_company[".$split_details['prod_sequence'].'_'.$split_details['sequence']."]"}} id="shipping_company" onchange = "InsertSplitOrder({{$data->id}} , {{$split_details['sequence']}} , this ,{{$split_details['prod_sequence']}});"> 
                                                                                  <option value ="-1">{{ trans('cart.select') }}</option>
                                                                                  @foreach($shipping_company as $value)<option value = "{{$value->id}}" @if($value->id == $split_details['shipping_company']) {{"selected"}} @endif>{{$value->delivery_service}}</option> 
                                                                                  @endforeach
                                                                                  </select>
                                                                                  @if($errors->has('shipping_company.'.$split_details['prod_sequence'].'_'.$split_details['sequence']))
                                                                                  <div class="error">{{ $errors->first('shipping_company.'.$split_details['prod_sequence'].'_'.$split_details['sequence']) }}</div>
                                                                                  @endif
                                                                                </div>

                                                                                 @if($counter != 0)
              
                                                                                 <button type="button"  id = {{'remove_split_order_'.$split_details['prod_sequence']}} onclick="RemoveSplitOrder({{$data->id}} , {{$key}}, {{$split_details['sequence']}});" class="remove_btn displayBlock" > X </button> 

                                                                                 @else

                                                                                 <button type="button"  id = {{'remove_split_order_'.$split_details['prod_sequence']}} onclick="RemoveSplitOrder({{$data->id}} , {{$key}}, {{$split_details['sequence']}});" class="remove_btn displayNone" > X </button> 

                                                                                 @endif


                                                                                @php $counter = $counter + 1;  @endphp

                                                                              

                                                                                  </div>
                                                                                  

                                                                          @endforeach                        

                                                                   @endif
                                                              @endforeach

                                                              {{-- All old + New --}}

                                                              @if($is_found == 0)

                                                                            <div class="rv-casualBioFields" id = {{"cloneBioFields_".$key}} name = {{"cloneBioFields_".$key."_".'0'}}>

                                                                                    <div class="form-group">
                                                                                  <label for="text">{{ trans('cart.no_of_copies') }}*:</label>
                                                                                
                                                                                 <input type="hidden" id = "{{'sequence_'.$key}}" value="0" name={{"sequence_".$key."_0"}}>
                                                                                  <input type="number" id="no_of_copies" min="0" onchange="InsertSplitOrder({{$data->id}} , 0, this,{{$key}}); setTimeout(function(){ setQuantity({{count($product_data)}}) },2000);" name={{"no_of_copies[".$key.'_'.'0'."]"}}  class="form-control" placeholder="{{ trans('cart.enter_here') }}" value={{$data->no_of_copies}} >
                                                                                  @if($errors->has('no_of_copies.'.$key))
                                                                                  <div class="error">{{ $errors->first('no_of_copies.'.$key) }}</div>
                                                                                  @endif 
                                                                                </div>
                                                                                <div class="form-group">
                                                                                  <label for="pwd">{{ trans('cart.no_of_cds') }}:</label>
                                                                                 
                                                                                  <input id="no_of_cds" type="number" min="0" name={{"no_of_cds[".$key.'_'.'0'."]"}} class="form-control" placeholder="0" onchange="InsertSplitOrder({{$data->id}} , 0 , this ,{{$key}}); setTimeout(function(){ setQuantity({{count($product_data)}}) },2000)" value= @if(isset($data->no_of_cds) || ! is_nan($data->no_of_cds)) {{$data->no_of_cds}} @else {{0}} @endif @if($data->no_of_cds <=0) {{"readonly"}}  @endif>
                                                                                   @if($errors->has('no_of_cds.'.$key))
                                                                                  <div class="error">{{ $errors->first('no_of_cds.'.$key) }}</div>
                                                                                  @endif
                                                                                </div>
                                                                                 <div class="form-group">
                                                                                  <label for="pwd">{{ trans('cart.ship_add') }}*:</label>
                                                                                  <select class="form-control" name={{"shipping_address[".$key.'_'.'0'."]"}} id="address_data" onchange="displayAddress(this,'{{'ship-address-'.$key}}'); InsertSplitOrder({{$data->id}} , 0 , this ,{{$key}} );"> <option value ="-1">{{ trans('cart.select') }}</option> 
                                                                                  @foreach($shipping_address_data as $keysss=>$shipping_address)<option value = "{{$shipping_address->first_name." ".$shipping_address->last_name .
                                                                                    
                                                                                   (($shipping_address->company_name) ? ", ".$shipping_address->company_name : "" )
                                                                                   
                                                                                   . ", ".$shipping_address->street." ".$shipping_address->house_no.", ".$shipping_address->zip_code." ".$shipping_address->city.", ".$shipping_address->state}}" @if($shipping_address->default == 1) selected @endif>{{$shipping_address->first_name." ".$shipping_address->last_name.

                                                                                    (($shipping_address->company_name) ? ", ".$shipping_address->company_name : "" )

                                                                                    .", ".$shipping_address->street." ".$shipping_address->house_no.", ".$shipping_address->zip_code." ".$shipping_address->city.", ".$shipping_address->state}}</option> 
                                                                                  @endforeach
                                                                                  </select>
                                                                                   @if($errors->has('shipping_address.'.$key.'_'.$key))
                                                                                        <div class="error">{{ $errors->first('shipping_address.'.$key.'_'.$key) }}</div>
                                                                                        @endif
                                                                                </div>


                                                                                <div class="form-group">
                                                                                  <label for="email">{{ trans('cart.ship_comp') }}*:</label>
                                                                                  <select class="form-control" name={{"shipping_company[".$key.'_'.'0'."]"}} id="shipping_company" onchange = "InsertSplitOrder({{$data->id}} , 0 , this ,{{$key}});"> 
                                                                                  <option value ="-1">{{ trans('cart.select') }}</option>
                                                                                  @foreach($shipping_company as $value)<option value = "{{$value->id}}">{{$value->delivery_service}}</option> @endforeach
                                                                                  </select>
                                                                                  @if($errors->has('shipping_company.'.$key.'_'.$key))
                                                                                  <div class="error">{{ $errors->first('shipping_company.'.$key.'_'.$key) }}</div>
                                                                                  @endif
                                                                                </div>

                                                                              
            
                                                                                 <button type="button"  id = {{'remove_split_order_'.$key}} onclick="RemoveSplitOrder({{$data->id}} , {{$key}}, 0);" class="remove_btn displayNone" > X </button> 
                                                                               

                                                                                  </div>  


                                                              @endif
                                                                
                                                    @elseif( ! isset($split_record_unique_id) || count($split_record_unique_id) == 0 )  

                                                     

                                                                      <div class="rv-casualBioFields" id = {{"cloneBioFields_".$key}} name = {{"cloneBioFields_".$key."_".'0'}}>


                                                                      {{-- <input type="hidden" id = {{"total_cds_after_split".$key}} value="0" name={{"total_cds_after_split".$key}}>
                                                                      <input type="hidden" id = {{"total_copies_after_split".$key}} value="0" name={{"total_copies_after_split".$key}}> --}}


                                                                        <div class="form-group">
                                                                      <label for="text">{{ trans('cart.no_of_copies') }}*:</label>
                                                                     {{--  <label id="binding_price_per_product_{{$data->id}}" class = "price_per_product"></label> --}}
                                                                     <input type="hidden" id = "{{'sequence_'.$key}}" value="0" name={{"sequence_".$key."_0"}}>
                                                                      <input type="number" id="no_of_copies" min="0" onchange="InsertSplitOrder({{$data->id}} , 0, this,{{$key}}); setTimeout(function(){ setQuantity({{count($product_data)}}) },2000);" name={{"no_of_copies[".$key.'_'.'0'."]"}}  class="form-control" placeholder="{{ trans('cart.enter_here') }}" value={{$data->no_of_copies}} >
                                                                      @if($errors->has('no_of_copies.'.$key))
                                                                      <div class="error">{{ $errors->first('no_of_copies.'.$key) }}</div>
                                                                      @endif 
                                                                    </div>
                                                                    <div class="form-group">
                                                                      <label for="pwd">{{ trans('cart.no_of_cds') }}:</label>
                                                                      {{-- <label id="cd_price_per_product_{{$data->id}}" class = "cd price_per_product">Price/qty: 2.00 € </label> --}}
                                                                      <input id="no_of_cds" type="number" min="0" name={{"no_of_cds[".$key.'_'.'0'."]"}}  class="form-control" placeholder="0" onchange="InsertSplitOrder({{$data->id}} , 0 , this ,{{$key}}); setTimeout(function(){ setQuantity({{count($product_data)}}) },2000)" value= @if(isset($data->no_of_cds) || ! is_nan($data->no_of_cds)) {{$data->no_of_cds}} @else {{0}} @endif @if($data->no_of_cds <=0) {{"readonly"}}  @endif>
                                                                       @if($errors->has('no_of_cds.'.$key))
                                                                      <div class="error">{{ $errors->first('no_of_cds.'.$key) }}</div>
                                                                      @endif
                                                                    </div>
                                                                     <div class="form-group">
                                                                      <label for="pwd">{{ trans('cart.ship_add') }}*:</label>
                                                                      <select class="form-control" name={{"shipping_address[".$key.'_'.'0'."]"}} id="address_data" onchange="displayAddress(this,'{{'ship-address-'.$key}}'); InsertSplitOrder({{$data->id}} , 0 , this ,{{$key}} );"> <option value ="-1">{{ trans('cart.select') }}</option> 
                                                                      @foreach($shipping_address_data as $keysss=>$shipping_address)<option value = "{{$shipping_address->first_name." ".$shipping_address->last_name .
                                                                        
                                                                       (($shipping_address->company_name) ? ", ".$shipping_address->company_name : "" )
                                                                       
                                                                       . ", ".$shipping_address->street." ".$shipping_address->house_no.", ".$shipping_address->zip_code." ".$shipping_address->city.", ".$shipping_address->state}}" @if($shipping_address->default == 1) selected @endif>{{$shipping_address->first_name." ".$shipping_address->last_name.

                                                                        (($shipping_address->company_name) ? ", ".$shipping_address->company_name : "" )

                                                                        .", ".$shipping_address->street." ".$shipping_address->house_no.", ".$shipping_address->zip_code." ".$shipping_address->city.", ".$shipping_address->state}}</option> 
                                                                      @endforeach
                                                                      </select>
                                                                       @if($errors->has('shipping_address.'.$key.'_'.$key))
                                                                            <div class="error">{{ $errors->first('shipping_address.'.$key.'_'.$key) }}</div>
                                                                            @endif
                                                                    </div>



                                                                   {{--   <div class="form-group">
                                                                      <label for="pwd">{{ trans('cart.bill_add') }}*:</label>
                                                                      <select class="form-control" name={{"billing_address[".$key."]"}} id="address_data" onchange="displayAddress(this,'{{'bill-address-'.$key}}');"> 
                                                                        <option value ="-1">{{ trans('cart.select') }}</option>
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
                                                                      <select class="form-control" name={{"shipping_company[".$key.'_'.'0'."]"}} id="shipping_company" onchange = "InsertSplitOrder({{$data->id}} , 0 , this ,{{$key}});"> 
                                                                      <option value ="-1">{{ trans('cart.select') }}</option>
                                                                      @foreach($shipping_company as $value)<option value = "{{$value->id}}">{{$value->delivery_service}}</option> @endforeach
                                                                      </select>
                                                                      @if($errors->has('shipping_company.'.$key.'_'.$key))
                                                                      <div class="error">{{ $errors->first('shipping_company.'.$key.'_'.$key) }}</div>
                                                                      @endif
                                                                    </div>

                                                                    

                                                                     <button type="button"  id = {{'remove_split_order_'.$key}} onclick="RemoveSplitOrder({{$data->id}} , {{$key}}, 0);" class="remove_btn displayNone" > X </button> 

                                                                  


                                                                      </div>   
                                                    
             
                                                     @endif
                                                

                                                    <div class="add-multi-address">
                                                      <button type = "button" name="add_multi_address_click" id="{{'add_multi_address_'.$key}}" class="rv-adressesfields" onclick="splitOrder({{$data->id}} , {{$key}} , {{count($product_data)}});">{{ trans('cart.split_order') }}</button>
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
                                              <button type = "button" name="shipping_address_click" id="{{'shipping_address_'.$key}}" class="form-control" data-toggle="modal" data-target="#rv-Modal-shipping" data-ids = "{{$key}}" onclick="resetModal('shippingForm'); enableFormButton();">{{ trans('cart.add_ship_add') }}</button>
                                              
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
                                              <button type = "button" name="billing_address_click" id="billing_address" class="form-control" data-toggle="modal" data-target="#rv-Modal-billing">{{ trans('cart.add_bill_add') }}</button>
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
                                <h4>{{ trans('cart.item') }} <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>{{count($product_data)}}</b></span></h4>
                                @foreach ($product_data as $data) 
                                <p><a href="#">{{$data->product}} </a> <span style="float: right;">{{-- € per copy --}}</span>
                                  <label id="binding_price_per_product_{{$data->id}}" class = "price_per_product"></label>

                                  <label id="cd_price_per_product_{{$data->id}}" class = "price_per_product">{{ trans('cart.price_cd') }} : {{ number_format($data->cd_dvd_unit_price,2)}} €</label>
                                  <label id="datacheck_price_per_product_{{$data->id}}" class = "price_per_product">{{ trans('cart.price_data') }} : 1.00 €</label>

                                  <span id = "total_price_per_item_{{$data->id}}" class="price total_price_per_item">{{$data->price_product_qty}}</span>
                                  <input type="hidden" id = "total_price_hidden" name="total_price_hidden" value="{{$data->price_product_qty}}"></p>
                               @endforeach
                                <hr style="margin-top:20%;">
                                <p>{{ trans('cart.total') }} <span style="float: right;">€</span><span id ="checkout_total" class="price" style="color:black"><b>€</b></span></p>
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
                            <option value ="-1">{{ trans('cart.select') }}</option> --}}
                          @if(!empty($billing_address_data))
                          @foreach($billing_address_data as $keyss=>$billing_address)
                          @if($billing_address->default == 1)

                           <input type="hidden" id="billing_address_hidden"  name="billing_address" value = "{{$billing_address->first_name." ".$billing_address->last_name.", ".$billing_address->company_name.", ".$billing_address->street.", ".$billing_address->house_no.", ".$billing_address->zip_code.", ".$billing_address->city.", ".$billing_address->state}}">
                          {{-- <option value = "{{$billing_address->first_name." ".$billing_address->last_name.", ".$billing_address->company_name.", ".$billing_address->street.", ".$billing_address->house_no.", ".$billing_address->zip_code.", ".$billing_address->city.", ".$billing_address->state}}" @if($billing_address->default == 1) selected @endif>{{$billing_address->first_name." ".$billing_address->last_name.", ".$billing_address->company_name.", ".$billing_address->street.", ".$billing_address->house_no.", ".$billing_address->zip_code.", ".$billing_address->city.", ".$billing_address->state}}</option>  --}}
                          
                          @endif
                          @endforeach
                          @else
                          <input type="hidden" id="billing_address_hidden"  name="billing_address" value="">
                          @endif

                            
                         {{--  </select> --}}
                           @if($errors->has('billing_address'))
                                <div class="error">{{ $errors->first('billing_address.'.$key) }}</div>
                                @endif
                        </div>

                        @if (Auth::check() && Auth::user()->name != "Guest")
    
                            <h4>{{ trans('cart.dist_code') }}</h4>
                            <div class="form-group">
                              <label for="email">{{ trans('cart.dist_detail') }}:</label>
                              <input type="text" name="code" id="code" class="form-control" placeholder="{{ trans('cart.enter_here') }}" oninput="discountCode(this);">
                             {{--  <p id = "discount-code-error">{{ $errors->first('code') }}</p> --}}
                              @if($errors->has('code'))
                              <p class="error" id = "discount-code-error">{{ $errors->first('code') }}</p>
                              @endif
                            </div> 

                        @endif    
                            
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
                            <button type= "submit" id="modal-button-shipping" class="continue_btn">{{ trans('cart.add') }}</button>
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
                             <input type="text"  class="form-control" placeholder="{{ trans('cart.enter_here') }}" name="billing_zip_code" id="billing_zip_code" value="{{$billing_address->zip_code}}">
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
                            <button type= "submit" id="modal-button-billing" class="continue_btn">{{ trans('cart.add') }}</button>
                        </div>
                        @endif

                         <p id = "success-msg-billing" style="color:green;"></p>
                 </form>
              </div>   
            </div> 
        </div> 
    </div>
  </div>
  @else  
   
  <p class = "empty-cart">Your Cart is Empty.<p>
  @endif

  <?php
    $lang_text = json_encode(trans('cart'));
   ?>
<script type="text/javascript">var lang_text = JSON.parse('<?= $lang_text ?>') </script>

  <script src="{{ asset('public/js/frontend/checkout.js') }}" type="text/javascript" ></script>
  <script src="{{ asset('public/js/frontend/dragdrop.js') }}" type="text/javascript" ></script>

  <script>
    $(document).ready( function () {

      //clearSplitOrderTable();

       setTimeout(function(){
          var n = $("[id='no_of_copies']");
          n.each(function(e) {  
            $(this).trigger('onchange');
          });
       }, 270);  

      setTimeout(function(){ var l = $("[id='no_of_cds']");
        l.each(function(e) { 
          $(this).trigger('onchange');
        }); 
       }, 770);  

        setTimeout(function(){   

          var o = $("[id='address_data']");
          o.each(function(e) { 
            $(this).trigger('onchange');
          }); 
        }, 1370);  

        setTimeout(function(){ 

          var p = $("[id='shipping_company']");
          p.each(function(e) {  
            $(this).trigger('onchange');
          }); 
        }, 1870);  

       
    // window.setTimeout('setQuantity({{count($product_data)}})', 350);


      $('#rv-Modal-shipping').on('show.bs.modal', function(e) {
        //get data-id attribute of the clicked element
        var Id = $(e.relatedTarget).data('ids');
        $('#shippingForm').attr('action', "javascript:addAddress('shipping','ship-address-"+Id+"','shipping_address["+Id+"]')"); $('#modal-button-shipping').prop('disabled', false);
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

     $('#rv-Modal-shipping').on('show.bs.modal', function(e) {
        $('#modal-button-shipping').prop('disabled', false);
      });

function enableFormButton(){
  $('#modal-button-shipping').prop('disabled', false);
}

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
    var moretext = "{{ trans("cart.read_more") }}";
    var lesstext = "{{ trans("cart.read_less") }}";
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

    var discount_valid = "{{ trans("cart.discount_success") }}";
    var discount_invalid = "{{ trans("cart.discount_invalid") }}";

      $.ajax({
      url: base_url+'/get-discount-code-status', 
      type: 'GET', 
      data: {'code':code},
      success: function (response){
          var data = JSON.parse(response); 
           if(data == true){  //alert("T");
            $('#discount-code-error').empty();
            $('#discount-code-error').text(discount_valid);
            $('#discount-code-error').css('color','black');

           }else if(data == false){  // alert("F");
             $('#discount-code-error').empty();
             $('#discount-code-error').css('color','red');
             $('#discount-code-error').text(discount_invalid);
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



