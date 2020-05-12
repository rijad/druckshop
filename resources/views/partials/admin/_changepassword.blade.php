<div class="card mb-4 mt-4">
  <div class="card-header">
    <h2>Change Password</h2>

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

    <div class="form-group col-md-6">
        <form  class="form-group-inline" method="POST" action="{{ route('changepassword.update', ['id'=> $user_id]) }}" 
        enctype="multipart/form-data" >
        @method('PUT')
        @csrf

            <div class="form-group">
                <label class="small mb-1" for="name">Old Password</label>
                <input class="form-control" type="password" name="old_password" required>
                <span class="text-danger">{{ $errors->first('old_password') }}</span>
            </div>

            <div class="form-group">
                <label class="small mb-1" for="name">New Password</label>
                <input class="form-control" type="password" name="password" required>
                <span class="text-danger">{{ $errors->first('new_password') }}</span>
            </div>

            <div class="form-group">
                <label class="small mb-1" for="name">Confirm Password</label>
                <input class="form-control" type="password" name="confirm_password" required>
                <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-user btn-block col-md-3" value="Update">
            </div>
        </form>
    </div>
</div>

</div>