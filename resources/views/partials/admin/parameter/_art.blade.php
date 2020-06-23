<div class="card mb-4 mt-4">
    <div class="card-header"><span>Art</span>

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
                        @if(!empty($art))
                            @foreach($art as $artlist)
                                <tr>
                                    <td>{{ $artlist->check_list }}</td>
                                    <td><?= ($artlist->status == 1)? 'Active' : 'InActive'?></td>
                                    <td class="form-inline">
                                        <form method="GET" action="{{ route('art.edit' , $artlist->id) }}">
                                        <input type="submit" value="edit" class="btn btn-success">
                                        </form>
                                        {{-- <form method="POST" action="{{ route('art.destroy' , $artlist->id) }}" class="ml-2">
                                            @method('DELETE')
                                            @csrf
                                            <input type="hidden" name="status" value="{{$artlist->status}}">
                                            <input type="submit" value="<?= ($artlist->status == 1) ? 'InActive' : 'Active' ?>" class="btn btn-danger">
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
