<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
	<script src="<?php echo base_url(); ?>js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>js/eventlistexport.js"></script>

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
			<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/list_tableview.css">
        <link href="<?php echo base_url(); ?>css/admin sidebar/simple-sidebar.css" rel="stylesheet">
		 <br>
		 <div class="filterable">
	<div class="table-responsive" id="employee_table">
		<table class="table table-bordered table-hover " >
				<thead>
				<button class="btn btn-primary btn-sm btn-filter float-right" ><i class="fa fa-filter"></i>Filter</button>
			  
				
					<tr class="filters">
					   <th><input style="text-align:center;font-weight: bold;width:4rem;" type="text" class="form-control" placeholder="Event ID" disabled></th>
                        <th><input style="text-align:center;font-weight: bold;width:5rem;"type="text" class="form-control" placeholder="Added by" disabled></th>
						<th><input style="text-align:center;font-weight: bold;"type="text" class="form-control" placeholder="Posted on" disabled></th>
                        <th><input style="text-align:center;font-weight: bold;"type="text" class="form-control" placeholder="Event Type" disabled></th>
						<th><input style="text-align:center;font-weight: bold;"type="text" class="form-control" placeholder="Event Information" disabled></th>
						<th><input style="text-align:center;font-weight: bold;"type="text" class="form-control" placeholder="Event date" disabled></th>
						<!--<th><input style="text-align:center;font-weight: bold;width:6rem;"type="text" class="form-control" placeholder="Participation" disabled></th> -->
						<th><input style="text-align:center;font-weight: bold;width:6rem;"type="text" class="form-control" placeholder="Attachments" disabled></th>
					<!-- 	<th style="text-align:center; width:4rem;">Event ID</th>
						<th style="text-align:center; width:12rem;">Event added by</th>
						<th style="text-align:center;">Event added on</th>
        				<th style="text-align:center;">Event Type</th>
						<th style="text-align:center;">Event Information</th>
						<th style="text-align:center;">Event date</th>
						<th style="text-align:center;">Event Participation</th>
						<th style="text-align:center;">Event Attachments</th>  -->
						
					</tr>
				</thead>
				 <tbody class="container-items" >
				<?php foreach($result as $user){?>
    				
					<tr>
					
						<td style="width:3rem; text-align:center;vertical-align: middle;" >
						
						<?php echo $user->event_id;?>
						</a>
						</td>
						<td style="text-align:center;vertical-align: middle;">
						  <?php echo $user->event_added_by_userid;?>
						</td>
						<td style="text-align:center;vertical-align: middle;">
						<?php $time = strtotime($user->event_added_date);
								$myFormatForView = date("d/m/Y g:i A", $time);
								echo $myFormatForView;?>
						</td>
						<td style="text-align:center;vertical-align: middle;">
						  <?php echo $user->event_type;?>
						</td>
						<td style="text-align:center;vertical-align: middle;">
						  <?php echo $user->eventinformation;?>
						</td>
						<td style="text-align:center;vertical-align: middle;">
						  <?php
						  
						  if($user->event_date !=	'0000-00-00'){
						  $eventdate = strtotime($user->event_date);
						  $myFormatForVieweventdate = date("d/m/Y", $eventdate);
								echo $myFormatForVieweventdate;
								}else{
								echo "Not mentioned!";
								}?>
						</td>
                        <!--<td style="width:90px;text-align:center;vertical-align: middle;">
						<?php $today = date("Y-m-d");
								if($today > $user->event_date){?>
							<button class="btn btn-sm btn-success" <?php if($user->event_participation == 1){?> disabled <?php }?>><i class="fa fa-check" ></i></button>
                           <?php } else {
							echo $user->event_participation;
									} 
							?>
                        </td> -->
						<td>
						<?php
						
						$event_attachment_array = explode (",", $user->event_attachments_link);
						foreach($event_attachment_array as $eve_at)
						{
						?>
						
						<a href="<?php print_r($eve_at); ?>" target="_BLANK"><?php print_r(basename($eve_at));?></a> <br>
						<?php } ?>
						</td>
						
					</tr>
					<?php }?> 
				</tbody> 
			</table>
			
			<script>
$(document).ready(function(){ 			
$('.filterable .btn-filter').click(function()
	{
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
    });
	
	
    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });

   
		});
			</script>
		</body>
</html>