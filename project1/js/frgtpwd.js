$(document).ready(function(){
	
$(':button[type="button"]').prop('disabled', true);
$('input[type="text"]').on("keyup", function(){
	$(':button[type="button"]').prop("disabled", true);
	if($(this).val().length!=0) 
		{
			$(':button[type="button"]').prop("disabled", false);
		}
	});
 
$("#submitbtn").click(function() {
	var uname = $("input#uname").val();
	var base_url = window.location.origin;
	var posturl= base_url+'/project1/index.php/login_controller/forget_password';
	alert(posturl);
	var data={ 'uname':uname};
$(document).ajaxStart(function(){
    $("#wait").css("display", "block");
	 $("#submitbtn").attr("disabled", true);
  });
  $(document).ajaxComplete(function(){
    $("#wait").css("display", "none");
  }); 
	if(uname.includes('@')== true)
{
	$.ajax({
                url: posturl,
                type: 'post',               
                data: data,
				dataType: "json",
                success: function( returnData ){
				console.log(returnData);
				
				console.log(returnData.email);
				if(returnData.result == true){
				
				var success='<div id="message"><p><b>Thanks ! Please check the '+returnData.email+' for a link to reset your password.</b></p></div>';
					$('#response').html(success);
					
				}
				else
				{
					var fail='<div id="message"><p><b>The entered email is not registered!! Please try again!</b></p></div>';
					$('#response').html(fail);
				}
				return false;
				}	
			});
}
else
{
$.ajax({
                url: posturl,
                type: 'post',               
                data: data,
				dataType: "json",
                success: function( returnData ){
				console.log(returnData);
				console.log(returnData.uname);
				if(returnData.result == true){
				
				0
				var success='<div id=message><p>Thanks '+returnData.uname+'! Please check the registered email for a link to reset your password.</p></div>';
					$('#response').html(success);
				}
				else
				{
					var fail='<div id=message><p>The entered user id is not registered!! Please try again!</p></div>';
					$('#response').html(fail);
				}
				return false;
				}	
			});
}
});



});