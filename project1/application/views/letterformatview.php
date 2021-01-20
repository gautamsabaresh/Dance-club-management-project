<!DOCTYPE html> 
<html>
<head>
	
	
	<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/letterformat.js"></script>
	
</head>
<body>
	<link href="<?php echo base_url(); ?>js/adminview/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/login form/loginpage.css"/>
	<link href="<?php echo base_url(); ?>css/admin sidebar/simple-sidebar.css" rel="stylesheet">

<div id='message' style="display:none">

</div>

	<div class="container-fluid" >
		<br>
		<p>Please fill in this form to get the desired letter.</p>
		<hr>
<div style="margin-left:1.5rem;">
		<form id="letterformat">
		<p>From</p>

			<div class="form-group row" style="margin-top:-1rem;">

			 <div class="col-sm-8">
			
					<textarea type="text" rows="4" class="form-control" id="fromdata" name="fromdata"  style="alignment:left;"required></textarea>
			</div>

</div>
<p>To</p>
<div class="form-group row" style="margin-top:-1rem;">

			<div class="col-sm-8">
			<textarea type="text" rows="4" class="form-control" id="todata" name="todata"  style="alignment:left;"required></textarea>
			
			</div>
</div>
  
<div class="form-group row" style="margin-top:0rem;">
	<div class="col-xs-3" style="margin-left:1rem;">
		<p>Respected </p>
	</div>
	<div class="col-xs-3">
		<select style="margin-left:1rem;" id="salute" required>
		<option selected value="" >Choose...</option>
							<option id="sir" value="Sir">Sir</option>
							<option id="mam" value="Mam">Mam</option> 
		</select>,
	</div>
</div>
<div class="form-group row" style="margin-top:0rem;">
	<div class="col-xs-3" style="margin-left:1rem;">
		<p>Subject: </p>
	</div>
	<div class="col-sm-6">
		<input type="text" id="lettersubject" class="form-control" style="margin-top:-0.3rem;" required>
	</div>
</div>
<div class="form-group row" style="margin-top:0rem;">
	<div class="col-xs-3" style="margin-left:1rem;">
		<p>Content: </p>
	</div>
</div>
<div class="form-group row" style="margin-top:-1rem;">
	<div class="col-sm-8">
		<textarea rows="6" id="lettercontent" class="form-control" style="margin-top:-0.5rem;" required></textarea>
	</div>
</div>
<div class="form-group row float-right" style="margin-top:-1rem;padding-right:5rem;">
<div >
	<p style="margin-right:5rem;">Signature:</p>
</div>
</div>
<br>
<div class="form-group row float-right" style="margin-right:-8rem;">
		<textarea rows="3" id="signature" class="form-control" style="margin-top:-0.5rem;" required></textarea>
	</div>
<br>
<br> 
<button type="button" class="btn btn-primary"id="export">Export</button>

</div>
</div>
</div>
<script>


</script>
</body>
</html>