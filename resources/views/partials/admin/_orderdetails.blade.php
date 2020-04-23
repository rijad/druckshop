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
    @foreach($orderhistory->orderProductHistory as $order)
        @foreach(json_decode($order->attribute ,true) as $key=>$value)
        <tr>
            <td>{{showDetails($key , $value)}}</td>
            <td>@if($key == "selectfile" || $key == "selectfile_coversheet" || $key == "selectfile_content" || $key == "selectfile_din_A3" || $key == "selectfile_din_A2" || $key == "selectfile_logo") @if($value != null ) <a href={{url('/').'/public/uploads/'.$value}} target="_blank" >Download</a> @endif @endif</td>
            <td>@if($key == "selectfile" || $key == "selectfile_coversheet" || $key == "selectfile_content" || $key == "selectfile_din_A3" || $key == "selectfile_din_A2" || $key == "selectfile_logo") @if($value != null )
                <a href="{{ route('defected-order-email', ['order_id'=>$order->order_id,'old_file_name'=>$value, 'user_id' => $order->user_id ])}}" role="button">   |   Send Mail
                </a>
                 @endif @endif</td>
        </tr>
        @endforeach                                                                     
    @endforeach
</table> 