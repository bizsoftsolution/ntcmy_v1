<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reschedule extends CI_Controller {


	public function __construct()
	{

		parent::__construct();
		if($this->session->userdata('is_logged_in')=='')
		{
			 $this->session->set_flashdata('msg','Login To Continue');
			redirect('login');
		}

		
		$this->load->model('reschedulemodel');
		

	}

	
	public function index()
	{

			
			$this->load->view('includes/header');
			$this->load->view('reschedule');
			$this->load->view('includes/footer');

		
	}

	public function searchcustomer()
	{

		$pnrnumber=strtoupper($this->input->post('pnrnumber'));

		$data=$this->db->where('checkin',1)->where('pnrnumber',$pnrnumber)->get('bookingroom')->result_array();

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
		                    <th>Time</th>
		                    <th>Room Type</th>
		                    <th>No of Rooms</th>
		                    <th>Name</th>
		                    <th>Mobile No</th>
		                    <th>Online Paid Amount</th>
		                    
		                   
		                    
		                </tr>
		            </thead>
		       <tbody>';
		           
		            $i=1;
		            foreach ($data as $a) {
		            	$aa =$a["advance_amount"];
		              
		               $html.=' <tr>
		                    <td>'.$i++.'</td>
		                    <td id="pnr">'.$a["pnrnumber"].'</td>
		                    <td>'.$a["datefrom"].'</td>
		                    <td>'.$a["time"].'</td>
		                    <td id="romtyp">'.$a["room_type"].'</td>
		                    <td>'.$a["noofrooms"].'</td>
		                    <td>'.$a["name"].'</td>
		                    <td>'.$a["mobileno"].'</td>
		                    <td id="admount">'.$a["advance_amount"].'</td>
		                   
		                    
		                                                            
		                </tr>';
		                 }
		                
		           $html.=' </tbody>
		        </table>

		</div>
		</div>

                   <script>
 					var advance=$(".total_advance").html();
 					var adon=$(".adon_amount").html();
 					$(".totaladvance").html(advance);
 					$(".adonamount").html(adon);

 					$("#pay_adv").show();
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
			            <td style="background-color: #E2FFE8; font-weight: bold; color:red;font-size: 14px;">In Valid Reservation Number. Please check!</td>
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


public function payadvanceamount()
{

	$date=$this->input->post('date');
	$time=$this->input->post('time');
	$roomtype=$this->input->post('roomtype');
	$roomno=$this->input->post('roomno');
	$pnr_number=$this->input->post('pnr_number');
	$advanceamount=$this->input->post('advanceamount');


	$data=array('date'=>$date,
				'time'=>$time,
				'roomtype'=>$roomtype,
				'roomno'=>$roomno,
				'pnr_number'=>$pnr_number,
				'advanceamount'=>$advanceamount,
				'checkin'=>1);

	
	$result=$this->reschedulemodel->payadvance($data);

	if($result==true)
	{

		$datas=$this->db->where('checkin',1)->where('pnrnumber',$pnr_number)->get('bookingroom')->result_array();

 			foreach ($datas as $a1)
 			 {
           $aa =$a1["advance_amount"];
            }



		$data=$this->db->where('pnr_number',$pnr_number)->get('payadvance')->result_array();

		// echo"<pre>";
		// print_r($data);


		    if($data)
			{	
										
					

									$html='
									<div class="col-md-6">
      <div style="text-align: center; margin-top: 12px;">
      <h3>Add-on Advance Payment Details</h3>
      </div>

      <div style="margin-bottom: 30px; border-radius: 10px;">
               <table class="table table-striped table-hover" border="0" style="border: 2px solid rgb(225, 225, 225); border-radius: 10px;">
             <thead>
                      <tr>
                          <th>S.No</th>
                          <th>RN</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Amount</th>
                         
                         

                         
                          
                      </tr>
                  </thead>
             <tbody>';
			           
			            $i=1;
			            foreach ($data as $a) {

			            	$total[]=$a["advanceamount"];
			              
			               $html.=' <tr>
			                    <td>'.$i++.'</td>
			                    <td>'.$a["pnr_number"].'</td>
			                    <td>'.$a["date"].'</td>
			                    <td>'.$a["time"].'</td>
			                    <td>'.$a["advanceamount"].'</td>
			                   
			                                                            
			                </tr>';
			                 }
			                
			                
                             $bb=array_sum($total);
			                 $totals=$aa+$bb;
            $html.=' </tbody>
			        </table>
			        </div>

			        


 <div style="margin-top: -8px; font-weight: bold;">

              <div class="col-md-10 text-right">Advance Payment : </div>
              <div class="col-md-2 text-center">'.$bb.'</div>
</div>


  <div style="font-weight: bold;">
  <div class="col-md-10 text-right">Booking Payment : </div><div class="col-md-2 text-center">'.$aa.'</div>
  </div>


  <div style="font-weight: bold;">
  <div class="col-md-10 text-right">Total Advance :</div><div class="col-md-2 text-center total_advance"> '.$totals.'</div>
</div>


 </div>					

 	               <script>
 					var advance=$(".total_advance").html();
 					var adon=$(".adon_amount").html();
 					$(".totaladvance").html(advance);
 					$(".adonamount").html(adon);
 					$("#viewamount").show();
 					 			$(".del1").click(function(){
 						var id=$(this).attr("id");
 						$.post("'.base_url('reschedule/advancedelete').'",{id:id},function(res){
 							alert(res);
 						});
 					});		
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
			            <td style="background-color: #E2FFE8; font-weight: bold; color:red;font-size: 14px;">Online Paid Amount Pay Failed. Please Retry !</td>
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


public function payadon()
{

	$date=$this->input->post('date1');
	$time=$this->input->post('time1');
	$roomtype=$this->input->post('roomtype1');
	$roomno=$this->input->post('roomno1');
	$pnr_number=$this->input->post('pnr_number1');
	$amount=$this->input->post('amount');
	$billno=$this->input->post('billno');
    $particular=$this->input->post('particular');

	$data=array('date'=>$date,
				'time'=>$time,
				'roomtype'=>$roomtype,
				'roomno'=>$roomno,
				'pnr_number'=>$pnr_number,
				'amount'=>$amount,
				'billno'=>$billno,
				'particular'=>$particular,
				'checkin'=>1);

		$result=$this->reschedulemodel->payadons($data);

	if($result==true)
	{

		
		$data=$this->db->where('pnr_number',$pnr_number)->get('payadon')->result_array();

		// echo"<pre>";
		// print_r($data);


		    if($data)
			{	
										
					

									$html='
		<div class="col-md-6">
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
                          <th>Particular</th>
                          <th>Amount</th>
                         
                         

                         
                          
                      </tr>
                  </thead>
                  <tbody>';
			           
			            $i=1;
			            foreach ($data as $a) {

			            	$total[]=$a["amount"];
			              
			               $html.=' <tr>
			                    <td>'.$i++.'</td>
			                    <td>'.$a["pnr_number"].'</td>
			                    <td>'.$a["date"].'</td>
			                    <td>'.$a["time"].'</td>
			                   <td>'.$a['particular'].'</td>
			                    <td>'.$a["amount"].'</td>
			                    
			                                                            
			                </tr>';
			                 }
			                
			                
                             $totals=array_sum($total);
			                 
            $html.=' </tbody>
			        </table>
			        </div>

	

			       <div style="margin-top: -8px; font-weight: bold;">

              <div class="col-md-10 text-right">Total Amount :</div><div class="col-md-2 text-center adon_amount">'.$totals.'</div>
		</div>


 </div>
 				    <script>
 					var advance=$(".total_advance").html();
 					var adon=$(".adon_amount").html();
 					$(".totaladvance").html(advance);
 					$(".adonamount").html(adon);
 					$("#viewamount").show();
 					$(".del2").click(function(){
 						var id=$(this).attr("id");
 						$.post("'.base_url('reschedule/adondelete').'",{id:id},function(res){
 							alert(res);
 						});
 					});
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


public function searchadvanceamount()
{

	$pnr_number=strtoupper($this->input->post('pnrnumber'));

	$datas=$this->db->where('checkin',1)->where('pnrnumber',$pnr_number)->get('bookingroom')->result_array();

 			foreach ($datas as $a1)
 			 {
           $aa =$a1["advance_amount"];
            }



		$data=$this->db->where('checkin',1)->where('pnr_number',$pnr_number)->get('payadvance')->result_array();

		// echo"<pre>";
		// print_r($data);


		    if($data)
			{	
										
					

									$html='
		<div class="col-md-6">
      <div style="text-align: center; margin-top: 12px;">
      <h3>Add-on Advance Payment Details</h3>
      </div>

      <div style="margin-bottom: 30px; border-radius: 10px;">
               <table class="table table-striped table-hover" border="0" style="border: 2px solid rgb(225, 225, 225); border-radius: 10px;">
             <thead>
                      <tr>
                          <th>S.No</th>
                          <th>RN</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Amount</th>
                          
                         

                         
                          
                      </tr>
                  </thead>
             <tbody>';
			           
			            $i=1;
			            foreach ($data as $a) {

			            	$total[]=$a["advanceamount"];
			              
			               $html.=' <tr>
			                    <td>'.$i++.'</td>
			                    <td>'.$a["pnr_number"].'</td>
			                    <td>'.$a["date"].'</td>
			                    <td>'.$a["time"].'</td>
			                    <td>'.$a["advanceamount"].'</td>
			                    
			                                                            
			                </tr>';
			                 }
			                
			                
                             $bb=array_sum($total);
			                 $totals=$aa+$bb;
            $html.=' </tbody>
			        </table>
			        </div>

			        


 <div style="margin-top: -8px; font-weight: bold;">

              <div class="col-md-10 text-right">Advance Payment : </div>
              <div class="col-md-2 text-center">'.$bb.'</div>
</div>


  <div style="font-weight: bold;">
  <div class="col-md-10 text-right">Booking Payment : </div><div class="col-md-2 text-center">'.$aa.'</div>
  </div>


  <div style="font-weight: bold;">
  <div class="col-md-10 text-right">Total Advance :</div><div class="col-md-2 text-center total_advance"> '.$totals.'</div>
</div>


 </div>

 					<script>
 					var advance=$(".total_advance").html();
 					var adon=$(".adon_amount").html();
 					$(".totaladvance").html(advance);
 					$(".adonamount").html(adon);
 					$("#viewamount").show();
 					$(".del3").click(function(){
 						var id=$(this).attr("id");
 						$.post("'.base_url('reschedule/advancedelete').'",{id:id},function(res){
 							alert(res);
 						});
 					});
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


public function searchadon()
{
	$pnr_number=strtoupper($this->input->post('pnrnumber'));

	$data=$this->db->where('checkin',1)->where('pnr_number',$pnr_number)->get('payadon')->result_array();

		// echo"<pre>";
		// print_r($data);


		    if($data)
			{	
										
					

									$html='
		<div class="col-md-6">
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
                          <th>Particular</th>
                          <th>Amount</th>
                         
                         

                         
                          
                      </tr>
                  </thead>
                  <tbody>';
			           
			            $i=1;
			            foreach ($data as $a) {

			            	$total[]=$a["amount"];
			              
			               $html.=' <tr>
			                    <td>'.$i++.'</td>
			                    <td>'.$a["pnr_number"].'</td>
			                    <td>'.$a["date"].'</td>
			                    <td>'.$a["time"].'</td>
			                    <td>'.$a['particular'].'</td>
			                    <td>'.$a["amount"].'</td>
			                   
			                                                            
			                </tr>';
			                 }
			                
			                
                             $totals=array_sum($total);
			                 
            $html.=' </tbody>
			        </table>
			        </div>

	

			       <div style="margin-top: -8px; font-weight: bold;">

              <div class="col-md-10 text-right">Total Amount :</div><div class="col-md-2 text-center adon_amount">'.$totals.'</div>
		</div>


 </div>


                    <script>
 					var advance=$(".total_advance").html();
 					var adon=$(".adon_amount").html();
 					$(".totaladvance").html(advance);
 					$(".adonamount").html(adon);
 					$("#viewamount").show();	
 					$(".del4").click(function(){
 						var id=$(this).attr("id");
 						$.post("'.base_url('reschedule/adondelete').'",{id:id},function(res){
 							alert(res);
 						});
 					});				
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
		
Public function adondelete()
{
	$id=$this->input->post('id');
	echo $id;
}

Public function advancedelete()
{
	$id=$this->input->post('id');
	echo $id;
}
	



		
	



}	