<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addpublic_holidays extends CI_Controller {


	public function __construct()
	{

		parent::__construct();
		if($this->session->userdata('is_logged_in')=='')
		{
			 $this->session->set_flashdata('msg','Login To Continue');
			redirect('login');
		}
		

		
		$this->load->model('holidays_model','person');
		

	}

	
	public function index()
	{

		
			
			
			$this->load->view('includes/header');
			$this->load->view('addpublic_holidays');
			$this->load->view('includes/footer');
			
           
		
	}

	


	public function ajax_list()
	{
		$list = $this->person->get_datatables();
		$data = array();
		$no = $_POST['start'];
		$a=1;
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = $a++;
			$row[] = $person->holidaysdate;
			$row[] = $person->holidays;
					

			
			$row[] = '<a  class="mb-xs mt-xs mr-xs btn btn-success" href="javascript:void()" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i></a>';
				$row[] = '<a class="mb-xs mt-xs mr-xs btn btn-danger" href="javascript:void()" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->person->count_all(),
						"recordsFiltered" => $this->person->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->person->get_by_id($id);
		
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();

		

		$data = array(
			     'holidaysdate' =>$this->input->post('holidaysdate'),
			     'holidays' =>$this->input->post('holidays'),
			    'status' =>1,
			);
		$insert = $this->person->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();

		
		$data = array(
			     'holidaysdate' =>$this->input->post('holidaysdate'),
			     'holidays' =>$this->input->post('holidays'),
			    'status' =>1,
			);
		$this->person->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->person->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}


	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('holidaysdate') == '')
		{
			$data['inputerror'][] = 'holidaysdate';
			$data['error_string'][] = 'Date is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('holidays') == '')
		{
			$data['inputerror'][] = 'holidays';
			$data['error_string'][] = 'Holidays is required';
			$data['status'] = FALSE;
		}


		
		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}



}	