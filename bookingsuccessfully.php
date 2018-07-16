<?php

ob_start();
include_once "db/connection.php";
$custom=$_POST['custom'];

 $type =mysql_query("SELECT * FROM bookingrooms WHERE id='".$custom."'");
     

            while($row = mysql_fetch_array($type))
  
            {
                  $roomtypeid=$row['roomtypeid'];
                  $checkin=$row['checkin'];
                  $checkout=$row['checkout'];
                  $roomtype=$row['roomtype'];
                  $dormbed=$row['drombed'];
                  $firstname=$row['firstname'];
                  $lastname=$row['lastname'];
                  $email=$row['email'];
                  $icnumber=$row['icnumber'];
                  $line1=$row['line1'];
                  $line2=$row['line2'];
                  $city=$row['city'];
                  $postcode=$row['postcode'];
                  $mobile=$row['mobile'];
                  $room_no=$row['room_no'];
                  $adults=$row['adults'];
                  $children=$row['children'];
                  $extra_bed=$row['extra_bed'];
                  $address=$row['address'];
                  $state=$row['state'];
                  $country=$row['country'];
                  $roomamount=$row['roomamount'];
                  $numberofdays=$row['numberofdays'];
                  $subtotal=$row['subtotal'];
                  $subtotal1=$row['subtotal1'];
                  $total=$row['total'];
                  $bookingtype=$row['bookingtype'];
                  $nubememberid=$row['nubememberid'];
                  $pnr_numbers=$row['pnr_number'];
                  $depositamount=$row['depositamount'];
                  $promocode=$row['promocode'];

           }

          
		
			

