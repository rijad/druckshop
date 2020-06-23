@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif 

<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Create New Delivery Services</h2>

        <div class="card-body col-md-6">
            @if (session('status')) 
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                @endforeach
            </ul>
            @endif

            <form class="form-group-inline" method="POST" action="{{ route('deliveryService.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="small mb-1" for="name">Name</label> 
                    <input class="form-control" id="name" name="name" type="text" placeholder="Name" required />
                </div>
 
                <div class="form-group"> 
                    <label class="small mb-1" for="name">Link To Shipment Tracking</label>
                    <input class="form-control" id="shipment_tracking_link" name="shipment_tracking_link" type="text" placeholder="Shipment Tracking Link" />
                </div>

                <div class="form-group rv-responsivetable"> 
                    <table id="dilivery_services_table">
                        <tr class="form-inline form-inline-row">
                            <th class="rv-headLt">From</th>
                            <th class="rv-headBt">To</th> 
                            <th class="rv-headRRt">Price</th>
                        </tr>

                        <tr class="form-inline form-inline-row">
                            <td class="rv-headLtchild1"><input id="from" type="hidden" name="from[]" value="0" />0</td>
                            <td class="rv-headLtchild"><input class="form-control to_input" id="to" type="number" name="to[]" required /></td>
                            <td class="rv-headRtchild3"><input class="form-control price_input" id="price" type="number" step="0.01" name="price[]" required onchange="decimalplace(this);" onkeyup="decimalplace(this);"/></td>
                        </tr>

                    </table>

                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-sm mr-2" id="delivery_add_more" disabled="true"> <span>Add new row</span></button>
                        <button type="button" class="btn btn-danger btn-sm mr-2" id="delivery_remove_last"> <span>Remove last row</span></button>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="active" checked>
                        <label class="custom-control-label" for="customCheck">Active</label>
                    </div>
                </div>

                <div class="form-inline">
                    <a href="{{ url('/admin/details/DeliveryService/11') }}" class="btn btn-secondary btn-user btn-block col-md-3">Back</a>
                    <input type="submit" class="btn btn-primary btn-user btn-block col-md-3" value="Add">
                </div>


            </form>

        </div>

    </div>


    <style>
    tr>th {
        padding: 8px;
    }

    tr>td {
        padding: 8px;
    }
</style>


<script type="text/javascript">
    
function decimalplace(value =""){
  $(value).val(parseFloat($(value).val()).toFixed(2));
}
    
</script>