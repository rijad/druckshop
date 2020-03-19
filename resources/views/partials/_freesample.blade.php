<div class="container">
    <div class="col-row mb-5"> 

        <div class="product-item-img col-half text-left">
            <span class="img-back"><img src="{{ asset('public/images/product2.jpg')}}" alt="" /></span>
        </div>

        <div class="product-item col-half">
            <h2>Sample with 15 free pages</h2>	
            <p>You just want to print out your work? No problem, 
            with us you can even print and have your work tied up elsewhere.</p>
        </div>
    </div>
        

    <div>

    
        <form action="{{route('free_sample_request')}}" method="POST"> 
		@csrf


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

        <div id="drop_file_zone_cover_sheet" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayNone">
									<div id="drag_upload_file_cover_sheet">
										<p>Drop file here</p>
										<p>or</p>
										<p><input type="button" value="Select File" onclick="file_explorer('drop_file_zone_cover_sheet');"></p>
										<input class = "displayNone" type="file" name="selectfile" id="selectfile" accept="application/pdf" value = "" />
										<input class = "displayNone" type="hidden" name="selectfile_coversheet" id="selectfile_coversheet" value = "" />
									</div>
								</div>
                                
        <div class="form-group">
            <label>Side Option:</label>
             <select name="side_option">
                <option>Please Choose</option>
                <option value="ABC">ABC</option>
                <option value="123">123</option>
            </select>
        </div>
        <div class="form-group">
            <label>Paper Weight:</label>
            <select name="paper_weight">
                <option>Please Choose</option>
                @foreach($paper_weight as $weight)
                <option value="{{$weight->paper_weight}}">{{$weight->paper_weight}}</option>
                @endforeach
            </select>
        </div>

            <h3>Delivery Address</h3>

            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" >
            </div>
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" >
            </div>
            <div class="form-group">
                <label>Company</label>
                <input type="text" name="company" >
            </div>
            <div class="form-group">
                <label>Street</label>
                <input type="text" name="street" >
            </div>
            <div class="form-group">
                <label>House No.</label>
                <input type="text" name="house_number" >
            </div>
            <div class="form-group">
                <label>Addition to Address</label>
                <input type="text" name="addition_to_address" >
            </div>
            <div class="form-group">
                <label>Zip Code</label>
                <input type="text" name="zip_code" >
            </div>
            <div class="form-group">
                <label>City</label>
                <input type="text" name="city" >
            </div>
            <div class="form-group">
                <input type="submit" name="request_free_sample" value="request_free_sample">
            </div>
        </form>
    </div>
</div>		 