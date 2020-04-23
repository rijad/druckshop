<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Free Sample State</h2>

        <div class="card-body col-md-6">

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif  
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            @endforeach
        </ul>
    @endif
        <form class="form-group-inline" method="POST" action="{{ route('freesample-edit', ['id'=> $id]) }}">
            @csrf

            <select name="sample_status">
                <option>State</option>
                    @foreach($orderstate as $state)
                    <option value="{{ $state->order_state }}">{{ $state->order_state }}</option>
                    @endforeach
            </select>
                <input type="submit" class="btn btn-primary" value="update">
        </form>
    </div>
  </div>

</div> 

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Street</th>
                                        <th>House no</th>
                                        <th>Zipcode</th>
                                        <th>Document</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Street</th>
                                        <th>House no</th>
                                        <th>Zipcode</th>
                                        <th>Document</th>
                                    </tr>
                                </tfoot>
                                <tbody> 
                                @foreach($freesample as $sample)
                                    <tr>
                                        <td>{{ $sample->street }}</td>
                                        <td>{{ $sample->house_number }}</td>
                                        <td>{{ $sample->zip_code }}</td>
                                        <td><a href = '{{asset($sample->document)}}'>Document</a></td>
                                    </tr>  
                                    @endforeach
                                </tbody>
                            </table>
