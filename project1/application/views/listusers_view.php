<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	 -->
	 <link href="<?php echo base_url(); ?>js/adminview/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 <script src="<?php echo base_url(); ?>js/adminview/vendor/jquery/jquery.min.js"></script> 
   <script src="<?php echo base_url(); ?>js/adminview/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script> -->
	<!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script	src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
	<script src="<?php echo base_url(); ?>js/listusers.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/list_tableview.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
  
	.modal-confirm {		
		color: #636363;
		width: 400px;
	}
	.modal-confirm .modal-content {
		padding: 20px;
		border-radius: 5px;
		border: none;
        text-align: center;
		font-size: 14px;
	}
	.modal-confirm .modal-header {
		border-bottom: none;   
        position: relative;
	}
	.modal-confirm h4 {
		text-align: center;
		font-size: 30px;
		margin: 25px 0 -10px;
	}
	.modal-confirm .close {
        position: absolute;
		top: -5px;
		right: -2px;
	}
	.modal-confirm .modal-body {
		color: #999;
	}
	.modal-confirm .modal-footer {
		border: none;
		text-align: center;		
		border-radius: 5px;
		font-size: 13px;
		padding: 10px 15px 25px;
	}
	.modal-confirm .modal-footer a {
		color: #999;
	}		
	.modal-confirm .icon-box {
		width: 80px;
		height: 80px;
		margin: 0 auto;
		border-radius: 50%;
		z-index: 9;
		text-align: center;
		border: 3px solid #f15e5e;
	}
	.modal-confirm .icon-box i {
		color: #f15e5e;
		font-size: 46px;
		display: inline-block;
		margin-top: 13px;
	}
    .modal-confirm .btn {
        color: #fff;
        border-radius: 4px;
		background: #60c7c1;
		text-decoration: none;
		transition: all 0.4s;
        line-height: normal;
		min-width: 120px;
        border: none;
		min-height: 40px;
		border-radius: 3px;
		margin: 0 5px;
		outline: none !important;
    }
	.modal-confirm .btn-info {
        background: #c1c1c1;
    }
    .modal-confirm .btn-info:hover, .modal-confirm .btn-info:focus {
        background: #a8a8a8;
    }
    .modal-confirm .btn-danger {
        background: #f15e5e;
    }
    .modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
        background: #ee3535;
    }
	.trigger-btn {
		display: inline-block;
		margin: 100px auto;
	}
</style>
</head>
<body>

