<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
<section id="tabs" class="project-tab">
         <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">New query</a>
                                <a class="nav-item nav-link " id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Registered queries</a>
							</div>
                        </nav>
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
			<br>
                <h3>User Queries</h3>
                <br>
		<p>You can ask your queries and complaints as well share your suggestions regarding any events to the consent higher authorities.</p>
		<hr>
		<form id="queryform">
                        <div class="form-label-group">
				<input type="text" placeholder="User id" class="form-control" id="useridquery" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" name="userid" value="<?php echo $userid ?>" disabled>
                                <label for="useridquery">User id</label>
			</div>
                <input type="hidden" id="emailquery" value="<?php echo $email ?>">
                        <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                            <label class="input-group-text" for="userrolequery">Query to:</label>
                                    </div>
                                    <select class="custom-select" id="userrolequery" required>
                                            <option selected value="">Choose...</option>
                                            <option id="studentco" value="2">Student Coordinator</option>
                                            <option id="staffco" value="3">Staff Coordinator</option>
                                    </select>
                        </div>
						
                        <div>
                            <label for="querymessage">Your query:</label>
                            <textarea class="form-control" rows="5"  id="querymessage"></textarea>
                    </div>   
                    <br>
                    <button type="button" class="btn btn-md  btn-outline-primary btn-login text-uppercase font-weight-bold mb-2" id="submitquery" >Submit</button>
                    <button type="reset" class="btn btn-md  btn-outline-primary btn-login text-uppercase font-weight-bold mb-2" >Reset</button>
                 </form>
                <div id="responsequeryview">
                  
                </div>    
                 <div id="wait" style="display:none;width:100px;height:100px;border:0px ;position:absolute;top:80%;left:45%;padding:4px;">
						<img src='https://media.giphy.com/media/3oEjI6SIIHBdRxXI40/giphy.gif' width="100" height=auto />
						<br>
					</div>
			</div>
			
			 <div class="tab-pane fade show" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
				 <br>
				
			
			 </div>
</div>
</div>
</div>
</div>
</section>
<script>

$("#nav-profile-tab").click(function(){
			$("#nav-home-tab").removeClass('active');
				$("#nav-profile-tab").addClass('active');
				$('#nav-home').hide();
				$('#nav-profile').load('<?php echo base_url(); ?>index.php/user_manipulation_controller/query_display');
				$('#nav-profile').show();
			});
			
			$("#nav-home-tab").click(function(){
			$("#nav-profile-tab").removeClass('active');
				$("#nav-home-tab").addClass('active');
				$('#nav-home').show();
				$('#nav-profile').hide();
			});
</script>


</body>
</html>
