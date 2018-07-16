<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hall_checkout extends CI_Controller {


	public function __construct()
	{

		parent::__construct();
		if($this->session->userdata('is_logged_in')=='')
		{
			 $this->session->set_flashdata('msg','Login To Continue');
			redirect('login');
		}

		
		$this->load->model('hallcheckoutmodel');

		$this->_hyphen      = '-';
        $this->_separator   = ', ';
        $this->_negative    = 'NEGATIVE ';
        $this->_space       = ' ';
        $this->_conjunction = ' AND ';
        $this->_decimal     = 'CENTS ';
       // $this->_rupees      = ' rupees';
        $this->_only        = ' ONLY';

        // call array of words
		$this->arr_words(); 
		

	}

	
	public function index()
	{

			
			$this->load->view('includes/header');
			$this->load->view('hall_checkout');
			$this->load->view('includes/footer');

		
	}

	public function searchcustomer()
	{

		$pnrnumber=strtoupper($this->input->post('pnrnumber'));

		//$pnrnumber='NUBE00011';

		$data=$this->db->where('checkin',1)->where('pnrnumber',$pnrnumber)->get('hallcheckin')->result_array();

		// echo"<pre>";
		// print_r($data);

		$dataa1=$this->db->where('check_in',1)->where('pnrnumber',$pnrnumber)->get('hallbooking')->result_array();



		if($data)
			{	
										
					foreach ($dataa1 as $aa) 
					{
						$checkoutdate=$aa['checkoutdate'];
		            }

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
		                    <th>C-Out</th>
		                    <th>Slot</th>
		                    <th>Hall Type</th>
		                    <th>Name</th>
		                    <th>Mobile No</th>
		                    <th>Online Paid Amount</th>

		                   
		                    
		                </tr>
		            </thead>
		       <tbody>';
		           
		            $i=1;
		            foreach ($data as $a) {
		            	$aa =$a["advanceamount"];


		            	$date1 = str_replace('-', '/', $a["checkindate"]);
	                   $checkin= date('d/m/Y', strtotime($date1));

	                   $date2 = str_replace('-', '/', $checkoutdate);
	                   $checkout= date('d/m/Y', strtotime($date2));
		              
		               $html.=' <tr>
		                    <td>'.$i++.'</td>
		                    <td id="pnr">'.$a["pnrnumber"].'</td>
		                    <td id="dtfrm">'.$checkin.'</td>
		                     <td id="dtout">'.$checkout.'</td>
		                    <td id="slt">'.$a["slot"].'</td>
		                    <td id="hltyp">'.$a["halltype"].'</td>
		                    <td id="nam">'.$a["firstname"].'</td>
		                    <td id="mob">'.$a["mobileno"].'</td>
		                    <td id="admount">'.$a["advanceamount"].'</td>
		                    
		                                                            
		                </tr>
		                <span style="display:none;" id="hlamnt">'.$a["hallamount"].'</span>
		                
		                ';


		                 }
		                
		           $html.=' </tbody>
		        </table>

		</div>
		</div>

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
			        $("#viewamount").hide();
 				
 					</script>


			
			';

}

echo $html;




	}


public function searchcustomercheckout()
	{

		$pnrnumber=strtoupper($this->input->post('pnrnumber'));

		//$pnrnumber='NUBE00011';

		$data=$this->db->where('checkin',1)->where('pnrnumber',$pnrnumber)->get('hallcheckin')->result_array();

		$data1=$this->db->where('checkin',1)->where('pnr_number',$pnrnumber)->get('hall_payadon')->result_array();

		// echo"<pre>";
		// print_r($data);


		if($data)
			{	
				
				foreach ($data as $row)
				{
					$checkindate=$row['checkindate'];
					$slot=$row['slot'];	
					$halltype=$row['halltype'];	
					$auditorium=$row['auditorium'];
					$advanceamount=$row['advanceamount'];
					$name=$row['firstname'];


				}
//$checkindate='2016-05-23';
				$total[]='0';	
				foreach ($data1 as $row1)
				{
					$total[]=$row1["rate"];


				}

				$totalsa=array_sum($total);
				if($totalsa=='')
				{
					$totals='0';
				}
				else
				{
					$totals=$totalsa;
				}

				$checkoutdate=date('Y-m-d');

				$hallamt =mysql_query("SELECT * FROM halltypes where auditorium='".$auditorium."' and halltype='".$halltype."'")or die(mysql_error());

                                  while($rows = mysql_fetch_array($hallamt))
                                  {

                                    $hallamount=$rows['amount'];
                                    $seats=$rows['seats'];

                                }



						    $date11=date_create($checkindate);
						    $date22=date_create($checkoutdate);
						    $diff=date_diff($date11,$date22);
						    $resus= $diff->format("%a ");
						     if($resus==0)
						    {
						        $resu='1';
						    }
						    else
						    {
						        $resu=$resus+1;
						    }


				if($slot=='Slot I')
                {
                  $totala=$hallamount*$resu; 
                   $total=$totala*1;
                   $one=1; 
                }
                else if($slot=='Slot II')
                {
                  $totala=$hallamount*$resu;
                  $total=$totala*1; 
                    $one=1; 
                }
                else if($slot=='Slot III')
                {
                  $totala=$hallamount*$resu; 
                  $total=$totala*1; 
                  $one=1;  
                }
                else if($slot=='Slot I & II')
                {
                  $totala=$hallamount*$resu; 
                  $total=$totala*2;
                  $one=2; 
                }
                else if($slot=='Slot I & III')
                {
                  $totala=$hallamount*$resu;
                  $total=$totala*2; 
                  $one=2;   
                }
                else if($slot=='Slot II & III')
                {
                  $totala=$hallamount*$resu;
                  $total=$totala*2;  
                  $one=2;  
                }

                 else if($slot=='Slot I & Slot II & III')
                {
                  $totala=$hallamount*$resu;
                  $total=$totala*3;  
                  $one=3;  
                }
            						
	//chairs rent-----
               $chairsrental= $seats *2;
	//-----------	
	//subtotal----------
               $subtotal=$total+$totals+20;
	//
	//gstamount======
             //  $gstamount=(($subtotal *6)/100);
	//

      //grandtotal----------
               $grandtotal=$subtotal;
	//

           
            //servicetax=====
            $servicetaxamount=(($grandtotal*5)/100);
            //

            //totalamunt===
            $totalamount=$grandtotal+$servicetaxamount;
            //==========

	//balanceamount=======

               $html="";

			   $balanceamounts=$advanceamount-$totalamount;
		      if($balanceamounts<0)
		      {
		      	$balanceamountaa=$totalamount-$advanceamount;
		      	$balanceamount=number_format($balanceamountaa, 2, '.', '');
		      	$returnamount="Nill";
		      	$html='
		      	 <script>
		      	 $("#enter_amount").show();
		      	  $("#check_out").hide();
		      	 </script>';
		      }
		      else
		      {
		      		$balanceamount="Nill";
		      	    $returnamount=number_format($balanceamounts, 2, '.', '');
		      	     $html.='
			      	 <script>
			      	 $("#enter_amount").hide();
                     $("#enteramount").val("");
                     $("#check_out").show();
			      	 </script>';
		      }
			 //====================           
             $date1 = str_replace('-', '/', $checkindate);
           $checkindates= date('d/m/Y', strtotime($date1));

			$html.='


			<span class="pnrnumbers" style="display:none;">'.$pnrnumber.'</span>
			<span class="checkindates" style="display:none;">'.$checkindates.'</span>
			<span class="slots" style="display:none;">'.$slot.'</span>
			<span class="names" style="display:none;">'.$name.'</span>
			<span class="halltypes" style="display:none;">'.$halltype.'</span>
			<span class="auditoriums" style="display:none;">'.$auditorium.'</span>

			<div class="row" style="margin-top: 20px; background-color:white;">

<div class="col-md-2">
</div>
  <div class="col-md-8" style="background-color: rgb(241, 245, 249); border: 2px solid rgb(225, 225, 225); border-radius: 10px;margin-bottom: 20px;">
   
            <table border="0" style="width: 100%;">
             
                  <tbody>
                  <tr>
                    <td style="padding: 8px; font-size: 14px;">
                    Auditorium&nbsp;:&nbsp;<strong>'.$auditorium.'</strong><br>
                    Hall Type&nbsp;:&nbsp;<strong>'.$halltype.'</strong><br>
                    Number of Days&nbsp;:&nbsp;<strong>'.$resu.'</strong><br>
                    Amount&nbsp;:&nbsp;<strong>'.number_format($hallamount, 2, '.', '').' x '.$resu.'</strong><br>
                     Slot&nbsp;:&nbsp;<strong>'.$slot.'&nbsp;('.number_format($totala, 2, '.', '').' x '.$one.')</strong><br>


                    </td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;" class="grandtotals">'.number_format($total, 2, '.', '').'</td>
                  </tr >
                   <tr>
                    <td style="font-size: 14px; padding: 8px 0px 8px 8px;">Add-on Amount</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;" class="addonamounts">'.number_format($totals, 2, '.', '').'</td>
                  </tr> 

                  

                  <tr>
                    <td style="font-size: 14px; padding: 8px 0px 8px 8px;">Cleaning Charge(RM 20.00)</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;" class="cleaningcharges">'.number_format(20, 2, '.', '').'</td>
                  </tr> 

                    <tr style="border-bottom: 1px solid rgb(225, 225, 225); border-top: 1px solid rgb(225, 225, 225);">
                    <td style="font-size: 14px; padding: 8px 0px 8px 8px;">Sub Total</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;" class="subtotals">'.number_format($subtotal, 2, '.', '').'</td>
                  </tr> 
                  
                   
                  
                  <tr>
                    <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Grand Total</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;" class="grandtotalss">'.number_format($grandtotal, 2, '.', '').'</td>
                  </tr> 


                  <tr>
                    <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Service Charge @ 5%</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;" class="servicetaxamounts">'.number_format($servicetaxamount, 2, '.', '').'</td>
                  </tr> 
                  
                  <tr>
                    <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Total Amount</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;" class="totalamounts"> '.number_format($totalamount, 2, '.', '').'</td>
                  </tr> 
                  <tr style="border-bottom: 1px solid rgb(225, 225, 225);">
                    <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Online Paid Amount</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;" class="advanceamounts">'.$advanceamount.'</td>
                  </tr> 

                  <tr>
                    <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Balance Amount</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;" class="balanceamounts">'.$balanceamount.'</td>
                  </tr>

                  <tr id="enter_amount">
                    <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Enter Amount</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;"><input type="text" name="enteramount" id="enteramount" class="form-control"></td>
                  </tr>

                  <tr>
                    <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Return Amount</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;" class="returnamounts">'.$returnamount.'</span></td>
                  </tr>   



                  <tr ><table style="margin: 16px 0px;"><tr id="check_out">
                  <td width="150"></td>

                    <td ><button type="button" class="btn btn-primary btn-lg" style="background-color: rgb(15, 180, 15); border-color: rgb(15, 180, 15); font-weight: bold;" onclick="modals();">Check-out</button></td>
                     <td></td></tr></table>
                  </tr>   


                 </tbody>
              </table>




    </div>
    <div class="col-md-2">
</div>

  </div>
  <script>

   $("#enteramount").keyup(function(){
    var balance_amount=$(".balance_amount").val();
    var enteramount=$("#enteramount").val();
    $(".enteramount").val(enteramount);
    
    if(parseFloat(balance_amount)==parseFloat(enteramount))
    {
        $("#check_out").show();
    }
    else
    {
      $("#check_out").hide();
    }

  });

$(".checkindate").html($(".checkindates").html());
$(".slot").html($(".slots").html());
$(".halltype").html($(".halltypes").html());
$(".name").html($(".names").html());
$(".auditorium").html($(".auditoriums").html());
$(".pnrnumber").html($(".pnrnumbers").html());
$(".pnr_number").val($(".pnrnumbers").html());

$(".grandtotal").val($(".grandtotals").html());
$(".subtotal").val($(".subtotals").html());
$(".adonamount").val($(".addonamounts").html());
$(".chairsrental").val($(".chairsrentals").html());
$(".gstamount").val($(".gstamounts").html());
$(".grandtotals").val($(".grandtotalss").html());
$(".servicetaxamount").val($(".servicetaxamounts").html());
$(".total_amount").val($(".totalamounts").html());
$(".advanc_amount").val($(".advanceamounts").html());
$(".balance_amount").val($(".balanceamounts").html());
$(".enteramount").val($("#enteramount").html());
$(".return_amount").val($(".returnamounts").html());
















  </script>';
//customer details end---------
echo $html;
}








	}



public function searchadon()
{
	$pnr_number=strtoupper($this->input->post('pnrnumber'));

	$data=$this->db->where('checkin',1)->where('pnr_number',$pnr_number)->get('hall_payadon')->result_array();

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
									

           
 				   $html.='  <script>
 					
 					var adon=$(".adon_amount").text();
 					$(".adonamount").html(adon);
 					</script>';

			}

			
                    
			else
			{
				$html='<div style="margin-top: -8px; font-weight: bold; display:none;">

              <div class="col-md-10 text-right">Total Amount :</div><div class="col-md-2 text-center adon_amount">0</div>
		</div>';

			}

			echo $html;



}


