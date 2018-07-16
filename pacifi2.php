<!doctype html>

<html lang="en">



<head>

	<meta charset="utf-8">



	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Pacific II Corporate Event Venue Halls in Port Dickson offers a Fully Equipped Hall for Events, Parties & We are the Beachfront Resort Booking Website Online.">
	<title>Pacific II | Corporate Event Venue |Halls in Port Dickson/title>



	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">

  	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-1.3.4.css" media="screen">

	<link rel="stylesheet" href="css/dr-framework.css" type="text/css" media="screen">

	<link rel="stylesheet" href="css/navigation.css" type="text/css" media="screen">

	<link rel="stylesheet" type="text/css" href="css/fullwidth.html" media="screen" />

	<link rel="stylesheet" href="css/revslider.css" type="text/css" media="screen">

	<link rel="stylesheet" href="css/jquery.bxslider.css" type="text/css" media="screen">

	<link rel="stylesheet" href="css/zebra.css" type="text/css">

	<link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen">

	<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>


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

		<h4>Pacifi II</h4>

		<div class="site_map">

			<a href="index.php">Home</a>    

			Pacifi II

		</div>

		<div class="clear"></div>

	</div>	



	<!-- Container -->

	<div class="wrapper">

				 <h3>Pacifi II</h3>

		<div class="gallery dark mb30">

       

			<div class="column4 view second-effect">

				

                 <a href="images/pacifi/pacifi4.jpg" data-fancybox-group="group" ><img src="images/pacifi/pacifi4.jpg" /></a>

			</div>	

			<div class="column4 view second-effect">

				<a href="images/pacifi/pacifi5.jpg" data-fancybox-group="group" ><img src="images/pacifi/pacifi5.jpg" /></a>

                

			</div>	

			<div class="column4 view second-effect">

				<a href="images/pacifi/pacifi6.jpg" data-fancybox-group="group" ><img src="images/pacifi/pacifi6.jpg" /></a>

                			</div>	

            

		</div>

        <div class="clearfix"></div>

    <div style="margin-bottom:25px;"></div>

		



	</div>

	<!-- End Wrapper -->



	<!-- Footer -->

	

<?php include_once "includes/footer.php";?>



	<script type="text/javascript" src="js/jquery.min.js"></script>

	<script src="js/jquery.flexslider.js"></script>

	<script type="text/javascript" charset="utf-8">

  		$(window).load(function() {

  		  $('.flexslider').flexslider();

  		});

	</script>

	<script type="text/javascript" src="js/jquery.fancybox-1.3.4.pack.js"></script>

	<script>

		$("a[data-fancybox-group=group]").fancybox({

			'transitionIn'		: 'none',

			'transitionOut'		: 'none',

			'titlePosition' 	: 'over',

			'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {

				return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';

			}

		});

	</script>

	<script type="text/javascript" src="js/jquery.superfish.js"></script>

    <script type="text/javascript" src="js/accordion.js"></script>

    <script src="js/jquery.bxslider.js"></script>

    <script type="text/javascript" src="js/zebra_datepicker.js"></script>

    <script type="text/javascript" src="js/core.js"></script>

<script type= "text/javascript" src="validation/jquery.validate.min.js"></script>
    <script type= "text/javascript" src="validation/validation-init.js"></script>
<script type="text/javascript">

  $(function(){
    $("#get_in").submit(function(){

      if( $("#get_in").valid())
      {

      dataString = $("#get_in").serialize();

      $.ajax({
        type: "POST",
        url: "sendgetinmail.php",
        data: dataString,

        beforeSend: function(data){

          $('#sending').show();
          $('#send').hide();
        },

        success: function(data){

            $('#sending').hide();
          $('#send').show();
          $('.mess').html(data);
              $('#get_in')[0].reset();
             // $('#pnrnumber').val('');
             // $('.outputs').html(data);



           

}

});

return false;  //stop the actual form post !important!
 }
});

   });



</script>
<script type="text/javascript">
$(document).ready(function(){

	
 $("<select />").appendTo("#nav");
    
    // Create default option "Go to..."
    $("<option />", {
		"selected": "selected",
		"value"   : "",
		"text"    : "Go to..."
    }).appendTo("#nav select");
    
    // Populate dropdown with menu items
    $(".sf-menu a").each(function() {
		var el = $(this);
		$("<option />", {
			"value"   : el.attr("href"),
			"text"    : el.text()
		}).appendTo("#nav select");
    });

    $("#nav select").change(function() {
		window.location = $(this).find("option:selected").val();
    });
	
	/*-------------------------------------------------*/



    

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