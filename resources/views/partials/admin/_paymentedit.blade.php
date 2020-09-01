<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Edit Payment Status</h2>

        <div class="card-body col-md-8">

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
            <form class="form-group-inline" method="GET" action="{{ route('payment-update', $payment->id) }}">
                @csrf

                <div class="form-group">
                    <label for="status">Status:</label> 
                    <select name="status">
                        <option <?= ($payment->status =='Completed')? 'selected' : ''?> value="Completed">Completed</option> 
                        <option <?= ($payment->status =='Pending')? 'selected' : ''?> value="Pending">Pending</option>
                    </select>
                </div>

                <div class="form-inline">
                    <a href="{{ url('/admin/payment') }}" class="btn btn-secondary btn-user btn-block col-md-3">Back</a>
                    <input type="submit" class="btn btn-primary btn-user btn-block col-md-3" value="Update">
                </div>

            </form>
        </div>
    </div>
</div>  