
$(document).ready(function(){
  $('input').iCheck({
    checkboxClass: 'icheckbox_square-purple',
    radioClass: 'iradio_square',
    increaseArea: '20%' // optional
  });

});


$(function(){
    $('#inner-content-div').slimScroll({
        height: '250px'
    });
});


$("#input-id").fileinput({'showUpload':true, 'previewFileType':'any'});




function Checkfiles()
{
var fup = document.getElementById('input-id');
var fileName = fup.value;
var ext = fileName.substring(fileName.lastIndexOf('.') + 1);
if(ext == "gif" || ext == "GIF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "png")
{

 $.blockUI({ css: { 
            border: 'none', 
            padding: '15px', 
            backgroundColor: '#000', 
            '-webkit-border-radius': '10px', 
            '-moz-border-radius': '10px', 
            opacity: .5, 
            color: '#fff' 
        } });
    
return true;
} 
else
{
alert("Upload gif, Jpg, or png images only");
fup.focus();
return false;
}
}

