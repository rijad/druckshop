<section class="sliderMain">
	<div id="heroSlider" class="carousel carousel-fade" data-ride="carousel">
		<div class="carousel-inner">
			@foreach ($slides as $key => $item)

			<div class="carousel-item @if($key == 0){{'active'}} @endif">
				<img src="{{ asset($item->image_path)}}" class="d-block w-100" alt="...">
				<div class="carousel-caption text-left sliderCaption">
					<div class="container">

						<?php 
						if (!empty($item->title_color)) {
							
							$color = $item->title_color;
						}else {

							$color = '';

						}

						if (!empty($item->title_size)) {
							
							$text_size = $item->title_size;
						}else {

							$text_size = '';

						}

						?>
						<h5 style="color: {{ @$color  }}; font-size: {{ @$text_size  }}px; ">
							<?php $locale = session()->get('locale'); 
							if ($locale == 'gr') { ?>
							{{ $item->title_german }}
							<?php } else  { ?>
							{{ $item->title_english }}
							<?php   } ?>
						</h5>

						<p>
							<?php $locale = session()->get('locale'); 
							if ($locale == 'gr') { ?>
							{{ $item->content_german }}
							<?php } else  { ?>
							{{ $item->content_english }}
							<?php   } ?>
						</p>

						<a href="{{  url('/latest/').'#heading_'.@$item->redirect_url }}">{{ trans('homepage.read_more')}}</a>
					</div>
				</div>
			</div><!-- item ends -->

			@endforeach
		</div>
		<a class="carousel-control-prev" href="#heroSlider" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">{{ trans('homepage.previous')}}</span>
		</a>
		<a class="carousel-control-next" href="#heroSlider" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">{{ trans('homepage.next')}}</span>
		</a>
	</div>
</section>
<div class="clearfix"></div> 
