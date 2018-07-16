<?php


$item_transaction = $_GET['item_transaction'];
$item_price = $_GET['item_price'];
$status = $_GET['status'];
$pnr = $_GET['pnr'];

//echo $status;

include_once "db/connection.php";
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
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WLW9HDC');</script>
<!-- End Google Tag Manager -->
	

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

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WLW9HDC"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

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

		<?php 
		if($status=='Completed')
		{
			?>

					<div class="col-md-12 col-sm-12 padding-left" style="margin-top: 20px;"> 
		   
		    <div class="col-md-2 col-sm-4">
		    </div>
		    <div class="col-md-8 col-sm-4">
		   
		    <div style="border: 2px solid rgba(0, 166, 81, 0.3); border-radius: 15px; background-color: rgba(0, 166, 81, 0.09); text-align: center; padding: 20px;">
		  <img src="images/paymentsucces.png" class="img-responsive" style="margin-left: 46%;">

		<h3>Thank You !</h3>
		  <p>Your Payment of RM<b><?php echo $item_price; ?></b>  has been processed successfully.</p>
		    <p>We will sent you a confirmation email shortly.</p>
		    <p>Your Transaction ID is <b><?php echo $item_transaction; ?>.</b></p>
		     <p>Your Reservation Number is <b><?php echo $pnr; ?>.</b></p>
		    </div>
		   
		   
		    </div>
		   
		    <div class="col-md-2 col-sm-4">
		    </div>
		 
		     </div>


		<?php
	}
		else
		{
			?>

			<div class="col-md-12 col-sm-12 padding-left" style="margin-top: 20px;"> 
   
    <div class="col-md-2 col-sm-4">
    </div>
    <div class="col-md-8 col-sm-4">
   
    <div style="border: 2px solid rgba(166, 0, 0, 0.3); border-radius: 15px; background-color: rgba(166, 0, 0, 0.1); text-align: center; padding: 20px;">
  <img src="images/paymentfailed.png" class="img-responsive" style="margin-left: 46%;">

<h3>Transaction Failed !</h3>
   <p>Your Payment of RM<b><?php echo $item_price; ?></b>  has been processed failed.</p>
 <p>Please try again later.</p>
    </div>
   
   
    </div>
   
    <div class="col-md-2 col-sm-4">
    </div>
 
</div>



		<?php
		}
		?>

	   
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

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-87359066-1', 'auto');
  ga('send', 'pageview');

</script>