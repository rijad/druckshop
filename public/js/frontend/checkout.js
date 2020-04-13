
function displayFields(binding){  

	$product_attributes = getProductAttributes(binding);

		// Get data for page format
		if (typeof $product_attributes['page_format'] !== 'undefined' && $product_attributes['page_format'].length > 0) {
			var len = $product_attributes['page_format'].length;
			$("#page-format").empty();
			$("#page-format").append("<option value='-1'>Select</option>");
			for( var i = 0; i<len; i++){
				$("#page-format").append("<option value = "+$product_attributes['page_format'][i]['id']+">"+$product_attributes['page_format'][i]['page_format']+"</option>");
			}
		}else{} 
 
	//Get data for cover color
	if (typeof $product_attributes['cover_color'] !== 'undefined' && $product_attributes['cover_color'].length > 0) {
		document.getElementById('div-cover-color').className = "displayBlock";
		var len = $product_attributes['cover_color'].length;
		$("#cover-color").empty();
		$("#cover-color").append("<option value='-1'>Select</option>");
		for( var i = 0; i<len; i++){
			$("#cover-color").append("<option value = "+$product_attributes['cover_color'][i]['id']+">"+$product_attributes['cover_color'][i]['color']+"</option>");
		}
	}else{ 
		document.getElementById('div-cover-color').className = "displayNone";
	}


	//Get data for cover sheet
	if (typeof $product_attributes['cover_sheet'] !== 'undefined' && $product_attributes['cover_sheet'].length > 0) {
		document.getElementById('div-cover-sheet').className = "displayBlock";
		var len = $product_attributes['cover_sheet'].length;
		$("#cover-sheet").empty();
		$("#cover-sheet").append("<option value='-1'>Select</option>");
		for( var i = 0; i<len; i++){
			$("#cover-sheet").append("<option value = "+$product_attributes['cover_sheet'][i]['id']+">"+$product_attributes['cover_sheet'][i]['sheet']+"</option>");
		}
	}else{
		document.getElementById('drop_file_zone_cover_sheet').className = "displayNone";
		document.getElementById('div-cover-sheet').className = "displayNone";
	}


	//Get data for back cover
	if (typeof $product_attributes['back_cover'] !== 'undefined' && $product_attributes['back_cover'].length > 0) {
		document.getElementById('div-back-cover').className = "displayBlock";
		var len = $product_attributes['back_cover'].length;
		$("#back-cover").empty();
		$("#back-cover").append("<option value='-1'>Select</option>");
		for( var i = 0; i<len; i++){
			$("#back-cover").append("<option value = "+$product_attributes['back_cover'][i]['id']+">"+$product_attributes['back_cover'][i]['back_cover']+"</option>");
		}
	}else{
		document.getElementById('div-back-cover').className = "displayNone";
		document.getElementById('drop_file_zone_back_cover').className = "displayNone";
	}

}


//Get Product attributes
function getProductAttributes(binding){

	var product_attributes = "";

	$.ajax({
		url: '/druckshop/get-relations', 
		type: 'GET', 
		data: {'id': binding},
		async: false,
		success: function (response){
			var data = JSON.parse(response); 
			product_attributes  = data['data'];
			callback.call(product_attributes);
		}
	});  return product_attributes;

}

//Get Product attributes
function getContentAttributes(page_options){

	var content_attributes = "";

	$.ajax({
		url: '/druckshop/get-relations-content', 
		type: 'GET', 
		data: {'id': page_options},
		async: false,
		success: function (response){
			var data = JSON.parse(response); 
			content_attributes  = data['data'];
			callback.call(content_attributes);
		}
	});  return content_attributes;

}


function displayFieldsContent(page_options = ""){  

	$content_attributes = getContentAttributes(page_options);

	// Get data for paper weight
		if (typeof $content_attributes['paper_weight'] !== 'undefined' && $content_attributes['paper_weight'].length > 0) {
			var len = $content_attributes['paper_weight'].length;
			$("#paper-weight").empty();
			$("#paper-weight").append("<option value='-1'>Select</option>");
			for( var i = 0; i<len; i++){  
				$("#paper-weight").append("<option value = "+$content_attributes['paper_weight'][i]['id']+">"+$content_attributes['paper_weight'][i]['paper_weight']+" g/m²</option>");
			}

			if($("#page_options option:selected").val() == "1"){ //single
				$("#paper-weight").val(1);  
				$("#paper-weight").trigger("onchange");
			}else if($("#page_options option:selected").val() == "2"){ //both
				$("#paper-weight").val(2);
				$("#paper-weight").trigger("onchange");  
			}

		}else{}

		// Get data for mirror
		if (typeof $content_attributes['mirror'] !== 'undefined' && $content_attributes['mirror'].length > 0) {
			var len = $content_attributes['mirror'].length;
			document.getElementById('div-mirror').className = "displayBlock";
			$("#mirror").empty();
			$("#mirror").append("<option value='-1'>Select</option>");
			for( var i = 0; i<len; i++){  
				$("#mirror").append("<option value = "+$content_attributes['mirror'][i]['id'] +">"+$content_attributes['mirror'][i]['mirror']+"</option>");
			if($content_attributes['mirror'][i]['mirror'] == 'Long edge'){
				$("#mirror").val($content_attributes['mirror'][i]['id']);
		} 
			}

		}else{
			document.getElementById('div-mirror').className = "displayNone";
		}

} 
 

