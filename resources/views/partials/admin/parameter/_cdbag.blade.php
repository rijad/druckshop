<div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Cdbag</div>
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
                                    @foreach($cdbag as $bag)
                                    <tr>
                                        <td>{{ $bag->bag }}</td>
                                        <td>
                                        <form method="GET" action="{{ route('cdbag.edit' , $bag->id) }}">
                                                <input type="submit" value="edit" >
                                            </form>
                                            <form method="POST" action="{{ route('cdbag.destroy' , $bag->id) }}">
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