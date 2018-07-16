<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addhall_type extends CI_Controller {


	public function __construct()
	{

		parent::__construct();
		if($this->session->userdata('is_logged_in')=='')
		{
			 $this->session->set_flashdata('msg','Login To Continue');
			redirect('login');
		}

		
		$this->load->model('addhall_typemodel');
		

	}

	
	public function index()
	{

			$data['typ']=$this->addhall_typemodel->type_reports();
			
		
			$this->load->view('includes/header');
			$this->load->view('addhall_type',$data);
			$this->load->view('includes/footer');

		
	}

	public function add_type()
	{
		$auditorium=$this->input->post('auditorium');
		$halltype=$this->input->post('halltype');
		$amount=$this->input->post('amount');
		

		$data= array('auditorium'=>$auditorium,
			         'halltype' =>$halltype,
					 'amount'=>$amount,
					  'status'=>1);

		$result=$this->addhall_typemodel->type_add($data);
		if($result==true)
		{
			$typ=$this->addhall_typemodel->type_reports();
			$html='<table class="table datatable ">
					<thead>
   
   <tr>
        <th>S.No</th>
        <th>Auditorium</th>
        <th>Hall Type</th>
        <th>Amount</th>
       
    </tr>
    </thead>
					<tbody>';
					
					$i=1;
					foreach ($typ as $a) {
					
					$html.='<tr>
					<td>'. $i++.'</td>
					<td>'. $a['auditorium'].'</td>
					<td>'. $a['halltype'].'</td>
					<td>'. $a['amount'].'</td>
					
					
					</tr>';
					 }

					$html.='</tbody>
					</table>';
		}
		else
		{

			$typ=$this->addhall_typemodel->type_reports();
			$html='<table class="table datatable ">
					<thead>
   
   <tr>
        <th>S.No</th>
        <th>Auditorium</th>
        <th>Hall Type</th>
        <th>Amount</th>
       
    </tr>
    </thead>
					<tbody>';
					
					$i=1;
					foreach ($typ as $a) {
					
					$html.='<tr>
					<td>'. $i++.'</td>
					<td>'. $a['auditorium'].'</td>
					<td>'. $a['halltype'].'</td>
					<td>'. $a['amount'].'</td>
					
					
					</tr>';
					 }

					$html.='</tbody>
					</table>';
			
		}

		echo $html;
	}


	
}	