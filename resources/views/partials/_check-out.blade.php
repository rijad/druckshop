<div class="content-wrapper">
			<div class="container"> 

				<div class="checkoutStepper col-full text-left"> 

					<!-- ====================== stepper added ================== -->

					<form id="regForm" action="{{route('product-order')}}" method="POST" enctype="multipart/form-data"> 
						@csrf   

						<div class="stepperBullets">
							<div class="step active"><span>1</span></div> 
							<div class="step"><span>2</span></div>
							<div class="step"><span>3</span></div>
							<div class="step"><span>4</span></div> 
						</div> 
     
						<div class="checkoutBlock col-half text-left">
							{{-- <h1>Register:</h1> --}} 

							<!-- One "tab" for each step in the form: --> 
							<div class="tab" id="tab-fields">
								<div class="displayBlock">
									<label>{{ trans('checkout.binding_title') }}*:</label>
									<p><select class = "" name = "binding" id = "binding" onclick="" onchange="getPrinting(); displayPrice(this.value,'','','','','','','','','','','','','','',''); resetFields(this.id,this.value); displayFields(this.value); displayProductAttributes('1',this);  sampleImage(); ">
										<option value = "-1">Select</option>
										@foreach ($product_listing as $key=>$listing)
										@if($listing->id != 8 && $listing->id != 5)
										<option value="{{$listing->id}}" @if($listing->id == request()->id) selected @endif>{{$listing->title_english}}</option>  
										@endif
										@endforeach 
									</select></p><p class="error" id="error_binding"></p>
								</div>
								<div class="displayBlock" id="div-no-of-copies">
									<label>{{ trans('checkout.no_of_copies') }}*:</label>
									<p><input type = "text" class = "" name="no_of_copies" id="no-of-copies" placeholder="{{ trans('checkout.no_of_copies') }}" oninput="displayProductAttributes('2',this); displayPrice('','','','','','','','','','','','','',this.value,'','');"></p><p class="error" id="error_no_of_copies"></p>
								</div>
								<div class="displayBlock" id="div-page-format">
									<label>{{ trans('checkout.page_format') }}*:</label>
									<p><select class = "" onclick = "displayProductAttributes('3',this); sampleImage();" id="page-format" name="page-format" onchange="addTooltip(this); getA3A2Count(this);" ><option value="-1">Select</option></select></p><p class="error" id="error_page_format"></p>
								</div>
								<div class="displayNone" id="div-cover-color">
									<label>{{ trans('checkout.cover_color') }}*:</label> 
									<p><select name="cover-color" class = "" onclick = "displayProductAttributes('4',this); sampleImage();" onchange="" id="cover-color"><option value="-1">Select</option></select></p><p class="error" id="error_cover_color"></p>
								</div>
								<div class="displayNone" id="div-cover-sheet">
									<label>{{ trans('checkout.cover_sheet') }}*:<a href="#" data-toggle="tooltip" title="200 gm/m2 sheets" class="formToolTip">i</a></label>
									<p><select class = "" onclick = "displayProductAttributes('5',this);uploadDisplay(this.id,this.value);hideBindingElements('cover-sheet');" id="cover-sheet" name="cover-sheet"><option value="-1">Select</option></select></p>
									<p class="error" id="error_cover_sheet">
  
								</div> 

								<p class="outside-box-heading displayNone" id="drop_file_zone_cover_sheet_heading" >{{ trans('checkout.upload_cover_sheet') }}</p>
								<div id="drop_file_zone_cover_sheet" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayNone">
									<p class="inside-box-heading">{{ trans('checkout.upload_cover_sheet') }}</p>
									<div id="drag_upload_file_cover_sheet">
										<p>Drop file here<a href="#" data-toggle="tooltip" title="PDF" class="formToolTip">i</a></p>
										<p>or</p>
										<p><input type="button" value="Select File" onclick="file_explorer('drop_file_zone_cover_sheet');"></p>
										<input class = "displayNone" type="file" name="selectfile" id="selectfile" accept="application/pdf" value = "" multiple/>
										<input class = "displayNone" type="hidden" name="selectfile_coversheet" id="selectfile_coversheet" value = "" />
									</div>
								</div>
								<p class="error" id="error_selectfile_coversheet"></p>
  
								<div id="drop_file_zone_cover_sheet_info" class="displayNone"><label id="cover_sheet_file_name"></label>
									<label id="cover_sheet_page_no"></label>  <label id="cover_sheet_del"></label>
									</div>

									<div class="displayNone" id="div-back-cover">
										<label>{{ trans('checkout.back_sheet') }}*:<div title="200 gm/m2 sheets" class="formToolTip">i</div></label>
										<p><select class = "" onclick = "displayProductAttributes('6',this);uploadDisplay(this.id,this.value); hideBindingElements('back-cover');" id="back-cover" name="back-cover"><option value="-1">Select</option></select></p> <p class="error" id="error_back_cover">
									</div>
									
									<p class="outside-box-heading displayNone" id="drop_file_zone_back_cover_heading">{{ trans('checkout.upload_back_sheet') }}</p>
									<div id="drop_file_zone_back_cover" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayNone">
										<div id="drag_upload_file_back_cover">
											<p class="inside-box-heading">{{ trans('checkout.upload_back_sheet') }}</p>
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
										<label>{{ trans('checkout.side_options') }}*:</label>
										<p><select class = "" id = "page_options" name = "page_options" onclick="displayFieldsContent(this.value);  displayProductAttributes('7',this);"  onchange="displayPrice('','',this.value,'','','','','','','','','','','','','');" >
											<option value = "-1">Select</option>
											@foreach ($page_options as $key=>$listing)
											<option value="{{$listing->id}}">{{$listing->name_english}}</option>  
											@endforeach
										</select></p> <p class="error" id="error_page_options"></p>
									</div>

									<div class="displayNone" id="div-mirror">
										<label>{{ trans('checkout.edge_option') }}*:</label>
										<p><select class = "" id="mirror" name="mirror"><option value="-1">Select</option></select></p> <p class="error" id="error_mirror"></p>
									</div>

									<div class="displayBlock" id="div-paper-weight">
										<label>{{ trans('checkout.paper_weight') }}*:<a href="#" data-toggle="tooltip" title="
											for one-sided 100 g/m² paper &#013; for two-sided 120 g/m² paper" class="formToolTip">i</a></label>
										<p><select class = "" name="paper-weight" id="paper-weight" onchange="displayPrice('','','','','',this.value,'','','','','','','','','',''); getPaperWeightCount();"><option value="-1">Select</option></select></p> <p class="error" id="error_paper_weight"></p>
									</div>  

									<div class="displayBlock" id="div-no-of-copies">
										<label> {{ trans('checkout.no_of_pages') }}*:<a id="page-format-tooltip" href="#" data-toggle="tooltip" title="" class="formToolTip">i</a></label>
										<p><input type = "text" class = "" name="no_of_pages" id="no-of-pages" placeholder="No of Pages"  oninput="displayPrice('',this.value,'','','','','','','','','','','','','',''); displayProductAttributes('8',this);"></p>
										<p class="error" id="error_no_of_pages"></p>
									</div>
 									
 									<p class="outside-box-heading displayBlock"  id="drop_file_zone_content_heading">{{ trans('checkout.upload_thesis') }}</p>
									<div id="drop_file_zone_content" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayBlock">
										<div id="drag_upload_file">
											<p class="inside-box-heading">{{ trans('checkout.upload_thesis') }}</p>
											<p>Drop file here<a href="#" data-toggle="tooltip" title="
											PDF" class="formToolTip">i</a></p> 
											<p>or</p>
											<p><input class = "" type="button" value="Select File" onclick="file_explorer('drop_file_zone_content');"></p>
											<input type="file" name="selectfile" id="selectfile" accept="application/pdf">
											<input type="hidden" name="selectfile_content" id="selectfile_content">
											<input type="hidden" name="pg_no" id="pg_no">
										</div>
									</div>
									<p class="error" id="error_selectfile_content"></p>

									<div id="drop_file_zone_content_info" class="displayNone"><label id="content_file_name"></label>
										<label id="content_page_no"></label><label id="content_del"></label></div> 


										<p></p>
										<div class="displayBlock" id="div-color-pages">
											<label class="csCheckbtn">{{ trans('checkout.color_pages') }}
												<input type="checkbox" name = "color-pages" id = "color-pages" onchange="displayContentInput('Color_Pages'), resetPrice('colored_pages');">
												<span class="checkmark"></span>
											</label>
										</div>

										<div class="displayNone" id="div-page-numbers">
											<label>{{ trans('checkout.number_of_color_pages') }}*:<a href="#" data-toggle="tooltip" title="Page numbers of the PDF file, not of &#013; the thesis (document)" class="formToolTip">i</a></label>

											<p><input type = "text" class= "" name="page_numbers" id="page-numbers" placeholder="Page Numbers" value = "" oninput = "displayPrice('','','','','','','','','','','',this.value,'','','',''), checkPageRange('selectfile_content','content_page_no','page-numbers')">
												<p class="error" id="error_page_numbers"></p>
												<p class="error" id="error_range"></p><label>Example : 3,12,15-23,37</label></p>
										</div>
											<div class="displayBlock" id="div-A3-pages">
												<label class="csCheckbtn">{{ trans('checkout.din_A3_pages') }}
													<input class = ""  name = "A3-pages" id = "A3-pages" type="checkbox" onchange="displayContentInput('A3_Pages'); resetPrice('A3');"  > 
													<span class="checkmark"></span>
												</label>
											</div> 
 
											<div class="displayNone" id="div-number-of-pages">
												<label>{{ trans('checkout.number_din_A3_pages') }}*:<a href="#" data-toggle="tooltip" title=" It is printed with the same paper type and one-sided. &#013; It is printed with the same paper type and one-sided. " class="formToolTip">i</a></label>
												<p><input type = "text" class = "" name="number_of_pages" id="numbers-of-pages" placeholder="Number of Pages"  max="10" oninput = "displayPrice('','','','','','','',this.value,'','','','','','','','');">
												</p>
												<p id="A3_msg" class="displayNone">The maximum number of DIN A3 pages is: <span id="max-A3"></span></p>
												<p class="error" id="error_number_of_pages"></p>
											</div> 
											<div class="displayNone" id="div-pos-A3-pages">
												<label>{{ trans('checkout.position_din_A3_pages') }}</label>
												<p><textarea class = ""  name="pos_of_A3_pages" id="pos-of-A3-pages" placeholder="Number of Pages" ></textarea></p>
											</div> 

											<label class="outside-box-heading displayNone" id="drop_file_din_A3_heading">{{ trans('checkout.upload_din_A3_pages') }}</label>
											<div class="displayNone" id="drop_file_din_A3" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayBlock">
												<div id="drag_upload_file_A3" >
													<label class="inside-box-heading displayNone">{{ trans('checkout.upload_din_A3_pages') }}</label>
													<p>Drop file here<a href="#" data-toggle="tooltip" title="PDF" class="formToolTip">i</a></p> 
													<p>or</p>
													<p><input type="button" value="Select File" onclick="file_explorer('drop_file_din_A3');"></p>
													<input type="file" name ="selectfile" id="selectfile" accept="application/pdf">
													<input type="hidden" name="selectfile_din_A3" id="selectfile_din_A3">
												</div>
											</div>
											<p class="error" id="error_selectfile_din_A3"></p>


											<div id="drop_file_din_A3_info" class="displayNone"><label id="A3_file_name"></label>
												<label id="A3_page_no"></label><label id="A3_del"></label></div>

												<div class="displayBlock" id="div-A2-pages">
													<label class="csCheckbtn">Din A2 Pages
														<input class = "" name = "A2-pages" id = "A2-pages" type="checkbox" onchange="displayContentInput('A2_Pages'); resetPrice('A2');" >
														<span class="checkmark"></span>
													</label> 
												</div>
												

												<label class="outside-box-heading displayNone" id="div-number-of-A2-pages_heading">{{ trans('checkout.number_din_A2_pages') }}</label>
												<div class="displayNone" id="div-number-of-A2-pages">
													<label class="inside-box-heading">{{ trans('checkout.number_din_A2_pages') }}*:<a href="#" data-toggle="tooltip" title="It is folded and glued into a bag at the end of the thesis. &#013; The maximum number of DIN A2 pages is: 3 " class="formToolTip">i</a></label>
													<p><input type = "text" class = "" name="number_of_A2_pages" id="numbers-of-A2-pages" placeholder="Number of Pages" value = "" max="3" oninput = "displayPrice('','','','','','',this.value,'','','','','','','','','');"></p>
													<p id="A2_msg" class="displayNone">The maximum number of DIN A2 pages is: <span id="max-A2"></p>
													<p class="error" id="error_number_of_A2_pages"></p>
												</div>
												
												<label class="outside-box-heading displaynone" id="drop_file_din_A2_heading">{{ trans('checkout.upload_din_A2_pages') }}</label>
												<div class="displayNone" id="drop_file_din_A2" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayBlock">
													<div id="drag_upload_file_A2" >
														<label class="inside-box-heading diaplayNone">{{ trans('checkout.upload_din_A2_pages') }}</label>
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

											<div class="tab">

												<div class="displayNone" id="div-embossing">
													<label>{{ trans('checkout.embossing') }}*:</label>
													<p><select class = "" id = "embossing" name = "embossing" onchange="embossingChange(this);  displayPrice('','','','','','','','','','','','','','',this.value,'');">
														<option value = "-1">Select</option>
														<option value = "Edition">Edition</option>
														<option value = "Classic">Classic</option>
													</select></p> <p class="error" id="error_embossing"></p>
												</div>

												<div class="displayBlock" id="div-embossment-cover-sheet">
													<label class="csCheckbtn">{{ trans('checkout.refinement_cover_sheet') }}
														<input class =""name ="embossment-cover-sheet" id ="embossment-cover-sheet" type="checkbox" onchange="displayPrintFields('Embossment_Cover_Sheet'); displayPrice('','','',this.value,'','','','','','','','','','','',''); displayProductAttributes('9',this);" disabled>
														<span class="checkmark"></span>
													</label>
												</div> 

												<div class="displayNone" id="div-template">
													<label>{{ trans('checkout.template') }}*:<a href="#" data-toggle="tooltip" title="Data is taken from cover sheet" class="formToolTip">i</a></label>
													<p><select name ="template" id="template" onchange="displayPopUp(this.value);"><option value="-1">Select</option><option value="Standardvorlage mit Logo">Standardvorlage mit Logo</option><option value="Standardvorlage ohne Logo">Standardvorlage ohne Logo</option><option value="Eigene Vorlage">Eigene Vorlage</option></select></p>
													<p class="error" id="error_template"></p>
												</div>

												<div class="displayNone" id="div-template-classic">
													<label>{{ trans('checkout.choose_your_template') }}*:<a href="#" data-toggle="tooltip" title="Data is taken from cover sheet" class="formToolTip">i</a></label>
													<div id="template-classic"></div>
													<p class="error" id="error_template_classic"></p>
												</div>

													<div class="displayNone" id="div-display-image"></div>

												<p class="outside-box-heading displayNone" id="upload_custom_logo_heading">{{ trans('checkout.upload_logo_for_binding_template') }}</p>
												<div class="displayNone" id="upload_custom_logo" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayBlock">
													<div id="drag_upload_file_logo">
														<p class="inside-box-heading">{{ trans('checkout.upload_logo') }}</p>
														<p>Drop file here<a href="#" data-toggle="tooltip" title="jpeg,jpg,png" class="formToolTip">i</a></p> 
														<p>or</p>
														<p><input type="button" value="Select File" onclick="file_explorer('upload_custom_logo');"></p>
														<input type="file" name ="selectfile" id="selectfile" accept="image/x-png">

														<input type="hidden" name ="selectfile_logo" id="selectfile_logo" accept="image/x-png">
													</div>
												</div>  
												<p class="error" id="error_selectfile_logo"></p>

												<div id="drop_file_zone_logo_info" class="displayNone"><label id="logo_file_name"><a href="#" data-toggle="tooltip" title="Data is taken from cover sheet" class="formToolTip">i</a></label>
													<label id="logo_page_no"></label></div>
												
														
													<div class="displayNone" id="div-fonts">
														<label>{{ trans('checkout.font_type') }}*:</label>
														<p><select class = "" name="fonts" id="fonts"><option value = "-1">Select</option>
															@foreach ($fonts as $key=>$listing)
															<option value="{{$listing->font}}">{{$listing->font}}</option>  
															@endforeach
														</select></p> <p class="error" id="error_fonts"></p>
													</div>

													<div class="displayNone" id="div-date-format">
														<label>{{ trans('checkout.date_format') }}*:</label>
														<p><select class = "" id="date-format" name="date-format"><option value = "-1">Select</option>
															@foreach ($date_format as $key=>$listing)
															<option value="{{$listing->surname}}">{{$listing->date_format}}</option>  
															@endforeach
														</select></p> <p class="error" id="error_date_format">
													</div>   
													

													<p class="outside-box-testing displayNone" id="upload_custom_file_heading">{{ trans('checkout.upload_own_binding_template') }}</p>
													<div class="displayNone" id="upload_custom_file" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayBlock">
													<div id="drag_upload_file_file">
														<p class="inside-box-testing">{{ trans('checkout.upload_own_binding_template') }}</p>
														<p>Drop file here<a href="#" data-toggle="tooltip" title="The length X within 'spine X cm' is calculated by the thickness of the paper (to be set in the admin area under paper weight) times the number of sheets + 0.5 mm." class="formToolTip">i</a></p> 
														<p>or</p>
														<p><input type="button" value="Select File" onclick="file_explorer('upload_custom_file');"></p>
														<input  class="displayNone" type="file" name ="selectfile" id="selectfile" accept="application/pdf">

														<input type="hidden" name ="selectfile_file" id="selectfile_file" accept="image/x-png">
													</div> 
												</div>  
												<p class="error" id="error_selectfile_file"></p>

												<div id="drop_file_info" class="displayNone"><label id="file_name"></label> <label id="file_page_no"></label> <label class = "displayNone" id="download_stylesheet"> <a href={{url('/').'/public/style_sheet/stylesheet.pdf'}} target="_blank" >Link for sample style sheet</a></label></div>
 
													<div class="displayBlock" id="div-embossment-spine">
														<label class="csCheckbtn">{{ trans('checkout.refinement_spine') }}<a href="#" data-toggle="tooltip" title="Data is taken from cover sheet" class="formToolTip">i</a>
															<input class = "" type="checkbox" id = "embossment-spine" name = "embossment-spine" onchange = "displayPrice('','','','',this.value,'','','','','','','','','','',''); displayProductAttributes('10',this); displayPrintFields('Embossment_spine'); " disabled>
															<span class="checkmark"></span>
														</label>
														<p id="spine-count"></p>
														<p id="spine-message"></p>
														<input type = "hidden" id="spine-count-hidden" name="spine-count-hidden">
													</div> 

													<div class="displayNone" id="div-fonts-spine">
														<label>{{ trans('checkout.font_type') }}*:</label>
														<p><select class = "" name="fonts-spine" id="fonts-spine"><option value = "-1">Select</option>
															@foreach ($fonts as $key=>$listing)
															<option value="{{$listing->font}}">{{$listing->font}}</option>  
															@endforeach
														</select></p> <p class="error" id="error_fonts-spine"></p>
													</div>

													<div class="displayNone" id="div-direction">
													<label>{{ trans('checkout.direction') }}:</label>
													<p><select class = "" id = "direction" name = "direction">
														<option value = "-1">Select</option>
														<option value = "Top Down">Top Down</option>
														<option value = "Bottom Up">Bottom Up</option>
													</select></p> <p class="error" id="error_direction"></p>
													</div>

													<div class="displayNone" id="div-section-1">
													<p id="section-1" class = "displayBlock">{{ trans('checkout.section') }} 1:</p>

													
													<p><label id="field-1" class = "displayBlock">{{ trans('checkout.field') }} 1:</label><select class = "" id = "fields_1" name = "fields_1" onchange="section2();" class="">
														<option value = "-1">Select</option>
														<option value = "Name">Name</option>
														<option value = "Title">Title</option>
														<option value = "Date">Date</option>
														<option value = "Topic">Topic</option>
													</select></p>
													
													
													<p><label id="position-1" class = "displayBlock">{{ trans('checkout.position') }} 1:</label><select class = "" id = "pos_1" name = "pos_1" onchange="section2();">
														<option value = "-1">Select</option>
														<option value = "Top">Top</option>
														<option value = "Middle">Middle</option>
														<option value = "Bottom">Bottom</option>
													</select></p> 

													<p><input type="text" id ="input_1" name = "input_1" class="displayBlock" placeholder=""></p>
													<div>
													<button type="button" onclick="addSection('div-section-2')">{{ trans('checkout.add_section') }}</button> 
													</div>
													<p class="error" id="error-section-1"></p> 
													</div>

													<div class="displayNone" id="div-section-2"> 
													<p id="section-2">{{ trans('checkout.section') }} 2:</p>

													
													<p><label id="field-2" class = "">{{ trans('checkout.field') }} 2:</label><select class = "" id = "fields_2" name = "fields_2" onchange="section3();">
														<option value = "-1">Select</option>
													</select></p>
													
													 
													<p><label id="position-2" class = "">{{ trans('checkout.position') }} 2:</label><select class = "" id = "pos_2" name = "pos_2" onchange="section3();">
														<option value = "-1">Select</option>
													</select></p> 

													<p><input type="text" id ="input_2" name = "input_2" class="displayBlock" placeholder=""></p>

													<div>
													<button type="button" onclick="addSection('div-section-3')">{{ trans('checkout.add_section') }}</button> <button type="button" onclick = "removeSection('div-section-2','fields_2','pos_2')">{{ trans('checkout.remove_section') }}</button>
													</div>
													<p class="error" id=""></p>
													</div>

													<div class="displayNone" id="div-section-3">
													<p id="section-3" class = "">{{ trans('checkout.section') }} 3:</p>

													
													<p><label id="field-3" class = "">{{ trans('checkout.field') }} 3:</label><select class = "" id = "fields_3" name = "fields_3" onchange="section4();">
														<option value = "-1">Select</option>
													</select></p>
													
													
													<p><label id="position-3" class = "">{{ trans('checkout.position') }} 3</label><select class = "" id = "pos_3" name = "pos_3" onchange="section4();">
														<option value = "-1">Select</option>
													</select></p> 

													<p><input type="text" id ="input_3" name = "input_3" class="displayBlock" placeholder=""></p>

													<div>
													<button type="button" onclick = "removeSection('div-section-3','fields_3','pos_3')">{{ trans('checkout.remove_section') }}</button>
													</div>
													</div> 

													<div><p class="error" id="error_sections"></p></div>

													<div class="displayNone" id="div-remarks">
														<label>{{ trans('checkout.remarks') }}</label>
														<p><textarea class = "" name="remarks" id="remarks" placeholder="remarks"></textarea></p>
														<p class="error" id="error_remarks"></p>
													</div>	

													<div class="modal fade" tabindex="-1" role="dialog" id="modal-logo"> 
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																	<h4 class="modal-title">Modal title</h4>
																</div>
																<div class="modal-body" id="modal-body">

																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
																	<button type="button" class="btn btn-primary" data-dismiss="modal" onclick = "displayImgSelect();">Save changes</button>
																</div>
															</div><!-- /.modal-content -->
														</div><!-- /.modal-dialog -->
													</div><!-- /.modal -->
													</div>	

												{{-- </div> --}}

												<div class="tab">
													<div class="displayBlock" id="div-cd">
														<label class="csCheckbtn">CD
															<input class = ""  name = "cd-check" id = "cd-check" type="checkbox" onchange="displayCDFields('cd'); resetPrice('cd');">
															<span class="checkmark"></span>
														</label>
													</div> 

													<div class="displayNone" id="div-number-of-cds">
														<label>{{ trans('checkout.number_of_cds') }}*:</label>
														<p><input type = "text" class = "" name="number_of_cds" id="numbers-of-cds" placeholder="Number of CDs" oninput= "displayPrice('','','','','','','','',this.value,'','','','','','',''); displayProductAttributes('11',this);"></p>
														<p class="error" id="error_number_of_cds"></p>
													</div>


													<p class="outside-box-heading displayNone" id="upload_cd_heading">{{ trans('checkout.upload_files_on_cd') }}</p>

														<div class="displayNone" id="upload_cd" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayBlock">
														<div id="drag_upload_file_cd">
															<p class="inside-box-heading">{{ trans('checkout.upload_files_on_cd') }}</p>
															<p>Drop file here</p>   
															<p>or</p>
															<p><input type="button" value="Select File" onclick="file_explorer('upload_cd');"></p>
															<input type="file" id="selectfile" name="selectfile" multiple>
															<input type="hidden" id="selectfile_cd" name="selectfile_cd">
														</div>
													</div> 
													<p class="error" id="error_selectfile_cd"></p> 

													<div id="drop_file_zone_cd" class="displayNone"><label id="cd_file_name"></label>
														<label id="cd_page_no"></label><label id="cd_del"></label></div>


														<div class="displayNone" id="div-cd-imprint">
															<label class="csCheckbtn">{{ trans('checkout.cd_imprint') }}
																<input id= "imprint" name = "imprint" class = "" type="checkbox" onchange="displayCDFields('imprint'); resetPrice('cd_imprint');">
																<span class="checkmark"></span>
															</label>
														</div>	

														<div class="displayNone" id="div-cd-template">
															<label>{{ trans('checkout.cd_imprint') }}</label>

															<p><select name="cd-template" id="cd-template" onchange="displayPopUpCD(this.value);"><option value="-1">Select</option><option value="Standardvorlage mit Logo">Standardvorlage mit Logo</option><option value="Standardvorlage ohne Logo">Standardvorlage ohne Logo</option><option value="Eigene Vorlage">Eigene Vorlage</option></select></p>

														</div>

															<div class="displayNone" id="div-display-image-cd"></div>
														
														
													
													<p class="outside-box-heading displayNone"  id="upload_custom_logo_cd_heading">{{ trans('checkout.upload_logo_for_cd_template') }}</p>

													<div class="displayNone" id="upload_custom_logo_cd" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayBlock">
														<div id="drag_upload_file_logo">
															<p class="inside-box-heading">{{ trans('checkout.upload_logo_for_cd_template') }}</p>
															<p>Drop file here<a href="#" data-toggle="tooltip" title="jpeg,jpg,png" class="formToolTip">i</a></p> 
															<p>or</p>
															<p><input type="button" value="Select File" onclick=" file_explorer('upload_custom_logo_cd');"></p>
															<input type="file" name ="selectfile" id="selectfile" accept="image/x-png">
 
															<input type="hidden" name ="selectfile_logo_cd" id="selectfile_logo_cd" accept="image/x-png">
														</div>
													</div>  
													<p class="error" id="error_selectfile_logo_cd"></p>

													<div id="drop_file_zone_logo_info_cd" class="displayNone"><label id="logo_file_name_cd"></label>
													<label id="logo_page_no_cd"></label><label id="logo_del_cd"></label></div>
												
														

														<div class="modal fade" tabindex="-1" role="dialog" id="modal-cd"> 
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																	<h4 class="modal-title">Modal title</h4>
																</div>
																<div class="modal-body" id="modal-body-cd">

																</div>
																<div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
																	<button type="button" class="btn btn-primary" data-dismiss="modal" onclick = "displayImgSelectCd();">Save changes</button>
																</div>
															</div><!-- /.modal-content -->
														</div><!-- /.modal-dialog -->
													</div><!-- /.modal -->
	
														<div class="displayNone" id="div-fonts-cd">
														<label><p>{{ trans('checkout.font') }}</p>*:</label>
														<p><select class = "" name="fonts-cd" id="fonts-cd"><option value = "-1">Select</option>
															@foreach ($fonts as $key=>$listing)
															<option value="{{$listing->font}}">{{$listing->font}}</option>  
															@endforeach
														</select></p> <p class="error" id="error_fonts"></p>
													</div>
 
													<p class="outside-box-heading displayNone"  id="upload_cd_without_logo_heading">{{ trans('checkout.upload_own_cd_template') }}</p>

													<div class="displayNone" id="upload_cd_without_logo" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayBlock">
														<div id="drag_upload_cd_without_logo">
															<p class="inside-box-heading">{{ trans('checkout.upload_own_cd_template') }}</p>
															<p>Drop file here<a href="#" data-toggle="tooltip" title="jpeg,jpg,png" class="formToolTip">i</a></p> 
															<p>or</p>
															<p><input type="button" value="Select File" onclick=" file_explorer('upload_cd_without_logo');"></p>
															<input type="file" name ="selectfile" id="selectfile" accept="image/x-png" onchange = "displayPrice('','','','','','','','','','','','','','','',this.value);">
 
															<input type="hidden" name ="selectfile_upload_cd_without_logo" id="selectfile_upload_cd_without_logo" accept="image/x-png">
														</div>
													</div>  
													<p class="error" id="error_selectfile_logo_cd"></p>

													<div id="drop_upload_cd_without_logo" class="displayNone"><label id="file_name_upload_cd_without_logo"></label>
													<label id="page_no_upload_cd_without_logo"></label><label id="del_upload_cd_without_logo"></label></div>

														<div class="displayNone" id="div-cd-bag">
															<label>{{ trans('checkout.cd_bag') }}*:</label>
															<p><select class = "" name = "cd-bag" id = "cd-bag" onchange="cdBagPosition(); displayPrice('','','','','','','','','','',this.value,'','','','','');"><option value = "-1">Select</option>
																@foreach ($cd_bag as $key=>$listing)
																<option value="{{$listing->id}}" @if($listing->id == '1') selected @endif>{{$listing->bag}}</option>  
																@endforeach
															</select></p> <p class="error" id="error_cd_bag"> </p>
														</div>

														<div class="displayNone" id="div-pos-cd-bag">
															<label>{{ trans('checkout.position') }}</label>
															<p><textarea class = ""  name="pos-cd-bag" id="pos-cd-bag" placeholder="At the end of the work inside the cover" ></textarea></p>
														</div>
			 
														<div class="displayBlock" id="div-data-check">
															<label>{{ trans('checkout.data_check') }}*:<a href="#" title="wird erklärt" data-toggle="tooltip" title="Data Check Select" class="formToolTip">i</a></label>
															<p><select id = "data_check" name = "data_check" onchange="displayPrice('','','','','','','','','',this.value,'','','','','','');"><option value = "-1">Select</option>
																@foreach ($data_check as $key=>$listing)
																<option value="{{$listing->id}}" @if($listing->id == "1") selected @endif>{{$listing->check_list}}</option>  
																@endforeach
															</select></p> 
															<p class="error" id="error_data_check"></p>
														</div>	

													</div> 


													<div class="stepperButtons">
														<div>
															<button type="button" id="prevBtn" onclick="nextPrev(-1)">{{ trans('checkout.previous') }}</button>
															<button type="button" id="nextBtn" onclick="nextPrev(1)">{{ trans('checkout.next') }}</button>
														</div>
													</div>

												</div> <!-- col ends -->
												<!--  Print Product Attributes -->
												<div class="checkoutBlock col-half text-left detail-right-fix">
													<div class="prodkt-info">
														<ul id="prodkt-attrib">	</ul>
													</div>
													<div class="prodkt-info">
														<div id="sampleImage" class="avatar avatar-original center-block"><!--  hhhhhh -->
														</div>
													</div>
													<div class="servicePrice">  
														<ul> 
															<li id="no_toggle"><p>{{ trans('checkout.total') }}</p><span id="total"><big>0.00 €</big></span></li>
															<li class="displayNone"><p>{{ trans('checkout.binding_price') }}</p><span id="binding_price"><big>0.00 €</big></span></li>
															<li class="displayNone"><p>{{ trans('checkout.printouts') }}</p><span id="printout"><big>0.00 €</big></span></li>
															<li class="displayNone"><p>{{ trans('checkout.embossment') }}</p><span id="embossment"><big>0.00 €</big></span></li>
															<li class="displayNone"><p>{{ trans('checkout.data_checks') }}</p><span id="data_check_price"><big>0.00 €</big></span></li>
															<li class="displayNone"><p>{{ trans('checkout.cds') }}</p><span id="cd_dvd"><big>0.00 €</big></span></li>
															<li id="toggle" class="morelink" onclick="openTray(this);"><p>View More...</p></li>
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

