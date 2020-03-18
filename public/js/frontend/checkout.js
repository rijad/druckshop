
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

	if(value == "cd"){ 

		document.getElementById('div-number-of-cds').className = "displayBlock";
		document.getElementById('upload_cd').className = "displayBlock";
		document.getElementById('div-cd-imprint').className = "displayBlock";
		document.getElementById('div-cd-bag').className = "displayBlock";

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


function displayPrice(paper_weight = "", nos_of_cds = "", data_check = ""){

	//alert($(data_check).find(":selected").text());
	
	var stringArray = ""; var data_check_value = 0; var weight = 0; var no_of_pages = 0;
    
    if(paper_weight != ""){
    	value = $(paper_weight).find(":selected").text();
    	stringArray = value.split(/\b(\s)/);
    	weight = stringArray[0];
    	no_of_pages = document.getElementById('numbers-of-pages').value;
    }
	

	if(nos_of_cds != ""){
    	nos_of_cds = document.getElementById('numbers-of-cds').value;
    }

    if(data_check != ""){
    	data_check_value = document.getElementById('data_check').value;
    	 //alert(data_check_value);
    } 

	$.ajax({
		url: '/print-shop/get-price',
		type: 'GET', 
		data: {'paper_weight': weight,'no_of_pages': no_of_pages ,'no_of_cds':nos_of_cds,'data_check':data_check_value},
		success: function (response){
			var data = JSON.parse(response); 
			//console.log(data['data']['price_per_copy']);
			document.getElementById('price_per_copy').innerHTML = data['data']['price_per_copy'] + "€" ;
			document.getElementById('price_per_cd').innerHTML = data['data']['price_per_cd'] + "€" ;
			document.getElementById('price_of_data_check').innerHTML = data['data']['price_data_check'] + "€" ;
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

					// Get data for paper weight
					if (typeof $content_attributes['paper_weight'] !== 'undefined' && $content_attributes['paper_weight'].length > 0) {	
						if($("#paper-weight").find(":selected").val() == "-1"){$("#paper-weight").addClass('invalid'); $('#error_paper_weight').html('Paper Weight Field is required');  valid = false; return false;}
					}else{valid = true; return true;}

					if(page_options == "1"){// unilaterally

						 if($("#selectfile_content").val() == ""){ alert($("#selectfile_content").val()); $("#drop_file_zone_content").addBack().addClass('invalid'); $('#error_selectfile_content').html('This Field is required'); valid = false; return false;}else{valid = true;return true;}

						 if($("#color-pages").is(":checked")){
						 	// color pages check box is checked
						 	if($("#page-numbers").val() == ""){$("#page-numbers").addBack().addClass('invalid'); $('#error_page_numbers').html('This Field is required'); valid = false; return false;} 	
						 }

						 if($("#A3-pages").is(":checked")){
						 	// color pages check box is checked
						 	if($("#numbers-of-pages").val() == ""){$("#numbers-of-pages").addBack().addClass('invalid'); $('#error_no_of_pages').html('This Field is required'); valid = false; return false;} 
						 	if($("#selectfile_din_A3").val() == ""){ alert($("#selectfile_din_A3").val()); $("#drop_file_din_A3").addBack().addClass('invalid'); $('#error_selectfile_din_A3').html('This Field is required'); valid = false; return false;}else{valid = true;return true;}	

						 }

						 if($("#A2-pages").is(":checked")){
						 	// color pages check box is checked
						 	if($("#numbers-of-A2-pages").val() == ""){$("#numbers-of-A2-pages").addBack().addClass('invalid'); $('#error_number_of_A2_pages').html('This Field is required'); valid = false; return false;} 
						 	if($("#selectfile_din_A2").val() == ""){ alert($("#selectfile_din_A2").val()); $("#drop_file_din_A2").addBack().addClass('invalid'); $('#error_selectfile_din_A2').html('This Field is required'); valid = false; return false;}else{valid = true;return true;}		

						 } 

					}else if(page_options == "2"){// both sides

						if($("#selectfile_content").val() == ""){ alert($("#selectfile_content").val()); $("#drop_file_zone_content").addBack().addClass('invalid'); $('#error_selectfile_content').html('This Field is required'); valid = false; return false;}else{valid = true;return true;}

						 if($("#mirror").find(":selected").val() == "-1"){$("#mirror").addClass('invalid'); $('#error_mirror').html('Mirror Field is required'); valid = false; return false;}

						 if($("#color-pages").is(":checked")){
						 	// color pages check box is checked
						 	if($("#page-numbers").val() == ""){$("#page-numbers").addBack().addClass('invalid'); $('#error_no_of_pages').html('This Field is required');valid = false; return false;} 	
						 }

						 if($("#A3-pages").is(":checked")){
						 	// color pages check box is checked
						 	if($("#numbers-of-pages").val() == ""){$("#numbers-of-pages").addBack().addClass('invalid'); $('#error_number_of_A3_pages').html('This Field is required'); valid = false; return false;} 
						 	if($("#selectfile_din_A3").val() == ""){ alert($("#selectfile_din_A3").val()); $("#drop_file_din_A3").addBack().addClass('invalid'); $('#error_selectfile_din_A3').html('This Field is required'); valid = false; return false;}else{valid = true;return true;}	

						 }

						 if($("#A2-pages").is(":checked")){
						 	// color pages check box is checked
						 	if($("#numbers-of-A2-pages").val() == ""){$("#numbers-of-A2-pages").addBack().addClass('invalid'); $('#error_number_of_A2_pages').html('This Field is required'); valid = false; return false;} 
						 	if($("#selectfile_din_A2").val() == ""){ alert($("#selectfile_din_A2").val()); $("#drop_file_din_A2").addBack().addClass('invalid'); $('#error_selectfile_din_A2').html('This Field is required'); valid = false; return false;}else{valid = true;return true;}		

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

		if (valid) { 
			document.getElementsByClassName("step")[currentTab].className += " finish";
		}
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
	    // window.location.href = '/print-shop/cart'; 
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

	
	function fixStepIndicator(n) {
	  // This function removes the "active" class of all steps...
	  var i, x = document.getElementsByClassName("step");
	  for (i = 0; i < x.length; i++) {
	  	x[i].className = x[i].className.replace(" active", "");
	  }
	  //... and adds the "active" class to the current step:
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
		url: '/print-shop/set-quantity', 
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

 function checkPageRange(id1 = '', id2 = '' ,value = ''){
 
     var count_of_pages = 0; var range = 0; var val = [];
     document.getElementById('error_range').innerHTML = "";

     if(document.getElementById(id1).value == "" || document.getElementById(id1).value == null){
     }else{
     	count_of_pages = document.getElementById(id2).innerHTML.split(":")[1];
     }

     if(value.includes("-")){
     	val = value.split("-");  
     	range = Math.abs(parseInt(val[0]) - parseInt(val[1])); alert(range);
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
     }else if(range <= 0){
     		document.getElementById('error_range').innerHTML = "Invalid Expression";
     }else{
     	document.getElementById('error_range').innerHTML = "No of Colored Pages:"+range;
     }


      



 }

