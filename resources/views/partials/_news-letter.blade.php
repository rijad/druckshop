 

<section class="pageNewsletter float-left text-center w-100">
				<div class="container">
					<div class="row justify-content-md-center">
					<div class="col-offset-2 col-md-8 text-center newsletterCol">
						<h3>Newsletter</h3>
						<div class="newsletter">
							<label>Subscribe to our newsletter now and benefit from numerous offers and promotions.</label>
							<div class="newsletter-input">
								<form method="POST" action="{{route('news-letter')}}">
								@csrf
								<input name="email" type="e-mail" placeholder="E-Mail Adresse" />
								<input type ="submit" value="Subscribe to Newsletter" >  </input>
								</form>
								@if(Session::has("success"))
								<span style="color:green;">{{Session::get("success")}}</span>
								@endif
							</div>
						</div>
					</div>
				</div>
			</div>		
</section>

<!-- ========================================== model popup ============================= -->

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


<script type="text/javascript">

	$('#heroSlider').carousel({			 	 
		interval: false
	});  
 
</script>
