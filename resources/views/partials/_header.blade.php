<header id="site-header">   
	<div class="topHeader">
		<div class="container"> 
			<div class="site-login d-flex">
				<ul class="list-inline headerReview mr-auto">						 
					{{-- <li><h4><i class="fa fa-star"></i> <i class="fa fa-star"></i> 
					<i class="fa fa-star"></i> <i class="fa fa-star"></i>
					<i class="fa fa-star-half"></i> </h4> --}}
					{{-- <a href="#"><small> 4.86 / 5 {{ trans('header.from')}} 1632 {{ trans('header.reviews')}}</small></a></li> --}}						 					 
				</ul>

				@guest
				@if (Route::has('register')) 
				@endif
				@else
				<ul class="align-item-md-end">						 
					{{-- <li><h4><strong><i class="fa fa-phone"></i></strong> : </h4>
					<a href="#"><small>0987654321</small></a></li> --}}
					<li><h4><strong><i class="fa fa-envelope"></i></strong> : </h4>
					<a href="#"><small>{{ Auth::user()->email }}</small></a></li>
				</ul>
				@endguest 

				<!-- Right Side Of Navbar -->
				<ul class="align-item-md-end">
					<!-- Authentication Links -->
					@guest
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">{{ trans('header.login')}}</a>
					</li>
					@if (Route::has('register'))
					<li class="nav-item">
						<a class="nav-link" href="{{ route('register') }}">{{ trans('header.register')}}</a>
					</li>
					@endif
					@else
					<li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>

						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ route('customer-area') }}" >
								My Account
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

	<div class="site-logo"><a href="{{ route('index') }}"><img src="{{ asset('public/images/logo.png') }}" alt="" /></a></div>

	<div class="site-login">
		<ul class="headerCart d-flex float-right">
			<li class="">
			
			<form action="{{ URL::to('/search')}}" method="POST">
			@csrf
				<div class="searchInput"> 
					<input type="text" name="search" placeholder="Search by name ..." />	
					<button type="submit"><i class="fa fa-search"></i></button>
				</div>
			</form> 
			
			</li>
			<li class="cart-relative-count"><a href="{{route('cart')}}" ><i class="fa fa-shopping-cart"></i><span class="cart-product-count">@if(\App\Http\Controllers\CheckoutController::CartCount() >0 ) @if(\App\Http\Controllers\CheckoutController::CartCount() > 0) {{\App\Http\Controllers\CheckoutController::CartCount()}} @endif @endif</span> </a></li>
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
			<li><a href="{{ url('lang/en') }}"><img style="{{ $active_lang_en }}" src="{{ asset('public/images/eng.png') }}" alt="English" /></a></li>
			<li><a href="{{ url('lang/gr') }}"><img style="{{ $active_lang_gr }}" src="{{ asset('public/images/ger.png') }}" alt="German" /></a></li>	

		</ul>
	</div>

</div>

<div class="nav-wrapper" id="rv-myHeader"> 
	<div class="container"> 

		<nav class="site-nav navbar navbar-expand-md p-0">

			<button class="navbar-toggler text-light pt-2 pb-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">	     
				<i class="fa fa-bars"></i>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">					      

					<li @if(Request::segment(1) == "")class="nav-item active" @endif><a href="{{ route('index') }}"><i class="fa fa-home"></i></a></li>
					<li @if(Request::segment(1) == "products")class="nav-item active" @endif ><a href="{{ route('products') }}">{{ trans('header.products')}}</a></li>
					<li @if(Request::segment(1) == "latest-page")class="nav-item active" @endif ><a href="{{ route('latest-page') }}">{{ trans('header.latest')}}</a></li>
					<li @if(Request::segment(1) == "about-us")class="nav-item active" @endif ><a href="{{ route('about-us') }}">{{ trans('header.about')}}</a></li>
					<li @if(Request::segment(1) == "faq")class="nav-item active" @endif ><a href="{{ route('faq') }}">{{ trans('header.faq')}}</a></li>
					{{-- <li><a href="{{ route('gallery-images') }}">Gallery</a></li> --}}
					<li @if(Request::segment(1) == "contact")class="nav-item active" @endif ><a href="{{ route('contact') }}">{{ trans('header.contact')}}</a></li>
				</ul>  
			</div>
			@if (Auth::guard('admin')->check())
			<div class="loginBtn my-lg-0">					    
				<button onclick="admin()" >Administration</button>			
			</div>
			@else
			<div class="loginBtn my-lg-0">					    
				<button onclick="adminLogin()"  data-toggle="modal" data-target="#exampleModal"><i class="fa fa-sign-out"></i></button>						 
			</div>
			@endif
			
		</nav>
	</div>
</div>
</header>

	<script> 
        function adminLogin() { 
            window.open("{{URL::to('dashboard-login')}}", "_blank"); 
		} 
		function admin() { 
            window.open("{{URL::to('admin/dashboard')}}", "_blank"); 
		}
    </script> 

<style>
.sticky {
  position: fixed;
  top: 0;
  width: 100%;
  z-index: 99;
}
</style>

<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("rv-myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>

