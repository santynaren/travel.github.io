<?php
class Userlogin extends CI_Model {
	
	protected $table_name = "ld_user_login"; //Name of Database Table
	protected $table_key = "ul_id";

	public function add($data = NULL)
	{
		$table_name = $this->table_name;
		
		if($data == NULL)
		{
			return array('status' => false , 'message' => 'No data recieved');
		}

		$status = $this->db->insert($table_name,$data);
		return array('status' => $status , 'lastID'=>$this->db->insert_id());

	}
	public function get_data_from_table($tablename)
	{
		
			$this->db->select();
			$query = $this->db->get($tablename);
			return $query->result_array();
	
	
	
	}
	
	
	public function addproject($data = NULL)
	{
	
		
		if($data == NULL)
		{
			return array('status' => false , 'message' => 'No data recieved');
		}

		$status = $this->db->insert('ld_project_details',$data);
		return array('status' => $status , 'lastID'=>$this->db->insert_id());

	}

	public function update($id=NULL, $data=NULL)
	{
		$table_name = $this->table_name;
		
		if($id==NULL || $data==NULL)
		{
			return array('status' => 'false' , 'message' => 'Either id or data missing');
		}
		//Again, no need of sanitizing user input, as active record method takes care of it.
		$this->db->where($this->table_key, $id);   //Sets the where clause
		$status = $this->db->update($table_name,$data);
		return array('status' => $status , 'message' => 'Successfully Updated');
	}

	public function harddelete($id=NULL)
	{
		$table_name = $this->table_name;
		if($id == NULL)
		{
			return array('status' => 'false' , 'message' => 'Id missing');
		}
		
		$this->db->where($this->table_key, $id);    //Sets the where clause
		$status = $this->db->delete($table_name);
		return array('status' => $status , 'message' => 'Successfully Updated');
	}

	public function softdelete($id=NULL)
	{
		$table_name = $this->table_name;
		if($id == NULL)
		{
			return array('status' => 'false' , 'message' => 'Id missing');
		}
		
		$qry = "update ".$table_name." set flgActiveStatus=0 where ".$this->table_key."='".mysql_real_escape_string($id)."'";
		$status = $this->db->query($qry);
		return array('status' => $status , 'message' => 'Successfully Updated');
	
	}

	public function get($whereArray = NULL, $select = NULL, $orderby = NULL, $limit = NULL)
	{
		$table_name = $this->table_name;
		
		if($select != NULL) {
			$this->db->select($select);
		}
		if($orderby != NULL) {
			$this->db->order_by($orderby);
		}
		if($limit != NULL) {
			$this->db->limit($limit);
		}
		
		$whereArray['flgActiveStatus'] = 1;

		//Variable $where and $value not manually sanitized, automatically done by CI
		$query = $this->db->get_where($table_name, $whereArray);
		return $query->result_array();
	}
	
	public function login($whereArray = NULL)
	{
		$table_name = $this->table_name;
		
		if($whereArray == NULL)
		{
			return false;
		}
		
		$where_clause = "ul_email = '".$whereArray['username']."' or ul_username = '".$whereArray['username']."' and ul_password = '".$whereArray['password']."' and flgActiveStatus = 1";
		
		$this->db->where($where_clause);
		
		//Variable $where and $value not manually sanitized, automatically done by CI
		
		$query = $this->db->get($table_name);   //Using CI active record method.
		
		return $query->result_array();
	}
	public function getprofile($userid = NULL)
		{
		    
			$this->db->select();
			$this->db->where('ul_id',$userid);
			$this->db->limit(1);
			$query = $this->db->get('ld_user_login');
			return $query->result_array();
		}
		public function get_projectdata($call = NULL)
		{
		    
			$this->db->select();
			$query = $this->db->get('ld_project_details');
			return $query->result_array();
		}
		public function get_projectdetails($projectid = NULL)
		{
		    
			$this->db->select();
			$this->db->where('id',$projectid);
			$query = $this->db->get('ld_project_details');
			$this->db->limit(1);
			return $query->result_array();
		}
		public function get_projectforms($projectid = NULL)
		{
		    
			$this->db->select();
			$this->db->where('frk_projectid',$projectid);
			$query = $this->db->get('ld_ref_table');
			return $query->result_array();
			
		}public function deletedeveloper($clientid = NULL)
		{
		    
			$this->db->select();
			$this->db->where('ul_id',$clientid);
			$this->db->limit(1);
			//$query = $this->db->get('ld_user_login');
			//$this->db->where('id', $id);
            $query = $this->db->delete('ld_user_login');
			return $query->result_array();
		}
		
		
}

?>