function displayPrintFields(embossment = ""){

	if(embossment == "Embossment_Cover_Sheet"){
		if($("#embossment-cover-sheet").is(":checked")){
			document.getElementById('div-template').className = "displayBlock";
		}else{
			document.getElementById('div-template').className = "displayNone";
			//document.getElementById('div-embossment-cover-sheet').className = "displayNone";
			document.getElementById('upload_custom_logo').className = "displayNone";
			document.getElementById('drop_file_zone_logo_info').className = "displayNone";
			document.getElementById('div-remarks').className = "displayNone"; 
			$("#div-display-image").empty();
			document.getElementById('div-display-image').className = "displayNone";
			document.getElementById('div-fonts').className = "displayNone";
			document.getElementById('div-date-format').className = "displayNone";
		}
	}

} 

function displayPopUp(template = ""){
	 var title = template; 
  $('.modal-title').html(title);
 
  $("#modal-body").empty(); 
	if(template == "Standardvorlage mit Logo"){
		 $('#modal-logo').modal('show');
		$("#modal-body").append("<p>Choose layout for standard cover with logo.</p><br><img id='mit_1' src='"+base_url+"/public/images/mit_1.png' onclick = displayImage('"+base_url+"/public/images/mit_1.png','mit_1.png');> <img id='mit_1' src='"+base_url+"/public/images/mit_1.png' onclick = displayImage('"+base_url+"/public/images/mit_2.png','mit_1.png');> <img id='mit_3' src='"+base_url+"/public/images/mit_3.png' onclick = displayImage('"+base_url+"/public/images/mit_3.png','mit_1.png');> ");
		document.getElementById('div-fonts').className = "displayBlock";
		document.getElementById('div-date-format').className = "displayBlock";
		document.getElementById('div-embossment-spine').className = "displayBlock";
		document.getElementById('div-remarks').className = "displayBlock";
		document.getElementById('upload_custom_logo').className = "displayBlock";
	}else if(template == "Standardvorlage ohne Logo"){
		 $('#modal-logo').modal('show');
		$("#modal-body").append("<p>Choose layout for standard cover without logo.</p><br><img id='ohne_1' src='"+base_url+"/public/images/ohne_1.png' onclick = displayImage('"+base_url+"/public/images/ohne_1.png','ohne_1');> <img id='ohne_2' src='"+base_url+"/public/images/ohne_2.png' onclick = displayImage('"+base_url+"/public/images/ohne_2.png','ohne_2');> <img id='ohne_3' src='"+base_url+"/public/images/ohne_3.png' onclick = displayImage('"+base_url+"/public/images/ohne_3.png','ohne_3');> ");
		document.getElementById('div-fonts').className = "displayBlock";
		document.getElementById('div-date-format').className = "displayBlock";
		document.getElementById('div-embossment-spine').className = "displayBlock";
		document.getElementById('div-remarks').className = "displayBlock";

		document.getElementById('upload_custom_logo').className = "displayNone";
	}else if(template == "Eigene Vorlage"){
		document.getElementById('upload_custom_logo').className = "displayBlock";
		document.getElementById('div-remarks').className = "displayBlock";
		$("#div-display-image").empty();
		document.getElementById('div-display-image').className = "displayNone"; 
	}

	if($("#template").find(":selected").val() == "-1"){
		document.getElementById('upload_custom_logo').className = "displayNone";
		document.getElementById('drop_file_zone_logo_info').className = "displayNone";
		document.getElementById('div-remarks').className = "displayNone"; 
		$("#div-display-image").empty();
		document.getElementById('div-display-image').className = "displayNone"; 
		document.getElementById('div-embossment-spine').className = "displayBlock";
	}	

}

