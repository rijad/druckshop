<div class="card mb-4 mt-4">
    <div class="card-header"><span>Users</span>

        <div class="float-right">
            <form method="GET" action="{{ route('create-user') }}">
                <input type="submit" value="Create New User" class="btn btn-primary">
            </form>
        </div>
    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th> 
                                        <th>Actions</th> 
                                    </tr>
                                </thead>  
                                <tfoot>
                                    <tr>
                                        <th>User</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Actions</th> 
                                    </tr>
                                </tfoot> 
                                <tbody>
                                @foreach($users as $data)
                                    <tr>
                                        <td>{{$data->name}}</td>
                                        <td>{{$data->email}}</td>
                                        <td>@if($data->role == '0'){{'SuperAdmin'}}
                                            @elseif($data->role == '1'){{'Admin'}}
                                            @elseif($data->role == '2'){{'Employee'}}
                                            @elseif($data->role == '3'){{'User'}}
                                            @elseif($data->role == '4'){{'SuperVisor'}}
                                            @endif</td>
                                        <td>{{$data->status}}</td>
                                        <td class="form-inline">
                                            <form method="GET" action="{{ route('edit-user' , $data->id) }}">
                                            <input type="submit" value="edit" class="btn btn-success">
                                            </form>
                                            <form method="POST" action="{{ route('delete-user' , $data->id) }}" class="ml-2">
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