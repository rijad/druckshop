<div class="card mb-4 mt-4">
    <div class="card-header"><span>Page Format</span>

        <div class="float-right">
            <form method="GET" action="{{ route('pageformat.create') }}">
                <input type="submit" value="Create New Page Format" class="btn btn-primary">
                <a href="{{ url('/admin/parameter') }}" class="btn btn-secondary">Back</a>
            </form>
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
                                    @if(!empty($pageformat))
                                        @foreach($pageformat as $format)
                                        <tr>
                                            <td>{{ $format->page_format }}</td>
                                            <td><?= ($format->status == 1)? 'Active' : 'InActive'?></td>
                                            <td class="form-inline">
                                                <form method="GET" action="{{ route('pageformat.edit' , $format->id) }}">
                                                    <input type="submit" value="edit" class="btn btn-success">
                                                </form>

                                                <form method="POST" action="{{ route('pageformat.destroy' , $format->id) }}" class="ml-2">
                                                    @method('DELETE')
                                                    @csrf
                                                    {{-- <input type="hidden" name="status" value="{{$format->status}}"> --}}
                                                    <input type="submit" value="<?php echo ($format->status) ? 'InActive' : 'Active'; ?>" class="btn btn-danger">
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