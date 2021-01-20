<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {
 
	function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('login_model');
		$this->load->model('Adduser_model');
	}
	
	public function index()
	{
		$this->load->view('index');	
	}

	public function signin()
	{	
	//restrict users to go back to login if session has been set
		
		if($this->session->userdata('user')){
				$this->home();
			}
		else{
				$this->load->view('login_view');
			}
	}
	
	public function login(){
		//load session library
		
		$uname = $_POST['uname'];
		$password = $_POST['psw'];
		$data = $this->login_model->login($uname, $password);
		if($data)
		{
			$this->session->set_userdata('user', $data);
			$user=$this->session->userdata('user');
			extract($user);	
			//redirect('home');
			echo json_encode(array('result'=>true,'user_status'=>$user_status));
			exit;
		}
		else
		{
			echo json_encode(array('result'=>false));	
		} 
	}
	
	public function home()
	{
		//load session library
		
		//restrict users to go to home if not logged in
		if($this->session->userdata('user'))
		{
			$user=$this->session->userdata('user');
			extract($user);
			//Admin
			if($role_id==1 && $user_status==1)
			{
				$data['res'] = $this->login_model->get_number_of_users();
				$data['num_stu_coordinators'] = $this->login_model->get_number_of_student_coordinators();
				$data['num_staff_coordinators'] = $this->login_model->get_number_of_staff_coordinators();
				$data['num_students'] = $this->login_model->get_number_of_active_students();	
				$PAGE ='home_admin';
			}
			//Staff coordinator
			else if($role_id==3 || $role_id==2){
				$data = $this->login_model->get_user_data($userid);
				$PAGE = 'home_coordinator';
			}
			//Student member
			else if($role_id==4){
				$data = $this->login_model->get_user_data($userid);
				$PAGE = 'home_student';
			}
			
			$this->load->view($PAGE,$data);
		}
	}
		public function logout(){
		//load session library
			
			$this->session->unset_userdata('user');
			redirect('/');
		}
		public function register(){
		//view add user form
			$this->load->view('add_user');
				
		}
		
		public function frgt_pwd_view()
		{
		//view forget password form
			$this->load->view('forget_pwd_view');
		}
		
		public function adduser()
		{
			
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$uname = $this->input->post('uname');
			
			$email = $this->input->post('email');
			$userrole = $this->input->post('userrole');
			
			$data = array(
			'fname' => $fname,
			'lname' => $lname,
			'role_id'=> $userrole,
			'userid' => $uname,
			
			'email' => $email	
			);
			
			//checks if the user is already registered
			$datacheck = $this->Adduser_model->isnewuser($uname,$email);
			if($datacheck)
			{
				print_r("<br><h4>User already exists..Please try again!!</h4></div>");
			}
			//if the data given is for a new user
			else
			{
         //adding the new user to the database
				$result = $this->Adduser_model->createuser($data);			
			
				if($result)
				{
					$config = Array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => 'psgcascrew@gmail.com',
					'smtp_pass' => 'thaarini7',
					'mailtype'  => 'html', 
					'charset'   => 'iso-8859-1'
				);
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");

				// Set to, from, message, etc.

					$from = "psgcascrew@gmail.com";
					$to = $email;	
					$subject = "Regarding registration with the team";
					$message = "<html><body><div><h3>Welcome to CAS crew!!</h3><p>You have been successfully added as an user.
							You can login to your account using the below username and set your password:<br>
							User ID: ".$uname." <br></p>
							<p>Set your password and activate your account by using the link given below:<br>".base_url()."index.php/login_controller/set_new_password_view?userid=".$uname." </p>
						<p>We look forward to work together and reach great heights with our crew.</p>
						<p><b>Thanks and regards,</b><br>
						CAS CREW</p></div></body></html>";
					$this->email->from($from,'CAS CREW');
					$this->email->to($to);
					$this->email->subject($subject);
					$this->email->message($message);
					$this->email->send();
					print_r("<br><h4>User successfully added..!!</h4>"); 	
				}
			//if the user is not added to database
				else 
				{	
					print_r("<br><h4>Database error.. User not added!!</h4>");	
				}
				exit;
			}
		
		}
		
		public function set_new_password_view()
		{
			$userid=$_GET['userid'];
			$data['userid']=$userid;
			$this->load->view('set_new_password_view',$data);	
		}
		public function set_new_password()
		 {
			$userid=$this->input->post('userid');
			$pwd=$this->input->post('password');
			$query=$this->login_model->set_new_pwd($userid,$pwd);
			if($query)
			{	
				echo json_encode(array('result'=>true,'newpwd'=>$pwd,'userid'=>$userid));
			}
			else
			{
				echo json_encode(array('result'=>false));
			} 
			 
		 }
		
		
		
		public function forget_password()
		{
			$uname= $this->input->post('uname');
			//generate otp
			$generator = "135792468";
			$result = ""; 
			for ($i = 1; $i <= 6; $i++) { 
				$result .= substr($generator, (rand()%(strlen($generator))), 1); 
			} 
			$otp=$result;
//get email and username of the specific username/email
//if username/email valid
			if($res=$this->login_model->frgt_pwd($uname))
			{	
	//valid email
				if(strpos($uname,'@')==true)
				{
		//Send email to reset password
					$email=$res->email;			
					$this->login_model->update_reset_pwd_token($res->userid,$otp);
					$config = Array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => 'psgcascrew@gmail.com',
					'smtp_pass' => 'thaarini7',
					'mailtype'  => 'html', 
					'charset'   => 'iso-8859-1'
				);
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
					$from = "psgcascrew@gmail.com";
					$to = $email;
					$subject = "Resetting password.";
					$message = "<html><body><div><h3>Greetings!!</h3><br><p>You have requested for resetting your password. Enter the given OTP in the link given below to reset the password.<br>
							OTP: ".$otp." <br>
							Reset password link: ".base_url()."index.php/login_controller/reset_password_otp_view?t=".$time." </p>
							<p>We look forward to work together and reach great heights with our crew.</p>
							<p><b>Thanks and regards,</b><br>
								CAS CREW</p></div></body></html>";
					$this->email->from($from,'CAS CREW');
					$this->email->to($to);
					$this->email->subject($subject);
					$this->email->message($message);
					$this->email->send();
					echo json_encode(array('result'=>true,'email'=>$res->email));
				}
		//valid username
				else
				{
					$email=$res->email;	
					
					$this->login_model->update_reset_pwd_token($res->userid,$otp);
					$config = Array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => 'psgcascrew@gmail.com',
					'smtp_pass' => 'thaarini7',
					'mailtype'  => 'html', 
					'charset'   => 'iso-8859-1'
					);
				$this->load->library('email', $config);
				$this->email->set_newline("\r\n");
			/* 	$activation=$email.time(); */
				$time = time();
					$from = "psgcascrew@gmail.com";
					$to = $email;
					$subject = "Resetting password.";
					$message = "<html><body><div><p>You have requested for resetting your password. Enter the given OTP in the link given below to reset the password.<br>
							OTP: ".$otp." <br>
							Reset password link: ".base_url()."index.php/login_controller/reset_password_otp_view?t=".$time." </p>
							<p>We look forward to work together and reach great heights with our crew.</p>
						<p><b>Thanks and regards,</b><br>
						CAS CREW</p></div></body></html>";
					$this->email->from($from,'CAS CREW');
					$this->email->to($to);
					$this->email->subject($subject);
					$this->email->message($message);
					$this->email->send();
					echo json_encode(array('result'=>true,'uname'=>$res->userid,'email'=>$res->email));
				}
			}
