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
		            	$roomtypeid =$a["roomtypeid"];
		            	$roomtype =$a["room_type"];
		              	$checkin=$a['datefrom'];
		              	$roomno=$a["roomno"];
		              	$noofrooms=$a["noofrooms"];
		               $html.=' <tr>
		                    <td>'.$i++.'</td>
		                    <td id="pnr">'.$a["pnrnumber"].'</td>
		                    <td id="dtfrm">'.$a["datefrom"].'</td>
		                    <td id="tm">'.$a["time"].'</td>
		                    <td id="romtyp">'.$a["room_type"].'</td>
		                    <td id="nfrm">'.$a["noofrooms"].'</td>
		                    <td id="nam">'.$a["name"].'</td>
		                    <td id="mob">'.$a["mobileno"].'</td>
		                    <td>'.$a["advance_amount"].'</td>
		                                                           
		                </tr>
		               
		                ';


		                 }

		      $type =$this->db->where('id',$roomtypeid)->get('roomtypes')->result_array();
     

           foreach ($type as $row) 
  
            {
                $roomtype=$row['roomtype'];
                $memberweekdaysamount=$row['memberweekdaysamount'];
                $memberweekendamount=$row['memberweekendamount'];
                $publicweekdaysamount=$row['publicweekdaysamount'];
                $publicweekendamount=$row['publicweekendamount'];

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
			            <td style="background-color: #E2FFE8; font-weight: bold; color:red;font-size: 14px;">In Valid Reservation Number. Please check!</td>
			            </tr>
			            
			            
			            
			                        
			                        
			        </tbody>
			        </table>
			        </div>

			</div>
			<div class="col-md-6">
			</div>
			</div>
					
			

			
			';

}

echo $html;




	}


