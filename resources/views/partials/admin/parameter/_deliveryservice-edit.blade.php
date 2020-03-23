<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Create New Delevery Services</h2>

        <div class="card-body col-md-8">

            <form class="form-group-inline" method="POST" action="{{ route('deliveryService.update', $data->id) }}" enctype="multipart/form-data">
            @method('PUT')    
            @csrf
                <div class="form-group">
                    <label class="small mb-1" for="name">Name</label>
                    <input class="form-control col-md-8" id="name" name="name" value="{{ $data->delivery_service }}" type="text" placeholder="Name" required />
                </div>

                <div class="form-group ">
                    <table>
                        <tr>
                            <th>From</th>
                            <th>To</th>
                            <th>Price</th>
                        </tr>
                    </table>
                    <br>
                    <div class="main_input">
                        @foreach ($attributes as $key => $value)
                        <div class="after-add-more control-group">
                            <div class="edit_remove_for control-group form-inline">
                                <input id="from" type="hidden" name="id[]" value="{{ $value->id }}" />
                                <div><input id="from" type="hidden" name="from[]" value="{{ $value->ds_from }}" />0</div>
                                <div><input class="form-control" id="to" type="number" name="to[]" value="{{ $value->ds_to }}" required /></div>
                                <div><input class="form-control" id="price" type="number" name="price[]" value="{{ $value->ds_price }}" required /></div>
                                <div><button type="button" class="form-control btn btn-danger btn-sm mr-2 edit_remove"> <span>Remove</span></button></div>
                            </div>
                        </div>
                        @endforeach
                    </div>


                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-sm mr-2 add_new_row"> <span>Add new row</span></button>
                    <!-- <button type="button" class="btn btn-danger btn-sm mr-2 remove"> <span>Remove last row</span></button> -->
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" <?php echo ($value->ds_active) ? 'checked' : ''; ?> name="active">
                        <label class="custom-control-label" for="customCheck">Active</label>
                    </div>
                </div>

                <div class="form-group">
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