<?php
class Login_model extends CI_Model {
		
		public function check($username,$password)
		{
		    $flagvalue=1;
			$this->db->select();
			$this->db->where('username',$username);
			$this->db->where('password',$password);
			//$this->db->where('flagactive',$flagvalue);
			$this->db->limit(1);
			$query = $this->db->get('login_details');
			return $query->result_array();
		}
		
		public function api_check($api_key)
		{
		    
		 
			$this->db->select();
			$this->db->where('api_key',$api_key);
			$this->db->limit(1);
			$query = $this->db->get('addclient');
			return $query->result_array();
		}
		
	}		