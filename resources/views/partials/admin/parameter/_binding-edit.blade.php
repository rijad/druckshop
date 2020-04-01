<div class="card mb-4 mt-4">
    <div class="card-header">
        <h2>Edit Binding</h2>

        <div class="card-body col-md-12">

            <form class="form-group-inline" method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                @method('PUT')    
                @csrf

                <div class="form-group">
                    <label class="small mb-1" for="name">Name</label>
                    <input class="form-control" id="name" name="name" type="text" value="{{ $product->title_english }}" placeholder="Name" required />
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="name">Name In English</label>
                    <input class="form-control" id="name_in_en" name="name_in_en" type="text" value="{{ $product->title_english }}"  placeholder="Name" required />
                </div>

                <div class="form-group">
                    <label class="small mb-1" for="name">Name In DEUTSCH</label>
                    <input class="form-control" id="name_in_dh" name="name_in_dh" type="text" value="{{ $product->title_german }}"  placeholder="Name" required />
                </div>
                
                <div class="border_dashed">
                    <div class="form-group">
                        <label class="small mb-1" for="name">Upload Binding Image</label>
                        <input class="form-control" type="file" id="product_file" name="product_file" />
                    </div>

                    <div class="form-group">
                        <label class="small mb-1" for="name">Upload Others Images</label>
                        <input class="form-control" type="file" id="name_in_dh" name="name_in_dh" multiple />
                    </div>
                </div>

                <br>

                <div class="border_dashed">
                    <div class="form-group">
                        <label class="small mb-1" for="name">Page Format</label>
                        <div class="form-inline">
                            @foreach ($pageFormat as $key => $value)

                            <?php 

                            if(in_array($value->id, $slectedPageFormat)){

                                $selected = "checked";
                            } else{

                             $selected = "";
                         } 
                         ?>
                         <span class="ml-4"><input type="checkbox" class="form-control" name="page_format[]" value="{{ $value->id }}" {{ $selected }}  />{{ $value->page_format }}</span>
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

                        <?php 

                        if(in_array($value1->id, $coverSettingSelected)){

                            $cs_selected = "checked";
                        } else{

                         $cs_selected = "";
                     } 

                     if (empty($cs_selected)) {

                        $cs_selected = ($value1->id == 3) ? 'checked' : '';
                    }

                    ?>
                    <span class="ml-4"><input type="radio" class="form-control {{ ($value1->id==1) ? 'cover_color' : ($value1->id==2) ? 'cover_back_sheet' : ($value1->id=3) ? 'none' : 'nothing' }}" id="cover_setting" name="cover_setting" value="{{ $value1->id }}" {{ $cs_selected }}  />{{ $value1->cover_settings }}</span>
                    @endforeach

                </div>
            </div>

            <div class="form-group cover_color" style="display: none;">
                <label class="small mb-1" for="name">Cover Color</label>
                <div class="form-inline">
                    @foreach ($coverColor as $key => $value2)

                    <?php 

                    if(in_array($value2->id, $selectedCoverColor)){

                        $cc_selected = "checked";
                    } else{

                     $cc_selected = "";
                 }

                 ?>

                 <span class="ml-4"><input type="checkbox" class="form-control" name="cover_color[]" value="{{ $value2->id }}" {{ $cc_selected }} />{{ $value2->color }}</span>
                 @endforeach

             </div>
         </div>

         <div class="form-group cover_sheet" style="display: none;">
             <label class="small mb-1" for="cover_sheet">Cover Sheet</label>
             <div class="form-inline">
                 @foreach ($coverSheet as $key => $value3)

                 <?php 

                 if(in_array($value3->id, $selectedCoverSheet)){

                    $cs_selected = "checked";
                } else{

                 $cs_selected = "";
             }

             ?>

             <span class="ml-4"><input type="checkbox" class="form-control" name="cover_sheet[]"  value="{{ $value3->id }}" {{ $cs_selected }} />{{ $value3->sheet }}</span>
             @endforeach

         </div>
     </div>

     <div class="form-group back_cover" style="display: none;">
         <label class="small mb-1" for="back_cover">Back Cover</label>
         <div class="form-inline">
             @foreach ($backCover as $key => $value4)

             <?php 

             if(in_array($value4->id, $selectedBackCover)){

                $bc_selected = "checked";
            } else{

             $bc_selected = "";
         }

         ?>

         <span class="ml-4"><input type="checkbox" class="form-control" name="back_cover[]" value="{{ $value4->id }}" {{ $bc_selected }} />{{ $value4->back_cover  }}</span>
         @endforeach

     </div>
 </div>

</div>
<br>

<div class="border_dashed">

 <div class="form-group">
     <label class="small mb-1" for="cover_weight">Cover Weight</label>
     <p>Grams per piece</p>
     <input class="form-control" type="text" id="cover_weight" name="cover_weight" value="{{ $product->cover_weight }}"  placeholder="binding weight" required />
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
            <?php 

            if(in_array($value_pw->id, $selectedPaperWeight)){

                $bc_selected = "checked";
            } else{

             $bc_selected = "";
         }

         ?>

         <td><span class="ml-4"><input type="checkbox" class="form-control" name="paper_weight[]" value="{{ $value_pw->id }}" {{ $bc_selected }} />{{ $value_pw->paper_weight }}  g/m<sup>2</sup></span></td>
         <td><input id="from" type="number" name="p_min_sheet[]" value="{{ @$selectedPaperWeightData[$key_pw]['min_sheets'] }}" /></td>
         <td><input id="from" type="number" name="p_max_sheet[]" value="{{ @$selectedPaperWeightData[$key_pw]['max_sheets'] }}" /></td>
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

         <?php 

         if(in_array($value5->id, $selectedPrintFinishing)){

            $pf_selected = "checked";
        } else{

         $pf_selected = "";
     }

     ?>

     <span class="ml-4"><input type="radio" class="form-control" id="print_finishing" name="print_finishing" value="{{ $value5->id }}" {{ $pf_selected }} />{{ $value5->finishing }}</span>
     @endforeach

 </div>
</div>

<div class="form-group art_list" style="display: none;">
 <label class="small mb-1" for="name">Art:</label>
 <div class="form-inline">
     @foreach ($artList as $key6 => $value6)

     <?php 

     if(in_array($value6->id, $selectedArtList)){

        $al_selected = "checked";
    } else{

     $al_selected = "";
 }

 ?>

 <span class="ml-4"><input type="checkbox" class="form-control" name="art_list[]" value="{{ $value6->id }}" {{ $al_selected }} />{{ $value6->check_list }}</span>
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

         @if(!empty($product_price))
         @foreach ($product_price as $key_pp => $value_pp)

         <tr class="form-inline">
            <input id="from" type="hidden" name="product_price_id[]" value="{{ $value_pp['id'] }}" />
            <td><input id="start" type="hidden" name="sheet_start[]" value="{{ $value_pp['min_range'] }}" />{{ $value_pp['min_range'] }} - </td>
            <td><input class="form-control end" id="end" type="hidden" name="sheet_end[]" value="{{ $value_pp['max_range'] }}" placeholder="page range" />{{ $value_pp['max_range'] }}</td>
            <td><input class="form-control product_price" id="product_price" type="number" name="product_price[]" value="{{ $value_pp['price'] }}" required placeholder="price" /></td>
        </tr>

        @endforeach
        @else

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
     @endif

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
     <input type="checkbox" class="custom-control-input" id="customCheck" name="active" <?php echo ($product->status) ? 'checked' : ''; ?> >
     <label class="custom-control-label" for="customCheck">AKTIV</label>
 </div>
</div>

<div class="form-group">
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
</style>