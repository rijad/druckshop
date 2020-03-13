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
        <form method="POST" action="{{ route('FAQ.update' , $faq->id) }}" enctype="multipart/form-data" 
            target="_blank">
        @method('PUT')
        @csrf
          <div>
            <label>English Title</label>
            <input type="text" name="title_english" value="{{ $faq->title_english }}">
          </div>
          <div>
            <label>German Title</label>
            <input type="text" name="title_german" value="{{ $faq->title_german }}">
          </div>
          <div>
            <label>English Text</label>
            <textarea type="text" name="text_english" >{{ $faq->text_english }}</textarea>
          </div>
          <div>
            <label>German Text</label>
            <textarea type="text" name="text_german" >{{ $faq->text_german }}</textarea>
          </div>
          <div>
              <button type="submit" value="update" name="update">Update</button>
          </div>
      </form>
    </div>
  </div>

</div>

</body>
</html>