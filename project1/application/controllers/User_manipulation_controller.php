<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_manipulation_controller extends CI_Controller {
 
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('user_manipulation_model');
		$this->load->model('login_model');
		date_default_timezone_set('Asia/Kolkata');
	}
	
	public function edit_profile()
	{
		
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$userid = $this->input->post('userid');
			$email = $this->input->post('email');
			$dbquery=$this->user_manipulation_model->updateuserprofile($fname,$lname,$userid,$email);
			if($dbquery)
			{
				$data = $this->login_model->get_user_data($userid);
				echo json_encode(array('result'=>true,'data'=>$data));
			}
			else
				echo json_encode(array('result'=>false));		
	}
	public function edit_profile_view()
	{	$this->load->library('session');
		$user=$this->session->userdata('user');
		extract($user);
		$data = $this->login_model->get_user_data($userid);
		$this->load->view('editprofile_view',$data);	
	}
	
	 public function reset_user_password()
		 {
			 
			$userid=$this->input->post('userid');
			$currpwd=$this->input->post('password');
			$newpwd=$this->input->post('newpassword');
			
		 	$query=$this->user_manipulation_model->reset_user_password_model($userid,$currpwd,$newpwd);
			if($query)
			{	
				if($this->user_manipulation_model->update_password($userid,$newpwd))
				echo json_encode(array('result'=>true,'newpwd'=>$newpwd,'userid'=>$userid,'currpwd'=>$currpwd));
			 }
			else
			{
				echo json_encode(array('result'=>false));
			}
			 
		 }
        public function userquery_view()
        {
			$this->load->library('session');
			$user=$this->session->userdata('user');
			extract($user);
			$data = $this->login_model->get_user_data($userid);
            $this->load->view('query_view',$data);
        }
           
        public function add_user_query()
        {
            $userid = $this->input->post('userid');
            $role_id = $this->input->post('role_id');
            $querymessage = $this->input->post('querymessage');
			$email = $this->input->post('email');
			$date = date("Y-m-d H:i:s");
			
			$query_id = $this->user_manipulation_model->new_query($userid,$role_id,$date,$querymessage);
			
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
					$dataa = $this->user_manipulation_model->get_coordinators_email($role_id);
					$emails = array();
					for($i=0;$i<sizeof($dataa);$i++)
					{
						$emails[]=$dataa[$i]["email"];	
					}
				//send mail to the user who raised the query
					$from = "psgcascrew@gmail.com";
					$to = $email;
					$subject = "Regarding Query submission";
					$message = "<html><body><div><h3>Dear Member!!</h3><p>Your Query no:".$query_id." has been registered. Please allow us some time to address your query.
								</p>
							<p><b>Thanks and regards,</b><br>
								CAS CREW</p></div></body></html>";
					$this->email->from($from,'CAS CREW');
					$this->email->to($to);
					$this->email->subject($subject);
					$this->email->message($message);
					$this->email->send();
				//Send mail to the staff or student coordinators
					if($role_id==2)
					{
					$message = "<html><body><div><h3>Dear Student Coordinator!</h3><p> Query no:".$query_id." has been raised.<br>The query is:<hr>".$querymessage."<hr> Please address the query.
								</p>
							<p><b>Thanks and regards,</b><br>
								CAS CREW</p></div></body></html>";
					}
					else if($ole_id==3)
					{
						$message = "<html><body><div><h3>Dear Staff Coordinator!</h3><p> Query no:".$query_id." has been raised.<br>The query is:<hr>".$querymessage."<hr> Please address the query.
								</p>
							<p><b>Thanks and regards,</b><br>
								CAS CREW</p></div></body></html>";
					}
					$subject = "Query has been raised";
					$this->email->from($from,'CAS CREW');
					$this->email->to($emails);
					$this->email->subject($subject);
					$this->email->message($message);
					$this->email->send();
					
					echo json_encode(array('date'=>$date,'role_id'=>$role_id,'query_id'=>$query_id));
            
            
        }
		public function query_display()
		{
			$this->load->library('session');
			$user=$this->session->userdata('user');
			extract($user);
			$result['data']=$this->user_manipulation_model->get_query_details($userid);
			$this->load->view('query_list_view',$result);
		}
		
		public function query_detailed_view()
		{
			$query_id = isset($_GET['queryid']) ? $_GET['queryid'] : '';
			if(!empty($query_id))
			{
				$result['data']=$this->user_manipulation_model->get_query_details_through_queryid($query_id);
				$this->load->library('session');
				$user=$this->session->userdata('user');
				extract($user);
				$result['currentuser']=$userid;
				$result['role_id']=$role_id;
				foreach($result['data'] as $row)
				{
					$role_id_query_to = $row->query_to;
				}
				$role_name=$this->user_manipulation_model->get_user_role_name($role_id_query_to);
				$result['role_name']= $role_name;
				$result['query_taken_by']=$userid;
				$result['response']= $this->user_manipulation_model->get_reopened_query_details($query_id); 
				$this->load->view('query_detailed_view',$result);
			}
		}
		

		public function user_queries_coordinator_view()
		{
			$this->load->library('session');
			$user=$this->session->userdata('user');
			extract($user);
			$result['data']=$this->user_manipulation_model->get_query_details_through_role($role_id);
			$result['currentuser']=$userid;
			$result['role_id']=$role_id;
			$this->load->view('user_queries_display_coordinator',$result);
		}
		
		public function resolve_query()
		{
			$query_id=$this->input->post('query_id');
			$query_taken_by = $this->input->post('query_taken_by');
			$responsemessage = $this->input->post('responsemessage');
			$date = date("Y-m-d H:i:s");
			$res=$this->user_manipulation_model->update_response($query_id,$date,$responsemessage,$query_taken_by);
			echo json_encode(array('result'=>$res,'qid'=>$this->input->post('query_id')));
		}
		public function close_query()
		{
			$query_id=$this->input->post('query_id');
			$res=$this->user_manipulation_model->close_query($query_id);
			echo json_encode(array('result'=>$res));
		}
		
		public function reopen_query()
		{	
			$query_id=$this->input->post('query_id');
			$date = date("Y-m-d H:i:s");
			$new_query_message= $this->input->post('new_query_message');
			$response_id = $this->user_manipulation_model->reopen_query($query_id,$date,$new_query_message);
			echo json_encode(array('res'=>$response_id));
		}
		
		public function response_reopened_query()
		{	$this->load->library('session');
			$user=$this->session->userdata('user');
			extract($user);
			$query_id= $query_id=$this->input->post('query_id');
			$response_id = $this->input->post('response_id');
			$response_message= $this->input->post('response_message');
			$date = date("Y-m-d H:i:s");
			$result=$this->user_manipulation_model->update_reopened_response($response_id,$response_message,$date,$query_id,$userid);
			if($result)
				echo json_encode(array('res'=>$result));
		}
		
		public function add_event_view()
		{
			$this->load->view('event_view');
		}
		
		public function get_event_details()
		{
			
			$this->load->library('session');
			$user=$this->session->userdata('user');
			extract($user);
			if(isset($_POST))
			{
			$fileset = NULL;	
			$eventaddedby = $userid;
			$eventaddeddate = date("Y-m-d H:i:s");
			if( isset($_POST['datepicker'])){
			$eventdate =$_POST['datepicker'];
			$time = strtotime($eventdate);
			$newformateventdate = date('Y-m-d',$time);
			if($newformateventdate=="1970-01-01"){
				$newformateventdate="";
			}
			}
			
			$eventtypeid = $_POST['eventtype'];
			$eventinformation = $_POST['eventinformation'];
				if (isset($_FILES['files']) && !empty($_FILES['files'])) 
				{	
					$destination_path = FCPATH.'eventattachments'.DIRECTORY_SEPARATOR;
					$no_files = count($_FILES["files"]['name']);
					
					for ($i = 0; $i < $no_files; $i++)
					{
						if ($_FILES["files"]["error"][$i] > 0) 
						{
							echo "Error: " . $_FILES["files"]["error"][$i] . "<br>";
						} 
						else {
								if (file_exists($destination_path . $_FILES["files"]["name"][$i])) 
								{
									echo 'File already exists : '.$destination_path . $_FILES["files"]["name"][$i];
								}
								else 
								{
									move_uploaded_file($_FILES["files"]["tmp_name"][$i], $destination_path . $_FILES["files"]["name"][$i]);
									
									$filename = base_url().'eventattachments/' . $_FILES["files"]["name"][$i];
									 $fileset = $fileset.$filename.',';
									echo 'File successfully uploaded : '.$destination_path . $_FILES["files"]["name"][$i] . ' ';
								}
							}
					}
				$eventattachments = rtrim($fileset,',');
				
				}
				else 
				{
					if($eventtypeid == 1 || $eventtypeid == 2)
					$eventattachments = '';
					else
					echo 'Please choose at least one file';
				}
				echo $newformateventdate;
			
			$query = $this->user_manipulation_model->add_event_details($eventaddedby,$eventaddeddate,$eventtypeid,$newformateventdate,$eventinformation,$eventattachments);
			echo json_encode(array('res'=>true,'eventid'=>$query,'eventatt'=>$eventattachments,'evedate'=>$newformateventdate));
			}
			else
				echo json_encode(array('res'=>false));
			
		}
		public function event_list_coordinator()
		{
			$data['result'] = $this->user_manipulation_model->show_event_list_coordinator();
			$this->load->view('event_list_coordinator_view',$data);
		}
		public function event_list_student()
		{	
			$curr_date = date('Y-m-d');// Then call the date functions
			$data['curr_date'] = $curr_date; 
			$data['result'] = $this->user_manipulation_model->show_event_list_coordinator();
			$this->load->view('event_list_student_view',$data);
		}
		
}
?>