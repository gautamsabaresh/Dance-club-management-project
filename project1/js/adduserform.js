$(document).ready(function(){
	
	$("#submitbtn").click(function() 
	{
      // validate and process form here  
		var userrole = $("#userrole").val();
		var fname = $("input#fname").val();
		var lname = $("input#lname").val();
		var uname = $("input#uname").val();
		var email = $("input#email").val();

		
  		if (fname == "") {
			alert("Please fill all the fields");
			$("input#fname").focus();
			return false;
		}
	    
  		if (lname == "") {
			alert("Please fill all the fields");
			$("input#lname").focus();
			return false;
		}
  		
  		if (email == "") {
			alert("Please fill all the fields");
			$("input#email").focus();
			return false;	
		}
  		
  		if (uname == "") {
			alert("Please fill all the fields");
			$("input#uname").focus();
			return false;
		}
	  
		if (userrole == "" ){
			alert("Please select the user role!");
			$("#userrole").focus();
			return false;
		}
		
		
	
		var data={ 'fname':fname,
				'lname': lname,
				'uname':uname,
				'userrole':userrole,
				'email':email,
				};
		
		var base_url = window.location.origin;
	  	var posturl= base_url+'/project1/index.php/login_controller/adduser';
	
		$(document).ajaxStart(function(){
			$("#wait").css("display", "block");
			$("#submitbtn").attr("disabled", true);
		});
  
		$(document).ajaxComplete(function(){
			$("#wait").css("display", "none");
		}); 
	 
		$.ajax(
			{
				url: posturl,
                type: 'post',               
                data: data,
                success: function( returnData )
				{
					console.log(returnData);
					 $('#response').hide();
                     $('#message').html(returnData);
					 $('#message').show();
						setTimeout(function(){	
							$("#newuser")[0].reset();
							$('#response').show();
							$('#message').hide();
						}, 5000);	
				},
				error: function( jqXhr, textStatus, errorThrown )
				{
					console.log( errorThrown );
				}
			}); 
	});
 
});




