<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bookingroom extends CI_Controller {


	public function __construct()
	{

		parent::__construct();
		if($this->session->userdata('is_logged_in')=='')
		{
			 $this->session->set_flashdata('msg','Login To Continue');
			redirect('login');
		}

		
		$this->load->model('bookingroommodel');

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

	
	public function index($variable)
	{
			//echo $variable;
			
			
		
	}

	
	public function room_book()
	{	

			// echo "<pre>";
			// print_r($_POST);

		$date1=$this->input->post('date1');
		$time=$this->input->post('time');
		$noofrooms=$this->input->post('noofrooms');
		$room_type=$this->input->post('room_type');
		$bookingtype=$this->input->post('bookingtype');
		$roomamount=$this->input->post('roomamount');
		$roomtypeid=$this->input->post('room_type_id');
		$count=$this->input->post('count');
		$totamount=$this->input->post('totamount');
		$roundamount=$this->input->post('roundamount');
		$extrabedamount=$this->input->post('extrabedamount');
		$pnrnumber=strtoupper($this->input->post('pnrnumber'));
		$name=$this->input->post('name');
		$email=$this->input->post('email');
		$nubememberid=$this->input->post('nubememberid');
		$mobileno=$this->input->post('mobileno');
		$noofadults=$this->input->post('noofadults');
		$children=$this->input->post('children');
		$extrabed=$this->input->post('extrabed');
		$advance_amounts=$this->input->post('advance_amount');
		$depositamount=$this->input->post('depositamount');
		$excessamount=$this->input->post('excessamount');
		
		
		$roomno=implode(',',array_filter($_POST['roomno']));

		if($advance_amounts=='')
		{
			$advance_amount=0;
		}
		else
		{
			$advance_amount=$advance_amounts;
		}

		
		$datefrom=date('Y-m-d',strtotime($date1));
		
		$data=array('datefrom'=>$datefrom,
					'time'=>$time,
					'noofrooms'=>$noofrooms,
					'room_type'=>$room_type,
					'bookingtype'=>$bookingtype,
					'roomamount'=>$roomamount,
					'roomtypeid'=>$roomtypeid,
					'count'=>$count,
					'totamount'=>$totamount,
					'roundamount'=>$roundamount,
					'extrabedamount'=>$extrabedamount,
					'pnrnumber'=>$pnrnumber,
					'name'=>$name,
					'email'=>$email,
					'mobileno'=>$mobileno,
					'noofadults'=>$noofadults,
					'children'=>$children,
					'nubememberid'=>$nubememberid,
					'extrabed'=>$extrabed,
					'advance_amount'=>$advance_amount,
					'depositamount'=>$depositamount,
                    'excessamount'=>$excessamount,
					'roomno'=>$roomno,
					'status' =>1,
					'checkin'=>1,
					'checkout'=>0);

		$datas=array('check_in'=>1,
					'check_out'=>0);

			


		  
		$result=$this->bookingroommodel->book_room($data,$datas,$pnrnumber);

		if($result==true)
		{
				
				$result=$this->bookingroommodel->sendmailbook_room();
			

		
		}

		else
		{
			$this->session->set_flashdata('msg1','room booked failed');
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

   

	public function printadvancereceipt()
	{
		$this->db->order_by('id','DESC');
		$this->db->limit(1);
		$data['bb']=$this->db->get('bookingroom')->result_array();

		foreach ($data['bb'] as $a1) 
		{
			$advance_amount=$a1['advance_amount'];
			
		}

		$datas =$this->convert_number_to_words($advance_amount);

		$data['aa']=$datas;
		// echo "<pre>";
		// print_r($data);

		$this->load->view('advancereceipt',$data);


	}


   public function rooms_book()
	{	

		$roomtypeid=$this->input->post('roomtypeid');
		$checkin=$this->input->post('checkin');
		$checkout=$this->input->post('checkout');
		$roomtype=$this->input->post('roomtype');
		$roomamount=$this->input->post('roomamount');
		$numberofdays=$this->input->post('numberofdays');
		$amount=$this->input->post('amount');
		$totalamount=$this->input->post('totalamount');
		$firstname=$this->input->post('firstname');
		$lastname=$this->input->post('lastname');
		$email=$this->input->post('email');
		$mobile=$this->input->post('mobile');
		$room_no=$this->input->post('room_no');
		$adults=$this->input->post('adults');
		$children=$this->input->post('children');
		$extra_bed=$this->input->post('extra_bed');
		$comments=$this->input->post('comments');

		
		
	
		$data=array('date'=>date('Y-m-d'),
					'checkin'=>$checkin,
					'checkout'=>$checkout,
					'roomtypeid'=>$roomtypeid,
					'roomtype'=>$roomtype,
					'roomamount'=>$roomamount,
					'numberofdays'=>$numberofdays,
					'amount'=>$amount,
					'totalamount'=>$totalamount,
					'firstname'=>$firstname,
					'lastname'=>$lastname,
					'email'=>$email,
					'mobile'=>$mobile,
					'room_no'=>$room_no,
					'adults'=>$adults,
					'children'=>$children,
					'extra_bed'=>$extra_bed,
					'comments'=>$comments,
					'status' =>1,
					'ad_status'=>0);

			// echo "<pre>";
			// print_r($data);

		$result=$this->bookingroommodel->book_rooms($data);

		if($result==true)
		{

			$this->session->set_flashdata('msg','Room booked sucessfully');
			redirect('dashboard');

			
		}

		else
		{
			$this->session->set_flashdata('msg1','room booked failed');
			redirect('dashboard');
		}
					
	}



	public function rooms_books()
	{	
		// echo "<pre>";
		// print_r($_POST);

		$roomtypeid=$this->input->post('roomtypeid');
		$dormbed=$this->input->post('dormbed');
		$checkin=$this->input->post('checkin');
		$checkout=$this->input->post('checkout');
		$roomtype=$this->input->post('roomtype');
		$roomamount=$this->input->post('roomamount');
		$numberofdays=$this->input->post('numberofdays');
		$firstname=$this->input->post('firstname');
		$lastname=$this->input->post('lastname');
		$email=$this->input->post('email');
		$mobile=$this->input->post('mobile');
		$room_no=$this->input->post('room_no');
		$adults=$this->input->post('adults');
		$children=$this->input->post('children');
		$extra_bed=$this->input->post('extra_bed');
		$nubememberid=$this->input->post('nubememberid');
		$country=$this->input->post('country');
		$bookingtype=$this->input->post('bookingtype');
		$icnumber=$this->input->post('icnumber');
		$line1=$this->input->post('line1');
		$line2=$this->input->post('line2');
		$city=$this->input->post('city');
		$state=$this->input->post('state');
		$postcode=$this->input->post('postcode');

		$this->db->limit(1);
		$this->db->order_by('id desc');
		$s=$this->db->get('bookingrooms')->result_array();

		@$bond_no = $s[0]['pnr_number'];
					if(is_null($bond_no)){
					$new_bond_noo = 'NTCR-01'; 
				} else {
					$old_bond_noo = str_split($bond_no,1);
					@$va = (string)($old_bond_noo[5].$old_bond_noo[6].$old_bond_noo[7].$old_bond_noo[8])+1;  
					$bond_length = strlen($va);
					if($bond_length == 1){
						$new_bond_noo = 'NTCR-00'.$va;  
					} 
					else if($bond_length == 2)
					{	 
						$new_bond_noo = 'NTCR-0'.$va; 
					}
					else if($bond_length == 3)
					{	 
						$new_bond_noo = 'NTCR-'.$va; 
					}
				}
				$pnr_number=$new_bond_noo;

		//echo $pnr_number;
		
	
		$data=array('date'=>date('Y-m-d'),
			        'pnr_number'=>$pnr_number,
					'checkin'=>$checkin,
					'checkout'=>$checkout,
					'roomtypeid'=>$roomtypeid,
					'drombed'=>$dormbed,
					'roomtype'=>$roomtype,
					'roomamount'=>$roomamount,
					'numberofdays'=>$numberofdays,
					'firstname'=>$firstname,
					'lastname'=>$lastname,
					'email'=>$email,
					'mobile'=>$mobile,
					'room_no'=>$room_no,
					'adults'=>$adults,
					'children'=>$children,
					'extra_bed'=>$extra_bed,
					'nubememberid'=>$nubememberid,
					'country'=>$country,
					'state'=>$state,
					'bookingtype'=>$bookingtype,
					'line1'=>$line1,
					'icnumber'=>$icnumber,
					'line2'=>$line2,
					'city'=>$city,
					'postcode'=>$postcode,
					'status' =>1,
					'ad_status'=>1,
					'check_in'=>0,
					'check_out'=>0);

			// echo "<pre>";
			// print_r($data);

		$result=$this->bookingroommodel->book_rooms($data);

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
                    Your Reservation Number is : &nbsp;'.$pnr_number.'

                    <div class="hhh" style="display:none;">'.$pnr_number.' </div>
          </div>
          </div>
          <div class="col-md-3">
          </div>

          <script>
          var ff=$(".hhh").html();
         $("#pnrnumber").val(ff);
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


	

	public function checkpnr1()
	{

		$pnrnumber=strtoupper($this->input->post('pnrnumber'));

		$data=$this->db->where('pnr_number',$pnrnumber)->get('bookingrooms')->result_array();
		if($data)
		{


				foreach ($data as $d) 
				{
					$noofrooms=$d['room_no'];
					$checkin=$d['checkin'];



					
				}
				$datefrom=date('d-m-Y',strtotime($checkin));
				$currentdate=date('Y-m-d');

				//echo $checkin;

				if($currentdate==$checkin)
				{
					


						 

                 echo '
                <span class="asc" style="display:none;">'.$noofrooms.'</span>


					<script>
					$("#myModal1").modal("show");
					var datas=$(".asc").html();
					$(".nfrms").html(datas);
                    $(".nfrms").val(datas);
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
                       Your Reservation Number is valid!<br>
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
                    Your Reservation Number is Invalid!<br>
                    
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


public function checkpnr2()
	{

		$pnrnumber=strtoupper($this->input->post('pnrnumber'));

		$data=$this->db->where('pnr_number',$pnrnumber)->get('bookingrooms')->result_array();

		foreach ($data as $d) 
		{
			
			$roomtype=$d['roomtype'];
		
			
		}


		if($data)
		{
			 echo $roomtype ;

		}

		else
		{

			return false;

		}

	}


public function checkpnr3()
	{

		$pnrnumber=strtoupper($this->input->post('pnrnumber'));

		$data=$this->db->where('pnr_number',$pnrnumber)->get('bookingrooms')->result_array();

		foreach ($data as $d) 
		{
			
			$roomtypeid=$d['roomtypeid'];
			
		}


		if($data)
		{
			 echo $roomtypeid;

		}

		else
		{

			return false;

		}

	}





	public function checkin()
	{

		    $this->load->view('includes/header');
			$this->load->view('checkingroom');
			$this->load->view('includes/footer');

		    

	}


	public function checkinroom()
	{

		// echo"<pre>";
		// print_r($_POST);


		    $date1=$this->input->post('date1');
		    $time=$this->input->post('time');
		    $pnrnumber=strtoupper($this->input->post('pnrnumber'));
		    $roomtypes=$this->input->post('roomtypes');
			$noofrooms=$this->input->post('noofrooms');
		    $roomtypeids=$this->input->post('roomtypeids');

		   // echo  $roomtypes;

		   
		   
		    $data=array('datefrom'=>$date1,
					    'time'=>$time,
					  	'pnrnumber'=>$pnrnumber,
						'roomtypes'=>$roomtypes,
						'noofrooms'=>$noofrooms,
					    'roomtypeid'=>$roomtypeids,
					    'status' =>1 );

		    echo $result=$this->bookingroommodel->book_date($data);
		    

		if($result==true)
		{
			$data['dateroom']=$this->db->where('pnrnumber',$pnrnumber)->limit(1)->get('bookingdate')->result_array();

			
			
			$this->load->view('includes/header');
			$this->load->view('checkin',$data);
			$this->load->view('includes/footer');
			
		}

		else
		{
			//$this->session->set_flashdata('msg1','room booked failed');
			redirect('dashboard');
		}

	}

	public function memberidcheck()
	{
		$nubememberid=$this->input->post('nubememberid');
		$checkind=$_POST['checkin'];
        $checkoutd=$_POST['checkout'];
      $date1 = str_replace('/', '-', $checkind);
      $checkin= date('Y-m-d', strtotime($date1));

   

      $date2 = str_replace('/', '-', $checkoutd);
      $checkout= date('Y-m-d', strtotime($date2));

		$data=$this->db->where('memberid',$nubememberid)->get('memberid_list')->result_array();
		if($data)
		{
			
		
				 	$query_update1 =mysql_query("SELECT * FROM bookingrooms WHERE ((checkin between '".$checkin."' AND '".$checkout."') OR (checkout between '".$checkin."' AND '".$checkout."')) and  nubememberid='".$nubememberid."'and  ad_status='1'");
				 	$counts=mysql_num_rows($query_update1);

				 	if($counts>0)
				 	{
				 		$a="Not elgible for using this Member";
				 	}
				 	else
				 	{
				 		$a="";
				 	}




		 	}
		 	else
		 	{

		 		$a="In Valid Member Id";

		 	}
		echo $a;
	}

	



}	