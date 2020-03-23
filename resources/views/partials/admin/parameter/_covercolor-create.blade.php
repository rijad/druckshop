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
        <form  method="POST" action="{{ route('covercolor.store') }}" enctype="multipart/form-data" 
            target="_blank">
        @csrf
            <div>
                <label>Name</label>
                <input type="text" name="color" value="{{ old('color') }}">
            </div>
            <div>
                <label>Name in English</label>
                <input type="text" name="name_english" value="{{ old('name_english') }}">
            </div>
            <div>
                <label>Name in German</label>
                <input type="text" name="name_german" value="{{ old('name_german') }}">
            </div>
            <div>
                <input type="checkbox" id="active" name="active" checked>
                <label for="active">Active</label><br>
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