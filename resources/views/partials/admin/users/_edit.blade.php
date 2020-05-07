<div class="card mb-4 mt-4">
  <div class="card-header">
    <h2>Edit User</h2>

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

      
      <div class="form-group">
        <form  class="form-group-inline" method="GET" action="{{ route('update-user' , $users->id) }}" 
          enctype="multipart/form-data" >
          @csrf
          <div class="form-group">
            <label class="small mb-1" for="name">Name</label>
            <input class="form-control" type="text" name="name" value="{{ $users->name }}">
            <span class="text-danger">{{ $errors->first('name') }}</span>
          </div>

          <div class="form-group">
            <label class="small mb-1" for="name">Phone</label>
            <input class="form-control" type="text" name="phone" value="{{ $users->phone }}">
            <span class="text-danger">{{ $errors->first('phone') }}</span>
          </div>
          

          <div class="form-group">

            <label class="small mb-1" for="roles">Roles</label><br>
            

            <input type="radio" id="admin" name="role" value="admin" @if($users->role == 1){{ 'checked' }} @endif>
            <label for="admin">Admin</label><br>
            <input type="radio" id="superadmin" name="role" value="superadmin" @if($users->role == 0){{ 'checked' }} @endif>
            <label for="vehicle3">Superadmin</label><br>
            <input type="radio" id="employee" name="role" value="employee" @if($users->role == 2){{ 'checked' }} @endif>
            <label for="vehicle3">Employee</label><br>
            
          </div>
          <div class="form-group">
            <input type="submit" class="btn btn-primary btn-user btn-block col-md-3" value="Update">
          </div>
        </form>
      </div>
    </div>

  </div>

</body>
</html>