<section class=" page-section home-faq">
	<h1>{{ trans('about.about_title')}}</h1>
	<p class="About-subhead">
		{{ trans('about.about_description')}}
	</p>
	<div class="Aboutpage-rv">

		@foreach ($about as $key => $value)

		<div class="about-header" id="heading{{$key}}">

			<div class="product-item-img col-half text-left">
				<span class="img-back">
					<img src="{{ asset($value->image)}}" alt="" />
				</span>
			</div>

			<div class="product-item col-half">

				<?php $locale = session()->get('locale'); 
				if ($locale == 'gr') { ?>

				<h2 style="margin-top:20px; ">{{ $value->title_german  }}</h2>
				<p>{{$value->text_german}}</p>

				<?php } else{  ?>

				<h2 style="margin-top:20px; ">{{ $value->title_english  }}</h2>
				<p>{{$value->text_english}}</p>
				
				<?php }  ?>

			</div>

		</div>

		@endforeach	
	</div>  
</section>  