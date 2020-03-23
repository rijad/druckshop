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
    <form  method="POST" action="{{ route('covercolor.update' , $covercolor->id) }}" enctype="multipart/form-data" 
            target="_blank">
        @method('PUT')
        @csrf
            <div>
                <label>Name</label>
                <input type="text" name="color" value="{{ $covercolor->color }}">
            </div>
            <div>
                <label>Name in English</label>
                <input type="text" name="name_english" value="{{ $covercolor->name_english }}">
            </div>
            <div>
                <label>Name in German</label>
                <input type="text" name="name_german" value="{{ $covercolor->name_german }}">
            </div>
            <div>
                <input type="checkbox" id="status" name="status" checked>
                <label for="status">Active</label><br>
            </div>
            <div>
                <button type="update" value="update" name="update">Update</button>
            </div>
      </form>
    </div>
  </div>

</div>

</body>
</html>