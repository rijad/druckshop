<div class="mycart">
        <div class="container">
            <div class="Product_qeue">
                <div class="w-100">
                    <div class="w-65">
                        <div class="left_productdetail">   
                            <div class="text-center quote_heading">
                                <p>Product list</p>
                            </div>

                            <div class="product">


                            	@foreach ($product_data as $data)
 
                                <div class="product_listing">
                                    <img src="images/product_frame.png" alt="" width="100px">
                                    <div class="product_description">
                                        <p class="thisproduct_head">{{$data->product}}</p>
                                        <p class="thisproduct_subhead">{{$data->attribute_desc}}</p>
                                    </div>
                                    <ul class="product_price">
                                        <li class="inputcard_quantity"><h6><strong>€ <span id="price_per_product_{{$data->id}}">{{$data->price_per_product}}</span><span class="text-muted">x</span></strong></h6>
                                            <input id ="qty_{{$data->id}}" name = "qty_{{$data->id}}" type="text" class="form-control input-sm" placeholder="" onchange ="setQuantity({{count($product_data)}});" value = "1">
                                        </li>
                                        <li><button class="remove_btn" onclick = "decrementQuantity('qty_{{$data->id}}')">Remove</button></li>
                                    </ul>
                                </div>
                                <hr>
                                @endforeach  


                                <hr>
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
                            <p><a href="#">{{$data->product}}</a> <span style="float: right;">€</span><span id = "total_price_per_item_{{$data->id}}" class="price"> {{$data->price_per_product}}</span></p>
                           @endforeach
                            <hr style="margin-top:20%;">
                            <p>Total <span style="float: right;">€</span><span id ="checkout_total" class="price" style="color:black"><b>$127.27</b></span></p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>   
            <div class="cart-form-shop w-100">
                <p>Please Fill in Details</p>
                        <form method = "POST" action="{{route('order-details')}}">
                        	@csrf
                            <div class="form-group">
                              <label for="text">No of Copies*:</label>
                              <input type="text" name="no_of_copies" id="no_of_copies" class="form-control" placeholder="enter here" >
                            </div>
                            <div class="form-group">
                              <label for="pwd">No of CDS*:</label>
                              <input type="text" name="no_of_cds" id="no_of_cds" class="form-control" placeholder="enter here">
                            </div>
                            <div class="form-group">
                              <label for="email">Shipping Company*:</label>
                              <select class="form-control" name="shipping_company" id="shipping_company" > <option>test1</option><option>test2</option> </select> 
                            </div>
                             <div class="form-group">
                              <label for="email">Dicount Code:</label>
                              <input type="text" name="promo_code" id="promo_code" class="form-control" placeholder="enter here">
                            </div>
                            <div class="form-group">
                              <label for="email">Shipping Address*:</label>
                              <textarea name="shipping_address" id="shipping_address" class="form-control">enter here</textarea>
                            </div>
                             <div class="form-group">
                              <label for="email">Billing Address*:</label>
                              <textarea name="billing_address" id="billing_address" class="form-control">enter here</textarea>
                            </div>
                           
                            <div class="text-right">
                                <button type= "submit" class="continue_btn">Proceed to Checkout</button>
                            </div>
                        </form>
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