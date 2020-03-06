<!DOCTYPE html>
<html> 
<head>
	@include('partials/admin/_head')  
</head>
<body>  
 
	<div class="site-wrapper">
		  @include('partials/admin/_header') 
		<div class="content-wrapper"> 
			 @yield('slider') 
			<div class="container"> 
                    @yield('content')
</div>
			
		  @include('partials/admin/_footer') 

	</div>
</body>
</html>