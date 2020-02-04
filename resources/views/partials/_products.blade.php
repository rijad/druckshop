			<div class="container">

				@foreach ($product_listing as $key=>$listing)

				@if(($key)%2 == 0)

				<div class="col-row mb-5"> 

					<div class="product-item-img col-half text-left">
						 <span class="img-back"><img src="{{ asset($listing->image_path)}}" alt="" /></span>
					</div>

					<div class="product-item col-half">
						<h2>{{$listing->title_english}}</h2>	
						<p>{{$listing->short_description_english}}</p>
						 
						<button class="btn-gray">To Order</button>
						<a href="{{ route('product-information') }}#{{$listing->title_english}}">product Info</a>
					</div> 
					
				</div><!-- col row ends -->

				@else

				<div class="col-row mb-5"> 

					<div class="product-item-img col-half text-right pull-right">
						 <span class="img-back"><img src="{{ asset($listing->image_path)}}" alt="" /></span>
					</div>

					<div class="product-item col-half">
						<h2>{{$listing->title_english}}</h2>	
						<p>{{$listing->short_description_english}}</p>
						 
						<button class="btn-gray">To Order</button>
						<a href="{{ route('product-information') }}#{{$listing->title_english}}">product Info</a>
					</div> 

				</div><!-- col row ends --> 

				@endif

				@endforeach

		</div>		 