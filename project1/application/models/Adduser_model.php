<?php
class Adduser_model extends CI_Model 
{
	function __construct(){
			parent::__construct();
			$this->load->database();
		}
	
	function createuser($data)
	{
		return $this->db->insert('userdetails',$data);
		
	}
	function isnewuser($uname,$email){
		
		$this->db->select('userid','email');
		$where=	"userid= '".$uname."' OR email='".$email."'";
		$this->db->where($where);
		$q = $this->db->get('userdetails');
		$data = $q->result_array();
		return $data;
		//echo($data[0]['age']);
		}
}
