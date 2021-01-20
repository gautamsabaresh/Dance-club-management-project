<?php
	class Login_model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
 
		public function login($uname, $password){
			$password=md5($password);
			$query = $this->db->query("select fname,lname,userid,role_id,email,user_status from userdetails where userid='".$uname."' AND password='".$password."'");
			return $query->row_array();
		}
		
		public function get_user_data($userid)
		{
			$query = $this->db->query("select fname,lname,userid,role_id,email,user_status from userdetails where userid='".$userid."'");
			return $query->row_array();
		}
		
		public function frgt_pwd($uname){
	//email		
		if(strpos($uname,'@')==true)
			{
			$email=$uname;
			$query = $this->db->query("Select userid,email from userdetails where email='".$email."'");
			$row = $query->row();
			return $row;
			}
			//userid
			else
			{
				$query = $this->db->query("Select userid,email from userdetails where userid='".$uname."'");
				$row = $query->row();
				return $row;
			} 
		}

		public function update_reset_pwd_token($uname,$otp)
		{
			$data= array('resetpwdtoken'=>$otp);
			$this->db->update('userdetails', $data, "userid = '".$uname."'");
		}	
		public function check_otp($otp)
		{	
			$query = $this->db->get_where('userdetails', array('resetpwdtoken'=>$otp));	
			return $query->num_rows();
		}
		

		public function update_new_pwd($otp,$newpwd)
		{
		$pwd=md5($newpwd);
		
		
		//set new password
		$data= array('password'=>$pwd);
		$q=$this->db->update('userdetails', $data, "resetpwdtoken = '".$otp."'");
		//set resetpasswordtoken to default
		$data= array('resetpwdtoken'=>"");
		$this->db->update('userdetails', $data, "resetpwdtoken = '".$otp."'");
		return $q;
		}
		
		public function set_new_pwd($userid,$newpwd)
		{
			$pwd=md5($newpwd);
			$data= array('password'=>$pwd);
			$q=$this->db->update('userdetails', $data, "userid = '".$userid."'");
			$data= array('user_status'=>1);
			$this->db->update('userdetails', $data, "userid = '".$userid."'");
			return $q;
		}
		
		public function get_number_of_users()
		{
			$query = $this->db->query("select COUNT(userid) as num_users from userdetails");
			return $query->row();
		}
		public function get_number_of_student_coordinators()
		{
			$query = $this->db->query("select COUNT(userid) as num_users from userdetails where role_id=2");
			return $query->row();
		}
		public function get_number_of_staff_coordinators()
		{
			$query = $this->db->query("select COUNT(userid) as num_users from userdetails where role_id=3");
			return $query->row();
		}
		public function get_number_of_active_students()
		{
			$query = $this->db->query("select COUNT(userid) as num_users from userdetails where (role_id=4 OR role_id=2) AND user_status=1");
			return $query->row();
		}
	}
?>