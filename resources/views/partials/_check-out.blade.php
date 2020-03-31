<div class="content-wrapper">
			<div class="container">

				<div class="checkoutStepper col-full text-left">

					<!-- ====================== stepper added ================== -->

					<form id="regForm" action="{{route('product-order')}}" method="POST"> 
						@csrf   

						<div class="stepperBullets">
							<div class="step"><span>1</span></div> 
							<div class="step"><span>2</span></div>
							<div class="step"><span>3</span></div>
							<div class="step"><span>4</span></div>
						</div>
  
						<div class="checkoutBlock col-half text-left">
							{{-- <h1>Register:</h1> --}}

							<!-- One "tab" for each step in the form: -->
							<div class="tab" id="tab-fields">
								<div class="displayBlock">
									<label>Binding*:</label>
									<p><select class = "" name = "binding" id = "binding" onclick="displayFields(this.value);displayProductAttributes('1',this);" oninput="displayPrice(this.value,'','','','','','','','','','','','');">
										<option value = "-1">Select</option>
										@foreach ($product_listing as $key=>$listing)
										<option value="{{$listing->id}}">{{$listing->title_english}}</option>  
										@endforeach
									</select></p><p class="error" id="error_binding"></p>
								</div>
								<div class="displayBlock" id="div-no-of-copies">
									<label>No of Copies*:</label>
									<p><input class = "" name="no_of_copies" id="no-of-copies" placeholder="No of Copies" oninput="displayProductAttributes('2',this);"></p><p class="error" id="error_no_of_copies"></p>
								</div>
								<div class="displayBlock" id="div-page-format">
									<label>Page Format*:</label>
									<p><select class = "" onclick = "displayProductAttributes('3',this);" id="page-format" name="page-format" ><option value="-1">Select</option></select></p><p class="error" id="error_page_format"></p>
								</div>
								<div class="displayNone" id="div-cover-color">
									<label>Cover Color*:</label> 
									<p><select name="cover-color" class = "" onclick = "displayProductAttributes('4',this);" id="cover-color"><option value="-1">Select</option></select></p><p class="error" id="error_cover_color"></p>
								</div>
								<div class="displayNone" id="div-cover-sheet">
									<label>Cover Sheet*:<a href="#" data-toggle="tooltip" title="200 gm/m2 sheets" class="formToolTip">i</a></label>
									<p><select class = "" onclick = "displayProductAttributes('5',this);uploadDisplay(this.id,this.value);hideBindingElements('cover-sheet');" id="cover-sheet" name="cover-sheet"><option value="-1">Select</option></select></p>
									<p class="error" id="error_cover_sheet">

								</div> 

								<div id="drop_file_zone_cover_sheet" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayNone">
									<div id="drag_upload_file_cover_sheet">
										<p>Drop file here<a href="#" data-toggle="tooltip" title="PDF" class="formToolTip">i</a></p>
										<p>or</p>
										<p><input type="button" value="Select File" onclick="file_explorer('drop_file_zone_cover_sheet');"></p>
										<input class = "displayNone" type="file" name="selectfile" id="selectfile" accept="application/pdf" value = "" />
										<input class = "displayNone" type="hidden" name="selectfile_coversheet" id="selectfile_coversheet" value = "" />
									</div>
								</div>
								<p class="error" id="error_selectfile_coversheet"></p>
  
								<div id="drop_file_zone_cover_sheet_info" class="displayNone"><label id="cover_sheet_file_name"></label>
									<label id="cover_sheet_page_no"></label>
									</div>

									<div class="displayNone" id="div-back-cover">
										<label>Back Sheet*:<div title="200 gm/m2 sheets" class="formToolTip">i</div></label>
										<p><select class = "" onclick = "displayProductAttributes('6',this);uploadDisplay(this.id,this.value); hideBindingElements('back-cover');" id="back-cover" name="back-cover"><option value="-1">Select</option></select></p> <p class="error" id="error_back_cover">
									</div>

									<div id="drop_file_zone_back_cover" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayNone">
										<div id="drag_upload_file_back_cover">
											<p>Drop file here<a href="#" data-toggle="tooltip" title="PDF" class="formToolTip">i</a></p>
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
										<label>Side Options*:</label>
										<p><select class = "" id = "page_options" name = "page_options" onclick="displayFieldsContent(this.value);"  onchange="displayPrice('','',this.value,'','','','','','','','','','');" >
											<option value = "-1">Select</option>
											@foreach ($page_options as $key=>$listing)
											<option value="{{$listing->id}}">{{$listing->name_english}}</option>  
											@endforeach
										</select></p> <p class="error" id="error_page_options"></p>
									</div>

									<div class="displayNone" id="div-mirror">
										<label>Mirror*:</label>
										<p><select class = "" id="mirror" name="mirror"><option value="-1">Select</option></select></p> <p class="error" id="error_mirror"></p>
									</div>

									<div class="displayBlock" id="div-paper-weight">
										<label>Paper Weight*:<a href="#" data-toggle="tooltip" title="
											for one-sided 100 g/m² paper &#013; for two-sided 120 g/m² paper" class="formToolTip">i</a></label>
										<p><select class = "" name="paper-weight" id="paper-weight" onchange="displayPrice('','','','','',this.value,'','','','','','','');"><option value="-1">Select</option></select></p> <p class="error" id="error_paper_weight"></p>
									</div>  

									<div class="displayBlock" id="div-no-of-copies">
										<label>No of Pages*:<a href="#" data-toggle="tooltip" title="
											number of the PDF file and &#013; only number of DIN A4
											" class="formToolTip">i</a></label>
										<p><input class = "" name="no_of_pages" id="no-of-pages" placeholder="No of Pages" value = "" oninput="displayPrice('',this.value,'','','','','','','','','','','');"></p>
										<p class="error" id="error_no_of_pages"></p>
									</div>
 
									<div id="drop_file_zone_content" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayBlock">
										<div id="drag_upload_file">
											<p>Drop file here<a href="#" data-toggle="tooltip" title="
											PDF" class="formToolTip">i</a></p> 
											<p>or</p>
											<p><input class = "" type="button" value="Select File" onclick="file_explorer('drop_file_zone_content');"></p>
											<input type="file" name="selectfile" id="selectfile" accept="application/pdf">
											<input type="hidden" name="selectfile_content" id="selectfile_content">
										</div>
									</div>
									<p class="error" id="error_selectfile_content"></p>

									<div id="drop_file_zone_content_info" class="displayNone"><label id="content_file_name"></label>
										<label id="content_page_no"></label><label id="content_del"></label></div>


										<p></p>
										<div class="displayBlock" id="div-color-pages">
											<label class="csCheckbtn">Color Pages
												<input type="checkbox" name = "color-pages" id = "color-pages" onclick="displayContentInput('Color_Pages');">
												<span class="checkmark"></span>
											</label>
										</div>

										<div class="displayNone" id="div-page-numbers">
											<label>Page Numbers to be printed in Colored *:<a href="#" data-toggle="tooltip" title="Page numbers of the PDF file, not of &#013; the thesis (document)" class="formToolTip">i</a></label>

											<p><input class= "" name="page_numbers" id="page-numbers" placeholder="Page Numbers" value = "" oninput = "displayPrice('','','','','','','','','','','',this.value,'');">
												<p class="error" id="error_page_numbers"></p>
												<p class="error" id="error_range"></p><label>Example : 3,12,15-23,37</label></p>

											<div class="displayBlock" id="div-A3-pages">
												<label class="csCheckbtn">DIN A3 Pages
													<input class = ""  name = "A3-pages" id = "A3-pages" type="checkbox" onclick="displayContentInput('A3_Pages');"  > 
													<span class="checkmark"></span>
												</label>
											</div>
 
											<div class="displayNone" id="div-number-of-pages">
												<label>Number of DIN A3 Pages*:<a href="#" data-toggle="tooltip" title=" It is printed with the same paper type and one-sided. &#013; It is printed with the same paper type and one-sided. " class="formToolTip">i</a></label>
												<p><input class = "" name="number_of_pages" id="numbers-of-pages" placeholder="Number of Pages"  max="10" oninput = "displayPrice('','','','','','','',this.value,'','','','','');">
												</p>
												<p id="A3_msg" class="displayNone">The maximum number of DIN A3 pages is: 10</p>
												<p class="error" id="error_number_of_pages"></p>
											</div>
											<div class="displayNone" id="div-pos-A3-pages">
												<label>Position A3 Pages in Work</label>
												<p><textarea class = ""  name="pos_of_A3_pages" id=" pos-of-A3-pages" placeholder="Number of Pages" ></textarea></p>
											</div>
											<div class="displayNone" id="drop_file_din_A3" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayBlock">
												<div id="drag_upload_file_A3" >
													<p>Drop file here<a href="#" data-toggle="tooltip" title="PDF" class="formToolTip">i</a></p> 
													<p>or</p>
													<p><input type="button" value="Select File" onclick="file_explorer('drop_file_din_A3');"></p>
													<input type="file" name ="selectfile" id="selectfile" accept="application/pdf">
													<input type="hidden" name="selectfile_din_A3" id="selectfile_din_A3" accept="application/pdf">
												</div>
											</div>
											<p class="error" id="error_selectfile_din_A3"></p>


											<div id="drop_file_din_A3_info" class="displayNone"><label id="A3_file_name"></label>
												<label id="A3_page_no"></label><label id="A3_del"></label></div>

												<div class="displayBlock" id="div-A2-pages">
													<label class="csCheckbtn">Din A2 Pages
														<input class = "" name = "A2-pages" id = "A2-pages" type="checkbox" onclick="displayContentInput('A2_Pages');" >
														<span class="checkmark"></span>
													</label>
												</div>

												<div class="displayNone" id="div-number-of-A2-pages">
													<label>Number of DIN A2 Pages*:<a href="#" data-toggle="tooltip" title="It is folded and glued into a bag at the end of the thesis. &#013; The maximum number of DIN A2 pages is: 3 " class="formToolTip">i</a></label>
													<p><input class = "" name="number_of_A2_pages" id="numbers-of-A2-pages" placeholder="Number of Pages" value = "" max="3" oninput = "displayPrice('','','','','','',this.value,'','','','','','');"></p>
													<p id="A2_msg" class="displayNone">The maximum number of DIN A2 pages is: 3</p>
													<p class="error" id="error_number_of_A2_pages"></p>
												</div>

												<div class="displayNone" id="drop_file_din_A2" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayBlock">
													<div id="drag_upload_file_A2" >
														<p>Drop file here<a href="#" data-toggle="tooltip" title="PDF" class="formToolTip">i</a></p> 
														<p>or</p>
														<p><input type="button" value="Select File" onclick="file_explorer('drop_file_din_A2');"></p>
														<input type="file" name="selectfile" id="selectfile" accept="application/pdf">

														<input type="hidden" name="selectfile_din_A2" id="selectfile_din_A2" accept="application/pdf">
													</div>
												</div> 

												<p class="error" id="error_selectfile_din_A2"></p>

												<div id="drop_file_din_A2_info" class="displayNone"><label id="A2_file_name"></label>
													<label id="A2_page_no"></label><label id="A2_del"></label></div>

												</div>
											</div>

											<div class="tab">
												<div class="displayBlock" id="div-embossment-cover-sheet">
													<label class="csCheckbtn">Embossment Cover Sheet
														<input name ="embossment-cover-sheet" id ="embossment-cover-sheet" type="checkbox" onclick="displayPrintFields('Embossment_Cover_Sheet'); displayPrice('','','',this.value,'','','','','','','','','');" >
														<span class="checkmark"></span>
													</label>
												</div> 

												<div class="displayNone" id="div-template">
													<label>Template*:<a href="#" data-toggle="tooltip" title="Data is taken from cover sheet" class="formToolTip">i</a></label>
													<p><select name ="template" id="template" onchange="displayPopUp(this.value);"><option value="-1">Select</option><option value="Standardvorlage mit Logo">Standardvorlage mit Logo</option><option value="Standardvorlage ohne Logo">Standardvorlage ohne Logo</option><option value="Eigene Vorlage">Eigene Vorlage</option></select></p>
													<p class="error" id="error_template"></p>
												</div>

												<div class="displayNone" id="upload_custom_logo" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayBlock">
													<div id="drag_upload_file_logo">
														<p>Drop file here<a href="#" data-toggle="tooltip" title="jpeg,jpg,png" class="formToolTip">i</a></p> 
														<p>or</p>
														<p><input type="button" value="Select File" onclick="file_explorer('upload_custom_logo');"></p>
														<input type="file" name ="selectfile" id="selectfile" accept="image/x-png">

														<input type="hidden" name ="selectfile_logo" id="selectfile_logo" accept="image/x-png">
													</div>
												</div>  
												<p class="error" id="error_selectfile_logo"></p>

												<div id="drop_file_zone_logo_info" class="displayNone"><label id="logo_file_name"><a href="#" data-toggle="tooltip" title="Data is taken from cover sheet" class="formToolTip">i</a></label>
													<label id="logo_page_no"></label><label id="logo_del"></label></div>
														{{-- <p><select id ="template">
															<option value="-1">Select</option><a href="#" data-toggle="tooltip" title="Data is taken from cover sheet" class="formToolTip">i</a>
															<option value="Standardvorlage mit Logo">Standardvorlage mit Logo</option>
															<option value="Standardvorlage ohne Logo">Standardvorlage ohne Logo</option>
															<option value="Eigene Vorlage">Eigene Vorlage</option></select></p> --}}

															<div class="displayNone" id="div-display-image"> </div>

													<div class="displayNone" id="div-fonts">
														<label>Fonts*:</label>
														<p><select class = "" name="fonts" id="fonts"><option value = "-1">Select</option>
															@foreach ($fonts as $key=>$listing)
															<option value="{{$listing->font}}">{{$listing->font}}</option>  
															@endforeach
														</select></p> <p class="error" id="error_fonts"></p>
													</div>

													<div class="displayNone" id="div-date-format">
														<label>Date Format*:</label>
														<p><select class = "" id="date-format" name="date-format"><option value = "-1">Select</option>
															@foreach ($date_format as $key=>$listing)
															<option value="{{$listing->surname}}">{{$listing->date_format}}</option>  
															@endforeach
														</select></p> <p class="error" id="error_date_format">
													</div>

													<div class="displayBlock" id="div-embossment-spine">
														<label class="csCheckbtn">Embossment Spine<a href="#" data-toggle="tooltip" title="Data is taken from cover sheet" class="formToolTip">i</a>
															<input class = "" type="checkbox" id = "embossment-spine" name = "embossment-spine" onclick = "displayPrice('','','','',this.value,'','','','','','','','');" disabled>
															<span class="checkmark"></span>
														</label>
														<p>Minimum sheet number for having spine is 40</p>
													</div>

													<div class="displayNone" id="div-remarks">
														<label>Remarks</label>
														<p><textarea class = "" name="remarks" id=" remarks" placeholder="remarks" oninput="this.className = ''"></textarea></p>
													</div>	

													<div class="modal fade" tabindex="-1" role="dialog"> 
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																	<h4 class="modal-title">Modal title</h4>
																</div>
																<div class="modal-body" id="modal-body">

																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
																	<button type="button" class="btn btn-primary">Save changes</button>
																</div>
															</div><!-- /.modal-content -->
														</div><!-- /.modal-dialog -->
													</div><!-- /.modal -->
													</div>	

												{{-- </div> --}}

												<div class="tab">
													<div class="displayBlock" id="div-cd">
														<label class="csCheckbtn">CD
															<input class = ""  name = "cd-check" id = "cd-check" type="checkbox" onclick="displayCDFields('cd');">
															<span class="checkmark"></span>
														</label>
													</div>

													<div class="displayNone" id="div-number-of-cds">
														<label>Number of CDs*:</label>
														<p><input class = "" name="number_of_cds" id="numbers-of-cds" placeholder="Number of CDs" oninput= "displayPrice('','','','','','','','',this.value,'','','','');"></p>
														<p class="error" id="error_number_of_cds"></p>
													</div> 

													<div class="displayNone" id="upload_cd" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayBlock">
														<div id="drag_upload_file_cd">
															<p>Drop file here</p>  
															<p>or</p>
															<p><input type="button" value="Select File" onclick="file_explorer('upload_cd');"></p>
															<input type="file" id="selectfile" name="selectfile" >
															<input type="hidden" id="selectfile_cd" name="selectfile_cd">
														</div>
													</div> 
													<p class="error" id="error_selectfile_cd"></p> 

													<div id="drop_file_zone_cd" class="displayNone"><label id="cd_file_name"></label>
														<label id="cd_page_no"></label><label id="cd_del"></label></div>


														<div class="displayNone" id="div-cd-imprint">
															<label class="csCheckbtn">CD Imprint
																<input id= "imprint" name = "imprint" class = "" type="checkbox" onclick="displayCDFields('imprint');">
																<span class="checkmark"></span>
															</label>
														</div>	

														<div class="displayNone" id="div-cd-template">
															<label>CD Template</label>

															<p><select name="cd-template" id="cd-template" ><option value="-1">Select</option><option value="Standardvorlage mit Logo">Standardvorlage mit Logo</option><option value="Standardvorlage ohne Logo">Standardvorlage ohne Logo</option><option value="Eigene Vorlage">Eigene Vorlage</option></select></p>

														</div>

														<div class="displayNone" id="div-cd-bag">
															<label>CD Bag*:</label>
															<p><select class = "" name = "cd-bag" id = "cd-bag" onchange="cdBagPosition(); displayPrice('','','','','','','','','','',this.value,'','');"><option value = "-1">Select</option>
																@foreach ($cd_bag as $key=>$listing)
																<option value="{{$listing->id}}" @if($listing->id == '1') selected @endif>{{$listing->bag}}</option>  
																@endforeach
															</select></p> <p class="error" id="error_cd_bag"> </p>
														</div>

														<div class="displayNone" id="div-pos-cd-bag">
															<label>CD BAG POSITION</label>
															<p><textarea class = ""  name="pos-cd-bag" id="pos-cd-bag" placeholder="At the end of the work inside the cover" ></textarea></p>
														</div>
			 
														<div class="displayBlock" id="div-data-check">
															<label>Data Check*:<a href="#" title="wird erklärt" data-toggle="tooltip" title="Data Check Select" class="formToolTip">i</a></label>
															<p><select id = "data_check" name = "data_check" onchange="displayPrice('','','','','','','','','',this.value,'','','');"><option value = "-1">Select</option>
																@foreach ($data_check as $key=>$listing)
																<option value="{{$listing->id}}" @if($listing->id == "1") selected @endif>{{$listing->check_list}}</option>  
																@endforeach
															</select></p> 
															<p class="error" id="error_data_check"></p>
														</div>	

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

<script src="{{ asset('public/js/frontend/checkout.js') }}" type="text/javascript" ></script>
<script src="{{ asset('public/js/frontend/dragdrop.js') }}" type="text/javascript" ></script>								