<div class="container">
	<br>
    <h3>The list of users has been displayed.</h3>
    <hr>
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Users</h3>
               
            </div>
            <table class="table table-bordered table-striped" id="datatable">
                <caption>List of users</caption>
				<thead>
                    <tr class="filters">
                        <th><input style="text-align:center;font-weight: bold;" type="text" class="form-control" placeholder="First Name" disabled></th>
                        <th><input style="text-align:center;font-weight: bold;"type="text" class="form-control" placeholder="Last Name" disabled></th>
						<th><input style="text-align:center;font-weight: bold;"type="text" class="form-control" placeholder="User Role" disabled></th>
                        <th><input style="text-align:center;font-weight: bold;"type="text" class="form-control" placeholder="User ID" disabled></th>
						<th><input style="text-align:center;font-weight: bold;"type="text" class="form-control" placeholder="Email" disabled></th>
						<th><input style="text-align:center;font-weight: bold;"type="text" class="form-control" placeholder="User Status" disabled></th>
						<th> 
                    <button class="btn btn-primary btn-sm btn-filter"><i class="fa fa-filter"></i>Filter</button>
                </th>
					</tr>
				</thead>
                <tbody> 
					<?php foreach($data as $user){?>
                    <tr>
						<td style="text-align:center;vertical-align:middle;"><?php echo $user->fname;?></td>
                        <td style="text-align:center;vertical-align:middle;"><?php echo $user->lname;?></td>
						<td style="text-align:center;vertical-align:middle;"><?php echo $user->rolename;?></td>
                        <td style="text-align:center;vertical-align:middle;"><?php echo $user->userid;?></td>
                        <td style="text-align:center;vertical-align:middle;"><?php echo $user->email;?></td>
						<td style="text-align:center;vertical-align:middle;"><?php echo $user->user_status;?></td>
						<td><button class="btn btn-light edit_data" id="<?php echo $user->userid;?>" type="button" data-toggle="modal" data-target="#edit_data_Modal"><i class="fa fa-pencil-square-o" ></i></button>
						<button class="btn btn-light delete_user" id="<?php echo $user->userid;?>" type="button" data-toggle="modal" data-target="#delete_data_Modal" ><i class="fa fa-times" style="color:RED"></i>
						</button>
						</td>
					</tr>
					<?php }?> 
                </tbody>
            </table>
			<hr>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/login form/loginpage.css"/>
	<div id="edit_data_Modal" class="modal fade">  
		<div class="modal-dialog">  
			<div class="modal-content">  
				<div class="modal-header">  
					<h4 class="modal-title" style="align:left">Edit user details</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>     
                </div>  
            <div class="modal-body">  
                <form id="edituser">
					<div class="form-label-group">
						<input type="text" maxlength="32" class="form-control" placeholder="Enter First Name" id="firstname" name="fname"  required>
						<label for="firstname">Enter First Name</label>
					</div>
	
					<div class="form-label-group">
						<input type="text" name="lname" placeholder="Enter Second Name" class="form-control" id="lastname" required>
						<label for="lastname">Enter Last Name</label>
					</div>

					<div class="form-label-group">
						<input type="email" placeholder="Enter Email" class="form-control" id="emailid" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
						<label for="emailid">Enter Email</label>
					</div>
	
					<div class="form-label-group">
						<input type="text" placeholder="User id" class="form-control" id="userid" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" name="userid" disabled>
						<label for="userid">User id</label>
					</div>
	
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<label class="input-group-text" for="user_role">User Role:</label>
						</div>
						<select class="custom-select" id="user_role" required>
							<option selected value="">Choose...</option>
							<option id="admin" value="1">Admin</option>
							<option id="student" value="4">Student</option>
							<option id="studentco" value="2">Student Coordinator</option>
							<option id="staffco" value="3">Staff Coordinator</option>
						</select>
					</div>
					
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<label class="input-group-text" for="userstatus">User Status:</label>
						</div>
						<select class="custom-select" id="userstatus" required>
							<option selected value="">Choose...</option>
							<option id="active" value="1">Active</option>
							<option id="inactive" value="0">Inactive</option>
						</select>
					</div>
					<input type="hidden" id="old_userid" >
					<br>
					<button type="button" class="btn btn-md  btn-outline-primary btn-login text-uppercase font-weight-bold mb-2" id="updatebtn" >Update</button>
					<button type="reset" class="btn btn-md  btn-outline-primary btn-login text-uppercase font-weight-bold mb-2">Clear</button>
						<div id="updateresponse">
							<p style="color:GREEN; font-size:1.5rem;">Profile updated successfully! </p>
						</div>
					</div>  
				</form>
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
			</div>  
		</div>  
	</div>  



<!-- Modal delete user -->

	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
			<div id="delete_data_Modal" class="modal fade">
				<div class="modal-dialog modal-confirm">
					<div class="modal-content">
						<div class="modal-header">
							<div class="icon-box">
								<i class="material-icons">&#xE5CD;</i>
							</div>				
							<h4 class="modal-title" id="#deletemodaltitle">Are you sure?</h4>	
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						</div>
						<div class="modal-body">
							<h6>Do you really want to delete these records? This process cannot be undone.</h6>
							<input type="hidden" id="deluserid" ><br>
							<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
							<button type="button" id="delete_data" class="btn btn-danger">Delete</button> 
						</div>
						<div id="deleteresponse">
							<p style="color:GREEN; font-size:1.5rem;">Profile deleted successfully! </p>
						</div>		
					</div>
				</div>
			</div> 
        </div>
    </div>
</div>
</body>
</html>