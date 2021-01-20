$(document).ready(function(){
	
	$('#responseeventview').hide();
	var base_url = window.location.origin;	
	
	$('#eventformdisplay').hide();
	$("#customFile").prop('disabled', true);
	$('#eventdate').hide();
$("#dateneeded").change(function() {
	if($('#dateneeded').prop("checked") == true)
	$('#eventdate').show();
	else
$('#eventdate').hide();
	
 });
 $('#resetbtnevent').click(function(){
	 $('#eventtype').val(0);
	 $('#eventformdisplay').hide();
 });
 $("#eventtype").change(function() {
	var eventval = $('#eventtype').val();
	if(eventval==0)
	{
		$('#eventformdisplay').hide();
	}
	else
	{
		$('#eventformdisplay').show();
		if(eventval==1 || eventval==2){
		$("#customFile").prop('disabled', true);
		$("#eventinformation").prop('required',true);
			if(eventval==1){
				$('#dateneededdiv').hide();
				$("#datepicker").prop('required',true);
				$('#eventdate').show();
			}
			else{
				$("#datepicker").prop('required',false);
				$('#dateneededdiv').show();
				$('#eventdate').hide();
			}
		}
		else if(eventval==3)
		{
			$("#customFile").prop('disabled', false);
			$('#dateneededdiv').hide();
			$('#eventdate').show();
			$("#eventinformation").prop('required',true);
			$("#datepicker").prop('required',true);
			$("#customFile").prop('required',true);
		}
		else{
			$("#customFile").prop('required',true);
			$("#eventinformation").prop('required',true);
			$('#dateneededdiv').show();	
			$('#eventdate').hide();
			$("#customFile").prop('disabled', false);
				if(eventval==5)
					$("#customFile").prop('required',false);
		}
	}
 });
$("#nav-profile-tab").click(function(){
			$("#nav-home-tab").removeClass('active');
				$("#nav-profile-tab").addClass('active');
				$('#nav-home').hide();
				$('#nav-profile').load(base_url+'/project1/index.php/user_manipulation_controller/event_list_coordinator');
				$('#nav-profile').show();
			});
			
			$("#nav-home-tab").click(function(){
			$("#nav-profile-tab").removeClass('active');
				$("#nav-home-tab").addClass('active');
				$('#nav-home').show();
				$('#nav-profile').hide();
			});
        
		
$("form#eventform").submit(function(e) {     
	var posturl= base_url+'/project1/index.php/user_manipulation_controller/get_event_details';
	
    e.preventDefault();    
    var formData = new FormData(this);

    $.ajax({
        url: posturl,
        type: 'POST',
        data: formData,
        success: function (data) {
			
           console.log(data);
			
				$('#responseeventview').show();
				var successresult='<div id="message"><p style="color:GREEN">The event has been added successfully!!</p></div>';
				$('#responseeventview').html(successresult);
			
		},
        cache: false,
        contentType: false,
        processData: false
    });
});
	/* var file_data = $('#customFile')[0].files[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
	var des = $('#eventdescription').val();
    form_data.append('eventdescription',des);

for (var value of form_data.values()) {
   console.log(value); 
}	
			console.log(form_data); */
			
					
});