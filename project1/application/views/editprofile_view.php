<!DOCTYPE html> 
<html>
<head>
  <meta charset="UTF-8">
        <title></title>
	<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	 <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />	
    <script src="<?php echo base_url(); ?>js/edituserprofile.js"></script>
    </head>
    <body>
        <link href="<?php echo base_url(); ?>js/adminview/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/login form/loginpage.css"/>
        <link href="<?php echo base_url(); ?>css/admin sidebar/simple-sidebar.css" rel="stylesheet">
	 
	<style type="text/css">
  
	.modal-confirm {		
		color: #636363;
		width: 400px;
	}
	.modal-confirm .modal-content {
		padding: 20px;
		border-radius: 5px;
		border: none;
        text-align: center;
		font-size: 14px;
	}
	.modal-confirm .modal-header {
		border-bottom: none;   
        position: relative;
	}
	.modal-confirm h4 {
		text-align: center;
		font-size: 25px;
		margin: 25px 0 20px;
	}
	.modal-confirm .close {
        position: absolute;
		top: -5px;
		right: -2px;
	}
	.modal-confirm .modal-body {
		color: #999;
	}

	
	.modal-confirm .icon-box {
		width: 80px;
		height: 80px;
		margin: 0 auto;
		border-radius: 50%;
		z-index: 9;
		text-align: center;
		border: 3px solid Green;
	}
	.modal-confirm .icon-box i {
		color: GREEN;
		font-size: 46px;
		display: inline-block;
		margin-top: 13px;
	}
  
</style>
<div class="container-fluid">
	<br>
				<p>Please fill in this form to edit your profile..</p>
				<hr>
					 <form id="edituser">
						<div class="form-label-group">
							<input type="text" maxlength="32" class="form-control" placeholder="Enter First Name" id="firstname" name="fname"  required>
							<label for="firstname">Enter First Name</label>
						</div>
	
						<div class="form-label-group">
							<input type="text" name="lname" placeholder="Enter Second Name" class="form-control" id="lastname"  required>
							<label for="lastname">Enter Last Name</label>
						</div>

						<div class="form-label-group">
							<input type="email" placeholder="Enter Email" class="form-control" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
							<label for="email">Enter Email</label>
						</div>
	
						<div class="form-label-group">
							<input type="text" placeholder="User id" class="form-control" id="userid" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" name="userid" value="<?php echo $userid ?>" disabled>
							<label for="userid">User id</label>
						</div>
						
						<button type="button" class="btn btn-md  btn-outline-primary btn-login text-uppercase font-weight-bold mb-2" id="updateprofilebtn" data-toggle="modal" data-target="#editsuccess_data_Modal">Update</button>
						<button type="button" class="btn btn-md  btn-outline-primary btn-login text-uppercase font-weight-bold mb-2" id="resetbtn">Reset</button>
						
						
							<div id="updateresponse" style='display:none'>
							<p style="color:GREEN; font-size:1.5rem;">Profile updated successfully! </p>
						</div>
					</form>
					<hr>
					<div>
					<button type="button" id="divexpand" class="btn btn-md  btn-outline-primary">Change Password</button>
						<div id="divcollapse" style="display:none">
							<form id="updatenewpassword" >
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
									<button type="button" class="btn btn-md  btn-outline-primary btn-login text-uppercase font-weight-bold mb-2" id="updatepasswordbtn" data-toggle="modal" >Update Password</button>
						<button type="reset" class="btn btn-md  btn-outline-primary btn-login text-uppercase font-weight-bold mb-2">Clear</button>
						</div>
					</div>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">				
			<div id="editsuccess_data_Modal" class="modal fade">
				<div class="modal-dialog modal-confirm">
					<div class="modal-content">
						<div class="modal-body">
						
							<div class="icon-box">
								<i class="material-icons">done_outline</i>
							</div>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						
							<h4 style="color:GREEN">Profile updated successfully!</h4>
						</div>
					</div>
				</div>
			</div> 
		<div id="editpasswordsuccess_data_Modal" class="modal fade">
				<div class="modal-dialog modal-confirm">
					<div class="modal-content">
						<div class="modal-body">
						
							<div class="icon-box">
								<i class="material-icons">done_outline</i>
							</div>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						
							<h4 style="color:GREEN">New Password updated successfully!</h4>
						</div>
					</div>
				</div>
			</div>
		<div id="editpasswordfail_data_Modal" class="modal fade">
				<div class="modal-dialog modal-confirm">
					<div class="modal-content">
						<div class="modal-body">
							<div class="icon-box" style="border:3px solid RED">
								<i class="material-icons" style="color:RED">&#xE5CD;</i>
							</div>	
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						
							<h5 style="color:RED">The password updation failed!! Please fill the correct password to reset the password!</h5>
						</div>
					</div>
				</div>
			</div>
</div>
<script>
		$(document).ready(function()
		{
			$("input#firstname").val('<?php echo $fname ?>');
			$("input#lastname").val('<?php echo $lname ?>');
			$("input#email").val('<?php echo $email ?>');
			
			$('#resetbtn').click(function(){
				$("input#firstname").val('<?php echo $fname ?>');
				$("input#lastname").val('<?php echo $lname ?>');
				$("input#email").val('<?php echo $email ?>');
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