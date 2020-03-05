<section class=" page-section home-faq">
					<h1>About</h1>
					<div class="accordion" id="accordionExample">
					@foreach ($about as $key=>$abut)
					  <div class="card">
					    <div class="accordion-header" id="heading{{$key}}">
					      <h2 class="mb-0">
                          {{$abut->title_english}}
					      </h2>
                          <div class="product-item-img col-half text-left">
							<span class="img-back">
								<img src="{{ asset($abut->image)}}" alt="" />
							</span>
						</div>
					    </div>

					    <div class="card-body">
					        {{$abut->text_english}}
					      </div>
					  </div>
					  @endforeach	
					</div>  
		</section>  