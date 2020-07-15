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

            <label for="state">State:</label> 
            <select name="state">
                    @if(!empty($orderstate))
                        @foreach($orderstate as $state)
                        <option value="{{ $state->order_state }}" <?= ($order->state == $state->order_state)? 'selected' : ''?> >{{ $state->order_state }}</option>
                        @endforeach
                    @endif
            </select>

            <label for="priority">Priority:</label> 
            <select name="priority">
                <option <?= ($order->priority =='highest')? 'selected' : ''?> value="highest">Highest</option> 
                <option <?= ($order->priority =='high')? 'selected' : ''?> value="high">High</option>
                <option <?= ($order->priority =='normal')? 'selected' : ''?> value="normal">Normal</option>
                <option <?= ($order->priority =='low')? 'selected' : ''?> value="low">Low</option>
                <option <?= ($order->priority =='lowest')? 'selected' : ''?> value="lowest">Lowest</option>
            </select>

            <label for="assigned_to">Assigned To:</label>
            <select name="assigned_to">
                    @if(!empty($users))                                                                              
                        @foreach($users as $list)
                        <option <?= ($order->assigned_to ==$list->id)? 'selected' : ''?> value="{{ $list->id }}">{{ $list->name }}</option>
                        @endforeach
                    @endif
            </select>

            
            @if (Session::get('Change Orders Attributes') == true)
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update">
                </div>
            @elseif (Session::get('Change Orders Attributes') == false)
                <div class="form-group">
                </div>
            @endif 
            
        </form>

    <div class="form-group">
        <a href="{{ url('/admin/order') }}" class="btn btn-secondary btn-user btn-block col-md-3">Back</a>
    </div>
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
                            {{-- <th>Shipping Addresss</th> --}}
                            <th colspan = "3">Billing Address</th>
                            {{-- <th>Shipping Company</th> --}}
                            <th>Price</th>
                        </tr>
                    </thead>
                    <thead>
                        <tr>
                            <td>{{ Request()->order_id }}</td>
                            <td>{{ $order->attribute_desc}}</td>
                            <td>{{ $order->no_of_copies }}</td>
                            <td>{{ $order->no_of_cds }}</td>
                           {{--  <td>{{ $order->shipping_address }}</td> --}}
                            <td colspan = "3">{{ $order->billing_address }}</td>
                            {{-- <td>{{ $order->shipping_company }}</td> --}}
                            <td>{{ number_format($order->price_product_qty,2) }}</td>
                        </tr>
                    </thead>
                    <tr>
                        <th colspan='8'> <center>Files Uploaded</center> </th>
                    </tr> 

                    <tr> 
                        <th>S.No</th> 
                        <th colspan='4'>File</th>  
                        <th colspan='4'>Actions</th>    

                    </tr>
                    <?php $i = 1; ?>
                    @foreach(json_decode($order->attribute ,true) as $key=>$value)
                    @if($key == "selectfile_backcover" || $key == "selectfile_coversheet" || $key == "selectfile_content" || $key == "selectfile_din_A3" || $key == "selectfile_din_A2" || $key == "selectfile_logo" || $key == "selectfile_file" || $key == "selectfile_cd" || $key == "selectfile_logo_cd" || $key == "selectfile_upload_cd_without_logo" || $key == "embossment-template-name" || $key == "cd-template-name") 
                        @if($value != null ) 
                            <tr>
                                <td>{{$i++}}</td>
                                <td colspan='4'>
                                    @if($key == "selectfile_backcover") {{'Back Cover File'}} @endif
                                    @if($key == "selectfile_coversheet") {{'Cover Sheet File'}} @endif
                                    @if($key == "selectfile_content") {{'Thesis File'}} @endif
                                    @if($key == "selectfile_din_A3") {{'Upload DIN A3 pages'}} @endif
                                    @if($key == "selectfile_din_A2") {{'Upload DIN A2 Pages'}} @endif
                                    @if($key == "selectfile_logo") {{'Upload Logo for binding template'}} @endif
                                    @if($key == "selectfile_cd") {{'Upload file(s) on CD'}} @endif
                                    @if($key == "selectfile_logo_cd") {{'Upload logo for CD template'}} @endif
                                    @if($key == "selectfile_upload_cd_without_logo") {{'Upload own CD template'}} @endif
                                    @if($key == "embossment-template-name") {{'Embossment Template File'}} @endif
                                    @if($key == "cd-template-name") {{'CD Template File'}} @endif
                                    @if($key == "selectfile_file") {{'Upload Own Binding Template'}} @endif
                                </td>
  

                                <td colspan='3'>@if($key == "selectfile_backcover" || $key == "selectfile_coversheet" || $key == "selectfile_content" || $key == "selectfile_din_A3" || $key == "selectfile_din_A2" || $key == "selectfile_logo" || $key == "selectfile_file" || $key == "selectfile_cd" || $key == "selectfile_logo_cd" || $key == "selectfile_upload_cd_without_logo") @if($value != null ) 

                                     

                                        @if($key == "selectfile_cd") 
                                            @foreach(explode(',', $value) as $key_file => $info) 
                                               @if($info != "")
                                                 <a href={{url('/').'/public/uploads/'.$info}} target="_blank" >Download File {{$key_file+1}}</a><br>
                                               @endif  
                                               @if($key == "selectfile_backcover" || $key == "selectfile_coversheet" || $key == "selectfile_content" || $key == "selectfile_din_A3" || $key == "selectfile_din_A2" || $key == "selectfile_logo" || $key == "selectfile_file" || $key == "selectfile_cd" || $key == "selectfile_logo_cd" || $key == "selectfile_upload_cd_without_logo" || $key == "embossment-template-name" || $key == "cd-template-name") 
                                            
                                            @if (Session::get('Send link for new file') == true)

                                               @if($value != null )<a href="{{route('defected-order-email',['user_id'=>$order->user_id,'order_id'=>$order->order_id,'old-file-name'=>$value])}}" >Send Mail</a> 
                                               @endif 
                                             @endif 

                                               @endif
                                            @endforeach
                                        @else
                                        <a href={{url('/').'/public/uploads/'.$value}} target="_blank" >Download</a>
                                        @endif
                                        @endif @endif

                                        @if($key == "embossment-template-name") @if($value != null ) <a href={{url('/').'/public/images/templates/Binding_template/'.$value}} target="_blank" >Download</a> @endif @endif

                                            @if($key == "cd-template-name") @if($value != null ) 

                                                <a href={{url('/').'/public/images/templates/cd_template/'.$value}} target="_blank" >Download</a>

                                             @endif 

                                         @endif
                                         <br>
                                          @if($key == "selectfile_backcover" || $key == "selectfile_coversheet" || $key == "selectfile_content" || $key == "selectfile_din_A3" || $key == "selectfile_din_A2" || $key == "selectfile_logo" || $key == "selectfile_file" || $key == "selectfile_cd" || $key == "selectfile_logo_cd" || $key == "selectfile_upload_cd_without_logo" || $key == "embossment-template-name" || $key == "cd-template-name")
                                                
                                                 @if (Session::get('Send link for new file') == true)

                                                     @if($value != null )<a href="{{route('defected-order-email',['user_id'=>$order->user_id,'order_id'=>$order->order_id,'old-file-name'=>$value])}}" >Send Mail</a> @endif @endif

                                                 @endif
                                   
                                </td>   
                            </tr>
                        @endif  
                    @endif
                    @endforeach
                    
                    <tr><th colspan = "8"><center>Order - Shipping Addresses Details</center></th></tr>

                    <tr>
                    <th>S.no</th>
                    <th>No of Copies</th>
                    <th>No of CDs</th>
                    <th  colspan = "4">Shipping Address</th>
                    <th>Shipping Company</th>
                    </tr>  

                    @foreach($splitOrder as $key=>$details)
                    
                    <tr>
                    <td> {{ $key + 1 }} </td>
                    <td> {{$details->no_of_copies}} </td>
                    <td> {{$details->no_of_cds}}  </td>
                    <td  colspan = "4"> {{$details->shipping_address}}  </td>
                    <td>{{getShippingCompanyById($details->shipping_company)}}</td>
                    </tr>

                    @endforeach
                </table>
            @endforeach 
        </div>
    </div>
    <div class="form-group">
        <a href="{{ url('/admin/order') }}" class="btn btn-secondary btn-user btn-block col-md-3">Back</a>
    </div>