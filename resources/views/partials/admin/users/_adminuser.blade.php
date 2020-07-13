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
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        @if (Session::get('RoleMiddleware') == true)
                                            <th>Actions</th>
                                        @elseif (Session::get('RoleMiddleware') == false)
                                        @endif 
                                    </tr>
                                </thead>  

                                <tfoot>
                                    <tr>
                                        <th>User</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        @if (Session::get('RoleMiddleware') == true)
                                            <th>Actions</th>
                                        @elseif (Session::get('RoleMiddleware') == false)
                                        @endif 
                                    </tr>
                                </tfoot>  
                                 
                                <tbody>
                                    @if(!empty($users))
                                        @foreach($users as $data)
                                            <tr>
                                                <td>{{$data->name}}</td>
                                                <td>{{$data->phone}}</td>
                                                <td>{{$data->email}}</td>
                                                <td>@if($data->role == '0'){{'Super Admin'}}
                                                    @elseif($data->role == '1'){{'Admin'}}
                                                    @elseif($data->role == '2'){{'Employee'}}
                                                    @endif</td>
                                                @if (Session::get('RoleMiddleware') == true)
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
                                                @elseif (Session::get('RoleMiddleware') == false)
                                                @endif 
                                            </tr>  
                                        @endforeach
                                    @endif
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>