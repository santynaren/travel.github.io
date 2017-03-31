<?php
class Functions extends CI_Model {
  
    public function isAdmin() {
    	if($this->session->userdata("usertype")=="Admin"){
			return true;
		}
		return false;
    }
	public function isEmployee() {
	if($this->session->userdata("usertype")=="Employee"){
			return true;
		}
		return false;
	}
	
	public function isUser() {
    	if($this->session->userdata("usertype")=="User"){
			return true;
		}
		return false;
    }
	
	
}
?>