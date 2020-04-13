// fetch data for customer profile
    window.onload = function WindowLoad(event) {

        $.ajax({ 
          type: 'get', 
          url: '/druckshop/customer-area-data',
          success:function(response) { 
           var data = JSON.parse(response);  
           document.getElementById('userIdBirth').value = data['dob'];
           document.getElementById('userIdAddress').value = data['address'];
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
    document.getElementById("userIdAddress").disabled = false;
    document.getElementById("userIdEmail").disabled = false;
    document.getElementById("userIdPhone").disabled = false;
    document.getElementById("userIdAddress").disabled = false;
    document.getElementById("userIdshipping").disabled = false;
    document.getElementById("userIdBilling").disabled = false;
}

function saveProfile(){  
    var dob = document.getElementById('userIdBirth').value;
    var address = document.getElementById('userIdAddress').value; 
    var email = document.getElementById('userIdEmail').value;  
    var phone = document.getElementById('userIdPhone').value;  
    var shipping_address = document.getElementById('userIdshipping').value;   
    var billing_address = document.getElementById('userIdBilling').value;  
    var image = document.getElementById('upload-img').files[0];   //file object

         var form_data = new FormData();                  
        form_data.append('image', image);
        form_data.append('dob', dob);
        form_data.append('address', address);
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
                document.getElementById("userIdAddress").disabled = true;
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
 