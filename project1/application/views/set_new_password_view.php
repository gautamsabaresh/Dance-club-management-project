<!DOCTYPE html>
<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/set_new_pwd.js">></script>
</head>
<body>
	<link href="<?php echo base_url(); ?>js/adminview/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/login form/loginpage.css"/>
			<div class="container">
			<br>
			<hr>
			<br>
				<h3 class="login-heading mb-4" style="color:#2DB0D0">Set New Password</h3>
				<p>***The password must be minimum of six characters and must contain atleast a lowercase chararcter, an uppercase character and a number. </p>
				<hr>
				<form id="checkotp_form" action="" method="POST">
                <div class="form-label-group">
                  <input type="password" id="newpwd" class="form-control" placeholder="Enter new password" name="newpwd" required autofocus>
                  <label for="newpwd">Enter new password</label>
                </div>
<br>
				<div class="form-label-group">
                  <input type="password" id="repnewpwd" class="form-control" placeholder="Confirm new password" name="repnewpwd" required autofocus>
                  <label for="repnewpwd">Confirm new password</label>
                </div>
				<input type="hidden" id="userid" name="userid" value="<?php echo $userid;  ?>">
		<div class="row">
				<div class="col text-left">
				<button class="btn btn-md  btn-outline-primary btn-login text-uppercase font-weight-bold mb-2" id="submitbtn" name="submitbtn"type="button">Set new password</button>
				</div>
			</div>	
<br>
				<br>
<div id="response">
	</div>
				<br>
	
				<br>
				<br>
				<br>
				<hr>
				</div>
			</form>
			
</body>
</html>