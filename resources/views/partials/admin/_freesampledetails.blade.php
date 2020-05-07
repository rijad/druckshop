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

                @if(!empty($orderstate))
                    <select name="sample_status">
                        <option>State</option>
                            @foreach($orderstate as $state)
                            <option value="{{ $state->order_state }}">{{ $state->order_state }}</option>
                            @endforeach
                    </select>
                @endif
                    <input type="submit" class="btn btn-primary" value="update">
            </form>
        </div>
    </div>

</div> 

                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Sample State</th>
                                        <th>Side Options</th>
                                        <th>Paper Weight</th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Company</th>
                                        <th>Street</th>
                                        <th>House no</th>
                                        <th>Addtion to Address</th>
                                        <th>City</th>
                                        <th>Zipcode</th>
                                        <th>Document</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Sample State</th>
                                        <th>Side Options</th>
                                        <th>Paper Weight</th>
                                        <th>Last Name</th>
                                        <th>First Name</th>
                                        <th>Company</th>
                                        <th>Street</th>
                                        <th>House no</th>
                                        <th>Addition to Address</th>
                                        <th>City</th>
                                        <th>Zipcode</th>
                                        <th>Document</th>
                                    </tr>
                                </tfoot>
                                <tbody> 
                                    @if(!empty($freesample))
                                        @foreach($freesample as $sample)
                                            <tr>
                                                <td>{{ $sample->sample_status }}</td>
                                                <td>{{ $sample->side_option }}</td>
                                                <td>{{ $sample->paper_weight }}</td>
                                                <td>{{ $sample->last_name }}</td>
                                                <td>{{ $sample->first_name }}</td>
                                                <td>{{ $sample->company }}</td>
                                                <td>{{ $sample->street }}</td>
                                                <td>{{ $sample->house_number }}</td>
                                                <td>{{ $sample->addition_to_address }}</td>
                                                <td>{{ $sample->city }}</td>
                                                <td>{{ $sample->zip_code }}</td>
                                                <td><a href = '{{asset($sample->document)}}'>Document</a></td>
                                            </tr>  
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
