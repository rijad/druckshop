<div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Shipping Address</th>
                                        <th>Billing Address</th>
                                        <th>CD</th>
                                        <th>Last update</th>
                                        <th>No. of copies</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Shipping Address</th>
                                        <th>Billing Address</th>
                                        <th>CD</th>
                                        <th>Last update</th>
                                        <th>No. of copies</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                @foreach($order as $odr)
                                    <tr>
                                        <td>{{ $odr->shipping_address }}</td>
                                        <td>{{ $odr->billing_address }}</td>
                                        <td>{{ $odr->no_of_cds }}</td>
                                        <td>{{ $odr->updated_at }}</td>
                                        <td>{{ $odr->no_of_copies }}</td>
                                        <td>System Architect</td>
                                    </tr>  
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>