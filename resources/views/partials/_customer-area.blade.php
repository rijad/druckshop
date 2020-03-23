 <div class="mycart">
        <div class="container">
            <div class="Product_qeue">
                <div class="w-100">
                        <div class="left_productdetail"> 

                        @foreach($OrderHistory as $data) 
                        @if(count($data->orderProductHistory) >=1)
                            <div class="text-center quote_heading">
                                <p>Order id : {{$data->order_id}}    Order date: {{DATE('M j Y',strtotime($data->created_at))}} </p>
                            </div>

                            <p>No of Copies: {{$data->no_of_copies}}</p>   
                            <p>No of CDs: {{$data->no_of_cds}}</p> 
                            <p>Shipping Address: {{$data->shipping_address}}</p>
                            <p>Billing Address: {{$data->billing_address}}</p>

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
                                

                                <hr>
                                <div class="text-right quote_heading">
                                <p><b>Total Amount: {{$data->total}} €<b></p>
                            	</div>
                                 <div class="text-right">
                                <button class="paypaypal" onclick="window.location='{{route('repeat-order',['order_id'=>$data->order_id])}}'">Repeat Order</button>
                                @if($data->state == "New")
                                <button class="paycash" onclick="window.location='{{route('cancel-order',['order_id'=>$data->order_id])}}'">Cancel Order</button>
                                @elseif($data->state == "Cancelled")
                                 <button class="paycash" onclick="#">Cancelled</button>
                                @endif
                            	</div> 
                                <hr>
                                 @endif
                                @endforeach


                                <hr>
                            </div>
                           
                             
                    </div>
                   
                </div>
            </div>   
           
        </div>
    </div>