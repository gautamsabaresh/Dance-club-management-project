$(document).ready(function()
{ 
$("#divcollapse").hide();
		var queryid = $('#query_id_supportdesk').val();
		var querytakenby = $('#query_taken_by_supportdesk').val();
		var base_url = window.location.origin;
		if($('#query_status_supportdesk').val()==="closed")
		{
			
			$('#reopen_query').prop('disabled', false);
		}
		
		$("#reopen_query").click(function(){
				$("#divcollapse").toggle();
			});	
		$('#submit_response').prop('disabled', true);
		$('#submit_reopen_response').prop('disabled', true);
		$('#responsequery').on("keyup", function(){
		$('#submit_response').prop("disabled", true);
		$('#submit_reopen_response').prop('disabled', true);
		if($(this).val().length!=0) 
			{	
				$('#submit_reopen_response').prop('disabled', false);
				$('#submit_response').prop("disabled", false);
			}
		});	
	
		$('#submit_response').click(function(){
			var responsemessage = $('#responsequery').val();
			
			var posturl= base_url+'/project1/index.php/user_manipulation_controller/resolve_query'; 
            //var home_url = base_url+'/project1/index.php/user_manipulation_controller/userquery_view';
            var data={	
			'query_id':queryid,
            'query_taken_by':querytakenby,
            'responsemessage':responsemessage
			};
			
			$(document).ajaxStart(function()
			{
				$("#wait").css("display", "block");
				$("#submit_response").attr("disabled", true);
			});
  
			$(document).ajaxComplete(function()
			{
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
								
								console.log(returnData);
								window.location.reload();
                               
                }
                                
            }); 
            
           
        });
		
			$('#close_query').click(function(){
					var data = {	
					'query_id':queryid};
					var posturl= base_url+'/project1/index.php/user_manipulation_controller/close_query';
					$.ajax(
			{
                url: posturl,	
                type: 'post',               
                data: data,
				dataType: "json",
                success: function( returnData )
				{
							alert("Query Closed successfully");
							
							setTimeout(function(){		
							window.location.reload();
							},2000);
                }
                                
            });
			
			});
			
			$('#submit_reopen_query').click(function(){
				var new_query_message = $('#querymessage').val();
				var data = {	
					'query_id':queryid,
					'new_query_message':new_query_message};
					var posturl= base_url+'/project1/index.php/user_manipulation_controller/reopen_query';
					$.ajax(
				{
					url: posturl,	
					type: 'post',               
					data: data,
					dataType: "json",
					success: function( returnData )
					{
								console.log(returnData);
								alert("Query reopened successfully");		
								 setTimeout(function(){		
								window.location.reload();
								},2000); 
					}
                                
				}); 
			
			});
			
			$('.reopenqueryresponse').click(function(){
				var response_id = this.id;
			var responsemessage = $('#responsequery').val();
			
			var posturl= base_url+'/project1/index.php/user_manipulation_controller/response_reopened_query'; 
            //var home_url = base_url+'/project1/index.php/user_manipulation_controller/userquery_view';
            var data= {	
			'response_id':response_id,
			'query_id':queryid,
			'response_message':responsemessage            
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
								alert("Query response delivered successfully");		
								setTimeout(function(){
									 window.location.reload();
								},2000); 
					}
                                
				}); 
			
			});
});
		
