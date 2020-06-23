<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Create New Binding</h2>
 
        <div class="card-body col-md-12">

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

            <form class="form-group-inline" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label class="small mb-1" for="name">Name</label>
                    <input class="form-control" id="name" name="name" type="text" placeholder="Name" required />
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="name">Name In English</label>
                    <input class="form-control" id="name_in_en" name="name_in_en" type="text" placeholder="Name" required />
                </div>
 
                <div class="form-group">
                    <label class="small mb-1" for="name">Name In DEUTSCH</label>
                    <input class="form-control" id="name_in_dh" name="name_in_dh" type="text" placeholder="Name" required />
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="name">Short Description English</label>
                    <input class="form-control" id="short_description_english" name="short_description_english" type="text" placeholder="Short Description English" required />
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="name">Short Description German</label>
                    <input class="form-control" id="short_description_german" name="short_description_german" type="text" placeholder="Short Description German" required />
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="name">Long Description English</label>
                    <textarea class="form-control summernote" id="long_description_english" name="long_description_english" placeholder="Long Description English" required></textarea>
                    
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="name">Long Description German</label>
                    <textarea class="form-control summernote" id="long_description_german" name="long_description_german" placeholder="Long Description German" required></textarea>
                </div>
                
                <div class="border_dashed">

                     <div class="container_image" id="container_image_single"></div>

                    <div class="form-group rv-file_upload">
                        <label class="small mb-1" for="name">Upload Binding Image</label>
                        <input class="rv-custom-file-input" type="file" id="product_file" name="product_file" onchange="readURL(this)" required />
                    </div>

                     <div class="container_image" id="container_image_multiple"></div>

                    <div class="form-group rv-file_upload">
                        <label class="small mb-1" for="otherImages">Upload Others Images</label>
                        <input class="rv-custom-file-input" type="file" id="otherImages" name="otherImages[]" onchange="previewFiles();"/>

                        <input type = "hidden" name="removed_files[]" id = "removed_files" value=""> 
                    </div>
                </div>

                <br>

                <div class="border_dashed rv-RelativeBorder">
                    <div class="form-group">
                        <label class="small mb-1 rv-AbsoluteBorder" for="name">Page Format</label>
                        <div class="form-inline">
                            @foreach ($pageFormat as $key => $value)
                            <span class="ml-4"><input type="checkbox" class="form-control" name="page_format[]" value="{{ $value->id }}" {{ ($value->id==1) ? 'checked' : '' }} />{{ $value->page_format }}</span>
                            @endforeach

                        </div>
                    </div>
                </div>
                <br>

                <div class="border_dashed rv-RelativeBorder">

                    <div class="form-group">
                        <label class="small mb-1 rv-AbsoluteBorder" for="name">Cover Settings</label>
                        <div class="form-inline">
                            @foreach ($coverSetting as $key1 => $value1)
                            <span class="ml-4"><input type="radio" class="form-control {{ ($value1->id==1) ? 'cover_color' : ($value1->id==2) ? 'cover_back_sheet' : ($value1->id=3) ? 'none' : 'nothing' }}" id="cover_setting" name="cover_setting" value="{{ $value1->id }}" {{ ($value1->id==3) ? 'checked' : '' }} />{{ $value1->cover_settings }}</span>
                            @endforeach

                        </div>
                    </div>

                    <div class="form-group cover_color rv-RelativeBorder" style="display: none;">
                        <label class="small mb-1 rv-AbsoluteBorder" for="name">Cover Color</label>
                        <div class="form-inline">
                            @foreach ($coverColor as $key => $value2)
                            <span class="ml-4"><input type="checkbox" class="form-control" name="cover_color[]" value="{{ $value2->id }}" {{ ($value2->id==1) ? 'checked' : '' }} />{{ $value2->color }}</span>
                            @endforeach

                        </div>
                    </div>

                    <div class="form-group cover_sheet rv-RelativeBorder" style="display: none;">
                        <label class="small mb-1 rv-AbsoluteBorder" for="cover_sheet">Cover Sheet</label>
                        <div class="form-inline">
                            @foreach ($coverSheet as $key => $value3)
                            <span class="ml-4"><input type="checkbox" class="form-control" name="cover_sheet[]"  value="{{ $value3->id }}" {{ ($value3->id==1) ? 'checked' : '' }} />{{ $value3->sheet }}</span>
                            @endforeach

                        </div>
                    </div>

                    <div class="form-group back_cover rv-RelativeBorder" style="display: none;">
                        <label class="small mb-1 rv-AbsoluteBorder" for="back_cover">Back Cover</label>
                        <div class="form-inline">
                            @foreach ($backCover as $key => $value4)
                            <span class="ml-4"><input type="checkbox" class="form-control" name="back_cover[]" value="{{ $value4->id }}" {{ ($value4->id==1) ? 'checked' : '' }} />{{ $value4->back_cover  }}</span>
                            @endforeach

                        </div>
                    </div>

                </div>
                <br>

                {{-- <div class="border_dashed rv-RelativeBorder">

                    <div class="form-group">
                        <label class="small mb-1 rv-AbsoluteBorder" for="cover_weight">Cover Weight</label>
                        <p>Grams per piece</p>
                        <input class="form-control" type="number" id="cover_weight" name="cover_weight" placeholder="binding weight" required />
                    </div>
                </div>
                <br> --}}

                <div class="border_dashed rv-RelativeBorder">
                    <div class="rv-tableResponsive">
                        <div class="form-group">
                            <h2><label class="small mb-1 rv-AbsoluteBorder" for="name">Paper Weight</label></h2>
                            <table id="paper_weight_table">
                                <tr>
                                    <th class="rv-bindingswidth">Paper Weights</th>
                                    <th class="rv-bindingswidth">Min Sheets</th>
                                    <th class="rv-bindingswidth">Max Sheets</th>
                                </tr>

                                @foreach ($paperWeight as $key_pw => $value_pw)
                                <tr class="form-inline">
                                    <td class="rv-bindingswidth"><span class="ml-4"><input type="checkbox" class="form-control" name="paper_weight[]" value="{{ $value_pw->id }}" />{{ $value_pw->paper_weight }}  g/m<sup>2</sup></span><input type="hidden" name = "x_paper_weight[]" value="{{ $value_pw->id }}" ></td>
                                    <td class="rv-bindingswidth"><input id="from" type="number" name="p_min_sheet[]" value="0" /></td>
                                    <td class="rv-bindingswidth"> <input id="from" type="number" name="p_max_sheet[]" value="0" /></td>
                                </tr>
                                @endforeach

                            </table>

                        </div>
                    </div>    
                </div>
                <br>


                <div class="border_dashed rv-RelativeBorder">
                    <div class="form-group">
                        <label class="small mb-1 rv-AbsoluteBorder" for="name">Print Finishing</label>
                        <div class="form-inline">
                            @foreach ($printFinishing as $key5 => $value5)
                            <span class="ml-4"><input type="radio" class="form-control" id="print_finishing" name="print_finishing" value="{{ $value5->id }}" {{ ($value5->id==3) ? 'checked' : '' }} />{{ $value5->finishing }}</span>
                            @endforeach

                        </div>
                    </div>

                    <div class="form-group art_list" style="display: none;">
                        <label class="small mb-1" for="name">Art:</label>
                        <div class="form-inline">
                            @foreach ($artList as $key6 => $value6)
                            <span class="ml-4"><input type="checkbox" class="form-control" name="art_list[]" value="{{ $value6->id }}" />{{ $value6->check_list }}</span>
                            @endforeach

                        </div>
                    </div>

                </div>
                <br>


                <div class="border_dashed rv-RelativeBorder">
                    <div class="form-group rv-overflow-y">
                        <h2><label class="small mb-1 rv-AbsoluteBorder" for="name">Price</label></h2>
                        <table id="binding_table">
                            <tr>
                                <th class="rv-headLt">Sheets</th>
                                <!-- <th></th> -->
                                <th class="rv-headRt">Per Product</th>
                            </tr>

                            <tr class="form-inline">
                                <td class="rv-headLtchild1"><input id="start" type="hidden" name="sheet_start[]" value="1" />1 - </td>
                                <td class="rv-headLtchild"><input class="form-control end" id="end" type="hidden" name="sheet_end[]" value="50" placeholder="page range" />50</td>
                                <td class="rv-headRtchild"><input class="form-control product_price" id="product_price" type="number" name="product_price[]" value="10.00" step = "0.01" required placeholder="price" onchange="decimalplace(this);" onkeyup="decimalplace(this);"/></td>
                            </tr>

                            <tr class="form-inline">
                                <td class="rv-headLtchild1"><input id="start" type="hidden" name="sheet_start[]" value="51" />51 - </td>
                                <td class="rv-headLtchild"><input class="form-control end" id="end" type="hidden" name="sheet_end[]" value="100" placeholder="page range" />100</td>
                                <td class="rv-headRtchild"><input class="form-control product_price" id="product_price" type="number" name="product_price[]" value="11.00" step = "0.01" required placeholder="price" onchange="decimalplace(this);" onkeyup="decimalplace(this);"/></td>
                            </tr>

                            <tr class="form-inline">
                                <td class="rv-headLtchild1"><input id="start" type="hidden" name="sheet_start[]" value="101" />101 - </td>
                                <td class="rv-headLtchild"><input class="form-control end" id="end" type="hidden" name="sheet_end[]" value="150" placeholder="page range" />150</td>
                                <td class="rv-headRtchild"><input class="form-control product_price" id="product_price" type="number" name="product_price[]" value="12.00" step = "0.01" required placeholder="price" onchange="decimalplace(this);" onkeyup="decimalplace(this);" /></td>
                            </tr>

                            <tr class="form-inline">
                                <td class="rv-headLtchild1"><input id="start" type="hidden" name="sheet_start[]" value="191" />191 - </td>
                                <td class="rv-headLtchild"><input class="form-control end" id="end" type="hidden" name="sheet_end[]" value="250" placeholder="page range" />250</td>
                                <td class="rv-headRtchild"><input class="form-control product_price" id="product_price" type="number" name="product_price[]" value="13.00" step = "0.01" required placeholder="price" onchange="decimalplace(this);" onkeyup="decimalplace(this);" /></td>
                            </tr>

                            <tr class="form-inline">
                                <td class="rv-headLtchild1"><input id="start" type="hidden" name="sheet_start[]" value="201" />201 - </td>
                                <td class="rv-headLtchild"><input class="form-control end" id="end" type="hidden" name="sheet_end[]" value="250" placeholder="page range" />250</td>
                                <td class="rv-headRtchild"><input class="form-control product_price" id="product_price" type="number" name="product_price[]" value="14.00" step = "0.01" required placeholder="price" onchange="decimalplace(this);" onkeyup="decimalplace(this);" /></td>
                            </tr>

                            <tr class="form-inline">
                                <td class="rv-headLtchild1"><input class="form-control start" id="start" type="hidden" name="sheet_start[]" value="251" />251 - </td>
                                <td class="rv-headLtchild"><input class="form-control end" id="end" name="sheet_end[]"  placeholder="page range" type="number"  /></td>
                                <td class="rv-headRtchild"><input class="form-control product_price" id="product_price" type="number" name="product_price[]" step = "0.01" placeholder="price" onchange="decimalplace(this);" onkeyup="decimalplace(this);" /></td>
                            </tr>

                        </table>
                    </div>

                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-sm mr-2" id="binding_add_more" disabled="true"> <span>Add new row</span></button>
                        <button type="button" class="btn btn-danger btn-sm mr-2" id="binding_remove_last"> <span>Remove last row</span></button>
                    </div>

                </div>
                <br>

                

                <div class="form-group">
                    <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="active" checked>
                        <label class="custom-control-label" for="customCheck">AKTIV</label>
                    </div>
                </div>

                <div class="form-inline">
                    <a href="{{ url('/admin/details/Product/1') }}" class="btn btn-secondary btn-user btn-block col-md-3">Back</a>
                    <input type="submit" class="btn btn-primary btn-user btn-block col-md-3" value="Add">
                </div>


            </form>

        </div>

    </div>


    <style>
    tr>th {
        padding: 8px;
    }

    tr>td {
        padding: 8px;
    }

    .border_dashed{
        border: 2px dotted #212529;
    }

    body .popover{display:none !important; }
