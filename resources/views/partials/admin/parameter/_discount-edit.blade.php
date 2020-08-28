<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Edit Discount</h2>

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
    <form  class="form-group-inline" method="POST" action="{{ route('discount.update' , $discount->id) }}" 
        enctype="multipart/form-data" >
        @method('PUT')
        @csrf
            <div class="form-group">
                <label class="small mb-1" for="code">Name</label>
                <input class="form-control" type="text" name="code" value="{{ $discount->code }}" required>
                <span class="text-danger">{{ $errors->first('code') }}</span>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="name_english">Name in English</label>
                <input class="form-control" type="text" name="name_english" value="{{ $discount->name_english }}" required>
                <span class="text-danger">{{ $errors->first('name_english') }}</span>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="name_german">Name in German</label>
                <input class="form-control" type="text" name="name_german" value="{{ $discount->name_german }}" required>
                <span class="text-danger">{{ $errors->first('name_german') }}</span>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="name_german">From Date</label>
                <input class="form-control" type="date" id="from_date" name="from_date" value="{{ $discount->from_date }}" required>
            </div>
            <div class="form-group">
                <label class="small mb-1" for="to_date">To Date</label>
                <input class="form-control" type="date" id="to_date" name="to_date" value="{{ $discount->to_date }}" >
            </div>

            <div class="form-group">
                    <label class="small mb-1" for="type">Type</label><br>

                    <input type="radio" id="product_delivery_edit" name="type" value="product_delivery" @if($discount->type == 0){{ 'checked' }} @endif>
                    <label class="small mb-1" for="product_delivery">Free Shipping for First Address</label><br>

                    <input type="radio" id="multiple_edit" name="type" value="multiple" @if($discount->type == 2){{ 'checked' }} @endif>
                    <label class="small mb-1" for="multiple">Multiple Bindings</label><br>
                        <div class="form-inline" id="many">
                            @foreach ($binding as $key => $product)
                            <span class="ml-4">
                            <input type="checkbox" class="form-control" name="product[]" value="{{ $product->id }}" <?php echo (in_array($product->id, json_decode($discount->product_id, true))) ? 'checked' : ''; ?> />{{ $product->title_english }}</span>
                            @endforeach
                        </div>
                </div>

            <div id="percent">

                <div class="form-group">
                    <input type="radio" id="by_price" name="by_discount" value="by_price" <?php echo ($discount->by_price) ? 'checked' : ''; ?>>
                    <label for="by_price">By_Price</label><br>
                    <input type="radio" id="by_percent" name="by_discount" value="by_percent" <?php echo ($discount->by_percent) ? 'checked' : ''; ?>>
                    <label for="by_percent">By_Percent</label><br>
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="discount">Discount</label>
                    <input class="form-control" type="number" step = "0.01" name="discount" value="<?php if($discount->by_price) { echo @$discount->by_price ; } else { echo @$discount->by_percent; } ?>" required>
                    <span class="text-danger">{{ $errors->first('discount') }}</span>
                </div>
            </div>

            <div class="form-group">
                <div class="custom-control custom-checkbox small">
                    <input class="custom-control-input" <?php echo ($discount->status) ? 'checked' : ''; ?> type="checkbox" id="status" name="status">
                    <label class="custom-control-label" for="status">Active</label>
                </div>
            </div>
            <div class="form-inline">
                <a href="{{ url('/admin/details/Discount/10') }}" class="btn btn-secondary btn-user btn-block col-md-3">Back</a>
                <input type="submit" class="btn btn-primary btn-user btn-block col-md-3" value="Update">
            </div>
      </form>
    </div>
  </div>

</div>

</body>
</html>



<script>


    function getDate(){  

        var y = document.getElementById("to_date").value;

        if(y == ''){

            var x = document.getElementById("from_date").value;  
            var date = new Date(x);
            var new_date = new Date(date.setDate(date.getDate() + 30));
            var to_date = new_date.getFullYear().toString() + '-' + (new_date.getMonth() + 1).toString().padStart(2, 0) +'-' + new_date.getDate().toString().padStart(2, 0);
            document.getElementById("to_date").value = to_date;

        }
    }


    window.onload = getDate;


</script>