public function searchcustomercheckout()
	{

		$pnrnumber=strtoupper($this->input->post('pnrnumber'));

		//$pnrnumber='NUBE00011';

		$data=$this->db->where('checkin',1)->where('pnrnumber',$pnrnumber)->get('bookingroom')->result_array();

		// echo"<pre>";
		// print_r($data);


		if($data)
			{	
										
					

						
		           
		            $i=1;
		            foreach ($data as $a) {
		            	$aa =$a["advance_amount"];
		            	$roomtypeid =$a["roomtypeid"];
		            	$roomtype =$a["room_type"];
		              	$checkin=$a['datefrom'];
		              	$roomno=$a["roomno"];
		              	$noofrooms=$a["noofrooms"];

		              	$pnrnumber=$a["pnrnumber"];
						$datefrom=$a["datefrom"];
						$time=$a["time"];
						$room_type=$a["room_type"];
						$noofrooms=$a["noofrooms"];
						$roomno=$a["roomno"];
						$name=$a["name"];
						$mobileno=$a["mobileno"];
						$nubememberid=$a["nubememberid"];
						
		               
		                 }

		      $type =$this->db->where('id',$roomtypeid)->get('roomtypes')->result_array();
     

           foreach ($type as $row) 
  
            {
                $roomtype=$row['roomtype'];
                $memberweekdaysamount=$row['memberweekdaysamount'];
                $memberweekendamount=$row['memberweekendamount'];
                $publicweekdaysamount=$row['publicweekdaysamount'];
                $publicweekendamount=$row['publicweekendamount'];

           } 


            $typea =$this->db->get('publicholidays')->result_array();
     
            $holidaysdate[]=array();


           foreach ($typea as $rowa) 
  
            {
                 $holidaysdate[]=$rowa['holidaysdate'];

           } 



if($roomtypeid=='4')
{


               $html=' 
    <div class="row" style="margin-top: 20px; background-color:white;" id="viewamount">


  <div class="col-md-12" style="background-color: rgb(241, 245, 249); border: 2px solid rgb(225, 225, 225); border-radius: 25px;margin-bottom: 20px;">

              <span style="display:none;" id="pnr">'.$pnrnumber.'</span>
              <span style="display:none;" id="dtfrm">'.$datefrom.'</span>
              <span style="display:none;" id="tm">'.$time.'</span>
              <span style="display:none;" id="romtyp">'.$room_type.'</span>
              <span style="display:none;" id="nfrm">'.$noofrooms.'</span>
              <span style="display:none;" id="romno">'.$roomno.'</span>
                        <span style="display:none;" id="nam">'.$name.'</span>
              <span style="display:none;" id="mob">'.$mobileno.'</span>

    
            <table border="0" style="width: 100%;">
             
                  <tbody>
                  <tr style="border-bottom: 1px solid rgb(225, 225, 225);">
                    <td style="padding: 8px; font-size: 14px;"><p style="font-weight:bold;color:#D41313;">No Of Units-<span class="">'.$noofrooms.'</span><br><span class="">'.$roomtype.'</span></p>';

                    
        
                         $checkout=date("Y-m-d");
                       $date_from = $checkin;   
                        $date_from = strtotime($date_from);  
                        $date_to = $checkout;  
                        $date_to = strtotime($date_to); 

if($date_from==$date_to)
{

       //nubememeberid empty

        if($nubememberid=='')
        {
                for ($i=$date_from; $i<=$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                        
                       if(in_array($dd,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }


                        
                        if($checkinday=='Fri' || $checkinday=='Sat' || $pub=='PUB')
                        {
                            $amount=$publicweekendamount;
                        }
                        else
                        {

                            $amount=$publicweekdaysamount;
                        }


                                            

                     

                      $subtotal=$amount*$noofrooms;
                      $subtotals[]=$amount*$noofrooms;

                      $total=array_sum($subtotals);



                          $html.=' <div style="padding: 5px;  line-height: 13px;"><table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 150px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofrooms.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table></div>';
                      
                       }



        }
        //
        else
        {
            


                     if($nubememberid=='')
                    {

                    }
                    else
                    {
                       $html.='<p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center;"> Member Rate</p>';
                    }

                            //member per 1 room
                        for ($i=$date_from; $i<=$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                          
                        
                    

                            if(in_array($dd,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }


                        
                        if($checkinday=='Fri' || $checkinday=='Sat' || $pub=='PUB')
                        {
                            $amount=$memberweekendamount;
                        }
                        else
                        {

                            $amount=$memberweekdaysamount;
                        }


                    

                     
                     
                      $subtotal=$amount*$noofrooms;
                      $subtotals[]=$amount*$noofrooms;

                       $total=array_sum($subtotals);
                   
                          $html.='
                          <div style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; padding: 5px; border-radius: 5px; line-height: 25px;">
                          <table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 150px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofrooms.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>
                           </div>';
                      
                       }

                        if($nubememberid=='')
                    {

                    }
                    else
                    {
                       $html.='<p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center; border-bottom: 1px dotted;"> </p><p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center;">Non Member Rate</p>';
                    }


                     



             
        }                   

}
else
{

                        
                     //nubememeberid empty

        if($nubememberid=='')
        {
                for ($i=$date_from; $i<$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                        
                        if(in_array($dd,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }


                        
                        if($checkinday=='Fri' || $checkinday=='Sat' || $pub=='PUB')
                        {
                            $amount=$publicweekendamount;
                        }
                        else
                        {

                            $amount=$publicweekdaysamount;
                        }


                                            

                     

                      $subtotal=$amount*$noofrooms;
                      $subtotals[]=$amount*$noofrooms;

                      $total=array_sum($subtotals);

                          $html.=' <div style="padding: 5px;  line-height: 13px;"><table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 150px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofrooms.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table></div>';
                      
                       }



        }
        //

        else
        {

             if($nubememberid=='')
                    {

                    }
                    else
                    {
                       $html.='<p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center;"> Member Rate</p>';
                    }
           
                            //member per 1 room
                        for ($i=$date_from; $i<$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                          
                        
                    

                            if(in_array($dd,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }


                        
                        if($checkinday=='Fri' || $checkinday=='Sat' || $pub=='PUB')
                        {
                            $amount=$memberweekendamount;
                        }
                        else
                        {

                            $amount=$memberweekdaysamount;
                        }


                    

                     
                        
                      $subtotal=$amount*$noofrooms;
                      $subtotals[]=$amount*$noofrooms;

                      $total=array_sum($subtotals);
                    

                          $html.='
                          <div style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; padding: 5px;  line-height: 13px;">
                          <table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 150px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofrooms.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>
                          </div>';
                      
                       }


                       if($nubememberid=='')
                    {

                    }
                    else
                    {
                       $html.='<p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center; border-bottom: 1px dotted;"> </p><p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center;">Non Member Rate</p>';
                    }

                     




                   

        }


} 



}//-------------------------------------------------------------------------------------------

else
{


//roomtypeother-------------------

		                
		           $html=' 
		<div class="row" style="margin-top: 20px; background-color:white;" id="viewamount">


  <div class="col-md-12" style="background-color: rgb(241, 245, 249); border: 2px solid rgb(225, 225, 225); border-radius: 25px;margin-bottom: 20px;">

  						<span style="display:none;" id="pnr">'.$pnrnumber.'</span>
  						<span style="display:none;" id="dtfrm">'.$datefrom.'</span>
  						<span style="display:none;" id="tm">'.$time.'</span>
  						<span style="display:none;" id="romtyp">'.$room_type.'</span>
  						<span style="display:none;" id="nfrm">'.$noofrooms.'</span>
  						<span style="display:none;" id="romno">'.$roomno.'</span>
                        <span style="display:none;" id="nam">'.$name.'</span>
  						<span style="display:none;" id="mob">'.$mobileno.'</span>

    
            <table border="0" style="width: 100%;">
             
                  <tbody>
                  <tr style="border-bottom: 1px solid rgb(225, 225, 225);">
                    <td style="padding: 8px; font-size: 14px;"><p style="font-weight:bold;color:#D41313;">No Of Units-<span class="">'.$noofrooms.'</span><br><span class="">'.$roomtype.'</span></p>';

                    
				
                         $checkout=date("Y-m-d");
                    	 $date_from = $checkin;   
                        $date_from = strtotime($date_from);  
                        $date_to = $checkout;  
                        $date_to = strtotime($date_to); 

if($date_from==$date_to)
{

       //nubememeberid empty

        if($nubememberid=='')
        {
                for ($i=$date_from; $i<=$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                        
                        if(in_array($dd,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }


                        
                        if($checkinday=='Fri' || $checkinday=='Sat' || $pub=='PUB')
                        {
                            $amount=$publicweekendamount;
                        }
                        else
                        {

                            $amount=$publicweekdaysamount;
                        }


                                            

                     

                      $subtotal=$amount*$noofrooms;
                      $subtotals[]=$amount*$noofrooms;

                      $total=array_sum($subtotals);



                          $html.=' <div style="padding: 5px;  line-height: 13px;"><table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 150px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofrooms.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table></div>';
                      
                       }



        }
        //
        else
        {
            if($noofrooms>1)
                {


                     if($nubememberid=='')
                    {

                    }
                    else
                    {
                       $html.='<p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center;"> Member Rate</p>';
                    }

                            //member per 1 room
                        for ($i=$date_from; $i<=$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                          
                        
                    

                            if(in_array($dd,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }


                        
                        if($checkinday=='Fri' || $checkinday=='Sat' || $pub=='PUB')
                        {
                            $amount=$memberweekendamount;
                        }
                        else
                        {

                            $amount=$memberweekdaysamount;
                        }


                    

                     
                      $noofroomss=1;
                      $subtotal=$amount*$noofroomss;
                      $subtotals[]=$amount*$noofroomss;

                       $total=array_sum($subtotals);
                   
                          $html.='
                          <div style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; padding: 5px; border-radius: 5px; line-height: 25px;">
                          <table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 150px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofroomss.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>
                           </div>';
                      
                       }

                        if($nubememberid=='')
                    {

                    }
                    else
                    {
                       $html.='<p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center; border-bottom: 1px dotted;"> </p><p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center;">Non Member Rate</p>';
                    }


                       //remainingroom


                       for ($i=$date_from; $i<=$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                        
                        if(in_array($dd,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }


                        
                        if($checkinday=='Fri' || $checkinday=='Sat' || $pub=='PUB')
                        {
                            $amount=$publicweekendamount;
                        }
                        else
                        {

                            $amount=$publicweekdaysamount;
                        }

                     

                       $noofroomss1=$noofrooms-1;
                      $subtotal=$amount*$noofroomss1;
                      $subtotals[]=$amount*$noofroomss1;

                      $total=array_sum($subtotals);
                     
                          $html.=' <div style="padding: 5px;  line-height: 13px;"><table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 150px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofroomss1.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table></div>';
                      
                       }




                }
                //sinlgeroom
                else
                {

                            //member per 1 room
                        for ($i=$date_from; $i<=$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                          
                        
                    

                            if(in_array($dd,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }


                        
                        if($checkinday=='Fri' || $checkinday=='Sat' || $pub=='PUB')
                        {
                            $amount=$memberweekendamount;
                        }
                        else
                        {

                            $amount=$memberweekdaysamount;
                        }


                    

                     

                       $noofroomss=1;

                      $subtotal=$amount*$noofroomss;
                      $subtotals[]=$amount*$noofroomss;

                      $total=array_sum($subtotals);

                          $html.=' <div style="padding: 5px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; line-height: 13px;"><table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 150px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofroomss.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table></div>';
                      
                       }


                }    

        }                 	

}
else
{

                        
                     //nubememeberid empty

        if($nubememberid=='')
        {
                for ($i=$date_from; $i<$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                        
                        if(in_array($dd,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }


                        
                        if($checkinday=='Fri' || $checkinday=='Sat' || $pub=='PUB')
                        {
                            $amount=$publicweekendamount;
                        }
                        else
                        {

                            $amount=$publicweekdaysamount;
                        }


                                            

                     

                      $subtotal=$amount*$noofrooms;
                      $subtotals[]=$amount*$noofrooms;

                      $total=array_sum($subtotals);

                          $html.=' <div style="padding: 5px;  line-height: 13px;"><table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 150px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofrooms.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table></div>';
                      
                       }



        }
        //

        else
        {

             if($nubememberid=='')
                    {

                    }
                    else
                    {
                       $html.='<p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center;"> Member Rate</p>';
                    }
            if($noofrooms>1)
                {
                            //member per 1 room
                        for ($i=$date_from; $i<$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                          
                        
                    

                            if(in_array($dd,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }


                        
                        if($checkinday=='Fri' || $checkinday=='Sat' || $pub=='PUB')
                        {
                            $amount=$memberweekendamount;
                        }
                        else
                        {

                            $amount=$memberweekdaysamount;
                        }


                    

                     
                         $noofroomss=1;
                      $subtotal=$amount*$noofroomss;
                      $subtotals[]=$amount*$noofroomss;

                      $total=array_sum($subtotals);
                    

                          $html.='
                          <div style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; padding: 5px;  line-height: 13px;">
                          <table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 150px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofroomss.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>
                          </div>';
                      
                       }


                       if($nubememberid=='')
                    {

                    }
                    else
                    {
                       $html.='<p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center; border-bottom: 1px dotted;"> </p><p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center;">Non Member Rate</p>';
                    }

                       //remainingroom


                       for ($i=$date_from; $i<$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                        
                          if(in_array($dd,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }


                        
                        if($checkinday=='Fri' || $checkinday=='Sat' || $pub=='PUB')
                        {
                            $amount=$publicweekendamount;
                        }
                        else
                        {

                            $amount=$publicweekdaysamount;
                        }

                     


                      
                     $noofroomss1=$noofrooms-1;
                     $subtotal=$amount*$noofroomss1;
                      $subtotals[]=$amount*$noofroomss1;

                      $total=array_sum($subtotals);

                          $html.=' <div style="padding: 5px;  line-height: 13px;"><table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 150px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofroomss1.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table></div>';
                      
                       }




                }
                //sinlgeroom
                else
                {

                            //member per 1 room
                        for ($i=$date_from; $i<$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                          
                        
                    

                              if(in_array($dd,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }


                        
                        if($checkinday=='Fri' || $checkinday=='Sat' || $pub=='PUB')
                        {
                            $amount=$memberweekendamount;
                        }
                        else
                        {

                            $amount=$memberweekdaysamount;
                        }


                    

                     

                      
                     $noofroomss=1;
                     $subtotal=$amount*$noofroomss;
                      $subtotals[]=$amount*$noofroomss;

                      $total=array_sum($subtotals);

                          $html.=' <div style="padding: 5px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; line-height: 13px;"><table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 150px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofroomss.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table></div>';
                      
                       }


                }    

        }


} 


}//---------------------
              //advance amount----------------         

  
          
            $datas001=$this->db->where('pnr_number',$pnrnumber)->get('bookingrooms')->result_array();

       
          foreach ($datas001 as $a001)
             {
                 $promocodea =$a001["promocode"];
             }

             if($promocodea=='')
             {
               $promocode='';
               

             }
             else
             {
                $promocode='Using Promocode and Code is '.$promocodea.'';
              
             }


        


            $datas1=$this->db->where('checkin',1)->where('pnrnumber',$pnrnumber)->get('bookingroom')->result_array();

				if($datas1)
				{
					foreach ($datas1 as $a1)
			 			 {
			           $aa =$a1["advance_amount"];
			           $depositamount =$a1["depositamount"];
			            }

				}
				else
				{
					$aa='0';
				}        


              $datas2=$this->db->where('checkin',1)->where('pnr_number',$pnrnumber)->get('payadvance')->result_array(); 
              if($datas2)
				{
              			foreach ($datas2 as $a2) 
              			{
			            	$advatotal[]=$a2["advanceamount"];
			            }

			     } 
			     else
			     {
			     	$advatotal[]='0';
			     }      

			                 $bb=array_sum($advatotal);
			                 $totaladvances=$aa+$bb;


			     //advance amount end---------------------- 
			     
			     //addon amount-------------------
			    $datas3=$this->db->where('checkin',1)->where('pnr_number',$pnrnumber)->get('payadon')->result_array();

		
			    if($datas3)
				{	
						foreach ($datas3 as $a3) 
						{

			            	$adontotals[]=$a3["amount"];
			            }
			     }
			     else
			     {
			     	$adontotals[]='0';
			     }  

			     $adontotal=array_sum($adontotals);     

     //addon amount end---------------  
     //calucation-------------------

     		//grandtotal======
			     $grandtotal=$total + $adontotal;
             //======= 
             //servicetax=====
			    //$servicetaxamount=(($grandtotal*6)/100);
             // 
             //cesstax========
			    //$cessamount=(($grandtotal*"0.50")/100);
             //======== 
             //grandtotals======
			    $grandtotals=$grandtotal;
             //===========  
            //servicetax=====
            $servicetaxamounts=(($grandtotals*5)/100);
            //

            //totalamunt===
            $totalamount=$grandtotals+$servicetaxamounts;
            //==========

			 //balanceamount=======
			   $balanceamounts=$totaladvances-$totalamount;
		      if($balanceamounts<0)
		      {
		      	$balanceamountaa=$totalamount-$totaladvances;
            $balanceamount=number_format($balanceamountaa, 2, '.', '');
		      	$returnamount="Nill";
		      	$html.='
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

        // <tr>
        //             <td style="font-size: 14px; padding: 0px 0px 8px 8px;">GST @ 6%</td>
        //             <td style="padding: 8px 0px 8px; 0px">:</td>
        //             <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;" id="servicetaxamount1">'.number_format($servicetaxamount, 2, '.', '').'</td>
        //           </tr>  


                    $html.=' </td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;" id="total1">'.number_format($total, 2, '.', '').'</td>
                  </tr >

                  <tr style="border-bottom: 1px solid rgb(225, 225, 225);">
                    <td style="font-size: 14px; padding: 8px 0px 8px 8px;">Add-on Amount</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;" id="adontotal1">'.number_format($adontotal, 2, '.', '').'</td>
                  </tr>  

                    <tr style="border-bottom: 1px solid rgb(225, 225, 225);">
                    <td style="font-size: 14px; padding: 8px 0px 8px 8px;">Sub Total</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;" id="grandtotal1">'.number_format($grandtotal, 2, '.', '').'</td>
                  </tr>  
                 

                  <tr>
                    <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Grand Total</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;" id="grandtotals1">'.number_format($grandtotals, 2, '.', '').'</td>
                  </tr>

                  <tr>
                    <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Service Charge @ 5%</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;" id="servicetaxamounts1">'.number_format($servicetaxamounts, 2, '.', '').'</td>
                  </tr> 
                  
                  <tr>
                    <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Total Amount</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;" id="totalamount1">'.number_format($totalamount, 2, '.', '').'</td>
                  </tr> 
                  <tr style="border-bottom: 1px solid rgb(225, 225, 225);">
                    <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Online Paid Amount &nbsp;&nbsp;&nbsp<span style="color:green;font-weight:bold;">'.$promocode.'</span></td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;" id="totaladvances1">'.$totaladvances.'</td>
                  </tr> 


                

                  <tr>
                    <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Balance Amount</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;" id="balanceamount1">'.$balanceamount.'</td>
                  </tr>

                  <tr id="enter_amount">
                    <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Enter Amount</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;"><input type="text" style="width: 40%;" name="enteramount" id="enteramount" class="form-control"></td>
                  </tr>

                  <tr>
                    <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Return Amount</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;" id="returnamount1">'.$returnamount.'</td>
                  </tr> 

                    <tr>
                    <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Extra Charges</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;"><input type="text" name="extracharges"  style="width: 35%;" id="extracharges" class="form-control"></td>
                  </tr> 

                  <tr>
                    <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Remarks</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;" ><textarea name="remarks" id="remarks"></textarea></td>
                  </tr> ';

                  // <tr>
                  //   <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Deposit Amount</td>
                  //   <td style="padding: 8px 0px 8px; 0px">:</td>
                  //   <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;" ><input type="text" name="depositamount" readonly style="width: 35%;" id="depositamount" value="'.$depositamount.'" class="form-control"></td>
                  // </tr> 

                  // <tr>
                  //   <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Fine Amount</td>
                  //   <td style="padding: 8px 0px 8px; 0px">:</td>
                  //   <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;"><input type="text" name="fineamount"  style="width: 35%;" id="fineamount" class="form-control"></td>
                  // </tr> 

                  // <tr>
                  //   <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Remarks</td>
                  //   <td style="padding: 8px 0px 8px; 0px">:</td>
                  //   <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;" ><textarea name="remarks" id="remarks"></textarea></td>
                  // </tr> 

                  //  <tr>
                  //   <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Refund Amount</td>
                  //   <td style="padding: 8px 0px 8px; 0px">:</td>
                  //   <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;" ><input type="text" name="refundamount"  style="width: 35%;" value="'.$depositamount.'"  id="refundamount"  class="form-control"></td>
                  // </tr> 
                  
                    $html.='<tr>
                    <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Room Inspected By</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;">
                    <select name="inspectedby" id="inspectedby">
                    <option value="">Inspected By</option>
                   <option value="Ganesan">Ganesan</option>
                    <option value="Rajah">Rajah</option>
                    </select>
                    </td>
                  </tr>


                  <tr>
                    <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Room Inspected</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;"><input type="checkbox" name="roominspected" id="roominspected" value="YES" class="" ></td>
                  </tr>     



                  <tr ><table style="margin: 16px 0px;"><tr id="check_out">
                  <td width="150"></td>

                    <td ><button type="button" class="btn btn-primary btn-lg" style="background-color: rgb(15, 180, 15); border-color: rgb(15, 180, 15); font-weight: bold;" onclick="modals();">Check-out</button></td>
                     <td></td></tr></table>
                  </tr>   


                 </tbody>
              </table>




    </div>
   

  </div>

  <script>
   $("#enteramount").keyup(function(){
    var balance_amount=$(".balance_amount").val();
    var enteramount=$("#enteramount").val();
    $(".enteramount").val(enteramount);
    
    if(balance_amount==enteramount)
    {
        $("#check_out").show();
    }
    else
    {
      $("#check_out").hide();
    }

  });

$("#fineamount").keyup(function(){
    var depositamount=$("#depositamount").val();
    var fineamount=$("#fineamount").val();
    var refundamounts=parseFloat(depositamount)-parseFloat(fineamount);
    var refundamount=refundamounts.toFixed(2);
    $("#refundamount").val(refundamount);

  

  });

var totals1=$("#total1").text();
var adontotals1=$("#adontotal1").text();
var grandtotals1=$("#grandtotal1").text();
var servicetaxamounts1=$("#servicetaxamount1").text();
var cessamounts1=$("#cessamount1").text();
var totalamounts1=$("#totalamount1").text();
var totaladvancess1=$("#totaladvances1").text();
var balanceamounts1=$("#balanceamount1").text();
var enteramounts1=$("#enteramount").text();
var returnamounts1=$("#returnamount1").text();

var grandtotalss1=$("#grandtotals1").text();
var servicetaxamountss1=$("#servicetaxamounts1").text();





$(".subtotal").val(totals1);
$(".adonamount").val(adontotals1);
$(".grandtotal").val(grandtotals1);
$(".stax").val(servicetaxamounts1);
$(".btax").val(cessamounts1);
$(".total_amount").val(totalamounts1);
$(".advanc_amount").val(totaladvancess1);
$(".balance_amount").val(balanceamounts1);
$(".enteramount").val(enteramounts1);
$(".return_amount").val(returnamounts1);

$(".grandtotals").val(grandtotalss1);
$(".staxs").val(servicetaxamountss1);


var pnr=$("#pnr").text();
		       var dtfrm=$("#dtfrm").text();
		       var tm=$("#tm").text();
		       var romtyp=$("#romtyp").text();
		       var nfrm=$("#nfrm").text();
		       var romno=$("#romno").text();
		       var nam=$("#nam").text();
		       var mob=$("#mob").text();

	  $(".pnrnumber").html(pnr);
       $(".pnr_number").val(pnr);
        $(".datefrom").html(dtfrm);
         $(".tims").html(tm);
          $(".roomtype").html(romtyp);
           $(".noofroom").html(nfrm);
            $(".roomno").html(romno);
 			 $(".name").html(nam);
               $(".mobile").html(mob);


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
			$noofrooms=$a['noofrooms'];
			$nubememberid=$a['nubememberid'];
			$adults=$a['noofadults'];
			$children=$a['children'];						
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
             $billnumber=str_pad($ininvID, 4, '0', STR_PAD_LEFT);
	
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
					'nubememberid'=>$nubememberid,
					'noofdays'=>$_POST['noofdays'],
					'noofroom'=>$noofrooms,
					'subtotal'=>$_POST['subtotal'],
					'roominspected'=>'Yes',
					'grandtotal'=>$_POST['grandtotal'],
          'grandtotals'=>$_POST['grandtotals'],
					'addonamount'=>$_POST['addonamount'],
					'servicetax'=>$_POST['servicetax'],
					'bharatcesstax'=>$_POST['bharatcesstax'],
					'servicetaxamount'=>$_POST['servicetaxamount'],
          'servicetaxamounts'=>$_POST['servicetaxamounts'],
					'bharatcesstaxamount'=>$_POST['bharatcesstaxamount'],
					'totalamount'=>$_POST['totalamount'],
					'advanceamount'=>$_POST['advanceamount'],
					'balanceamount'=>$_POST['balanceamount'],
					'enteramount'=>$_POST['enteramount'],
					'returnamount'=>$_POST['returnamount'],
					'depositamount'=>$_POST['depositamount'],
					'fineamount'=>$_POST['fineamount'],
					'remarks'=>$_POST['remarks'],
					'refundamount'=>$_POST['refundamount'],
					'inspectedby'=>$_POST['inspectedby'],
					'status'=>1);
							


				$data1=array('check_out'=>1);

				$data2=array( 'checkin'=>0,
					          'checkout'=>1);

				$data3=array('checkin'=>0);

				
          $this->db->where('pnr_number',$pnrnumber);
    $this->db->update('bookingrooms',$data1);

    $this->db->where('pnrnumber',$pnrnumber);
    $this->db->update('bookingroom',$data2);

      $dat1=$this->db->where('pnr_number',$pnrnumber)->get('payadvance')->result();
      if($dat1)
      {
        $count=count($dat1);
        
        for ($i=0; $i <$count ; $i++) { 
          $this->db->where('pnr_number',$pnrnumber);
         $this->db->update('payadvance',$data3);  
        }
         
      }
      

      $dat2=$this->db->where('pnr_number',$pnrnumber)->get('payadon')->result();
      if($dat2)
      {
         $counts=count($dat2);
        for ($j=0; $j <$counts ; $j++) { 
         $this->db->where('pnr_number',$pnrnumber);
         $this->db->update('payadon',$data3);
        }
        
      }
      
					         

		 $result=$this->checkoutmodel->checkoutroom($data);
		if($result==true)
		{

			 $result=$this->checkoutmodel->mailcheckoutroom($pnrnumber,$datefrom,$time,$room_type,$noofrooms,$adults,$children,$name,$email,$mobileno,$billnumber,$roomno);
			
			//redirect('dashboard');


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

public function print_details()
  {
    $id=$this->uri->segment('3');
    
    $this->db->where('id',$id);
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


public function viewdetails()
{
  $id=$this->uri->segment('3');
  $data['details']=$this->db->where('id',$id)->get('checkoutroom')->result_array();
  $this->load->view('includes/header');
  $this->load->view('checkoutdetails',$data);
  $this->load->view('includes/footer');
}

PUblic function totalreports()
    {
      $data['out']=$this->checkoutmodel->search();
    
      $this->load->view('includes/header');
      $this->load->view('totalreports',$data);
      $this->load->view('includes/footer');

    }
		
public function roomdetails()
{
  $data['room']=$this->checkoutmodel->detailsroom();
  // echo "<pre>";
  // print_r($data['out']);
  $this->load->view('includes/header');
  $this->load->view('roomdetails',$data);
  $this->load->view('includes/footer');
}


}	