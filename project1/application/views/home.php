<!DOCTYPE html>
<html>
<head>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
<title>Faculty Login
</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="<?php echo base_url(); ?>js/adminview/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/admin sidebar/simple-sidebar.css" rel="stylesheet">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/login form/loginpage.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
</head>

<body>

	<div class="d-flex " id="wrapper">
	<?php
				$user = $this->session->userdata('user');
				extract($user);
			?>
	<!-- Sidebar -->
		<div class="bg-light border-right " id="sidebar-wrapper">
			<div class="sidebar-heading">
			<br>
			<h3>CAS CREW</h3><hr>
			<h3>Welcome<br>Faculty incharge!</h3><br>
			<!-- 	<nav class="navbar navbar-expand-lg navbar-light bg-light ">
					<button class="navbar-toggler" id="amenu-toggle">
					<span class="navbar-toggler-icon"></span>
					</button>
				</nav> -->
			</div>
			<div class="list-group sidebar" id="myList" role="tablist">
				<a id="dashboard" href="#dash" class="list-group-item list-group-item-action bg-light" data-toggle="list" role="tab">Dashboard</a>
				<a id="adduser" href="#au" class="list-group-item list-group-item-action bg-light" data-toggle="list" role="tab">Edit Profile</a>
				<a id="list" href="#listusers" class="list-group-item list-group-item-action bg-light" data-toggle="list" role="tab">List of users</a>
				<a id="events" href="#" class="list-group-item list-group-item-action bg-light" data-toggle="list" role="tab">Events</a>
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
					<?php echo $userid ?>
					<h1 class="mt-4">Dashboard</h1>
					<p>The Dashboard is displayed.</p> 
					
				</div>
				<div class="container-fluid" id="au" >
				<!-- /#Add user-->
				<br>
				<p>Please fill in this form to edit your profile..</p>
				<hr>
					 <form id="edituser">
						<div class="form-label-group">
							<input type="text" maxlength="32" class="form-control" placeholder="Enter First Name" id="firstname" name="fname" value="<?php echo $fname ?>"  required>
							<label for="firstname">Enter First Name</label>
						</div>
	
						<div class="form-label-group">
							<input type="text" name="lname" placeholder="Enter Second Name" class="form-control" id="lastname" value="<?php echo $lname ?>" required>
							<label for="lastname">Enter Last Name</label>
						</div>

						<div class="form-label-group">
							<input type="email" placeholder="Enter Email" class="form-control" id="emailid" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" value="<?php echo $email ?>" required>
							<label for="emailid">Enter Email</label>
						</div>
	
						<div class="form-label-group">
							<input type="text" placeholder="Enter User id" class="form-control" id="userid" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" name="userid" value="<?php echo $userid ?>"required>
							<label for="userid">Enter User id</label>
						</div>
						
						<button type="button" class="btn btn-md  btn-outline-primary btn-login text-uppercase font-weight-bold mb-2" id="updatebtn" >Update</button>
						<button type="reset" class="btn btn-md  btn-outline-primary btn-login text-uppercase font-weight-bold mb-2">Clear</button>
							
							<div id="updateresponse">
							<p style="color:GREEN; font-size:1.5rem;">Profile updated successfully! </p>
						</div>
					</form>
					<hr>
					<div>
					<button type="button" id="divexpand" class="btn btn-md  btn-outline-primary">Change Password</button>
						<div id="divcollapse" style="display:none">
							<form id="updatenewpassword" action="" method="POST">
							<hr>
							<br>
							<p>***The password must be minimum of six characters and must contain atleast a lowercase chararcter, an uppercase character and a number. </p>
							<div class="form-label-group">
								  <input type="password" id="currentpwd" class="form-control" placeholder="Enter Current password" name="currentpwd" required autofocus>
								  <label for="currentpwd">Enter current password</label>
								</div>
							<br>
								<div class="form-label-group">
								  <input type="password" id="newpwd" class="form-control" placeholder="Enter new password" name="newpwd" required autofocus>
								  <label for="newpwd">Enter new password</label>
								</div>
							<br>
								<div class="form-label-group">
								  <input type="password" id="repnewpwd" class="form-control" placeholder="Confirm new password" name="repnewpwd" required autofocus>
								  <label for="repnewpwd">Confirm new password</label>
								</div>
								<br>
									<button type="button" class="btn btn-md  btn-outline-primary btn-login text-uppercase font-weight-bold mb-2" id="updatebtn" >Update Password</button>
						<button type="reset" class="btn btn-md  btn-outline-primary btn-login text-uppercase font-weight-bold mb-2">Clear</button>
						</div>
					</div>

					
				</div>  
				
				
				
				<div class="container-fluid" id="listusers" >
				<!-- /#List users-->
				</div>
				
			</div>
		</div>
		<!-- /#page-content-wrapper -->
	</div>	

 <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->
   <script src="<?php echo base_url(); ?>js/adminview/vendor/jquery/jquery.min.js"></script> 
   <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
   <script src="<?php echo base_url(); ?>js/adminview/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>	
   

   <script>
		$(document).ready(function()
		{	
			$("#au").hide();
			$("#dashboard").removeClass('bg-light');	
			$("#dashboard").addClass('active');
			$("#dashboard").on('click', function()
			{
				$("#dash").show();
				$("#listusers").hide();
				$("#au").hide();
				$("#dashboard").removeClass('bg-light');
				$("#adduser").addClass('bg-light');
				$("#overview").addClass('bg-light');
				$("#list").addClass('bg-light');
			});
			$("#adduser").click(function()
			{
				$("#au").show();
				//$("#au").load('register'); 
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
				$("#au").hide();
				$("#dash").hide();	
				$("#listusers").show();
				//$("#listusers").load('<?php echo base_url(); ?>index.php/admin_controller/list_home');
				$("#list").removeClass('bg-light');
				$("#adduser").addClass('bg-light');
				$("#dashboard").addClass('bg-light');
			});
			$("#divexpand").click(function(){
				$("#divcollapse").slideToggle('slow');
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