

<header id="site-header">
			<div class="topHeader">
				<div class="container"> 
					<div class="site-login d-flex">
						<ul class="list-inline headerReview mr-auto">						 
							<li><h4><i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i><i class="fa fa-star-half"></i> </h4><a href="#"><small> 4.86 / 5 from 1632 reviews</small></a></li>						 					 
						</ul>


					<ul class="align-item-md-end">						 
						<li><h4><strong><i class="fa fa-phone"></i></strong> : </h4><a href="#"><small>0987654321</small></a></li>
						<li><h4><strong><i class="fa fa-envelope"></i></strong> : </h4><a href="#"><small>sampleemail@gmail.com</small></a></li>
												 
					</ul>
				</div>
				</div>
			</div>
			<div class="container">

				<div class="site-logo"><a href="#"><img src="{{ asset('public/images/logo.png') }}" alt="" /></a></div>

				<div class="site-login">
					<ul class="headerCart d-flex float-right">
						<li class="">
							<div class="searchInput">
								<input type="text" placeholder="Search by name ..." />	
								<button><i class="fa fa-search"></i></button>

							</div>								
						</li>
						<li class=""><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
						<li><a href="#"><img src="{{ asset('public/images/eng.png') }}" alt="" /></a></li>
						<li><a href="#"><img src="{{ asset('public/images/ger.png') }}" alt="" /></a></li>	
												 						 
					</ul>
				</div>

			</div>

			<div class="nav-wrapper">
				<div class="container"> 
						 
					<nav class="site-nav navbar navbar-expand-md p-0">
					  
					  <button class="navbar-toggler text-light pt-2 pb-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">	     
					    <i class="fa fa-bars"></i>
					  </button>

					  <div class="collapse navbar-collapse" id="navbarSupportedContent">
					    <ul class="navbar-nav mr-auto">					      
					    
						    <li class="nav-item active"><a href="{{ route('index') }}"><i class="fa fa-home"></i></a></li>
							<li><a href="{{ route('products') }}">products</a></li>
							<li><a href="{{ route('coming-soon') }}">Latest</a></li>
							<li><a href="{{ route('coming-soon') }}">About Us</a></li>
							<li><a href="{{ route('coming-soon') }}">FAQ</a></li>
							<li><a href="{{ route('coming-soon') }}">Contact</a></li>
						</ul>  
					  </div>

					  <div class="loginBtn my-lg-0">					    
						<button data-toggle="modal" data-target="#exampleModal"><i class="fa fa-sign-out"></i></button>						 
				    </div>
					</nav>
				</div>
			</div>
		</header>
