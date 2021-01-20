<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
<title>Student Login
</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo base_url(); ?>js/adminview/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/admin sidebar/simple-sidebar.css" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/login form/loginpage.css"/>
		<link rel="stylesheet" href="<?php echo base_url(); ?>fonts/font-awesome/css/font-awesome.min.css">
	<script src="<?php echo base_url(); ?>js/adminview/vendor/jquery/jquery.min.js"></script> 
   <script src="<?php echo base_url(); ?>js/adminview/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>	

</head>

<body>

	<div class="d-flex " id="wrapper">
	<!-- Sidebar -->
		<div class="bg-light border-right " id="sidebar-wrapper">
			<div class="sidebar-heading">
			<br>
			<h3>CAS CREW</h3><hr>
			<h3>Welcome<BR>Student!</h3>
			<!-- 	<nav class="navbar navbar-expand-lg navbar-light bg-light ">
					<button class="navbar-toggler" id="amenu-toggle">
					<span class="navbar-toggler-icon"></span>
					</button>
				</nav> -->
			</div>
			<div class="list-group sidebar" id="myList" role="tablist">
				<a id="dashboard" href="#dash" class="list-group-item list-group-item-action bg-light" data-toggle="list" role="tab">Home</a>
				<a id="adduser" href="#editprofile" class="list-group-item list-group-item-action bg-light" data-toggle="list" role="tab">Edit Profile</a>
				<a id="queries" href="#" class="list-group-item list-group-item-action bg-light" data-toggle="list" role="tab">Support desk</a>
                    <br>
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
                            <div class="container-fluid" id="queryview" >
				<!-- /#Query for users-->
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
			{	$('#dash').load('<?php echo base_url(); ?>index.php/user_manipulation_controller/event_list_student');
				$("#dash").show();
				$("#listusers").hide();
				$("#editprofile").hide();
				$("#queryview").hide();
                                $("#dashboard").removeClass('bg-light');
				$("#adduser").addClass('bg-light');
				$("#overview").addClass('bg-light');
				$("#list").addClass('bg-light');
			});
			$("#adduser").click(function()
			{
				$("#editprofile").show();
				$("#editprofile").load('<?php echo base_url(); ?>index.php/user_manipulation_controller/edit_profile_view'); 
				$("#queryview").hide();
                                $("#dash").hide();	
				$("#listusers").hide();
				$("#adduser").removeClass('bg-light');
				$("#dashboard").addClass('bg-light');
				$("#overview").addClass('bg-light');
				$("#list").addClass('bg-light');
				$('#updateresponse').hide();
			});  
                        $("#queries").click(function()
			{
				$("#editprofile").hide();
				$("#dash").hide();	
				$("#queryview").show();
				$("#queryview").load('<?php echo base_url(); ?>index.php/user_manipulation_controller/userquery_view');
				$("#queries").removeClass('bg-light');
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