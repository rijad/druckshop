@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif 
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('order-edit', ['id'=> $orderhistory->id]) }}">
    @csrf

<select name="state">
    <option>State</option>
        @foreach($orderstate as $state)
        <option value="{{ $state->order_state }}">{{ $state->order_state }}</option>
        @endforeach
</select>

<select name="priority">
    <option>Priority</option>
    <option value="highest">Highest</option> 
    <option value="high">High</option>
    <option value="normal">Normal</option>
    <option value="low">Low</option>
    <option value="lowest">Lowest</option>
</select>

<select name="assigned_to">
    <option>Assigned To</option>                                                                                
        @foreach($users as $list)
        <option value="{{ $list->id }}">{{ $list->name }}</option>
        @endforeach
</select>
    <input type="submit" value="update">
</form> 

<table>
    <tr> <th colspan="3">Order ID {{ Request()->order_id }}</th> </tr>
    @foreach($orderhistory->orderProductHistory as $count=>$order)
    <tr> <th colspan="3">Product {{$count + 1}}</th></tr>
    <tr> <th colspan="3">No of Copies {{ $order->no_of_copies }}</th></tr>
    <tr> <th colspan="3">No of CDs {{ $order->no_of_cds }}</th></tr>
    <tr> <th colspan="3">Shipping Addresss {{ $order->shipping_address }}</th></tr>
    <tr> <th colspan="3">Billing Address {{ $order->billing_address }}</th></tr>
    <tr><th>Product Attributes</th> <th>Actions</th></tr>
        @foreach(json_decode($order->attribute ,true) as $key=>$value)
        @if($key != "_token")
        <tr>
            <td>{{showDetails($key , $value)}}</td>
            <td>@if($key == "selectfile_backcover" || $key == "selectfile_coversheet" || $key == "selectfile_content" || $key == "selectfile_din_A3" || $key == "selectfile_din_A2" || $key == "selectfile_logo" || $key == "selectfile_file" || $key == "selectfile_cd" || $key == "selectfile_logo_cd") @if($value != null ) <a href={{url('/').'/public/uploads/'.$value}} target="_blank" >Download</a> @endif @endif

            @if($key == "selectfile_backcover" || $key == "selectfile_coversheet" || $key == "selectfile_content" || $key == "selectfile_din_A3" || $key == "selectfile_din_A2" || $key == "selectfile_logo" || $key == "selectfile_file" || $key == "selectfile_cd" || $key == "selectfile_logo_cd") @if($value != null )<a href="{{route('defected-order-email',['user_id'=>$order->user_id,'order_id'=>$order->order_id,'old-file-name'=>$value])}}" >Send Mail</a> @endif @endif</td>
        </tr>
        @endif
        @endforeach                                                                     
    @endforeach
</table> 