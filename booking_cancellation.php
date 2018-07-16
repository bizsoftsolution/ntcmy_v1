<?php
include_once "db/connection.php";

	$pnrnumber=$_POST['pnr_number'];
	 
	$cancelreason=$_POST['cancelreason'];




	
	
	$query_update1 =mysql_query("SELECT * FROM bookingrooms WHERE   pnr_number='".$pnrnumber."'");

   		 while($a = mysql_fetch_array($query_update1))
    	{  	  	

				$checkin=$a['checkin'];
				$checkout=$a['checkout'];
				$roomtypeid=$a['roomtypeid'];
				$roomtype=$a['roomtype'];
				$drombed=$a['drombed'];
				$roomamount=$a['roomamount'];
				$numberofdays=$a['numberofdays'];
				$firstname=$a['firstname'];
				$lastname=$a['lastname'];
				$email=$a['email'];
				$mobile=$a['mobile'];
				$room_no=$a['room_no'];
				$adults=$a['adults'];
				$children=$a['children'];
				$extra_bed=$a['extra_bed'];
				$state=$a['state'];
				$country=$a['country'];
				$nubememberid=$a['nubememberid'];
				$icnumber=$a['icnumber'];
				$line1=$a['line1'];
				$line2=$a['line2'];
				$city=$a['city'];
				$town=$a['town'];
				$postcode=$a['postcode'];
				$subtotal=$a['subtotal'];
				$subtotal1=$a['subtotal1'];
				$total=$a['total'];
				$bookingtype=$a['bookingtype'];
				$onlinepayment=$a['onlinepayment'];
				$transcation_id=$a['transcation_id'];
				$depositamount=$a['depositamount'];
				$internethandlingcharges=$a['internethandlingcharges'];
				$onlinepayments=$a['onlinepayments'];

  
		 	}

		   $string = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
           $string_shuffled = str_shuffle($string);
           $promocode = substr($string_shuffled, 1, 7);
                


			$date=date('Y-m-d');

			 $expirydate=date('Y-m-d',strtotime('+183 days'));

		   $query_update ="INSERT INTO cancelbooking (date,expirydate,pnr_number,promocode,checkin,checkout,roomtypeid,roomtype,roomamount,numberofdays,firstname,lastname,email,mobile,room_no,adults,children,state,country,nubememberid,subtotal,subtotal1,total,bookingtype,icnumber,line1,line2,city,town,postcode,drombed,depositamount,onlinepayment,internethandlingcharges,onlinepayments,transcation_id,cancelreason,status,validity_status,code_status) VALUES('$date','$expirydate','$pnrnumber','$promocode','$checkin','$checkout','$roomtypeid','$roomtype','$roomamount','$numberofdays','$firstname','$lastname','$email','$mobile','$room_no','$adults','$children','$state','$country','$nubememberid','$subtotal','$subtotal1','$total','$bookingtype','$icnumber','$line1','$line2','$city','$town','$postcode','$dormbed','$depositamount','$onlinepayment',$internethandlingcharges,'$onlinepayments','$transcation_id','$cancelreason','1','1','1')";

		   

	     $rs_update=mysql_query($query_update) or die (mysql_error());
	     if($rs_update)
	     {

	     	 $sql = "UPDATE  bookingrooms SET status='0',ad_status='0',check_in='0',check_out='0' WHERE  pnr_number='".$pnrnumber."'";

	     	  $rs_updates=mysql_query($sql) or die (mysql_error());

	     	   if($rs_updates)
			       {



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
 

          <td colspan="3" align="center" style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"> <strong>Your Room Booking Cancellation is sucessfully</strong></td>
       
        </tr>
 
  <tr>
 

          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Reservation Number</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$pnrnumber.'</strong></td>
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
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Promo Code</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$promocode.'</strong></td>
        </tr>
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Valid Upto</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.date('d/m/Y',strtotime(str_replace('-', '/', $expirydate))).'</strong></td>
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



			     	echo' <div class="alert alert-success" role="alert" style="font-weight: bold; text-align: center;">
		                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		                    Booking Cancellation sucessfully.
		                             </div>
		                             <script>
		                             	$(".output").hide();
		                             	$(".outputs").show();
		                             </script>';
		                }
		              else
			     {

			     	echo'

		          <div class="alert alert-danger" role="alert" style="font-weight: bold; text-align: center;">
		                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		                    Booking Cancellation Failed.<br>
		                  
		          </div>
                                     <script>
		                             	$(".output").hide();
		                             	$(".outputs").show();
		                             </script>';
		        

			     }  


	     


	     }

	     else
	     {

	     	echo'

          <div class="alert alert-danger" role="alert" style="font-weight: bold; text-align: center;">
                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    Booking Cancellation Failed.<br>
                  
          </div>
         ';

	     }





?>