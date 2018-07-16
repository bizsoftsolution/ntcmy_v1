<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hall_reschedule extends CI_Controller {


	public function __construct()
	{

		parent::__construct();
		if($this->session->userdata('is_logged_in')=='')
		{
			 $this->session->set_flashdata('msg','Login To Continue');
			redirect('login');
		}

		
		$this->load->model('hallreschedulemodel');
		

	}

	
	public function index()
	{

			
			$this->load->view('includes/header');
			$this->load->view('hall_reschedule');
			$this->load->view('includes/footer');

		
	}

	public function searchcustomer()
	{

		$pnrnumber=strtoupper($this->input->post('pnrnumber'));

		$data=$this->db->where('checkin',1)->where('pnrnumber',$pnrnumber)->get('hallcheckin')->result_array();

		// echo"<pre>";
		// print_r($data);


		if($data)
			{	
										
					

						$html='
		<div class="row">
		<div class="col-md-12">
		<div style="text-align: center;margin-top: 7px;">
		<h3>Customer Details</h3> 
		</div>
		</div>
		</div>

		<div class="row" style="background-color: rgb(255, 255, 255);">

		<div class="col-md-12" style="margin-bottom: -22px; border-radius: 10px;">
		         <table class="table table-striped table-hover" border="0" style="border: 2px solid rgb(225, 225, 225); border-radius: 10px;">
		        <thead>
		                <tr>
		                    <th>S.No</th>
		                    <th>RN</th>
		                    <th>C-In</th>
		                    <th>Hall Type</th>
		                    <th>Slot</th>
		                    <th>Name</th>
		                    <th>Mobile No</th>
		                    <th>Online Paid Amount</th>
		                    <th>Seats</th>

		                   
		                    
		                </tr>
		            </thead>
		       <tbody>';
		           
		            $i=1;
		            foreach ($data as $a) {
		            	$aa =$a["advanceamount"];
		              
		               $html.=' <tr>
		                    <td>'.$i++.'</td>
		                    <td id="pnr">'.$a["pnrnumber"].'</td>
		                    <td>'.$a["checkindate"].'</td>
		                    <td id="haltyp">'.$a["halltype"].'</td>
		                    <td id="slt">'.$a["slot"].'</td>
		                    <td>'.$a["firstname"].'</td>
		                    <td>'.$a["mobileno"].'</td>
		                    <td id="admount">'.$a["advanceamount"].'</td>
		                    <td id="seats">'.$a["seats"].'</td>
		                    
		                                                            
		                </tr>';
		                 }
		                
		           $html.=' </tbody>
		        </table>

		</div>
		</div>

                   <script>
 					
 					var adon=$(".adon_amount").html();
 					
 					$(".adonamount").html(adon);

 					
 					$("#ad_on").show();
 					
 					</script>







		';
//customer details end---------

}

else
{

	$html='

			<div class="row">
					<div class="col-md-1">
			            </div>
			<div class="col-md-5" style="background-color: #E2FFE8; border-radius:7px;">
			
			<div class="panel-body my-table">
			        <table class="table table-striped table-hover">
			        <tbody>
			            <tr>
			            <td style="background-color: #E2FFE8; font-weight: bold; color:red;font-size: 14px;">In Valid PNR Number. Please check!</td>
			            </tr>
			            
			            
			            
			                        
			                        
			        </tbody>
			        </table>
			        </div>

			</div>
			<div class="col-md-6">
			</div>
			</div>
					<script>
			        $("#pay_adv").hide();
 					$("#ad_on").hide();
 					</script>


			
			';

}

echo $html;




	}




public function payadon()
{

	$date=$this->input->post('date1');
	$time=$this->input->post('time1');
	$halltype=$this->input->post('halltype1');
	$slot=$this->input->post('slot1');
	$pnr_number=$this->input->post('pnr_number1');
	

        $facilities=$this->input->post('facilities');
		$rate=$this->input->post('rate');
		$hours=$this->input->post('hours');
	
		 $count=count($facilities);

					for ($i=0; $i <$count ; $i++) { 
		    	$data=array('date'=>$date,
				'time'=>$time,
				'halltype'=>$halltype,
				'slot'=>$slot,
				'pnr_number'=>$pnr_number,
				'facilities'=>$facilities[$i],
				'rate'=>$rate[$i],
				'hours'=>$hours[$i],
				'checkin'=>1);


		$result=$this->hallreschedulemodel->payadons($data);

	}

	if($result==true)
	{

		
		$data=$this->db->where('pnr_number',$pnr_number)->get('hall_payadon')->result_array();

		// echo"<pre>";
		// print_r($data);


		    if($data)
			{	
										
				
						
				

									$html='
		<div class="col-md-12">
      <div style="text-align: center; margin-top: 12px;">
      <h3>Add-on Details</h3>
      </div>

      <div style="margin-bottom: 30px; border-radius: 10px;">
              <table class="table table-striped table-hover" border="0" style="border: 2px solid rgb(225, 225, 225); border-radius: 10px;">
              <thead>
                      <tr>
                          <th>S.No</th>
                          <th>RN</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Hall Type</th>
                          <th>Slot</th>
                          <th>Facilities</th>
                          <th>Amount</th>
                         <th>Hours</th>
                         

                         
                          
                      </tr>
                  </thead>
                  <tbody>';
			           
			            $i=1;
			            foreach ($data as $a) {

			            	$total[]=$a["rate"];
			              
			               $html.=' <tr>
			                    <td>'.$i++.'</td>
			                    <td>'.$a["pnr_number"].'</td>
			                    <td>'.$a["date"].'</td>
			                    <td>'.$a["time"].'</td>
			                    <td>'.$a["halltype"].'</td>
			                     <td>'.$a["slot"].'</td>
			                    <td>'.$a['facilities'].'</td>
			                    <td>'.$a["rate"].'</td>
			                     <td>'.$a["hours"].'</td>
			                    
			                                                            
			                </tr>';
			                 }
			                
			                
                             $totals=array_sum($total);
			                 
            $html.=' </tbody>
			        </table>
			        </div>

	

			       <div style="margin-top: -8px; font-weight: bold;">

              <div class="col-md-10 text-right">Total Amount :</div><div class="col-md-2 text-center adon_amount">'.$totals.'</div>
		</div>


 </div>';
									

           
 				   $html.=' <script>
 				
 					var adon=$(".adon_amount").html();
 					
 					$(".adonamount").html(adon);
 					$("#viewamount").show();
 					
 					</script>

 						';

			}

			else
			{
				$html='';

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
			            <td style="background-color: #E2FFE8; font-weight: bold; color:red;font-size: 14px;">Advance Add-on Failed. Please Retry !</td>
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


	


public function searchadon()
{
	$pnr_number=strtoupper($this->input->post('pnrnumber'));

	//$pnr_number='nube_hall00001';

	$data=$this->db->where('checkin',1)->where('pnr_number',$pnr_number)->get('hall_payadon')->result_array();

		
		
if($data)
			{	
										
				
						
				

									$html='
		<div class="col-md-12">
      <div style="text-align: center; margin-top: 12px;">
      <h3>Add-on Details</h3>
      </div>

      <div style="margin-bottom: 30px; border-radius: 10px;">
              <table class="table table-striped table-hover" border="0" style="border: 2px solid rgb(225, 225, 225); border-radius: 10px;">
              <thead>
                      <tr>
                          <th>S.No</th>
                          <th>RN</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Hall Type</th>
                          <th>Slot</th>
                          <th>Facilities</th>
                          <th>Amount</th>
                          <th>Hours</th>
                         

                         
                          
                      </tr>
                  </thead>
                  <tbody>';
			           
			            $i=1;
			            foreach ($data as $a) {

			            	$total[]=$a["rate"];
			              
			               $html.=' <tr>
			                    <td>'.$i++.'</td>
			                    <td>'.$a["pnr_number"].'</td>
			                    <td>'.$a["date"].'</td>
			                    <td>'.$a["time"].'</td>
			                    <td>'.$a["halltype"].'</td>
			                     <td>'.$a["slot"].'</td>
			                    <td>'.$a['facilities'].'</td>
			                    <td>'.$a["rate"].'</td>
			                     <td>'.$a["hours"].'</td>
			                                                            
			                </tr>';
			                 }
			                
			                
                             $totals=array_sum($total);
			                 
            $html.=' </tbody>
			        </table>
			        </div>

	

			       <div style="margin-top: -8px; font-weight: bold;">

              <div class="col-md-10 text-right">Total Amount :</div><div class="col-md-2 text-center adon_amount">'.$totals.'</div>
		</div>


 </div>';
									

           
 				   $html.=' <script>
 				
 					var adon=$(".adon_amount").html();
 					
 					$(".adonamount").html(adon);
 					$("#viewamount").show();
 					
 					</script>

 						';

			}

			else
			{
				$html='<script>
					$("#viewamount").hide();					
 					</script>';

			}

			echo $html;



}
		

	



		
	



}	