<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
<title>Coordinator Home
</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo base_url(); ?>js/adminview/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/admin sidebar/simple-sidebar.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/login form/loginpage.css"/>
		<link rel="stylesheet" href="<?php echo base_url(); ?>fonts/font-awesome/css/font-awesome.min.css">
	   <script src="<?php echo base_url(); ?>js/adminview/vendor/jquery/jquery.min.js"></script> 
   <script src="<?php echo base_url(); ?>js/adminview/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>	
   <script src="<?php echo base_url(); ?>js/edituserprofile.js"></script>
   	<script src="<?php echo base_url(); ?>js/eventview.js"></script>
    <script src="<?php echo base_url(); ?>js/gijgo1.9.13/gijgo.min.js"></script>
	<link href="<?php echo base_url(); ?>css/gijgo1.9.13/gijgo.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/list_tableview.css">
</head>

<body>

	<div class="d-flex " id="wrapper">
	<!-- Sidebar -->
		<div class="bg-light border-right " id="sidebar-wrapper">
			<div class="sidebar-heading">
			<br>
			<h3>CAS CREW</h3><hr>
			<h3>Welcome<BR><?php if($role_id==2){echo "Student Incharge!";} else if($role_id==3) {echo "Faculty Incharge!";}  ?></h3>
			<!-- 	<nav class="navbar navbar-expand-lg navbar-light bg-light ">
					<button class="navbar-toggler" id="amenu-toggle">
					<span class="navbar-toggler-icon"></span>
					</button>
				</nav> -->
			</div>
			<div class="list-group sidebar" id="myList" role="tablist">
				<a id="dashboard" href="#dash" class="list-group-item list-group-item-action bg-light" data-toggle="list" role="tab">Home</a>
				<a id="adduser" href="#editprofile" class="list-group-item list-group-item-action bg-light" data-toggle="list" role="tab">Edit Profile</a>
				<a id="letter" href="#letterformat" class="list-group-item list-group-item-action bg-light" data-toggle="list" role="tab" hidden>Letter Format</a>
				<a id="list" href="#listusers" class="list-group-item list-group-item-action bg-light" data-toggle="list" role="tab">User queries</a>
				<a id="event" href="#eventview" class="list-group-item list-group-item-action bg-light" data-toggle="list" role="tab">Events</a>

				<a href="<?php echo base_url(); ?>index.php/login_controller/logout" class="btn btn-info btn-md">
					<i class="fa fa-sign-out" aria-hidden="true"></i>Log out
				</a>
			</div>
		</div>
    <!-- /#sidebar-wrapper -->
	
	  <!-- Page Content -->
		<div id="page-content-wrapper" >
			<nav class="navbar navbar-light">
				<button class="navbar-toggler bg-light"  id="menu-toggle">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</button> 
				</nav>
			<div class="container-fluid" >
				<div class="container-fluid" id="dash" > 
				
					<h1 class="mt-4">Dashboard</h1>
					<p>The Dashboard is displayed.</p> 
					
				</div>
				<div class="container-fluid" id="editprofile" >
				<!-- /#Edit user-->
				
				
				</div>  
				
				<div class="container-fluid" id="listusers" >
				<!-- /#List users-->
				</div>
					<div class="container-fluid" id="eventview" >
				<!-- /#Event-->
				</div>

			<div class="container-fluid" id="letterformat" >
				<!-- /#Letter Format-->
				</div>
				
			</div>
		</div>
		<!-- /#page-content-wrapper -->
	</div>	

 <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->

   <script>
		$(document).ready(function()
		{	
			$("input#firstname").val('<?php echo $fname ?>');
			$("input#lastname").val('<?php echo $lname ?>');
			$("input#email").val('<?php echo $email ?>');
			$("#editprofile").hide();
			$("#dashboard").removeClass('bg-light');	
			$("#dashboard").addClass('active');
			$('#dash').load('<?php echo base_url(); ?>index.php/user_manipulation_controller/event_list_student');
			$("#dashboard").on('click', function()
			{
				$("#eventview").hide();
				$("#dash").show();
				$("#listusers").hide();
				$("#editprofile").hide();
				$("#dashboard").removeClass('bg-light');
				$("#adduser").addClass('bg-light');
				$("#overview").addClass('bg-light');
				$("#list").addClass('bg-light');
			});
			$("#adduser").click(function()
			{
				$("#eventview").hide();
				$("#editprofile").show();
				$("#editprofile").load('<?php echo base_url(); ?>index.php/user_manipulation_controller/edit_profile_view'); 
				$("#dash").hide();	
				$("#listusers").hide();
				$("#adduser").removeClass('bg-light');
				$("#dashboard").addClass('bg-light');
				$("#overview").addClass('bg-light');
				$("#list").addClass('bg-light');
				$('#updateresponse').hide();
			});  
			$("#list").click(function()
			{
				$("#editprofile").hide();
				$("#dash").hide();	
				$("#eventview").hide();
				$("#listusers").show();
				$("#listusers").load('<?php echo base_url(); ?>index.php/user_manipulation_controller/user_queries_coordinator_view ');
				$("#list").removeClass('bg-light');
				$("#adduser").addClass('bg-light');
				$("#dashboard").addClass('bg-light');
			});
			
			$("#event").click(function()
			{$("#eventview").show();
				$("#editprofile").hide();
				$("#dash").hide();	
				$("#listusers").hide();
				$("#eventview").load('<?php echo base_url(); ?>index.php/user_manipulation_controller/add_event_view');
				$("#event").removeClass('bg-light');
				$("#adduser").addClass('bg-light');
				$("#dashboard").addClass('bg-light');
				$("#list").addClass('bg-light');
			});
			
			$("#letter").click(function()
			{	
				$('#letterformat').show();
				$("#editprofile").hide();
				$("#dash").hide();	
				$("#listusers").hide();
				$("#eventview").hide();
				$('#letterformat').load('<?php echo base_url(); ?>index.php/user_manipulation_controller/letterformatview');
				$('#letter').removeClass('bg-light');
				$("#event").addClass('bg-light');
				$("#adduser").addClass('bg-light');
				$("#dashboard").addClass('bg-light');
				$("#list").addClass('bg-light');	
			});
			$("#divexpand").click(function(){
				$("#divcollapse").slideToggle('slow');
			});
			$("#menu-toggle").click(function(e)
			{
				e.preventDefault();
				$("#wrapper").toggleClass("toggled");
			}); 
			$('#resetbtn').click(function(){
				$("input#firstname").val('<?php echo $fname ?>');
				$("input#lastname").val('<?php echo $lname ?>');
				$("input#email").val('<?php echo $email ?>');
			
			});
		
		
		});
	</script>
   
</body>
</html>