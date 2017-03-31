<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Logout extends CI_Controller {
		
		function __construct()
		{
			parent::__construct();
			
			
		}
		function index()
		{
		    $this->load->model('functions');   
			session_destroy();
			redirect('login');
		}
	}
	
	