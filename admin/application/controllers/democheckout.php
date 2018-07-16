<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends CI_Controller {


	public function __construct()
	{

		parent::__construct();
		if($this->session->userdata('is_logged_in')=='')
		{
			 $this->session->set_flashdata('msg','Login To Continue');
			redirect('login');
		}

		
		$this->load->model('checkoutmodel');


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
			$this->load->view('checkout');
			$this->load->view('includes/footer');

		
	}

	public function searchcustomer()
	{

		$pnrnumber=strtoupper($this->input->post('pnrnumber'));

		//$pnrnumber='NUBE00011';

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
		                    <th>PNR No</th>
		                    <th>C-In</th>
		                    <th>Time</th>
		                    <th>Room Type</th>
		                    <th>No of Rooms</th>
		                    <th>Room No</th>
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
		                    <td id="dtfrm">'.$a["datefrom"].'</td>
		                    <td id="tm">'.$a["time"].'</td>
		                    <td id="romtyp">'.$a["room_type"].'</td>
		                    <td id="nfrm">'.$a["noofrooms"].'</td>
		                    <td id="romno">'.$a["roomno"].'</td>
		                    <td id="nam">'.$a["name"].'</td>
		                    <td id="mob">'.$a["mobileno"].'</td>
		                    <td id="admount">'.$a["advance_amount"].'</td>
		                    
		                                                            
		                </tr>
		                <span style="display:none;" id="rmamnt">'.$a["roomamount"].'</span>
		                <span style="display:none;" id="ttamt">'.$a["totamount"].'</span>
		                <span style="display:none;" id="totdays"></span>

		                ';


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

 					$("#viewamount").show();
 					


 		var pnr=$("#pnr").text();
       var dtfrm=$("#dtfrm").text();
       var tm=$("#tm").text();
       var romtyp=$("#romtyp").text();
       var nfrm=$("#nfrm").text();
       var romno=$("#romno").text();
       var rmamnt=$("#rmamnt").text();
       var ttamt=$("#ttamt").text();
       var nam=$("#nam").text();
       var mob=$("#mob").text();


    

       $(".pnrnumber").html(pnr);
       $(".pnr_number").val(pnr);
        $(".datefrom").html(dtfrm);
         $(".tims").html(tm);
          $(".roomtype").html(romtyp);
           $(".noofroom").html(nfrm);
            $(".noofroom").val(nfrm);
            $(".roomno").html(romno);
 			 $(".roomamount").html(rmamnt);
              $(".name").html(nam);
               $(".mobile").html(mob);

       //date conversion-----------       

              var date = dtfrm;
              var newdate = date.split("-").reverse().join("/");

              

         var convertDate = function(usDate) {
  var dateParts = usDate.split(/(\d{1,2})\/(\d{1,2})\/(\d{4})/);
  return dateParts[2] + "/" + dateParts[1] + "/" + dateParts[3];
}

var inDate = newdate;
var outDate = convertDate(inDate); 

//time conversion--------------------

var time =tm;
var hours = Number(time.match(/^(\d+)/)[1]);
var minutes = Number(time.match(/:(\d+)/)[1]);
var AMPM = time.match(/\s(.*)$/)[1];
if(AMPM == "pm" && hours<12) hours = hours+12;
if(AMPM == "am" && hours==12) hours = hours-12;
var sHours = hours.toString();
var sMinutes = minutes.toString();
if(hours<10) sHours = "0" + sHours;
if(minutes<10) sMinutes = "0" + sMinutes;

//alert(sHours + ":" + sMinutes);


var totdays=outDate + "," +sHours + ":" + sMinutes + ":00";

$("#totdays").val(totdays);


//days calculation----------------------

	
	var to=$("#totdays").val();

  // Month,Day,Year,Hour,Minute,Second
//alert(countTo);
  upTime(to); 

function upTime(countTo) {
  now = new Date();
  countTo = new Date(countTo);
  difference = (now-countTo);

  days=Math.floor(difference/(60*60*1000*24)*1);
  hours=Math.floor((difference%(60*60*1000*24))/(60*60*1000)*1);
  mins=Math.floor(((difference%(60*60*1000*24))%(60*60*1000))/(60*1000)*1);
  secs=Math.floor((((difference%(60*60*1000*24))%(60*60*1000))%(60*1000))/1000*1);

  document.getElementById("days").firstChild.nodeValue = days;
  document.getElementById("hours").firstChild.nodeValue = hours;
  document.getElementById("minutes").firstChild.nodeValue = mins;
  //document.getElementById("seconds").firstChild.nodeValue = secs;

  clearTimeout(upTime.to);
  upTime.to=function(){ upTime(countTo); };


  if(days=="0")
  {
    day=1;
    $(".day").html(day);
    $(".day").val(day);
  }

  else
  {
    if(days > "0" && hours > "1")
    {
      day=days+1;
     $(".day").html(day);
     $(".day").val(day);
    }

    else
    {
       day=days;
    $(".day").html(day);
    $(".day").val(day);
    }
  }    



}

//calculation-------------------------------

	var nfrm=$("#nfrm").text();
    var rmamnt=$("#rmamnt").text();
    var day=$(".day").html();
    var advance=$(".totaladvance").html();
    var adon=$(".adon_amount").html();
    var advance=$(".total_advance").html();


 //advance amount---- 

    var advances=parseFloat(advance)*parseFloat("1");
     var a01=advances.toFixed(2);
    $(".advanc_amount").html(a01);  
    $(".advanc_amount").val(a01);

//adon amount---

     var adons=parseFloat(adon)*parseFloat("1");
     if(adons=="0")
     {
     	$(".adonamount").html("Nill");
     	$(".adonamount").val("Nill");
     }
     else
     {
     	var a0=adons.toFixed(2);
        $(".adonamount").html(a0);
        $(".adonamount").val(a0);
     }
     

//subtotal1------    

    var rmsubtotal=parseFloat(rmamnt)*parseFloat(nfrm);
    var a1=rmsubtotal.toFixed(2);
    $(".totalamount").html(rmsubtotal);
     $(".subtotal1").html(a1);
     $(".subtotal1").val(a1);


//subtotal2------

     var daytot=parseFloat(rmsubtotal)*parseFloat(day);
      var a2=daytot.toFixed(2);
      $(".subtotal2").html(a2);
       $(".subtotal2").val(a2);
      
//salestax---------
      var stax=((parseFloat(daytot)*parseFloat("14"))/100);
      var a3=stax.toFixed(2);
      $(".stax").html(a3);
      $(".stax").val(a3);
  
 //chss tax------ 

 	  var btax=((parseFloat(daytot)*parseFloat("0.50"))/100);
      var a4=btax.toFixed(2);
      $(".btax").html(a4);
      $(".btax").val(a4);  

//total_amount------

      var total=parseFloat(daytot)+parseFloat(adons)+parseFloat(stax)+parseFloat(btax);
      var a5=total.toFixed(2);
      $(".total_amount").html(a5); 
      $(".total_amount").val(a5); 
      	
//advance - total---------

      var bal=parseFloat(advances)-parseFloat(total);
      if(bal<0)
      {
        var bal1=parseFloat(total)-parseFloat(advances);
         var a6=bal1.toFixed(2);
         $(".balance_amount").html(a6);
         $(".return_amount").html("Nill"); 
          $(".balance_amount").val(a6);
         $(".return_amount").val("Nill"); 
       	  $("#enter_amount").show();
       	  $("#check_out").hide();
      }

      else
      {
      	 var a7=bal.toFixed(2);
         $(".balance_amount").html("Nill");
         $(".return_amount").html(a7);
         $(".balance_amount").val("Nill");
         $(".return_amount").val(a7);
         $("#enter_amount").hide();
         $("#enteramount").val("");
         $("#check_out").show();
      }

     



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
			        $("#viewamount").hide();
 				
 					</script>


			
			';

}

echo $html;




	}




