<div class="mycart">
        <div class="container">
            <div class="Product_qeue">
                <div class="w-100">
                        <div class="left_productdetail">  
                            <div class="text-center quote_heading">
                                <p>Product Details</p>
                            </div>

                            <div class="product">

                            @foreach($product_data as $data)

                                <div class="product_listing">
                                    <img src="images/product_frame.png" alt="" width="100px">
                                    <div class="product_description">
                                        <p class="thisproduct_head">{{$data->product}}</p>
                                        <p class="thisproduct_subhead">{{$data->attribute_desc}}</p>
                                    </div>
                                    <ul class="product_price">
                                        <li class="inputcard_quantity"><h6><strong>{{$data->price_product_qty}}€</strong></h6>
                                           
                                        </li>
                                    </ul>
                                </div> 
                                <hr>
                                
                                @endforeach


                                <hr>
                            </div>
                            <div class="text-right">
                                <button class="paypaypal">Pay via PayPal</button>
                                <button class="paycash">Pay via Cash</button>
                            </div>

                    </div>
                   
                </div>
            </div>   
           
        </div>
    </div>