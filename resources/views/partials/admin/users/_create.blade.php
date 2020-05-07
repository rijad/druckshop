<div class="card mb-4 mt-4">
    <div class="card-header">

        <h2>Create New User</h2>

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
        <form  class="form-group-inline" method="POST" action="{{ route('store-user') }}" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label class="small mb-1" for="name">Name</label>
                <input class="form-control" type="text" name="name" value="{{ old('name') }}">
                <span class="text-danger">{{ $errors->first('name') }}</span>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="phone">Phone</label>
                <input class="form-control" type="text" name="phone" value="{{ old('phone') }}">
                <span class="text-danger">{{ $errors->first('phone') }}</span>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="email">Email</label>
                <input class="form-control" type="text" name="email" value="{{ old('email') }}">
                <span class="text-danger">{{ $errors->first('email') }}</span>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="password">Password</label>
                <input class="form-control" type="password" name="password" value="{{ old('password') }}">
                <span class="text-danger">{{ $errors->first('password') }}</span>
            </div>

            <div class="form-group">

                <label class="small mb-1" for="roles">Roles</label><br>
                <input type="radio" id="admin" name="role" value="admin">
                <label class="small mb-1" for="admin">Admin</label><br>
                <input type="radio" id="superadmin" name="role" value="superadmin">
                <label class="small mb-1" for="superadmin">Superadmin</label><br>
                <input type="radio" id="employee" name="role" value="employee">
                <label class="small mb-1" for="employee">Employee</label><br>

            </div>
            <div class="form-group">
            <input type="submit" class="btn btn-primary btn-user btn-block col-md-3" value="Submit">
          </div>
      </form>
    </div>
  </div>

</div>

</body>
</html>