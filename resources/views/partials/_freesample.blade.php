<div class="container">
    <div class="col-row mb-5">  

   

        <div class="product-item-img col-half text-left">
            <?php $id = Request::get('id');  ?>
            <span class="img-back"><img src="{{ asset('public/images/'.getFreeSampleImage($id))}}" alt="" /></span>
           
        </div>

        <div class="product-item col-half">
            <h2>{{ trans('free_sample.sample_15_pages') }}</h2>	
            <p>{{ trans('free_sample.sample_desc') }}</p>
        </div>
    </div> 
    <div class="align-coloumns">

        <div class="upload-file-section">
     
        <p class="outside-box-heading">{{ trans('checkout.upload_file') }}</p>
        <div id="drop_pdf" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayBlock">
			<div id="drag_upload_file_sample">
                <p class="inside-box-heading">{{ trans('checkout.upload_file') }}</p>
                <p>{{ trans('free_sample.drop_file') }}*<a href="#" data-toggle="tooltip" title="PDF" class="formToolTip">i</a></p> 
				<p>{{ trans('free_sample.or') }}</p>
				<p><input  class="sel_file" type="button" value="{{ trans('free_sample.select_file') }}" onclick="file_explorer('drop_pdf');"></p>
				<input class = "input-button" type="file" name="selectfile" id="selectfile" accept="application/pdf">
			</div>
		</div>
        <span class="text-danger">{{ $errors->first('selectfile_free_sample') }}</span>

        <p class="error" id="error_selectfile_pdf"></p> 

        <div id="drop_file_zone_pdf" class="displayNone"><label id="pdf_file_name"></label>
            <label id="pdf_page_no"></label>
        </div>
 
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
                <label>{{ trans('free_sample.side_options') }}:*</label>
                 <select name="side_option">
                    <option selected="true" disabled="disabled">{{ trans('free_sample.choose') }}</option>
                    @foreach($page_options as $options)
                    <option value="{{$options->page_options}}">{{$options->page_options}}</option>
                     @endforeach
                </select>
                    <span class="text-danger">{{ $errors->first('side_option') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('free_sample.paper_wt') }}:*</label>
                <select name="paper_weight">
                    <option selected="true" disabled="disabled">{{ trans('free_sample.choose') }}</option>
                    @foreach($paper_weight as $weight)
                    <option value="{{$weight->paper_weight}}">{{$weight->paper_weight}}</option>
                    @endforeach
                </select>
                    <span class="text-danger">{{ $errors->first('paper_weight') }}</span>
            </div>
             <div class="heading-free-sample">
                <h3>{{ trans('free_sample.del_add') }}</h3> 
            </div>

                <div class="form-group">
                    <label>{{ trans('free_sample.last_name') }}</label>
                    <input type="text" name="last_name" >
                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('free_sample.first_name') }}</label>
                    <input type="text" name="first_name" >
                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('free_sample.company') }}</label>
                    <input type="text" name="company" >
                </div>
                <div class="form-group">
                    <label>{{ trans('free_sample.street') }}</label>
                    <input type="text" name="street" >
                    <span class="text-danger">{{ $errors->first('street') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('free_sample.house_no') }}</label>
                    <input type="text" name="house_number" >
                    <span class="text-danger">{{ $errors->first('house_number') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('free_sample.add_to_address') }}</label>
                    <input type="text" name="addition_to_address" >
                </div>
                <div class="form-group">
                    <label>{{ trans('free_sample.zip_code') }}</label>
                    <input type="text" name="zip_code" >
                    <span class="text-danger">{{ $errors->first('zip_code') }}</span>
                </div>
                <div class="form-group">
                    <label>{{ trans('free_sample.city') }}</label>
                    <input type="text" name="city" >
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                </div>
                {{-- uploaded File name --}}
                <input type="hidden" name="selectfile_free_sample" id="selectfile_free_sample">

                <div class="form-group pull-right">
                    <input type="submit" name="request_free_sample" value="{{ trans('free_sample.sample') }}">
                </div>   

            </form>
        </div>
    </div>
</div>		  

<script src="{{ asset('public/js/frontend/checkout.js') }}" type="text/javascript" ></script>
<script src="{{ asset('public/js/frontend/dragdrop.js') }}" type="text/javascript" ></script>                               