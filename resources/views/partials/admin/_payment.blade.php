<div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Payment</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach($payment as $pay)
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                    </tr> 
                                    @endforeach
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                    </tr> 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>