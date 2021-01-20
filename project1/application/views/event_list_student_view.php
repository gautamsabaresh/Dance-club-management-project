<html>
<head>
	<meta charset="UTF-8">
	<title></title>
	<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	 <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />	
	<link rel="stylesheet" href="<?php echo base_url(); ?>fonts/font-awesome/css/font-awesome.min.css">
</head>
<body>
<link href="<?php echo base_url(); ?>js/adminview/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<div class="container">
<hr style="margin-top: 1rem;">
    <div class="row">
        <div class="col-sm-12">
             <h1 style="margin-top: 0.2rem; margin-left: 0.4rem;"> <image src="<?php echo base_url();?>images/event.png" style="width:5rem;"></image> Events!</h1>
        </div>
	</div>
	<hr style="margin-top: 1rem;">
	<?php if(sizeof($result)==0){
	echo "No Events recorded."; 
	}
	else
	{

	foreach($result as $user){ 
		?>		
	<div class="row border" style="width: 50rem;margin-left:2rem;">
	<div class="col-sm-4 col-md-1" style="background-color: lightblue;margin-left:0; ">
	<br><i class="fa fa-calendar" style="margin-left:0.5rem;"></i>
	<br><p style="margin-left:-0.3rem;">
	<?php  if($user->event_date !=	'0000-00-00'){
			$time = strtotime($user->event_date);
		$myFormatForView = date("d'M Y", $time);
				echo $myFormatForView;?>
		</p><br><p><?php $myFormatForView = date("D", $time);
				echo $myFormatForView;?></p>
	<?php	}
		
		?>
	</div>
		<div class="col-sm-4 col-md-6 card-body ">
         
		 <h3><b></b>   <?php echo $user->event_type;?></h3>           
			<p><b>Added by:</b>   <?php echo $user->event_added_by_userid;?>
			<br><b>Posted on:</b> <?php $time = strtotime($user->event_added_date);
								$myFormatForView = date("m/d/Y g:i A", $time);
									echo $myFormatForView;?>
			<br><b>Event date:</b> <?php  if($user->event_date !=	'0000-00-00'){
			$time = strtotime($user->event_date);
		$myFormatForView = date("d/m/Y", $time);
				echo $myFormatForView;
				}else{
					echo "Not mentioned!";
					}?>
			
		</div>
		<div class="col-sm-9 col-md-4" style="padding-top: 0.5rem;">
					<br><br>
					
					<b>Event Information:</b><br> <?php echo $user->eventinformation;?>
					<p><b>Event Attachments:</b> <?php
					$event_attachment_array = explode (",", $user->event_attachments_link);
						foreach($event_attachment_array as $eve_at)
						{
						?>
						
						<a href="<?php print_r($eve_at); ?>" target="_BLANK"><?php print_r(basename($eve_at));?></a> <br>
						<?php } ?> </p>
		</div>
	</div>
			<?php
				
		}
	}
			?>    
</div>
</body>
</html>