function displayPopUpCD(template = ""){
	 var title = template;
  $('.modal-title').html(title);
 
  $("#modal-body").empty(); 
	if(template == "Standardvorlage mit Logo"){
		 $('#modal-cd').modal('show');
		$("#modal-body-cd").append("<p>Choose layout for standard cover with logo.</p><br><img id='mit_1' src='"+base_url+"/public/images/mit_1.png' onclick = displayImageCd('"+base_url+"/public/images/mit_1.png','mit_1');> <img id='mit_1' src='"+base_url+"/public/images/mit_1.png' onclick = displayImageCd('"+base_url+"/public/images/mit_2.png','mit_1');> <img id='mit_3' src='"+base_url+"/public/images/mit_3.png' onclick = displayImageCd('"+base_url+"/public/images/mit_3.png','mit_1');> ");
		document.getElementById('div-fonts-cd').className = "displayBlock";
		document.getElementById('upload_custom_logo_cd').className = "displayBlock";
	}else if(template == "Standardvorlage ohne Logo"){
		 $('#modal-cd').modal('show');
		$("#modal-body-cd").append("<p>Choose layout for standard cover without logo.</p><br><img id='ohne_1' src='"+base_url+"/public/images/ohne_1.png' onclick = displayImageCd('"+base_url+"/public/images/ohne_1.png','ohne_1');> <img id='ohne_2' src='"+base_url+"/public/images/ohne_2.png' onclick = displayImageCd('"+base_url+"/public/images/ohne_2.png',ohne_2);> <img id='ohne_3' src='"+base_url+"/public/images/ohne_3.png' onclick = displayImageCd('"+base_url+"/public/images/ohne_3.png','ohne_3');> ");
		document.getElementById('div-fonts-cd').className = "displayBlock";
		document.getElementById('upload_custom_logo_cd').className = "displayBlock";
	}else if(template == "Eigene Vorlage"){
		document.getElementById('upload_custom_logo_cd').className = "displayBlock";
		$("#div-display-image-cd").empty();
		document.getElementById('div-display-image-cd').className = "displayNone"; 
		document.getElementById('div-fonts-cd').className = "displayNone";
	}

	if($("#cd-template").find(":selected").val() == "-1"){
		document.getElementById('upload_custom_logo_cd').className = "displayNone";
		document.getElementById('drop_file_zone_logo_info_cd').className = "displayNone";
		document.getElementById('div-fonts-cd').className = "displayNone"; 
		$("#div-display-image-cd").empty();
		document.getElementById('div-display-image-cd').className = "displayNone"; 
	}	

}

function displayImage(path,name){

	$("#div-display-image").empty();
	document.getElementById('div-display-image').className = "displayBlock";
	$("#div-display-image").append("<img src='"+path+"'><input type='hidden' name='embossment-template-name' id ='embossment-template-name' value=''> ");
	document.getElementById('embossment-template-name').value = name;
}

function displayImageCd(path,name){

	$("#div-display-image-cd").empty();
	document.getElementById('div-display-image-cd').className = "displayBlock";
	$("#div-display-image-cd").append("<img src='"+path+"'><input type='hidden' id='cd-template-name' name = 'cd-template-name' value = ''> ");
	document.getElementById('cd-template-name').value = name;
}

function displayCDFields(value = ""){ 

	if(value == "cd"){ 
		if($("#cd-check").is(":checked")){
		document.getElementById('div-number-of-cds').className = "displayBlock";
		document.getElementById('upload_cd').className = "displayBlock";
		document.getElementById('div-cd-imprint').className = "displayBlock";
		document.getElementById('div-cd-bag').className = "displayBlock";
		}else{
		document.getElementById('div-number-of-cds').className = "displayNone";
		document.getElementById('upload_cd').className = "displayNone";
		document.getElementById('div-cd-imprint').className = "displayNone";
		document.getElementById('div-cd-bag').className = "displayNone";	
		}

	}else if(value == "imprint"){

		if($("#imprint").is(":checked")){
			document.getElementById('div-cd-template').className = "displayBlock";
		}else{
			document.getElementById('div-cd-template').className = "displayNone";
		}
		//document.getElementById('div-cd-bag').className = "displayBlock";
	}
		
}


function cdBagPosition(){

	if($("#cd-bag option:selected").val() == "2"){ 
		document.getElementById('div-pos-cd-bag').className = "displayBlock";  
	}else{ 
		document.getElementById('div-pos-cd-bag').className = "displayNone";  
	}

}


function displayContentInput(option = ""){

	if(option == "Color_Pages"){
		if($("#color-pages").is(":checked")){ 
			document.getElementById('div-page-numbers').className = "displayBlock";  
		}else{
			document.getElementById('div-page-numbers').className = "displayNone";
		}
	}else if(option == "A3_Pages"){
		if($("#A3-pages").is(":checked")){
		document.getElementById('div-number-of-pages').className = "displayBlock";
		document.getElementById('div-pos-A3-pages').className = "displayBlock";
		document.getElementById('drop_file_din_A3').className = "displayBlock";
		document.getElementById('A3_msg').className = "displayBlock";
		}else{
		document.getElementById('div-number-of-pages').className = "displayNone";
		document.getElementById('div-pos-A3-pages').className = "displayNone";
		document.getElementById('drop_file_din_A3').className = "displayNone";
		document.getElementById('A3_msg').className = "displayNone";	
		}
		
	}else if(option == "A2_Pages"){
		if($("#A2-pages").is(":checked")){
		document.getElementById('div-number-of-A2-pages').className = "displayBlock";
		document.getElementById('drop_file_din_A2').className = "displayBlock";
		//document.getElementById('drop_file_zone_A2').className = "displayBlock";
		document.getElementById('A2_msg').className = "displayBlock";
		}else{
		document.getElementById('div-number-of-A2-pages').className = "displayNone";
		document.getElementById('drop_file_din_A2').className = "displayNone";
		//document.getElementById('drop_file_zone_A2').className = "displayNone";
		document.getElementById('A2_msg').className = "displayNone";
		}
	}
}


