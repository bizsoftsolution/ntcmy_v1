<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hallbookingreports extends CI_Controller {


	public function __construct()
	{

		parent::__construct();
		if($this->session->userdata('is_logged_in')=='')
		{
			 $this->session->set_flashdata('msg','Login To Continue');
			redirect('login');
		}

		
		$this->load->model('hallbookingreportsmodel');
		

	}

	
	public function index()
	{

			$data['rep']=$this->hallbookingreportsmodel->repo_rts();
			$this->load->view('includes/header',$data);
			$this->load->view('hallbookingreports');
			$this->load->view('includes/footer');

		
	}


	public function confirmstatus()
	{
		$id=$this->input->post('id');


		$result=$this->hallbookingreportsmodel->updateconfirmstatus($id);

		if($result==true)
		{

			$data=$this->db->where('id',$id)->get('hallbooking')->result_array();

			// echo "<pre>";
			// print_r($data);
			
			$datas=$this->hallbookingreportsmodel->sendmail($data);


		}

		else
		{
			$this->session->set_flashdata('msg1','Booking Confirmation is Failed');
			redirect('hallbookingreports');
		}



		
	}

	public function cancelbooking()
	{
		$id=$this->input->post('id');
		$cancelreason=$this->input->post('cancelreason');
		$result=$this->hallbookingreportsmodel->bookingcancel($id,$cancelreason);

		if($result==true)
		{
					
			$this->session->set_flashdata('msg','Booking Cancelled sucessfully');
			redirect('hallbookingreports/cancelbookingreports');

		}

		else
		{
			$this->session->set_flashdata('msg1','Booking Cancellation is Failed');
			redirect('hallbookingreports');
			
		}

	}	

		public function cancelbookingreports()
	{

			$data['rep']=$this->hallbookingreportsmodel->cancelrepo_rts();
			// echo "<pre>";
			// print_r($data['rep']);
			$this->load->view('includes/header',$data);
			$this->load->view('cancelhallreports');
			$this->load->view('includes/footer');

		
	}

	public function viewdetails()
{
  $id=$this->uri->segment('3');
  $data['details']=$this->db->where('id',$id)->get('hallbooking')->result_array();
  $this->load->view('includes/header');
  $this->load->view('hallbookingdetails',$data);
  $this->load->view('includes/footer');
}


	
		

	



		
	



}	