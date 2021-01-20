<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
	<script src="<?php echo base_url(); ?>js/adminview/vendor/jquery/jquery.min.js"></script> 
  <link href="<?php echo base_url(); ?>js/adminview/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<script src="<?php echo base_url(); ?>js/gijgo1.9.13/gijgo.min.js"></script>
	<link href="<?php echo base_url(); ?>css/gijgo1.9.13/gijgo.min.css" rel="stylesheet">
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/eventview.js"></script>

  
    </head>
    <body>
	<style>

.project-tab {
    padding: 5%;
    margin-top: -5%;
}
.project-tab #tabs{
    background: #007b5e;
    color: #eee;
}
.project-tab #tabs h6.section-title{
    color: #eee;
}
.project-tab #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #0062cc;
    background-color: transparent;
    border-color: transparent transparent #f3f3f3;
    border-bottom: 3px solid #4d81db!important;
    font-size: 16px;
    font-weight: bold;
	
}
.project-tab .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: #0062cc;
    font-size: 16px;
    font-weight: 600;
}
.project-tab .nav-link:hover {
    border: groove;
}
.project-tab thead{
    background: #f3f3f3;
    color: #333;
}
.project-tab a{
    text-decoration: none;
    color: #333;
    font-weight: 600;

.project-tab tr:hover{
	border: groove;
	cursor: pointer;
}
   
}
</style>
       	
	<link rel="stylesheet" href="<?php echo base_url(); ?>fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/login form/loginpage.css">
        <link href="<?php echo base_url(); ?>css/admin sidebar/simple-sidebar.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/list_tableview.css">
		<br>
<section id="tabs" class="project-tab">
         <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">New Event</a>
                                <a class="nav-item nav-link " id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Event List</a>
							</div>
                        </nav>
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
			<br>
                <h3>New Event</h3>
                <br>
		<p>You can add information about any event to the students for their active participation.</p>
		<hr>
		<form id="eventform" method="post" enctype="multipart/form-data">
                     
                        <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                            <label class="input-group-text" for="eventtype">Event type:</label>
                                    </div>
                                    <select class="custom-select" name="eventtype" id="eventtype" required>
                                            <option selected value="">Choose...</option>
                                            <option id="meeting" value="1">Meeting</option>
                                            <option id="practsess" value="2">Practice session</option>
											<option id="competition" value="3">Competition</option>
											<option id="circular" value="4">Official Circular</option>
											<option id="otherevent" value="5">Other</option>
									</select>
                        </div>
		<div id="eventformdisplay">				
                        <div>
                            <label for="eventdescription">Event Information:</label>
                            <textarea class="form-control" rows="5"  name="eventinformation" id="eventinformation"></textarea>
                    </div>   
					<div class="row">
        <div class='col-sm-6'>
		<div class="checkbox" id="dateneededdiv" >
		<label><input type="checkbox" id="dateneeded">Date needed?</label>
		</div>
            <div class="form-group" id="eventdate">
                  <label class="input-group-date" for="datetimepicker2">Event Date:</label>
                 <input id="datepicker" name="datepicker" width="276" />
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4',
			format: 'dd-mm-yyyy',
			 minDate: new Date()
        });
    </script>  
            </div>
			<p>Event attachments:</p> 			 
			<input type="file" name="files[]" class="lg"  id="customFile" multiple>
        </div>
	</div>
                    <br>
                    <button type="submit" class="btn btn-md  btn-outline-primary btn-login text-uppercase font-weight-bold mb-2" id="submitevent" >Submit</button>
                    <button type="reset" class="btn btn-md  btn-outline-primary btn-login text-uppercase font-weight-bold mb-2" id="resetbtnevent">Reset</button>
                 </form>
                <div id="responseeventview">
                  
                </div>    
                 <div id="wait" style="display:none;width:100px;height:100px;border:0px ;position:absolute;top:80%;left:45%;padding:4px;">
						<img src='https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif' width="100" height=auto />
						<br>
					</div>
					</div>
			</div>
			
			 <div class="tab-pane fade show" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
				 <br>
				
			
			 </div>
</div>
</div>
</div>
</div>
</section>

<script>
$(document).ready(function(){
$("#nav-profile-tab").click(function(){
			$("#nav-home-tab").removeClass('active');
				$("#nav-profile-tab").addClass('active');
				$('#nav-home').hide();
				$('#nav-profile').load('<?php echo base_url(); ?>index.php/user_manipulation_controller/event_list_coordinator');
				$('#nav-profile').show();
			});
			});
			
	
</script>


</body>
</html>