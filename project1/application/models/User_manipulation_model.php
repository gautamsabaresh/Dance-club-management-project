<?php
class User_manipulation_model extends CI_Model 
{
	function __construct(){
			parent::__construct();
			$this->load->database();
		}
function updateuserprofile($fname,$lname,$userid,$email)
	{
		
		$data= array(
			'fname'=>$fname,
			'lname'=>$lname,	
			'email'=>$email
			);
		$where = "userid = '".$userid."'";

		return $this->db->update('userdetails',$data,$where);
	}

function reset_user_password_model($userid,$currpwd,$newpwd)
	{
		$currpwd=md5($currpwd);
		$newpwd=md5($newpwd);
		$query = $this->db->query("select userid from userdetails where userid='".$userid."' AND password='".$currpwd."'");
		$data = $query->result_array();
		if($data)
		{
			return true;
		}
		else
		{
			return false;
		}
			
	}
	function update_password($userid,$newpwd)
	{
		$newpwd=md5($newpwd);
		$data= array('password'=>$newpwd);
			$where = "userid = '".$userid."'";
			return $this->db->update('userdetails',$data,$where);
		
	}
        
        function new_query($userid,$role_id,$date,$querymessage){
            $data = array(
			'user_id' => $userid,
			'query_to' => $role_id,
			'query_post_date'=>$date,
            'query_message'=> $querymessage 	
			);
            $this->db->insert('user_queries',$data);
			return $this->db->insert_id();
		}
		
		public function get_coordinators_email($role_id)
		{
			$query = $this->db->query("select email from userdetails where role_id=".$role_id);
			return $query->result_array();
		}
		public function get_query_details($userid)
		{
			$query = $this->db->query("select * from user_queries where user_id='".$userid."'");
			return $query->result();
		}
		
		public function get_query_details_through_queryid($query_id)
		{	
			$query = $this->db->query("select * from user_queries where query_id=".$query_id);
			return $query->result();
        }
			
		public function get_query_details_through_role($role_id)
		{	
			$query = $this->db->query("select * from user_queries where query_to=".$role_id);
			return $query->result();
        }
		
		public function get_user_role_name($role_id)
		{
			$query = $this->db->query("select rolename from role_master where role_id=".$role_id);
			return $query->row();
		}

		public function update_response($query_id,$date,$responsemessage,$query_taken_by)
		{
			$data= array('query_resolve_date'=>$date,'query_resolved_by'=>$query_taken_by,'query_resolution'=>$responsemessage,'query_status'=>"In process");
			$where = "query_id = '".$query_id."'";
			return $this->db->update('user_queries',$data,$where);
		}

		public function close_query($query_id)
		{	
			$data= array('query_status'=>"closed");
			$where = "query_id = '".$query_id."'";
			return $this->db->update('user_queries',$data,$where);
		}
		
	 	public function reopen_query($query_id,$reopen_date,$new_query_message)
		{
			$data_status= array('query_status'=> "reopened");
			 $where = "query_id = '".$query_id."'"; 
			$this->db->update('user_queries',$data_status,$where);
			
			 $data = array(
			'query_id' => $query_id,
			'new_query_message' => $new_query_message,
			'reopened_query_date'=>$reopen_date	
			);
			
            $this->db->insert('query_responses',$data);
			return $this->db->insert_id();
			
		}
		
		public function get_reopened_query_details($query_id)
		{
			$query = $this->db->query("select * from query_responses where query_id= ".$query_id);
			return $query->result();
		} 
		
		public function update_reopened_response($response_id,$response_message,$response_date,$query_id,$query_taken_by)
		{
			$dataa = array('query_resolved_by'=>$query_taken_by,'query_status'=>"In process");
			$wheree = "query_id = '".$query_id."'";
			$this->db->update('user_queries',$dataa,$wheree);
			
			$data = array(
			'response_message' => $response_message,
			'response_update_date'=>$response_date	
			);
			$where = "response_id = '".$response_id."'";
			return $this->db->update('query_responses',$data,$where);
		}
		
		public function add_event_details($eventaddedby,$eventaddeddate,$eventtypeid,$eventdate,$eventinformation,$eventattachments)
		{
			$data = array(
			'event_added_by_userid'=>$eventaddedby,
			'event_added_date'=>$eventaddeddate,
			'eventtype_id'=>$eventtypeid,
			'event_date'=>$eventdate,
			'eventinformation'=>$eventinformation,
			'event_attachments_link'=>$eventattachments
			);
			 $this->db->insert('event_information',$data);
			return $this->db->insert_id();
		}
		
		public function show_event_list_coordinator()
		{
			$query = $this->db->query("select event_id,event_added_by_userid,event_added_date,event_date,eventinformation,eventtype_master.event_type AS event_type,event_participation,event_attachments_link from event_information,eventtype_master where event_information.eventtype_id = eventtype_master.eventtype_id ORDER BY event_added_date DESC");  
			return $query->result();
		}
	}

?>