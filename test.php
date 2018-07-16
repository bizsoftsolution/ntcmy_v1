<?php
include_once "db/connection.php";



		
		$checkindate=$_POST['checkindate'];
		$checkoutdate=$_POST['checkoutdate'];
		$numberofdays=$_POST['numberofdays'];
	    $auditorium=$_POST['auditorium'];
		$halltype=$_POST['halltype'];
		$bookingtype=$_POST['bookingtype'];
		$slot=$_POST['slot'];
		$facilities=implode('|',array_filter($_POST['facilities']));
		$facilitiesamounts=implode('|',array_filter($_POST['facilitiesamounts']));
		$hours=implode('|',array_filter($_POST['hours']));
		$grandtotal=$_POST['grandtotal'];
		$chairsrental=$_POST['chairsrental'];
		$cleaningcharge=$_POST['cleaningcharge'];
		$totalamount=$_POST['totalamount'];
		$total=$_POST['total'];
		$hallamount=$_POST['hallamount'];
		$seats=$_POST['seats'];
        $firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$email=$_POST['email'];
		$icnumber=$_POST['icnumber'];
		$passportnumber=$_POST['passportnumber'];
		$line1=$_POST['line1'];
		$line2=$_POST['line2'];
		$city=$_POST['city'];
		$postcode=$_POST['postcode'];
		$mobile=$_POST['mobile'];
        $state=$_POST['state'];
		$country=$_POST['country'];
        $nubememberid=$_POST['nubememberid'];
		
        $internethandlingcharges1=(($totalamount*3.9)/100);
		$internethandlingcharges=($internethandlingcharges1+2);
        $totalamounts=$totalamount+$internethandlingcharges;


        $date1 = str_replace('/', '-', $checkindate);
	$checkin= date('Y-m-d', strtotime($date1));
