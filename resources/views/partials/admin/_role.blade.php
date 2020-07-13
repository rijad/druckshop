<div class="card mb-4 mt-4">
    <div class="card-header"><span>Roles</span>
    </div>
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>S No.</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        @if (Session::get('RoleMiddleware') == true)
                                            <th>Actions</th>
                                        @elseif (Session::get('RoleMiddleware') == false)
                                        @endif 
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>S No.</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        @if (Session::get('RoleMiddleware') == true)
                                            <th>Actions</th>
                                        @elseif (Session::get('RoleMiddleware') == false)
                                        @endif 
                                    </tr>
                                </tfoot> 
                                
                                <tbody>
                                    @if(!empty($names))
                                        @foreach($names as $index => $name)
                                            <tr>
                                                <form method="GET" action="{{route('user-roles-update', $name->id )}}" class="ml-2">
                                                    @csrf
                                                    <td>{{ $index +1 }}</td>
                                                    <td>{{ $name->name }}</td>
                                                    <td>
                                                        @foreach($roles as $role)
                                                            <div class="form-group admin-role-main">
                                                                
                                                                <input class = "admin-role-radio" type="radio" name="role" value="@if($role->role == 'SuperAdmin'){{'0'}}
                                                                                                        @elseif($role->role == 'Admin'){{'1'}}
                                                                                                        @elseif($role->role == 'Employee'){{'2'}}
                                                                                                        @endif" 
                                                                                                        <?php echo ($name->role == '0' && $role->role == 'SuperAdmin') ? 'checked':'' ?>
                                                                                                        <?php echo ($name->role == '1' && $role->role == 'Admin') ? 'checked':'' ?>
                                                                                                        <?php echo ($name->role == '2' && $role->role == 'Employee') ? 'checked':'' ?> >
                                                                <label class="small mb-1">{{ $role->role }}</label>
                                                            </div>
                                                        @endforeach
                                                    </td>
                                                @if (Session::get('RoleMiddleware') == true)
                                                    <td class="form-inline">
                                                        <input type="submit" value="save" class="btn btn-success">
                                                    </td>
                                                @elseif (Session::get('RoleMiddleware') == false)
                                                @endif 
                                                </form>
                                            </tr>  
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>