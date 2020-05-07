<div class="card mb-4 mt-4">
    <div class="card-header"><span>CdBag</span></div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @if(!empty($cdbag))
                                        @foreach($cdbag as $bag)
                                        <tr>
                                            <td>{{ $bag->bag }}</td>
                                            <td class="form-inline">
                                            <form method="GET" action="{{ route('cdbag.edit' , $bag->id) }}">
                                                    <input type="submit" value="edit" class="btn btn-success">
                                                </form>
                                                <form method="POST" action="{{ route('cdbag.destroy' , $bag->id) }}" class="ml-2">
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