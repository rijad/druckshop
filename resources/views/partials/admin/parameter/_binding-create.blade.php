<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Create New Binding</h2>

        <div class="card-body col-md-12">

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
                    <div class="form-group">
                        <label class="small mb-1" for="name">Upload Binding Image</label>
                        <input class="form-control" type="file" id="product_file" name="product_file" required />
                    </div>

                    <div class="form-group">
                        <label class="small mb-1" for="otherImages">Upload Others Images</label>
                        <input class="form-control" type="file" id="otherImages" name="otherImages[]" multiple />
                    </div>
                </div>

                <br>

                <div class="border_dashed">
                    <div class="form-group">
                        <label class="small mb-1" for="name">Page Format</label>
                        <div class="form-inline">
                            @foreach ($pageFormat as $key => $value)
                            <span class="ml-4"><input type="checkbox" class="form-control" name="page_format[]" value="{{ $value->id }}"  />{{ $value->page_format }}</span>
                            @endforeach

                        </div>
                    </div>
                </div>
                <br>

                <div class="border_dashed">

                    <div class="form-group">
                        <label class="small mb-1" for="name">Cover Settings</label>
                        <div class="form-inline">
                            @foreach ($coverSetting as $key1 => $value1)
                            <span class="ml-4"><input type="radio" class="form-control {{ ($value1->id==1) ? 'cover_color' : ($value1->id==2) ? 'cover_back_sheet' : ($value1->id=3) ? 'none' : 'nothing' }}" id="cover_setting" name="cover_setting" value="{{ $value1->id }}" {{ ($value1->id==3) ? 'checked' : '' }} />{{ $value1->cover_settings }}</span>
                            @endforeach

                        </div>
                    </div>

                    <div class="form-group cover_color" style="display: none;">
                        <label class="small mb-1" for="name">Cover Color</label>
                        <div class="form-inline">
                            @foreach ($coverColor as $key => $value2)
                            <span class="ml-4"><input type="checkbox" class="form-control" name="cover_color[]" value="{{ $value2->id }}" />{{ $value2->color }}</span>
                            @endforeach

                        </div>
                    </div>

                    <div class="form-group cover_sheet" style="display: none;">
                        <label class="small mb-1" for="cover_sheet">Cover Sheet</label>
                        <div class="form-inline">
                            @foreach ($coverSheet as $key => $value3)
                            <span class="ml-4"><input type="checkbox" class="form-control" name="cover_sheet[]"  value="{{ $value3->id }}" />{{ $value3->sheet }}</span>
                            @endforeach

                        </div>
                    </div>

                    <div class="form-group back_cover" style="display: none;">
                        <label class="small mb-1" for="back_cover">Back Cover</label>
                        <div class="form-inline">
                            @foreach ($backCover as $key => $value4)
                            <span class="ml-4"><input type="checkbox" class="form-control" name="back_cover[]" value="{{ $value4->id }}" />{{ $value4->back_cover  }}</span>
                            @endforeach

                        </div>
                    </div>

                </div>
                <br>

                <div class="border_dashed">

                    <div class="form-group">
                        <label class="small mb-1" for="cover_weight">Cover Weight</label>
                        <p>Grams per piece</p>
                        <input class="form-control" type="number" id="cover_weight" name="cover_weight" placeholder="binding weight" required />
                    </div>
                </div>
                <br>

                <div class="border_dashed">
                    <div class="form-group ">
                        <h2><label class="small mb-1" for="name">Paper Weight</label></h2>
                        <table id="paper_weight_table">
                            <tr>
                                <th>Paper Weights</th>
                                <th>Min Sheets</th>
                                <th>Max Sheets</th>
                            </tr>

                            @foreach ($paperWeight as $key_pw => $value_pw)
                            <tr class="form-inline">
                                <td><span class="ml-4"><input type="checkbox" class="form-control" name="paper_weight[]" value="{{ $value_pw->id }}" />{{ $value_pw->paper_weight }}  g/m<sup>2</sup></span></td>
                                <td><input id="from" type="number" name="p_min_sheet[]" value="0" /></td>
                                <td><input id="from" type="number" name="p_max_sheet[]" value="0" /></td>
                            </tr>
                            @endforeach

                        </table>

                    </div>
                </div>
                <br>


                <div class="border_dashed">
                    <div class="form-group">
                        <label class="small mb-1" for="name">Print Finishing</label>
                        <div class="form-inline">
                            @foreach ($printFinishing as $key5 => $value5)
                            <span class="ml-4"><input type="radio" class="form-control" id="print_finishing" name="print_finishing" value="{{ $value5->id }}" />{{ $value5->finishing }}</span>
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


                <div class="border_dashed">
                    <div class="form-group ">
                        <h2><label class="small mb-1" for="name">Price</label></h2>
                        <table id="binding_table">
                            <tr>
                                <th>Sheets</th>
                                <th></th>
                                <th>Per Product</th>
                            </tr>

                            <tr class="form-inline">
                                <td><input id="start" type="hidden" name="sheet_start[]" value="1" />1 - </td>
                                <td><input class="form-control end" id="end" type="hidden" name="sheet_end[]" value="50" placeholder="page range" />50</td>
                                <td><input class="form-control product_price" id="product_price" type="number" name="product_price[]" value="10" required placeholder="price" /></td>
                            </tr>

                            <tr class="form-inline">
                                <td><input id="start" type="hidden" name="sheet_start[]" value="51" />51 - </td>
                                <td><input class="form-control end" id="end" type="hidden" name="sheet_end[]" value="100" placeholder="page range" />100</td>
                                <td><input class="form-control product_price" id="product_price" type="number" name="product_price[]" value="11" required placeholder="price" /></td>
                            </tr>

                            <tr class="form-inline">
                                <td><input id="start" type="hidden" name="sheet_start[]" value="101" />101 - </td>
                                <td><input class="form-control end" id="end" type="hidden" name="sheet_end[]" value="150" placeholder="page range" />150</td>
                                <td><input class="form-control product_price" id="product_price" type="number" name="product_price[]" value="12" required placeholder="price" /></td>
                            </tr>

                            <tr class="form-inline">
                                <td><input id="start" type="hidden" name="sheet_start[]" value="191" />191 - </td>
                                <td><input class="form-control end" id="end" type="hidden" name="sheet_end[]" value="250" placeholder="page range" />250</td>
                                <td><input class="form-control product_price" id="product_price" type="number" name="product_price[]" value="13" required placeholder="price" /></td>
                            </tr>

                            <tr class="form-inline">
                                <td><input id="start" type="hidden" name="sheet_start[]" value="201" />201 - </td>
                                <td><input class="form-control end" id="end" type="hidden" name="sheet_end[]" value="250" placeholder="page range" />250</td>
                                <td><input class="form-control product_price" id="product_price" type="number" name="product_price[]" value="14" required placeholder="price" /></td>
                            </tr>

                            <tr class="form-inline">
                                <td><input class="form-control start" id="start" type="hidden" name="sheet_start[]" value="251" />251 - </td>
                                <td><input class="form-control end" id="end" name="sheet_end[]"  placeholder="page range" type="number"  /></td>
                                <td><input class="form-control product_price" id="product_price" type="number" name="product_price[]" placeholder="price" /></td>
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
                        <input type="checkbox" class="custom-control-input" id="customCheck" name="active">
                        <label class="custom-control-label" for="customCheck">AKTIV</label>
                    </div>
                </div>

                <div class="form-inline">
                    <a href="{{ URL::previous() }}" class="btn btn-secondary btn-user btn-block col-md-3">Back</a>
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