function hideBindingElements(value = ""){

	if(value == "back-cover"){
		if($("#back-cover").find(":selected").val() == "-1"){
			document.getElementById('drop_file_zone_back_cover').className = "displayNone";
			document.getElementById('drop_file_zone_back_cover_sheet_info').className = "displayNone";
			document.getElementById('selectfile_backcover').value=""; // empty file field as well
		}
	}

	if(value == "cover-sheet"){
		if($("#cover-sheet").find(":selected").val() == "-1"){
			document.getElementById('drop_file_zone_cover_sheet').className = "displayNone";
			document.getElementById('drop_file_zone_cover_sheet_info').className = "displayNone";
			document.getElementById('selectfile_coversheet').value=""; // empty file field as well
		}
	}

}

function displayProductAttributes(field_flag = "", values = ""){

	value = $(values).find(":selected").text();
	el = document.createElement('li');

	if(field_flag == "1"){
		if($("#prodkt-attrib li[value='Binding']").length > 0)
		{
			//alert($("#prodkt-attrib li[value='Binding']").text());
			$("#prodkt-attrib li[value='Binding']").text("Binding: "+value);
		}else{
			el.innerHTML = "Binding: "+value;
			el.setAttribute("value","Binding");
		}

	}else if(field_flag == "2"){
		if($("#prodkt-attrib li[value='No of Copies']").length > 0)
		{
			$("#prodkt-attrib li[value='No of Copies']").text("No of Copies: "+values.value);
		}else{	
		el.innerHTML = "No of Copies: "+values.value;
		el.setAttribute("value","No of Copies");
		}
	}else if(field_flag == "3"){
		if($("#prodkt-attrib li[value='Page Format']").length > 0)
		{
			$("#prodkt-attrib li[value='Page Format']").text("Page Format: "+value);
		}else{	
		el.innerHTML = "Page Format: "+value;
		el.setAttribute("value","Page Format");
		}
	}else if(field_flag == "4"){
		if($("#prodkt-attrib li[value='Cover Color']").length > 0)
		{
			$("#prodkt-attrib li[value='Cover Color']").text("Cover Color: "+value);
		}else{	
		el.innerHTML = "Cover Color: "+value;
		el.setAttribute("value","Cover Color");
		}
	}else if(field_flag == "5"){
		if($("#prodkt-attrib li[value='Cover Sheet']").length > 0)
		{
			$("#prodkt-attrib li[value='Cover Sheet']").text("Cover Sheet: "+value);
		}else{	
		el.innerHTML = "Cover Sheet: "+value;
		el.setAttribute("value","Cover Sheet");
		}
	}else if(field_flag == "6"){
		if($("#prodkt-attrib li[value='Back Sheet']").length > 0)
		{
			$("#prodkt-attrib li[value='Back Sheet']").text("Back Sheet: "+value);
		}else{	
		el.innerHTML = "Back Sheet: "+value;
		el.setAttribute("value","Back Sheet");
		}
	}

	document.getElementById('prodkt-attrib').appendChild(el);
}


function displayPrice(binding = "", no_ofsheets = "", page_options = "", embossing_cover = "", embossing_spine="", paper_weight = "", A2="", A3="", nos_of_cds = "", data_check = "", cd_cover = "", no_of_colored_sheets = "", delivery_service = ''){


	var binding_type = "",no_of_sheets = "", pageOptions = "", embossingCover = "", embossingSpine="", paperWeight = "", A2_page="", A3_page="", nosOfCds = "", dataCheck = "", cdCover = "", coloredSheets = "", deliveryService = '';

	if(binding != ""){
		binding_type = binding;
	}

	if(no_ofsheets != ""){
		no_of_sheets = no_ofsheets; 
	}

	if(page_options != ""){
		pageOptions = page_options;
	}

	if(embossing_cover != ""){
		embossingCover = embossing_cover;
	}

	if(embossing_spine != ""){
		embossingSpine = embossing_spine;
	}

	if(paper_weight != ""){
		paperWeight = paper_weight;
	}

	if(A2 != ""){
		A2_page = A2;
	}

	if(A3 != ""){
		A3_page = A3;
	}

	if(nos_of_cds != ""){
		nosOfCds = nos_of_cds;
	}

	if(data_check != ""){
		dataCheck = data_check;
	}
	if(no_of_colored_sheets != ""){
		coloredSheets = no_of_colored_sheets;
	}
	if(delivery_service != ""){
		deliveryService = delivery_service;
	}

	if(cd_cover != ""){
		cdCover = cd_cover;

	}
	

	$.ajax({
		url: '/druckshop/get-price', 
		type: 'GET', 
		data: {'binding_type' : binding, 'no_of_sheets' : no_ofsheets, 'pageOptions' : page_options, 'embossingCover' : embossing_cover, 'embossingSpine' : embossing_spine, 'paperWeight' : paper_weight, 'A2_page' : A2, 'A3_page': A3, 'nosOfCds' : nos_of_cds, 'dataCheck' : data_check, 'coloredSheets' : no_of_colored_sheets, 'deliveryService' : delivery_service, 'cdCover':cdCover},
		success: function (response){
			var data = JSON.parse(response); 
			//console.log(response);
			//console.log(data['data']['price_per_copy']);  cd_dvd
			document.getElementById('binding_price').innerHTML = data['data']['binding_price'] + "€" ;
			document.getElementById('printout').innerHTML = data['data']['printout'] + "€" ;
			document.getElementById('data_check_price').innerHTML = data['data']['data_check_price'] + "€" ;
			document.getElementById('cd_dvd').innerHTML = data['data']['cd_dvd'] + "€" ;
			document.getElementById('total').innerHTML = data['data']['total'] + "€" ;
			document.getElementById('total_price').value = data['data']['total'];
			
		}
	}); 

}


