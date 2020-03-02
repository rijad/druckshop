
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
		url: '/print-shop/get-relations', 
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
		url: '/print-shop/get-relations-content', 
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
				$("#paper-weight").append("<option value = "+$content_attributes['paper_weight'][i]['id']+">"+$content_attributes['paper_weight'][i]['paper_weight']+"</option>");
			}
		}else{}

		// Get data for mirror
		if (typeof $content_attributes['mirror'] !== 'undefined' && $content_attributes['mirror'].length > 0) {
			var len = $content_attributes['mirror'].length;
			document.getElementById('div-mirror').className = "displayBlock";
			$("#mirror").empty();
			$("#mirror").append("<option value='-1'>Select</option>");
			for( var i = 0; i<len; i++){  
				$("#mirror").append("<option value = "+$content_attributes['mirror'][i]['id']+">"+$content_attributes['mirror'][i]['mirror']+"</option>");
			}
		}else{
			document.getElementById('div-mirror').className = "displayNone";
		}

}  

function displayPrintFields(embossment = ""){

	if(embossment == "Embossment_Cover_Sheet"){
		document.getElementById('div-template').className = "displayBlock";
	}

} 

function displayPopUp(template = ""){
	 var title = template;
  $('.modal-title').html(title);
 
  $("#modal-body").empty();
	if(template == "Standardvorlage mit Logo"){
		 $('.modal').modal('show');
		$("#modal-body").append("<p>Choose layout for standard cover with logo.</p><br><img id='mit_1' src='public/images/mit_1.png' onclick = displayImage('public/images/mit_1.png');> <img id='mit_1' src='public/images/mit_1.png' onclick = displayImage('public/images/mit_2.png');> <img id='mit_3' src='public/images/mit_3.png' onclick = displayImage('public/images/mit_3.png');> ");
		document.getElementById('div-fonts').className = "displayBlock";
		document.getElementById('div-date-format').className = "displayBlock";
		document.getElementById('div-embossment-cover-sheet').className = "displayBlock";
	}else if(template == "Standardvorlage ohne Logo"){
		 $('.modal').modal('show');
		$("#modal-body").append("<p>Choose layout for standard cover without logo.</p><br><img id='ohne_1' src='public/images/ohne_1.png' onclick = displayImage('public/images/ohne_1.png');> <img id='ohne_2' src='public/images/ohne_2.png' onclick = displayImage('public/images/ohne_2.png');> <img id='ohne_3' src='public/images/ohne_3.png' onclick = displayImage('public/images/ohne_3.png');> ");
		document.getElementById('div-fonts').className = "displayBlock";
		document.getElementById('div-date-format').className = "displayBlock";
		document.getElementById('div-embossment-cover-sheet').className = "displayBlock";
	}else if(template == "Eigene Vorlage"){
		document.getElementById('upload_custom_logo').className = "displayBlock";
		document.getElementById('div-remarks').className = "displayBlock";
	}

}

function displayImage(path){

	$("#div-display-image").empty();
	document.getElementById('div-display-image').className = "displayBlock";
	$("#div-display-image").append("<img src='"+path+"'> ");
}

function displayCDFields(value = ""){

	alert(value);

	if(value == "cd"){

		document.getElementById('div-number-of-cds').className = "displayBlock";
		document.getElementById('uload_cd').className = "displayBlock";

	}else if(value == "imprint"){

		document.getElementById('div-cd-template').className = "displayBlock";
		//document.getElementById('div-cd-bag').className = "displayBlock";

	}
		
}


function displayContentInput(option = ""){

	if(option == "Color_Pages"){
		document.getElementById('div-page-numbers').className = "displayBlock";
	}else if(option == "A3_Pages"){
		document.getElementById('div-number-of-pages').className = "displayBlock";
		document.getElementById('div-pos-A3-pages').className = "displayBlock";
		document.getElementById('drop_file_din_A3').className = "displayBlock";
		document.getElementById('drop_file_zone_A3').className = "displayBlock";
	}else if(option == "A2_Pages"){
		document.getElementById('div-number-of-A2-pages').className = "displayBlock";
		document.getElementById('drop_file_din_A2').className = "displayBlock";
		document.getElementById('drop_file_zone_A2').className = "displayBlock";
	}
}

  