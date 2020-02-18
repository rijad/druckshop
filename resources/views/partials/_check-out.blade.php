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
								<label>Binding:</label>
								<p><select onclick="displayFields(this.value);">
									<option value = "-1">Select</option>
									@foreach ($product_listing as $key=>$listing)
									<option value="{{$listing->id}}">{{$listing->title_english}}</option>  
									@endforeach
								</select></p>
							</div>
							<div class="displayBlock" id="div-no-of-copies">
								<label>No of Copies</label>
								<p><input name="no_of_copies" id="no-of-copies" placeholder="No of Copies" oninput="this.className = ''"></p>
							</div>
							<div class="displayBlock" id="div-page-format">
								<label>Page Format</label>
								<p><select id="page-format"><option value="-1">Select</option></select></p>
							</div>
							<div class="displayNone" id="div-cover-color">
								<label>Cover Color</label> 
								<p><select id="cover-color"><option value="-1">Select</option></select></p>
							</div>
							<div class="displayNone" id="div-cover-sheet">
								<label>Cover Sheet <div title="200 gm/m2 sheets" class="formToolTip">i</div></label>
								<p><select id="cover-sheet" onclick="upload_display(this.id,this.value);"><option value="-1">Select</option></select></p>
 
							</div>

							<div id="drop_file_zone_cover_sheet" ondrop="upload_file(event)" ondragover="return false" class="displayNone">
								<div id="drag_upload_file">
									<p>Drop file here</p>
									<p>or</p>
									<p><input type="button" value="Select File" onclick="file_explorer();"></p>
									<input type="file" id="selectfile" />
								</div>
							</div>

							<div class="displayNone" id="div-back-cover">
								<label>Back Sheet<div title="200 gm/m2 sheets" class="formToolTip">i</div></label>
								<p><select id="back-cover" onclick="upload_display(this.id,this.value);"><option value="-1">Select</option></select></p>
							</div>

							<div id="drop_file_zone_back_cover" ondrop="upload_file(event)" ondragover="return false" class="displayNone">
								<div id="drag_upload_file">
									<p>Drop file here</p>
									<p>or</p>
									<p><input type="button" value="Select File" onclick="file_explorer();"></p>
									<input type="file" id="selectfile">
								</div>
							</div>

							


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

								<div class="tab">Contact Info:
									<p><input placeholder="E-mail..." oninput="this.className = ''"></p>
									<p><input placeholder="Phone..." oninput="this.className = ''"></p>
								</div>

								<div class="tab">Birthday:
									<p><input placeholder="dd" oninput="this.className = ''"></p>
									<p><input placeholder="mm" oninput="this.className = ''"></p>
									<p><input placeholder="yyyy" oninput="this.className = ''"></p>
								</div>

								<div class="tab">Login Info:
									<p><input placeholder="Username..." oninput="this.className = ''"></p>
									<p><input placeholder="Password..." oninput="this.className = ''"></p>
								</div>


								<div class="stepperButtons" style="overflow:auto;">
									<div>
										<button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
										<button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
									</div>
								</div>

							</div> <!-- col ends -->

							<div class="checkoutBlock col-half text-left">
								<div class="prodkt-info">
									<ul>
										<li>Bindungsart: Hardcover1</li>
										<li>Auflage: 123</li>
										<li>Papierformat: DIN A4 Hoch</li>
										<li>Cover-Farbe: Dunkelblau</li> 
									</ul>
								</div>
								<div class="servicePrice">
									<ul>
										<li><p>Preis pro Auflage</p><big>0.00 €</big></li>
										<li><p>Preis pro CD</p><big>0.00 €</big></li>
										<li><p>Preis des Datenchecks</p><big>0.00 €</big></li>
										<li><p>Gesamtpreis</p><big>0.00 €</big></li>
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

			<script type="text/javascript">

var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form ...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  // ... and fix the Previous/Next buttons:
  if (n == 0) {
  	document.getElementById("prevBtn").style.display = "none";
  } else {
  	document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
  	document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
  	document.getElementById("nextBtn").innerHTML = "Next";
  }
  // ... and run a function that displays the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form... :
  if (currentTab >= x.length) {
    //...the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
}
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false:
      valid = false;
  }
}
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
  	document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
  	x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class to the current step:
  x[n].className += " active";
}

</script>
