$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

 var fileobj; 
 function upload_file(e,id) {
  e.preventDefault(); 
  fileobj = e.dataTransfer.files[0];
  //to restrict only to pdf file format
  if(fileobj.type == "application/pdf"){
  ajaxFileUpload(fileobj,id);
  }else{
    return false;
  }
}

function file_explorer(id) {
  document.getElementById('selectfile').click();
  document.getElementById('selectfile').onchange = function() {
    fileobj = document.getElementById('selectfile').files[0];
    ajaxFileUpload(fileobj,id);
  };
}

function ajaxFileUpload(file_obj,id) {

 if(file_obj != undefined) {
  var form_data = new FormData();                  
  form_data.append('file', file_obj);
  $.ajax({
    type: 'POST',
    url: '/print-shop/upload-file',
    contentType: false,
    processData: false,
    data: form_data,
    success:function(response) {

      $('#selectfile').val('');
      var data = JSON.parse(response); 

      if(id == "drop_file_zone_cover_sheet"){

        document.getElementById('cover_sheet_file_name').innerHTML = "File Name:"+data['data']['file_name'];
        document.getElementById('cover_sheet_page_no').innerHTML = "No of Pages:"+data['data']['no_of_pages'];
        $('#cover_sheet_del').text('Del File').attr('onclick',"removeFile('"+data['data']['edit_name']+"')");
        


      }else if(id == "drop_file_zone_back_cover"){

        document.getElementById('back_cover_file_name').innerHTML = "File Name:"+data['data']['file_name'];
        document.getElementById('back_cover_page_no').innerHTML = "No of Pages:"+data['data']['no_of_pages'];
        $('#back_cover_del').text('Del File').attr('onclick',"removeFile('"+data['data']['edit_name']+"')");
     
      }else if(id == "drop_file_zone_content"){

        document.getElementById('content_file_name').innerHTML = "File Name:"+data['data']['file_name'];
        document.getElementById('content_page_no').innerHTML = "No of Pages:"+data['data']['no_of_pages'];
        $('#content_del').text('Del File').attr('onclick',"removeFile('"+data['data']['edit_name']+"')");


      }else if(id == "drop_file_din_A3"){

        document.getElementById('A3_file_name').innerHTML = "File Name:"+data['data']['file_name'];
        document.getElementById('A3_page_no').innerHTML = "No of Pages:"+data['data']['no_of_pages'];
        $('#A3_del').text('Del File').attr('onclick',"removeFile('"+data['data']['edit_name']+"')");


      }else if(id == "drop_file_din_A2"){

        document.getElementById('A2_file_name').innerHTML = "File Name:"+data['data']['file_name'];
        document.getElementById('A2_page_no').innerHTML = "No of Pages:"+data['data']['no_of_pages'];
        $('#A2_del').text('Del File').attr('onclick',"removeFile('"+data['data']['edit_name']+"')");


      }else if(id == "upload_custom_logo"){
        document.getElementById('logo_file_name').innerHTML = "File Name:"+data['data']['file_name'];
        document.getElementById('logo_page_no').innerHTML = "No of Pages:"+data['data']['no_of_pages'];
        $('#logo_del').text('Del File').attr('onclick',"removeFile('"+data['data']['edit_name']+"')");
      
      }else if(id == "upload_cd"){
        document.getElementById('cd_file_name').innerHTML = "File Name:"+data['data']['file_name'];
        document.getElementById('cd_page_no').innerHTML = "No of Pages:"+data['data']['no_of_pages'];
        $('#cd_del').text('Del File').attr('onclick',"removeFile('"+data['data']['edit_name']+"')");
      }
      
    }
  });
}
} 


//upload files 

function uploadDisplay(node,value){

  if(node == "cover-sheet" && value != "-1"){
    document.getElementById('drop_file_zone_cover_sheet').className = "displayBlock";
    document.getElementById('drop_file_zone_cover_sheet_info').className = "displayBlock";
  }else if(node == "back-cover" && value != "-1"){
    document.getElementById('drop_file_zone_back_cover').className = "displayBlock";
    document.getElementById('drop_file_zone_back_cover_sheet_info').className = "displayBlock";
  }

}


function removeFile(file_name){

  if (confirm("Do You Want to delete the file?")) {
    // remove previously uploaded file

    $.ajax({
    url: '/print-shop/remove-file', 
    type: 'POST',
    data: {'file_name': file_name},
    success: function (response){
      var data = JSON.parse(response); 
      console.log(data);
    }
  });

   
  } else { }

}