$date1 = str_replace('-', '/', $checkin);
  $checkind= date('d/m/Y', strtotime($date1));

  $date2 = str_replace('-', '/', $checkout);
  $checkoutd= date('d/m/Y', strtotime($date2));


				$date=date('Y-m-d');

        $query_update ="UPDATE  bookingrooms SET status='1',ad_status='1',check_in='0',check_out='0' WHERE id='".$custom."'";

		$rs_update=mysql_query($query_update) or die (mysql_error());
	if(mysql_affected_rows()>0)
	{
			 //echo $promocode;

		 $query_updatesa ="UPDATE  cancelbooking SET status='0',validity_status='0',code_status='0' WHERE promocode='".$promocode."' AND email='".$email."'";
			$rs_updates=mysql_query($query_updatesa) or die (mysql_error());


        $typeaa =mysql_query("SELECT * FROM cancelbooking WHERE promocode='".$promocode."' AND email='".$email."'");
     

            while($rowaa = mysql_fetch_array($typeaa))
  
            {

                  $previouscheckin=$rowaa['checkin'];
                  $previouscheckout=$rowaa['checkout'];
                  $previousroomtype=$rowaa['roomtype'];
                  $previousroom_no=$rowaa['room_no'];
                  $previousnumberofdays=$rowaa['numberofdays'];
                  $previouspnr_numbers=$rowaa['pnr_number'];
                  $previousoldonlinepayments=$rowaa['onlinepayment'];
                  $previoustranscationid=$rowaa['transcation_id'];
            }

		        $balanceamounts=$total-$previousoldonlinepayments;
              if($balanceamounts  < 0)
              {
                $balanceamount='0.00';
              }
              else
              {
                $balanceamount=$balanceamounts;
              }
		
				// $user="APIL6ZHNX1TP1";
				// $pass="APIL6ZHNX1TP1L6ZHN";
				// $sms_from="onewaysms";
				// $sms_to=$mobile;
				// $sms_msg="Hi! ".$firstname." . Your PNR Number is : ".$pnr_numbers."";
		
				//  $query_string = "api.aspx?apiusername=".$user."&apipassword=".$pass;
    //                     $query_string .= "&senderid=".rawurlencode($sms_from)."&mobileno=".rawurlencode($sms_to);
    //                     $query_string .= "&message=".rawurlencode(stripslashes($sms_msg)) . "&languagetype=1";        
    //                     $url = "http://gateway.onewaysms.com.au:10001/".$query_string;       
    //                     $fd = @implode ('', file ($url));      
                        // if ($fd)  
                        // {                       
				 //    if ($fd > 0) {
					// Print("MT ID : " . $fd);
					// $ok = "success";
				 //    }        
				 //    else {
					// print("Please refer to API on Error : " . $fd);
					// $ok = "fail";
				 //    }
     //                    }           
     //                    else      
     //                    {                       
     //                                // no contact with gateway                      
     //                                $ok = "fail";       
     //                    }           
     //                    return $ok; 


                        $message='	<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book My College </title>
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
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Room Type</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$roomtype.'</strong></td>
        </tr>
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">No of Rooms</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$room_no.'</strong></td>
        </tr>
       
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">No of Nights</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$numberofdays.'</strong></td>
        </tr>

         <tr>
          <td colspan="3" align="center" style="border-bottom: 3px solid rgb(242, 242, 242); padding: 11px; font-weight: bold; text-transform: uppercase; text-decoration: underline;">Promocode Details</td>
          
        </tr>

           <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Promocode</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$promocode.'</strong></td>
        </tr>

        <tr>
 


          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Previous Reservation Number</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$previouspnr_numbers.'</strong></td>
        </tr>

           <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Previous Checkin Date</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.date('d/m/Y', strtotime(str_replace('-', '/', $previouscheckin))).'</strong></td>
        </tr>
   

           <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Previous Checkout Date</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.date('d/m/Y', strtotime(str_replace('-', '/', $previouscheckout))).'</strong></td>
        </tr>

            <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Previous Room Type</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$previousroomtype.'</strong></td>
        </tr>
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Previous No of Rooms</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$previousroom_no.'</strong></td>
        </tr>
       
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Previous No of Nights</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$previousnumberofdays.'</strong></td>
        </tr>

         <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Previous Transcation Id</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$previousoldonlinepayments.'</strong></td>
        </tr>

         <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Previous Payment</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$previoustranscationid.'</strong></td>
        </tr>

         <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Total Room Rent</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$total.'</strong></td>
        </tr>

         <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Balance Amount</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.number_format($balanceamounts,2).'</strong></td>
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
//echo $message;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

$to=$email;
$subject="Room Booking Confirmation";




//send the email
$mail = mail( $to, $subject , $message,$headers);

//echo $mail ? "Mail sent" : "Mail failed";

/////////////enndddd
?>


<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nube Hotel</title>

		
	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/datepicker.css" type="text/css" media="screen">
  	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.4.css" media="screen">
	<link rel="stylesheet" href="css/dr-framework.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/navigation.css" type="text/css" media="screen">
	<link rel="stylesheet" type="text/css" href="css/fullwidth.html" media="screen" />
	<link rel="stylesheet" href="css/revslider.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/jquery.bxslider.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/zebra.css" type="text/css">
    <link rel="stylesheet" href="css/ionicons.css" type="text/css">
	<link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/ionicons.min.css" type="text/css" media="screen">
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    
    <link id="stylesheet" rel="stylesheet" type="text/css" href="css/zInput_default_stylesheet.css">

	<link rel="icon" href="images/favicon.png" type="image/png" sizes="24x24">

	<!--[if lt IE 9]>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
	<!-- html5.js for IE less than 9 -->
	<!-- css3-mediaqueries.js for IE less than 9 -->
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!--[if lt IE 9]>
 	<link rel="stylesheet" type="text/css" href="css/ie8-and-down.css" />
	<![endif]-->
</head>
<body>

	<!-- Start Header -->
	<?php include_once "includes/header.php";?>
	<!-- End Header--> 
		<div class="banner">
		
	</div>
	

	<div class="inner-banner">
		
		<div class="clear"></div>
	</div>	

	<!-- Container -->
    
    <div class="wrapper dark">
		<div class="contact-row column12">

	

					<div class="col-md-12 col-sm-12 padding-left" style="margin-top: 20px;"> 
		   
		    <div class="col-md-2 col-sm-4">
		    </div>
		    <div class="col-md-8 col-sm-4">
		   
		    <div style="border: 2px solid rgba(0, 166, 81, 0.3); border-radius: 15px; background-color: rgba(0, 166, 81, 0.09); text-align: center; padding: 20px;">
		  <img src="images/paymentsucces.png" class="img-responsive" style="margin-left: 46%;">

		<h3>Thank You !</h3>
		  <p>Your Booking  has been processed successfully.</p>
		    <p>We will sent you a confirmation email shortly.</p>
		     <p>Your Reservation Number <?php echo $pnr_numbers;?></p>
		   </div>
		   
		   
		    </div>
		   
		    <div class="col-md-2 col-sm-4">
		    </div>
		 
		     </div>


		



		

	   
    <div class="clearfix"></div>
    </div>
 
		</div>	
	
		<div class="clear"></div>
				

	</div>
	<!-- End Wrapper -->

    
	<!-- Footer -->
	
<?php include_once "includes/footer.php";?>


<?php


}

else
{
header("Location: cancel.php");

}

ob_flush();

?>
