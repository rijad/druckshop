

<?php $paypal_link = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypal_username = 'aditya.bandral-facilitator@trantorinc.com'; //Business Email
?>


<form action="<?php echo $paypal_link; ?>" method="post">
 
        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="<?php echo $paypal_username; ?>">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="Order Payment"> 
        <input type="hidden" name="item_number" value="101">
        <input type="hidden" name="amount" value="{{$net_amt}}"> 
        <input type="hidden" name="currency_code" value="USD">
        
        <!-- Specify URLs -->
        <input type='hidden' name='cancel_return' value='{{route("payment-fail")}}'>
		<input type='hidden' name='return' value='{{route("payment-success")}}'>

        
        <!-- Display the payment button. -->
        <input type="image" name="submit" border="0"
        src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
        <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
    
    </form>