$(document).ready(function(){
	
$(':button[type="button"]').prop('disabled', true);
$('input#newpwd'&& 'input#repnewpwd').on("keyup", function(){
	$(':button[type="button"]').prop("disabled", true);
	if($(this).val().length!=0) 
		{
			$(':button[type="button"]').prop("disabled", false);
		}
	});

$("#submitbtn").click(function() {
	var otp= $("input#otp").val();
	var new_pwd = $("input#newpwd").val();
	var repnewpwd= $("input#repnewpwd").val();
	//alert(otp);
	
	var base_url = window.location.origin;
	var posturl= base_url+'/project1/index.php/login_controller/update_new_pwd';
	var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
	
	if(new_pwd!=repnewpwd)
	{
		alert("The passwords must be the same!! Please try again.")	
		return false;	
	}
	else if(!passw.test(new_pwd)) 
	{
		alert("The password must be between 6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter.");	
		return false;
	}
	else
	{
	var data={'password':new_pwd,'otp':otp};
	$.ajax({
                url: posturl,
                type: 'post',               
                data: data,
				dataType: "json",
                success: function( returnData ){
				console.log(returnData); 
				console.log(returnData.result);
				console.log(returnData.newpwd);
				console.log(returnData.otp);
				 if(returnData.result == true){
				var signin=base_url+'/project1/index.php/login_controller/index';
				var success='<div id=message><p style=color:GREEN>The password has been updated successfuly.</p><br><a href="'+signin+'">Back to login page</a></div>';
				$('#response').html(success);
				}
				else{
					var fail='<div id=message><p style=color:RED>Please try again.</p></div>';
					$('#response').html(fail);
				}
				
				return false;

			}
		});
	}	
	});
});