//username/email invalid
		else{
			echo json_encode(array('result'=>false));
			}
	
		}
		
		public function reset_password_otp_view()
		{
//View the reset password form which asks for OTP
			$u_time = $_GET['t']; // fetching time variable from URL
			$cur_time = time();
			$diff = $cur_time-$u_time; //fetching difference between current time to GET variable's time
			$time_rules = array (  
                12 * 30 * 24 * 60 * 60,//year 
                30 * 24 * 60 * 60, //month
                24 * 60 * 60, //day
                60 * 60, //hours
                60, //minute
                1 //second
				); 
			foreach( $time_rules as $secs)
			{
				$div = $diff / $secs;
				if($div>=1)
				{
					$t = round($div); 
				}
			}
			if ($t<=600) 
			{
			// link is not expired
			$this->load->view('reset_pwd_otp_view');
			}
			else
			{
			// link has been expired
			$this->load->view('reset_pwd_link_expired');
			}
		}
		
		public function check_otp_new_pwd()
		{
			
			$otp= $this->input->post('otp');
			$q=$this->login_model->check_otp($otp);
			if($q)
			{
				echo json_encode(array('result'=>true,'queryresult'=>$q,'otp'=>$otp));
			}
			else
				echo json_encode(array('result'=>false,'queryresult'=>$q));
		}
		
		public function check_otp_new_pwd_view()
		{
			$otp=$_GET['otp'];
			$data['otp']=$otp;
			$this->load->view('check_otp_new_pwd_view',$data);	
		}
		
		public function update_new_pwd()
		{	
			$otp=$this->input->post('otp');
			$pwd=$this->input->post('password');		
			$query=$this->login_model->update_new_pwd($otp,$pwd);
			if($query)
			{	
				echo json_encode(array('result'=>true,'newpwd'=>$pwd,'otp'=>$otp));
			}
			else
			{
				echo json_encode(array('result'=>false));
			} 
		}

	}
	
?>