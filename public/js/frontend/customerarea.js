// fetch data for customer profile
    window.onload = function WindowLoad(event) {

        $.ajax({ 
          type: 'get', 
          url: '/druckshop/customer-area-data',
          success:function(response) { 
           var data = JSON.parse(response);  
           document.getElementById('userIdBirth').value = data['dob'];
          // document.getElementById('userIdAddress').value = data['address'];
           document.getElementById('userIdEmail').value = data['email'];
           document.getElementById('userIdPhone').value = data['phone'];
           document.getElementById('userIdshipping').value = data['shipping_address'];
           document.getElementById('userIdBilling').value = data['billing_address'];
           $("#img-preview-block").css({'background-image': 'url('+ data['image'] +')', "background-size": "cover"});
        }

      });
} 

function enableFieldFunction() {
    
    document.getElementById("userIdBirth").disabled = false;
    //document.getElementById("userIdAddress").disabled = false;
    document.getElementById("userIdEmail").disabled = false;
    document.getElementById("userIdPhone").disabled = false;
    //document.getElementById("userIdAddress").disabled = false;
    //document.getElementById("userIdshipping").disabled = false;
    //document.getElementById("userIdBilling").disabled = false;
}

function saveProfile(){  
    var dob = document.getElementById('userIdBirth').value;
   // var address = document.getElementById('userIdAddress').value; 
    var email = document.getElementById('userIdEmail').value;  
    var phone = document.getElementById('userIdPhone').value;  
    var shipping_address = document.getElementById('userIdshipping').value;   
    var billing_address = document.getElementById('userIdBilling').value;  
    var image = document.getElementById('upload-img').files[0];   //file object

         var form_data = new FormData();                  
        form_data.append('image', image);
        form_data.append('dob', dob);
      //  form_data.append('address', address);
        form_data.append('email', email);
        form_data.append('phone', phone);
        form_data.append('shipping_address', shipping_address);
        form_data.append('billing_address', billing_address);
        form_data.append( "_token", "{{ csrf_token() }}");

	$.ajax({ 
        type: 'POST',
        url: '/druckshop/customer-area-update',
        contentType: false,
        processData: false,
        data: form_data,
        success:function(response) {  
                document.getElementById("userIdBirth").disabled = true;
               // document.getElementById("userIdAddress").disabled = true;
                document.getElementById("userIdEmail").disabled = true;
                document.getElementById("userIdPhone").disabled = true;
                document.getElementById("userIdAddress").disabled = true;
                document.getElementById("userIdshipping").disabled = true;
                document.getElementById("userIdBilling").disabled = true;
        }
	});
    
}


// fetching data in modal
$('#returnModal').on('show.bs.modal', function(e) {
    var orderId = $(e.relatedTarget).data('oid');
    var userId = $(e.relatedTarget).data('uid');
    //populate the hidden textbox in modal
    $(e.currentTarget).find('input[id="order_id"]').val(orderId);
    $(e.currentTarget).find('input[id="user_id"]').val(userId);
});
  
  function submitReturnRequest(){
    var order_id = document.getElementById('order_id').value; 
    var user_id = document.getElementById('user_id').value; 
    var desc = document.getElementById('return_desc').value;  
    var file = document.getElementById('return_image').files[0];   //file object

    if(desc == ""){
      document.getElementById('error_return_desc').innerHTML = "Kindly mention reason of return.";
      return false;
    }

    if(document.getElementById('return_image').files.length == 0){
      document.getElementById('error_return_image').innerHTML = "Kindly upload image of product.";
      return false;
    }
    
      var form_data = new FormData();                  
      form_data.append('file', file); 
      form_data.append('order_id', order_id);
      form_data.append('user_id', user_id);
      form_data.append('desc', desc);
      form_data.append( "_token", "{{ csrf_token() }}");
        $.ajax({ 
          type: 'POST', 
          url: '/print-shop/return-order',
          contentType: false,
          processData: false,
          data: form_data,
          success:function(response) {  
              $('#returnModal').modal('hide');
              Location.reload();
        }

      });
}
 


function addAddress(address_type = ""){

  var first_name, last_name, company_name, street, city, zip_code, house_no, addition, state; 

  if(address_type == "billing"){

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
      url: '/druckshop/add-address', 
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type: 'POST', 
      data: {'default':1,'address_type':address_type, 'first_name':first_name, 'last_name':last_name, 'company_name':company_name, 'street':street, 'city':city, 'zip_code':zip_code, 'house_no':house_no, 'addition':addition, 'state':state},
      success: function (response){  
        if(address_type == "billing"){
          $('#rv-Modal-billing').css('display','none'); 
        }else{
          $('#rv-Modal-shipping').css('display','none');
        }

      }
    });



} 