// -------     Code to handle checkout page pagination Starts----------- //

	var currentTab = 0; // Current tab is set to be the first tab (0)
	showTab(currentTab); // Display the current tab

	function getValidatedFields(tab = ""){ //alert(tab);

		var valid = true;

		if(tab == "1"){ 

			binding = document.getElementById('binding').value;

			// binding field is not selectec
			if(binding == "-1"){
				$('#error_binding').html('Binding Field is required');
				return false;
			}else{
				
			if($("#no-of-copies").val() == ""){ $("#no-of-copies").addBack().addClass('invalid'); $('#error_no_of_copies').html('No of copies Field is required'); valid = false; return false;
			}else if(isNaN($("#no-of-copies").val())){
				$("#no-of-copies").addBack().addClass('invalid'); $('#error_no_of_copies').html('Field must be Number'); valid = false; return false;
			}else if($("#no-of-copies").val() <= 0){
				$("#no-of-copies").addBack().addClass('invalid'); $('#error_no_of_copies').html('Field must be greater than 0'); valid = false; return false;
			}

			// binding field is selected
				$product_attributes = getProductAttributes(binding);

			// Get data for page format
			if (typeof $product_attributes['page_format'] !== 'undefined' && $product_attributes['page_format'].length > 0) {
				if($("#page-format").find(":selected").val() == "-1"){ $("#page-format").addClass('invalid'); $('#error_page_format').html('Page Format Field is required'); valid = false; return false;}
			}else{valid = true; return true;}

			//Get data for cover color
			if (typeof $product_attributes['cover_color'] !== 'undefined' && $product_attributes['cover_color'].length > 0) {	
				if($("#cover-color").find(":selected").val() == "-1"){$("#cover-color").addBack().addClass('invalid'); $('#error_cover_color').html('Cover Color Field is required'); valid = false; return false;}	
			}else{valid = true; return true;}


			//Get data for cover sheet
			if (typeof $product_attributes['cover_sheet'] !== 'undefined' && $product_attributes['cover_sheet'].length > 0) {	
				if($("#cover-sheet").find(":selected").val() == "-1"){$("#cover-sheet").addBack().addClass('invalid'); $('#error_cover_sheet').html('Cover Color Field is required'); valid = false; return false;}
			}else{valid = true; return true;}


			//Get data for back cover
			if (typeof $product_attributes['back_cover'] !== 'undefined' && $product_attributes['back_cover'].length > 0) {	
				if($("#back-cover").find(":selected").val() == "-1"){$("#back-cover").addBack().addClass('invalid'); $('#error_back_cover').html('Back Cover Field is required'); valid = false; return false;}
			}else{valid = true; return true;}

			// input type file
			 if($("#selectfile_coversheet").val() == ""){ alert($("#selectfile_coversheet").val()); $("#drop_file_zone_cover_sheet").addBack().addClass('invalid'); $('#error_selectfile_coversheet').html('Field is required'); valid = false; return false;}else{valid = true;return true;}
			 if($("#selectfile_backcover").val() == ""){alert($("#selectfile_backcover").val()); $("#drop_file_zone_back_cover").addBack().addClass('invalid'); $('#error_selectfile_backcover').html('Field is required'); valid = false; return false;}else{valid = true; return true;}


			}// end of outer else

		}else if(tab == "2"){

			page_options = document.getElementById('page_options').value; 

				if(page_options == "-1"){
					$("#page_options").addClass('invalid'); $('#error_page_options').html('Page Options Field is required'); valid = false; return false;
				}else{

					$content_attributes = getContentAttributes(page_options);

					if($("#no-of-pages").val() == ""){$("#no-of-pages").addBack().addClass('invalid'); $('#error_no_of_pages').html('Field is required'); valid = false; return false;}
					var range = NumberOfPages('binding','paper-weight','no-of-pages');
					
					if(! range){$("#no-of-pages").addBack().addClass('invalid'); valid = false; return false;} //else { valid=true; return true;}
					// Get data for paper weight
					if (typeof $content_attributes['paper_weight'] !== 'undefined' && $content_attributes['paper_weight'].length > 0) {	
						if($("#paper-weight").find(":selected").val() == "-1"){$("#paper-weight").addClass('invalid'); $('#error_paper_weight').html('Paper Weight Field is required');  valid = false; return false;}
					}//else{valid = true; return true;}

					if(page_options == "1"){// unilaterally  
						

						 if($("#selectfile_content").val() == ""){ alert($("#selectfile_content").val()); $("#drop_file_zone_content").addBack().addClass('invalid'); $('#error_selectfile_content').html('This Field is required'); valid = false; return false;} //else{valid = true;return true;}

						 if($("#color-pages").is(":checked")){ //alert("chk");
						 	// color pages check box is checked
						 	if($("#page-numbers").val() == ""){$("#page-numbers").addBack().addClass('invalid'); $('#error_page_numbers').html('This Field is required'); valid = false; return false;} 	
						 	var range1 = checkPageRange('selectfile_content','content_page_no','page-numbers');
						 	//alert(range1);
						 	if(!range1){$("#page-numbers").addBack().addClass('invalid'); valid = false; return false;} //else{valid = true; return true;}
						 }

						 if($("#A3-pages").is(":checked")){
						 	// color pages check box is checked
						 	if($("#numbers-of-pages").val() == ""){$("#numbers-of-pages").addBack().addClass('invalid'); $('#error_no_of_pages').html('This Field is required'); valid = false; return false;} 
						 	if($("#numbers-of-pages").val() > 10 || $("#numbers-of-pages").val() < 1){$("#numbers-of-pages").addBack().addClass('invalid'); $('#error_number_of_pages').html('Pages out of range'); valid = false; return false;} 
						 	if($("#selectfile_din_A3").val() == ""){ alert($("#selectfile_din_A3").val()); $("#drop_file_din_A3").addBack().addClass('invalid'); $('#error_selectfile_din_A3').html('This Field is required'); valid = false; return false;}else{valid = true;return true;}	

						 }

						 if($("#A2-pages").is(":checked")){
						 	// color pages check box is checked
						 	if($("#numbers-of-A2-pages").val() == ""){$("#numbers-of-A2-pages").addBack().addClass('invalid'); $('#error_number_of_A2_pages').html('This Field is required'); valid = false; return false;} 
						 	if($("#numbers-of-A2-pages").val() > 3 || $("#numbers-of-A2-pages").val() < 1){$("#numbers-of-A2-pages").addBack().addClass('invalid'); $('#error_number_of_A2_pages').html('Pages out of range'); valid = false; return false;} 
						 	if($("#selectfile_din_A2").val() == ""){ alert($("#selectfile_din_A2").val()); $("#drop_file_din_A2").addBack().addClass('invalid'); $('#error_selectfile_din_A2').html('This Field is required'); valid = false; return false;}else{valid = true;return true;}		

						 } 

					}else if(page_options == "2"){// both sides  
						//alert("2");

						if($("#selectfile_content").val() == ""){ alert($("#selectfile_content").val()); $("#drop_file_zone_content").addBack().addClass('invalid'); $('#error_selectfile_content').html('This Field is required'); valid = false; return false;}//else{valid = true;return true;}

						 if($("#mirror").find(":selected").val() == "-1"){$("#mirror").addClass('invalid'); $('#error_mirror').html('Mirror Field is required'); valid = false; return false;}

						 if($("#color-pages").is(":checked")){ //alert("chk");
						 	// color pages check box is checked
						 	if($("#page-numbers").val() == ""){$("#page-numbers").addBack().addClass('invalid'); $('#error_no_of_pages').html('This Field is required');valid = false; return false;} 	
						 	var range1 = checkPageRange('selectfile_content','content_page_no','page-numbers');
						 	if(!range1){$("#page-numbers").addBack().addClass('invalid'); valid = false; return false;}//else{valid = true; return true;}
						 }

						 if($("#A3-pages").is(":checked")){  alert("A3");
						 	// color pages check box is checked
						 	if($("#numbers-of-A3-pages").val() == ""){$("#numbers-of-A3-pages").addBack().addClass('invalid'); $('#error_number_of_A3_pages').html('This Field is required'); valid = false; return false;} 
						 	if($("#numbers-of-pages").val() > 10 || $("#numbers-of-pages").val() < 1){$("#numbers-of-pages").addBack().addClass('invalid'); $('#error_number_of_pages').html('Pages out of range'); valid = false; return false;} 
						 	if($("#selectfile_din_A3").val() == ""){ alert($("#selectfile_din_A3").val()); $("#drop_file_din_A3").addBack().addClass('invalid'); $('#error_selectfile_din_A3').html('This Field is required'); valid = false; return false;}//else{valid = true;return true;}	

						 }
 
						 if($("#A2-pages").is(":checked")){ alert("A2");
						 	// color pages check box is checked
						 	if($("#numbers-of-A2-pages").val() == ""){$("#numbers-of-A2-pages").addBack().addClass('invalid'); $('#error_number_of_A2_pages').html('This Field is required'); valid = false; return false;}
						 	if($("#numbers-of-A2-pages").val() > 3 || $("#numbers-of-A2-pages").val() < 1){$("#numbers-of-A2-pages").addBack().addClass('invalid'); $('#error_number_of_A2_pages').html('Pages out of range'); valid = false; return false;} 
						 	if($("#selectfile_din_A2").val() == ""){ alert($("#selectfile_din_A2").val()); $("#drop_file_din_A2").addBack().addClass('invalid'); $('#error_selectfile_din_A2').html('This Field is required'); valid = false; return false;}//else{valid = true;return true;}		

						 }

						// Get data for mirror
					if (typeof $content_attributes['mirror'] !== 'undefined' && $content_attributes['mirror'].length > 0) {		
						if($("#mirror").find(":selected").val() == "-1"){$("#mirror").addClass('invalid'); $('#error_mirror').html('Mirror Field is required'); valid = false; return false;}
					}else{valid = true; return true;}

					}
						

				}// end of else
		 // end of tab 2 (content)
		 // start of print finishing
		}else if(tab == "3"){

			if($("#embossment-cover-sheet").is(":checked")){$("#embossment-cover-sheet").addBack().addClass('invalid'); 
			    if($("#template").find(":selected").val() == "-1"){
			      $("#template").addClass('invalid'); $('#error_template').html('Template Field is required'); valid = false; return false;
				}else{valid = true; return true;}

			}else{valid = true; return true;}

			//template cases
			if($("#template").find(":selected").val() == "-1"){$("#template").addClass('invalid'); $('#error_template').html('Template Field is required');valid = false; return false; }	
			else if($("#template").find(":selected").val() == "Eigene Vorlage"){
				if($("#selectfile_logo").val() == ""){ alert($("#selectfile_logo").val()); $("#upload_custom_logo").addBack().addClass('invalid'); $('#error_selectfile_logo').html('Field is required'); valid = false; return false;}else{valid = true;return true;}	
			}else{ 	
			    //fonts
				if($("#fonts").find(":selected").val() == "-1"){$("#fonts").addClass('invalid'); $('#error_fonts').html('Fonts Field is required'); valid = false; return false;}	
			
				//Date Format
				if($("#date-format").find(":selected").val() == "-1"){$("#date-format").addClass('invalid'); $('#error_date_format').html('Date Format Field is required'); valid = false; return false;}	
				valid = true; return true; 
				// end of tab Print Finishing
				// start of CD Bag
			}
			}else if(tab == "4"){

				//data check
				if($("#data_check").find(":selected").val() == "-1"){$("#data_check").addClass('invalid'); $('error_data_check').html('Field is required'); valid = false; return false;}	
				
				if($("#cd-check").is(":not(:checked)")){$("#cd-check").addBack().addClass('invalid'); valid = true; return true;}
				else{ 
					//no. of cd
					if($("#numbers-of-cds").val() == ""){$("#numbers-of-cds").addBack().addClass('invalid'); $('#error_number_of_cds').html('Field is required'); valid = false; return false; }
					// upload
					if($("#selectfile_cd").val() == ""){ alert($("#selectfile_cd").val()); $("#upload_cd").addBack().addClass('invalid'); $('#error_number_of_cds').html('error_selectfile_cd'); valid = false; return false;}else{valid = true;return true;}	
										valid = true; return true;
					if($("#cd-bag").find(":selected").val() == "-1")
					{
					    $("#cd-bag").addClass('invalid'); $('#error_cd_bag').html('Field is required'); valid = false; return false;
					}	
					else{valid = true; return true;
					}
				}
			}

		// if (valid) { 
		// 	document.getElementsByClassName("step")[currentTab].className += " finish";
		// }
	  return valid; // return the valid status

	} 

	function nextPrev(n) {  //alert(currentTab);
	  // This function will figure out which tab to display
	  var x = document.getElementsByClassName("tab");

	  var fields = getValidatedFields(currentTab+n);

	  
 
	  if(fields){
	  	 x[currentTab].style.display = "none";
	  	currentTab = currentTab + n; //alert("cr : "+currentTab); 
	  	if (currentTab >= 4) { //alert("i am in");
	    //...the form gets submitted:
	    document.getElementById("regForm").submit();
	    // window.location.href = '/druckshop/cart'; 
	    return false;
		} 
	  }else{
	  	return false;
	  }
	  // Otherwise, display the correct tab:
	  showTab(currentTab);
	}

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

	
	function fixStepIndicator(n) {  //alert(n); 
	  // This function removes the "active" class of all steps...
	  var i, x = document.getElementsByClassName("step");
	  for (i = 0; i < x.length; i++) {
	  	x[i].className = x[i].className.replace(" active", "");
	  }
	  //... and adds the "active" class to the current step:
	 // document.getElementsByClassName("step")[currentTab].className += " finish";
	  x[n-1].className += " finish";
	  x[n].className += " active";
	}




