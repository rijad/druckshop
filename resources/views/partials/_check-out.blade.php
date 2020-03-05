		<div class="content-wrapper">
			<div class="container">

				<div class="checkoutStepper col-full text-left">

					<!-- ====================== stepper added ================== -->

					<form id="regForm" action="">

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
									<p><select id = "binding" onclick="displayFields(this.value);displayProductAttributes('1',this);">
										<option value = "-1">Select</option>
										@foreach ($product_listing as $key=>$listing)
										<option value="{{$listing->id}}">{{$listing->title_english}}</option>  
										@endforeach
									</select></p>
								</div>
								<div class="displayBlock" id="div-no-of-copies">
									<label>No of Copies</label>
									<p><input name="no_of_copies" id="no-of-copies" placeholder="No of Copies" oninput="displayProductAttributes('2',this);"></p>
								</div>
								<div class="displayBlock" id="div-page-format">
									<label>Page Format*:</label>
									<p><select onclick = "displayProductAttributes('3',this);" id="page-format"><option value="-1">Select</option></select></p>
								</div>
								<div class="displayNone" id="div-cover-color">
									<label>Cover Color*:</label> 
									<p><select onclick = "displayProductAttributes('4',this);" id="cover-color"><option value="-1">Select</option></select></p>
								</div>
								<div class="displayNone" id="div-cover-sheet">
									<label>Cover Sheet*:<div title="200 gm/m2 sheets" class="formToolTip">i</div></label>
									<p><select onclick = "displayProductAttributes('5',this);uploadDisplay(this.id,this.value);" id="cover-sheet"><option value="-1">Select</option></select></p>

								</div> 

								<div id="drop_file_zone_cover_sheet" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayNone">
									<div id="drag_upload_file_cover_sheet">
										<p>Drop file here</p>
										<p>or</p>
										<p><input type="button" value="Select File" onclick="file_explorer('drop_file_zone_cover_sheet');"></p>
										<input class = "displayNone" type="file" id="selectfile" accept="application/pdf" value = "" />
										<input class = "displayNone" type="hidden" id="selectfile_coversheet" value = "" />
									</div>
								</div>
  
								<div id="drop_file_zone_cover_sheet_info" class="displayNone"><label id="cover_sheet_file_name"></label>
									<label id="cover_sheet_page_no"></label>
									</div>

									<div class="displayNone" id="div-back-cover">
										<label>Back Sheet*:<div title="200 gm/m2 sheets" class="formToolTip">i</div></label>
										<p><select onclick = "displayProductAttributes('6',this);uploadDisplay(this.id,this.value);" id="back-cover"><option value="-1">Select</option></select></p> 
									</div>

									<div id="drop_file_zone_back_cover" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayNone">
										<div id="drag_upload_file_back_cover">
											<p>Drop file here</p>
											<p>or</p>  
											<p><input type="button" value="Select File" onclick="file_explorer('drop_file_zone_back_cover');"></p>
											<input class = "displayNone" type="file" id="selectfile" accept="application/pdf" value = "" />
											<input class = "displayNone" type="hidden" id="selectfile_backcover" value = "" />
										</div>
									</div>

									<div id="drop_file_zone_back_cover_sheet_info" class="displayNone"><label id="back_cover_file_name"></label>
										<label id="back_cover_page_no"></label><label id="back_cover_del"></label></div>

										{{--  <p><textarea></textarea></p>  --}}
									{{-- <label>Back Sheet</label>
									<p><select>
										@foreach ($paper_format as $key=>$format)
										<option value="{{$format->id}}">{{$format->page_format}}</option>  
										@endforeach
									</select></p>

									<p>
										<label class="csCheckbtn">One
											<input type="checkbox" checked="checked">
											<span class="checkmark"></span>
										</label>
									</p>


									<p>
										<label class="csRadiobtn">One
											<input type="radio" checked="checked" name="radio">
											<span class="checkmark"></span>
										</label>
										<label class="csRadiobtn">Two
											<input type="radio" name="radio">
											<span class="checkmark"></span>
										</label>
									</p> --}}

								</div>
								<div class="tab">
									<div class="displayBlock">
										<label>Side Options*:</label>
										<p><select id = "page_options" onclick="displayFieldsContent(this.value);">
											<option value = "-1">Select</option>
											@foreach ($page_options as $key=>$listing)
											<option value="{{$listing->id}}">{{$listing->name_english}}</option>  
											@endforeach
										</select></p> 
									</div>

									<div class="displayBlock" id="div-paper-weight">
										<label>Paper Weight*:</label>
										<p><select id="paper-weight" onclick="displayPrice(this,'','');"><option value="-1">Select</option></select></p>
									</div>

									<div class="displayNone" id="div-mirror">
										<label>Mirror*:</label>
										<p><select id="mirror"><option value="-1">Select</option></select></p>
									</div>

									<div class="displayBlock" id="div-no-of-copies">
										<label>No of Pages*:</label>
										<p><input name="no_of_pages" id="no-of-pages" placeholder="No of Pages" oninput="this.className = ''"></p>
									</div>

									<div id="drop_file_zone_content" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayBlock">
										<div id="drag_upload_file">
											<p>Drop file here</p> 
											<p>or</p>
											<p><input type="button" value="Select File" onclick="file_explorer('drop_file_zone_content');"></p>
											<input type="file" id="selectfile" accept="application/pdf">
										</div>
									</div>

									<div id="drop_file_zone_content" class="displayNone"><label id="content_file_name"></label>
										<label id="content_page_no"></label><label id="content_del"></label></div>
										<p></p>
										<div class="displayBlock" id="div-color-pages">
											<label class="csCheckbtn">Color Pages
												<input type="checkbox" onclick="displayContentInput('Color_Pages');">
												<span class="checkmark"></span>
											</label>
										</div>

										<div class="displayNone" id="div-page-numbers">
											<label>Colored Page Numbers*:</label>
											<p><input name="page_numbers" id="page-numbers" placeholder="Page Numbers" oninput="this.className = ''"></p>

											<div class="displayBlock" id="div-A3-pages">
												<label class="csCheckbtn">A3 Pages
													<input type="checkbox" onclick="displayContentInput('A3_Pages');">
													<span class="checkmark"></span>
												</label>
											</div>

											<div class="displayNone" id="div-number-of-pages">
												<label>Number of Pages*:</label>
												<p><input name="number_of_pages" id="numbers-of-pages" placeholder="Number of Pages" oninput="this.className = ''" max="10"></p>
											</div>
											<div class="displayNone" id="div-pos-A3-pages">
												<label>Position A3 Pages in Work</label>
												<p><textarea name="pos_of_A3_pages" id=" pos-of-A3-pages" placeholder="Number of Pages" oninput="this.className = ''"></textarea></p>
											</div>
											<div class="displayNone" id="drop_file_din_A3" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayBlock">
												<div id="drag_upload_file">
													<p>Drop file here</p> 
													<p>or</p>
													<p><input type="button" value="Select File" onclick="file_explorer('drop_file_din_A3');"></p>
													<input type="file" id="selectfile" accept="application/pdf">
												</div>
											</div>

											<div id="drop_file_zone_A3" class="displayNone"><label id="A3_file_name"></label>
												<label id="A3_page_no"></label><label id="A3_del"></label></div>

												<div class="displayBlock" id="div-A2-pages">
													<label class="csCheckbtn">Din A2 Pages
														<input type="checkbox" onclick="displayContentInput('A2_Pages');" >
														<span class="checkmark"></span>
													</label>
												</div>

												<div class="displayNone" id="div-number-of-A2-pages">
													<label>Number of Pages*:</label>
													<p><input name="number_of_A2_pages" id="numbers-of-A2-pages" placeholder="Number of Pages" oninput="this.className = ''" max="10"></p>
												</div>

												<div class="displayNone" id="drop_file_din_A2" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayBlock">
													<div id="drag_upload_file">
														<p>Drop file here</p> 
														<p>or</p>
														<p><input type="button" value="Select File" onclick="file_explorer('drop_file_din_A2');"></p>
														<input type="file" id="selectfile" accept="application/pdf">
													</div>
												</div> 

												<div id="drop_file_zone_A2" class="displayNone"><label id="A2_file_name"></label>
													<label id="A2_page_no"></label><label id="A2_del"></label></div>

												</div>
											</div>

											<div class="tab">
												<div class="displayBlock" id="div-embossment-cover-sheet">
													<label class="csCheckbtn">Embossment Cover Sheet
														<input type="checkbox" onclick="displayPrintFields('Embossment_Cover_Sheet');" >
														<span class="checkmark"></span>
													</label>
												</div>

												<div class="displayNone" id="div-template">
													<label>Template*:</label>
													<p><select id="template" onchange="displayPopUp(this.value);"><option value="-1">Select</option><option value="Standardvorlage mit Logo">Standardvorlage mit Logo</option><option value="Standardvorlage ohne Logo">Standardvorlage ohne Logo</option><option value="Eigene Vorlage">Eigene Vorlage</option></select></p>
												</div>

												<div class="displayNone" id="upload_custom_logo" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayBlock">
													<div id="drag_upload_file">
														<p>Drop file here</p> 
														<p>or</p>
														<p><input type="button" value="Select File" onclick="file_explorer('upload_custom_logo');"></p>
														<input type="file" id="selectfile" accept="image/x-png">
													</div>
												</div>  

												<div id="drop_file_zone_logo" class="displayNone"><label id="logo_file_name"></label>
													<label id="logo_page_no"></label><label id="logo_del"></label></div>

													<div class="displayNone" id="div-template">
														<label>Fonts*:</label>
														<p><select id="template"><option value="-1">Select</option><option value="Standardvorlage mit Logo">Standardvorlage mit Logo</option><option value="Standardvorlage ohne Logo">Standardvorlage ohne Logo</option><option value="Eigene Vorlage">Eigene Vorlage</option></select></p>
													</div>	

													<div class="displayNone" id="div-display-image"> </div>

													<div class="displayNone" id="div-fonts">
														<label>Fonts*:</label>
														<p><select><option value = "-1">Select</option>
															@foreach ($fonts as $key=>$listing)
															<option value="{{$listing->font}}">{{$listing->font}}</option>  
															@endforeach
														</select></p> 
													</div>

													<div class="displayNone" id="div-date-format">
														<label>Date Format*:</label>
														<p><select><option value = "-1">Select</option>
															@foreach ($date_format as $key=>$listing)
															<option value="{{$listing->surname}}">{{$listing->date_format}}</option>  
															@endforeach
														</select></p> 
													</div>

													<div class="displayNone" id="div-embossment-cover-sheet">
														<label class="csCheckbtn">Embossment Spine
															<input type="checkbox" disabled>
															<span class="checkmark"></span>
														</label>
													</div>

													<div class="displayNone" id="div-remarks">
														<label>Remarks</label>
														<p><textarea name="remarks" id=" remarks" placeholder="remarks" oninput="this.className = ''"></textarea></p>
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

												<div class="tab">
													<div class="displayBlock" id="div-cd">
														<label class="csCheckbtn">CD
															<input type="checkbox" onclick="displayCDFields('cd');">
															<span class="checkmark"></span>
														</label>
													</div>

													<div class="displayNone" id="div-number-of-cds">
														<label>Number of CDs*:</label>
														<p><input name="number_of_cds" id="numbers-of-cds" placeholder="Number of CDs" oninput="this.className = ''"></p>
													</div>

													<div class="displayNone" id="upload_cd" ondrop="upload_file(event,this.id)" ondragover="return false" class="displayBlock">
														<div id="drag_upload_file">
															<p>Drop file here</p>  
															<p>or</p>
															<p><input type="button" value="Select File" onclick="file_explorer('upload_cd');"></p>
															<input type="file" id="selectfile" accept="image/x-png">
														</div>
													</div>  

													<div id="drop_file_zone_cd" class="displayNone"><label id="cd_file_name"></label>
														<label id="cd_page_no"></label><label id="cd_del"></label></div>


														<div class="displayBlock" id="div-cd-imprint">
															<label class="csCheckbtn">CD Imprint
																<input type="checkbox" onclick="displayCDFields('imprint');">
																<span class="checkmark"></span>
															</label>
														</div>	

														<div class="displayNone" id="div-cd-template">
															<label>CD Template</label>
															<p><select id="cd-template" onchange="displayPopUp(this.value);"><option value="-1">Select</option><option value="Standardvorlage mit Logo">Standardvorlage mit Logo</option><option value="Standardvorlage ohne Logo">Standardvorlage ohne Logo</option><option value="Eigene Vorlage">Eigene Vorlage</option></select></p>
														</div>



														<div class="displayBlock" id="div-cd-bag">
															<label>CD Bag*:</label>
															<p><select><option value = "-1">Select</option>
																@foreach ($cd_bag as $key=>$listing)
																<option value="{{$listing->id}}">{{$listing->bag}}</option>  
																@endforeach
															</select></p> 
														</div>

														<div class="displayBlock" id="div-data-check">
															<label>Data Check*:</label>
															<p><select id = "data_check" onclick="displayPrice('','',this);"><option value = "-1">Select</option>
																@foreach ($data_check as $key=>$listing)
																<option value="{{$listing->id}}">{{$listing->check_list}}</option>  
																@endforeach
															</select></p> 
														</div>	

													</div>


													<div class="stepperButtons" style="overflow:auto;">
														<div>
															<button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
															<button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
														</div>
													</div>

												</div> <!-- col ends -->
												<!--  Print Product Attributes -->
												<div class="checkoutBlock col-half text-left">
													<div class="prodkt-info">
														<ul id="prodkt-attrib">	</ul>
													</div>
													<div class="servicePrice">
														<ul>
															<li><p>Preis pro Auflage</p><span id="price_per_copy"><big>0.00 €</big></span></li>
															<li><p>Preis pro CD</p><span id="price_per_cd"><big>0.00 €</big></span></li>
															<li><p>Preis des Datenchecks</p><span id="price_of_data_check"><big>0.00 €</big></span></li>
															<li><p>Gesamtpreis</p><span id="total"><big>0.00 €</big></span></li>
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