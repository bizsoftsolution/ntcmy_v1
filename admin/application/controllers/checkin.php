<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkin extends CI_Controller {


	public function __construct()
	{

		parent::__construct();
		if($this->session->userdata('is_logged_in')=='')
		{
			 $this->session->set_flashdata('msg','Login To Continue');
			redirect('login');
		}

		
		$this->load->model('checkinmodel');
		

	}

	
	public function index()
	{

			$data['checkin']=$this->checkinmodel->checkin_reports();
			$this->load->view('includes/header',$data);
			$this->load->view('checkinreports');
			$this->load->view('includes/footer');

		
	}

	
		

	



		
	



}	