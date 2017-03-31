<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Employee extends CI_Controller {
		
		
		public function index()
		{
			$this->load->model('functions');
			if($this->functions->isAdmin()){
				$this->load->view('common/aai_header');
				$this->load->view('employee/portal');
				$this->load->view('common/aai_footer');
				}   else if ($this->functions->isUser()){
				redirect('User');
				}   else if($this->functions->isEmployee()){
				$this->load->view('common/portal_header');
				$this->load->view('employee/portal');
				$this->load->view('common/login_footer');
				}   else {
				redirect('Welcome');	
			}
		}
		
		function insert_detail()
		{
			if(!$this->input->is_ajax_request())
			{
				header("HTTP/1.0 404 Not Found");
				$data['status'] = 'Error';	
				return false;
				
			}
			$pnr_number = $this->input->post('pnr_number');
			$number_of_baggage = $this->input->post('number_of_baggage');
			$from_airport = $this->input->post('from_airport');
			$to_airport = $this->input->post('to_airport');
			$rfid_one = $this->input->post('rfid_one');
			$colour_one = $this->input->post('colour_one');
			$rfid_two = $this->input->post('rfid_two');
			$colour_two = $this->input->post('colour_two');
			$this->load->model('checkin');
			date_default_timezone_set("Asia/Kolkata");// Time Zone
			$now = new DateTime(); // Timestamp Values
   
			
			
			
			
			$check_in_data = array(
			
			'no_of_baggage' => $number_of_baggage,
			'from_airport' => $from_airport,
			'to_airport' => $to_airport,
			'pnr_number' => $pnr_number,
			 
			);
			$check_in_result = $this->checkin->add_checkin($check_in_data);
			$baggage_update_data = array(
			'pnr_number_frg' => $pnr_number,
			'rfid_code' => $rfid_one,
			'city_name' => "Chennai",
			
			//'pnr_number' => $pnr_number
			);
			$baggage_result= $this->checkin->add_baggage($baggage_update_data);
			$baggage_update_data_two = array(
			'pnr_number_frg' => $pnr_number,
			'rfid_code' => $rfid_two,
			'city_name' => "Chennai",
			
			//'pnr_number' => $pnr_number
			);
			$baggage_result= $this->checkin->add_baggage($baggage_update_data_two);
			
			
		}
		
	}
