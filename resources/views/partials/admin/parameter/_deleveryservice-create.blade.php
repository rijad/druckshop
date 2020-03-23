<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Create New Delevery Services</h2>

        <div class="card-body col-md-6">

            <form class="form-group-inline" method="POST" action="{{ route('deliveryService.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="small mb-1" for="name">Name</label>
                    <input class="form-control" id="name" name="name" type="text" placeholder="Name" required />
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

                        <div class="after-add-more form-inline">
                            <div><input id="from" type="hidden" name="from[]" value="0" />0</div>
                            <div><input class="form-control" id="to" type="number" name="to[]" required /></div>
                            <div><input class="form-control" id="price" type="number" name="price[]" required /></div>
                        </div>


                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-sm mr-2 add-more"> <span>Add new row</span></button>
                    <!-- <button type="button" class="btn btn-danger btn-sm mr-2 remove"> <span>Remove last row</span></button> -->
                </div>

                <div class="control-group copy hide" style="display:none">

                    <div class="control-group form-inline">
                        <div><input id="from" type="hidden" name="from[]" value="0" />0</div>
                        <div><input class="form-control" id="to" type="number" name="to[]"  /></div>
                        <div><input class="form-control" id="price" type="number" name="price[]"  /></div>
                        <div><button type="button" class="btn btn-danger btn-sm mr-2 remove"> <span>Remove</span></button></div>
                    </div>

                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="active">
                        <label class="custom-control-label" for="customCheck">Active</label>
                    </div>
                </div>

                <div class="form-group">
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