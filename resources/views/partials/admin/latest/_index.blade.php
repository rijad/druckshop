<div class="card mb-4 mt-4">
    <div class="card-header"><span>Latest</span>

        <div class="float-right">
            <form method="GET" action="{{ route('latest.create') }}">
                <input type="submit" value="Create New Latest" class="btn btn-primary">
            </form>
        </div>
    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <!-- <th>Image</th> -->
                                        <th>Title English</th>
                                        <th>Title_german</th>
                                        <th>Active</th>
                                        <th>Actions</th> 
                                    </tr>
                                </thead> 
                               
                                <tbody>
                                @foreach($latest as $lat)
                                    <tr>
                                        <!-- <td><img src="{{ asset($lat->image)}}" height="50" width="100" alt="..."></td> -->
                                        <td>{{ $lat->title_english }}</td>
                                        <td>{{ $lat->title_german }}</td>
                                        <td>{{ $lat->status }}</td>
                                        <td class="form-inline">
                                            <form method="GET" action="{{ route('latest.edit' , $lat->id) }}">
                                          
                                            <input type="submit" value="edit" class="btn btn-success">
                                            </form>
                                            <form method="POST" action="{{ route('latest.destroy' , $lat->id) }}"class="ml-2">
                                            @method('DELETE')
                                            @csrf
                                             <input type="submit" value="delete" class="btn btn-danger">
                                            </form>
                                        </td>
                                    </tr>  
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>