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
            <form  method="POST" action="{{ route('discount.store') }}" enctype="multipart/form-data" 
                target="_blank">
                @csrf
                <div>
                    <label>Name</label>
                    <input type="text" name="code" value="{{ old('code') }}">
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
                    <label>From Date</label>
                    <input type="date" id="from_date" name="from_date" value="{{ old('from_date') }}">
                </div>
                <div>
                    <label>To Date</label>
                    <input type="date" id="to_date" name="to_date" value="{{ old('to_date') }}">
                </div>
                <div>
                    <input type="radio" id="by_price" name="by_discount" value="by_price">
                    <label for="by_price">By_Price</label><br>
                    <input type="radio" id="by_percent" name="by_discount" value="by_percent">
                    <label for="by_percent">By_Percent</label><br>
                    
                </div>
                <div>
                    <label>Discount</label>
                    <input type="text" name="discount" value="{{ old('discount') }}">
                </div>
                <div>
                    <input type="checkbox" id="needs_code" name="needs_code" checked>
                    <label for="needs_code">Needs Code</label><br>
                </div>
                <div>
                    <input type="checkbox" id="status" name="status">
                    <label for="status">Active</label><br>
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