$date2 = str_replace('/', '-', $checkoutdate);
  $checkout= date('Y-m-d', strtotime($date2));


  $query_update1 =mysql_query("SELECT * FROM hallbooking ORDER BY id DESC LIMIT 1");

		while($row = mysql_fetch_array($query_update1))
  
		 	{
		 		$pnrnumber=$row['pnrnumber'];
		 		

		   }
 		

	@$bond_no = $pnrnumber;
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
        $pnrnumbers=$new_bond_noo;



				$date=date('Y-m-d');

		$query_update ="INSERT INTO hallbooking (date,pnrnumber,checkindate,checkoutdate,numberofdays,firstname,lastname,mobileno,email,auditorium,halltype,slot,hallamount,seats,bookingtype,state,country,nubememberid,facilities,facilitiesamount,hours,grandtotal,chairsrental,cleaningcharge,totalamount,total,icnumber,passportnumber,line1,line2,city,postcode,internethandlingcharges,totalamounts) VALUES('$date','$pnrnumbers','$checkin','$checkout','$numberofdays','$firstname','$lastname','$mobile','$email','$auditorium','$halltype','$slot','$hallamount','$seats','$bookingtype','$state','$country','$nubememberid','$facilities','$facilitiesamounts','$hours','$grandtotal','$chairsrental','$cleaningcharge','$totalamount','$total','$icnumber','$passportnumber','$line1','$line2','$city','$postcode','$internethandlingcharges','$totalamounts')";
	$rs_update=mysql_query($query_update) or die (mysql_error());
	if(mysql_affected_rows()>0)
	{


		$query_update1 =mysql_query("SELECT * FROM hallbooking ORDER BY id DESC LIMIT 1");

		while($row = mysql_fetch_array($query_update1))
  
		 	{
		 		$id=$row['id'];
		 		

		   }
        

     	$paypal_url='https://www.paypal.com/cgi-bin/webscr'; 
        $paypal_id='anitha.bizsoft@gmail.com';  // sriniv_1293527277_biz@inbox.com


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
	<!-- End Header -->
		<div class="banner">
		
	</div>
	

	<div class="inner-banner">
		
		<div class="clear"></div>
	</div>	

	<!-- Container -->
    
    <div class="wrapper dark">
		<div class="contact-row column12">

		
<div class="col-md-3">
</div>
<div class="col-md-6  booking" style="border: 2px solid green; padding: 10px; margin-top: 20px; border-radius: 14px;" >

             <h3 style="margin-top: 10px; margin-bottom: -15px; color:red;">Hall Details</h3>
             
		   <div class="col-md-5">
<p>Check In Date</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<p><?php echo $_POST['checkindate'];?></p>
</div>
<div class="clearfix"></div>
<div class="col-md-5">
<p>Check Out Date</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<p><?php echo $_POST['checkoutdate'];?></p>
</div>
<div class="clearfix"></div>
<div class="col-md-5">
<p>Number of Days</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<p><?php echo $_POST['numberofdays'];?></p>
</div>
<div class="clearfix"></div>
<div class="col-md-5">
<p>Auditorium</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<p><?php echo $_POST['auditorium'];?></p>
</div>
<div class="clearfix"></div>
<div class="col-md-5">
<p>Hall Type</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<p><?php echo $_POST['halltype'];?></p>
</div>
<div class="clearfix"></div>
<div class="col-md-5">
<p>Name</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<p><?php echo $_POST['firstname'];?></p>
</div>
<div class="clearfix"></div>

<div class="col-md-5">
<p>Grand Total</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<p>RM<?php echo $_POST['totalamount'];?></p>
</div>
<div class="clearfix"></div>

<div class="col-md-5">
<p>Internet Handling Charges</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<p>RM<?php echo number_format($internethandlingcharges,2);?></p>
</div>
<div class="clearfix"></div>

<div class="col-md-5">
<p>Total Amount</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<p>RM<?php echo number_format($totalamounts,2);?></p>
</div>
<div class="clearfix"></div>


		   
    
   

            <form action='<?php echo $paypal_url; ?>' method='post' name='frmPayPal1'>
                    <input type='hidden' name='business' value='<?php echo $paypal_id;?>'>
                    <input type='hidden' name='cmd' value='_xclick'>
                    <input type='hidden' name='quantity' value='1'>
                    <input type='hidden' name='item_name' value='<?php echo $_POST['halltype'];?>(<?php echo $pnrnumbers;?>)'>
                    <input type='hidden' name='item_number' value='1'>
                                   <input type='hidden' name='amount' value='<?php echo number_format($totalamounts,2);?>'>

                    <input type='hidden' name='no_shipping' value='1'>
                    <input type='hidden' name='currency_code' value='MYR'>
                    <input type='hidden' name='handling' value='0'>
                    <input type="hidden" name="custom" value="<?php echo $id;?>" />
                     <!-- <input type='hidden' name='cancel_return' value='http://localhost/nube_hotel/hallcancel.php'>
                    <input type='hidden' name='return' value='http://localhost/nube_hotel/hallsuccess.php'>-->
                    
                    <input type='hidden' name='cancel_return' value='http://ntc.my/hallcancel.php'>
                    <input type='hidden' name='return' value='http://ntc.my/hallsuccess.php'>


<div class="clearfix"></div>
<div class="col-md-3 col-sm-3">
</div>
<div class="col-md-6 col-sm-6 text-center">
	<input type="image" src="images/paypal_new.png" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" class="img-responsive" >
                    <img alt="" border="0" src="images/paypal_new.png" width="1" height="1" class="img-responsive">
                    <p style="font-size: 10px; font-weight: bold;">Click Here To Proceed to Payment</p> 
</div>

<div class="col-md-3 col-sm-3">
</div>





                    
                </form> 

                <?php
            }
            else
            {
            		header("Location: hallcancel.php");

            }
  
     ?>
   
   
   
   
    
		 
		     </div>

<div class="col-md-3 col-sm-3">
</div>
		
		
	   
    <div class="clearfix"></div>
    </div>
 
		</div>	
	
		<div class="clear"></div>
				

	</div>
	<!-- End Wrapper -->

    
	<!-- Footer -->
	
<?php include_once "includes/footer.php";?>

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.superfish.js"></script>
    <script type="text/javascript" src="js/zebra_datepicker.js"></script>
    <script type="text/javascript" src="js/core.js"></script>
	<script src="zInput.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script src="js/bootstrap-modal.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
    

 <script type= "text/javascript" src = "validation/jquery.validate.min.js"></script>
    <script type= "text/javascript" src = "validation/validation-init.js"></script>
    <style type="text/css">
    .error{
        color:red;
    }
    </style>


    <script type="text/javascript">

  $(function(){
    $("#submit").click(function(){

      if( $("#form_3").valid())
      {
      	var pnrnumber=$('#pnrnumber').val();
      	var optradio=$('input[name="optradio"]:checked').val();
      	$.post('print_cancel.php',{'pnrnumber':pnrnumber,'optradio':optradio},function(data){

      	    $('.output').html(data);

             

        });	  

    }

});



   });
