<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roomsearch extends CI_Controller {

	
	public function index()
	{
		$this->load->view('includes/header');
		$this->load->view('bookingroom');
		$this->load->view('includes/footer');
	}

	public function searchroom()
	{
		$checkin=$this->input->post('checkin');
		$checkout=$this->input->post('checkout');
		$roomtype=$this->input->post('roomtype');

		
		$sql="SELECT group_concat(bookingroom.roomno) FROM bookingroom WHERE ((datefrom between '".$checkin."' AND '".$checkout."') OR (dateto between '".$checkin."' AND '".$checkout."')) and  roomtypeid='".$roomtype."'";

		 $data=mysql_query($sql);
		

		 while ($a=mysql_fetch_array($data) ) 
		 {
		 	$b=array_unique($a);
		 	if( $b['0']=='')
		 	{
		 		$d='0';

		 	}
		 	else
		 	{
		 		$c=explode(',', $b['0']);
		 	    $d=count($c);

		 	}
		 	 
		 	 
		 		 	
		 }

		 // echo"<pre>";
		 // print_r($c);

		 //echo $d;
		 $type=$this->db->where('roomtypeid',$roomtype)->get('roomnotable')->result_array();
		 $types= count($type);

		 $result=$types - $d;
		echo $result;


		
	}


	public function roomtype()
	{
		$roomtype=$this->input->post('roomtype');
		$data=$this->db->where('id',$roomtype)->get('roomtypes')->result_array();

		foreach ($data as $a) 
		{

			$roomtypes=$a['roomtype'];
			
		}

		echo $roomtypes;
	}

	public function checknoofrooms()
	{
		$roomtypeid=$this->input->post('roomtypeid');
		$dormbed=$this->input->post('dormbed');
		$data=$this->db->where('roomtypeid',$roomtypeid)->get('roomnotable')->result_array();


				if($roomtypeid=='4')
			{
						if($dormbed=='10')

					{

				    $count=5;
					 $html='<select class="form-control"  name="room_no" id="room_no">
					 <option value="">Number Of Units</option>';

					        for ($i=0; $i <$count ; $i++) 
							{ 
								$j=$i+1;
							$html.='<option value="'.$j*$dormbed.'">'.$j*$dormbed.'-Units</option>';	
							}
					            
					       $html.='</select>';

					  }  
					  
					  if($dormbed=='12')

					{

				    $count=4;
					 $html='<select class="form-control"  name="room_no" id="room_no">
					 <option value="">Number Of Units</option>';

					        for ($i=0; $i <$count ; $i++) 
							{ 
								$j=$i+1;
							$html.='<option value="'.$j*$dormbed.'">'.$j*$dormbed.'-Units</option>';
							}
					            
					       $html.='</select>';

					  }    

					  if($dormbed=='22')

					{

				    $count=1;
					 $html='<select class="form-control"  name="room_no" id="room_no">
					 <option value="">Number Of Units</option>';

					        for ($i=0; $i <$count ; $i++) 
							{ 
								$j=$i+1;
							$html.='<option value="'.$j*$dormbed.'">'.$j*$dormbed.'-Units</option>';
							}
					            
					       $html.='</select>';

					  }      

			}
			else
			{
				$count=count($data);
			 $html='<select class="form-control"  name="room_no" id="room_no">
			  <option value="">Number Of Units</option>';
			        for ($i=0; $i <$count ; $i++) 
					{ 
						$j=$i+1;
					$html.='<option value="'.$j.'">'.$j.'-Units</option>';	
					}
			            
			       $html.='</select>';

			}
			 

			       echo $html;

		
		
	}

	public function roomamount()
	{
		// $roomtype=$this->input->post('roomtype');
		// $data=$this->db->where('id',$roomtype)->get('roomtypes')->result_array();

		// foreach ($data as $a) 
		// {

		// 	$amount=$a['amount'];
			
		// }

		// echo $amount;
	}


	public function roomcheck()
	{
		$checkin=$this->input->post('checkin');
		$checkout=$this->input->post('checkout');
		$roomtype=$this->input->post('roomtype');
		$dormbed=$this->input->post('dormbed');
		$room_no=$this->input->post('room_no');


		// $checkin='2016-05-18';
		// $checkout='2016-05-19';
		// $roomtype='4';
		// $room_no='4';
		// $dormbed='10';




	if($roomtype==4) 
     {
		
		$query = $this->db->query("SELECT * FROM bookingrooms WHERE ((checkin between '".$checkin."' AND '".$checkout."') OR (checkout between '".$checkin."' AND '".$checkout."')) and  roomtypeid='".$roomtype."' and  drombed='".$dormbed."'and  ad_status='1' and check_out=0");

	}	

	else
	{
		$query = $this->db->query("SELECT * FROM bookingrooms WHERE ((checkin between '".$checkin."' AND '".$checkout."') OR (checkout between '".$checkin."' AND '".$checkout."')) and  roomtypeid='".$roomtype."' and  ad_status='1' and check_out=0");
	}

		$data= $query->result_array();


		 
		

	 if($data)
	 {

		 		foreach ($data as $a) 
		 {
		 		$roomno[]=$a['room_no'];

		 		
		 }

		 $cc=array_sum($roomno);

		
		 if($roomtype==4) 
     {
		 $type=$this->db->where('roomtypeid',$roomtype)->where('drombed',$dormbed)->get('roomnotable')->result_array();
		 

	}
	else
	{
		 $type=$this->db->where('roomtypeid',$roomtype)->get('roomnotable')->result_array();
	}
      $types= count($type);
		

		  $results=$types - $cc;
		 $result=$results-$room_no;

	
     //             echo $types;echo "<br>";
				 // echo $results;
		 if($result>=0)
		 {
		 	
		 		echo $result;
		 }
		 else
		 {

		 
		 
		 return false;
		 }
		 	
	}

		 else
		 {

				 	 if($roomtype==4) 
		     {
				 $type=$this->db->where('roomtypeid',$roomtype)->where('drombed',$dormbed)->get('roomnotable')->result_array();
				 

			}
			else
			{
				 $type=$this->db->where('roomtypeid',$roomtype)->get('roomnotable')->result_array();
			}
				 $types= count($type);

				 // echo $types;echo "<br>";
				 // echo $room_no;
				  
				 $result=$types-$room_no;

				 
				 if($result>=0)
				 {
				 	
				 		echo $result;
				 }
				 else
				 {

				 	
				 
				 return false;
				 }
		 	
	   }

		 
	


		
	}


	public function searchpnrnumber()
	{
		$pnr_no=strtoupper($this->input->post('pnrnumber'));

		$data=$this->db->where('check_in',0)->where('ad_status',1)->where('pnr_number',$pnr_no)->get('bookingrooms')->result_array();

		$currentdate=date('Y-m-d');

			if($data)
			{
					foreach ($data as $res) {
						
					$date1=$res['checkin']; 
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
            <td><b>'.$res['checkin'].'</b></td>
            </tr>
            
            <tr>
            <td >Check Out</td>
            <td>:</td>
            <td><b>'.$res['checkout'].'</b></td>
            </tr>
            
            <tr>
            <td >Reservation Number</td>
            <td>:</td>
            <td><b>'.$res['pnr_number'].'</b> </td>
            </tr>

            <tr>
            <td >Name</td>
            <td>:</td>
            <td><b>'.$res['firstname'].'&nbsp;'.$res['lastname'].' </b> </td>
            </tr>

            <tr>
            <td >Mobile No</td>
            <td>:</td>
            <td><b>'.$res['mobile'].'</b> </td>
            </tr>

             <tr>
            <td >Email</td>
            <td>:</td>
            <td><b>'.$res['email'].'</b> </td>
            </tr>

            <tr>
            <td >Number of Rooms</td>
            <td>:</td>
            <td><b>'.$res['room_no'].'</b> </td>
            </tr>

            <tr>
            <td >Room Type</td>
            <td>:</td>
            <td><b>'.$res['roomtype'].'</b> </td>
            </tr>

                  
        </tbody>
        </table>';

		if($currentdate==$res['checkin'])
			{

    	$html.='<div class="col-md-12 text-center" style="margin-bottom: 30px;">
         <a onclick="modals()" class="btn btn-primary"   id="proceed" style="padding: 4px 50px; line-height: 25px;">Book</a>
        </div>';
           }
           elseif($currentdate==$res['checkout'])
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
<input type="hidden" name="row1" value="'.$res['roomtypeid'].'" id="row1">
<input type="hidden" name="row2" value="'.$res['checkin'].'" id="row2">
<input type="hidden" name="row3" value="'.$res['roomtype'].'" id="row3">
<input type="hidden" name="row4" value="'.$res['room_no'].'" id="row4">
<input type="hidden" name="row5" value="'.$res['pnr_number'].'" id="row5">
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


	public function memberidcheck()
	{
		$nubememberid=$this->input->post('nubememberid');
		$data=$this->db->where('memberid',$nubememberid)->get('memberid_list')->result_array();
		if($data)
		{
			$a='yes';
		}
		else
		{
			$a='';
		}
		echo $a;
	}


}	