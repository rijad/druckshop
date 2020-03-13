<div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Cover Sheet</div>
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
                                    @foreach($coversheet as $sheet)
                                    <tr>
                                        <td>{{ $sheet->sheet }}</td>
                                        <td>
                                            <form method="GET">
                                                <input type="submit" value="edit" >
                                            </form>
                                            <form method="GET">
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