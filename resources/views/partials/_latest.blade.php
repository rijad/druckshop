<section class=" page-section home-faq">
					<h1>Latest</h1>
					<div class="accordion" id="accordionExample">
					@foreach ($latest as $key=>$lat)
					  <div class="card">
					    <div class="accordion-header" id="heading{{$key}}">
					      <h2 class="mb-0">
                          {{$lat->title_english}}
					      </h2>
						  <div class="product-item-img col-half text-left">
							<span class="img-back">
								<img src="{{ asset($lat->image)}}" alt="" />
							</span>
						</div>
					    </div>

					    <div class="card-body">
					        {{$lat->text_english}}
					      </div>
					  </div>
					  @endforeach	
					</div>  
		</section>  