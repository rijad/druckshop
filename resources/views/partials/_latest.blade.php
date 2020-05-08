<section class=" page-section home-faq">

	<h1 style="padding-bottom: 50px;">{{ trans('latest.latest_title')}}</h1>
    @if(!empty($latest))      

		@foreach ($latest as $key => $value) 

			<div class="latestpage-rv" >

				<div class="latest-header post-one" id="heading_{{@$key}}"> 
					
					<?php $locale = session()->get('locale'); 
					if ($locale == 'gr') { ?>

					<h2 class="mb-0">{{ $value->title_german  }}</h2> 
					<p class="latest-date">{{ date('d-m-Y', strtotime($value->created_at)) }}</p>
					<div class="latestpost-item-img text-left" >
						<!-- <span class="img-back">

							<img src="{{ asset($value->image)}}" alt="Latest image" />
						</span> -->
						<p>{!! @$value->text_german !!} </p>
					</div> 

					<?php } else{  ?>

					<h2 class="mb-0">{{ $value->title_english  }}</h2>
					<p class="latest-date">{{ date('d-m-Y', strtotime($value->created_at)) }}</p>
					<div class="latestpost-item-img text-left">
						<!-- <span class="img-back">

							<img src="{{ asset($value->image)}}" alt="Latest image" />
						</span> -->
						<p>{!! @$value->text_english !!} </p>
					</div>

					<?php }  ?>

				</div>

			</div>
		@endforeach	
    @endif
</section>   