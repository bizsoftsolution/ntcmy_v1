<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nube Hotel - Hall Booking</title>

		
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
  <link rel="stylesheet" href="timepicker/timepicki.css" type="text/css">
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
	<?php 
    include_once "includes/header.php";
    include_once "db/connection.php";

    ?>
	<!-- End Header -->
		<div class="banner">
		
	</div>
	

	<div class="inner-banner">
		<h4>Hall Booking</h4>
		<div class="site_map">
			<a href="index.php">Home</a>    
			Hall Booking
		</div>
		<div class="clear"></div>
	</div>	

	<!-- Container -->
    
    <div class="wrapper dark">
		<div class="contact-row column12">

		<div class="booking">
	<div class="col-md-12 padding-left" style="margin-top: 20px;">  
 
<form novalidate id="form_hall" name="form_hall" method="post" action="#" >


  
    <div class="col-md-8">

   
    <div class="col-md-6">

     <input  class="form-control" name="checkindate" id="checkindate" value="" placeholder="Check In Date" type="text" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()" >
     
    </div>

    <div class="col-md-6">
    <input class="form-control" name="checkoutdate" id="checkoutdate" value="" placeholder="Check Out Date" type="text" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()">
    </div>

     <div class="col-md-6">

     <input  class="form-control" name="checkintime" id="checkintime" value="" placeholder="Check In Time" type="text" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()" >
     
    </div>

    <div class="col-md-6">
    <input class="form-control" name="checkouttime" id="checkouttime" value="" placeholder="Check Out Time" type="text" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()">
    </div>



       
    <div class="col-md-6">
    
     
    <input value="" placeholder="First Name" class="form-control" name="firstname" id="firstname" type="text">
    </div>

    <div class="col-md-6">
    <input value="" placeholder="Last Name" class="form-control" name="lastname" id="lastname" type="text">
    </div>
    
    <div class="col-md-6">
    <input value="" placeholder="Email" class="form-control" name="email" id="email" type="text">
    </div>

    <div class="col-md-6">
    <input value="" placeholder="Mobile No" class="form-control" name="mobileno" id="mobileno" type="text">
    </div>

    <div class="col-md-6">
    <select class="form-control" name="halltype" id="halltype">
    <option value="">Select Hall Type</option>
    <option value="Pacific I">Pacific I</option>
    <option value="Pacific II">Pacific II</option>
    <option value="Pacific I &amp; Pacific II">Pacific I &amp; Pacific II</option>
    <option value="Atlantic">Atlantic</option>
    <option value="Artic">Artic</option>
    <option value="Hall of Unity">Hall of Unity</option>
     
  </select>
    </div>
    
     </div>
    
    <div class="col-md-4">   
    <textarea value="" placeholder="Additional Comments" style="height:253px;" name="comments" id="comments" class="form-control"></textarea>
    </div>

    
     <div class="clearfix"></div>
     <div class="row"> 
      <div class="col-md-12">

    
      <div class="col-md-2">
       </div>

        <div class="col-md-6" style="margin-top: 23px;">
        <div class="succ"></div>
          </div>
       
    <div class="col-md-3" style="margin-top: 15px;">
    <input id="submit" class="btn btn-success btn-lg btn-block" value="Book" type="submit">
  </div>
    
    </div>
    </div>
    <div class="clearfix"></div>
    </form>
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
     <script src="timepicker/timepicki.js"></script>

    <script type= "text/javascript" src = "validation/jquery.validate.min.js"></script>
    <script type= "text/javascript" src = "validation/validation-init.js"></script>
    <style type="text/css">
    .error{
        color:red;
    }
    </style>

     <script>
$('#hallbooking').addClass('current');
</script>
    
<script type="text/javascript">
$(document).ready(function() {
	$('#checkindate').datepicker({
startDate: "-d",
format: "yyyy-mm-dd",
autoclose: true,
todayHighlight: true
});
});

 $(document).ready(function(){
    		$('#checkindate').change(function(){
    		$('#checkoutdate').val('');
    		$('#checkoutdate').datepicker("remove");
    		var a = $('#checkindate').val();
    		
    		$('#checkoutdate').datepicker({
    			
				startDate: a,
				format: "yyyy-mm-dd",
				autoclose: true,
				todayHighlight: true
				}); 
    	})
    });
	
// 	$(function(){
// $("input[name='css_selector']").change(function(){
// 	$newStyle = $(this).attr("value");
// 	$('#stylesheet').attr("href", $newStyle);
// });
// });

// $(function() {
//     FastClick.attach(document.body);
// });
$("#affected").zInput();

</script>

 
 <script>
  $('#checkintime').timepicki();
  $('#checkouttime').timepicki();
    </script>

    <script type="text/javascript">

  $(function(){
    $("#form_hall").submit(function(){

      if( $("#form_hall").valid())
      {



      dataString = $("#form_hall").serialize();

      $.ajax({
        type: "POST",
        url: "hall_book.php",
        data: dataString,

        // beforeSend: function(data){

        //   $('#world').show();
        // },

        success: function(data){

             $('#checkindate').val('');
             $('#checkoutdate').val('');
             $('#checkintime').val('');
             $('#checkouttime').val('');
             $('#firstname').val('');
             $('#lastname').val('');
             $('#email').val('');
             $('#mobileno').val('');
             $('#halltype').val('');
             $('#comments').val('');

             
            $('#pnrch').show();
            $('.succ').html(data); 


            

}

});

return false;  //stop the actual form post !important!
 }
});

   });
</script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#halltype').change(function(){

      var checkindate=$('#checkindate').val();
      var checkoutdate=$('#checkoutdate').val();
      var checkintime=$('#checkintime').val();
      var checkouttime=$('#checkouttime').val();
      var halltype=$('#halltype').val();

      $.post('check_halltype.php',{'checkindate':checkindate,'checkoutdate':checkoutdate,'checkintime':checkintime,'checkouttime':checkouttime,'halltype':halltype},function (data){

            //alert(data);

            if(data)
            {
              alert('Hall not available');
              $('#halltype').val('');
            }
            else
            {

            }

      });

    });

  });
</script>
<script type="text/javascript">
  function a1()
  {
   $('#halltype').val('');
  }
  function b1()
  {
   $('#halltype').val('');
  }
  function c1()
  {
   $('#halltype').val('');
  }
  function d1()
  {
   $('#halltype').val('');
  }
</script>

    
    
   
    

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-87359066-1', 'auto');
  ga('send', 'pageview');

</script>