<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addroom_type extends CI_Controller {


	public function __construct()
	{

		parent::__construct();
		if($this->session->userdata('is_logged_in')=='')
		{
			 $this->session->set_flashdata('msg','Login To Continue');
			redirect('login');
		}

		
		$this->load->model('addroom_typemodel');
		

	}

	
	public function index()
	{

			$data['typ']=$this->addroom_typemodel->type_reports();
			$data['rom']=$this->addroom_typemodel->room_reports();
		
			$this->load->view('includes/header');
			$this->load->view('addroom_type',$data);
			$this->load->view('includes/footer');

		
	}

	public function add_type()
	{
		$roomtype=$this->input->post('roomtype');
		$memberweekdaysamount=$this->input->post('memberweekdaysamount');
		$memberweekendamount=$this->input->post('memberweekendamount');
		$publicweekdaysamount=$this->input->post('publicweekdaysamount');
		$publicweekendamount=$this->input->post('publicweekendamount');


		$data= array('roomtype' =>$roomtype,
					 'memberweekdaysamount'=>$memberweekdaysamount,
					 'memberweekendamount'=>$memberweekendamount,
					 'publicweekdaysamount'=>$publicweekdaysamount,
					 'publicweekendamount'=>$publicweekendamount,
					 'status'=>1);

		$result=$this->addroom_typemodel->type_add($data);
		if($result==true)
		{
			$typ=$this->addroom_typemodel->type_reports();
			$html='<table class="table datatable ">
					<thead>
    <tr>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th colspan="2" style="text-align: center;">NUBE / Ecopark Members</th>
        
        <th colspan="2" style="text-align: center;">Public</th>
        <th colspan="2" style="text-align: center;">Options</th>
        
    </tr>
    <tr>
        <th>S.No</th>
        <th>Room Type</th>
        <th>Weekdays(RM)</th>
        <th>Weekend(RM)</th>
        <th>Weekdays(RM)</th>
        <th>Weekend(RM)</th>
        <th>Edit</th>
       
    </tr>
    </thead>
					<tbody>';
					
					$i=1;
					foreach ($typ as $a) {
					
					$html.='<tr>
					<td>'. $i++.'</td>
					<td>'. $a['roomtype'].'</td>
					<td>'. $a['memberweekdaysamount'].'</td>
					<td>'. $a['memberweekendamount'].'</td>
					<td>'. $a['publicweekdaysamount'].'</td>
					<td>'. $a['publicweekendamount'].'</td>
					<td> 
					    <a href="#edit'.$a["id"].'"
					        data-toggle="modal" class="btn btn-primary btn-rounded">Edit</a>

					</td>
					
					
					</tr>';
					 }

					$html.='</tbody>
					</table>';
		}
		else
		{

			$typ=$this->addroom_typemodel->type_reports();
			$html='<table class="table datatable ">
					<thead>
    <tr>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th colspan="2" style="text-align: center;">NUBE / Ecopark Members</th>
        
        <th colspan="2" style="text-align: center;">Public</th>
        
    </tr>
    <tr>
        <th>S.No</th>
        <th>Room Type</th>
        <th>Weekdays(RM)</th>
        <th>Weekend(RM)</th>
        <th>Weekdays(RM)</th>
        <th>Weekend(RM)</th>
        <th>Edit</th>
        
    </tr>
    </thead>
					<tbody>';
					
					$i=1;
					foreach ($typ as $a) {
					
					$html.='<tr>
					<td>'. $i++.'</td>
					<td>'. $a['roomtype'].'</td>
					<td>'. $a['memberweekdaysamount'].'</td>
					<td>'. $a['memberweekendamount'].'</td>
					<td>'. $a['publicweekdaysamount'].'</td>
					<td>'. $a['publicweekendamount'].'</td>
					<td> 
					    <a href="#edit'.$a["id"].'"
					        data-toggle="modal" class="btn btn-primary btn-rounded">Edit</a>

					</td>
					
					

					</tr>';
					 }

					$html.='</tbody>
					</table>';
			
		}

		echo $html;
	}


	public function edit_type()
	{

		// echo "<pre>";
		// print_r($_POST);
		$id=$this->input->post('id');
		$roomtype=$this->input->post('roomtype');
		$memberweekdaysamount=$this->input->post('memberweekdaysamount');
		$memberweekendamount=$this->input->post('memberweekendamount');
		$publicweekdaysamount=$this->input->post('publicweekdaysamount');
		$publicweekendamount=$this->input->post('publicweekendamount');


		$data= array('roomtype' =>$roomtype,
					 'memberweekdaysamount'=>$memberweekdaysamount,
					 'memberweekendamount'=>$memberweekendamount,
					 'publicweekdaysamount'=>$publicweekdaysamount,
					 'publicweekendamount'=>$publicweekendamount,
					);

		$result=$this->addroom_typemodel->type_update($data,$id);
		if($result==true)
		{
			$typ=$this->addroom_typemodel->type_reports();
			$html='<table class="table datatable ">
					<thead>
    <tr>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th colspan="2" style="text-align: center;">NUBE / Ecopark Members</th>
        
        <th colspan="2" style="text-align: center;">Public</th>
        <th colspan="2" style="text-align: center;">Options</th>
        
    </tr>
    <tr>
        <th>S.No</th>
        <th>Room Type</th>
        <th>Weekdays(RM)</th>
        <th>Weekend(RM)</th>
        <th>Weekdays(RM)</th>
        <th>Weekend(RM)</th>
        <th>Edit</th>
        
    </tr>
    </thead>
					<tbody>';
					
					$i=1;
					foreach ($typ as $a) {
					
					$html.='<tr>
					<td>'. $i++.'</td>
					<td>'. $a['roomtype'].'</td>
					<td>'. $a['memberweekdaysamount'].'</td>
					<td>'. $a['memberweekendamount'].'</td>
					<td>'. $a['publicweekdaysamount'].'</td>
					<td>'. $a['publicweekendamount'].'</td>
					<td> 
					    <a href="#edit'.$a["id"].'"
					        data-toggle="modal" class="btn btn-primary btn-rounded">Edit</a>

					</td>
					
					
					</tr>';
					 }

					$html.='</tbody>
					</table>';
		}
		else
		{

			$typ=$this->addroom_typemodel->type_reports();
			$html='<table class="table datatable ">
					<thead>
    <tr>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th colspan="2" style="text-align: center;">NUBE / Ecopark Members</th>
        
        <th colspan="2" style="text-align: center;">Public</th>
        <th colspan="2" style="text-align: center;">Options</th>
        
    </tr>
    <tr>
        <th>S.No</th>
        <th>Room Type</th>
        <th>Weekdays(RM)</th>
        <th>Weekend(RM)</th>
        <th>Weekdays(RM)</th>
        <th>Weekend(RM)</th>
        <th>Edit</th>
       
    </tr>
    </thead>
					<tbody>';
					
					$i=1;
					foreach ($typ as $a) {
					
					$html.='<tr>
					<td>'. $i++.'</td>
					<td>'. $a['roomtype'].'</td>
					<td>'. $a['memberweekdaysamount'].'</td>
					<td>'. $a['memberweekendamount'].'</td>
					<td>'. $a['publicweekdaysamount'].'</td>
					<td>'. $a['publicweekendamount'].'</td>
					<td> 
					    <a href="#edit'.$a["id"].'"
					        data-toggle="modal" class="btn btn-primary btn-rounded">Edit</a>

					</td>
					
					

					</tr>';
					 }

					$html.='</tbody>
					</table>';
			
		}

		echo $html;
	}

	public function delete_type()
	{

		// echo "<pre>";
		// print_r($_POST);
		$id=$this->input->post('id');
		
		$result=$this->addroom_typemodel->type_delete($id);
		if($result==true)
		{
			$typ=$this->addroom_typemodel->type_reports();
			$html='<table class="table datatable ">
					<thead>
    <tr>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th colspan="2" style="text-align: center;">NUBE / Ecopark Members</th>
        
        <th colspan="2" style="text-align: center;">Public</th>
        <th colspan="2" style="text-align: center;">Options</th>
        
    </tr>
    <tr>
        <th>S.No</th>
        <th>Room Type</th>
        <th>Weekdays(RM)</th>
        <th>Weekend(RM)</th>
        <th>Weekdays(RM)</th>
        <th>Weekend(RM)</th>
        <th>Edit</th>
        
    </tr>
    </thead>
					<tbody>';
					
					$i=1;
					foreach ($typ as $a) {
					
					$html.='<tr>
					<td>'. $i++.'</td>
					<td>'. $a['roomtype'].'</td>
					<td>'. $a['memberweekdaysamount'].'</td>
					<td>'. $a['memberweekendamount'].'</td>
					<td>'. $a['publicweekdaysamount'].'</td>
					<td>'. $a['publicweekendamount'].'</td>
					<td> 
					    <a href="#edit'.$a["id"].'"
					        data-toggle="modal" class="btn btn-primary btn-rounded">Edit</a>

					</td>
					
					
					</tr>';
					 }

					$html.='</tbody>
					</table>';
		}
		else
		{

			$typ=$this->addroom_typemodel->type_reports();
			$html='<table class="table datatable ">
					<thead>
    <tr>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
        <th colspan="2" style="text-align: center;">NUBE / Ecopark Members</th>
        
        <th colspan="2" style="text-align: center;">Public</th>
        <th colspan="2" style="text-align: center;">Options</th>
        
    </tr>
    <tr>
        <th>S.No</th>
        <th>Room Type</th>
        <th>Weekdays(RM)</th>
        <th>Weekend(RM)</th>
        <th>Weekdays(RM)</th>
        <th>Weekend(RM)</th>
        <th>Edit</th>
       
    </tr>
    </thead>
					<tbody>';
					
					$i=1;
					foreach ($typ as $a) {
					
					$html.='<tr>
					<td>'. $i++.'</td>
					<td>'. $a['roomtype'].'</td>
					<td>'. $a['memberweekdaysamount'].'</td>
					<td>'. $a['memberweekendamount'].'</td>
					<td>'. $a['publicweekdaysamount'].'</td>
					<td>'. $a['publicweekendamount'].'</td>
					<td> 
					    <a href="#edit'.$a["id"].'"
					        data-toggle="modal" class="btn btn-primary btn-rounded">Edit</a>

					</td>
					
					

					</tr>';
					 }

					$html.='</tbody>
					</table>';
			
		}

		echo $html;
	}

	public function add_room()
	{
		$roomtypeid=$this->input->post('roomtypeid');
		$drombedtype=$this->input->post('drombedtype');
		$roomno=$this->input->post('roomno');


		$data= array('roomtypeid' =>$roomtypeid ,
					  'roomno'=>$roomno,
					  'drombed'=>$drombedtype,
					  'status'=>1);

		$result=$this->addroom_typemodel->room_add($data);
		if($result==true)
		{
			$rom=$this->addroom_typemodel->room_reports();
			$html='<table class="table datatable ">
					<thead>
    
    <tr>
        <th>S.No</th>
        <th>Room Type</th>
        <th>Room No</th>
         <th>Edit</th>
        
    </tr>
    </thead>
					<tbody>';
					
					$i=1;
					foreach ($rom as $b) {

						$dat=$this->db->where('status',1)->where('id',$b['roomtypeid'])->get('roomtypes')->result_array();
						foreach ($dat as $c)
							$roomtype=$c['roomtype'];
					
					$html.='<tr>
					<td>'. $i++.'</td>
					<td>'. $roomtype.'</td>
					<td>'. $b['roomno'].'</td>
					<td> 
					    <a href="#editr'.$b["id"].'"
					        data-toggle="modal" class="btn btn-primary btn-rounded">Edit</a>

					</td>
					
					

					</tr>';
					 }

					$html.='</tbody>
					</table>';
		}
		else
		{

			$rom=$this->addroom_typemodel->room_reports();
			$html='<table class="table datatable ">
					<thead>
   
    <tr>
        <th>S.No</th>
        <th>Room Type</th>
        <th>Room No</th>
         <th>Edit</th>
        
    </tr>
    </thead>
					<tbody>';
					
					$i=1;
					foreach ($rom as $b) {
					
					$dat=$this->db->where('status',1)->where('id',$b['roomtypeid'])->get('roomtypes')->result_array();
						foreach ($dat as $c)
							$roomtype=$c['roomtype'];
					
					$html.='<tr>
					<td>'. $i++.'</td>
					<td>'. $roomtype.'</td>
					<td>'. $b['roomno'].'</td>
					<td> 
					    <a href="#editr'.$b["id"].'"
					        data-toggle="modal" class="btn btn-primary btn-rounded">Edit</a>

					</td>
					
					
					
					</tr>';
					 }

					$html.='</tbody>
					</table>';
			
		}

		echo $html;
	}


	public function edit_room()
	{

		$id=$this->input->post('id');
		$roomtypeid=$this->input->post('roomtypeid');
		$roomno=$this->input->post('roomno');


		$data= array('roomtypeid' =>$roomtypeid ,
					  'roomno'=>$roomno
					 );

		$result=$this->addroom_typemodel->room_update($data,$id);
		if($result==true)
		{
			$rom=$this->addroom_typemodel->room_reports();
			$html='<table class="table datatable ">
					<thead>
    
    <tr>
        <th>S.No</th>
        <th>Room Type</th>
        <th>Room No</th>
         <th>Edit</th>
       
    </tr>
    </thead>
					<tbody>';
					
					$i=1;
					foreach ($rom as $b) {

						$dat=$this->db->where('status',1)->where('id',$b['roomtypeid'])->get('roomtypes')->result_array();
						foreach ($dat as $c)
							$roomtype=$c['roomtype'];
					
					$html.='<tr>
					<td>'. $i++.'</td>
					<td>'. $roomtype.'</td>
					<td>'. $b['roomno'].'</td>
					<td> 
					    <a href="#editr'.$b["id"].'"
					        data-toggle="modal" class="btn btn-primary btn-rounded">Edit</a>

					</td>
					
					

					</tr>';
					 }

					$html.='</tbody>
					</table>';
		}
		else
		{

			$rom=$this->addroom_typemodel->room_reports();
			$html='<table class="table datatable ">
					<thead>
   
    <tr>
        <th>S.No</th>
        <th>Room Type</th>
        <th>Room No</th>
        <th>Edit</th>
        
    </tr>
    </thead>
					<tbody>';
					
					$i=1;
					foreach ($rom as $b) {
					
					$dat=$this->db->where('status',1)->where('id',$b['roomtypeid'])->get('roomtypes')->result_array();
						foreach ($dat as $c)
							$roomtype=$c['roomtype'];
					
					$html.='<tr>
					<td>'. $i++.'</td>
					<td>'. $roomtype.'</td>
					<td>'. $b['roomno'].'</td>
					<td> 
					    <a href="#editr'.$b["id"].'"
					        data-toggle="modal" class="btn btn-primary btn-rounded">Edit</a>

					</td>
					
					
					
					</tr>';
					 }

					$html.='</tbody>
					</table>';
			
		}

		echo $html;
	}

	public function delete_room()
	{

		$id=$this->input->post('id');
		

		$result=$this->addroom_typemodel->room_delete($id);
		if($result==true)
		{
			$rom=$this->addroom_typemodel->room_reports();
			$html='<table class="table datatable ">
					<thead>
    
    <tr>
        <th>S.No</th>
        <th>Room Type</th>
        <th>Room No</th>
         <th>Edit</th>
        
    </tr>
    </thead>
					<tbody>';
					
					$i=1;
					foreach ($rom as $b) {

						$dat=$this->db->where('status',1)->where('id',$b['roomtypeid'])->get('roomtypes')->result_array();
						foreach ($dat as $c)
							$roomtype=$c['roomtype'];
					
					$html.='<tr>
					<td>'. $i++.'</td>
					<td>'. $roomtype.'</td>
					<td>'. $b['roomno'].'</td>
					<td> 
					    <a href="#editr'.$b["id"].'"
					        data-toggle="modal" class="btn btn-primary btn-rounded">Edit</a>

					</td>
					

					</tr>';
					 }

					$html.='</tbody>
					</table>';
		}
		else
		{

			$rom=$this->addroom_typemodel->room_reports();
			$html='<table class="table datatable ">
					<thead>
   
    <tr>
        <th>S.No</th>
        <th>Room Type</th>
        <th>Room No</th>
        <th>Edit</th>
       
    </tr>
    </thead>
					<tbody>';
					
					$i=1;
					foreach ($rom as $b) {
					
					$dat=$this->db->where('status',1)->where('id',$b['roomtypeid'])->get('roomtypes')->result_array();
						foreach ($dat as $c)
							$roomtype=$c['roomtype'];
					
					$html.='<tr>
					<td>'. $i++.'</td>
					<td>'. $roomtype.'</td>
					<td>'. $b['roomno'].'</td>
					<td> 
					    <a href="#editr'.$b["id"].'"
					        data-toggle="modal" class="btn btn-primary btn-rounded">Edit</a>

					</td>
				
					
					
					</tr>';
					 }

					$html.='</tbody>
					</table>';
			
		}

		echo $html;
	}

}	