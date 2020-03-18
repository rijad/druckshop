<div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Discount
                    <form method="GET" action="{{ route('discount.create') }}">
                        <input type="submit" value="New" >
                    </form>
                </div>
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
                                    @foreach($discount as $disc)
                                    <tr>
                                        <td>{{ $disc->code }}</td>
                                        <td>
                                        <form method="GET" action="{{ route('discount.edit' , $disc->id) }}">
                                                <input type="submit" value="edit" >
                                            </form>
                                            <form method="POST" action="{{ route('discount.destroy' , $disc->id) }}">
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