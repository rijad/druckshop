
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
		document.getElementById('drop_file_zone_cover_sheet_heading').className = "outside-box-heading displayNone";
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
		document.getElementById('drop_file_zone_back_cover_heading').className = "outside-box-heading displayNone";
	}

}


//Get Product attributes
function getProductAttributes(binding){

	var product_attributes = "";

	$.ajax({
		url: base_url+'/get-relations', 
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
		url: base_url+'/get-relations-content', 
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
			// var len = $content_attributes['paper_weight'].length;
			// $("#paper-weight").empty();
			// $("#paper-weight").append("<option value='-1'>Select</option>");
			// for( var i = 0; i<len; i++){  
			// 	$("#paper-weight").append("<option value = "+$content_attributes['paper_weight'][i]['id']+">"+$content_attributes['paper_weight'][i]['paper_weight']+" g/m²</option>");
			// }

			var binding = document.getElementById('binding').value;

			getPaperWeight(binding);   alert("in");

			// if($("#page_options option:selected").val() == "1"){ //single
			// 	//$("#paper-weight option:selected").val(1);
			// 	$("#paper-weight").val(1);
			// 	//$('#paper-weight option[value="1"]').prop("selected", true);
			// 	//$('#paper-weight option[value=1]').attr('selected','selected');  
			// 	//$("#paper-weight").trigger("onchange"); 
			// 	 alert("in1");
			// }else if($("#page_options option:selected").val() == "2"){ //both
			// 	$("#paper-weight").val(3);
			// 	//$("#paper-weight").trigger("onchange"); 
			// 	 alert("in2");
			// }

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
 
function getPrinting(){ 

binding = document.getElementById('binding').value;
	$.ajax({
		url: base_url+'/get-print-finishing-status', 
		type: 'GET', 
		data: {'binding_type' : binding},
		success: function (response){
			var data = JSON.parse(response);  console.log(response);
			
			if(data == 1){ // page 4

				$("#embossment-cover-sheet").removeAttr('disabled');   
				$("#embossment-spine").removeAttr('disabled');



			}else if(data == 2){ //page 3  

				$("#embossment-spine").removeAttr('disabled');  
				$("#embossment-cover-sheet").removeAttr('disabled');

			}else if(data == 3){

				$("#embossment-cover-sheet").attr('disabled', true);
				$("#embossment-spine").attr('disabled', true);
				$('#spine-message').html('Standard Refinement and Refinement with Embossing cannot be Activated, it is not available for this Product');
				
			}else{

				$("#embossment-cover-sheet").attr('disabled', true);
				$("#embossment-spine").attr('disabled', true);
				$('#spine-message').html('Standard Refinement and Refinement with Embossing cannot be Activated, it is not available for this Product');
			}
		}
	}); 
}

function embossingChange(field = ""){

	if($(field).find(":selected").val() != "-1"){


		$("#embossment-spine").removeAttr('disabled');
		$("#embossment-cover-sheet").removeAttr('disabled');

		getPrinting();

		//if($("#embossment-spine").is(":checked")){

			if($(field).find(":selected").val() == "Classic"){
					$('#fields_1 option[value="Topic"]').remove();

					if($("#embossment-cover-sheet").is(":checked")){
						document.getElementById('div-template-classic').className = 'displayBlock';
				 		$("#template-classic").append("<p>Choose layout for standard cover with logo.</p><br><img class='template-classic' id='Klassik-1' src='"+base_url+"/public/images/templates/Binding_template/Klassik-1.jpg' onclick = displayImageClassic('"+base_url+"/public/images/templates/Binding_template/Klassik-1.jpg','Klassik-1.jpg',this);> <img class='template-classic' id='Klassik-2' src='"+base_url+"/public/images/templates/Binding_template/Klassik-2.jpg' onclick = displayImageClassic('"+base_url+"/public/images/templates/Binding_template/Klassik-2.jpg','Klassik-2.jpg',this);> <img class='template-classic' id='Klassik-3' src='"+base_url+"/public/images/templates/Binding_template/Klassik-3.jpg' onclick = displayImageClassic('"+base_url+"/public/images/templates/Binding_template/Klassik-3.jpg','Klassik-3.jpg',this);> ");
					}
					document.getElementById('input_1').className = "displayNone";
					document.getElementById('field-1').className = "displayNone";
					document.getElementById('input_2').className = "displayNone";
					document.getElementById('field-2').className = "displayNone";
					document.getElementById('input_3').className = "displayNone";
					document.getElementById('field-3').className = "displayNone"; 

					document.getElementById('div-fonts-spine').className = "displayNone";
					document.getElementById('div-template').className = "displayNone";   
					document.getElementById('upload_custom_logo').className = "displayNone";   
					document.getElementById('upload_custom_file').className = "displayNone"; 
					document.getElementById('upload_custom_logo_heading').className = "displayNone";   
					document.getElementById('upload_custom_file_heading').className = "displayNone";
			}else{

					document.getElementById('div-template-classic').className = 'displayNone';
					$("#div-display-image-cd").empty();
					document.getElementById('input_1').className = "displayBlock";
					document.getElementById('field-1').className = "displayBlock";
					document.getElementById('input_2').className = "displayBlock";
					document.getElementById('field-2').className = "displayBlock";
					document.getElementById('input_3').className = "displayBlock";
					document.getElementById('field-3').className = "displayBlock"; 

                   if( $("#embossment-cover-sheet").is(":checked")){
					document.getElementById('div-template').className = "displayBlock";
				}

					if( ! $("#embossment-cover-sheet").is(":checked")){

						if($("#embossment-spine").is(":checked")){

					document.getElementById('div-fonts-spine').className = "displayBlock";

				}

				}
			}

		//}	
 
	}else{


		$("#embossment-cover-sheet").attr('disabled', true);  
		$("#embossment-spine").attr('disabled', true);  

		document.getElementById('div-fonts').className = "displayNone";

	}


}

function displayPrintFields(embossment = ""){

	var binding = document.getElementById('binding').value;

	$.ajax({
		url: base_url+'/get-print-finishing-status', 
		type: 'GET', 
		data: {'binding_type' : binding},
		success: function (response){
			var data = JSON.parse(response); 
			

			//Standard refinement (3)
			if(data == 1){  

				//document.getElementById('div-embossing').className = "displayBlock";
				document.getElementById('div-embossing').className = "displayNone";

				if($("#embossment-cover-sheet").is(":checked")){
					document.getElementById('div-template').className = "displayBlock";
					document.getElementById('upload_custom_file').className = "displayNone";
					document.getElementById('upload_custom_file_heading').className = "outside-box-heading displayNone";
					document.getElementById('div-remarks').className = "displayBlock"; 

					if($('#embossing').val() == "Edition"){
						document.getElementById('div-template-classic').className = 'displayNone';
						$("#div-display-image-cd").empty();
					}else if($('#embossing').val() == "Classic"){
						document.getElementById('div-template-classic').className = 'displayBlock';
						$("#template-classic").empty();
				 		$("#template-classic").append("<p>Choose layout for standard cover with logo.</p><br><img class='template-classic' id='Klassik-1' src='"+base_url+"/public/images/templates/Binding_template/Klassik-1.jpg' onclick = displayImageClassic('"+base_url+"/public/images/templates/Binding_template/Klassik-1.jpg','Klassik-1.jpg',this);> <img class='template-classic' id='Klassik-2' src='"+base_url+"/public/images/templates/Binding_template/Klassik-2.jpg' onclick = displayImageClassic('"+base_url+"/public/images/templates/Binding_template/Klassik-2.jpg','Klassik-2.jpg',this);> <img class='template-classic' id='Klassik-3' src='"+base_url+"/public/images/templates/Binding_template/Klassik-3.jpg' onclick = displayImageClassic('"+base_url+"/public/images/templates/Binding_template/Klassik-3.jpg','Klassik-3.jpg',this);> ");

					}
					else{
						document.getElementById('div-template-classic').className = 'displayNone';
						$("#div-display-image-cd").empty();
					}
				}else{

					document.getElementById('div-template-classic').className = 'displayNone';
						$("#template-classic").empty();
					document.getElementById('div-template').className = "displayNone";
					//document.getElementById('div-embossment-cover-sheet').className = "displayNone";
					document.getElementById('upload_custom_logo').className = "displayNone";
					document.getElementById('upload_custom_logo_heading').className = "outside-box-heading displayNone";
					document.getElementById('drop_file_zone_logo_info').className = "displayNone";
					document.getElementById('div-remarks').className = "displayNone"; 

					document.getElementById('upload_custom_file').className = "displayNone";  
					document.getElementById('upload_custom_file_heading').className = "displayNone";
					$("#div-display-image").empty();
					document.getElementById('div-display-image').className = "displayNone";
					document.getElementById('div-fonts').className = "displayNone";
					document.getElementById('div-date-format').className = "displayNone";
					document.getElementById('upload_custom_file').className = "displayNone";
					document.getElementById('upload_custom_file_heading').className = "outside-box-heading displayNone";

				}

 
				
				if($("#embossment-spine").is(":checked")){
					document.getElementById('div-direction').className = "displayBlock";
					document.getElementById('div-remarks').className = "displayBlock"; 
					document.getElementById('div-section-1').className = "displayBlock";
					
					document.getElementById('div-fonts').className = "displayNone";
					
					document.getElementById('input_1').className = "displayNone";
					document.getElementById('field-1').className = "displayNone";
					document.getElementById('input_2').className = "displayNone";
					document.getElementById('field-2').className = "displayNone";
					document.getElementById('input_3').className = "displayNone";

					document.getElementById('field-3').className = "displayNone";
					document.getElementById('div-template-classic').className = 'displayNone';
					$("#template-classic").empty();

					$("#div-display-image-cd").empty();
					
				}else{ 
					document.getElementById('div-direction').className = "displayNone";
					document.getElementById('div-section-1').className = "displayNone";
					document.getElementById('div-section-2').className = "displayNone";
					document.getElementById('div-section-3').className = "displayNone";
					}
			}


			//Refinement with embossing (4)
			if(data == 2){ 

				//document.getElementById('div-embossing').className = "displayNone";
				document.getElementById('div-embossing').className = "displayBlock";

				if($("#embossment-cover-sheet").is(":checked")){


				document.getElementById('div-remarks').className = "displayBlock"; 
				
					if($('#embossing').val() == "Edition"){  
						document.getElementById('div-template').className = "displayBlock";

						document.getElementById('div-template-classic').className = 'displayNone';
						$("#div-display-image-cd").empty();
					}else{ 
						document.getElementById('div-template').className = "displayNone";
						document.getElementById('upload_custom_logo').className = "displayNone";   
						document.getElementById('upload_custom_file').className = "displayNone";
						document.getElementById('upload_custom_logo_heading').className = "displayNone";   
						document.getElementById('upload_custom_file_heading').className = "displayNone";
						if($('#embossing').val() == "Classic"){  
							document.getElementById('div-template-classic').className = 'displayBlock';
							$("#template-classic").empty();
				 			$("#template-classic").append("<p>Choose layout for standard cover with logo.</p><br><img class='template-classic' id='Klassik-1' src='"+base_url+"/public/images/templates/Binding_template/Klassik-1.jpg' onclick = displayImageClassic('"+base_url+"/public/images/templates/Binding_template/Klassik-1.jpg','Klassik-1.jpg',this);> <img class='template-classic' id='Klassik-2' src='"+base_url+"/public/images/templates/Binding_template/Klassik-2.jpg' onclick = displayImageClassic('"+base_url+"/public/images/templates/Binding_template/Klassik-2.jpg','Klassik-2.jpg',this);> <img class='template-classic' id='Klassik-3' src='"+base_url+"/public/images/templates/Binding_template/Klassik-3.jpg' onclick = displayImageClassic('"+base_url+"/public/images/templates/Binding_template/Klassik-3.jpg','Klassik-3.jpg',this);> ");
				 		}else{
				 			document.getElementById('div-template-classic').className = 'displayNone';
							$("#template-classic").empty();
				 		}
					}
					
					document.getElementById('upload_custom_file').className = "displayNone";
					document.getElementById('upload_custom_file_heading').className = "outside-box-heading displayNone";
					document.getElementById('div-remarks').className = "displayBlock"; 
					if($('#embossing').val() == "Classic"){
						document.getElementById('div-fonts').className = "displayNone";
					}

					//document.getElementById('div-fonts').className = "displayNone";
				}else{ 

					document.getElementById('div-template-classic').className = 'displayNone';
						$("#template-classic").empty();
					document.getElementById('div-template').className = "displayNone";
					//document.getElementById('div-embossment-cover-sheet').className = "displayNone";
					document.getElementById('upload_custom_logo').className = "displayNone";
					document.getElementById('upload_custom_logo_heading').className = "outside-box-heading displayNone";
					//document.getElementById('drop_file_zone_logo_info_cd').className = "displayNone";
					document.getElementById('upload_custom_logo_info_cd').className = "displayNone";
					document.getElementById('div-remarks').className = "displayNone"; 
					document.getElementById('upload_custom_file').className = "displayNone";
					document.getElementById('upload_custom_file_heading').className = "outside-box-heading displayNone";
					document.getElementById('div-fonts').className = "displayNone";
					$("#div-display-image").empty();
					document.getElementById('div-display-image').className = "displayNone";
					if($('#embossing').val() == "Edition"){
						if($("#embossment-spine").is(":checked")){
						document.getElementById('div-fonts-spine').className = "displayBlock";
					 }
					}
					document.getElementById('div-date-format').className = "displayNone";
					document.getElementById('div-display-image').className = "displayNone";
					
				 	$("#div-display-image-cd").empty();
					
				}

  
				 
				if($("#embossment-spine").is(":checked")){
					document.getElementById('div-remarks').className = "displayBlock"; 
					document.getElementById('div-template-classic').className = 'displayNone';
					$("#template-classic").empty();
					$("#div-display-image-cd").empty();

					document.getElementById('div-direction').className = "displayBlock";
					document.getElementById('div-section-1').className = "displayBlock";
					if(! $("#embossment-cover-sheet").is(":checked")){
						if($('#embossing').val() == "Edition"){
							document.getElementById('div-fonts-spine').className = "displayBlock";
					  }
					}else{
						document.getElementById('div-fonts').className = "displayNone";
					}///document.getElementById('div-fonts').className = "displayNone";

					if($('#embossing').find(":selected").val() == "Classic"){

						document.getElementById('input_1').className = "displayNone";
						document.getElementById('field-1').className = "displayNone";
						document.getElementById('input_2').className = "displayNone";
						document.getElementById('field-2').className = "displayNone";
						document.getElementById('input_3').className = "displayNone";
						document.getElementById('field-3').className = "displayNone";

						document.getElementById('div-fonts').className = "displayNone";

					}else{
						
						document.getElementById('input_1').className = "displayBlock";
						document.getElementById('field-1').className = "displayBlock";
						document.getElementById('input_2').className = "displayBlock";
						document.getElementById('field-2').className = "displayBlock";
						document.getElementById('input_3').className = "displayBlock";
						document.getElementById('field-3').className = "displayBlock";
					}
					
				}else{
					document.getElementById('div-direction').className = "displayNone";
					document.getElementById('div-section-1').className = "displayNone";
					document.getElementById('div-section-2').className = "displayNone";
					document.getElementById('div-section-3').className = "displayNone";
					}
			}else{

			}
		}
	}); 

}

// Populate section 2
function section2(){

		if($("#fields_1").find(":selected").val() != "-1"){

			//document.getElementById('input_1').value = "Enter "+$("#fields_1").find(":selected").val();
			$("#input_1").attr("placeholder", "Enter "+$("#fields_1").find(":selected").val());

		}

		if($("#pos_1").find(":selected").val() != "-1" && $("#fields_1").find(":selected").val() != "-1"){

			//document.getElementById('div-section-2').className = "displayBlock";

			 var sec_2 =$("#fields_1").find('option').not(':selected').map(function() {
    						return $(this).text();
						}).toArray();
			 var pos_2 = $("#pos_1").find('option').not(':selected').map(function() {
    						return $(this).text();
						}).toArray();

			 $("#fields_2").empty();
			 $("#fields_2").append("<option value='-1'>Select</option>");

			 $("#pos_2").empty();
			 $("#pos_2").append("<option value='-1'>Select</option>");

			 for(var i=1; i< sec_2.length; i++){ 

			 	$("#fields_2").append("<option value='"+sec_2[i]+"'>"+sec_2[i]+"</option>");

			 }



			 for(var i=1; i< pos_2.length; i++){

			 	$("#pos_2").append("<option value='"+pos_2[i]+"'>"+pos_2[i]+"</option>");

			 }



		}else{

		}
}	


// Populate section 3
function section3(){

		if($("#fields_2").find(":selected").val() != "-1"){

			//document.getElementById('input_2').value = "Enter "+$("#fields_2").find(":selected").val();
			$("#input_2").attr("placeholder", "Enter "+$("#fields_2").find(":selected").val());

		}

		if($("#pos_2").find(":selected").val() != "-1" && $("#fields_2").find(":selected").val() != "-1"){

			//document.getElementById('div-section-3').className = "displayBlock";

			 var sec_3 =$("#fields_2").find('option').not(':selected').map(function() {
    						return $(this).text();
						}).toArray();
			 var pos_3 = $("#pos_2").find('option').not(':selected').map(function() {
    						return $(this).text();
						}).toArray();

			 $("#fields_3").empty();
			 $("#fields_3").append("<option value='-1'>Select</option>");

			 $("#pos_3").empty();
			 $("#pos_3").append("<option value='-1'>Select</option>");

			 for(var i=1; i< sec_3.length; i++){

			 	$("#fields_3").append("<option value='"+sec_3[i]+"'>"+sec_3[i]+"</option>");

			 }



			 for(var i=1; i< pos_3.length; i++){

			 	$("#pos_3").append("<option value='"+pos_3[i]+"'>"+pos_3[i]+"</option>");

			 }



		}else{

		}
}	


function section4(){

	if($("#fields_3").find(":selected").val() != "-1"){

			//document.getElementById('input_3').value = "Enter "+$("#fields_3").find(":selected").val();
			$("#input_3").attr("placeholder", "Enter "+$("#fields_3").find(":selected").val());

		}
}


function addSection(id = ""){

	document.getElementById(id).className = "displayBlock";

}



function removeSection(id = "",field="",pos=""){

	document.getElementById(id).className = "displayNone";
	document.getElementById(field).value = -1;
	document.getElementById(pos) = -1;

}




function displayPopUp(template = ""){
	 var title = template; 
  $('.modal-title').html(title);

  var embossing = document.getElementById('embossing').value;


 
  $("#modal-body").empty(); 
	if(template == "Standardvorlage mit Logo"){ 
		 $('#modal-logo').modal('show');
		 //if($('#embossing'.find(":selected").val() != "-1"){
		 	if(embossing == "Edition"){
		 		$("#modal-body").append("<p>Choose layout for standard cover without logo.</p><br><img id='Edition-mit-Logo-1' src='"+base_url+"/public/images/templates/Binding_template/Edition-mit-Logo-1.jpg' onclick = displayImage('"+base_url+"/public/images/templates/Binding_template/Edition-mit-Logo-1.jpg','Edition-mit-Logo-1.jpg',this);> <img id='Edition-mit-Logo-2' src='"+base_url+"/public/images/templates/Binding_template/Edition-mit-Logo-2.jpg' onclick = displayImage('"+base_url+"/public/images/templates/Binding_template/Edition-mit-Logo-2.jpg','Edition-mit-Logo-2.jpg',this);> <img id='Edition-mit-Logo-3' src='"+base_url+"/public/images/templates/Binding_template/Edition-mit-Logo-3.jpg' onclick = displayImage('"+base_url+"/public/images/templates/Binding_template/Edition-mit-Logo-3.jpg','Edition-mit-Logo-3.jpg',this);> ");
			 }else if(embossing == "Classic"){
			 	
			 }else{
			 	$("#modal-body").append("<p>Choose layout for standard cover without logo.</p><br><img id='Edition-mit-Logo-1' src='"+base_url+"/public/images/templates/Binding_template/Edition-mit-Logo-1.jpg' onclick = displayImage('"+base_url+"/public/images/templates/Binding_template/Edition-mit-Logo-1.jpg','Edition-mit-Logo-1.jpg',this);> <img id='Edition-mit-Logo-2' src='"+base_url+"/public/images/templates/Binding_template/Edition-mit-Logo-2.jpg' onclick = displayImage('"+base_url+"/public/images/templates/Binding_template/Edition-mit-Logo-2.jpg','Edition-mit-Logo-2.jpg',this);> <img id='Edition-mit-Logo-3' src='"+base_url+"/public/images/templates/Binding_template/Edition-mit-Logo-3.jpg' onclick = displayImage('"+base_url+"/public/images/templates/Binding_template/Edition-mit-Logo-3.jpg','Edition-mit-Logo-3.jpg',this);> ");
			 }
		// }
		 
		document.getElementById('download_stylesheet').className = "displayNone";
		document.getElementById('div-fonts').className = "displayBlock";
		document.getElementById('div-date-format').className = "displayBlock";
		document.getElementById('div-embossment-spine').className = "displayBlock";
		document.getElementById('div-remarks').className = "displayBlock";

		document.getElementById('upload_custom_logo').className = "displayBlock";
		document.getElementById('upload_custom_logo_heading').className = "outside-box-heading displayBlock";

		document.getElementById('upload_custom_file').className = "displayNone";
		document.getElementById('upload_custom_file_heading').className = "outside-box-heading displayNone";

		document.getElementById('div-date-format').className = "displayBlock";
	}else if(template == "Standardvorlage ohne Logo"){
		 $('#modal-logo').modal('show');
		// if($('#embossing'.find(":selected").val() != "-1"){
		 	if(embossing == "Edition"){
		 		$("#modal-body").append("<p>Choose layout for standard cover without logo.</p><br><img id='Edition-ohne-Logo-1' src='"+base_url+"/public/images/templates/Binding_template/Edition-ohne-Logo-1.jpg' onclick = displayImage('"+base_url+"/public/images/templates/Binding_template/Edition-ohne-Logo-1.jpg','Edition-ohne-Logo-1.jpg',this);> <img id='Edition-ohne-Logo-2' src='"+base_url+"/public/images/templates/Binding_template/Edition-ohne-Logo-2.jpg' onclick = displayImage('"+base_url+"/public/images/templates/Binding_template/Edition-ohne-logo-2.jpg','Edition-ohne-Logo-2.jpg',this);> <img id='Edition-ohne-Logo-3' src='"+base_url+"/public/images/templates/Binding_template/Edition-ohne-Logo-3.jpg' onclick = displayImage('"+base_url+"/public/images/templates/Binding_template/Edition-ohne-Logo-3.jpg','Edition-ohne-Logo-3.jpg',this);> ");
			 }else if(embossing == "Classic"){
			 	
			 }else{
			 	$("#modal-body").append("<p>Choose layout for standard cover without logo.</p><br><img id='Edition-ohne-Logo-1' src='"+base_url+"/public/images/templates/Binding_template/Edition-ohne-Logo-1.jpg' onclick = displayImage('"+base_url+"/public/images/templates/Binding_template/Edition-ohne-Logo-1.jpg','Edition-ohne-Logo-1.jpg',this);> <img id='Edition-ohne-Logo-2' src='"+base_url+"/public/images/templates/Binding_template/Edition-ohne-Logo-2.jpg' onclick = displayImage('"+base_url+"/public/images/templates/Binding_template/Edition-ohne-Logo-2.jpg','Edition-ohne-Logo-2.jpg',this);> <img id='Edition-ohne-Logo-3' src='"+base_url+"/public/images/templates/Binding_template/Edition-ohne-Logo-3.jpg' onclick = displayImage('"+base_url+"/public/images/templates/Binding_template/Edition-ohne-Logo-3.jpg','Edition-ohne-Logo-3.jpg',this);> ");
			 }
		// }
		document.getElementById('download_stylesheet').className = "displayNone";
		document.getElementById('div-fonts').className = "displayBlock";
		document.getElementById('div-date-format').className = "displayBlock";
		document.getElementById('div-embossment-spine').className = "displayBlock";
		document.getElementById('div-remarks').className = "displayBlock";
		document.getElementById('div-date-format').className = "displayBlock"; 

		document.getElementById('upload_custom_logo').className = "displayNone";
		document.getElementById('upload_custom_logo_heading').className = "outside-box-heading displayNone"; 

		document.getElementById('upload_custom_file').className = "displayNone";
		document.getElementById('upload_custom_file_heading').className = "outside-box-heading displayNone";

	}else if(template == "Eigene Vorlage"){
		document.getElementById('div-fonts').className = "displayNone";
		document.getElementById('upload_custom_logo').className = "displayNone";
		document.getElementById('upload_custom_logo_heading').className = "outside-box-heading displayNone";
		document.getElementById('div-remarks').className = "displayBlock";
		document.getElementById('download_stylesheet').className = "displayBlock";
		$("#div-display-image").empty();
		document.getElementById('div-display-image').className = "displayNone"; 
		document.getElementById('div-date-format').className = "displayNone";

		document.getElementById('upload_custom_file').className = "displayBlock";
		document.getElementById('upload_custom_file_heading').className = "outside-box-heading displayBlock";
	}

	if($("#template").find(":selected").val() == "-1"){
		document.getElementById('upload_custom_logo').className = "displayNone";
		document.getElementById('upload_custom_logo_heading').className = "outside-box-heading displayNone";
		document.getElementById('drop_file_zone_logo_info').className = "outside-box-heading displayNone";
		document.getElementById('div-remarks').className = "displayNone"; 
		document.getElementById('download_stylesheet').className = "displayNone";
		$("#div-display-image").empty();
		document.getElementById('div-display-image').className = "displayNone"; 
		document.getElementById('div-embossment-spine').className = "displayBlock";

		document.getElementById('upload_custom_file').className = "displayNone";
		document.getElementById('upload_custom_file_heading').className = "outside-box-heading displayNone";
	}	

}

function displayPopUpCD(template = ""){
	 var title = template;
  $('.modal-title').html(title); 
 
  $("#modal-body").empty();  
	if(template == "Standardvorlage mit Logo"){

		 $('#modal-cd').modal('show'); 
		 $("#modal-body-cd").empty();
		$("#modal-body-cd").append("<p>Choose layout for standard cover with logo.</p><br><img id='CD-mit-Logo-1' src='"+base_url+"/public/images/templates/cd_template/CD-mit-Logo-1.jpg' onclick = javascript:displayImageCd('"+base_url+"/public/images/templates/cd_template/CD-mit-Logo-1.jpg','CD-mit-Logo-1',this);> <img id='CD-mit-Logo-2' src='"+base_url+"/public/images/templates/cd_template/CD-mit-Logo-2.jpg' onclick = displayImageCd('"+base_url+"/public/images/templates/cd_template/CD-mit-Logo-2.jpg','CD-mit-Logo-2',this);>");
		
		document.getElementById('div-fonts-cd').className = "displayBlock";
		
		document.getElementById('upload_custom_logo_cd').className = "displayBlock"; 
		document.getElementById('upload_custom_logo_cd_heading').className = "outside-box-heading displayBlock";
	
	}else if(template == "Standardvorlage ohne Logo"){

		$('#modal-cd').modal('show');
		$("#modal-body-cd").empty();
		$("#modal-body-cd").append("<p>Choose layout for standard cover without logo.</p><br><img id='CD-ohne-Logo-1' src='"+base_url+"/public/images/templates/cd_template/CD-ohne-Logo-1.jpg' onclick = javascript:displayImageCd('"+base_url+"/public/images/templates/cd_template/CD-ohne-Logo-1.jpg','CD-ohne-Logo-1',this);> <img id='CD-ohne-Logo-2' src='"+base_url+"/public/images/templates/cd_template/CD-ohne-Logo-2.jpg' onclick = displayImageCd('"+base_url+"/public/images/templates/cd_template/CD-ohne-Logo-2.jpg','CD-ohne-Logo-2',this);>");
		
		document.getElementById('div-fonts-cd').className = "displayBlock";

		document.getElementById('upload_custom_logo_cd').className = "displayNone";
		document.getElementById('upload_custom_logo_cd_heading').className = "outside-box-heading displayNone";

		document.getElementById('upload_cd_without_logo').className = "displayNone";
		document.getElementById('upload_cd_without_logo_heading').className = "outside-box-heading displayNone";


	}else if(template == "Eigene Vorlage"){

		document.getElementById('upload_cd_without_logo').className = "displayBlock";
		document.getElementById('upload_cd_without_logo_heading').className = "outside-box-heading displayBlock";

		$("#div-display-image-cd").empty();
		document.getElementById('div-display-image-cd').className = "displayNone"; 
		document.getElementById('div-fonts-cd').className = "displayNone"; 

		document.getElementById('upload_custom_logo_cd').className = "displayNone";
		document.getElementById('upload_custom_logo_cd_heading').className = "outside-box-heading displayNone";
		document.getElementById('drop_file_zone_logo_info_cd').className = "displayNone";
	}

	if($("#cd-template").find(":selected").val() == "-1"){

		document.getElementById('upload_custom_logo_cd').className = "displayNone";
		document.getElementById('upload_custom_logo_cd_heading').className = "outside-box-heading displayNone";
		document.getElementById('drop_file_zone_logo_info_cd').className = "displayNone";

		document.getElementById('div-fonts-cd').className = "displayNone"; 
		$("#div-display-image-cd").empty();
		document.getElementById('div-display-image-cd').className = "displayNone"; 

		document.getElementById('upload_cd').className = "displayNone";
		document.getElementById('upload_cd_heading').className = "outside-box-heading displayNone";
		document.getElementById('drop_file_zone_cd').className = "displayNone";

		document.getElementById('upload_cd_without_logo').className = "displayNone";
		document.getElementById('upload_cd_without_logo_heading').className = "outside-box-heading displayNone";
		document.getElementById('drop_upload_cd_without_logo').className = "displayNone";
	}	

}


function displayImage(path,name,elem){

	// $("#div-display-image").empty();
	$("#modal-body").find("img").css("border", "0");
	elem.style.border = "1px solid blue";
	// document.getElementById('div-display-image').className = "displayBlock";
	// $("#div-display-image").append("<img src='"+path+"'><input type='hidden' name='embossment-template-name' id ='embossment-template-name' value=''> ");
	// document.getElementById('embossment-template-name').value = name;
}


function displayImageClassic(path,name,elem){

	$("#div-display-image").empty();
	$("#template-classic").find("img").css("border", "0");
	elem.style.border = "1px solid blue";
	document.getElementById('div-display-image').className = "displayBlock";
	$("#div-display-image").append("<img src='"+path+"'><input type='hidden' name='embossment-template-name' id ='embossment-template-name' value=''> ");
	document.getElementById('embossment-template-name').value = name;
}

function displayImgSelect(){

	elem = $("#modal-body").find("img"); 
	for(var i = 0; i<elem.length ; i++){

		if(elem[i].style.border == "1px solid blue"){

			path = base_url+"/public/images/templates/Binding_template/"+elem[i].id+".jpg";
			$("#div-display-image").empty();
			document.getElementById('div-display-image').className = "displayBlock";
			$("#div-display-image").append("<img src='"+path+"'><input type='hidden' name='embossment-template-name' id ='embossment-template-name' value=''> ");
			document.getElementById('embossment-template-name').value = elem[i].id+".jpg";

		}

	} 
  
}

function displayImgSelectCd(){

	elem = $("#modal-body-cd").find("img");
	for(var i = 0; i<elem.length ; i++){

		if(elem[i].style.border == "1px solid blue"){

			path = base_url+"/public/images/templates/cd_template/"+elem[i].id+".jpg";
			$("#div-display-image-cd").empty();
			document.getElementById('div-display-image-cd').className = "displayBlock";
			$("#div-display-image-cd").append("<img src='"+path+"'><input type='hidden' id='cd-template-name' name = 'cd-template-name' value = ''> ");
			document.getElementById('cd-template-name').value = elem[i].id+".jpg";

		}

	}

}

function displayImageCd(path,name,elem){

	$("#div-display-image-cd").empty();
	$("#modal-body-cd").find("img").css("border", "0");
	elem.style.border = "1px solid blue";
	// document.getElementById('div-display-image-cd').className = "displayBlock";
	// $("#div-display-image-cd").append("<img src='"+path+"'><input type='hidden' id='cd-template-name' name = 'cd-template-name' value = ''> ");
	// document.getElementById('cd-template-name').value = name;
}

function displayCDFields(value = ""){ 

	if(value == "cd"){ 
		if($("#cd-check").is(":checked")){
		document.getElementById('div-number-of-cds').className = "displayBlock";
		document.getElementById('upload_cd').className = "displayBlock";
		document.getElementById('upload_cd_heading').className = "outside-box-heading displayBlock";
		document.getElementById('div-cd-imprint').className = "displayBlock";
		document.getElementById('div-cd-bag').className = "displayBlock";
		}else{
		document.getElementById('div-number-of-cds').className = "displayNone";
		document.getElementById('upload_cd').className = "displayNone";
		document.getElementById('upload_cd_heading').className = "outside-box-heading displayNone";
		document.getElementById('div-cd-imprint').className = "displayNone";
		document.getElementById('div-cd-bag').className = "displayNone";	
		}

	}else if(value == "imprint"){

		if($("#imprint").is(":checked")){
			document.getElementById('div-cd-template').className = "displayBlock";
		}else{
			document.getElementById('div-cd-template').className = "displayNone";   
			document.getElementById('div-display-image-cd').className = "displayNone"; 
			$('#div-display-image-cd').empty();
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
			document.getElementById('page-numbers').value = "";
			document.getElementById('error_no_of_pages').innerHTML = "";
		}
	}else if(option == "A3_Pages"){
		if($("#A3-pages").is(":checked")){
		document.getElementById('div-number-of-pages').className = "displayBlock";
		document.getElementById('div-pos-A3-pages').className = "displayBlock";
		document.getElementById('drop_file_din_A3').className = "displayBlock";
		document.getElementById('drop_file_din_A3_heading').className = "outside-box-heading displayBlock";
		document.getElementById('A3_msg').className = "displayBlock";
		}else{
		document.getElementById('div-number-of-pages').className = "displayNone";
		document.getElementById('div-pos-A3-pages').className = "displayNone";
		document.getElementById('drop_file_din_A3').className = "displayNone";
		document.getElementById('drop_file_din_A3_heading').className = "outside-box-heading displayNone";
		document.getElementById('A3_msg').className = "displayNone";	

		// remove file
		file_name = $('#selectfile_din_A3').val(); 
   		id = "drop_file_din_A3";

     	removeFile(file_name,id,'1');

     	// empty text field
	    document.getElementById('numbers-of-pages').value = "";
	    //$('#pos-of-A3-pages').text('');
	    document.getElementById("pos-of-A3-pages").value = "";

		}
		
	}else if(option == "A2_Pages"){
		if($("#A2-pages").is(":checked")){
		document.getElementById('div-number-of-A2-pages').className = "displayBlock";
		document.getElementById('drop_file_din_A2').className = "displayBlock";
		document.getElementById('drop_file_din_A2_heading').className = "outside-box-heading displayBlock";
		//document.getElementById('drop_file_zone_A2').className = "displayBlock";
		document.getElementById('A2_msg').className = "displayBlock";
		}else{
		document.getElementById('div-number-of-A2-pages').className = "displayNone";
		document.getElementById('drop_file_din_A2').className = "displayNone";
		document.getElementById('drop_file_din_A2_heading').className = "outside-box-heading displayNone";
		//document.getElementById('drop_file_zone_A2').className = "displayNone";
		document.getElementById('A2_msg').className = "displayNone";   

		//Remove uploaded file
		file_name = $('#selectfile_din_A2').val(); 
	    id = "drop_file_din_A2";
	    removeFile(file_name,id,'1');

	    // empty text field
	    document.getElementById('numbers-of-A2-pages').value = ""; 


		}
	}
}


function hideBindingElements(value = ""){

	if(value == "back-cover"){
		if($("#back-cover").find(":selected").val() == "-1"){
			document.getElementById('drop_file_zone_back_cover').className = "displayNone";
			document.getElementById('drop_file_zone_back_cover_heading').className = "outside-box-heading displayNone";
			document.getElementById('drop_file_zone_back_cover_sheet_info').className = "displayNone";
			document.getElementById('selectfile_backcover').value=""; // empty file field as well
		}
	}

	if(value == "cover-sheet"){
		if($("#cover-sheet").find(":selected").val() == "-1"){
			document.getElementById('drop_file_zone_cover_sheet').className = "displayNone";
			document.getElementById('drop_file_zone_cover_sheet_heading').className = "outside-box-heading displayNone";
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
	}
	// else if(field_flag == "4"){
	// 	if($("#prodkt-attrib li[value='Cover Color']").length > 0)
	// 	{
	// 		$("#prodkt-attrib li[value='Cover Color']").text("Cover Color: "+value);
	// 	}else{	
	// 	el.innerHTML = "Cover Color: "+value;
	// 	el.setAttribute("value","Cover Color");
	// 	}
	// }
	// else if(field_flag == "5"){
	// 	if($("#cover-sheet").is(":checked")){

	// 		if($("#prodkt-attrib li[value='Cover Sheet']").length > 0)
	// 		{
	// 			//$("#prodkt-attrib li[value='Cover Sheet']").text("Cover Sheet: "+value);
	// 			$("#prodkt-attrib li[value='Cover Sheet']").text("Cover Sheet: Yes");
	// 		}else{	
	// 			// el.innerHTML = "Cover Sheet: "+value;
	// 			// el.setAttribute("value","Cover Sheet");
	// 			el.innerHTML = "Cover Sheet: Yes";
	// 			el.setAttribute("value","Cover Sheet");
	// 		}

	// 	}else{

	// 		if($("#prodkt-attrib li[value='Cover Sheet']").length > 0)
	// 		{
	// 			//$("#prodkt-attrib li[value='Cover Sheet']").text("Cover Sheet: "+value);
	// 			$("#prodkt-attrib li[value='Cover Sheet']").text("Cover Sheet: N0");
	// 		}else{	
	// 			// el.innerHTML = "Cover Sheet: "+value;
	// 			// el.setAttribute("value","Cover Sheet");
	// 			el.innerHTML = "Cover Sheet: N0";
	// 			el.setAttribute("value","Cover Sheet");
	// 		}

	// 	}
		
	// }
	// else if(field_flag == "6"){
	// 	if($("#prodkt-attrib li[value='Back Sheet']").length > 0)
	// 	{
	// 		$("#prodkt-attrib li[value='Back Sheet']").text("Back Sheet: "+value);
	// 	}else{	
	// 	el.innerHTML = "Back Sheet: "+value;
	// 	el.setAttribute("value","Back Sheet");
	// 	}
	// }

	else if(field_flag == "7"){
		if($("#prodkt-attrib li[value='Side Options']").length > 0)
		{
			$("#prodkt-attrib li[value='Side Options']").text("Side Option: "+value);
		}else{	
		el.innerHTML = "Side Option: "+value;
		el.setAttribute("value","Side Options");
		}
	}else if(field_flag == "8"){
		if($("#prodkt-attrib li[value='No of Pages']").length > 0)
		{
			$("#prodkt-attrib li[value='No of Pages']").text("No of Pages: "+values.value);
		}else{	
		el.innerHTML = "No of Pages: "+values.value;
		el.setAttribute("value","No of Pages");
		}
	}else if(field_flag == "9"){
		if($("#embossment-cover-sheet").is(":checked")){

			if($("#prodkt-attrib li[value='Embossment Cover Sheet']").length > 0)
			{
				$("#prodkt-attrib li[value='Embossment Cover Sheet']").text("Embossment Cover Sheet: Yes");
			}else{	
				el.innerHTML = "Embossment Cover Sheet: Yes";
				el.setAttribute("value","Embossment Cover Sheet");
			}

		}else{

			if($("#prodkt-attrib li[value='Embossment Cover Sheet']").length > 0)
			{
				$("#prodkt-attrib li[value='Embossment Cover Sheet']").text("Embossment Cover Sheet: No");
			}else{	
				el.innerHTML = "Embossment Cover Sheet: No";
				el.setAttribute("value","Embossment Cover Sheet");
			}

		}
	}else if(field_flag == "10"){

		if($("#embossment-spine").is(":checked")){

			if($("#prodkt-attrib li[value='Embossment Spine']").length > 0)
			{
				$("#prodkt-attrib li[value='Embossment Spine']").text("Embossment Spine: Yes");
			}else{	
				el.innerHTML = "Embossment Spine: Yes";
				el.setAttribute("value","Embossment Spine");
			}

		}else{

			if($("#prodkt-attrib li[value='Embossment Spine']").length > 0)
			{
				$("#prodkt-attrib li[value='Embossment Spine']").text("Embossment Spine: No");
			}else{	
				el.innerHTML = "Embossment Spine: No";
				el.setAttribute("value","Embossment Spine");
			}


		}
		
	}else if(field_flag == "11"){
		if($("#prodkt-attrib li[value='Number of CDs']").length > 0)
		{
			$("#prodkt-attrib li[value='Number of CDs']").text("Number of CDs: "+values.value);
		}else{	
		el.innerHTML = "Number of CDs: "+values.value;
		el.setAttribute("value","Number of CDs");
		}
	}


	document.getElementById('prodkt-attrib').appendChild(el);
}


function displayPrice(binding = "", no_ofsheets = "", page_options = "", embossing_cover = "", embossing_spine="", paper_weight = "", A2="", A3="", nos_of_cds = "", data_check = "", cd_cover = "", no_of_colored_sheets = "", delivery_service = '', no_ofcopies = '', embossing = '', imprint = ''){


	var binding_type = "",no_of_sheets = "", pageOptions = "", embossingCover = "", embossingSpine="", paperWeight = "", A2_page="", A3_page="", nosOfCds = "", dataCheck = "", cdCover = "", coloredSheets = "", deliveryService = '', no_of_copies = '', embossing_type = '', cd_imprint = '';

	if(no_ofcopies != ""){
		no_of_copies = no_ofcopies; 
	} 

	if(embossing != ""){
		embossing_type = embossing; 
	}

	if(imprint != ""){
		cd_imprint = imprint; 
	}

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
		url: base_url+'/get-price', 
		type: 'GET', 
		data: {'cd_imprint': cd_imprint,'embossing_type':embossing_type,'no_of_copies':no_of_copies,'binding_type' : binding, 'no_of_sheets' : no_ofsheets, 'pageOptions' : page_options, 'embossingCover' : embossing_cover, 'embossingSpine' : embossing_spine, 'paperWeight' : paper_weight, 'A2_page' : A2, 'A3_page': A3, 'nosOfCds' : nos_of_cds, 'dataCheck' : data_check, 'coloredSheets' : no_of_colored_sheets, 'deliveryService' : delivery_service, 'cdCover':cdCover},
		success: function (response){
			var data = JSON.parse(response); 
			//console.log(response);
			//console.log(data['data']['price_per_copy']);  cd_dvd
			document.getElementById('binding_price').innerHTML = data['data']['binding_price'] + "€" ;
			document.getElementById('printout').innerHTML = data['data']['printout'] + "€" ;
			document.getElementById('data_check_price').innerHTML = data['data']['data_check_price'] + "€" ;
			document.getElementById('cd_dvd').innerHTML = data['data']['cd_dvd'] + "€" ;
			document.getElementById('embossment').innerHTML = data['data']['embossment_price'] + "€" ;
			document.getElementById('total').innerHTML = data['data']['total'] + "€" ;
			document.getElementById('total_price').value = data['data']['total'];
			// document.getElementById('total_unit_price').value = data['data']['total_unit_price'];
			
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

			if($("#embossment-cover-sheet").is(":checked")){  

				if($('#div-template').hasClass("displayBlock")){ /// verify template field only if its visible
				    if($("#template").find(":selected").val() == "-1"){  
				      $("#template").addClass('invalid'); $('#error_template').html('Template Field is required'); valid = false; return false;
					}else if($("#template").find(":selected").val() == "Eigene Vorlage"){
					if($("#selectfile_file").val() == ""){ alert($("#selectfile_file").val()); $("#upload_custom_file").addBack().addClass('invalid'); $('#error_selectfile_file').html('Field is required'); valid = false; return false;}	
					}else{ 	
				    //fonts
					if($("#fonts").find(":selected").val() == "-1"){
						$("#fonts").addClass('invalid'); 
						$('#error_fonts').html('Fonts Field is required'); 
						valid = false; return false;
					}	
				
					//Date Format
					if($("#date-format").find(":selected").val() == "-1"){$("#date-format").addClass('invalid'); $('#error_date_format').html('Date Format Field is required'); valid = false; return false;}	
					//valid = true; return true; 
					// end of tab Print Finishing
					// start of CD Bag
					}

				}

				// if ($('#remarks').val().trim().length < 1){ //Remarks field  

				// 	 $("#remarks").addClass('invalid'); $('#error_remarks').html('Remarks Field is required'); valid = false; return false;

				// }

				// if($("#fields_1").find(":selected").val() == "-1" || $("#pos_1").find(":selected").val() == "-1" ){
				// 	 $("#fields_1").addClass('invalid'); 
				// 	 $("#pos_1").addClass('invalid'); $('#error-section-1').html('Fill all Fields in this section 1'); valid = false; return false;
				// }

			}else{
						
				if(! $("#embossment-spine").is(":checked")){   
					valid = true; return true;

				}

			}

			if($("#embossment-spine").is(":checked")){   

			if($('#div-fonts').hasClass("displayBlock")){

				if($("#fonts").find(":selected").val() == "-1"){
						$("#fonts").addClass('invalid'); 
						$('#error_fonts').html('Fonts Field is required'); 
						valid = false; return false;
				} 
			}

				if($('#direction').val() == "-1"){

					$("#direction").addClass('invalid'); $('#error_direction').html('Direction Field is required'); valid = false; return false;

				}

				if($("#fields_1").find(":selected").val() == "-1" || $("#pos_1").find(":selected").val() == "-1" || $("#input_1").val().length <= 0){
					 $("#fields_1").addClass('invalid'); 
					 $("#pos_1").addClass('invalid'); $('#error-section-1').html('Fill all Fields in this section 1'); valid = false; return false;
				} 
				
					var allowed_letters = parseInt($('#spine-count-hidden').val());
					var total = 0;
					if($('#input_1').hasClass('displayBlock')){    

						Total = parseInt($('#input_1').val().trim().length);
					}  

					if($('#div-section-2').hasClass('displayBlock') && $('#input_2').hasClass('displayBlock')){   

						Total += parseInt($('#input_2').val().trim().length);
					}   

					if($('#div-section-3').hasClass('displayBlock') && $('#input_3').hasClass('displayBlock')){   

						Total += parseInt($('#input_3').val().trim().length);
					}

					  	if($('#input_1').hasClass('displayBlock')){    
						if(Total >= allowed_letters){    
							$("#input_1").addClass('invalid');
							$("#input_2").addClass('invalid'); 
							$("#input_3").addClass('invalid');
							$('#error_sections').html('Letters in Spine should not exceed '+ allowed_letters);
							 valid = false; return false;
						}
						else{
							valid = true; return true; 
						}
					}

				}else{


						if( ! $("#embossment-cover-sheet").is(":checked")){

							valid = true; return true;

						}
				}


				valid = true; return true; // if both refinement with embossing and spine is unchecked
			


			}else if(tab == "4"){

				//data check
				if($("#data_check").find(":selected").val() == "-1"){$("#data_check").addClass('invalid'); $('error_data_check').html('Field is required'); valid = false; return false;}	
				
				if($("#cd-check").is(":not(:checked)")){$("#cd-check").addBack().addClass('invalid'); valid = true; return true;}
				else{ 
					//no. of cd
					if($("#numbers-of-cds").val() == ""){$("#numbers-of-cds").addBack().addClass('invalid'); $('#error_number_of_cds').html('Field is required'); valid = false; return false; }
					// upload
					if($("#selectfile_cd").val() == ""){ alert($("#selectfile_cd").val()); $("#upload_cd").addBack().addClass('invalid'); $('#error_number_of_cds').html('Field is required'); valid = false; return false;}else{valid = true;return true;}	
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

		// clear validation messages from previous tab 
		if(n==1){
			$('#error_binding').html('');
			$("#no-of-copies").removeClass('invalid');
			$('#error_no_of_copies').html('');
			$("#no-of-copies").removeClass('invalid');
			$('#error_no_of_copies').html('');
			$("#no-of-copies").removeClass('invalid');
			$('#error_no_of_copies').html('');
			$("#page-format").removeClass('invalid');
			$('#error_page_format').html('');
			$("#cover-color").removeClass('invalid');
			$('#error_cover_color').html('');
			$("#cover-sheet").removeClass('invalid');
			$('#error_cover_sheet').html('');
			$("#back-cover").removeClass('invalid');
			$('#error_back_cover').html('');
			$("#drop_file_zone_cover_sheet").removeClass('invalid');
			$('#error_selectfile_coversheet').html('');
			$("#drop_file_zone_back_cover").removeClass('invalid');
			$('#error_selectfile_backcover').html('');
		}else if(n==2){

			$("#page_options").removeClass('invalid');
			$('#error_page_options').html('');
			$("#no-of-pages").removeClass('invalid');
			$('#error_no_of_pages').html('');
			$("#no-of-pages").removeClass('invalid');
			$("#paper-weight").removeClass('invalid');
			$('#error_paper_weight').html('');
			$("#drop_file_zone_content").removeClass('invalid');
			$('#error_selectfile_content').html('');
			$("#page-numbers").removeClass('invalid');
			$('#error_page_numbers').html('');
			$("#page-numbers").removeClass('invalid');
			$("#numbers-of-pages").removeClass('invalid');
			$('#error_no_of_pages').html('');
			$("#numbers-of-pages").removeClass('invalid');
			$('#error_number_of_pages').html('');
			$("#drop_file_din_A3").removeClass('invalid');
			$('#error_selectfile_din_A3').html('');
			$("#numbers-of-A2-pages").removeClass('invalid');
			$('#error_number_of_A2_pages').html('');
			$("#numbers-of-A2-pages").removeClass('invalid');
			$('#error_number_of_A2_pages').html('');
			$("#drop_file_din_A2").removeClass('invalid');
			$('#error_selectfile_din_A2').html('');
			$("#drop_file_zone_content").removeClass('invalid');
			$('#error_selectfile_content').html('');
			$("#mirror").removeClass('invalid');
			$('#error_mirror').html('');
			$("#page-numbers").removeClass('invalid');
			$('#error_no_of_pages').html('');
			$("#page-numbers").removeClass('invalid');
			$("#numbers-of-A3-pages").removeClass('invalid');
			$('#error_number_of_A3_pages').html('');
			$("#numbers-of-pages").removeClass('invalid');
			$('#error_number_of_pages').html('');
			$("#drop_file_din_A3").removeClass('invalid');
			$('#error_selectfile_din_A3').html('');
			$("#numbers-of-A2-pages").removeClass('invalid');
			$('#error_number_of_A2_pages').html('');
			$("#numbers-of-A2-pages").removeClass('invalid');
			$('#error_number_of_A2_pages').html('');
			$("#drop_file_din_A2").removeClass('invalid');
			$('#error_selectfile_din_A2').html('');
			$("#mirror").removeClass('invalid');
			$('#error_mirror').html('');

		}else if(n==3){

			$("#embossment-cover-sheet").removeClass('invalid');
			$("#template").removeClass('invalid');
			$('#error_template').html('');
			$("#template").removeClass('invalid');
			$('#error_template').html('');
			$("#upload_custom_logo").removeClass('invalid');
			$('#error_selectfile_logo').html('');
			$("#fonts").removeClass('invalid');
			$('#error_fonts').html('');
			$("#date-format").removeClass('invalid');
			$('#error_date_format').html('');
			$("#input_1").removeClass('invalid');
			$("#input_2").removeClass('invalid');
			$("#input_3").removeClass('invalid');
			$('#error_sections').html('');


		}else if(n==4){

			$("#data_check").removeClass('invalid');
			$('error_data_check').html('');
			$("#cd-check").removeClass('invalid');
			$("#numbers-of-cds").removeClass('invalid');
			$('#error_number_of_cds').html('');
			$("#upload_cd").removeClass('invalid');
			$('#error_number_of_cds').html('');
			$("#cd-bag").removeClass('invalid');
			$('#error_cd_bag').html('');

		}
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

	 
	function fixStepIndicator(n) {  
	  // This function removes the "active" class of all steps...
	  var i, x = document.getElementsByClassName("step");
	  for (i = 0; i < x.length; i++) {   
	  	x[i].className = x[i].className.replace(" active", "");
	  }
	  //... and adds the "active" class to the current step:
	 // document.getElementsByClassName("step")[currentTab].className += " finish";

	  if(n > 0){
	  	x[n-1].className += " finish";  
	  }

	  // going previous
	  x[n].className = x[n].className.replace(" finish", " active");
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
         //total_price_per_product[i] = parseFloat(qty[i]) * parseFloat($(this).html()); 
          total_price_per_product[i] = parseFloat($(this).html());   
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
	total =  (parseFloat(total) + parseFloat(total_price_per_product[i])).toFixed(2);
	document.getElementById('checkout_total').innerHTML = total;
	}

	// console.log(qty);  
	// console.log(price_per_unit);

	$.ajax({
		url: base_url+'/set-quantity', 
		type: 'POST', 
		data: {'qty': qty,'total_price_per_product' : total_price_per_product, 'count' : count, '_token': $('meta[name="csrf-token"]').attr('content')},
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


function checkPageRange(id1 = '', id2 = '' ,value_id = ''){  

     var count_of_pages = 0; var range_h = 0; var val = []; var range_c = 0; var range_s = 0; var range = 0; var status = 0;
     document.getElementById('error_range').innerHTML = ""; 
     var value = document.getElementById(value_id).value;


     if(document.getElementById(id1).value == "" || document.getElementById(id1).value == null){    // if thesis is not uploaded
     		range = -2; 

     }else{  // if thesis is uploaded

     		if(document.getElementById(value_id).value == 0){   
     		range = -1; 
       		}else{

       			count_of_pages =parseInt(document.getElementById(id2).innerHTML.split(":")[1]);  
     

		     if(value.includes(",")){   // range seperation using ',' and '-'
				val_c = value.split(",");
			    for(var i=0; i< val_c.length; i++){

			    if(val_c[i].trim() != ""){	

			    	if(val_c[i].includes("-")){ // range seperation using '-'

			    		val_h = val_c[i].split("-"); // calculation for '-'
			    		if(parseInt(val_h[0]) > count_of_pages || parseInt(val_h[1]) > count_of_pages){
			     			range = -1;  
			     		}else if(parseInt(val_h[0])<count_of_pages && parseInt(val_h[1])<=count_of_pages){
			     			range_h += Math.abs(parseInt(val_h[0]) - parseInt(val_h[1])) + 1; 
				     	}

			    	}else{   // calculation for ','

			    		if(val_c[i] > count_of_pages){
			     			status = -1;  
			     		}

			     		if(status == -1){   
				     		//range = -1;
				     		status = 0;
				     	}else{
				     		range_c += 1;   
				     	}

			    	} 
			    }// end of empty if
			    } // end of loop
			
			 }else if(value.includes("-") && !value.includes(",") ){  //range seperation only '-'

			 	val_h = value.split("-"); 
			 		if(parseInt(val_h[0]) > count_of_pages || parseInt(val_h[1]) > count_of_pages){
			     			range = -1;  
			     	}else if(parseInt(val_h[0])<count_of_pages && parseInt(val_h[1])<=count_of_pages){
			     		range_h += Math.abs(parseInt(val_h[0]) - parseInt(val_h[1])) + 1; 
			     	}
			 }else if(value.match(/^\d+$/)){  // single value case
			     	if(parseInt(value)<=count_of_pages){
			     	    range_s = 1;  
			     	}else{
			     		range = -1;
			     	}
		     }else{
		     	    range = -1; 
		     }
       		}
   }

 if(range >= 0){  
 	    range = 0;
     	range = range_s + range_c +range_h;  
     }


      if(range > count_of_pages){ 
     		document.getElementById('error_range').innerHTML = "Please check the range for number of pages";
     		document.getElementById('error_range').style.color = "red";
     		return false;
     }else if(range == -1){   
     		document.getElementById('error_range').innerHTML = "Invalid Expression";
     		document.getElementById('error_range').style.color = "red";
     		return false;
     }else if(range == -2){   
     		document.getElementById('error_range').innerHTML = "No File Uploaded";
     		document.getElementById('error_range').style.color = "red";
     		return false;
     }else{  
     	document.getElementById('error_range').innerHTML = "No of Colored Pages:"+range;
     	document.getElementById('error_range').style.color = "#000000";
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
		url: base_url+'/paper-weight-sheets',  
		type: 'POST', 
		async: false,
		data: {'binding': binding_val,'weight' : weight_val, '_token': $('meta[name="csrf-token"]').attr('content')}, 
		success: function (response){

			var data = JSON.parse(response)[0];
			var min  =  parseInt(data['min_sheets']);
			var max  = parseInt(data['max_sheets']);
			var no_of_pages = document.getElementById('pg_no').value;

			// document.getElementById('error_no_of_pages').innerHTML = "Range is "+ min + " - " + max + " and No of Pages is  "+ no_of_pages + " Page(s), ->  Number of pages are out of range.";
			// document.getElementById('error_no_of_pages').style.color = "#000000";
			// document.getElementById('error_no_of_pages').innerHTML = "Range is "+ min + " - " + max ;

			console.log(value+"-----"+min+"-----"+max);

			if(value > no_of_pages){

				document.getElementById('error_no_of_pages').innerHTML = "Range is "+ min + " - " + max + " and No of Pages is  "+ no_of_pages + " Page(s), ->  Number of pages are out of range.";
				document.getElementById('error_no_of_pages').style.color = "red";

				status = false;
			} 

			if(value < min || value > max){

				document.getElementById('error_no_of_pages').style.color = "#000000";
				document.getElementById('error_no_of_pages').innerHTML = "Range is "+ min + " - " + max ;
				status = false;
			}

			callback.call(status);
		}
	}); //console.log(status); 
	return(status);
 }

 function resetFields(id,value){   

if($('#selectfile_coversheet').val() != ""){

    file_name = $('#selectfile_coversheet').val();
    id = "drop_file_zone_cover_sheet";   

     removeFile(file_name,id,'1');

}

if($('#selectfile_backcover').val() != ""){

    file_name = $('#selectfile_backcover').val(); 
    id = "drop_file_zone_back_cover";

     removeFile(file_name,id,'1');

}

if($('#selectfile_content').val() != ""){

    file_name = $('#selectfile_content').val(); 
    id = "drop_file_zone_content";

     removeFile(file_name,id,'1');
}


if($('#selectfile_din_A3').val() != ""){

    file_name = $('#selectfile_din_A3').val(); 
    id = "drop_file_din_A3";

     removeFile(file_name,id,'1');

}

if($('#selectfile_din_A2').val() != ""){

    file_name = $('#selectfile_din_A2').val(); 
    id = "drop_file_din_A2";

     removeFile(file_name,id,'1');

}

if($('#selectfile_logo').val() != ""){

    file_name = $('#selectfile_logo').val(); 
    id = "upload_custom_logo";

     removeFile(file_name,id,'1');

}

if($('#selectfile_cd').val() != ""){

    file_name = $('#selectfile_cd').val(); 
    id = "upload_cd";

     removeFile(file_name,id,'1');

}

if($('#selectfile_logo_cd').val() != ""){

    file_name = $('#selectfile_logo_cd').val(); 
    id = "upload_custom_logo_cd";

     removeFile(file_name,id,'1');

}


if($('#selectfile_file').val() != ""){

    file_name = $('#selectfile_file').val(); 
    id = "upload_custom_file";

     removeFile(file_name,id,'1');

}

  $("#regForm").trigger("reset");
  document.getElementById(id).value = value;
  $('#color-pages').trigger('onchange');
  $('#A3-pages').trigger('onchange');
  $('#A2-pages').trigger('onchange');
  $('#embossment-cover-sheet').trigger('onchange');  
  $('#embossment-spine').trigger('onchange');
  $('#cd-check').trigger('onchange');
  $('#imprint').trigger('onchange');
  $("#div-display-image").empty();
  document.getElementById('div-display-image').className = "displayNone";
  $("#div-display-image-cd").empty();
  document.getElementById('div-display-image-cd').className = "displayNone";
 }


 function sampleImage(){

 	var binding = document.getElementById('binding').value;
 	var page_format = document.getElementById('page-format').value;
 	var cover_color = document.getElementById('cover-color').value;

 	$.ajax({
		url: base_url+'/binding-sample-image', 
		type: 'POST', 
		data: {'binding': binding,'page_format' : page_format, 'cover_color' : cover_color, '_token': $('meta[name="csrf-token"]').attr('content')},
		success: function (response){

			//console.log(response);
			$("#sampleImage").css("display", "block");
			$("#sampleImage").css({'background-image': 'url('+base_url+'/'+response+')', "background-size": "cover"});


		}
	});

 } 


// get min sheet count for spine  
function getPaperWeightCount(){
 
	//if($("#embossment-spine").is(":checked")){

		if($("#paper-weight option:selected").val() != "-1"){

			var paper_weight = document.getElementById('paper-weight').value;
			var binding = document.getElementById('binding').value;

			$.ajax({
			url: base_url+'/get-spine-count', 
			type: 'POST', 
			data: {'binding': binding,'paper_weight': paper_weight, '_token': $('meta[name="csrf-token"]').attr('content')},
			success: function (response){  var data = JSON.parse(response); 

				$("#spine-count").html("Minimum Number of sheets for spine is "+ data);
				$("#spine-count-hidden").val(data);


			}
		});

		}
	//}	
}


function addAddress(address_type = ""){

	var first_name, last_name, company_name, street, city, zip_code, house_no, addition, state, default_flag; 

	if(address_type == "billing"){

		default_flag = 1;

		first_name = document.getElementById('billing_first_name').value;
		if(first_name == ""){
			document.getElementById('error_billing_first_name').innerHTML = "First Name is compulsory Field.";
		}
		last_name = document.getElementById('billing_last_name').value;
		if(last_name == ""){
			document.getElementById('error_billing_last_name').innerHTML = "Last Name is compulsory Field.";
		}
		company_name = document.getElementById('billing_company_name').value;
		
		street = document.getElementById('billing_street').value;
		if(street == ""){
			document.getElementById('error_billing_street').innerHTML = "Street is compulsory Field.";
		}
		city = document.getElementById('billing_city').value;
		if(city == ""){
			document.getElementById('error_billing_city').innerHTML = "Street is compulsory Field.";
		}
		zip_code = document.getElementById('billing_zip_code').value;
		if(zip_code == ""){
			document.getElementById('error_billing_zip_code').innerHTML = "Zip Code is compulsory Field.";
		}
		house_no = document.getElementById('billing_house_no').value;
		if(house_no == ""){
			document.getElementById('error_billing_house_no').innerHTML = "House No is compulsory Field.";
		}
		addition = document.getElementById('billing_addition').value;

		state = document.getElementById('billing_state').value;
		if(state == ""){
			document.getElementById('error_billing_state').innerHTML = "State is compulsory Field.";
		}

	}else{

		default_flag = 0;

		first_name = document.getElementById('shipping_first_name').value;
		if(first_name == ""){
			document.getElementById('error_shipping_first_name').innerHTML = "First Name is compulsory Field.";
		}
		last_name = document.getElementById('shipping_last_name').value;
		if(last_name == ""){
			document.getElementById('error_shipping_last_name').innerHTML = "Last Name is compulsory Field.";
		}
		company_name = document.getElementById('shipping_company_name').value;
		street = document.getElementById('shipping_street').value;
		if(street == ""){
			document.getElementById('error_shipping_street').innerHTML = "Street is compulsory Field.";
		}
		city = document.getElementById('shipping_city').value;
		if(city == ""){
			document.getElementById('error_shipping_city').innerHTML = "Street is compulsory Field.";
		} 
		zip_code = document.getElementById('shipping_zip_code').value;
		if(zip_code == ""){
			document.getElementById('error_shipping_zip_code').innerHTML = "Zip Code is compulsory Field.";
		}
		house_no = document.getElementById('shipping_house_no').value;
		if(house_no == ""){
			document.getElementById('error_shipping_house_no').innerHTML = "House No is compulsory Field.";
		} 
		addition = document.getElementById('shipping_addition').value;
		state = document.getElementById('shipping_state').value;
		if(state == ""){
			document.getElementById('error_shipping_state').innerHTML = "State is compulsory Field.";
		}

	}

  
	$.ajax({
			url: base_url+'/add-address', 
			type: 'POST', 
			data: {'_token': $('meta[name="csrf-token"]').attr('content'),'default':default_flag,'address_type':address_type, 'first_name':first_name, 'last_name':last_name, 'company_name':company_name, 'street':street, 'city':city, 'zip_code':zip_code, 'house_no':house_no, 'addition':addition, 'state':state},
			success: function (response){  

				if(address_type == "shipping"){ alert("2");

					$('#rv-Modal-shipping').modal('hide');$('body').removeClass('modal-open');$('.modal-backdrop').remove();

				}
				if(address_type == "billing"){   

		          $('#rv-Modal-billing').modal('hide');$('body').removeClass('modal-open');$('.modal-backdrop').remove();

		          $('#bill-address-one').text(response);

		          $('#billing_address_data').empty(); 

		          $('#billing_address_data').append('<option value="-1">Select</option><option value="'+response+'" selected>'+response+'</option>');

		          $('#address_data').append('<option value="'+response+'" selected>'+response+'</option>');
		        }

 
			}
		});
} 

function addTooltip(value){

	document.getElementById("page-format-tooltip").title = "number of the PDF file and only number of "+ value.options[value.selectedIndex].text;

}


function getA3A2Count(format = ""){

	var page_format = document.getElementById(format.id).value;

	$.ajax({ 
			url: base_url+'/get-A2-A3-count', 
			type: 'POST', 
			data: {'_token': $('meta[name="csrf-token"]').attr('content'),'page_format':page_format},
			success: function (response){   

				var data = JSON.parse(response); 

				var max_pages_A2 = data['max_pages_A2']; var max_pages_A3 = data['max_pages_A3'];

				document.getElementById('max-A3').innerHTML = max_pages_A3;
				document.getElementById('max-A2').innerHTML = max_pages_A2;


				if( data['can_add_din_A3']){  alert("1:"+data['can_add_din_A3']);

				//$("#A3-pages").removeAttr("disabled");

				$("#A3-pages").addClass('displayBlock');

				}else{
				//$("#A3-pages").attr('disabled', true);    
				$("#A3-pages").addClass('displayNone');
				}
 
				if(data['can_add_din_A2']){

					  // $("#A2-pages").removeAttr("disabled");   
					  $("#A2-pages").addClass('displayBlock');
					  


				}else{
					//$("#A2-pages").attr('disabled', true);   
					$("#A2-pages").addClass('displayNone');  
				}
				
			}
		});
}


function resetPrice(session = ""){

	if(session == "colored_pages"){  //color pages check box

		displayPrice('','','','','','','','','','','',0,'','','',''); // no of colored pages

	}else if(session == "cd"){

		displayPrice('','','','','','','','','0','','','','','','','');  // no of CDs

		displayPrice('','','','','','','','','','','','','','','','0');  // cd imprint

		cdBagPosition(); displayPrice('','','','','','','','','','','0','','','','',''); // cd cover

	}else if(session == "cd_imprint"){

		displayPrice('','','','','','','','','','','','','','','','0');  // cd imprint

	}else if(session == "A2"){

		displayPrice('','','','','','','0','','','','','','','','','');  // A2

	}else if(session == "A3"){

		displayPrice('','','','','','','','0','','','','','','','',''); // A3

	}else if(session == "no-of-pages"){ // No of pages

		var value = $('#no-of-pages').val();

		//displayPrice('',value,'','','','','','','','','','','','','','');
 
	}

}


function getCoverSetting(binding){

	$.ajax({
			url: base_url+'/get-cover-settings', 
			type: 'POST', 
			data: {'binding': binding , '_token': $('meta[name="csrf-token"]').attr('content')},
			success: function (response){  

				if(response == '1'){   

					$('#div-cover-color').addClass('displayBlock');
					

				}else if(response == '2'){

					$('#div-cover-color').addClass('displayBlock');
					$('#div-cover-sheet').addClass('displayBlock');
					$('#div-back-cover').addClass('displayBlock');


				}else if(response == '3'){

					$('#div-cover-color').addClass('displayNone');
					$('#div-cover-sheet').addClass('displayNone');
					$('#div-back-cover').addClass('displayNone');
					
				}

				if(response == '1' || response == '2'){
					$.ajax({
						url: base_url+'/get-cover-color', 
						type: 'POST', 
						data: {'binding': binding , '_token': $('meta[name="csrf-token"]').attr('content')},
						success: function (response_color){  var data = JSON.parse(response_color); 

							$('#cover-color').empty();
							$('#cover-color').append('<option value="-1">Select</option>');

							data.forEach(function(data) {
								$('#cover-color').append("<option value='"+data.id+"'>"+data.color+ "</option>");
							})

							
						}
					});
				}


				if(response == '2'){

					$.ajax({
						url: base_url+'/get-cover-sheet', 
						type: 'POST', 
						data: {'binding': binding , '_token': $('meta[name="csrf-token"]').attr('content')},
						success: function (response_cover){  var data = JSON.parse(response_cover); 

							$('#cover-sheet').empty();
							$('#cover-sheet').append('<option value="-1">Select</option>');

							data.forEach(function(data) {
								$('#cover-sheet').append("<option value='"+data.id+"'>"+data.cover+ "</option>");
							})	

							
						}
					});


					$.ajax({
						url: base_url+'/get-back-cover', 
						type: 'POST', 
						data: {'binding': binding , '_token': $('meta[name="csrf-token"]').attr('content')},
						success: function (response_cover){  var data = JSON.parse(response_cover); 

							$('#back-cover').empty();
							$('#back-cover').append('<option value="-1">Select</option>');

							data.forEach(function(data) {
								$('#back-cover').append("<option value='"+data.id+"'>"+data.cover+ "</option>");
							})	

							
						}
					});

				}

			}
		});
	
}


function getPageFormatData(binding = ""){


	$.ajax({
		url: base_url+'/get-page-format', 
		type: 'POST', 
		data: {'binding': binding , '_token': $('meta[name="csrf-token"]').attr('content')},
		success: function (response_color){  var data = JSON.parse(response_color); 

			$('#page-format').empty();
			$('#page-format').append('<option value="-1">Select</option>');

			data.forEach(function(data) {
				$('#page-format').append("<option value='"+data.id+"'>"+data.cover+ "</option>");
			})	
		}
	});
}

function getPaperWeight(binding = ""){


	$.ajax({
		url: base_url+'/get-paper-weight', 
		type: 'POST', 
		data: {'binding': binding , '_token': $('meta[name="csrf-token"]').attr('content')},
		success: function (response_weight){  var data = JSON.parse(response_weight); 


			$('#paper-weight').empty();
			$('#paper-weight').append('<option value="-1">Select</option>');


			data.forEach(function(data) {
				$('#paper-weight').append("<option value='"+data.pid+"'>"+data.weight+ " g/m²</option>");
			})

			if($("#page_options option:selected").val() == "1"){ //single
				$('#paper-weight option[value="1"]').attr('selected','selected');  
				$("#paper-weight").trigger("onchange"); 

			}else if($("#page_options option:selected").val() == "2"){ //both
				$('#paper-weight option[value="3"]').attr('selected','selected'); 
				$("#paper-weight").trigger("onchange"); 

			}


			
		}
	});
}