// -------     Code to handle checkout page pagination Ends ----------- //						


function setQuantity(count = ""){

	var qty = []; var price_per_unit = []; var total_price_per_product = []; var total = 0;

	var x = $('#product_price li input[type=text]');

	x.each(function(e) {
         qty.push($(this).val());
       
	});
	var y = $('#product_price li .price_per_product');
	//console.log(y);

    var i = 0;
	y.each(function(e) {
         price_per_unit.push($(this).html());  
         total_price_per_product[i] = parseInt(qty[i]) * parseInt($(this).html());  
         i++;
	});

	var z = $('.total_price_per_item');
	//console.log(z);
	var i = 0;
	z.each(function(e) {
        $(this).html(total_price_per_product[i]);  
         i++;
	});

	for(var i = 0; i<count; i++){ 
	total = parseInt(total) + parseInt(total_price_per_product[i]);
	document.getElementById('checkout_total').innerHTML = total;
	}

	// console.log(qty);  
	// console.log(price_per_unit);

	$.ajax({
		url: '/druckshop/set-quantity', 
		type: 'POST', 
		data: {'qty': qty,'total_price_per_product' : total_price_per_product, 'count' : count},
		success: function (response){
		}
	});
}


function decrementQuantity(id = "",count = ""){ 
 
	document.getElementById('qty_msg').innerHTML = "";
	qty = document.getElementById(id).value;
	qty_final = parseInt(qty) - 1;

	if(qty_final >= 1){
		document.getElementById(id).value = qty_final;
		setQuantity(count);
	}else{
		document.getElementById('qty_msg').innerHTML = "Quantity cannot be less then 1";
	}

	
}

