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
    <div class="align-coloumns"> 
 
        <div id="drop_pdf" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayBlock">
			<div id="drag_upload_file_sample">
                <p>Drop file here<a href="#" data-toggle="tooltip" title="PDF" class="formToolTip">i</a></p> 
				<p>or</p>
				<p><input class = "" type="button" value="Select File" onclick="file_explorer('drop_pdf');"></p>
				<input type="file" name="selectfile" id="selectfile" accept="application/pdf" required>
				
			</div>
		</div>

        <p class="error" id="error_selectfile_pdf"></p> 

        <div id="drop_file_zone_pdf" class="displayNone"><label id="pdf_file_name"></label>
            <label id="pdf_page_no"></label><label id="pdf_del"></label>
        </div>

        <div class="free-sample-form-rv">
            <form action="{{route('free_sample_request')}}" method="POST"> 
    		@csrf

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
                <label>Side Option:</label>
                 <select name="side_option">
                    <option>Please Choose</option>
                    @foreach($page_options as $options)
                    <option value="{{$options->page_options}}">{{$options->page_options}}</option>
                     @endforeach
                </select>
                    <span class="text-danger">{{ $errors->first('side_option') }}</span>
            </div>
            <div class="form-group">
                <label>Paper Weight:</label>
                <select name="paper_weight">
                    <option>Please Choose</option>
                    @foreach($paper_weight as $weight)
                    <option value="{{$weight->paper_weight}}">{{$weight->paper_weight}}</option>
                    @endforeach
                </select>
                    <span class="text-danger">{{ $errors->first('paper_weight') }}</span>
            </div>
             <div class="heading-free-sample">
                <h3>Delivery Address</h3> 
            </div>

                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last_name" >
                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first_name" >
                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                </div>
                <div class="form-group">
                    <label>Company</label>
                    <input type="text" name="company" >
                </div>
                <div class="form-group">
                    <label>Street</label>
                    <input type="text" name="street" >
                    <span class="text-danger">{{ $errors->first('street') }}</span>
                </div>
                <div class="form-group">
                    <label>House No.</label>
                    <input type="text" name="house_number" >
                    <span class="text-danger">{{ $errors->first('house_number') }}</span>
                </div>
                <div class="form-group">
                    <label>Addition to Address</label>
                    <input type="text" name="addition_to_address" >
                </div>
                <div class="form-group">
                    <label>Zip Code</label>
                    <input type="text" name="zip_code" >
                    <span class="text-danger">{{ $errors->first('zip_code') }}</span>
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="city" >
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                </div>
                {{-- uploaded File name --}}
            <input type="hidden" name="selectfile_free_sample" id="selectfile_free_sample">
                <div class="form-group pull-right">
                    <input type="submit" name="request_free_sample" value="request_free_sample">
                </div>
                
                
                
            </form>
        </div>
    </div>


</div>		 

<script src="{{ asset('public/js/frontend/checkout.js') }}" type="text/javascript" ></script>
<script src="{{ asset('public/js/frontend/dragdrop.js') }}" type="text/javascript" ></script>                               