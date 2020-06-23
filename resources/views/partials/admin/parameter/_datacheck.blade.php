<div class="card mb-4 mt-4">
    <div class="card-header"><span>Data Check</span>

        <div class="float-right">
            <a href="{{ url('/admin/parameter') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if(!empty($datacheck))
                                        @foreach($datacheck as $check)
                                        <tr>
                                            <td>{{ $check->check_list }}</td>
                                            <td><?= ($check->status == 1)? 'Active' : 'InActive'?></td>
                                            <td class="form-inline">
                                                <form method="GET" action="{{ route('datacheck.edit' , $check->id) }}">
                                                    <input type="submit" value="edit" class="btn btn-success">
                                                </form>
                                                {{-- <form method="POST" action="{{ route('datacheck.destroy' , $check->id) }}" class="ml-2">
                                                @method('DELETE')
                                                @csrf
                                                    <input type="hidden" name="status" value="{{$check->status}}">
                                                    <input type="submit" value="delete" class="btn btn-danger">
                                                </form> --}}
                                            </td>
                                        </tr> 
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>