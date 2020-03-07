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

        //$('#drag_upload_file').empty();
        document.getElementById('drag_upload_file_cover_sheet').className = "displayNone";
        $('#drop_file_zone_cover_sheet').append('<div id="del" class="displayBlock"><span class="upload-msg">File Uploaded</span><span id="cover_sheet_del"><i class="fa fa-trash"></i></span></div>');
        document.getElementById('cover_sheet_file_name').innerHTML = "File Name:"+data['data']['file_name'];
        document.getElementById('cover_sheet_page_no').innerHTML = "No of Pages:"+data['data']['no_of_pages'];
        document.getElementById('selectfile_coversheet').value = data['data']['edit_name'];
        $('#cover_sheet_del').attr('onclick',"removeFile('"+data['data']['edit_name']+"','"+id+"')");

      }else if(id == "drop_file_zone_back_cover"){

        // $('#drop_file_zone_back_cover').empty();
        document.getElementById('drag_upload_file_back_cover').className = "displayNone";
        $('#drop_file_zone_back_cover').append('<div id="del" class="displayBlock"><span class="upload-msg">File Uploaded</span><span id="back_cover_del"><i class="fa fa-trash"></i></span></div>');
        document.getElementById('back_cover_file_name').innerHTML = "File Name:"+data['data']['file_name'];
        document.getElementById('back_cover_page_no').innerHTML = "No of Pages:"+data['data']['no_of_pages'];
        document.getElementById('selectfile_backcover').value = data['data']['edit_name'];
        $('#back_cover_del').attr('onclick',"removeFile('"+data['data']['edit_name']+"','"+id+"')");

      }else if(id == "drop_file_zone_content"){

        // $('#drop_file_zone_content').empty();
        document.getElementById('drag_upload_file').className = "displayNone";
        $('#drop_file_zone_content').append('<div id="del" class="displayBlock"><span class="upload-msg">File Uploaded</span><span id="content_del"><i class="fa fa-trash"></i></span></div>');
        document.getElementById('content_file_name').innerHTML = "File Name:"+data['data']['file_name'];
        document.getElementById('content_page_no').innerHTML = "No of Pages:"+data['data']['no_of_pages'];
        document.getElementById('selectfile_content').value = data['data']['edit_name'];
        $('#content_del').attr('onclick',"removeFile('"+data['data']['edit_name']+"','"+id+"')");

      }else if(id == "drop_file_din_A3"){

        // $('#drop_file_din_A3').empty();
        document.getElementById('drag_upload_file').className = "displayNone";
        $('#drop_file_din_A3').append('<div id="del" class="displayBlock"><span class="upload-msg">File Uploaded</span><span id="A3_del"><i class="fa fa-trash"></i></span></div>');
        document.getElementById('A3_file_name').innerHTML = "File Name:"+data['data']['file_name'];
        document.getElementById('A3_page_no').innerHTML = "No of Pages:"+data['data']['no_of_pages'];
        $('#A3_del').attr('onclick',"removeFile('"+data['data']['edit_name']+"','"+id+"')");

      }else if(id == "drop_file_din_A2"){

        // $('#drop_file_din_A2').empty();
        document.getElementById('drag_upload_file').className = "displayNone";
        $('#drop_file_din_A2').append('<div id="del" class="displayBlock"><span class="upload-msg">File Uploaded</span><span id="A2_del"><i class="fa fa-trash"></i></span></div>');
        document.getElementById('A2_file_name').innerHTML = "File Name:"+data['data']['file_name'];
        document.getElementById('A2_page_no').innerHTML = "No of Pages:"+data['data']['no_of_pages'];
        $('#A2_del').attr('onclick',"removeFile('"+data['data']['edit_name']+"','"+id+"')");
        
      }else if(id == "upload_custom_logo"){
        
        // $('#upload_custom_logo').empty();
        document.getElementById('drag_upload_file').className = "displayNone";
        $('#upload_custom_logo').append('<div id="del" class="displayBlock"><span class="upload-msg">File Uploaded</span><span id="logo_del"><i class="fa fa-trash"></i></span></div>');
        document.getElementById('logo_file_name').innerHTML = "File Name:"+data['data']['file_name'];
        document.getElementById('logo_page_no').innerHTML = "No of Pages:"+data['data']['no_of_pages'];
        document.getElementById('selectfile_logo').value = data['data']['edit_name'];
        $('#logo_del').attr('onclick',"removeFile('"+data['data']['edit_name']+"','"+id+"')");
      
      }else if(id == "upload_cd"){
        
        // $('#upload_cd').empty();
        document.getElementById('drag_upload_file').className = "displayNone";
        $('#upload_cd').append('<div id="del" class="displayBlock"><span class="upload-msg">File Uploaded</span><span id="cd_del"><i class="fa fa-trash"></i></span></div>');
        document.getElementById('cd_file_name').innerHTML = "File Name:"+data['data']['file_name'];
        document.getElementById('cd_page_no').innerHTML = "No of Pages:"+data['data']['no_of_pages'];
        document.getElementById('selectfile_cd').value = data['data']['edit_name'];
        $('#cd_del').attr('onclick',"removeFile('"+data['data']['edit_name']+"','"+id+"')");
        
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
  }else if(node == "back-cover" && value != "-1"){ alert("in");
    document.getElementById('drop_file_zone_back_cover').className = "displayBlock";
    document.getElementById('drop_file_zone_back_cover_sheet_info').className = "displayBlock";
  }

}
 

function removeFile(file_name,id){

  if (confirm("Do You Want to delete the file?")) {
    // remove previously uploaded file

    $.ajax({
    url: '/print-shop/remove-file', 
    type: 'POST',
    data: {'file_name': file_name},
    success: function (response){
      var data = JSON.parse(response); 
      document.getElementById('del').className = "displayNone";
      document.getElementById('drag_upload_file').className = "displayBlock";
      if(id == "drop_file_zone_cover_sheet"){
        document.getElementById('cover_sheet_file_name').innerHTML = "";
        document.getElementById('cover_sheet_page_no').innerHTML = "";
      }else if(id == "drop_file_zone_back_cover"){
        document.getElementById('back_cover_file_name').innerHTML = "";
        document.getElementById('back_cover_page_no').innerHTML = "";
      }else if(id == "drop_file_zone_content"){
       document.getElementById('content_file_name').innerHTML = "";
        document.getElementById('content_page_no').innerHTML = "";
      }else if(id == "drop_file_din_A3"){
        document.getElementById('A3_file_name').innerHTML = "";
        document.getElementById('A3_page_no').innerHTML = "";
      }else if(id == "drop_file_din_A2"){
        document.getElementById('A2_file_name').innerHTML = "";
        document.getElementById('A2_page_no').innerHTML = "";
      }else if(id == "upload_custom_logo"){
        document.getElementById('logo_file_name').innerHTML = "";
        document.getElementById('logo_page_no').innerHTML = "";
      }else if(id == "upload_cd"){
        document.getElementById('cd_file_name').innerHTML = "";
        document.getElementById('cd_page_no').innerHTML = "";
      }
     // console.log(data);
    }
  });

   
  } else { }

}