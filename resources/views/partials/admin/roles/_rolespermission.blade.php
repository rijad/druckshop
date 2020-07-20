<div class="card mb-4 mt-4">
    <div class="card-header"><span>Roles & Permissions</span>
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
                                        @foreach($rows as $row)
                                            <th>{{ ($row->permission_name  == 'Send link for new file')? 'Send mail to upload file':$row->permission_name }}
                                                </th>
                                        @endforeach
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>S No.</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        @foreach($rows as $row)
                                            <th>{{ $row->permission_name}}</th>
                                        @endforeach
                                        <th>Actions</th>
                                    </tr>
                                </tfoot> 
                                
                                <tbody>
                                    @if(!empty($permission_details))
                                        @foreach($permission_details as $index => $detail)
                                            <tr>
                                                <form method="GET" action="{{route('roles-update', $detail->id )}}" class="ml-2">
                                                    @csrf
                                                    <td>{{ $index +1 }}</td>
                                                    <td>{{ $detail->name }}</td>
                                                    <td>@if($detail->role == '2'){{'Employee'}} @endif</td>
                                                    @if(!empty($detail->rolePermission->permissions))
                                                        @foreach(json_decode($detail->rolePermission->permissions , true) as $key=>$value)
                                                            <td>
                                                                <input type="checkbox" value="{{ $value }}" <?= ($value == 1)? 'checked':''?> name="{{ $key }}">
                                                            </td>
                                                        @endforeach
                                                    @else
                                                        @foreach($rows as $key=>$value)
                                                                <td>
                                                                    <input type="checkbox" value="{{ $value->permission_name }}" name="{{ $value->permission_name }}">
                                                                </td>
                                                        @endforeach
                                                    @endif

                                                    <td class="form-inline">
                                                        <input type="submit" value="save" class="btn btn-success">
                                                    </td>
                                                </form>
                                            </tr>  
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>