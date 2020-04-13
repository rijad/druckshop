$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

 var fileobj; 
//  function upload_file(e,id) {
//   e.preventDefault(); 

//   fileobj = e.dataTransfer.files[0];
//   //to restrict only to pdf file format
//   if(fileobj.type == "application/pdf"){ 
//   ajaxFileUpload(fileobj,id);
//   }else{
//     return false;
//   }
// }

 
 function upload_file(e,id) {
  e.preventDefault();  alert("1"+id);
if(id == "upload_cd"){  // multiple file uploading
alert("2"+id);
  file = e.dataTransfer;
         for (var i = 0; i < file.files.length; i++) {
             ajaxFileUpload(file.files[i], id);
     }

}else{  // single file uploading

    fileobj = e.dataTransfer.files[0]; 
    //to restrict only to pdf file format
    if(fileobj.type == "application/pdf"){ 
    ajaxFileUpload(fileobj,id);
    }else{
      return false;
    }

}
   
}

// function file_explorer(id) {  

//     document.getElementById('selectfile').click();
//     document.getElementById('selectfile').onchange = function() {
//       fileobj = document.getElementById('selectfile').files[0];
//       ajaxFileUpload(fileobj,id);
//     };
// }

function file_explorer(id) {  

  if(id == "upload_cd"){ 
     document.getElementById('selectfile').click();
     document.getElementById('selectfile').onchange = function() {
      file = document.getElementById('selectfile');
         for (var i = 0; i < file.files.length; i++) {
             ajaxFileUpload(file.files[i], id);
     }
    };
  }else{
      document.getElementById('selectfile').click();
      document.getElementById('selectfile').onchange = function() {
        fileobj = document.getElementById('selectfile').files[0];
        ajaxFileUpload(fileobj,id);
      };
  }

   
}

