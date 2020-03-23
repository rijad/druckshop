<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"><html>
<head>
    <META http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>

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

<div>
  <div>
    <div>
        <form  method="POST" action="{{ route('store-user') }}" enctype="multipart/form-data" 
            target="_blank">
        @csrf
            <div>
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name') }}">
            </div>
            <div>
                <label>Email</label>
                <input type="text" name="email" value="{{ old('email') }}">
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" value="{{ old('password') }}">
            </div>
            <div>

                <label>Roles</label><br>
                <input type="checkbox" id="user" name="user">
                <label for="user">User</label><br>
                <input type="checkbox" id="admin" name="admin">
                <label for="admin">Admin</label><br>
                <input type="checkbox" id="superadmin" name="superadmin">
                <label for="vehicle3">Superadmin</label><br>
                <input type="checkbox" id="employee" name="employee">
                <label for="vehicle3">Employee</label><br>
                <input type="checkbox" id="supervisor" name="supervisor">
                <label for="vehicle3">Supervisor</label><br>

            </div>
            <div>
                <button type="submit" value="create" name="create">Create</button>
            </div>
      </form>
    </div>
  </div>

</div>

</body>
</html>