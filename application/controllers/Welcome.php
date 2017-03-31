<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Welcome extends CI_Controller {
		
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
				$this->load->view('common/login_header');
				$this->load->view('common/login');
				$this->load->view('common/login_footer');
			}
		}
	}
