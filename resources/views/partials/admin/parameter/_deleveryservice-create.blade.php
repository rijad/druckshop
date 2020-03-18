<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Create New Delevery Services</h2>

        <div class="card-body col-md-6">

            <form class="form-group-inline">
                <div class="form-group">
                    <label class="small mb-1" for="name">Name</label>
                    <input class="form-control" id="name" type="text" placeholder="Name" />
                </div>

                <div class="form-group form-inline">
                    <table>
                        <tr>
                            <th>From</th>
                            <th>To</th>
                            <th>Price</th>
                        </tr>

                        <tr>
                            <td>0</td>
                            <td><input class="form-control" id="to" type="number" /></td>
                            <td><input class="form-control" id="price" type="number" /></td>
                        </tr>

                    </table>

                </div>

                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-sm mr-2"> <span>Add new row</span></button>
                    <button type="button" class="btn btn-danger btn-sm mr-2"> <span>Remove last row</span></button>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Active</label>
                    </div>
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary btn-user btn-block col-md-3" name="Add" value="Add">
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