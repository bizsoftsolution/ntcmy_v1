<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_nubemember extends CI_Controller {


	public function __construct()
	{

		parent::__construct();
		if($this->session->userdata('is_logged_in')=='')
		{
			 $this->session->set_flashdata('msg','Login To Continue');
			redirect('login');
		}

		
		$this->load->model('add_nubemembermodel');
		

	}

	
	public function index()
	{

			
			$data['error']='';
			$this->load->view('includes/header');
			$this->load->view('add_nubemember',$data);
			$this->load->view('includes/footer');

		
	}

	      public function uploadnubemember()
            {


			//upload folder path defined here 

            	$config['upload_path'] =  './upload/';

			//Only allow this type of extensions 
            	$config['allowed_types'] = '*';

            	$this->load->library('upload', $config);

			// if any error occurs 

            	if ( ! $this->upload->do_upload('userfile'))
            	{
            		$error = array('error' => $this->upload->display_errors());


            		
            		
			$this->load->view('includes/header');
			$this->load->view('add_nubemember',$error);
			$this->load->view('includes/footer');
            	}
		//if successfully uploaded the file 
            	else
            	{
            		$upload_data = $this->upload->data();
            		$file_name = $upload_data['file_name'];


			//load library phpExcel
            		$this->load->library("Excel");


		//here i used microsoft excel 2007
            		$objReader = PHPExcel_IOFactory::createReader('Excel2007');

		//set to read only
            		$objReader->setReadDataOnly(true);
		//load excel file
            		$objPHPExcel = $objReader->load('upload/'.$file_name);
            		$sheetnumber = 0;
            		foreach ($objPHPExcel->getWorksheetIterator() as $sheet)
            		{

		$s = $sheet->getTitle();	// get the sheet name 

		$sheet= str_replace(' ', '', $s); // remove the spaces between sheet name 
		$sheet= strtolower($sheet); 
		$objWorksheet = $objPHPExcel->getSheetByName($s);

		$lastRow = $objPHPExcel->setActiveSheetIndex($sheetnumber)->getHighestRow(); 
		$sheetnumber++;
		
		
			for($j=2; $j<=$lastRow; $j++)
			{

				$memberid = $objWorksheet->getCellByColumnAndRow(0,$j)->getValue();
				$name = $objWorksheet->getCellByColumnAndRow(1,$j)->getValue();
				
				
				

				if($memberid != '' || $name != '')
				{

					//echo $memberid; 

					
					$excel = array(
						'date'=>date('Y-m-d'),
						'memberid'=>$memberid,
						'name'=>$name,
						'status'=>1);

					// echo "<pre>";
					// print_r($excel);
					$this->db->insert('memberid_list',$excel);
					$result=($this->db->affected_rows()!= 1)? false:true;
					

					
				}
				else
				{
					$this->session->set_flashdata('msg1', 'Failed To Upload!Contents are not Matched');
					redirect('add_nubemember');
				}		
				}// loop ends 

				if($result == true)
					{

						$this->session->set_flashdata('msg', 'Member Details Uploaded Successfully');
						redirect('add_nubemember');
					}
					else
					{
						$this->session->set_flashdata('msg1', 'Member Details Uploading Failed');
						redirect('add_nubemember');
					}

			

		}
	}

}

public function reports()
{
	$data['rep']=$this->db->where('status',1)->get('memberid_list')->result_array();
	        $this->load->view('includes/header');
			$this->load->view('memberreports',$data);
			$this->load->view('includes/footer');

}

	
}	