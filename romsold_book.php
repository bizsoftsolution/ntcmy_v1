<?php
include_once "db/connection.php";

		
		$roomtypeid=$_POST['roomtypeid'];
		$checkind=$_POST['checkin'];
		$checkoutd=$_POST['checkout'];
		$roomtype=$_POST['roomtype'];
		$dormbed=$_POST['dormbed'];
		$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
		$email=$_POST['email'];
		$icnumber=$_POST['icnumber'];
		$line1=$_POST['line1'];
		$line2=$_POST['line2'];
		$city=$_POST['city'];
		$postcode=$_POST['postcode'];
		$mobile=$_POST['mobile'];
		$room_no=$_POST['room_no'];
		$adults=$_POST['adults'];
		$children=$_POST['children'];
		$extra_bed=$_POST['extra_bed'];
		$address=$_POST['address'];
		$state=$_POST['state'];
		$country=$_POST['country'];
		$roomamount=$_POST['roomamount'];
		$numberofdays=$_POST['numberofdays'];
		$subtotal=$_POST['subtotal'];
		$subtotal1=$_POST['subtotal1'];
		$total=$_POST['total'];
		$bookingtype=$_POST['bookingtype'];
		$nubememberid=$_POST['nubememberid'];



		if($_POST['adults']==1||$_POST['adults']==2)
		{
			$depositamount='50';
		}
		elseif($_POST['adults']==3||$_POST['adults']==4||$_POST['adults']==5||$_POST['adults']==6)
		{
			$depositamount='100';
		}

		elseif($_POST['adults']>=7)
		{
			$depositamount='500';
		}
		
		

		$totalamounts=$depositamount+$_POST['total'];

		$internethandlingcharges=(($totalamounts * 20)/100);
		$totalamount=$totalamounts+$internethandlingcharges; 

$date1 = str_replace('/', '-', $checkind);
	$checkin= date('Y-m-d', strtotime($date1));

	$date2 = str_replace('/', '-', $checkoutd);
	$checkout= date('Y-m-d', strtotime($date2));

$date=date('Y-m-d');

$query_update1 =mysql_query("SELECT * FROM bookingrooms ORDER BY id DESC LIMIT 1");

		while($row = mysql_fetch_array($query_update1))
  
		 	{
		 		$pnr_number=$row['pnr_number'];
		 		

		   }
 		

	@$bond_no = $pnr_number;
        if(is_null($bond_no)){
          $new_bond_noo = 'NTCR-01'; 
        } else {
          $old_bond_noo = str_split($bond_no,1);
          @$va = (string)($old_bond_noo[5].$old_bond_noo[6])+1;  
          $bond_length = strlen($va);
          if($bond_length == 1){
            $new_bond_noo = 'NTCR-0'.$va;  
          } 
          else if($bond_length == 2)
          {  
            $new_bond_noo = 'NTCR-'.$va; 
          }
        }
        $pnr_numbers=$new_bond_noo;

				
				//echo $pnr_numbers;




		$query_update ="INSERT INTO bookingrooms (date,pnr_number,checkin,checkout,roomtypeid,roomtype,roomamount,numberofdays,firstname,lastname,email,mobile,room_no,adults,children,state,country,nubememberid,subtotal,subtotal1,total,bookingtype,icnumber,line1,line2,city,town,postcode,drombed,depositamount,onlinepayment,internethandlingcharges) VALUES('$date','$pnr_numbers','$checkin','$checkout','$roomtypeid','$roomtype','$roomamount','$numberofdays','$firstname','$lastname','$email','$mobile','$room_no','$adults','$children','$state','$country','$nubememberid','$subtotal','$subtotal1','$total','$bookingtype','$icnumber','$line1','$line2','$city','$town','$postcode','$dormbed','$depositamount','$totalamounts',$internethandlingcharges)";
	$rs_update=mysql_query($query_update) or die (mysql_error());
	if(mysql_affected_rows()>0)
	{


		$query_update1 =mysql_query("SELECT * FROM bookingrooms ORDER BY id DESC LIMIT 1");

		while($row = mysql_fetch_array($query_update1))
  
		 	{
		 		$id=$row['id'];
		 		

		   }





		$paypal_url='https://www.sandbox.paypal.com/cgi-bin/webscr'; 
        $paypal_id='sriniv_1293527277_biz@inbox.com';  // sriniv_1293527277_biz@inbox.com



		
		
		?>
		
	






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

             <h3 style="margin-top: 10px; margin-bottom: -15px; color:red;">Booking Details</h3>
             
		   <div class="col-md-5">
<p>Check In Date</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<p><?php echo $_POST['checkin'];?></p>
</div>
<div class="clearfix"></div>
<div class="col-md-5">
<p>Check Out Date</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<p><?php echo $_POST['checkout'];?></p>
</div>
<div class="clearfix"></div>
<div class="col-md-5">
<p>Room Type</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<p><?php echo $_POST['roomtype'];?></p>
</div>
<div class="clearfix"></div>
<div class="col-md-5">
<p>No Of Units</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<p><?php echo $_POST['room_no'];?></p>
</div>
<div class="clearfix"></div>
<div class="col-md-5">
<p>No of Persons</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<p><?php echo $_POST['adults'];?></p>
</div>
<div class="clearfix"></div>
<div class="col-md-5">
<p>Total Room Rent</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<p>RM<?php echo $_POST['total'];?></p>
</div>
<div class="clearfix"></div>
<div class="col-md-5">
<p>Refundable Deposit Amount</p>
</div>
<div class="col-md-1">
<p>:</p>
</div>
<div class="col-md-6">
<p>RM<?php echo number_format($depositamount,2);?></p>
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
<p>RM<?php echo number_format($totalamount,2);?></p>
</div>
<div class="clearfix"></div>




		   
    
   

            <form action='<?php echo $paypal_url; ?>' method='post' name='frmPayPal1'>
                    <input type='hidden' name='business' value='<?php echo $paypal_id;?>'>
                    <input type='hidden' name='cmd' value='_xclick'>
                    <input type='hidden' name='quantity' value='1'>
                    <input type='hidden' name='item_name' value='<?php echo $_POST['roomtype'];?>'>
                    <input type='hidden' name='item_number' value='<?php echo $_POST['room_no'];?>'>
                     <input type='hidden' name='amount' value='<?php echo $totalamount;?>'>
                    <input type='hidden' name='no_shipping' value='1'>
                    <input type='hidden' name='currency_code' value='USD'>
                    <input type="hidden" name="custom" value="<?php echo $id;?>" />
                    <input type='hidden' name='handling' value='0'>
                    <input type='hidden' name='cancel_return' value='http://localhost/nube_hotel/cancel.php'>
                    <input type='hidden' name='return' value='http://localhost/nube_hotel/success.php'>
                    
                   <!--   <input type='hidden' name='cancel_return' value='http://ntc.my/cancel.php'>
                    <input type='hidden' name='return' value='http://ntc.my/success.php'> -->



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
	header("Location: cancel.php");

}      
  
     
   
   
   ?>
   
    
		 
		     </div>

<div class="col-md-3">
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
    <script type="text/javascript" src="js/script.js"></script>
	<script src="zInput.js"></script>
    
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
    onload=function(){
    var e=document.getElementById("refreshed");
    if(e.value=="no")e.value="yes";
    else{e.value="no";location.reload();}
    }
</script>

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
    
    
   
    

