<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('login_model');
		$this->load->model('Adduser_model');
		$this->load->model('Listusers_model');
	}
	
	public function index()
	{
		$this->load->library('session');
		//restrict users to go back to login if session has been set
		if($this->session->userdata('user')){
			redirect('list_home');
		}
		else{
			$this->load->view('login_view');
		}
	}
	
	public function list_home()
	{	
		$result['data'] = $this->Listusers_model->listusers();
		$this->load->view('listusers_view',$result);

	}
		
	public function edituserprofile()
	{
		$userid= $this->input->post('userid');
		$result = $this->Listusers_model->viewdataforedit($userid); 
		if($result)
			echo json_encode(array('result'=>true,'userid'=>$userid,'email'=>$result->email,'fname'=>$result->fname,'lname'=>$result->lname,'rolename'=>$result->rolename,'role_id'=>$result->role_id,'userstatus'=>$result->user_status));
		else
			echo json_encode(array('result'=>false));
	}
		
	public function updateprofile()
	{
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');
		$role_id = $this->input->post('role_id');
		$userid= $this->input->post('userid');
		$email = $this->input->post('email');
		$user_status = $this->input->post('user_status');
		$old_userid = $this->input->post('old_userid');	
		$res=$this->Listusers_model->updateuserprofile($fname,$lname,$role_id,$userid,$email,$user_status,$old_userid);
		if($res)
			echo json_encode(array('result'=>true,'user_status'=>$user_status));
	}

	public function deleteuser()
	{
		$userid= $this->input->post('userid');
		$result = $this->Listusers_model->deleteuserprofile($userid);
		if($result)
			echo json_encode(array('result'=>true));
		else
			echo json_encode(array('result'=>false));
	}

	
	
}
?>