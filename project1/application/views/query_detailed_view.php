<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="<?php echo base_url(); ?>js/adminview/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>js/queryresponse/response_query.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
	<nav class="navbar navbar-expand-sm navbar-light" style="background-color: #e3f2fd; min-height: 4rem;">
  <!-- Brand -->
  <a class="navbar-brand" style="padding-left:2rem;" href="#"><b>CAS CREW</b></a>

  <!-- Links -->
  <!--<ul class="navbar-nav ml-auto" >


    
    <li class="nav-item dropdown" >
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
       Menu
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/login_controller/home">Home</a>
        <a class="dropdown-item" href="#">Log Out</a>
      </div>
    </li>
  </ul> -->
</nav>
		<!-- /.container-fluid -->
<div class="container-fluid">
	<hr style="margin-top: 1rem;">
    <div class="row">
        <div class="col-sm-12">
             <h1 style="margin-top: 0.2rem; margin-left: 2rem;"><i class="fa fa-life-ring" style="color: RED"aria-hidden="true"></i> Support Center!</h1>
        </div>
	</div>
<hr style="margin-top: 1rem;">	
	
	<div class="container"  contenteditable="false">
			<div class="card card-default" >
                <div class="card-header" style="font-weight: bold;">Query Information</div>
                <div class="card-body"> 
					<div class="row">
					<div class="col-sm-3 col-md-6" style="padding-left:1.8rem; ">
					
					<?php foreach ($data as $key) { ?>
					<input type="hidden" value="<?php echo $key->query_id;?>" id="query_id_supportdesk">
					<input type="hidden" value="<?php echo $key->user_id;?>" id="user_id_supportdesk">
					<input type="hidden" value="<?php echo $key->query_to;?>" id="query_to_supportdesk">
					<input type="hidden" value="<?php echo $key->query_status;?>" id="query_status_supportdesk">
					<input type="hidden" value="<?php echo $query_taken_by;?>" id="query_taken_by_supportdesk">
					
					<p><b>Query number :</b> <?php echo $key->query_id;?></p>
					<p><b>User ID :</b> <?php echo $key->user_id;?></p>
					<p><b>Query To	:</b> <?php echo $role_name->rolename;?></p>
					<p><b>Posted on :</b> <?php $time = strtotime($key->query_post_date);
												$myFormatForView = date("d/m/Y g:i A", $time);
														echo $myFormatForView;?></p>
								
					</div>
					<div class="col-sm-12 col-md-6" >
					<p><b>Query message :</b> <?php echo $key->query_message;?></p>
					<?php if($key->query_resolve_date != NULL){?>
					<p><b>Responded on :</b> <?php $time = strtotime($key->query_resolve_date);
												$myFormatForView = date("d/m/Y g:i A", $time);
														echo $myFormatForView;?></p>
					<?php } ?>
					<p><b>Query Status :</b> <?php echo $key->query_status;?></p>
					<?php if(($role_id==2 || $role_id==3) && $key->query_status!="closed" ){?>
					<button type="button" class="btn btn-danger" id="close_query" <?php if($key->query_resolution==NULL || $key->query_resolved_by != $currentuser) { ?>disabled<?php } ?>>Close Query</button>
					<?php }
					else{}?>
					</div>
                </div>
            </div>
			</div>
		<div id="wait" style="display:none;width:100px;height:100px;border:0px ;position:absolute;top:80%;left:45%;padding:4px;">
																<img src='https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif' width="100" height=auto />
																<br>
																</div>
			<br>
        <div class="card card-default">
		
                <div class="card-header" style="font-weight: bold;" contenteditable="false">
					<div class="row">
						<div class="col-sm-3 col-md-6" >
						Correspondance
						</div>
						<div class="col-sm-9 col-md-6" >
							<?php if($role_id==4){ ?>
							<button type="button" class="btn btn-primary float-right" id="reopen_query" disabled="true">Reopen query</button>
						<?php 
						}
						else if($key->query_status == "open" ){ ?>
						<button type="button" class="btn btn-primary float-right" id="submit_response" >Reply to query</button>
						<?php }
					?>
						</div>
					</div>
				</div>
            <div class="card-body">
                <div class="row">
					<div class="col-sm-9 col-md-12">
						<div class="caption" style="padding-left:0.8rem; padding-top: 0.5rem;">
							<p><b>Response:</b></p>
							
							<p style="padding-left: 1rem;"><?php
															if($key->query_resolution==NULL && $key->query_status=="open" )
															{ 
																if($role_id==4)
																{
																echo "Response has not been given. Please await the response.";
																}
																else if(($role_id==2) || ($role_id==3))
																{
																?>
																<textarea class="form-control" id="responsequery" rows="5" style="width:60rem;"></textarea>
																
						
																<?php
																}
															}
														
															else
															{
													
															echo $key->query_resolution;
															$time = strtotime($key->query_resolve_date);
															$myFormatForView = date("d/m/Y g:i A", $time);
															?> <p style="text-align: right;"><sub><?php echo $myFormatForView; ?></sub></p>
															<hr>
																<?php if($key->query_status=="reopened" || $key->query_status=="closed" || $key->query_status=="In process")
																{
																	foreach($response as $reopenresponse)
																	{
																	?><p><b>Query:</b></p><?php
																	
																		
																		echo $reopenresponse->new_query_message;
																		$time = strtotime($reopenresponse->reopened_query_date);
																		$myFormatForView = date("d/m/Y g:i A", $time);
																		?> 
																		<p style="text-align: right;"><sub><?php echo $myFormatForView; ?></sub></p>
																		<hr>
																<?php	if((($role_id==2) || ($role_id==3)) && ($reopenresponse->response_message==NULL))
																		{
																			?>
																			Response:
																			<textarea class="form-control" id="responsequery" rows="5" style="width:60rem;"></textarea>
																			<button type="button" class="btn btn-primary float-left reopenqueryresponse" style="margin-top:1rem;" id="<?php echo $reopenresponse->response_id ?>" >Reply to query</button>
																			<?php
																		}
																			else if((($role_id==2) || ($role_id==3)) || $role_id==4 && $reopenresponse->response_message!=NULL)
																			{?>
																			<p><b>Response:</b></p>
																			<?php echo $reopenresponse->response_message;
																			$time = strtotime($reopenresponse->response_update_date);
																			$myFormatForView = date("d/m/Y g:i A", $time);
																			?> 
																		<p style="text-align: right;"><sub><?php echo $myFormatForView; ?></sub></p>
																		<hr>
																			<?php
																			
																			}
																	}
																}
																		
																		
															?>
																<div id="divcollapse" >
																	<form>
																		<div>
																			<label for="querymessage">Your query:</label>
																			<textarea class="form-control" rows="5"  id="querymessage"></textarea>
																		
																			<button type="button" style="margin-top:1rem;"class="btn btn-primary" id="submit_reopen_query">Submit query</button>
																		</div>
																	</form>
																</div>
																
																<?php
															
															
															}?> </p>
									
						<?php } ?>
						 </div>	
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>