</script>
<script type="text/javascript">

  $(function(){
    $("#form_3").submit(function(){

      if( $("#form_3").valid())
      {

      dataString = $("#form_3").serialize();

      $.ajax({
        type: "POST",
        url: "booking_cancellation.php",
        data: dataString,

        // beforeSend: function(data){

        //   $('#world').show();
        // },

        success: function(data){

            
             
             $('#pnrnumber').val('');
             $('.outputs').html(data);



            // /alert(data);

}

});

return false;  //stop the actual form post !important!
 }
});

   });
</script>
    
    






<?php

// nubememberid
	// 	$checkindated=$_POST['checkindate'];
	// 	$firstname=$_POST['firstname'];
	// 	$lastname=$_POST['lastname'];
	// 	$email=$_POST['email'];
	// 	$mobileno=$_POST['mobileno'];
	// 	$address=$_POST['address'];
	// 	$state=$_POST['state'];
	// 	$country=$_POST['country'];
	// 	$nubememberid=$_POST['nubememberid'];
	// 	$halltype=$_POST['halltype'];
	// 	$halltypeid=$_POST['halltypeid'];
	// 	$hallamount=$_POST['hallamount'];
	// 	$slot=$_POST['slot'];
	// 	$total=$_POST['total'];
	// 	$bookingtype=$_POST['bookingtype'];
        

 //        $date1 = str_replace('/', '-', $checkindated);
	//     $checkindate= date('Y-m-d', strtotime($date1));
				
	// 	$date=date('Y-m-d');

	// 	$query_update1 =mysql_query("SELECT * FROM hallbooking ORDER BY id DESC LIMIT 1");

	// 	while($row = mysql_fetch_array($query_update1))
  
	// 	 	{
	// 	 		$pnrnumber=$row['pnrnumber'];
		 		

	// 	   }

	// 	   @$bond_no = $pnrnumber;
	// 			if(is_null($bond_no)){
	// 				$new_bond_noo = 'NUBE_HALL00001'; 
	// 			} else {
	// 				$old_bond_noo = str_split($bond_no,1);
	// 				@$va = (string)($old_bond_noo[9].$old_bond_noo[10].$old_bond_noo[11].$old_bond_noo[12].$old_bond_noo[13])+1;  
	// 				$bond_length = strlen($va);
	// 				if($bond_length == 1){
	// 					$new_bond_noo = 'NUBE_HALL0000'.$va;  
	// 				} else if($bond_length == 2){
	// 					$new_bond_noo = 'NUBE_HALL000'.$va;	 
	// 				} else if($bond_length == 3){	
	// 					$new_bond_noo = 'NUBE_HALL00'.$va;	 
	// 				} else if($bond_length == 4){	 
	// 					$new_bond_noo = 'NUBE_HALL0'.$va; 
	// 				}
	// 				else if($bond_length == 5)
	// 				{	 
	// 					$new_bond_noo = 'NUBE_HALL'.$va; 
	// 				}
	// 			}
	// 			$pnrnumbers=$new_bond_noo;


	// 	$query_update ="INSERT INTO hallbooking(date,pnrnumber,checkindate,firstname,lastname,email,mobileno,halltypeid,halltype,slot,hallamount,bookingtype,address,state,country,nubememberid,total,status,ad_status,check_in,check_out) VALUES('$date','$pnrnumbers','$checkindate','$firstname','$lastname','$email','$mobileno','$halltypeid','$halltype','$slot','$hallamount','$bookingtype','$address','$state','$country','$nubememberid','$total','1','1','0','0')";
	// $rs_update=mysql_query($query_update) or die (mysql_error());
	// if(mysql_affected_rows()>0)
	// {
	// 	echo' <div class="alert alert-success" role="alert" style="font-weight: bold; text-align: center;">
 //                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
 //                    Booking sucessfully.
 //                             </div>';


         
		
	// }
	// else
	// {

	// 	echo'

 //          <div class="alert alert-danger" role="alert" style="font-weight: bold; text-align: center;">
 //                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
 //                    Booking Failed.<br>
                  
 //          </div>
 //         ';
	
		
		
	// }

?>