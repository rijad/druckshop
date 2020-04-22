
<div class="card mb-4 mt-4">
    <div class="card-header"><span>Newsletter</span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Created at</th>
                        <th>Actions</th>
                    </tr>
                </thead> 
                <tfoot>
                    <tr>
                        <th>Email</th>
                        <th>Created at</th>
                        <th>Actions</th> 
                    </tr>
                </tfoot>
                <tbody>

                    @foreach($newsletter as $news)
                    <tr>
                        <td>{{ $news->email }}</td>
                        <td>{{ $news->created_at->format('d M,Y') }}</td>
                        <td>
                            <form method="GET" action="#">              
                                <input type="submit" value="reply" class="btn btn-success">
                          </form>
                        </td>
                    </tr>  
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>