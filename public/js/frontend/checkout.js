
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
		document.getElementById('div-cover-sheet').className = "displayNone";
		document.getElementById('drop_file_zone').className = "displayNone";
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
		document.getElementById('drop_file_zone').className = "displayNone";
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


//upload files

function upload_display(node,value){

	if(node == "cover-sheet" && value != "-1"){
		document.getElementById('drop_file_zone_cover_sheet').className = "displayBlock";
	}else if(node == "back-cover" && value != "-1"){
		document.getElementById('drop_file_zone_back_cover').className = "displayBlock";
	}

}