function incrementQuantity(id = "",count = ""){

	document.getElementById('qty_msg').innerHTML = "";
	qty = document.getElementById(id).value;
	qty_final = parseInt(qty) + 1;

	if(qty_final >= 1){
		document.getElementById(id).value = qty_final;
		setQuantity(count);
	}else{
		// document.getElementById('qty_msg').innerHTML = "Quantity cannot be less then 1";
	}

} 

 function checkPageRange(id1 = '', id2 = '' ,value_id = ''){  //alert("1");
 
     var count_of_pages = 0; var range = 0; var val = [];
     document.getElementById('error_range').innerHTML = ""; 
     var value = document.getElementById(value_id).value;

     if(document.getElementById(id1).value == "" || document.getElementById(id1).value == null){
     }else{
     	count_of_pages =parseInt(document.getElementById(id2).innerHTML.split(":")[1]);
     }

     if(value.includes("-")){
     	val = value.split("-");  
     	range = Math.abs(parseInt(val[0]) - parseInt(val[1])); //alert(range);
     }else if(value.includes(",")){
     	val = value.split(",");  
     	range = val.length;   
     }else if(value.match(/^\d+$/)){
     	range = parseInt(value);
     }else{
     	range = -1;
     }


     if(range > count_of_pages){
     		document.getElementById('error_range').innerHTML = "Please check the range for number of pages";
     		return false;
     }else if(range <= 0){
     		document.getElementById('error_range').innerHTML = "Invalid Expression";
     		return false;
     }else{
     	document.getElementById('error_range').innerHTML = "No of Colored Pages:"+range;
     	return true;
     }

 }
 

 // step 2 Number of pages dependency C
 function NumberOfPages(binding = "", weight = "", no_pages=""){
    
    var binding_val = document.getElementById(binding).value;
    var weight_val = document.getElementById(weight).value;
    var value = parseInt(document.getElementById(no_pages).value);
    var status = true;

    $.ajax({ 
		url: '/druckshop/paper-weight-sheets',  
		type: 'POST', 
		async: false,
		data: {'binding': binding_val,'weight' : weight_val}, 
		success: function (response){

			var data = JSON.parse(response)[0];
			var min  =  parseInt(data['min_sheets']);
			var max  = parseInt(data['max_sheets']);
			var no_of_pages = document.getElementById('pg_no').value;

			document.getElementById('error_no_of_pages').innerHTML = "Range is "+ min + " - " + max + " and Uploaded file contains "+ no_of_pages + " Range should not exceed this count.";
			
			//console.log(value+"-----"+min+"-----"+max);

			// if(value > no_of_pages){
			// 	status = false;
			// }

			if(value < min || value > max){
				status = false;
			}

			callback.call(status);
		}
	}); //console.log(status); 
	return(status);
 }

 function resetFields(id,value){  


  $("#regForm").trigger("reset");
  document.getElementById(id).value = value;

  //$('#block1').load("index.html");
  //$("#regForm").load("#regForm>*","");

 	// $('#regForm input[type="text"]').val('');  
 	// $('#regForm textarea').val('');
 	// $('#regForm input[type="checkbox"]').prop("checked", false); 
 	// $('#regForm input[type="checkbox"]').trigger('onchange');
 	// $('#regForm input[type="hidden"]').val('');  

 }


 function sampleImage(){

 	var binding = document.getElementById('binding').value;
 	var page_format = document.getElementById('page-format').value;
 	var cover_color = document.getElementById('cover-color').value;

 	$.ajax({
		url: '/druckshop/binding-sample-image', 
		type: 'POST', 
		data: {'binding': binding,'page_format' : page_format, 'cover_color' : cover_color},
		success: function (response){

			console.log(response);

			$("#sampleImage").css({'background-image': 'url('+base_url+'/'+response+')', "background-size": "cover"});


		}
	});

 } 


 
