
@if(!empty($txn) && $order_details_amt == $order_details->total)
    
	<h1>Your payment has been successful.</h1>
    <h1>Your Payment ID - {{$txn}}</h1>

@else

	<h1>Your payment has failed.</h1>
@endif
 