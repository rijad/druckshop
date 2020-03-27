 
<section class="customer-profile-section">
	<div class="container">
		<div class="col-xl-12">
			<div class="row">
				<div class="col-lg-7">
					<div class="customer-profile-text">
					<h2>Maria Williams</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed dod tempor incididunt labore.</p>
					</div>
					<div class="customer-profile-info">
					<h2>General Info</h2>
					<ul>
					<li><span>Date of Birth</span><span>Nov 29, 1968</span></li>
					<li><span>Address</span><span>Rosia Road 55, Downtown Eastside Gibraltar, US</span></li>
					<li><span>E-mail</span><span>mariawilliams@company.com</span></li>
					<li><span>Phone </span><span>+993 5266 22 345</span></li>
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