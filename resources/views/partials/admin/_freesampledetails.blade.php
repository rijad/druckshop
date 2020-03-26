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




<form method="POST" action="{{ route('freesample-edit', ['id'=> $id]) }}">
    @csrf

    <select name="sample_status">
        <option>State</option>
            @foreach($orderstate as $state)
            <option value="{{ $state->order_state }}">{{ $state->order_state }}</option>
            @endforeach
    </select>

    <input type="submit" value="update">
</form>

<table>
    @foreach($freesample as $sample)
        <tr>
            <td>{{ $sample->street }}</td>
        </tr>   
        <tr>
            <td>{{ $sample->house_number }}</td>
        </tr> 
        <tr>
            <td>{{ $sample->zip_code }}</td>
        </tr>  
        <tr>
            <td><a href = '{{asset($sample->document)}}'>Document</a></td>
        </tr>   

    @endforeach
</table>
