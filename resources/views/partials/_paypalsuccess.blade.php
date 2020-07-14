
@if(!empty($txn) && $order_details_amt == $order_details->net_amt)
    
	<h1>Your payment has been successful.</h1>
    <h1>Your Order ID - {{$order_details->order_id}}</h1>

@else

	<h1>Your payment has failed.</h1>
@endif
 