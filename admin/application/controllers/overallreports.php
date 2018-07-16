<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Overallreports extends CI_Controller {


	public function __construct()
	{

		parent::__construct();
		if($this->session->userdata('is_logged_in')=='')
		{
			 $this->session->set_flashdata('msg','Login To Continue');
			redirect('login');
		}

		
		$this->load->model('overallmodel');
		$this->load->model('hallcheckoutmodel');
		

	}


public function index()
{

	$data['out']=$this->overallmodel->reportscheckout();
	$this->load->view('includes/header');
	$this->load->view('overallreports',$data);
	$this->load->view('includes/footer');
}

public function reportsprint()
{

	$data['out']=$this->overallmodel->reportscheckout();
	$this->load->view('overallreportsprint',$data);
	
}

public function reportsprint1()
{

	$data['out']=$this->overallmodel->reportscheckout();
	$this->load->view('overallreportsprint1',$data);
	
}
		

public function halloverallreports()
{

	$data['out']=$this->hallcheckoutmodel->reportscheckout();
	$this->load->view('includes/header');
	$this->load->view('halloverallreports',$data);
	$this->load->view('includes/footer');
}

public function hallreportsprint()
{

	$data['out']=$this->hallcheckoutmodel->reportscheckout();
	$this->load->view('halloverallreportsprint',$data);
	
}

public function hallreportsprint1()
{

	$data['out']=$this->hallcheckoutmodel->reportscheckout();
	$this->load->view('halloverallreportsprint1',$data);
	
}
	
		

	



		
	



}	