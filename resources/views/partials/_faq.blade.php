

<section class=" page-section home-faq">
	<h1>Faq</h1>
	<div class="accordion" id="accordionExample">
        @if(!empty($frequently_asked_question))      
			@foreach ($frequently_asked_question as $key=>$faq)
			<div class="card">
				<div class="accordion-header" id="heading{{$key}}">
					<h2 class="mb-0">
						<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{$key}}" aria-expanded="@if($key == 0){{'true'}} @else {{'false'}} @endif" aria-controls="collapse{{$key}}">
							{{$faq->title_english}}
						</button>
					</h2>
				</div>

				<div id="collapse{{$key}}" class="collapse @if($key == 0){{'show'}} @endif" aria-labelledby="heading{{$key}}" data-parent="#accordionExample">
					<div class="card-body">

						<?php $locale = session()->get('locale'); 

						if ($locale == 'gr') { ?>

						{!! @$faq->text_german !!}

						<?php } else{  ?>

						{!! @$faq->text_english !!}

						<?php }  ?>

					</div>
				</div>
			</div>
			@endforeach	
        @endif
	</div>  
</section> 