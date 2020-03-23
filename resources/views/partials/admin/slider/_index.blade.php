<div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Slider
                    <form method="GET" action="{{ route('slider.create') }}">
                        <input type="submit" value="New" >
                    </form>
                </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Active</th>
                                        <th>Is_Slide</th>
                                        <th>Actions</th> 
                                    </tr>
                                </thead> 
                                <tfoot>
                                    <tr>
                                        <th>Image</th>
                                        <th>Active</th>
                                        <th>Is_Slide</th>
                                        <th>Actions</th> 
                                    </tr>
                                </tfoot> 
                                <tbody>
                                @foreach($slider as $slid)
                                    <tr>
                                        <td><img src="{{ asset($slid->image_path)}}" height="50" width="100" alt="..."></td>
                                        <td>{{ $slid->is_active }}</td>
                                        <td>{{ $slid->is_slide }}</td>
                                        <td>
                                            <form method="GET" action="{{ route('slider.edit' , $slid->id) }}">
                                          
                                            <input type="submit" value="edit" >
                                            </form>
                                            <form method="POST" action="{{ route('slider.destroy' , $slid->id) }}">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" value="delete" >
                                            </form>
                                        </td>
                                    </tr>  
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>