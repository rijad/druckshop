 <div class="content-wrapper">
			<div class="container"> 

				<div class="checkoutStepper col-full text-left"> 

					<!-- ====================== stepper added ================== -->

					<form id="regForm" action="{{route('product-order')}}" method="POST"> 
						@csrf   

						<div class="stepperBullets">
							<div class="step"><span>1</span></div> 
							<div class="step"><span>2</span></div>
						</div> 
  
						<div class="checkoutBlock col-half text-left">
							{{-- <h1>Register:</h1> --}}

							<!-- One "tab" for each step in the form: -->
							<div class="tab" id="tab-fields">
								<div class="displayBlock">
									<label>{{ trans('checkout.binding_title') }}*:</label>
									<p><select class = "" name = "binding" id = "binding" onclick="" onchange="  displayPrintFields(''); resetFields(this.id,this.value);  displayProductAttributes('1',this);  sampleImage(); getCoverSetting(this.value); getPageFormatData(this.value); getEmbossingFields(this.value); ">
										<option value = "-1">{{ trans('checkout.select') }}</option>
										@foreach ($product_listing as $key=>$listing)
										@if($listing->id != 8 && $listing->id != 5)
										<option value="{{$listing->id}}" @if($listing->id == request()->id) selected @endif>
										@php $locale = session()->get('locale'); @endphp
										@if ($locale == 'gr') 
											{{$listing->title_german}}
										@else
											{{$listing->title_english}}
										@endif
										</option>  
										@endif
										@endforeach 
									</select></p><p class="error" id="error_binding"></p>
								</div>
								<div class="displayBlock" id="div-no-of-copies">
									<label>{{ trans('checkout.no_of_copies') }}*:</label>
									<p><input type = "text" class = "" name="no_of_copies" id="no-of-copies" placeholder="{{ trans('checkout.no_of_copies') }}" oninput=" displayProductAttributes('2',this); displayPrice('0','','','','','','','','','','','','','',this.value,'','');"></p><p class="error" id="error_no_of_copies"></p>
								</div>
								<div class="displayBlock" id="div-page-format"> 
									<label>{{ trans('checkout.page_format') }}*:</label>
									<p><select class = "" onclick = "displayProductAttributes('3',this); sampleImage();" id="page-format" name="page-format" onchange="addTooltip(this); getA3A2Count(this); displayPrice('0',document.getElementById('binding').value,'','','','','','','','','','','','','','',''); " >
										<option value="-1">{{ trans('checkout.select') }}</option>
									</select></p><p class="error" id="error_page_format"></p>
								</div>
								<div class="displayNone" id="div-cover-color">
									<label>{{ trans('checkout.cover_color') }}*:</label> 
									<p><select name="cover-color" class = "" onclick = "displayProductAttributes('4',this); sampleImage();" onchange="" id="cover-color"><option value="-1">{{ trans('checkout.select') }}</option></select></p><p class="error" id="error_cover_color"></p>
								</div>
								<div class="displayNone" id="div-cover-sheet">
									<label>{{ trans('checkout.cover_sheet') }}*:<a href="#" data-toggle="tooltip" title="200 gm/m2 sheets" class="formToolTip">i</a></label>
									<p><select class = "" onclick = "displayProductAttributes('5',this);uploadDisplayCoverSheet(this.id,this.value);" onchange="" id="cover-sheet" name="cover-sheet"><option onclick ="" value="-1">{{ trans('checkout.select') }}</option></select></p>
									<p class="error" id="error_cover_sheet">
  
								</div> 

								<p class="outside-box-heading displayNone" id="drop_file_zone_cover_sheet_heading" >{{ trans('checkout.upload_cover_sheet') }}</p>
								<div id="drop_file_zone_cover_sheet" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayNone">
									<p class="inside-box-heading">{{ trans('checkout.upload_cover_sheet') }}</p>
									<div id="drag_upload_file_cover_sheet">
										<p>{{ trans('checkout.drop_file') }}<a href="#" data-toggle="tooltip" title="PDF" class="formToolTip">i</a></p>
										<p>or</p>
										<p><input type="button" value="Select File" onclick="file_explorer('drop_file_zone_cover_sheet');"></p>
										<input class = "displayNone" type="file" name="selectfile" id="selectfile" accept="application/pdf" value = ""/>
										<input class = "displayNone" type="hidden" name="selectfile_coversheet" id="selectfile_coversheet" value = "" />
									</div>
								</div>
								<p class="error" id="error_selectfile_coversheet"></p>
  
								<div id="drop_file_zone_cover_sheet_info" class="displayNone"><label id="cover_sheet_file_name"></label>
									<label id="cover_sheet_page_no"></label>  <label id="cover_sheet_del"></label>
									</div>

									<div class="displayNone" id="div-back-cover">
										<label>{{ trans('checkout.back_sheet') }}*:<div title="200 gm/m2 sheets" class="formToolTip">i</div></label>
										<p><select class = "" onclick = "displayProductAttributes('6',this); uploadDisplayBackCover(this.id,this.value);" onchange="uploadDisplayBackCover(this.id,this.value);"  id="back-cover" name="back-cover"><option value="-1">{{ trans('checkout.select') }}</option></select></p> <p class="error" id="error_back_cover">
									</div>
									
									<p class="outside-box-heading displayNone" id="drop_file_zone_back_cover_heading">{{ trans('checkout.upload_back_sheet') }}</p>
									<div id="drop_file_zone_back_cover" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayNone">
										<div id="drag_upload_file_back_cover">
											<p class="inside-box-heading">{{ trans('checkout.upload_back_sheet') }}</p>
											<p>{{ trans('checkout.drop_file') }}<a href="#" data-toggle="tooltip" title="PDF" class="formToolTip">i</a></p>
											<p>or</p>  
											<p><input type="button" value="Select File" onclick="file_explorer('drop_file_zone_back_cover');"></p>
											<input class = "displayNone" type="file" name="selectfile" id="selectfile" accept="application/pdf" value = "" />
											<input class = "displayNone" type="hidden" name="selectfile_backcover" id="selectfile_backcover" value = "" />
										</div>
									</div>
									<p class="error" id="error_selectfile_backcover"></p>

									<div id="drop_file_zone_back_cover_sheet_info" class="displayNone"><label id="back_cover_file_name"></label>
										<label id="back_cover_page_no"></label><label id="back_cover_del"></label></div>

								</div> 
								<div class="tab">
									<div class="displayBlock">
										<label>{{ trans('checkout.side_options') }}*:</label>
										<p><select class = "" id = "page_options" name = "page_options" onclick=""  onchange="displayPrice('0','','',this.value,'','','','','','','','','','','','',''); displayFieldsContent(this.value);  displayProductAttributes('7',this); " >
											<option value = "-1">{{ trans('checkout.select') }}</option>
											@foreach ($page_options as $key=>$listing)
											<option value="{{$listing->id}}">{{$listing->name_english}}</option>  
											@endforeach
										</select></p> <p class="error" id="error_page_options"></p>
									</div>

									<div class="displayNone" id="div-mirror">
										<label>{{ trans('checkout.edge_option') }}*:</label>
										<p><select class = "" id="mirror" name="mirror"><option value="-1">{{ trans('checkout.select') }}</option></select></p> <p class="error" id="error_mirror"></p>
									</div>

									<div class="displayBlock" id="div-paper-weight">
										<label>{{ trans('checkout.paper_weight') }}*:<a href="#" data-toggle="tooltip" title="
											for one-sided 100 g/m² paper &#013; for two-sided 120 g/m² paper" class="formToolTip">i</a></label>
										<p><select class = "" name="paper-weight" id="paper-weight" onchange="displayPrice('0','','','','','',this.value,'','','','','','','','','',''); getPaperWeightCount(); BasicRange('binding','paper-weight','no-of-pages');"><option value="-1">{{ trans('checkout.select') }}</option></select></p> <p class="error" id="error_paper_weight"></p>
									</div>  

									<div class="displayBlock" id="div-no-of-pages">
										<label> {{ trans('checkout.no_of_pages') }}*:<a id="page-format-tooltip" href="#" data-toggle="tooltip" title="" class="formToolTip">i</a></label>
										<p><input type = "text" class = "" name="no_of_pages" id="no-of-pages" placeholder="{{ trans('checkout.no_of_pages') }}"  oninput="resetPrice('no-of-pages');displayPrice('0','',this.value,'','','','','','','','','','','','','',''); displayProductAttributes('8',this); displayPrice('0',document.getElementById('binding').value,'','','','','','','','','','','','','','',''); getPrintingdata()"></p>
										<p class="error" id="error_no_of_pages"></p>
										<p class="error" id="error_no_of_pages_match"></p>
									</div> 
 									

									<p class="outside-box-heading displayBlock"  id="drop_file_zone_content_heading">{{ trans('checkout.upload_thesis') }}</p>
									<div id="drop_file_zone_content" ondrop="upload_file(event,this.id) " ondragover="return false" class="displayBlock">
										<div id="drag_upload_file">
											<p class="inside-box-heading">{{ trans('checkout.upload_thesis') }}</p>
											<p>{{ trans('checkout.drop_file') }}<a href="#" data-toggle="tooltip" title="
											PDF" class="formToolTip">i</a></p> 
											<p>or</p>
											<p><input class = "" type="button" value="Select File" onclick="file_explorer('drop_file_zone_content');"></p>
											<input type="file" name="selectfile" id="selectfile" onchange="" accept="application/pdf">
											<input type="hidden" name="selectfile_content" id="selectfile_content">
											<input type="hidden" name="pg_no" id="pg_no">
										</div>
									</div>
									<p class="error" id="error_selectfile_content"></p>

									<div id="drop_file_zone_content_info" class="displayNone"><label id="content_file_name"></label>
										<label id="content_page_no"></label><label id="content_del"></label></div> 


										<p></p>

												</div>
										

													<div class="stepperButtons">
														<div>
															<button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
															<button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
														</div>
													</div>

												</div> <!-- col ends -->
												<!--  Print Product Attributes -->
												<div class="checkoutBlock col-half text-left detail-right-fix">
													<div class="prodkt-info">
														<ul id="prodkt-attrib">	</ul>
													</div>
													<div class="servicePrice">
														<ul>
															<li><p>{{-- Preis pro Auflage --}} Binding Price</p><span id="binding_price"><big>0.00 €</big></span></li>
															<li><p>{{-- Preis pro CD --}} Printouts</p><span id="printout"><big>0.00 €</big></span></li>
															<li><p>{{-- Preis des Datenchecks --}} Data checks</p><span id="data_check_price"><big>0.00 €</big></span></li>
															<li><p>{{-- Preis des Datenchecks --}} CDs</p><span id="cd_dvd"><big>0.00 €</big></span></li>
															<li><p>{{-- Gesamtpreis --}}Total</p><span id="total"><big>0.00 €</big></span></li>
															<input type="hidden" name="total" id="total_price" value="">
														</ul>

													</div>

												</div> <!-- col ends -->

												<!-- Circles which indicates the steps of the form: -->


											</form> 

											<!-- ==================== stepper ends ================== -->

										</div>


									</div><!-- content area ends -->
								</div> 

<script>
	$(document).ready(function(){
    $.ajax({
		url: '/druckshop/clear-session', 
		type: 'GET', 
		success: function (response){
			console.log(response);
		}
	}); 
});
</script>

<?php
    $lang_text = json_encode(trans('checkout'));
?>
<script type="text/javascript">var lang_text = JSON.parse('<?= $lang_text ?>') </script>

<script src="{{ asset('public/js/frontend/loose.js') }}" type="text/javascript" ></script>
<script src="{{ asset('public/js/frontend/dragdrop.js') }}" type="text/javascript" ></script>								 