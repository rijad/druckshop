<div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>galer
                    <form method="GET" action="{{ route('gallery.create') }}">
                        <input type="submit" value="New" >
                    </form>
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
                                @foreach($gallery as $gal)
                                    <tr>
                                        <td><img src="{{ asset($gal->image)}}" height="50" width="100" alt="..."></td>
                                        <td>
                                            <form method="POST" action="{{ route('gallery.destroy' , $gal->id) }}">
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