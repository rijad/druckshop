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

				<!-- Right Side Of Navbar -->
				<ul class="align-item-md-end">
					<!-- Authentication Links -->
					@guest
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
					</li>
					@if (Route::has('register'))
					<li class="nav-item">
						<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
					</li>
					@endif
					@else
					<li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>

						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ route('customer-area') }}" >
								Customer Area
							</a>
							<a class="dropdown-item" href="{{ route('user-logout') }}"
							onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							{{ __('Logout') }}
						</a>

						<form id="logout-form" action="{{ route('user-logout') }}" method="POST" style="display: none;">
							@csrf
						</form>

					</div>
				</li>
				@endguest 
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
			<li class="cart-relative-count"><a @if(isset($cart)) href="{{route('cart')}}" @endif><i class="fa fa-shopping-cart"></i><span class="cart-product-count">@if(isset($cart)) @if(count($cart) > 0) {{count($cart)}} @endif @endif</span> </a></li>
			@php $locale = session()->get('locale'); $active_lang_en = ''; $active_lang_gr=''; @endphp
			@switch($locale)
			@case('en')
			@php $active_lang_en = 'border: 2px solid green; border-radius: 12px;'; @endphp
			@break
			@case('gr')
			@php $active_lang_gr = 'border: 2px solid green; border-radius: 12px;'; @endphp
			@break
			@default
			@php $active_lang_en = 'border: 2px solid green; border-radius: 12px;'; @endphp
			@endswitch
			<li><a href="lang/en"><img style="{{ $active_lang_en }}" src="{{ asset('public/images/eng.png') }}" alt="English" /></a></li>
			<li><a href="lang/gr"><img style="{{ $active_lang_gr }}" src="{{ asset('public/images/ger.png') }}" alt="German" /></a></li>	

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
					<li><a href="{{ route('latest') }}">Latest</a></li>
					<li><a href="{{ route('about-us') }}">About Us</a></li>
					<li><a href="{{ route('faq') }}">FAQ</a></li>
					<li><a href="{{ route('gallery-images') }}">Gallery</a></li>
					<li><a href="{{ route('contact') }}">Contact</a></li>
				</ul>  
			</div>

			<div class="loginBtn my-lg-0">					    
				<button onclick="window.location='{{route('dashboard-login')}}'"  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-sign-out"></i></button>						 
			</div>
		</nav>
	</div>
</div>
</header>
