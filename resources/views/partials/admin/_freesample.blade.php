<div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable</div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bfreesampleed" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>State</th>
                                        <th>Name</th>
                                        <th>City</th>
                                        <th>Street</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>State</th>
                                        <th>Name</th>
                                        <th>City</th>
                                        <th>Street</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                
                                @foreach($freesample as $sample)
                                    <tr>
                                        <td>{{ $sample->sample_status }}</td>
                                        <td>{{ $sample->first_name }}</td>
                                        <td>{{ $sample->city }}</td>
                                        <td>{{ $sample->street }}</td>
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