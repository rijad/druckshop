<!DOCTYPE html>
<html>
<head>
	<title>PrintShop : Product Info</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="{{ asset('public/css/frontend/style.css') }}" rel="stylesheet" type="text/css" />  
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
	<link rel="stylesheet" href="{{ asset('public/css/frontend/bootstrap.min.css') }}">  
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700&display=swap" rel="stylesheet"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="{{ asset('public/js/frontend/bootstrap.min.js') }}" type="text/javascript" ></script>
</head>
<body>

	<div class="site-wrapper">
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
					    
						    <li class="nav-item"><a href="{{ route('index') }}"><i class="fa fa-home"></i></a></li>
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

		<div class="content-wrapper">
			<div class="container">

				<div class="product-item-img col-half text-left">
					 <img src="{{ asset('public/images/product1.jpg') }}" alt="" />
				</div>

				<div class="productDetail col-half">
					<h2>Hardcover</h2>
					<p>For a high-quality bachelor's thesis, master's thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.</p>
					
					<h2>Hardcover edition</h2>
					<p>In the "Edition" variant, we offer you a completely free design of your bachelor thesis. With our templates you can have the title page, back and book spine printed and bound according to your own wishes.</p>

					<h2>Hardcover classic</h2>
					<p>The "classic" variant is absolutely unique and noble. Combine your favorites from 4 exclusive material types, 20 cover colors and 5 printing colors with a metallic effect. This turns the dissertation into something very special.</p>

					 <div class="productPurchase">
					 	<button class="order-btn">Order</button>
					 </div>
				</div>				 
			</div><!-- content area ends -->

			<div class="container">

				<div class="product-item-img col-half text-left">
					 <img src="{{ asset('public/images/product1.jpg') }}" alt="" />
				</div>

				<div class="productDetail col-half">
					<h2>Hardcover</h2>
					<p>For a high-quality bachelor's thesis, master's thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.</p>
					
					<h2>Hardcover edition</h2>
					<p>In the "Edition" variant, we offer you a completely free design of your bachelor thesis. With our templates you can have the title page, back and book spine printed and bound according to your own wishes.</p>

					<h2>Hardcover classic</h2>
					<p>The "classic" variant is absolutely unique and noble. Combine your favorites from 4 exclusive material types, 20 cover colors and 5 printing colors with a metallic effect. This turns the dissertation into something very special.</p>

					 <div class="productPurchase">
					 	<button class="order-btn">Order</button>
					 </div>
				</div>				 
			</div><!-- content area ends -->

			<div class="container">

				<div class="product-item-img col-half text-left">
					 <img src="{{ asset('public/images/product1.jpg') }}" alt="" />
				</div>

				<div class="productDetail col-half">
					<h2>Hardcover</h2>
					<p>For a high-quality bachelor's thesis, master's thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.</p>
					
					<h2>Hardcover edition</h2>
					<p>In the "Edition" variant, we offer you a completely free design of your bachelor thesis. With our templates you can have the title page, back and book spine printed and bound according to your own wishes.</p>

					<h2>Hardcover classic</h2>
					<p>The "classic" variant is absolutely unique and noble. Combine your favorites from 4 exclusive material types, 20 cover colors and 5 printing colors with a metallic effect. This turns the dissertation into something very special.</p>

					 <div class="productPurchase">
					 	<button class="order-btn">Order</button>
					 </div>
				</div>				 
			</div><!-- content area ends -->

			<div class="container">

				<div class="product-item-img col-half text-left">
					 <img src="{{ asset('public/images/product1.jpg') }}" alt="" />
				</div>

				<div class="productDetail col-half">
					<h2>Hardcover</h2>
					<p>For a high-quality bachelor's thesis, master's thesis or doctoral thesis, the hardcover is the optimal solution as a professionally bound book.</p>
					
					<h2>Hardcover edition</h2>
					<p>In the "Edition" variant, we offer you a completely free design of your bachelor thesis. With our templates you can have the title page, back and book spine printed and bound according to your own wishes.</p>

					<h2>Hardcover classic</h2>
					<p>The "classic" variant is absolutely unique and noble. Combine your favorites from 4 exclusive material types, 20 cover colors and 5 printing colors with a metallic effect. This turns the dissertation into something very special.</p>

					 <div class="productPurchase">
					 	<button class="order-btn">Order</button>
					 </div>
				</div>				 
			</div><!-- content area ends -->
		</div> 

			</div><!-- container ends -->


			<section class="pageNewsletter float-left text-center w-100">
				<div class="container">
					<div class="row justify-content-md-center">
					<div class="col-offset-2 col-md-8 text-center newsletterCol">
						<h3>Newsletter</h3>
						<div class="newsletter">
							<label>Subscribe to our newsletter now and benefit from numerous offers and promotions.</label>
							<div class="newsletter-input">
								<input type="text" placeholder="Ihre E-Mail Adresse" />
								<button>Subscribe to Newsletter</button>
							</div>
						</div>
					</div>
				</div>
				</div>		
			</section>



		</div>

		<footer id="site-footer">
					<div class="container">
						 

						<div class="col-row text-center"> 

							<div class="footerSub footer-nav display-inline text-center">
								<ul class="social-icons text-center m-0">
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-instagram"></i></a></li>
								</ul>
								<div class="clearfix"></div>
								<div class="text-center cardsIMages">
									<!-- <img src="images/cards.png" alt="" /> -->
								</div>
								<div class="clearfix"></div>
								<p class="footer-copyright m-0"> &copy; 2020 - Alle Rechte vorbehalten</p>
							</div>

						</div><!-- row-ends -->

					</div>
				</footer>

		<!-- ========================================== model popup ============================= -->
		  

				<!-- Modal -->
		<div  class="loginModalContent modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content border-0">

			     <div class="modal-wrapper modal-transition">
						<div class="modal-header">					 
							<h2 class="modal-heading m-0"><i class="fa fa-lock"></i> Log in</h2>
						</div>

						<div class="modal-body">
							<div class="login-form">
							<h3>Please fill out all the fields below.</h3>

							<div class="loginDiv loginWrap">
								<h4>No user account? <span id="switchForm">Registration</span></h4>
								<form class="signInForm">
									<div class="inputField">
										<label>User Name</label>
										<input type="text" placeholder="Username" required="required" />
									</div><!-- input field ends -->

									<div class="inputField">
										<label>PASSWORD</label>
										<input type="password" placeholder="Password" required="required" />								
									</div><!-- input field ends -->

									<div class="inputField formSubmit">
										<button type="button" class="modal-close modal-toggle" data-dismiss="modal" aria-label="Close">Abort</button> 
										<input type="submit" name="Submit" value="Submit" />								
									</div><!-- input field ends -->
								</form>
							</div> <!-- login wrap -->

							<div class="signUpDiv loginWrap" style="display: none;">
								<h4>Do you already have a user account? <span id="switchForm">Login</span></h4>
								<form class="signInForm">
									<div class="inputField">
										<label>SURNAME	</label>
										<input type="text" placeholder="Username" required="required" />
									</div><!-- input field ends -->

									<div class="inputField">
										<label>E-MAIL</label>
										<input type="text" placeholder="E mail" required="required" />
									</div><!-- input field ends -->

									<div class="inputField">
										<label>PASSWORD</label>
										<input type="text" placeholder="Password" required="required" />								
									</div><!-- input field ends -->

									<div class="inputField formSubmit">
										<button type="button" class="modal-close modal-toggle" data-dismiss="modal" aria-label="Close">Abort</button> 
										<input type="submit" name="Sign Up" value="Sign Up" />								
									</div><!-- input field ends -->
								</form>
							</div> <!-- login wrap -->


							</div>
						</div>  
					</div> <!-- model content -->



		    </div>
		  </div>
		</div>

 
		</div>


		

	 
 

	

</body>
</html>