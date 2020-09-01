<!DOCTYPE html>
<html lang="en">
<head>
	<!-- files -->
	@include('partials/admin/_head') 
	
</head>
<body class="sb-nav-fixed">
	@include('partials/admin/_header')
	<div id="layoutSidenav">
		<!-- sidebar -->
		@include('partials/admin/_sidebar') 
		<div id="layoutSidenav_content">
			<main>
				<div class="container-fluid">
					
				<!-- cards -->
				@yield('content') 
					
						<!-- charts -->
						@yield('table')
						<!-- tables -->
						
					
				</div>
			</main>
		<!-- footer -->
		@include('partials/admin/_footer') 
		</div>
	</div>
	<!-- scripts -->
	@include('partials/admin/_script') 
</body>
</html>











