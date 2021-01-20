<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
	<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>js/userquery.js"></script>
    </head>
    <body>
	<style>

.project-tab {
    padding: 5%;
    margin-top: -5%;
}
.project-tab #tabs{
    background: #007b5e;
    color: #eee;
}
.project-tab #tabs h6.section-title{
    color: #eee;
}
.project-tab #tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #0062cc;
    background-color: transparent;
    border-color: transparent transparent #f3f3f3;
    border-bottom: 3px solid #4d81db!important;
    font-size: 16px;
    font-weight: bold;
	
}
.project-tab .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: #0062cc;
    font-size: 16px;
    font-weight: 600;
}
.project-tab .nav-link:hover {
    border: groove;
}
.project-tab thead{
    background: #f3f3f3;
    color: #333;
}
.project-tab a{
    text-decoration: none;
    color: #333;
    font-weight: 600;

.project-tab tr:hover{
	border: groove;
	cursor: pointer;
}
   
}
</style>
        <link href="<?php echo base_url(); ?>js/adminview/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/login form/loginpage.css"/>
        <link href="<?php echo base_url(); ?>css/admin sidebar/simple-sidebar.css" rel="stylesheet">
		 <br>
		<table class="table table-bordered table-hover " >
				<thead>
					<tr>
					  
						<th style="text-align:center; width:4rem;">Query Number</th>
						<th style="text-align:center; width:12rem;">Created On</th>
						<th style="text-align:center;">Query</th>
        				<th style="text-align:center;">Status</th>
						
					</tr>
				</thead>
				<tbody class="container-items" >
				<?php foreach($data as $user){?>
    				
					<tr>
					
						<td style="width:3rem; text-align:center;vertical-align: middle;" >
						<a href="<?php echo base_url(); ?>index.php/user_manipulation_controller/query_detailed_view?queryid=<?php echo $user->query_id;?>" style="color: BLUE; ">
						<?php echo $user->query_id;?>
						</a>
						</td>
						
						<td style="text-align:center;vertical-align: middle;">
						<?php $time = strtotime($user->query_post_date);
								$myFormatForView = date("m/d/Y g:i A", $time);
								echo $myFormatForView;?>
						</td>
						<td style="text-align:center;vertical-align: middle;">
						  <?php echo $user->query_message;?>
						</td>
                        <td style="width:90px;text-align:center;vertical-align: middle;">
                           <?php echo $user->query_status;?>
							
                        </td>
						
					</tr>
					<?php }?> 
				</tbody>
			</table>
			
		</body>
</html>