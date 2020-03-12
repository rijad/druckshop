<div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Faq
                    <form method="GET" action="{{ route('FAQ.create') }}">
                        <input type="submit" value="New" >
                    </form>
                </div>
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
                                        <td>{{ $fq->text_english }}</td>
                                        <td>{{ $fq->text_german }}</td>
                                        <td>
                                            <form method="GET" action="{{ route('FAQ.edit' , $fq->id) }}">
                                          
                                            <input type="submit" value="edit" >
                                            </form>
                                            <form method="GET" action="{{ route('FAQ.destroy' , $fq->id) }}">
                                          
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