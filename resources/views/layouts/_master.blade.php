<!DOCTYPE html>
<html> 
<head>
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