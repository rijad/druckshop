<div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Parameter</div>
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
                                    @foreach($parameter as $para)
                                    <tr>
                                        <td>{{ $para->parameter_list }}</td>
                                        <td>
                                            
                                            <button onclick="window.location='{{route('details' , ['model'=>$para->model,'id'=>$para->id]) }}'" class="remove_btn" > Details </button>
                                        </td>
                                    </tr> 
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>