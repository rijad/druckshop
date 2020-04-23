
<div class="card mb-4 mt-4">
    <div class="card-header"><span>Free Samples</span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>State</th>
                        <th>Order_id</th>
                        <th>Actions</th>
                    </tr>
                </thead> 
                <tfoot>
                    <tr>
                        <th>State</th>
                        <th>Order_id</th>
                        <th>Actions</th> 
                    </tr>
                </tfoot>
                <tbody>

                    @foreach($freesample as $sample)
                    <tr>
                        <td>{{ $sample->sample_status }}</td>
                        <td>{{ $sample->order_id }}</td>
                        <td>
                            <button onclick="window.location='{{route('freesample-details' , 
                                    ['id'=>$sample->id ]) }}'" class="remove_btn"> Details </button>
                        </td>
                    </tr>  
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>