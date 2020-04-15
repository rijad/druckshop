<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Edit Delivery Services</h2>

        <div class="card-body col-md-8">

            <form class="form-group-inline" method="POST" action="{{ route('deliveryService.update', $data->id) }}" enctype="multipart/form-data">
                @method('PUT')    
                @csrf
                <div class="form-group">
                    <label class="small mb-1" for="name">Name</label>
                    <input class="form-control col-md-8" id="name" name="name" value="{{ $data->delivery_service }}" type="text" placeholder="Name" required />
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="name">Shipment Tracking Link</label>
                    <input class="form-control col-md-8" id="shipment_tracking_link" name="shipment_tracking_link" value="{{ $data->shipment_tracking_link }}" type="text" placeholder="Shipment Tracking Link" />
                </div>

                <div class="form-group ">
                    <table id="dilivery_services_table_edit">
                        <tr class="form-inline">
                            <th>From</th>
                            <th>To</th>
                            <th>Price</th>
                        </tr>

                        @if(!empty($attributes))
                        @foreach ($attributes as $key => $value)
                        <tr class="form-inline">
                            <input id="from" type="hidden" name="id[]" value="{{ $value['id'] }}" />
                            <td><input id="from" type="hidden" name="from[]" value="{{ $value['ds_from'] }}" />{{ $value['ds_from'] }}</td>

                            <td><?php  if(!empty($attributes[$key+1]['id'])){  ?>

                                <input class="form-control to_input" id="to" type="hidden" name="to[]" value="{{ $value['ds_to'] }}" required />{{ $value['ds_to'] }}
                                <?php }else{ ?>

                                <input class="form-control to_input" id="to" type="number" name="to[]" value="{{ $value['ds_to'] }}" required />
                                <?php } ?>
                            </td>

                            <td><input class="form-control price_input" id="price" type="number" name="price[]" value="{{ $value['ds_price'] }}" required /></td>
                        </tr>
                        @endforeach
                        @else
                        <tr class="form-inline">
                            <td><input id="from" type="hidden" name="from[]" value="0" />0</td>
                            <td><input class="form-control to_input" id="to" type="number" name="to[]" required /></td>
                            <td><input class="form-control price_input" id="price" type="number" name="price[]" required /></td>
                        </tr>
                        @endif
                        

                    </table>
                    
                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-sm mr-2" id="delivery_edit_add_new_row"    > <span>Add new row</span></button>
                    <button type="button" class="btn btn-danger btn-sm mr-2" id="delivery_edit_remove_last"> <span>Remove last row</span></button>
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" <?php echo ($data->active_status) ? 'checked' : ''; ?> name="active">
                        <label class="custom-control-label" for="customCheck">Active</label>
                    </div>
                </div>

                <div class="form-inline">
                    <a href="{{ URL::previous() }}" class="btn btn-secondary btn-user btn-block col-md-3">Back</a>
                    <input type="submit" class="btn btn-primary btn-user btn-block col-md-3" value="Update">
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