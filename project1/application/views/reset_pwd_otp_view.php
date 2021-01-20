<!DOCTYPE html>
	  <html>
	  <head>
	    <script src="<?php echo base_url(); ?>js/adminview/vendor/jquery/jquery.min.js"></script> 
		<script src="<?php echo base_url(); ?>js/reset_otp.js"></script>
	  <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	  </head>
	  <body>
<link href="<?php echo base_url(); ?>js/adminview/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/login form/loginpage.css"/>
		
			<div class="container">
			<br>
			<hr>
			<br>
				<h3 class="login-heading mb-4" style="color:#2DB0D0">Reset Password</h3>
				<p>	Enter the OTP sent to your registered email id.</p>
				<hr>
				<form id="checkotp_form" action="" method="POST">
                <div class="form-label-group">
                  <input type="text" id="otp" class="form-control" placeholder="Enter the OTP" name="otp" required autofocus>
                  <label for="otp">Enter the OTP</label>
                </div>
<br>

		<div class="row">
				<div class="col text-left">
				<button class="btn btn-md  btn-outline-primary btn-login text-uppercase font-weight-bold mb-2" id="submitbtn" name="submitbtn"type="button">Submit OTP</button>
				</div>
			</div>					
				<br>
				<br>
		<div id="response" class="text-center">
				
				</div>
<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<hr>
				</div>
				
				

	</form>
	</body>
	</html>
