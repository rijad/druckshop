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
        <form  class="form-group-inline" method="POST" action="{{ route('update-password') }}" 
        enctype="multipart/form-data" >
        @csrf

        <div class="form-group">
         <label class="small mb-1" for="name">Select User</label>
          <select name="user_id" class="select2 form-control" required>

            @if(!empty($data))
            @foreach($data as $key => $item)
            <option value="{{ $item['id'] }}">{{ $item['email'] }}</option>
            @endforeach
            @endif

          </select>
      </div>

      <div class="form-group">
        <label class="small mb-1" for="name">Password</label>
        <input class="form-control" type="password" name="password" required>
        <span class="text-danger">{{ $errors->first('password') }}</span>
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