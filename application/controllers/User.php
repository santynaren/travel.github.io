<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class User extends CI_Controller {
		
		
		public function index()
		{
			$this->load->model('functions');
			if($this->functions->isAdmin()){
				redirect('Employee');
			}   else if ($this->functions->isUser()){
				$this->load->view('common/user_header');
				$this->load->view('user/webapp');
				$this->load->view('common/aai_footer');
			}   else if($this->functions->isEmployee()){
				redirect('Employee');
			}   else {
				redirect('Welcome');	
			}
		}
	}