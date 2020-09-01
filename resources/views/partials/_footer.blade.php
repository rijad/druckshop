
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
					<img src="{{ asset('public/images/cards.png') }}" alt="" />
				</div>
				<div class="clearfix"></div>
				<ul class="fcopyright-assets">
					<li><a href="#">{{ trans('footer.terms') }}</a></li>
					<li>|</li>
					<li><a href="#">{{ trans('footer.notice') }}</a></li>
					<li>|</li>
					<li><a href="#">{{ trans('footer.policy') }}</a></li>
				</ul>
				<div class="clearfix"></div>
				<p class="footer-copyright m-0"> &copy; 2020 - {{ trans('footer.copyright') }}</p>
			</div>

		</div><!-- row-ends -->

	</div>
</footer>

<script>
	var msg = '{{Session::get('MessageAlert')}}';
	var exist = '{{Session::has('MessageAlert')}}';
	if(exist){
		alert(msg);
	}
</script>

