
 
		<section class="sliderMain">
  			<div id="heroSlider" class="carousel carousel-fade" data-ride="carousel">
					  <div class="carousel-inner">
						@foreach ($slides as $key=>$slide)
					    <div class="carousel-item @if($key == 0){{'active'}} @endif">
					      <img src="{{ asset($slide->image_path)}}" class="d-block w-100" alt="...">
					      <div class="carousel-caption text-left sliderCaption">
					      	<div class="container">
						        <h5>{{$slide->title_english}}</h5>
						        <p>{{$slide->content_english}}</p>
						        <a href="#">Read More</a>
						    </div>
					      </div>
					    </div><!-- item ends -->
					    @endforeach
					  </div>
					  <a class="carousel-control-prev" href="#heroSlider" role="button" data-slide="prev">
					    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="carousel-control-next" href="#heroSlider" role="button" data-slide="next">
					    <span class="carousel-control-next-icon" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>
					</div>
			</section>
			<div class="clearfix"></div> 
		 