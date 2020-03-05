<section class=" page-section home-faq">
					<h1>Contact</h1>
					<div class="accordion" id="accordionExample">
					@foreach ($contact as $key=>$cont)
					  <div class="card">
					    <div class="accordion-header" id="heading{{$key}}">
					      <h2 class="mb-0">
                          {{$cont->title_english}}
					      </h2> 
					    </div>

					    <div class="card-body">
					        {{$cont->text_english}}
					      </div>
					  </div>
					  @endforeach	
					</div>  
		</section>  