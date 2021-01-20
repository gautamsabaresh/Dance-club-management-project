<?php
class Listusers_model extends CI_Model 
{
	function __construct(){
			parent::__construct();
			$this->load->database();
		}

	function listusers()
	{
		$query=$this->db->query("select fname,lname,rolename,userid,email,user_status from userdetails left join role_master on userdetails.role_id=role_master.role_id");
		return $query->result();
	}
	 function viewdataforedit($userid)
	 {
		 $query=$this->db->query("select fname,lname,rolename,userid,email,user_status,userdetails.role_id As role_id from userdetails left join role_master on userdetails.role_id=role_master.role_id where userid='".$userid."' ");
		 
		$row = $query->row();
			return $row;
	 }
 
	function updateuserprofile($fname,$lname,$role_id,$userid,$email,$user_status,$old_userid)
	{
		
		$data= array(
			'fname'=>$fname,
			'lname'=>$lname,	
			'role_id'=>$role_id,
			'userid'=>$userid,
			'email'=>$email,
			'user_status'=>$user_status
			);
		$where = "userid = '".$old_userid."'";
//			$this->db->where('userid', "'".$old_userid."'");
		return $this->db->update('userdetails',$data,$where);
		//$query = $this->db->query("update userdetails set fname='".$fname."',lname='".$lname."',role_id='".$role_id."',userid='".$userid."',email='".$email."',user_status='".$user_status."' where userid='".$userid."'");
		 
	} 
	
	function deleteuserprofile($userid)
	{
		return $this->db->delete('userdetails',array('userid'=>$userid));
	}




}
	