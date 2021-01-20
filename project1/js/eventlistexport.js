$(document).ready(function(){

$('#create_excel').click(function(){  

		var base_url = window.location.origin;
           var excel_data = $('#employee_table').html();  
			var posturl= base_url+'/project1/index.php/user_manipulation_controller/event_list_export?data='+excel_data;
           window.location = posturl;  
      });
});