<?php
include_once "db/connection.php";

	$pnrnumber=$_POST['pnrnumber'];
	

	$query_update1 =mysql_query("SELECT * FROM bookingrooms WHERE   pnr_number='".$pnrnumber."'and  ad_status='1' and check_in=0");

		 $count=mysql_num_rows($query_update1);

		 if($count=='0')
		 {
		 	echo '<div class="col-md-12 col-sm-12" style="border: 2px solid green; padding: 10px; margin-top: 20px;">

             <h3 style="margin-top: 10px; margin-bottom: -15px; color:red;">Invalid Reservation Number</h3>
             </div>
             <script>
		                             	
		                             	$(".output").show();
		                             	$("#submit").show();
		                             </script>';
		 }

		 else
		 {
		 	
		 	

		 		while($a = mysql_fetch_array($query_update1))
  
				 {
				 	$pnr_number=$a['pnr_number'];
					$checkin=$a['checkin'];
					$checkout=$a['checkout'];
					$roomtypeid=$a['roomtypeid'];
					$roomtype=$a['roomtype'];
					$roomamount=$a['roomamount'];
					$numberofdays=$a['numberofdays'];
					$amount=$a['amount'];
					$totalamount=$a['totalamount'];
					$firstname=$a['firstname'];
					$lastname=$a['lastname'];
					$email=$a['email'];
					$mobile=$a['mobile'];
					$room_no=$a['room_no'];
					$adults=$a['adults'];
					$children=$a['children'];
					$extra_bed=$a['extra_bed'];
					$comments=$a['comments'];
					$promocode=$a['promocode'];

				 		
				 }


				 $todaydate=date('Y-m-d');


				 if($promocode!='')
				 {

				 	echo '<div class="col-md-12 col-sm-12" style="border: 2px solid green; padding: 10px; margin-top: 20px;">

             <h3 style="margin-top: 10px; margin-bottom: -15px; color:red;">Only Once Cancelled the Room</h3>
             </div>
             <script>
		                             
		                             	$(".output").show();
		                             	$("#submit").show();
		                             </script>';

				 }
				 elseif( $todaydate >= $checkin)
				 {
				 	echo '<div class="col-md-12 col-sm-12" style="border: 2px solid green; padding: 10px; margin-top: 20px;">

             <h3 style="margin-top: 10px; margin-bottom: -15px; color:red;">Your Cancellation date is expired. Because Your Check In Date : '.date('d/m/Y',strtotime(str_replace('-', '/', $checkin))).'</h3>
             </div>
             <script>
		                             	
		                             	$(".output").show();
		                             	$("#submit").show();
		                             </script>';
				 }
				 else
				 {

				 				echo '<div class="row">

<div class="col-md-12 col-sm-12" style="border: 2px solid green; padding: 10px; margin-top: 20px;">


<h3 style="margin-top: 10px; margin-bottom: -15px;">Details</h3>
<div class="col-md-5">
<p>PNR Number</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<p>'.$pnr_number.'</p>
</div>
<div class="clearfix"></div>
<div class="col-md-5">
<p>Check-in</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<p>'.$checkin.'</p>
</div>
<div class="clearfix"></div>
<div class="col-md-5">
<p>Check-out</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<p>'.$checkout.'</p>
</div>
<div class="clearfix"></div>
<div class="col-md-5">
<p>Room Type</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<p>'.$roomtype.'</p>
</div>
<div class="clearfix"></div>
<div class="col-md-5">
<p>No of Rooms</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<p>'.$room_no.'</p>
</div>
<div class="clearfix"></div>
<div class="col-md-5">
<p>First Name</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<p>'.$firstname.'</p>
</div>
<div class="clearfix"></div>
<div class="col-md-5">
<p>Last Name</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<p>'.$lastname.'</p>
</div>
<div class="clearfix"></div>
<div class="col-md-5">
<p>Email</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<p>'.$email.'</p>
</div>
<div class="clearfix"></div>
<div class="col-md-5">
<p>Moble No</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<p>'.$mobile.'</p>
</div>
<div class="clearfix"></div>
<div class="col-md-5">
<p>Cancellation Reason</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<input type="hidden" name="pnr_number" value="'.$pnr_number.'">
 <textarea class="form-control" id="cancelreason" cols="30" rows="3" name="cancelreason"></textarea
</div>
<div class="clearfix"></div>
<div id="asdf11"></div>
<div class="col-md-12 col-sm-12 text-center asddc">
	<input class="btn btn-success btn-sm booking_btn" id="submits" value="Cancellation" type="submit" style="padding: 7px 27px;">
</div>


</div>


</div>
                                       <script>
		                             	
		                             	$(".reser").hide();
		                             	$(".output").show();
		                             </script>'; 


				 }









	
				 

















		 }



?>