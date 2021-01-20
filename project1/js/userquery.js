/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
        $('#responsequeryview').hide();
	var base_url = window.location.origin;
			
        $("#submitquery").click(function() 
	{   var userid = $("input#useridquery").val();
            var role_id = $("#userrolequery").val();
			var email=$('#emailquery').val();
		   var querymessage = $("#querymessage").val();
            if (role_id === ""){
                alert("Please fill all the fields");
			$("#userrolequery").focus();
			return false;   
            }
            
            if (querymessage === "") {
			alert("Please fill all the fields");
			$("#querymessage").focus();
			return false;
		}
             
            
            var posturl= base_url+'/project1/index.php/user_manipulation_controller/add_user_query';
            var home_url = base_url+'/project1/index.php/user_manipulation_controller/userquery_view';
            var data={	
			'userid':userid,
			'email':email,
            'role_id':role_id,
            'querymessage':querymessage
			};
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
				dataType: "json",
                success: function( returnData )
				{
								
                                var returnmsg="<p style='color: Green'>Your query no:"+returnData.query_id+" has been registered. Please allow us some time to address your query. </p>";
                                console.log(returnData);
                                $('#responsequeryview').html(returnmsg);
                                $('#responsequeryview').show();   
								setTimeout(function(){
									$("#queryview").load(home_url);
									},2000)
                }
                                
            });
            
           
        });
        
    });