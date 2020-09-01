<section class=" page-section home-faq" id="section">

	<h1 style="padding-bottom: 50px;">{{ trans('latest.latest_title')}}</h1>
    @if(!empty($latest))      

		@foreach ($latest as $key => $value) 

			<div class="latestpage-rv" >

				<div class="latest-header post-one" id="heading_{{$value->id}}"> 
					
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

<script src="{{ asset('public/js/frontend/attrchange.js') }}" type="text/javascript" ></script>
<script src="{{ asset('public/js/frontend/attrchange_ext.js') }}" type="text/javascript" ></script>
<script>
	 
$("#rv-myHeader").attrchange({
    trackValues: true, // set to true so that the event object is updated with old & new values
    callback: function(evnt) {
        if(evnt.attributeName == "class") { // which attribute you want to watch for changes
            if(evnt.newValue.search(/nav-wrapper sticky/i) != -1) { // "open" is the class name you search for inside "class" attribute

                $("#section").addClass('navigate-heading');   
            }else{

            	$("#section").removeClass();
            	$("#section").addClass('page-section home-faq');

            }
        } 
    }
});

</script> 