<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hallbooking extends CI_Controller {


	public function __construct()
	{

		parent::__construct();
		if($this->session->userdata('is_logged_in')=='')
		{
			 $this->session->set_flashdata('msg','Login To Continue');
			redirect('login');
		}

		
		$this->load->model('hallbookingmodel');

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
			$this->load->view('hallbooking');
			$this->load->view('includes/footer');

		
	}


	public function hall_books()
	{

		// echo "<pre>";
		// print_r($_POST);

		

		$checkindate=$this->input->post('checkindate');
		$checkoutdate=$this->input->post('checkoutdate');
		$auditorium=$this->input->post('auditorium');
		$halltype=$this->input->post('halltype');
		$bookingtype=$this->input->post('bookingtype');
		$numberofdays=$this->input->post('numberofdays');
		$hallamount=$this->input->post('hallamount');
		$seats=$this->input->post('seats');
		$slot=$this->input->post('slot');
		$nubememberid=$this->input->post('nubememberid');
		$icnumber=$this->input->post('icnumber');
		$firstname=$this->input->post('firstname');
		$lastname=$this->input->post('lastname');
		$email=$this->input->post('email');
		$mobile=$this->input->post('mobile');
		$line1=$this->input->post('line1');
		$line2=$this->input->post('line2');
		$city=$this->input->post('city');
		$state=$this->input->post('state');
		$postcode=$this->input->post('postcode');
		$country=$this->input->post('country');



		$this->db->limit(1);
		$this->db->order_by('id desc');
		$s=$this->db->get('hallbooking')->result_array();

		

        @$bond_no = $s[0]['pnrnumber'];
					if(is_null($bond_no)){
					$new_bond_noo = 'NTCH-01'; 
				} else {
					$old_bond_noo = str_split($bond_no,1);
					@$va = (string)($old_bond_noo[5].$old_bond_noo[6].$old_bond_noo[7].$old_bond_noo[8])+1;  
					$bond_length = strlen($va);
					if($bond_length == 1){
						$new_bond_noo = 'NTCH-00'.$va;  
					} 
					else if($bond_length == 2)
					{	 
						$new_bond_noo = 'NTCH-0'.$va; 
					}
					else if($bond_length == 3)
					{	 
						$new_bond_noo = 'NTCH-'.$va; 
					}
				}
				$pnrnumber=$new_bond_noo;

        $date1 = str_replace('/', '-', $checkindate);
	$checkin= date('Y-m-d', strtotime($date1));
$date2 = str_replace('/', '-', $checkoutdate);
  $checkout= date('Y-m-d', strtotime($date2));
				

				$data=array('date'=>date('Y-m-d'),
					        'pnrnumber'=>$pnrnumber,
							'checkindate'=>$checkin,
							'checkoutdate'=>$checkout,
							'auditorium'=>$auditorium,
							'halltype'=>$halltype,
							'bookingtype'=>$bookingtype,
							'numberofdays'=>$numberofdays,
							'hallamount'=>$hallamount,
							'seats'=>$seats,
							'slot'=>$slot,
							'nubememberid'=>$nubememberid,
							'icnumber'=>$icnumber,
							'firstname'=>$firstname,
							'lastname'=>$lastname,
							'email'=>$email,
							'mobileno'=>$mobile,
							'line1'=>$line1,
							'line2'=>$line2,
							'city'=>$city,
							'postcode'=>$postcode,
							'country'=>$country,
							'status'=>1,
							'ad_status'=>1,
							'check_in'=>0,
							'check_out'=>0
					);

			
		$result=$this->hallbookingmodel->book_halls($data);

		if($result==true)
		{


			$data1=array('date'=>date('Y-m-d'),
						 'customername'=>$firstname.' '.$lastname,
						 'email'=>$email,
						 'mobileno'=>$mobile,
						 'status'=>1,
						 );
			$this->db->insert('emaildetails',$data1);



			echo'<div class="col-md-3">
                 </div>

        <div class="col-md-6">
        <div class="alert alert-success" role="alert" style="font-weight: bold; text-align: center;">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    Booking sucessfully.<br>
                    Your Reservation Number is : &nbsp;'.$pnrnumber.'

                    <div class="hhh" style="display:none;">'.$pnrnumber.' </div>
          </div>
          </div>
          <div class="col-md-3">
          </div>

          <script>
          var ff=$(".hhh").html();
         $("#pnr_number").val(ff);
          </script>';
			
		}

		else
		{

			echo'<div class="col-md-3">
                 </div>

        <div class="col-md-6">
        <div class="alert alert-danger" role="alert" style="font-weight: bold; text-align: center;">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    Booking Failed.<br>
                  
          </div>
          </div>
          <div class="col-md-3">
          </div>';
		}




 }

 public function check_halltype()
 {

 	    $checkinddate=$_POST['checkindate'];
        $checkoutddate=$_POST['checkoutdate'];
        $numofdays=$_POST['numofdays'];
		$halltype=$_POST['halltype'];
        $auditorium=$_POST['auditorium'];
        
        $slot=$_POST['slot'];


         $date1 = str_replace('/', '-', $checkinddate);
           $checkindates= date('Y-m-d', strtotime($date1));

             $date2 = str_replace('/', '-', $checkoutddate);
           $checkoutdates= date('Y-m-d', strtotime($date2));


           

    $date11=date_create($checkindates);
    $date22=date_create($checkoutdates);
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

 $date1 = str_replace('/', '-', $checkinddate);
           $checkindates= date('Y-m-d', strtotime($date1));

             $date2 = str_replace('/', '-', $checkoutddate);
           $checkoutdates= date('Y-m-d', strtotime($date2));


           

    $date11=date_create($checkindates);
    $date22=date_create($checkoutdates);
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
$query_update1 =mysql_query("SELECT * FROM hallbooking WHERE ((checkindate between '".$checkindates."' AND '".$checkoutdates."') OR (checkoutdate between '".$checkindates."' AND '".$checkoutdates."')) and  halltype='".$halltype."' and slot='".$slot."' and  ad_status='1' and check_out='0'");

         $count=mysql_num_rows($query_update1);

         //echo $count;

            if($count=='0')
            {
            	return false;
            }	

			else
			{
				echo "yes";
				
			}


 }

 public function hallseat()
 {
 	$halltype=$_POST['halltype'];
        $auditorium=$_POST['auditorium'];
		$data=$this->db->where('auditorium',$auditorium)->where('halltype',$halltype)->get('halltypes')->result_array();

		foreach ($data as $a) 
		{

			$seats=$a['seats'];
			
		}

		echo $seats;

 }

 public function hallamount()
 {
 		$halltype=$_POST['halltype'];
        $auditorium=$_POST['auditorium'];
		$data=$this->db->where('auditorium',$auditorium)->where('halltype',$halltype)->get('halltypes')->result_array();

		foreach ($data as $a) 
		{

			$amount=$a['amount'];
			
		}

		echo $amount;

 }

 public function hall_typecheck()
 {
 	$auditorium=$_POST['auditorium'];
		
		


	 	
		 $type =mysql_query("SELECT * FROM halltypes WHERE auditorium='".$auditorium."'");
     

	 	$html=' <select class="form-control" name="halltype" id="halltype" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()">
                                 <option value="">Select Hall Type</option>'; 
                                 
                                  while($row = mysql_fetch_array($type))
                                  {


                                 $html.='<option value="'. $row['halltype'].'">'. $row['halltype'].'</option>'; 
                                      
                                      }
                                     
                                $html.='</select>

                              
                                ';


                                echo $html;

 }	


 public function checkpnrhall()
	{

		$pnrnumber=strtoupper($this->input->post('pnrnumber'));

		$data=$this->db->where('pnrnumber',$pnrnumber)->get('hallbooking')->result_array();
		if($data)
		{


				foreach ($data as $d) 
				{
					$checkindate=$d['checkindate'];
					$checkoutdate=$d['checkoutdate'];
					$auditorium=$d['auditorium'];
					$seats=$d['seats'];
					$halltype=$d['halltype'];
					$hallamount=$d['hallamount'];
					$slot=$d['slot'];


					
				}
				$datefrom=date('d-m-Y',strtotime($checkindate));
				

				$currentdate=date('Y-m-d');
				
				
				//echo $checkindate;

				//echo $timefrom;

				if($currentdate==$checkindate)
				{

				if($slot=='Slot I')
                {
                  $totala=$hallamount*1; 
                  $one=1; 
                }
                else if($slot=='Slot II')
                {
                  $totala=$hallamount*1; 
                  $one=1;
                }
                else if($slot=='Slot III')
                {
                 $totala=$hallamount*1; 
                  $one=1; 
                }
                else if($slot=='Slot I & II')
                {
                  $totala=$hallamount*2; 
                  $one=2; 
                }
                else if($slot=='Slot I & III')
                {
                  $totala=$hallamount*2; 
                  $one=2;  
                }
                else if($slot=='Slot II & III')
                {
                  $totala=$hallamount*2; 
                  $one=2; 
                }

                else if($slot=='Slot I & Slot II & III')
                {
                  $totala=$hallamount*3;
                  $one=3;  
                }


					$chairsrent=$seats*2;

					$totalamount=$totala+20;
						
							echo'


							<span class="hltyp" style:"display:none;">'.$halltype.'</span>
							<span class="hlpnr" style:"display:none;">'.$pnrnumber.'</span>
							<span class="set" style:"display:none;">'.$seats.'</span>
							<span class="audt" style:"display:none;">'.$auditorium.'</span>
							<span class="crrent" style:"display:none;">'.$chairsrent.'</span>
							<span class="hlamt" style:"display:none;">'.$hallamount.'</span>
							<span class="toamt" style:"display:none;">'.$totala.'</span>
							<span class="slamt" style:"display:none;">'.$one.'</span>
							<span class="slt" style:"display:none;">'.$slot.'</span>
							<span class="tota" style:"display:none;">'.$totalamount.'</span>
							<script>
							var halltype=$(".hltyp").html();
							var hlpnr=$(".hlpnr").html();
							var halamt=$(".hlamt").html();
							var toamt=$(".toamt").html();
							var slamt=$(".slamt").html();
							var slt=$(".slt").html();
							var set=$(".set").html();
							var crrent=$(".crrent").html();
							var audt=$(".audt").html();
							var tota=$(".tota").html();

							$(".halltype").html(halltype);
							$("#pnrnumber").val(hlpnr);
							$(".slot").html(slt);
							$(".seats1").html(set);
							$(".auditoriums").html(audt);
							$("#seats1").val(set);
							$(".chairsrent").html(crrent);
							$("#chairsrent").val(crrent);
							$(".auditoriums").val(audt);
							$(".hlamnt").html(halamt);
							$(".slamnt").html(slamt);
							$("#hall_amount").val(toamt);
							$(".hallamount").html(toamt);
							$("#totalamount").val(tota);
							$(".totalamount").html(tota);
							$("#myModal1").modal("show");
							$(".cckdate").hide();
		                    </script>';
							



				}

				else
				{

					
					echo'<div class="col-md-3">
				</div>
        <div class="col-md-6 text-center" style="margin-top:10px;">
        <div class="alert alert-success" role="alert" style="font-weight: bold; text-align: center;">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                       Your PNR Number is valid!<br>
                    <span style="color: red; background: white none repeat scroll 0% 0%; padding: 0px 5px; border-radius: 7px;">Your Check In date is not today.Please Check..</span>
                    <br>
                    Your Check In Date : '.$datefrom.'

                       </div>
			          </div>
			<div class="col-md-3">
			</div> 
			<script>
					$("#myModal1").modal("hide");
					$(".cckdate").show();
                    </script>';
			 	}

		}
		
		else
		{
						

			echo'<div class="col-md-3">
				</div>
        <div class="col-md-6 text-center" style="margin-top:10px;">
        <div class="alert alert-danger" role="alert" style="font-weight: bold; text-align: center;">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    Booking sucessfully.<br>
                    Your PNR Number is Invalid!<br>
                    
                       </div>
			          </div>
			<div class="col-md-3">
			</div>
			       <script>
					$("#myModal1").modal("hide");
					$(".cckdate").show();
                    </script> ';

		}		


		
	}


	public function checkinhall()
	{

		// echo "<pre>";
		// print_r($_POST);

		$pnrnumber=strtoupper($this->input->post('pnrnumber'));
		$chairsrent=$this->input->post('chairsrent');
		$cleaningcharge=$this->input->post('cleaningcharge');
		$seats=$this->input->post('seats1');
		$checkindate=$this->input->post('checkindates');
		$checkintime=$this->input->post('checkintime');
		$facilitiesamount=$this->input->post('facilitiesamount');
		$totalamount=$this->input->post('totalamount');
		$advanceamount=$this->input->post('advanceamount');
		$balanceamount=$this->input->post('balanceamount');
		$excessamount=$this->input->post('excessamount');

		$datas=$this->db->where('pnrnumber',$pnrnumber)->get('hallbooking')->result_array();

		foreach ($datas as $a)
		{
			$firstname=$a['firstname'];
			$lastname=$a['lastname'];
			$email=$a['email'];
			$mobileno=$a['mobileno'];
			$halltype=$a['halltype'];
			$hallamount=$a['hallamount'];
			$auditorium=$a['auditorium'];
			$slot=$a['slot'];
			
		}
		
		
		$facilities=implode('|',$_POST['facilities']);
		$rate=implode('|',$_POST['rate']);
		$hours=implode('|',$_POST['hours']);

		$facilitiess=$_POST['facilities'];
		$rates=$_POST['rate'];
		$hourss=$_POST['hours'];

		$data=array('pnrnumber'=>$pnrnumber,
					'checkindate'=>$checkindate,
					'checkintime'=>$checkintime,
					'firstname'=>$firstname,
					'lastname'=>$lastname,
					'email'=>$email,
					'mobileno'=>$mobileno,
					'halltype'=>$halltype,
					'hallamount'=>$hallamount,
					'slot'=>$slot,
					'auditorium'=>$auditorium,
					'facilitiesamount'=>$facilitiesamount,
					'chairsrent'=>$chairsrent,
					'cleaningcharge'=>$cleaningcharge,
					'seats'=>$seats,
					'totalamount'=>$totalamount,
					'advanceamount'=>$advanceamount,
					'balanceamount'=>$balanceamount,
					'excessamount'=>$excessamount,
					'facilities'=>$facilities,
					'rate'=>$rate,
					'hours'=>$hours,
					'status'=>1,
					'checkin'=>1,
                    'checkout'=>0);

			$datas=array('check_in'=>1,
					'check_out'=>0);

			if($facilities!='')
			{
				$count=count($_POST['facilities']);

					for ($i=0; $i <$count ; $i++) { 
						
				$datas1=array('date'=>$checkindate,
				'time'=>$checkintime,
				'halltype'=>$halltype,
				'auditorium'=>$auditorium,
				'slot'=>$slot,
				'pnr_number'=>$pnrnumber,
				'totalamount'=>$facilitiesamount,
				'facilities'=>$facilitiess[$i],
				'rate'=>$rates[$i],
				'hours'=>$hourss[$i],
				'checkin'=>1);

				$this->db->insert('hall_payadon',$datas1);


					}

			}

			else
			{
				
			}

		$result=$this->hallbookingmodel->hallcheckin($data,$datas,$pnrnumber);

			if($result==true)
			{
				$this->session->set_flashdata('msg','Hall Booked Sucessfully');
				redirect('hallbooking/printadvancereceipt');
			}
			else
			{

				$this->session->set_flashdata('msg1','Hall Booked Failed');
				redirect('dashboard');
			}
		
		


	}

	
	public function checkinhalls()
	{

		

		$pnrnumber=strtoupper($this->input->post('pnrnumber'));
		$checkindate=$this->input->post('checkindate');
		$checkintime=$this->input->post('checkintime');
		

		$datas=$this->db->where('pnrnumber',$pnrnumber)->get('hallbooking')->result_array();

		foreach ($datas as $a)
		{
			$firstname=$a['firstname'];
			$lastname=$a['lastname'];
			$email=$a['email'];
			$mobileno=$a['mobileno'];
			$halltype=$a['halltype'];
			$hallamount=$a['hallamount'];
			$auditorium=$a['auditorium'];
			$slot=$a['slot'];
			$seats=$a['seats'];
			$facilities=$a['facilities'];
			$facilitiesamount=$a['facilitiesamount'];
			$hours=$a['hours'];
			$grandtotal=$a['grandtotal'];
			$chairsrental=$a['chairsrental'];
			$cleaningcharge=$a['cleaningcharge'];
			$totalamount=$a['totalamount'];
			
		}
  //       echo "<pre>";
		// print_r($datas);

		
		
		

		$data=array('pnrnumber'=>$pnrnumber,
					'checkindate'=>$checkindate,
					'checkintime'=>$checkintime,
					'firstname'=>$firstname,
					'lastname'=>$lastname,
					'email'=>$email,
					'mobileno'=>$mobileno,
					'halltype'=>$halltype,
					'hallamount'=>$hallamount,
					'slot'=>$slot,
					'auditorium'=>$auditorium,
					'facilitiesamount'=>$grandtotal,
					'chairsrent'=>$chairsrental,
					'cleaningcharge'=>$cleaningcharge,
					'seats'=>$seats,
					'totalamount'=>$totalamount,
					'advanceamount'=>$totalamount,
					'facilities'=>$facilities,
					'rate'=>$facilitiesamount,
					'hours'=>$hours,
					'status'=>1,
					'checkin'=>1,
                    'checkout'=>0);

			$datas=array('check_in'=>1,
					'check_out'=>0);

			if($facilities!='')
			{
				$facilities1=explode('|',$facilities);
                $facilitiesamount1=explode('|',$facilitiesamount);
                $hours1=explode('|',$hours);

               $count=count($facilities1);

			for ($i=0; $i <$count ; $i++) 
			{ 

				// echo $count;
				$datas1=array('date'=>$checkindate,
				'time'=>$checkintime,
				'halltype'=>$halltype,
				'auditorium'=>$auditorium,
				'slot'=>$slot,
				'pnr_number'=>$pnrnumber,
				'totalamount'=>$grandtotal,
				'facilities'=>$facilities1[$i],
				'rate'=>$facilitiesamount1[$i],
				'hours'=>$hours1[$i],
				'checkin'=>1);

				$this->db->insert('hall_payadon',$datas1);

			  }

			}

			else
			{
				
			}

		$result=$this->hallbookingmodel->hallcheckin($data,$datas,$pnrnumber);

			if($result==true)
			{
				$this->session->set_flashdata('msg','Hall Booked Sucessfully');
				redirect('hallbooking/printadvancereceipt');
			}
			else
			{

				$this->session->set_flashdata('msg1','Hall Booked Failed');
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



		
	public function printadvancereceipt()
	{
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$data['bb']=$this->db->get('hallcheckin')->result_array();

		foreach ($data['bb'] as $a1) 
		{
			$advanceamount=$a1['advanceamount'];
			
		}

		$datas =$this->convert_number_to_words($advanceamount);

		$data['aa']=$datas;
		// echo "<pre>";
		// print_r($data);

		$this->load->view('halladvancereceipt',$data);


	}
	public function unpaid_list()
	{
		$this->db->order_by('id','DESC');
		$this->db->where('status',0);
		$data['upList']=$this->db->get('hallbooking')->result_array();
			
			$this->load->view('includes/header');
			$this->load->view('unpaid_hall',$data);
			$this->load->view('includes/footer');
	}
	public function confirmHall()
	{
		if($this->input->post('transcationid'))
		{
			$transacation_id = $this->input->post('transcationid');
			$id = $this->input->post('id');
			
			$data=array('transcation_id'=>$transacation_id,
			           'ad_status' =>1,
			           'status' =>1);
			$this->db->where('id',$id);
			if($this->db->update('hallbooking',$data))
			{
					   $s=$this->db->where('id',$id)->get('hallbooking')->result_array();

						foreach ($s as $row) 
						{
								  $pnr_numbers=$row['pnrnumber'];
								  $nubememberid=$row['nubememberid'];
								  $firstname=$row['firstname'];
								  $email=$row['email'];
								  $mobile=$row['mobileno'];
								  $checkin=$row['checkindate'];
								  $checkout=$row['checkoutdate'];
								  $roomtype=$row['halltype']."(".$row['halltype'].")";
								  $room_no=$row['slot'];
								  $numberofdays=$row['facilities'];
								  $total=$row['total'];
								  $internethandlingcharges=$row['internethandlingcharges'];
								  $item_price=$row['grandtotal'];
								  $item_transaction=$row['transcation_id'];
							
						}

						$date1 = str_replace('-', '/', $checkin);
						  $checkind= date('d/m/Y', strtotime($date1));

						  $date2 = str_replace('-', '/', $checkout);
						  $checkoutd= date('d/m/Y', strtotime($date2));

						if($nubememberid)
						   {
							$nume='YES';
						   }
						   else
						   {
							$nume='NO';
						   }
				$message='	<html xmlns="http://www.w3.org/1999/xhtml">
						<head>
						<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
						<title>NTC Hall Booking </title>
						</head>

						<body>
						<table width="600" border="2" align="center" cellpadding="0" cellspacing="0" style="border: 2px solid rgb(216, 216, 216);">
						  <tr>
							<td align="left" valign="top" style="background-color: rgb(0, 123, 201);"><img src="http://ntc.my/images/logo.png" style="margin-left: 106px;"></td>
						  </tr>
						  <tr>
						  <td>
						 <table width="600" border="0" align="center">
						  <tr>
						 

								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Reservation Number</td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$pnr_numbers.'</strong></td>
								</tr>

								<tr>
						 

								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Nube Member</td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$nume.'</strong></td>
								</tr>

								<tr>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Name</td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$firstname.'</strong></td>
								</tr>
								<tr>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Email</td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$email.'</strong></td>
								</tr>
								 <tr>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Mobile No </td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$mobile.'</strong></td>
								</tr>
								<tr>
								  <td width="178" style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Check IN</td>
								  <td width="25" style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
								  <td width="397" style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$checkind.'</strong></td>
								</tr>


								<tr>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Check OUT</td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$checkoutd.'</strong></td>
								</tr>
								<tr>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Hall Type</td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$roomtype.'</strong></td>
								</tr>
								<tr>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Slot</td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$room_no.'</strong></td>
								</tr>
							   
								<tr>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Other Facilities</td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$numberofdays.'</strong></td>
								</tr>

								<tr>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Total Room Rent</td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.number_format($total,2).'</strong></td>
								</tr>
								<tr>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Internet Handling Charges</td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.number_format($internethandlingcharges,2).'</strong></td>
								</tr>
							   
								<tr>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Total Amount</td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.number_format($item_price,2).'</strong></td>
								</tr>
								  <tr>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Your Payment Transcation Id</td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
								  <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$item_transaction.'</strong></td>
								</tr>
							   
								
								  </table>
								  </td>
								  </tr>
							  <tr>
							  <td style="color: rgb(255, 255, 255); background-color: rgb(0, 123, 201); padding: 5px; text-align: center;">Copyright © ntc 2016.All rights reserved.</td>
							  </tr>
								
									   
						  </table>

						</body>
						</html>';


						  $this->load->library('email');
								$config['protocol'] = 'smtp';
								$config['smtp_host'] = 'mail.ntc.my';
								$config['smtp_user'] = 'info@ntc.my';
								$config['smtp_pass'] = 'ntc!@#$';
								$config['smtp_port'] = 25;
								$config['mailtype']='html';
								$config['charset']='utf-8';
								$config['mailpath']='/usr/sbin/sendmail';
								$this->email->initialize($config);

								
								$this->email->set_newline("\r\n");
								$this->email->set_mailtype("html");
								$this->email->from('info@ntc.my','NTC');
							 //$this->email->to('anitha.bizsoft@gmail.com');
								$this->email->to($email);
							  $this->email->cc('');
							  $this->email->bcc('');

							  $this->email->subject('Hall Booking Confirmation');

							  $this->email->message($message);

							  $this->email->send();









									
									$this->session->set_flashdata('msg1','Booking Confirmation Sucessfully');
									redirect('hallbooking/unpaid_list');
										
			}
		}
	}



}	