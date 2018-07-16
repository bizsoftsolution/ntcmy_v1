<?php

ob_start();
$item_no = $_GET['item_number'];
$item_transaction = $_GET['tx'];
$item_price = $_GET['amt'];
$item_currency = $_GET['cc'];
$status = $_GET['st'];

$custom = $_GET['cm'];

include_once "db/connection.php";




if($status=='Completed')
{

	

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
                  $total=$row['total'];
                  $internethandlingcharges=$row['internethandlingcharges'];
                 

           }


           if($nubememberid)
           {
            $nume='YES';
           }
           else
           {
            $nume='NO';
           }


		$customername=$firstname.' '.$lastname;
				
$date1 = str_replace('-', '/', $checkin);
  $checkind= date('d/m/Y', strtotime($date1));

  $date2 = str_replace('-', '/', $checkout);
  $checkoutd= date('d/m/Y', strtotime($date2));


				$date=date('Y-m-d');

        $query_update ="UPDATE  bookingrooms SET onlinepayments='$item_price',transcation_id='$item_transaction',ad_status='1',check_in='0',check_out='0' WHERE id='".$custom."'";

		$rs_update=mysql_query($query_update) or die (mysql_error());
	if(mysql_affected_rows()>0)
	{


                $query_updateqq ="INSERT INTO emaildetails (date,customername,email,mobileno,status) VALUES('$date','$customername','$email','$mobile','1')";
            $rs_updateqq=mysql_query($query_updateqq) or die (mysql_error());
		
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
<link rel="icon" href="images/favicon.png" type="image/png" sizes="24x24">
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
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

$to=$email;
$subject="Room Booking Confirmation";




//send the email
$mail = mail( $to, $subject , $message,$headers);

//echo $mail ? "Mail sent" : "Mail failed";

/////////////enndddd
header("Location: successfully.php?item_transaction=$item_transaction&item_price=$item_price&status=$status&pnr=$pnr_numbers");



}
else
{

}

}
else
{
header("Location: cancel.php");

}

ob_flush();

?>







    
    
   
    

