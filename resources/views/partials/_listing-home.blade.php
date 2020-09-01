
			<div class="row">
        @if(!empty($product_listing))    

			@php($row = 1) 
			@foreach ($product_listing as $listing)
			
				<div class="col-sm-6 col-md-4">
					<div class="product-block text-center">
						<a class="prodcutImage" href="{{ route('product-information') }}#{{$listing->title_english}}">
								<img src="{{ asset('/public/images/'.$listing->image_path)}}" alt="" />
						</a>
						<div class="proInfo">
							<?php $locale = session()->get('locale'); 
							if ($locale == 'gr') { ?>

							<h2>{{$listing->title_german}}</h2>	
							<p>{{$listing->short_description_german}}</p>
							<?php } else { ?>

							<h2>{{$listing->title_english}}</h2>	
							<p>{{$listing->short_description_english}}</p>

							<?php } ?>
							
							<a href="{{ route('product-information') }}#{{$listing->title_english}}">{{ trans('homepage.read_more')}}</a>
						</div>
					</div>
				</div>

			@if(($row)%3 == 0) 
			<br> 
			@endif
			@php($row++)  
			@endforeach
        @endif
			
			</div><!-- row ends -->
