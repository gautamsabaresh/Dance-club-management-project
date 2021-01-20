<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	 <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />	
</head>
<body>
<link href="<?php echo base_url(); ?>js/adminview/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<div class="container">
<hr style="margin-top: 1rem;">
    <div class="row">
        <div class="col-sm-12">
             <h1 style="margin-top: 0.2rem; margin-left: 0.4rem;"><i class="fa fa-envelope" style="color: BLUE"aria-hidden="true"></i> User Queries!</h1>
        </div>
	</div>
	<hr style="margin-top: 1rem;">
	<?php if(sizeof($data)==0){
	echo "No queries recorded."; 
	}
	else
	{
		foreach ($data as $key) { ?>
	<div class="row border" style="width: 50rem;margin-left:2rem;">
		<div class="col-sm-4 col-md-6 card-body ">
            <h3>Query #<?php echo $key->query_id;?>:</h3>           
			<p><b>Posted by:</b> <?php echo $key->user_id;?>
			<br><b>Posted on:</b> <?php $time = strtotime($key->query_post_date);
								$myFormatForView = date("m/d/Y g:i A", $time);
										echo $myFormatForView;?><br>
			<b>Query message:</b><br> <?php echo $key->query_message;?>		 
		</div>
		<div class="col-sm-9 col-md-6" style="padding-top: 0.5rem;">
					<br><br>
					<p><b>Query Status:</b> <?php echo $key->query_status;?> </p>
					<?php if($key->query_status == "open" || ($key->query_status == "reopened" )|| ($key->query_status == "In process" && $key->query_resolved_by == $currentuser)){?>
					<a class="btn btn-outline-danger" href="<?php echo base_url(); ?>index.php/user_manipulation_controller/query_detailed_view?queryid=<?php echo $key->query_id;?>">  
					   Respond</a>
					<?php } else {
					?>	<a class="btn btn-outline-primary" href="<?php echo base_url(); ?>index.php/user_manipulation_controller/query_detailed_view?queryid=<?php echo $key->query_id;?>">  
							   View</a>
						<?php }?>
						<p class="card-text" hidden><small class="text-muted">Last updated 3 mins ago</small></p>
		</div>
	</div>
			<?php
				}
	}
			?>    
</div>
</body>
</html>