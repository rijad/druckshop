<div class="mycart checkout-rv">
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
                                        <p class="thisproduct_subhead more">{{$data->attribute_desc}}</p>
                                    </div>
                                    <ul class="product_price">
                                        <li class="inputcard_quantity"><h6><strong>{{$data->price_product_qty}}€</strong></h6>
                                           
                                        </li>
                                    </ul>
                                </div> 
                                <hr>
                                @endforeach
                            </div>
                             <div class="text-right pr-4 pl-4">
                                <p class="thisproduct_head">Total: {{$total}} €</p>
                                @foreach($delivery_cost as $key=>$value)
                                <p class="thisproduct_head">Delivery Service Charges {{$data->product}} {{$key + 1}}: {{$value}} €</p>
                                @endforeach
                                <p class="thisproduct_head">Promo Discount: {{$discount_amt}} €</p>
                                <hr>
                                <p class="thisproduct_head">Net Amount: {{$net_amt_after_delivery_service}} €</p>
                             </div>
                            <div class="text-right">
                                <button class="paypaypal" onclick="window.location='{{route('payment-paypal')}}'">Pay via PayPal</button>
                                <button class="paycash" onclick="window.location='{{route('cash-on-delivery')}}'">Pay via Cash</button>
                            </div>

                    </div>
                   
                </div>
            </div>   
           
        </div>
    </div>




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


