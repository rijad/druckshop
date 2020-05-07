<div class="card mb-4 mt-4">
    <div class="card-header"><span>Gallery</span>

        <div class="float-right">
            <form method="GET" action="{{ route('gallery.create') }}">
                <input type="submit" value="Create New Gallery" class="btn btn-primary">
            </form>
        </div>
    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Actions</th> 
                                    </tr>
                                </thead> 
                                <tfoot>
                                    <tr>
                                        <th>Image</th>
                                        <th>Actions</th> 
                                    </tr>
                                </tfoot> 
                                <tbody>
                                    @if(!empty($gallery))
                                        @foreach($gallery as $gal)
                                        <tr>
                                            <td><img src="{{ asset($gal->image)}}" height="50" width="100" alt="..."></td>
                                            <td class="form-inline">
                                                <form method="POST" action="{{ route('gallery.destroy' , $gal->id) }}">
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