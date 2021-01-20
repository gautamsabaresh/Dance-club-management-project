$(document).ready(function(){

var base_url = window.location.origin;
$('#export').click(function(){
    
	var fromdata = [];
    var todata = [];
	$.each($('#fromdata').val().split(/\n/), function(i, line){
        if(line){
            fromdata.push(line);
        } else {
            fromdata.push("");
        }
    });
if(fromdata.length === 0)
{alert('Fill all the fields!');
$("#fromdata").focus();
return false;
}


$.each($('#todata').val().split(/\n/), function(i, line){
        if(line){
            todata.push(line);
        } else {
            todata.push("");
        }
    });
if(todata.length === 0)
{alert('Fill all the fields!');
$("#todata").focus();
return false;
}
var salutation = $('#salute').val();
if(salutation=="")
{
alert('Fill all the fields!');
$("#salute").focus();
return false;
}
var subject = $('#lettersubject').val();
if(subject == "")
{
alert('Fill all the fields!');
$('#lettersubject').focus();
return false;
}
var content = $('#lettercontent').val();
if(subject == "")
{
alert('Fill all the fields!');
$('#lettercontent').focus();
  return false;
}
var signature = $('#signature').val();
if(signature == "")
{
alert('Fill all the fields!');
$('#signature').focus();
return false;
}
console.log(fromdata);
console.log(todata);
var posturl= base_url+'/project1/index.php/user_manipulation_controller/export_letter_doc';

var data = {

};
$.ajax({
        url: posturl,
        type: 'POST',
        data: data,
        success: function (data) {
			
           console.log(data);
			
				$('#responseeventview').show();
				var successresult='<div id="message"><p style="color:GREEN">The event has been added successfully!!</p></div>';
				$('#responseeventview').html(successresult);
			
		}
});

});
});