function ajaxFileUpload(file_obj,id) {  alert(id);
 
 if(file_obj != undefined) {
  var form_data = new FormData();                  
  form_data.append('file', file_obj);
  $.ajax({ 
    type: 'POST',
    url: '/druckshop/upload-file',
    contentType: false,
    processData: false,
    data: form_data, 
    success:function(response) {  console.log(response);
 
      $('#selectfile').val('');
      var data = JSON.parse(response); 

      if(id == "drop_file_zone_cover_sheet"){

        //$('#drag_upload_file').empty();
        document.getElementById('drag_upload_file_cover_sheet').className = "displayNone";
        $('#drop_file_zone_cover_sheet').append('<div id="del_cover_sheet" class="displayBlock"><span class="upload-msg">File Uploaded</span><span id="cover_sheet_del"><i class="fa fa-trash"></i></span></div>');
        document.getElementById('cover_sheet_file_name').innerHTML = "File Name:"+data['data']['file_name'];
        document.getElementById('cover_sheet_page_no').innerHTML = "No of Pages:"+data['data']['no_of_pages'];
        document.getElementById('selectfile_coversheet').value = data['data']['edit_name'];
        $('#cover_sheet_del').attr('onclick',"removeFile('"+data['data']['edit_name']+"','"+id+"')");

      }else if(id == "drop_file_zone_back_cover"){

        // $('#drop_file_zone_back_cover').empty();
        document.getElementById('drag_upload_file_back_cover').className = "displayNone";
        $('#drop_file_zone_back_cover').append('<div id="del_back_cover" class="displayBlock"><span class="upload-msg">File Uploaded</span><span id="back_cover_del"><i class="fa fa-trash"></i></span></div>');
        document.getElementById('back_cover_file_name').innerHTML = "File Name:"+data['data']['file_name'];
        document.getElementById('back_cover_page_no').innerHTML = "No of Pages:"+data['data']['no_of_pages'];
        document.getElementById('selectfile_backcover').value = data['data']['edit_name'];
        $('#back_cover_del').attr('onclick',"removeFile('"+data['data']['edit_name']+"','"+id+"')");

      }else if(id == "drop_file_zone_content"){  

        document.getElementById('drag_upload_file').className = "displayNone";
        $('#drop_file_zone_content').append('<div id="del_content" class="displayBlock"><span class="upload-msg">File Uploaded</span><span id="content_del"><i class="fa fa-trash"></i></span></div>');
        document.getElementById('drop_file_zone_content_info').className = "displayBlock";
        document.getElementById('content_file_name').innerHTML = "File Name:"+data['data']['file_name'];
        document.getElementById('content_page_no').innerHTML = "No of Pages:"+data['data']['no_of_pages'];
        document.getElementById('selectfile_content').value = data['data']['edit_name'];
        document.getElementById('pg_no').value = data['data']['no_of_pages'];
        $('#content_del').attr('onclick',"removeFile('"+data['data']['edit_name']+"','"+id+"')");

      }else if(id == "drop_file_din_A3"){

        // $('#drop_file_din_A3').empty();
        document.getElementById('drag_upload_file_A3').className = "displayNone";
        $('#drop_file_din_A3').append('<div id="del_A3" class="displayBlock"><span class="upload-msg">File Uploaded</span><span id="A3_del"><i class="fa fa-trash"></i></span></div>');
        document.getElementById('drop_file_din_A3_info').className = "displayBlock";
        document.getElementById('A3_file_name').innerHTML = "File Name:"+data['data']['file_name'];
        document.getElementById('A3_page_no').innerHTML = "No of Pages:"+data['data']['no_of_pages'];
        document.getElementById('selectfile_din_A3').value = data['data']['edit_name'];
        $('#A3_del').attr('onclick',"removeFile('"+data['data']['edit_name']+"','"+id+"')");

      }else if(id == "drop_file_din_A2"){
        // $('#drop_file_din_A2').empty();
        document.getElementById('drag_upload_file_A2').className = "displayNone";
        $('#drop_file_din_A2').append('<div id="del_A2" class="displayBlock"><span class="upload-msg">File Uploaded</span><span id="A2_del"><i class="fa fa-trash"></i></span></div>');
        document.getElementById('drop_file_din_A2_info').className = "displayBlock";
        document.getElementById('A2_file_name').innerHTML = "File Name:"+data['data']['file_name'];
        document.getElementById('A2_page_no').innerHTML = "No of Pages:"+data['data']['no_of_pages'];
        document.getElementById('selectfile_din_A2').value = data['data']['edit_name'];
        $('#A2_del').attr('onclick',"removeFile('"+data['data']['edit_name']+"','"+id+"')");
        
      }else if(id == "upload_custom_logo"){
         
        // $('#upload_custom_logo').empty();
        document.getElementById('drag_upload_file_logo').className = "displayNone";
        $('#upload_custom_logo').append('<div id="del_logo" class="displayBlock"><span class="upload-msg">File Uploaded</span><span id="logo_del"><i class="fa fa-trash"></i></span></div>');
        document.getElementById('upload_custom_logo_info').className = "displayBlock";
        document.getElementById('logo_file_name').innerHTML = "File Name:"+data['data']['file_name'];
        document.getElementById('logo_page_no').innerHTML = "No of Pages:"+data['data']['no_of_pages'];
        document.getElementById('selectfile_logo').value = data['data']['edit_name'];
        $('#logo_del').attr('onclick',"removeFile('"+data['data']['edit_name']+"','"+id+"')");
      
      }else if(id == "upload_cd"){ 
        
        // $('#upload_cd').empty();
        document.getElementById('drag_upload_file_cd').className = "displayNone";
        $('#upload_cd').append('<div id="del_cd" class="displayBlock"><span class="upload-msg">File Uploaded</span><span id="cd_del"><i class="fa fa-trash"></i></span></div>');
        document.getElementById('drop_file_zone_cd').className = "displayBlock";
        document.getElementById('cd_file_name').innerHTML = "File Name:"+data['data']['file_name'];
        document.getElementById('cd_page_no').innerHTML = "No of Pages:"+data['data']['no_of_pages'];
        document.getElementById('selectfile_cd').value = data['data']['edit_name'];
        $('#cd_del').attr('onclick',"removeFile('"+data['data']['edit_name']+"','"+id+"')");
        
      }else if(id == "drop_pdf"){  // free sample page
        
        // $('#upload_cd').empty(); 
        document.getElementById('drag_upload_file_sample').className = "displayNone";
        $('#drop_pdf').append('<div id="del_pdf" class="displayBlock"><span class="upload-msg">File Uploaded</span><span id="cd_del"><i class="fa fa-trash"></i></span></div>');
        document.getElementById('drop_file_zone_pdf').className = "displayBlock";
        document.getElementById('pdf_file_name').innerHTML = "File Name:"+data['data']['file_name'];
        document.getElementById('pdf_page_no').innerHTML = "No of Pages:"+data['data']['no_of_pages'];
        document.getElementById('selectfile_free_sample').value = data['data']['edit_name'];
        $('#pdf_del').attr('onclick',"removeFile('"+data['data']['edit_name']+"','"+id+"')");
        
      }else if(id == "upload_custom_logo_cd"){
         
        // $('#upload_custom_logo').empty();
        document.getElementById('drag_upload_file_logo_cd').className = "displayNone";
        $('#upload_custom_logo').append('<div id="del_logo_cd" class="displayBlock"><span class="upload-msg">File Uploaded</span><span id="logo_del"><i class="fa fa-trash"></i></span></div>');
        document.getElementById('upload_custom_logo_info_cd').className = "displayBlock";
        document.getElementById('logo_file_name_cd').innerHTML = "File Name:"+data['data']['file_name'];
        document.getElementById('logo_page_no_cd').innerHTML = "No of Pages:"+data['data']['no_of_pages'];
        document.getElementById('selectfile_logo_cd').value = data['data']['edit_name'];
        $('#logo_del_cd').attr('onclick',"removeFile('"+data['data']['edit_name']+"','"+id+"')");
      
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
  }else if(node == "back-cover" && value != "-1"){ //alert("in");
    document.getElementById('drop_file_zone_back_cover').className = "displayBlock";
    document.getElementById('drop_file_zone_back_cover_sheet_info').className = "displayBlock";
  }

}
 

function removeFile(file_name,id){   alert(id);

  if (confirm("Do You Want to delete the file?")) {
    // remove previously uploaded file

    $.ajax({
    url: '/druckshop/remove-file', 
    type: 'POST',
    data: {'file_name': file_name},
    success: function (response){
      var data = JSON.parse(response); 
      if(id == "drop_file_zone_cover_sheet"){
        document.getElementById('cover_sheet_file_name').innerHTML = "";
        document.getElementById('cover_sheet_page_no').innerHTML = "";
        document.getElementById('selectfile_coversheet').value = "";
        document.getElementById('drag_upload_file_cover_sheet').className = "displayBlock";
        document.getElementById('del_cover_sheet').className = "displayNone";
      }else if(id == "drop_file_zone_back_cover"){
        document.getElementById('back_cover_file_name').innerHTML = "";
        document.getElementById('back_cover_page_no').innerHTML = "";
        document.getElementById('selectfile_backcover').value = "";
        document.getElementById('drag_upload_file_back_cover').className = "displayBlock";
        document.getElementById('del_back_cover').className = "displayNone";
      }else if(id == "drop_file_zone_content"){  
       document.getElementById('content_file_name').innerHTML = "";
        document.getElementById('content_page_no').innerHTML = "";
        document.getElementById('selectfile_content').value = "";
        document.getElementById('drag_upload_file').className = "displayBlock";
        document.getElementById('del_content').className = "displayNone";
        document.getElementById('pg_no').value = "";
      }else if(id == "drop_file_din_A3"){
        document.getElementById('A3_file_name').innerHTML = "";
        document.getElementById('A3_page_no').innerHTML = "";
        document.getElementById('selectfile_din_A3').value = "";
        document.getElementById('drag_upload_file_A3').className = "displayBlock";
        document.getElementById('del_A3').className = "displayNone";
      }else if(id == "drop_file_din_A2"){
        document.getElementById('A2_file_name').innerHTML = "";
        document.getElementById('A2_page_no').innerHTML = "";
        document.getElementById('selectfile_din_A2').value = "";
       document.getElementById('drag_upload_file_A2').className = "displayBlock";
       document.getElementById('del_A2').className = "displayNone";
      }else if(id == "upload_custom_logo"){
        document.getElementById('logo_file_name').innerHTML = "";
        document.getElementById('logo_page_no').innerHTML = "";
        document.getElementById('selectfile_logo').value = "";
        document.getElementById('drag_upload_file_logo').className = "displayBlock"
        document.getElementById('del_logo').className = "displayNone";
      }else if(id == "upload_cd"){
        document.getElementById('cd_file_name').innerHTML = "";
        document.getElementById('cd_page_no').innerHTML = "";
        document.getElementById('selectfile_cd').value = "";
        document.getElementById('drag_upload_file_cd').className = "displayBlock";
        document.getElementById('del_cd').className = "displayNone";
      }else if(id == "drop_pdf"){
        document.getElementById('pdf_file_name').innerHTML = "";
        document.getElementById('pdf_page_no').innerHTML = "";
        document.getElementById('selectfile_free_sample').value = "";
        document.getElementById('drag_upload_file_sample').className = "displayBlock";
        document.getElementById('del_pdf').className = "displayNone";
      }else if(id == "upload_custom_logo_cd"){
        document.getElementById('logo_file_name_cd').innerHTML = "";
        document.getElementById('logo_page_no_cd').innerHTML = "";
        document.getElementById('selectfile_logo_cd').value = "";
        document.getElementById('drag_upload_file_logo_cd').className = "displayBlock"
        document.getElementById('del_logo_cd').className = "displayNone";
      }
     // console.log(data);
    }
  });

   
  } else { }
 
}