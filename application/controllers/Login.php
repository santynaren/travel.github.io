<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Login extends CI_Controller {
		
		public function index()
		{
			$this->load->model('functions');
			if($this->functions->isAdmin()){
				redirect('Employee');
			}   else if ($this->functions->isUser()){
				redirect('User');
			}   else if($this->functions->isEmployee()){
				redirect('Employee');
			}   else {
				redirect('Welcome');	
			}	
		}
	
	
function check_db()
{
	if(!$this->input->is_ajax_request())
	{
		header("HTTP/1.0 404 Not Found");
		$data['status'] = 'Error';	
		return false;
		
	}
	$username = $this->input->post('username');
	$password = $this->input->post('password');
	$this->load->model('login_model');
	$result = $this->login_model->check($username, $password);
	if(count($result) > 0 ){
		foreach($result as $row)
		{
			$usertype_check = $row['user_type'];
			$usernamedisp = $row['username'];
			
		}
		if($usertype_check == "Admin"){
			$this->session->set_userdata('Name', $result[0]['username']);
			$this->session->set_userdata('id', $result[0]['id']);
			$this->session->set_userdata('usertype', 'Admin');
			$data['status'] = 'Success';
			$data['msg'] = 'Login Success';
		}
		else{
			if($usertype_check == "User"){
				$this->session->set_userdata('Name', $result[0]['username']);
				$this->session->set_userdata('id', $result[0]['id']);
				$this->session->set_userdata('usertype', 'User');
				$data['status'] = 'Success';
				$data['msg'] = 'User Success';
			}
			else{
				if($usertype_check == "Employee"){
					$this->session->set_userdata('Name', $result[0]['username']);
					$this->session->set_userdata('id', $result[0]['id']);
					$this->session->set_userdata('usertype', 'Employee');
					$data['status'] = 'Success';
					$data['msg'] = 'Login Success';
					} else {
					
					$data['status'] = 'Error';	
					$data['msg'] = 'User Not Found';
				}
				
			} 
			
		}	
		echo json_encode($data);
		}	
		
		}
	}		