			<div class="container">

				@foreach ($product_listing as $key=>$listing)

				@if(($key)%2 == 0)

				<div class="col-row mb-5"> 

					<div class="product-item-img col-half text-left">
						<span class="img-back"><img src="{{ asset($listing->image_path)}}" alt="" /></span>
					</div>
					<div class="product-item-img col-half text-left">
						<span class="img-back">
							@foreach ($listing->psProductImages as $image)
							<img src="{{ asset($listing->image_path)}}" alt="" height="50" width="50" /></span>
							@endforeach
						</div>

						<div class="product-item col-half">
							<?php $locale = session()->get('locale'); 

							if ($locale == 'gr') { ?>

							<h2>{{$listing->title_german}}</h2>	
							<p>{{$listing->short_description_german}}</p>
							<?php } else { ?>

							<h2>{{$listing->title_english}}</h2>	
							<p>{{$listing->short_description_english}}</p>

							<?php } ?>

							<a href="{{ route($listing->product_page_url,['id'=>$listing->id])}}" class="btn-gray">{{ trans('product.to_order')}}</a>
							<a href="{{ route('product-information') }}#{{$listing->title_english}}">{{ trans('product.product_info')}}</a>
						</div> 

					</div><!-- col row ends -->  

					@else

					<div class="col-row mb-5"> 

						<div class="product-item-img col-half text-right pull-right">
							<span class="img-back"><img src="{{ asset($listing->image_path)}}" alt="" /></span>
						</div>
						<div class="product-item-img col-half text-left">
							<span class="img-back">
								@foreach ($listing->psProductImages as $image)
								<img src="{{ asset($listing->image_path)}}" alt="" height="50" width="50" /></span>
								@endforeach
							</div>

							<div class="product-item col-half">
								
								<?php $locale = session()->get('locale'); 
								
								if ($locale == 'gr') { ?>

								<h2>{{$listing->title_german}}</h2>	
								<p>{{$listing->short_description_german}}</p>
								<?php } else { ?>

								<h2>{{$listing->title_english}}</h2>	
								<p>{{$listing->short_description_english}}</p>

								<?php } ?>

								<a href="{{ route($listing->product_page_url,['id'=>$listing->id])}}" class="btn-gray">{{ trans('product.to_order')}}</a>
								<a href="{{ route('product-information') }}#{{$listing->title_english}}">{{ trans('product.product_info')}}</a>
							</div> 

						</div><!-- col row ends --> 

						@endif

						@endforeach

					</div>		 