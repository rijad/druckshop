<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

	<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	@include('partials/_head')  
</head>
<body>  
 
	<div class="site-wrapper">
		  @include('partials/_header') 
		<div class="content-wrapper"> 
			 @yield('slider') 
			<div class="clearfix"></div> 
			<div class="container"> 
					@yield('content')
			</div><!-- container ends -->
					@include('partials/_news-letter') 
		</div>
		  @include('partials/_footer') 

	</div>
</body>
</html>  