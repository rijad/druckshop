// function displayFields(binding){

// 	if(binding == "1"){ 

// 	// display fields
// 	document.getElementById('div-cover-color').className = "displayBlock";
// 	document.getElementById('div-cover-sheet').className = "displayBlock";
// 	document.getElementById('div-back-cover').className = "displayBlock";

// 	// Get data for page format
// 	$page_format = getPageFormat(binding);
// 	if (typeof $page_format !== 'undefined' && $page_format.length > 0) {
// 		var len = $page_format.length;
// 		for( var i = 0; i<len; i++){
// 			$("#page-format").append("<option value = "+$page_format[i]['id']+">"+$page_format[i]['page_format']+"</option>");
// 		}
// 	}else{}

// 	//Get data for cover color
// 	$cover_color = getCoverColor(binding);
// 	if (typeof $cover_color !== 'undefined' && $cover_color.length > 0) {
// 		var len = $cover_color.length;
// 		for( var i = 0; i<len; i++){
// 			$("#cover-color").append("<option value = "+$cover_color[i]['id']+">"+$cover_color[i]['color']+"</option>");
// 		}
// 	}else{}


// 	//Get data for cover sheet
// 	$cover_sheet= getCoverSheet(binding);
// 	if (typeof $cover_sheet !== 'undefined' && $cover_sheet.length > 0) {
// 		var len = $cover_sheet.length;
// 		for( var i = 0; i<len; i++){
// 			$("#cover-sheet").append("<option value = "+$cover_sheet[i]['id']+">"+$cover_sheet[i]['sheet']+"</option>");
// 		}
// 	}else{}


// 	//Get data for back cover
// 	$back_cover = getBackCover(binding);
// 	if (typeof $back_cover !== 'undefined' && $back_cover.length > 0) {
// 		var len = $back_cover.length;
// 		for( var i = 0; i<len; i++){
// 			$("#back-cover").append("<option value = "+$back_cover[i]['id']+">"+$back_cover[i]['back_cover']+"</option>");
// 		}
// 	}else{}

// // }else if(binding != "1"){

// // 	// display fields
// // 	document.getElementById('div-cover-color').className = "displayNone";
// // 	document.getElementById('div-cover-sheet').className = "displayNone";
// // 	document.getElementById('div-back-cover').className = "displayNone";

// // }
// }else if(binding == "2"){

// 	// Get data for page format

// 	$page_format = getPageFormat(binding);
// 	if (typeof $page_format !== 'undefined' && $page_format.length > 0) {
// 		var len = $page_format.length;
// 		for( var i = 0; i<len; i++){
// 			$("#page-format").append("<option value = "+$page_format[i]['id']+">"+$page_format[i]['page_format']+"</option>");
// 		}
// 	}else{}

// }


// } 


// // Get data for page format
// function getPageFormat(binding){

// 	var page_format = "";

// 	$.ajax({ 
// 		url: '/print-shop/page-format', 
// 		type: 'GET',
// 		data: {'id': binding},
// 		async: false,
// 		success: function (response){
// 			var data = JSON.parse(response); 
// 			page_format  = data['data'];
// 			callback.call(page_format);
// 		}
// 	});  return page_format;

// }


// //Get data for cover sheet
// function getCoverSheet(binding){

// 	var cover_sheet = "";

// 	$.ajax({
// 		url: '/print-shop/cover-sheet', 
// 		type: 'GET',
// 		data: {'id': binding},
// 		async: false,
// 		success: function (response){
// 			var data = JSON.parse(response); 
// 			cover_sheet = data['data'];
// 			callback.call(cover_sheet);
// 		}
// 	});  return cover_sheet;

// }


// //Get data for cover color
// function getCoverColor(binding){

// 	var cover_color = "";

// 	$.ajax({
// 		url: '/print-shop/cover-color', 
// 		type: 'GET',
// 		data: {'id': binding},
// 		async: false,
// 		success: function (response){
// 			var data = JSON.parse(response); 
// 			cover_color = data['data'];
// 			callback.call(cover_color);
// 		}
// 	});  return cover_color;

// }



// //Get data for back cover 
// function getBackCover(binding){

// 	var back_cover = "";

// 	$.ajax({
// 		url: '/print-shop/back-cover', 
// 		type: 'GET',
// 		data: {'id': binding},
// 		async: false,
// 		success: function (response){
// 			var data = JSON.parse(response); 
// 			back_cover  = data['data'];
// 			callback.call(back_cover);
// 		}
// 	});  return back_cover;

// }
