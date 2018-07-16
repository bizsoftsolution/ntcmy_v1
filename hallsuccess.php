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

	       $type =mysql_query("SELECT * FROM hallbooking WHERE id='".$custom."'");
     

            while($row = mysql_fetch_array($type))
  
            {
                  $checkindate=$row['checkindate'];
                  $checkoutdate=$row['checkoutdate'];
                  $numberofdays=$row['numberofdays'];
                  $auditorium=$row['auditorium'];
                  $halltype=$row['halltype'];
                  $bookingtype=$row['bookingtype'];
                  $slot=$row['slot'];
                  $facilities=$row['facilities'];
                  $facilitiesamounts=$row['facilitiesamount'];
                  $hours=$row['hours'];
                  $grandtotal=$row['grandtotal'];
                  $chairsrental=$row['chairsrental'];
                  $cleaningcharge=$row['cleaningcharge'];
                  $totalamount=$row['totalamount'];
                  $total=$row['total'];
                  $hallamount=$row['hallamount'];
                  $seats=$row['seats'];
                  $firstname=$row['firstname'];
                  $lastname=$row['lastname'];
                  $email=$row['email'];
                  $icnumber=$row['icnumber'];
                  $line1=$row['line1'];
                  $line2=$row['line2'];
                  $city=$row['city'];
                  $postcode=$row['postcode'];
                  $mobile=$row['mobileno'];
                  $state=$row['state'];
                  $country=$row['country'];
                  $nubememberid=$row['nubememberid'];
                  $pnrnumbers=$row['pnrnumber'];

           }

    $customername=$firstname.' '.$lastname;
        
$date1 = str_replace('-', '/', $checkindate);
  $checkin= date('d/m/Y', strtotime($date1));

  $date2 = str_replace('-', '/', $checkoutdate);
  $checkout= date('d/m/Y', strtotime($date2));


        $date=date('Y-m-d');

	

			
		  

				
				 //echo $facilities;
				//echo $firstname;
 


				$date=date('Y-m-d');


$query_update ="UPDATE  hallbooking SET transcation_id='$item_transaction',status='1',ad_status='1',check_in='0',check_out='0'WHERE id='".$custom."'";

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


                        $message='  <html xmlns="http://www.w3.org/1999/xhtml">
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
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$pnrnumbers.'</strong></td>
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
          <td width="397" style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$checkin.'</strong></td>
        </tr>

        <tr>
          <td width="178" style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Check Out</td>
          <td width="25" style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td width="397" style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$checkout.'</strong></td>
        </tr>

        <tr>
          <td width="178" style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Number of Days</td>
          <td width="25" style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td width="397" style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$numberofdays.'</strong></td>
        </tr>
        
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Auditorium</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$auditorium.'</strong></td>
        </tr>
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Hall Type</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$halltype.'</strong></td>
        </tr>
       
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Total Amount</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$totalamount.'</strong></td>
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
$subject="Hall Booking Confirmation";




//send the email
$mail = mail( $to, $subject , $message,$headers);


/////////////enndddd
header("Location: hallsuccessfully.php?item_transaction=$item_transaction&item_price=$item_price&status=$status&pnr=$pnrnumbers");



}
else
{

}

}
else
{
header("Location: hallcancel.php");

}

 ob_flush();

?>







    
    
   
    

