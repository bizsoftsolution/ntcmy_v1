<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hall_checkin extends CI_Controller {


	public function __construct()
	{

		parent::__construct();
		if($this->session->userdata('is_logged_in')=='')
		{
			 $this->session->set_flashdata('msg','Login To Continue');
			redirect('login');
		}

		
		$this->load->model('hallcheckinmodel');
		

	}

	
	public function index()
	{

			
			$this->load->view('includes/header');
			$this->load->view('hall_checkin');
			$this->load->view('includes/footer');

		
	}

	public function searchpnrnumber()
	{
		$pnr_no=strtoupper($this->input->post('pnrnumber'));

		$data=$this->db->where('check_in',0)->where('ad_status',1)-> where('pnrnumber',$pnr_no)->get('hallbooking')->result_array();

		$currentdate=date('Y-m-d');

			if($data)
			{
					foreach ($data as $res) {
						
					$date1=$res['checkindate']; 
					$datefrom=date('d-m-Y',strtotime($date1));

						$html='<div class="row" style="background-color: rgb(255, 255, 255);">
<div class="col-md-1">
</div>
<div class="col-md-6" style="background-color: rgb(226, 255, 232); margin-bottom: 30px; border-radius: 10px;">
<div style="height:50px; text-align: center;">
<h2>Customer Details</h2> </div>

        <table class="table table-striped table-hover" border="0">
        <tbody>
            <tr>
            <td >Check IN</td>
            <td>:</td>
            <td><b>'.$res['checkindate'].'</b></td>
            </tr>
            
            <tr>
            <td >Check Out</td>
            <td>:</td>
            <td><b>'.$res['checkoutdate'].'</b></td>
            </tr>
                       
            <tr>
            <td >Reservation Number</td>
            <td>:</td>
            <td><b>'.$res['pnrnumber'].'</b> </td>
            </tr>

            <tr>
            <td >Name</td>
            <td>:</td>
            <td><b>'.$res['firstname'].'&nbsp;'.$res['lastname'].' </b> </td>
            </tr>

            <tr>
            <td >Mobile No</td>
            <td>:</td>
            <td><b>'.$res['mobileno'].'</b> </td>
            </tr>

             <tr>
            <td >Email</td>
            <td>:</td>
            <td><b>'.$res['email'].'</b> </td>
            </tr>

             <tr>
            <td >Hall Type</td>
            <td>:</td>
            <td><b>'.$res['halltype'].'</b> </td>
            </tr>

            <tr>
            <td >Slot</td>
            <td>:</td>
            <td><b>'.$res['slot'].'</b> </td>
            </tr>

           

                  
        </tbody>
        </table>';

		if($currentdate==$res['checkindate'])
			{

    	$html.='<div class="col-md-12 text-center" style="margin-bottom: 30px;">
         <a onclick="modals()" class="btn btn-primary"   id="proceed" style="padding: 4px 50px; line-height: 25px;">Book</a>
        </div>';
           }
           else
           {
           	$html.='<div class="col-md-12 text-center" style="margin-bottom: 30px;">
          <span style="color: red; background: white none repeat scroll 0% 0%; padding: 1px 5px; border-radius: 7px; font-weight: bold; font-size: 15px;">Your Check In date is not today.Please Check..</span>
                    <br>
                    <br>
                    
                    Your Check In Date :<span style="font-weight: bold;">'.   $datefrom.'
                    <span>
        </div>';
           }



$html.='</div>
<div class="col-md-5">
<form>
<input type="hidden" name="row2" value="'.$res['checkindate'].'" id="row2">
<input type="hidden" name="row3" value="'.$res['halltype'].'" id="row3">
<input type="hidden" name="row4" value="'.$res['slot'].'" id="row4">
<input type="hidden" name="row5" value="'.$res['pnrnumber'].'" id="row5">
<input type="hidden" name="row6" value="'.$res['hallamount'].'" id="row6">
</form>

</div>
</div>


						

';






		}

		}
		
		else
		{

			$html='

			<div class="row">
					<div class="col-md-1">
			            </div>
			<div class="col-md-4" style="background-color: #E2FFE8; border-radius:7px;">
			
			<div class="panel-body my-table">
			        <table class="table table-striped table-hover">
			        <tbody>
			            <tr>
			            <td style="background-color: #E2FFE8; font-weight: bold; color:red;font-size: 14px;">In Valid Reservation Number. Please check!</td>
			            </tr>
			            
			            
			            
			                        
			                        
			        </tbody>
			        </table>
			        </div>

			</div>
			<div class="col-md-7">
			</div>
			</div>';



		}	

		echo $html;



	}

public function hallcheckinreports()
{
	   $data['checkin']=$this->hallcheckinmodel->checkin_reports();
			$this->load->view('includes/header',$data);
			$this->load->view('hallcheckinreports');
			$this->load->view('includes/footer');
	   // echo "<pre>";
	   // print_r($data['checkin']);
}	

	
		

	



		
	



}	