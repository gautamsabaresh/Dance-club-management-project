<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
<title>Admin Login
</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo base_url(); ?>js/adminview/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/admin sidebar/simple-sidebar.css" rel="stylesheet">
<link rel="stylesheet" href="<?php echo base_url(); ?>fonts/font-awesome/css/font-awesome.min.css">
	
</head>

<body>
	<div class="d-flex " id="wrapper">
	<!-- Sidebar -->
		<div class="bg-light border-right " id="sidebar-wrapper">
			<div class="sidebar-heading">
			<br>
			<h3>CAS CREW</h3><hr>
			<h3>Welcome Admin!</h3><br>
			<!-- 	<nav class="navbar navbar-expand-lg navbar-light bg-light ">
					<button class="navbar-toggler" id="amenu-toggle">
					<span class="navbar-toggler-icon"></span>
					</button>
				</nav> -->
			</div>
			<div class="list-group" id="myList" role="tablist">
				<a id="dashboard" href="#dash" class="list-group-item list-group-item-action bg-light" data-toggle="list" role="tab">Dashboard</a>
				<a id="adduser" href="#au" class="list-group-item list-group-item-action bg-light" data-toggle="list" role="tab">Add user</a>
				<a id="list" href="#listusers" class="list-group-item list-group-item-action bg-light" data-toggle="list" role="tab">Manage users</a>
				<a id="events" href="#eventslist" class="list-group-item list-group-item-action bg-light" data-toggle="list" role="tab">Events</a>
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
				<br>
					<h1 class="mt-4">Dashboard:</h1>
					<br>
					 <div class="row" style="margin-top:1.5rem;">
      <div class="col-md-3">
         <div class="card mb-4">
            <div class="social-card-header align-middle text-center bg-facebook">
               <image src="<?php echo base_url();?>images/number_of_users.jpg" style="margin-top:0.5rem;"></image>
            </div>
            <div class="card-body text-center">
               <div class="row">
                  <div class="col">
                     <span class="text-muted">Number of users:</span>
                     <div class="font-weight-bold"><?php echo $res->num_users;?><br>
					<sub>(Including Admin)</sub></div>
                  </div>
                 
               </div>
            </div>
         </div>
      </div>
	   <div class="col-md-3">
         <div class="card mb-4">
            <div class=" align-middle text-center ">
               <image src="<?php echo base_url();?>images/num_coordinators.jpg" style="margin-top:0.5rem;"></image>
            </div>
            <div class="card-body text-center">
               <div class="row">
                  <div class="col">
                     <span class="text-muted">Number of Student Coordinators:</span>
                     <div class="font-weight-bold"><?php echo $num_stu_coordinators->num_users;?><br>
					</div>
                  </div>
                 
               </div>
            </div>
         </div>
      </div>
	   <div class="col-md-3">
         <div class="card mb-4">
            <div class=" align-middle text-center ">
               <image src="<?php echo base_url();?>images/num_staff_coordinator.jpg" style="margin-top:0.5rem;"  ></image>
            </div>
            <div class="card-body text-center">
               <div class="row">
                  <div class="col" >
                     <span class="text-muted">Number of Staff Coordinators:</span>
                     <div class="font-weight-bold"><?php echo $num_staff_coordinators->num_users;?><br>
					</div>
                  </div>
                 
               </div>
            </div>
         </div>
      </div>
	  
	    <div class="col-md-3">
         <div class="card mb-4">
            <div class=" align-middle text-center ">
               <image src="<?php echo base_url();?>images/num_students.png" style="width:15rem;padding-top:2rem;margin-top:0.5rem;"></image>
            </div>
            <div class="card-body text-center">
               <div class="row">
                  <div class="col" style="padding-top:2rem;">
                     <span class="text-muted">Number of Active students:</span>
                     <div class="font-weight-bold"><?php echo $num_students->num_users;?><br>
					 <sub>(Including student coordinators)</sub>
					</div>
                  </div>
                 
               </div>
            </div>
         </div>
      </div>
					</div>
				</div>
				
				<div class="container-fluid" id="au" >
				<!-- /#Add user-->
				</div>
				
				<div class="container-fluid" id="listusers" >
				<!-- /#List users-->
				</div>
				<div class="container-fluid" id="eventslist">
				</div>
			</div>
		</div>
			<!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
   <script src="<?php echo base_url(); ?>js/adminview/vendor/jquery/jquery.min.js"></script> 
   <script src="<?php echo base_url(); ?>js/adminview/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
 

	<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"> </script>
	<script	src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
	

  <!-- Menu Toggle Script -->  
	<script>
		$(document).ready(function()
		{	
			$("#dashboard").removeClass('bg-light');	
			$("#dashboard").addClass('active');
			$("#dashboard").on('click', function()
			{
				$("#dash").show();
				$("#listusers").hide();
				$("#au").hide();
				$("#eventslist").hide();
				$("#dashboard").removeClass('bg-light');
				$("#adduser").addClass('bg-light');
				$("#overview").addClass('bg-light');
				$("#list").addClass('bg-light');
			});
			$("#adduser").click(function()
			{
				$("#au").show();
				$("#au").load('register'); 
				$("#dash").hide();	
				$("#listusers").hide();
				$("#eventslist").hide();
				$("#adduser").removeClass('bg-light');
				$("#dashboard").addClass('bg-light');
				$("#overview").addClass('bg-light');
				$("#list").addClass('bg-light');
			});  
			$("#list").click(function()
			{
				$("#au").hide();
				$("#dash").hide();
$("#eventslist").hide();				
				$("#listusers").show();
				$("#listusers").load('<?php echo base_url(); ?>index.php/admin_controller/list_home');
				$("#list").removeClass('bg-light');
				$("#adduser").addClass('bg-light');
				$("#dashboard").addClass('bg-light');
			});
			$("#events").click(function()
			{
				$("#au").hide();
				$("#dash").hide();	
				$("#listusers").hide();
				$("#eventslist").show();
				$("#eventslist").load('<?php echo base_url(); ?>index.php/user_manipulation_controller/event_list_coordinator');
				$("#events").removeClass('bg-light');
				$("#adduser").addClass('bg-light');
				$("#dashboard").addClass('bg-light');
				$("#list").addClass('bg-light');
			});
			
			$("#menu-toggle").click(function(e)
			{
				e.preventDefault();
				$("#wrapper").toggleClass("toggled");
			}); 
			
		});
	</script>
</body>
</html>