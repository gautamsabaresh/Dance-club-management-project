<!DOCTYPE html>
	  <html>
<head>

        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> 
        <!-- Custom styles for this template -->
        <link href="<?php echo base_url(); ?>css/login form/style.css" rel="stylesheet">
		 <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
</head>
	  <body>
	
  <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

  <script src="<?php echo base_url(); ?>js/frgtpwd.js"></script>
  

	<div class="wrapper">
			<div class="container">
			
			<hr>
			
				<h3 class="login-heading mb-4" style="color:BLACK">Trouble logging in?</h3>
				<p>	Enter your userid or email and we'll send you a link to get back into your account.
</p>
				<hr>
				
				<form id="login_form" class="form">
                <div class="form-label-group">
                  <input type="text" id="uname" placeholder="User name or email" name="uname" required autofocus>
                 <!-- <label for="uname">User name or email</label> -->
                </div>
<br>
<br> 
		<div class="row">
				<div class="col text-center">
				<button  id="submitbtn" name="submitbtn"type="button">Submit</button>
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

</div>

<div id="wait" style="display:none;width:100px;height:100px;border:0px ;position:absolute;top:50%;left:45%;padding:4px;"><img src='https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif' width="100" height=auto />
<br>
</div>

	</body>
	</html>