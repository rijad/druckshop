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

<div class="update-attrib">
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
    <input type="submit" value="update" class="admin-form-button">
</form> 
</div>

{{-- <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable</div> --}}


<div class="card-body" class="order-attrib">
<div class="table-responsive">
    <h1>Product Details</h1>
@foreach($orderhistory->orderProductHistory as $count=>$order)
<br>
<h4>Product Sequence: {{$count + 1}}</h4>
<table class="table table-bordered" id="dataTable" width="90%" cellspacing="0">
<thead>
    <tr>
        <th>Order ID</th>
        <th>Product description</th>
        <th>No of Copies</th>
        <th>No of CDs</th>
        <th>Shipping Addresss</th>
        <th>Billing Address</th>
    </tr>
</thead>
<thead>
    <tr>
        <td>{{ Request()->order_id }}</td>
        <td>{{ $order->attribute_desc}}</td>
        <td>{{ $order->no_of_copies }}</td>
        <td>{{ $order->no_of_cds }}</td>
        <td>{{ $order->shipping_address }}</td>
        <td>{{ $order->billing_address }}</td>
    </tr>
</thead>
<tr>
<th colspan='6'> <center>Files Uploaded</center> </th>
</tr>
<tr>
<th>S.No</th>
<th colspan='3'>File</th>
<th colspan='2'>Actions</th>    
</tr>
<?php $i = 1; ?>
@foreach(json_decode($order->attribute ,true) as $key=>$value)
@if($key == "selectfile_backcover" || $key == "selectfile_coversheet" || $key == "selectfile_content" || $key == "selectfile_din_A3" || $key == "selectfile_din_A2" || $key == "selectfile_logo" || $key == "selectfile_file" || $key == "selectfile_cd" || $key == "selectfile_logo_cd") @if($value != null )
<tr>
<td>{{$i++}}</td>
<td colspan='3'>{{$key}}</td>

<td colspan='2'>@if($key == "selectfile_backcover" || $key == "selectfile_coversheet" || $key == "selectfile_content" || $key == "selectfile_din_A3" || $key == "selectfile_din_A2" || $key == "selectfile_logo" || $key == "selectfile_file" || $key == "selectfile_cd" || $key == "selectfile_logo_cd") @if($value != null ) <a href={{url('/').'/public/uploads/'.$value}} target="_blank" >Download</a> @endif @endif

 @if($key == "selectfile_backcover" || $key == "selectfile_coversheet" || $key == "selectfile_content" || $key == "selectfile_din_A3" || $key == "selectfile_din_A2" || $key == "selectfile_logo" || $key == "selectfile_file" || $key == "selectfile_cd" || $key == "selectfile_logo_cd") @if($value != null )<a href="{{route('defected-order-email',['user_id'=>$order->user_id,'order_id'=>$order->order_id,'old-file-name'=>$value])}}" >Send Mail</a> @endif @endif
</td>   
 
</tr>
 @endif @endif
 @endforeach 
</table>
 @endforeach 
</div>
</div>
