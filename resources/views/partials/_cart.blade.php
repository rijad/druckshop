
<div class="mycart cart-rv">
        <div class="container">
            <div class="Product_qeue">
                <div class="w-100">
                    <div class="w-65">
                        <div class="left_productdetail">   
                            <div class="text-center quote_heading">
                                <p>Product list</p>
                            </div>
 
                            <div class="product">
 

                              @foreach ($product_data as $key=>$data)
 
                                <div class="product_listing">
                                    <img src="http://druckshop.trantorglobal.com/public/images/product1.jpg" alt="" width="75px" />
                                    <div class="product_description">
                                        <p class="thisproduct_head">{{$data->product}}</p>
                                        <p class="thisproduct_subhead more">{{$data->attribute_desc}}</p>
                                    </div>
                                    <ul class="product_price" id="product_price">
                                        <li class="inputcard_quantity"><h6><strong>€ <span id="price_per_product_{{$data->id}}" class = "price_per_product">{{$data->price_per_product}}</span><span class="text-muted">x</span></strong></h6>
                                            <input id ="qty_{{$data->id}}" name = "qty_{{$data->id}}" type="text" class="form-control input-sm" placeholder="" onchange ="setQuantity({{count($product_data)}});" value = "1"><div><span id="qty_msg"></span></div>
                                        </li>
                                        <li>
                                        <button class="remove_btn" onclick = "decrementQuantity('qty_{{$data->id}}',{{count($product_data)}})">-</button>
                                        <button class="remove_btn" onclick = "incrementQuantity('qty_{{$data->id}}',{{count($product_data)}})">+</button>
                                        
                                        <button onclick="window.location='{{route('remove-item',['id'=>$data->id]) }}'" class="remove_btn" > Remove </button> 
                                    </li>
                                    </ul>
                                    <div class="rv-formCart">
                                      <div class="rv-casualBioFields">
                                        <div class="form-group">
                                      <label for="text">No of Copies*:</label>
                                      <input type="text" name={{"no_of_copies_".$key}} id="no_of_copies" class="form-control" placeholder="enter here" >
                                      @if($errors->has('no_of_copies'))
                                      <div class="error">{{ $errors->first('no_of_copies') }}</div>
                                      @endif 
                                    </div>
                                    <div class="form-group">
                                      <label for="pwd">No of CDS*:</label>
                                      <input type="text" name={{"no_of_cds_".$key}} id="no_of_cds" class="form-control" placeholder="enter here">
                                       @if($errors->has('no_of_cds'))
                                      <div class="error">{{ $errors->first('no_of_cds') }}</div>
                                      @endif
                                    </div>
                                     <div class="form-group">
                                      <label for="pwd">Shipping Address:</label>
                                      <select class="form-control" name={{"shipping_address_".$key}} id="address_data" > <option value ="-1">Select</option>
                                      @foreach($shipping_company as $value)<option value = "{{$value->delivery_service}}">{{$value->delivery_service}}</option> @endforeach
                                      </select>
                                    </div>

                                     <div class="form-group">
                                      <label for="pwd">Billing Address:</label>
                                      <select class="form-control" name={{"billing_address_".$key}} id="address_data" > <option value ="-1">Select</option>
                                      @foreach($shipping_company as $value)<option value = "{{$value->delivery_service}}">{{$value->delivery_service}}</option> @endforeach
                                      </select>
                                    </div>

                                    <div class="form-group">
                                      <label for="email">Shipping Company*:</label>
                                      <select class="form-control" name={{"shipping_company_".$key}} id="shipping_company" > <option value ="-1">Select</option>
                                      @foreach($shipping_company as $value)<option value = "{{$value->delivery_service}}">{{$value->delivery_service}}</option> @endforeach
                                      </select>
                                      @if($errors->has('shipping_company'))
                                      <div class="error">{{ $errors->first('shipping_company') }}</div>
                                      @endif
                                    </div>
                                      </div>
                                      <div class="rv-manageAddressFields">
                                        <h4>Manage Address</h4>
                                        <div class="rv-adressesfields">
                                         <div class="form-group">
                                            <label for="email">Shipping Address*:</label>
                                             <p class="filled-shippingAdress">
                                              <!-- 1315 north avenue downtown cluster field sourceClint: 
                                              <span><i class="fa fa-edit"></i></span>
                                              <span><i class="fa fa-close"></i></span> -->
                                            </p>
                                            <textarea name="shipping_address" id="shipping_address" class="form-control" data-toggle="modal" data-target="#rv-Modal-shipping"></textarea>
                                             @if($errors->has('shipping_address'))
                                            <div class="error">{{ $errors->first('shipping_address') }}</div>
                                            @endif
                                          </div>
                                           <div class="form-group">
                                            <label for="email">Billing Address*:</label>
                                            <p class="filled-billingAdress">1315 north avenue downtown cluster field sourceClint: 
                                              <span><i class="fa fa-edit"></i></span>
                                              <span><i class="fa fa-close"></i></span>
                                            </p>
                                            <textarea name="billing_address" id="billing_address" class="form-control" data-toggle="modal" data-target="#rv-Modal-billing"></textarea>
                                             @if($errors->has('billing_address'))
                                            <div class="error">{{ $errors->first('billing_address') }}</div>
                                            @endif
                                          </div>
                                        </div>  
                                      </div>
                                      
                                     </div>
                                </div>
                                <hr>
                                @endforeach  
                            </div>
                        </div>
                    </div>
                    <div class="w-35">
                        <div class="right_productdetail">
                          <div class="text-center quote_heading">
                              <p>Summary</p>
                          </div>
                          <div class="summary">
                              <h4>Items <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>{{count($product_data)}}</b></span></h4>
                              @foreach ($product_data as $data)
                              <p><a href="#">{{$data->product}}</a> <span style="float: right;">€</span><span id = "total_price_per_item_{{$data->id}}" class="price total_price_per_item"> {{$data->price_per_product}}</span></p>
                             @endforeach
                              <hr style="margin-top:20%;">
                              <p>Total <span style="float: right;">€</span><span id ="checkout_total" class="price" style="color:black"><b>€</b></span></p>
                          </div>
                        </div>
                        <div class="rv-DiscountCheckout">
                          <h4>Discount Code</h4>
                          <div class="form-group">
                            <label for="email">Apply your Dicount Code here:</label>
                            <input type="text" name="code" id="code" class="form-control" placeholder="enter here">
                            @if($errors->has('code'))
                            <div class="error">{{ $errors->first('code') }}</div>
                            @endif
                          </div> 
                          <div class="text-right">
                              <button type= "submit" class="continue_btn">Proceed to Checkout</button>
                          </div>
                        </div>
                    </div>
                    
                </div> 
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
            <h4 class="modal-title">Add Shipping Address</h4>
          </div>
          <div class="modal-body">
             <div class="cart-form-shop w-100">
               <form method = "POST" action="javascript:addAddress('shipping');">
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
</div>
 

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
                           <input type="text"  class="form-control" placeholder="ename="billing_zip_code" id="billing_zip_code">
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


<script src="{{ asset('public/js/frontend/checkout.js') }}" type="text/javascript" ></script>
<script src="{{ asset('public/js/frontend/dragdrop.js') }}" type="text/javascript" ></script>

<script>
  $(document).ready( function () {
    setQuantity({{count($product_data)}});
  });
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



