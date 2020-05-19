<div class="card mb-4 mt-4">
    <div class="card-header"><span>Slider</span>

        <div class="float-right">
            <form method="GET" action="{{ route('slider.create') }}">
                <input type="submit" value="Create New Slider" class="btn btn-primary">
            </form>
        </div>
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
                                    @if(!empty($slider))
                                        @foreach($slider as $slid)
                                        <tr>
                                            <td><img src="{{ asset($slid->image_path)}}" height="50" width="100" alt="..."></td>
                                            <td><?= ($slid->is_active == 1)? 'Active' : 'InActive'?></td>
                                            <td>{{ $slid->is_slide }}</td>
                                            <td class="form-inline">
                                                <form method="GET" action="{{ route('slider.edit' , $slid->id) }}">
                                            
                                                <input type="submit" value="edit" class="btn btn-success">
                                                </form>
                                                <form method="POST" action="{{ route('slider.destroy' , $slid->id) }}"class="ml-2">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" value="delete" class="btn btn-danger">
                                                </form>
                                            </td>
                                        </tr>  
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>