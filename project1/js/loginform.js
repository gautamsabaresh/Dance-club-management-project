$(document).ready(function(){
	
	$("#submitbtn").prop('disabled', true);
	$(('#uname' && '#inputPassword')).on("keyup",function()
	{
		$("#submitbtn").prop("disabled", true);
		if($('#uname').val().length!=0 && $('#inputPassword').val().length!=0) 
		{
			$(':button[type="button"]').prop("disabled", false);
		}
	});
	
	


    $("#submitbtn").click(function() {
      // validate and process form here
		var uname = $("input#uname").val();
		var psw = $("input#inputPassword").val();
  		if (uname == "") {
			alert("Username and password required!")
			$("input#uname").focus();
			return false;
		}
		if (psw == "") {
        alert("Username and password required!")
        $("input#inputPassword").focus();
        return false;
      }
		var base_url = window.location.origin;
	  
		var posturl= base_url+'/project1/index.php/login_controller/login';
		//alert(posturl);

		var data={ 'uname':uname,
				'psw': psw};
		var urlhome= base_url+'/project1/index.php/login_controller/home';
		$.ajax({
                url: posturl,
                type: 'post',               
                data: data,
				dataType: "json",
                success: function( returnData ){
				console.log(returnData);
				console.log(returnData.result);
				if(returnData.result == true && returnData.user_status == 1){
					window.location.href = urlhome;
				}else if(returnData.result == true && returnData.user_status == 0)
				{
						var fail='<div id=message><p style=color:RED>The user account is deactivated. Please contact admin for more details.</p></div>';
					$('#response').html(fail);

				}
				else
				{
					var fail='<div id=message><p style=color:RED>Wrong username and password..!! Please try again.</p></div>';
					$('#response').html(fail);
				}
				
				return false;
			}
			});

});
});