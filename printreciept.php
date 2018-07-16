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
		<h4>Easy Cancel</h4>
		<div class="site_map">
			<a href="index.php">Home</a>    
			Easy Cancel
		</div>
		<div class="clear"></div>
	</div>	

	<!-- Container -->
    
    <div class="wrapper dark">
		<div class="contact-row column12">

		<div class="booking">
	<div class="col-md-12 col-sm-12 padding-left" style="margin-top: 20px;">  
    
    <div class="col-md-3 col-sm-3">
    </div>


    <div class="col-md-6 col-sm-6">
    
    <form role="form" id="form_3" name="form_3"  method="post">
    <div class="form-group reser" >
	<label for="pnrno">Enter Reservation No : </label>

	<input placeholder="Reservation Number" class="form-control" id="pnrnumber" name="pnrnumber" type="text" style="padding: 8px 9px; width: 90%;">

</div>
  <!-- <div class="radio">
  <label><input type="radio" class="optradio" name="optradio" value="print" checked>Print Receipt</label>
</div> -->
<!-- <div class="radio">
  <label><input type="radio" class="optradio" name="optradio" value="cancel">Cancel Booking</label>
</div>
 -->
    <div class="col-md-12 col-sm-12 text-center">
    <div id="asdf"></div>
    <input class="btn btn-success btn-sm booking_btn"  id="submit" value="Submit" type="button">
    
  </div>

<div class="clearfix"></div>
<div class="output"></div>
<div class="outputs" style="margin-top: 10px;"></div>



</form>
 
    </div>
    
    <div class="col-md-3 col-sm-3">
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

	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/jquery.superfish.js"></script>
    <script type="text/javascript" src="js/zebra_datepicker.js"></script>
    <script type="text/javascript" src="js/core.js"></script>
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

  $(function(){
    $("#submit").click(function(){

      if( $("#form_3").valid())
      {
      	var pnrnumber=$('#pnrnumber').val();
      	var optradio=$('input[name="optradio"]:checked').val();
       $('#asdf').show('slow');     
      $('#asdf').html('<img src="image/loading.png">');
      $('#submit').hide('slow');
      	$.post('print_cancel.php',{'pnrnumber':pnrnumber,'optradio':optradio},function(data){

      		 $('#asdf').hide('slow');     
            //$('#submit').show('slow');
      	    $('.output').html(data);

             

        });	  

    }

});



   });
</script>

<script>
    $('#form_3').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
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

        beforeSend: function(data){

        	// $('#asdf11').show('slow');     
            $('.outputs').html('<img src="image/loading.png">');
            //$('.asddc').hide('slow');
             $('.output').hide('slow');
          
        },

        success: function(data){

            
              $('#asdf11').hide('slow');     
            $('#asddc').show('slow');
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
   
    