<script src="{{ asset('public/js/frontend/checkout.js') }}" type="text/javascript" ></script>
<script src="{{ asset('public/js/frontend/dragdrop.js') }}" type="text/javascript" ></script>	
								
<script>// Reset Price elements on new order 

jQuery.noConflict()(function ($) {
$(document).ready(function(){   	

		document.getElementById('binding_price').innerHTML = "";
		document.getElementById('printout').innerHTML = "" ;
		document.getElementById('data_check_price').innerHTML = "" ;
		document.getElementById('cd_dvd').innerHTML = "" ;
		document.getElementById('total').innerHTML = "" ;
		document.getElementById('total_price').value = "";


	    $.ajax({
			url: base_url+'/clear-session', 
			type: 'GET', 
			success: function (response){
				console.log(response); 
			}
		}); 

		$('#binding').trigger('onchange');
		$('#binding').trigger('onclick');
		$('#cd-bag').trigger('onchange');  
		$('#data_check').trigger('onchange');
});  

});

 // $(".morelink").click(function(){


	// if($(".servicePrice").find('ul').find('li').hasClass('morelink')){  
 // 		$(".servicePrice").find('ul').find('li').removeClass('morelink');
 // 		$("#toggle").addClass('lesslink').find('p').text('View Less...');
 // 	}

 // 	if($(".servicePrice").find('ul').find('li').hasClass('displayNone')){
 // 		$(".servicePrice").find('ul').find('li').removeClass('displayNone');
 // 	}

 	
    
 //  });

 // $("#lesslink").click(function(){  alert('ss');


 // 	$(".servicePrice").find('ul').find('li').addBack().addClass('displayNone');

 // 	 if($(".servicePrice").find('ul').find('li').hasClass('lesslink')){
 // 		$(".servicePrice").find('ul').find('li').removeClass('lesslink');
 // 		$("#toggle").removeClass('displayNone');
 // 		$("#toggle").addClass('morelink').text('View More..');
 // }

    
 //  });


 function openTray(elem){
 	if($(elem).attr("class") == "morelink"){
 		if($(".servicePrice").find('ul').find('li').hasClass('morelink')){  
	 		$(".servicePrice").find('ul').find('li').removeClass('morelink');
	 		$("#toggle").addClass('lesslink').find('p').text('View Less...');
 		}

	 	if($(".servicePrice").find('ul').find('li').hasClass('displayNone')){
	 		$(".servicePrice").find('ul').find('li').removeClass('displayNone');
	 	}
 	}else if($(elem).attr("class") == "lesslink"){

 		$(".servicePrice li").addBack().addClass('displayNone');
 		$("#no_toggle").removeClass('displayNone');

	 	 if($(".servicePrice").find('ul').find('li').hasClass('lesslink')){
	 		$(".servicePrice").find('ul').find('li').removeClass('lesslink');
	 		$("#toggle").removeClass('displayNone');
	 		$("#toggle").addClass('morelink').text('View More..');
	 	}

 	}
 }


</script> 


