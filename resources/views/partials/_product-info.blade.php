				@foreach ($product_listing as $listing)

				<div class="product-item-img col-half text-left" id="{{$listing->title_english}}">
					 <img src="{{ asset($listing->image_path)}}" alt="" />
				</div>

				<div class="productDetail col-half">
					<H2>{{$listing->title_english}}</H2>
					{!! $listing->description_english !!}

					 <div class="productPurchase">
				    <button class="btn-gray">To Order</button>
					 </div>
				</div>	

				@endforeach