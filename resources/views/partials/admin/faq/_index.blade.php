<div class="card mb-4 mt-4">
    <div class="card-header"><span>FAQ</span>

        <div class="float-right">
            <form method="GET" action="{{ route('FAQ.create') }}">
                <input type="submit" value="Create New FAQ" class="btn btn-primary">
            </form>
        </div>
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
                                        <th>Title_english</th>
                                        <th>Title_german</th>
                                        <th>Text_english</th>
                                        <th>Text_german</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Title_english</th>
                                        <th>Title_german</th>
                                        <th>Text_english</th>
                                        <th>Text_german</th>
                                        <th>Actions</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                @foreach($faq as $fq)
                                    <tr>
                                        <td>{{ $fq->title_english }}</td>
                                        <td>{{ $fq->title_german }}</td>
                                        <td>{{ substr(($fq->text_english),0,200) }}</td>
                                        <td>{{ substr(($fq->text_german),0,200) }}</td>
                                        <td class="form-inline">
                                            <form method="GET" action="{{ route('FAQ.edit' , $fq->id) }}">
                                                <input type="submit" value="edit" class="btn btn-success">
                                            </form>
                                            <form method="GET" action="{{ route('FAQ.destroy' , $fq->id) }}"class="ml-2">
                                                 <input type="submit" value="delete" class="btn btn-danger">
                                            </form>
                                        </td>
                                    </tr>  
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>