public function searchadvanceamount()
{

	$pnr_number=strtoupper($this->input->post('pnrnumber'));

	$datas=$this->db->where('checkin',1)->where('pnrnumber',$pnr_number)->get('bookingroom')->result_array();

	if($datas)
	{
		foreach ($datas as $a1)
 			 {
           $aa =$a1["advance_amount"];
            }

	}
	else
	{
		$aa='';
	}

 			



		$data=$this->db->where('checkin',1)->where('pnr_number',$pnr_number)->get('payadvance')->result_array();

		// echo"<pre>";
		// print_r($data);


		    if($data)
			{	
										
					

									$html='
		<div class="col-md-6">
      <div style="text-align: center; margin-top: 12px;">
      <h3>Advance Payment Details</h3>
      </div>

      <div style="margin-bottom: 30px; border-radius: 10px;">
               <table class="table table-striped table-hover" border="0" style="border: 2px solid rgb(225, 225, 225); border-radius: 10px;">
             <thead>
                      <tr>
                          <th>S.No</th>
                          <th>PNR No</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Room No</th>
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
			                    <td>'.$a["roomno"].'</td>
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
 					</script>




 ';



	}

			else
			{
				
				$html=' <div style="font-weight: bold; display:none;">
  <div class="col-md-10 text-right">Total Advance :</div><div class="col-md-2 text-center total_advance"> '.$aa.'</div>
</div>';

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
                          <th>PNR No</th>
                          <th>Date</th>
                          <th>Time</th>
                          <th>Room No</th>
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
			                    <td>'.$a["roomno"].'</td>
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
 					</script>






 ';

			}

			else
			{
				$html='<div style="margin-top: -8px; font-weight: bold; display:none;">

              <div class="col-md-10 text-right">Total Amount :</div><div class="col-md-2 text-center adon_amount">0</div>
		</div>';

			}

			echo $html;



}