public function hallcheckout()
{
	

	$pnrnumber=$_POST['pnr_number'];
	

	//echo $pnrnumber;

	$dat=$this->db->where('pnrnumber',$pnrnumber)->get('hallbooking')->result_array();
	
		foreach ($dat as $a) 
		{

			$checkindate=$a['checkindate'];
			$firstname=$a['firstname'];
			$lastname=$a['lastname'];
			$mobileno=$a['mobileno'];
			$email=$a['email'];
			$halltype=$a['halltype'];
			$auditorium=$a['auditorium'];
			$slot=$a['slot'];
			$hallamount=$a['hallamount'];
			$bookingtype=$a['bookingtype'];
			$nubememberid=$a['nubememberid'];
			
		}


			$this->db->limit(1);
		$this->db->order_by('id desc');
		$sss=$this->db->get('checkouthall')->result_array();
	if($sss)
	{	
		foreach ($sss as $sa) 
		{
			$billnumb=$sa['billnumber'];
		}
		
		
			$billnumbe=$billnumb + 1;
			 $billnumber=str_pad($billnumbe, 4, '0', STR_PAD_LEFT);
		
	}
	else
	{				$ininvID=1;
             $billnumber=str_pad($ininvID, 4, '0', STR_PAD_LEFT);
	
	}


		$data=array('checkindate'=>$checkindate,
			        'checkoutdate'=>$_POST['checkoutdate'],
					'pnrnumber'=>$pnrnumber,
					'billnumber'=>$billnumber,
					'firstname'=>$firstname,
					'lastname'=>$lastname,
					'mobileno'=>$mobileno,
					'email'=>$email,
					'auditorium'=>$auditorium,
					'halltype'=>$halltype,
					'slot'=>$slot,
					'hallamount'=>$hallamount,
					'bookingtype'=>$bookingtype,
					'nubememberid'=>$nubememberid,
					'grandtotal'=>$_POST['grandtotal'],
					'grandtotals'=>$_POST['grandtotals'],
					'servicetaxamount'=>$_POST['servicetaxamount'],
					'subtotal'=>$_POST['subtotal'],
					'addonamount'=>$_POST['addonamount'],
					'gst'=>$_POST['gst'],
					'gstamount'=>$_POST['gstamount'],
					'chairsrental'=>$_POST['chairsrental'],
					'cleaningcharge'=>$_POST['cleaningcharge'],
					'totalamount'=>$_POST['totalamount'],
					'advanceamount'=>$_POST['advanceamount'],
					'balanceamount'=>$_POST['balanceamount'],
					'enteramount'=>$_POST['enteramount'],
					'returnamount'=>$_POST['returnamount'],
					'status'=>1);

				$data1=array('check_out'=>1);

				$data2=array('checkin'=>0,
					          'checkout'=>1);

				$data3=array('checkin'=>0);

				$this->db->where('pnrnumber',$pnrnumber);
   	$this->db->update('hallbooking',$data1);

   	$this->db->where('pnrnumber',$pnrnumber);
   	$this->db->update('hallcheckin',$data2);

      

      $dat2=$this->db->where('pnr_number',$pnrnumber)->get('hall_payadon')->result();
      if($dat2)
      {
        $counts=count($dat2);
        for ($j=0; $j <$counts ; $j++) { 
        $this->db->where('pnr_number',$pnrnumber);
        $this->db->update('hall_payadon',$data3);
       }
      }
     
					         
					         // echo "<pre>";
					         // print_r($data);

		 $result=$this->hallcheckoutmodel->checkouthall($data);
		if($result==true)
		{
			$this->session->set_flashdata('msg','Hall checkout sucessfully');
			redirect('hall_checkout/hallbillreceipt');


		}	
		else
		{

			$this->session->set_flashdata('msg1','Hall checkout failed');
			redirect('dashboard');

		}	





}



	function arr_words()
	{
        // array words
		$this->_dictionary   = array(
          "0"                   => 'ZERO',
          "1"                   => 'ONE',
          "2"                   => 'TWO',
          "3"                   => 'THREE',
          "4"                   => 'FOUR',
          "5"                   => 'FIVE',
          "6"                   => 'SIX',
          "7"                   => 'SEVEN',
          "8"                   => 'EIGHT',
          "9"                   => 'NINE',
          "00"                  => 'ZERO ZERO',
          "01"                  => 'ZERO ONE',
          "02"                  => 'ZERO TWO',
          "03"                  => 'ZERO THREE',
          "04"                  => 'ZERO FOUR',
          "05"                  => 'ZERO FIVE',
          "06"                  => 'ZERO SIX',
          "07"                  => 'ZERO SEVEN',
          "08"                  => 'ZERO EIGHT',
          "09"                  => 'ZERO NINE',
          "10"                  => 'TEN',
          "11"                  => 'ELEVEN',
          "12"                  => 'TWELVE',
          "13"                  => 'THIRTEEN',
          "14"                  => 'FOURTEEN',
          "15"                  => 'FIFTEEN',
          "16"                  => 'SIXTEEN',
          "17"                  => 'SEVENTEEN',
          "18"                  => 'EIGHTTEEN',
          "19"                  => 'NINETEEN',
          "20"                  => 'TWENTY',
          "30"                  => 'THIRTY',
          "40"                  => 'FOURTY',
          "50"                  => 'FIFTY',
          "60"                  => 'SIXTY',
          "70"                  => 'SEVENTY',
          "80"                  => 'EIGHTY',
          "90"                  => 'NINETY',
          "100"                 => 'HUNDRED',
          "1000"                => 'THOUSAND',
          "1000000"             => 'MILLION',
          "1000000000"          => 'BILLION',
          "1000000000000"       => 'TRILLION',
          "1000000000000000"    => 'QUADRILLION',
          "1000000000000000000" => 'QUINTILLION'
      );
   } // end function arr_words

   /**  
     * @param $number
    * @param $first
    */
   public function convert_number_to_words($number, $first=true) 
   {
       //check number is number or not
   	if (!is_numeric($number)) {
   		return false;
   	}

   	if (($number >= 0 && intval($number )< 0) || intval($number) < 0 - PHP_INT_MAX) {

          // overflow
   		trigger_error('convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX, E_USER_WARNING);
   		return false;
   	}

       //check number whether is negative or not
       //if it is negative then call the function with positive number
   	if ($number < 0) {
   		return $this->_negative . $this->convert_number_to_words(abs($number));
   	}
       //assign null value to variables
   	$string = $fraction = null;

       // check Decimal place in number
   	if (strpos($number, '.') !== false) {

   		list($number, $fraction) = explode('.', $number);
   	}

   	switch (true) 
   	{
   		case $number < 21:

   		$string = $this->_dictionary["$number"];
   		break;

   		case $number < 100:

   		$tens   = (intval($number / 10)) * 10;
   		$units  = $number % 10;
   		$string = $this->_dictionary["$tens"];

   		if ($units) {
   			$string .= $this->_space . $this->_dictionary["$units"];
   		}
   		break;

   		case $number < 1000:

   		$hundreds  = intval($number / 100);
   		$remainder = $number % 100;
   		$string = $this->_dictionary["$hundreds"] . ' ' .$this->_dictionary["100"];

   		if ($remainder) {
   			$string .= $this->_space . $this->convert_number_to_words($remainder, false);
   		}
   		break;

   		default:

   		$baseUnit = pow(1000, floor(log($number, 1000)));                
   		$numBaseUnits = intval($number / $baseUnit);
   		$remainder = $number % $baseUnit;

   		$string =$this->convert_number_to_words($numBaseUnits, false) . ' ' . $this->_dictionary["$baseUnit"];


   		if ($remainder) {

                     //$string .= $this->_conjunction;
   			$string .=  $this->_space.$this->convert_number_to_words($remainder, false);

   		}

   		break;
   	}

       // start - decimal place
   	if (null !== $fraction && is_numeric($fraction)) {

   		$string .=  $this->_conjunction . $this->_decimal;


        /**
         * if decimal comes 10, 20, 30 ..upto 90. 0 is removing from number.
         * suppose you were not specify decimal place with 2 digits. like 100.5, 3.9
         * so we need CONCAT 0 with number
         * it would come ten twenty..
         */
        if ($fraction < 10)


        	$fraction = $fraction . '';
       			// echo"<pre>";
           //     print_r($fraction);

        $string .= $this->convert_number_to_words($fraction, false);
          		// echo"<pre>";
            //    print_r($string);
              //add only
        $string .= $this->_only;

				// echo"<pre>";
    //            print_r($string);

    }
       // end  - decimal place

       //first time only this condition would execute.
       //without decimal place.
    if ($fraction === null && $first == true) {
    	$string .=  $this->_only;
    }

    return $string;

   } // end function convert_number_to_wo



		
	public function hallbillreceipt()
	{
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$data['bb']=$this->db->get('checkouthall')->result_array();

		foreach ($data['bb'] as $a1) 
		{
			$totalamount=$a1['totalamount'];
			
		}

		$datas =$this->convert_number_to_words($totalamount);

		$data['totalamounts']=$datas;
		// echo "<pre>";
		// print_r($data);

		 $this->load->view('hallbillreceipt',$data);


	}


public function checkoutreports()
{
	$data['out']=$this->hallcheckoutmodel->reportscheckout();
	// echo "<pre>";
	// print_r($data['out']);
	$this->load->view('includes/header');
	$this->load->view('hall_checkoutreports',$data);
	$this->load->view('includes/footer');
}

PUblic function totalreports()
    {
      $data['out']=$this->hallcheckoutmodel->search();
    
      $this->load->view('includes/header');
      $this->load->view('halltotalreports',$data);
      $this->load->view('includes/footer');

    }

    	public function viewdetails()
{
  $id=$this->uri->segment('3');
  $data['details']=$this->db->where('id',$id)->get('checkouthall')->result_array();
  $this->load->view('includes/header');
  $this->load->view('hallcheckoutdetails',$data);
  $this->load->view('includes/footer');
}


public function printdetails()
	{
		$id=$this->uri->segment('3');
  $data['bb']=$this->db->where('id',$id)->get('checkouthall')->result_array();

		foreach ($data['bb'] as $a1) 
		{
			$totalamount=$a1['totalamount'];
			
		}

		$datas =$this->convert_number_to_words($totalamount);

		$data['totalamounts']=$datas;
		// echo "<pre>";
		// print_r($data);

		 $this->load->view('hallbillreceipt',$data);


	}
		



}	