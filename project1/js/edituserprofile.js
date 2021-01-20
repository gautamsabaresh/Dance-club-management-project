$(document).ready(function(){
var userid = $("input#userid").val();

	$("#updateprofilebtn").click(function() 
	{
		var fname = $("input#firstname").val();
		var lname = $("input#lastname").val();
		var email = $("input#email").val();

		
  		if (fname == "") {
			alert("Please fill all the fields");
			$("input#firstname").focus();
			return false;
		}
	    
  		if (lname == "") {
			alert("Please fill all the fields");
			$("input#lastname").focus();
			return false;
		}
  		
  		if (email == "") {
			alert("Please fill all the fields");
			$("input#email").focus();
			return false;	
		}
  		
		var base_url = window.location.origin;
var edithome_url = base_url+'/project1/index.php/user_manipulation_controller/edit_profile_view';
		
		var posturl= base_url+'/project1/index.php/user_manipulation_controller/edit_profile';
		var data={	
					'fname':fname,
					'lname':lname,
					'email':email,
					'userid':userid 
				};
		$.ajax(
			{
                url: posturl,
                type: 'post',               
                data: data,
				dataType: "json",
                success: function( returnData )
					{
						console.log(returnData);
						console.log(returnData.data.email);
						$("input#firstname").val(returnData.data.fname);
						$("input#lastname").val(returnData.data.lname);
						$("input#email").val(returnData.data.email);
						setTimeout(function(){
						$('#editsuccess_data_Modal').modal('toggle');
						$('.modal-backdrop').remove();
						$("#editprofile").load(edithome_url);
						},1000);
					}
			});
		
	});
	
	$("#updatepasswordbtn").click(function() 
	{
		
		var currentpassword = $("input#currentpwd").val();
		var newpassword = $("input#newpwd").val();
		var confirmnewpassword = $("input#repnewpwd").val();
		var base_url = window.location.origin;
var edithome_url = base_url+'/project1/index.php/user_manipulation_controller/edit_profile_view';
		var posturl= base_url+'/project1/index.php/user_manipulation_controller/reset_user_password';
		var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
	
	
	if(newpassword!=confirmnewpassword)
	{
		alert("The passwords must be the same!! Please try again.")	
		return false;	
	}
	else if(!passw.test(currentpassword))
	{
		alert("The password must be between 6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter.");	
		$("input#currentpwd").focus();
		return false;
	}
	else if(!passw.test(newpassword)) 
	{	$("input#newpwd").focus();
		alert("The password must be between 6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter.");	
		return false;
	}
		var data={'password':currentpassword,'newpassword':newpassword,'userid':userid};
		$.ajax({
			 url: posturl,
                type: 'post',               
                data: data,
				dataType: "json",
                success: function( returnData ){
				console.log(returnData); 
				console.log(returnData.result);
				if(returnData.result==true)
				{
					$("#editpasswordsuccess_data_Modal").modal("toggle");
				setTimeout(function(){
						$("#editpasswordsuccess_data_Modal").modal("toggle");
						$('.modal-backdrop').remove();
						$("#updatenewpassword")[0].reset();
						},1000);
				}
				if(returnData.result==false)
				{$("#editpasswordfail_data_Modal").modal("toggle");
					setTimeout(function(){
					$("#editpasswordfail_data_Modal").modal("toggle");
					$("#updatenewpassword")[0].reset();
					},1000);
				}
				}
	});
	
	
	
	});
});