</style>


<script>

function decimalplace(value =""){
  $(value).val(parseFloat($(value).val()).toFixed(2));
}


function test(image = "", button = ""){

var images = [];   var images_files = [];
images = document.getElementById('removed_files').value;   //console.log(images);
images_files.push(images); images_files.push(image);  console.log(images_files);
document.getElementById('removed_files').value = images_files;
document.getElementById(image).remove(); $(button).remove();//console.log($('#'+image).remove()); 
   
}


function readURL(input) {   
        var preview = document.getElementById('container_image_single');
        var files   = document.getElementById('product_file').files;

  function readAndPreview(file) {   

    // Make sure `file.name` matches our extensions criteria
    if ( /\.(jpe?g|png|gif)$/i.test(file.name) ) {
      var reader = new FileReader();

      reader.addEventListener("load", function () {

        $("<div id='container_preview_image_single'></div>").insertBefore(preview);

        var div_container = document.getElementById('container_preview_image_single');

        var image = new Image();
        image.height = 100;
        image.title = file.name; 
        image.src = this.result;
        image.id = file.name;
        image.setAttribute("class","preview-image");
        div_container.append(image);

        var button = document.createElement("BUTTON");
        button.innerHTML = "Remove Image";
        button.type = "button";
        button.id = "dynamic-button";
        button.setAttribute("onclick","test('"+file.name+"',this)");
        button.setAttribute("class","preview-button");
        div_container.append(button);

      }, false);

      reader.readAsDataURL(file);
    }

  }

  if (files) {
    [].forEach.call(files, readAndPreview);
  }
    }


function previewFiles() {  

  var preview = document.getElementById('container_image_multiple');
  var files   = document.getElementById('otherImages').files;

  function readAndPreview(file) {   

    // Make sure `file.name` matches our extensions criteria
    if ( /\.(jpe?g|png|gif)$/i.test(file.name) ) {
      var reader = new FileReader();

      reader.addEventListener("load", function () {

        $("<div id='container_preview_image'></div>").insertBefore(preview);

        var div_container = document.getElementById('container_preview_image');

        var image = new Image();
        image.height = 100;
        image.title = file.name; 
        image.src = this.result;
        image.id = file.name;
        image.setAttribute("class","preview-image");
        div_container.append(image);

        var button = document.createElement("BUTTON");
        button.innerHTML = "Remove Image";
        button.type = "button";
        button.id = "dynamic-button";
        button.setAttribute("onclick","test('"+file.name+"',this)");
        button.setAttribute("class","preview-button");
        div_container.append(button);

      }, false);

      reader.readAsDataURL(file);
    }

  }

  if (files) {
    [].forEach.call(files, readAndPreview);
  }

}
</script>