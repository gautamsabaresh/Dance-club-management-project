
<!DOCTYPE html> 
<html>
<head>
	
	
	<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/adduserform.js"></script> 
</head>
<body>
	<link href="<?php echo base_url(); ?>js/adminview/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/login form/loginpage.css"/>
	<link href="<?php echo base_url(); ?>css/admin sidebar/simple-sidebar.css" rel="stylesheet">

<div id='message' style="display:none">

</div>

<div class="container-fluid" id="response">  
	<div class="container-fluid">
		<br>
		<p>Please fill in this form to add an user to the dance club.</p>
		<hr>
		<form id="newuser">
			<div class="form-label-group">
				<input type="text" maxlength="32" class="form-control" placeholder="Enter First Name" id="fname" name="fname"  required>
				<label for="fname">Enter First Name</label>
			</div>
	
			<div class="form-label-group">
				<input type="text" name="lname" placeholder="Enter Second Name" class="form-control" id="lname" required>
				<label for="lname">Enter Last Name</label>
			</div>

			<div class="form-label-group">
				<input type="email" placeholder="Enter Email" class="form-control" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
				<label for="email">Enter Email</label>
			</div>
	
			<div class="form-label-group">
				<input type="text" placeholder="Enter User id" class="form-control" id="uname" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" name="uname" required>
				<label for="uname">Enter User id</label>
			</div>
			<br>
	
			<div class="input-group mb-3">
				<div class="input-group-prepend">
					<label class="input-group-text" for="userrole">User Role:</label>
				</div>
				<select class="custom-select" id="userrole" required>
					<option selected value="">Choose...</option>
					<option id="student" value="4">Student</option>
					<option id="studentco" value="2">Student Coordinator</option>
					<option id="staffco" value="3">Staff Coordinator</option>
				</select>
			</div>
			
			<br>
			<br>
			<button type="button" class="btn btn-md  btn-outline-primary btn-login text-uppercase font-weight-bold mb-2" id="submitbtn" >Add user</button>
			<button type="reset" class="btn btn-md  btn-outline-primary btn-login text-uppercase font-weight-bold mb-2">Clear</button>

			<br>
			<hr>
			<br>
		</form>
	</div>
</div>
<div id="wait" style="display:none;width:100px;height:100px;border:0px ;position:absolute;top:80%;left:45%;padding:4px;">
	<img src='https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif' width="100" height=auto />
	<br>
</div>
</body>
</html>