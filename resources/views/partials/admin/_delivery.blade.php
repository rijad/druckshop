<div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>deliverment</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Delivery_service</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Delivery_service</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($delivery as $deliver)
                                    <tr>
                                        <td>{{ $deliver->delivery_service }}</td>
                                        <td>Details</td>
                                    </tr> 
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>