public function roomcheckout()
{
	

	$pnrnumber=$_POST['pnr_number'];
	

	//echo $pnrnumber;

	$dat=$this->db->where('pnrnumber',$pnrnumber)->get('bookingroom')->result_array();
	
		foreach ($dat as $a) 
		{

			$datefrom=$a['datefrom'];
			$time=$a['time'];
			$roomno=$a['roomno'];
			$name=$a['name'];
			$email=$a['email'];
			$mobileno=$a['mobileno'];
			$room_type=$a['room_type'];
			$roomtypeid=$a['roomtypeid'];		
		}


		$this->db->limit(1);
		$this->db->order_by('id desc');
		$sss=$this->db->get('checkoutroom')->result_array();
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
             $billnumber=str_pad($invID, 4, '0', STR_PAD_LEFT);
	
	}	

		//echo $billnumber;

		$data=array('checkindate'=>$datefrom,
					'checkintime'=>$time,
					'checkoutdate'=>$_POST['checkoutdate'],
					'checkouttime'=>$_POST['time'],
					'pnrnumber'=>$pnrnumber,
					'billnumber'=>$billnumber,
					'roomno'=>$roomno,
					'name'=>$name,
					'email'=>$email,
					'mobileno'=>$mobileno,
					'room_type'=>$room_type,
					'roomtypeid'=>$roomtypeid,
					'noofdays'=>$_POST['noofdays'],
					'noofroom'=>$_POST['noofroom'],
					'subtotal'=>$_POST['subtotal'],
					'total'=>$_POST['total'],
					'addonamount'=>$_POST['addonamount'],
					'servicetax'=>$_POST['servicetax'],
					'bharatcesstax'=>$_POST['bharatcesstax'],
					'servicetaxamount'=>$_POST['servicetaxamount'],
					'bharatcesstaxamount'=>$_POST['bharatcesstaxamount'],
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
					         

		 $result=$this->checkoutmodel->checkoutroom($data,$data1,$data2,$data3,$pnrnumber);
		if($result==true)
		{

			$this->session->set_flashdata('msg','Room checkout sucessfully');
			redirect('checkout/printbillreceipt');


		}	
		else
		{

			$this->session->set_flashdata('msg1','Room checkout failed');
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

   } // end function convert_number_to_words
        // end class



public function printbillreceipt()
	{
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$data['bb']=$this->db->get('checkoutroom')->result_array();

		foreach ($data['bb'] as $a1) 
		{
			$totalamounts=$a1['totalamount'];
			
		}

		$datas =$this->convert_number_to_words($totalamounts);

		$data['totalamounts']=$datas;

		// $data['aa']=$datas;
		// echo "<pre>";
		// print_r($data['bb']);

		$this->load->view('billreceipt',$data);


	}


public function checkoutreports()
{
	$data['out']=$this->checkoutmodel->reportscheckout();
	// echo "<pre>";
	// print_r($data['out']);
	$this->load->view('includes/header');
	$this->load->view('checkoutreports',$data);
	$this->load->view('includes/footer');
}
		



}	