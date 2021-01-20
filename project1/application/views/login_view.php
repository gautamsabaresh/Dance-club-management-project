<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form</title>
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> 
        <!-- Custom styles for this template -->
        <link href="<?php echo base_url(); ?>css/login form/style.css" rel="stylesheet">
		 <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
    </head>
    <body>
	 <script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>js/loginform.js"></script>
        <div class="wrapper">
            <div class="container">
                <h1>Sign In</h1>
                <form class="form">
                    <input type="text" id="uname" name="uname" placeholder="Username" required>
                    <input type="password" id="inputPassword" name="psw" placeholder="Password" required>
                    <button type="button" id="submitbtn" name="submitbtn" >Login</button><br>
					<a href="<?php echo base_url(); ?>index.php/login_controller/frgt_pwd_view"><small>Forget password?</small></a>
                </form>
            </div><br>
<div id="response" class="text-center">
				
				</div>
            <ul class="bg-bubbles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
<!-- 
        --> 

        <script>
            $("#login-button").click(function (event) {
                event.preventDefault();

                $('form').fadeOut(500);
                $('.wrapper').addClass('form-success');
            });
        </script>
    </body>
</html>