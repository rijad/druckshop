<section class=" page-section home-faq">
					<h1>About Us</h1>
					<p class="About-subhead">
					    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium commodi libero mollitia necessitatibus
					    quisquam, sed suscipit. Amet aspernatur dignissimos doloremque dolorum fugit, nulla sed totam unde. Architecto
					    quae sapiente suscipit.
					 </p>
					<div class="Aboutpage-rv">
						@foreach ($about as $key=>$abut)
					    <div class="about-header" id="heading{{$key}}">
					      	<!-- <h2 class="mb-0">
                          	{{$abut->title_english}}
					      	</h2> -->
                          	<div class="product-item-img col-half text-left">
								<span class="img-back">
									<img src="{{ asset($abut->image)}}" alt="" />
								</span>
							</div>

					    	<div class="product-item col-half">
						    	<h2 style="margin-top:20px; ">Spiral Bindings</h2>
						        <p>{{$abut->text_english}}</p>
						     </div>
						     <div class="About-boody">
						     	<h2>More Information</h2>
						     	<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium commodi libero mollitia necessitatibus
								    quisquam, sed suscipit. Amet aspernatur dignissimos doloremque dolorum fugit, nulla sed totam unde. Architecto
								    quae sapiente suscipitLorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium commodi libero mollitia necessitatibus
								    quisquam, sed suscipit. Amet aspernatur dignissimos doloremque dolorum fugit, nulla sed totam unde. Architecto
								    quae sapiente suscipit Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium commodi libero mollitia necessitatibus
								    quisquam, sed suscipit. Amet aspernatur dignissimos doloremque dolorum fugit, nulla sed totam unde. Architecto
								    quae sapiente suscipit Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium commodi libero mollitia necessitatibus
								    quisquam, sed suscipit. Amet aspernatur dignissimos doloremque dolorum fugit, nulla sed totam unde. Architecto
								    quae sapiente suscipit Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium commodi libero mollitia necessitatibus
								    quisquam, sed suscipit. Amet aspernatur dignissimos doloremque dolorum fugit, nulla sed totam unde. Architecto
								    quae sapiente suscipit Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium commodi libero mollitia necessitatibus
								    quisquam, sed suscipit. Amet aspernatur dignissimos doloremque dolorum fugit, nulla sed totam unde. Architecto
								    quae sapiente suscipit.</p>
								    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium commodi libero mollitia necessitatibus
								    quisquam, sed suscipit. Amet aspernatur dignissimos doloremque dolorum fugit, nulla sed totam unde. Architecto
								    quae sapiente suscipitLorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium commodi libero mollitia necessitatibus
								    quisquam, sed suscipit. Amet aspernatur dignissimos doloremque dolorum fugit, nulla sed totam unde. Architecto
								    quae sapiente suscipit Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium commodi libero mollitia necessitatibus
								    quisquam, sed suscipit. Amet aspernatur dignissimos doloremque dolorum fugit, nulla sed totam unde. Architecto
								    quae sapiente suscipit Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium commodi libero mollitia necessitatibus
								    quisquam, sed suscipit. Amet aspernatur dignissimos doloremque dolorum fugit, nulla sed totam unde. Architecto
								    quae sapiente suscipit Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium commodi libero mollitia necessitatibus
								    quisquam, sed suscipit. Amet aspernatur dignissimos doloremque dolorum fugit, nulla sed totam unde. Architecto
								    quae sapiente suscipit Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium commodi libero mollitia necessitatibus
								    quisquam, sed suscipit. Amet aspernatur dignissimos doloremque dolorum fugit.</p>
						     </div>
					  	</div>


					  	
					  @endforeach	
					</div>  
		</section>  