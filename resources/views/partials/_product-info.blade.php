<div id="navigate-heading">				
	@if(!empty($product_listing))      
		@foreach ($product_listing as $listing) 

				<div class="product-item-img col-half text-left" id="{{$listing->title_english}}">
					 <img src="{{ asset('public/images/'.$listing->image_path)}}" alt="" />
					 <div class="rv-imagelist">
							<span class="img-back">
							 @foreach ($listing->psProductImages as $image)
							 	<img class="zoom" class = "zoom"src="{{ asset('/public/images/'.$image->image_path)}}" alt="" height="50" width="50" />
							 @endforeach
							 </span>
						</div>
				</div>

				<div class="productDetail col-half">
					<H2>{{$listing->title_english}}</H2>
					{!! $listing->description_english !!}

					 <div class="productPurchase">
				    <a href="{{ route($listing->product_page_url,['id'=>$listing->id])}}" class="btn-gray">To Order</a>
					 </div>
				</div>	

		@endforeach   
    @endif 
</div>




<script src="{{ asset('public/js/frontend/attrchange.js') }}" type="text/javascript" ></script>
<script src="{{ asset('public/js/frontend/attrchange_ext.js') }}" type="text/javascript" ></script>
<script>
	 
$("#rv-myHeader").attrchange({
    trackValues: true, // set to true so that the event object is updated with old & new values
    callback: function(evnt) {
        if(evnt.attributeName == "class") { // which attribute you want to watch for changes
            if(evnt.newValue.search(/nav-wrapper sticky/i) != -1) { // "open" is the class name you search for inside "class" attribute

                $("#navigate-heading").addClass('navigate-heading');
            }
        }
    }
});

</script> 