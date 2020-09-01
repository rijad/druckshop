<!DOCTYPE html>
<html>
<head>
	<title>Invoice Mail</title> 
</head>
<body>

	<table cellspacing="0" border="0" align="center" cellpadding="0" width="600" style="border:1px solid #ccc; margin-top:10px;">
		<tr>
			<td>
				<table cellspacing="0" border="0" align="center" cellpadding="20" width="100%">

					<tr align="center" >
						<td style="font-family:arial; padding-bottom:0px;"><strong>
							<a href="{{ route('index') }}"><img src="{{ asset('public/images/logo.png') }}" alt="" /></a>
							<img src="{{ @$logo_url }}" alt="Druckshop Shop Logo"></img>
							<h2>Druckshop</h2>
						</strong></td>
					</tr> 
				</table>
				<table cellspacing="0" border="0" align="center" cellpadding="0" width="100%" style="border:0px solid #efefef; margin-top:0px; padding:15px;">
					
					<tr>

						<td><h2>Dear {{ @$name }}</h2></td>
					</tr>
					<tr>

						<td><p>Your order "{{ @$order_id }}"  is {{@$order_state}} !!</p></td>
					</tr>

					<?php $count = 1; ?>
					@foreach($order_history as $key => $value)

					<tr>
						<td><span><h4>{{ @$count }} - Product :   {{ @$value['product'] }} <h4></span>
						</td>
					</tr>
					<tr>
						<td><span><h4>Shipping Company :   {{ @$value['shipping_company'] }} <h4></span>
						</td>
					</tr>

					<tr>
						<td><span><h4>Billing Address :   {{ @$value['billing_address'] }} <h4></span>
						</td>
					</tr>

					<tr>
						<td><span><h4>Shipping Address :   {{ @$value['shipping_address'] }} <h4></span>
						</td>
					</tr>
					<?php $count++; ?>
					@endforeach

					<br>
					<br>
					<tr>
						<td>
							<table cellspacing="0" border="0" cellpadding="0" width="100%">	
								<tr>
									<td><h3>Best Regards,</h3>
										<h3>Druckshop Team</h3>
									</td>
								</tr>
							</table>
						</td>
						<td width="30"></td> 
					</tr>
				</table>
				<table cellspacing="0" border="0" align="center" cellpadding="0" width="100%" style="border:0px solid #efefef; margin-top:20px; padding:0px;">
					<tr>
						<td align="center" style="font-family:PT Sans,sans-serif; font-size:13px; padding:15px 0; border-top:1px solid #efefef;"> 
							<b>Druckshop {{ date('Y') }}</b></strong></td> 
						</tr>
					</table>
				</td>   
			</tr>
		</table>

	</body>
	</html>