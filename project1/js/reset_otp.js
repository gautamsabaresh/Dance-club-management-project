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
	var otp = $("input#otp").val();
	//var encryptotp=$.md5(otp);
	var base_url = window.location.origin;
	var posturl= base_url+'/project1/index.php/login_controller/check_otp_new_pwd';
	var data={'otp':otp };
	debugger

	var urlnewpwd= base_url+'/project1/index.php/login_controller/check_otp_new_pwd_view?otp='+otp;
	$.ajax({
                url: posturl,
                type: 'post',               
                data: data,
				dataType: "json",
                success: function( returnData ){
				console.log(returnData); 
				console.log(returnData.result);
				if(returnData.result == true){
					window.location.href = urlnewpwd;
				}
				else
				{
					var fail='<div id="message"><p style=color:RED>Wrong OTP..!! Please try again.</p></div>';
					$('#response').html(fail);
				}
				
				return false;
			}
			});


});
});