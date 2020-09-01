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
							<!-- <img src="{{ @$logo_url }}" alt="Print Shop Logo"></img> -->
							<h2>Print Shop</h2>
						</strong></td>
					</tr>
				</table>
				<table cellspacing="0" border="0" align="center" cellpadding="0" width="100%" style="border:0px solid #efefef; margin-top:0px; padding:20px;">
					<tr>
						<td><h2>Greetings !!</h2></td>
					</tr>
					<tr>
						<td><p><h4>Placed new order/query request, Please find the details in the attachment below.<h4></p></td>
						</tr>
						<br>
						<tr>
							<td>
								<table cellspacing="0" border="0" cellpadding="0" width="100%">	
									<tr>
										<td><h3>Best Regards,</h3>
											<h3>Print Shop Team</h3>
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
								<b>Print Shop {{ date('Y') }}</b></strong></td> 
							</tr>
						</table>
					</td>   
				</tr>
			</table>

		</body>
		</html>