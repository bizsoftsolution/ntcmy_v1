

 <link rel="stylesheet" type='text/css' href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- Bootstrap - Latest compiled and minified JavaScript -->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
        $("#myModal").modal('show');
    });
</script>
<div class="container">
 
 

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>


<?php

include_once "db/connection.php";

if(count($_POST)<>0)    //IF SOME FORM WAS POSTED DO VALIDATION

{

	$checkin = $_REQUEST["checkin"];

	$checkout = $_REQUEST["checkout"];

	$roomtypeid = $_REQUEST["roomtypeid"];

	$room_no = $_REQUEST["room_no"];

	$first =mysql_fetch_array(mysql_query("select * from demo_book order by id desc limit 1"));

	//$second =mysql_fetch_array($first);

	//$count =$second["count"]; 

	$count =$first["id"];

	if($first!='')

	{

	$count1 = $count + 1 ;

	

	}

	else

	{

	$count1 = '1';

	}

	

	$query_update ="INSERT INTO demo_book (checkin,checkout,roomtypeid,room_no,count) VALUES('$checkin','$checkout','$roomtypeid','$room_no','$count1')";

	$rs_update=mysql_query($query_update) or die (mysql_error());

	if(mysql_affected_rows()>0)

	{

		header("Location: booking.php?ryd=$count1");

		

	}

	else

	{

	

		header("Location: index.php");

		

	}







}

	?>

<!doctype html>

<html lang="en">

<head>

	<meta charset="utf-8">



	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<meta name="description" content="Hotel Booking Online in Port Dickson provides you Budget,Cheap,Luxurious Rooms with Indoor Food Facility & Halls for Seminar,Wedding,Private Parties.">

	<title>Cheap Rate| Hotel Online Booking|Seminar|Party Hall Port Dickson</title>



	<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">

	<link rel="stylesheet" href="css/dr-framework.css" type="text/css" media="screen">

	<link rel="stylesheet" href="css/navigation.css" type="text/css" media="screen">

	<link rel="stylesheet" href="css/revslider.css" type="text/css" media="screen">

	<link rel="stylesheet" href="css/jquery.bxslider.css" type="text/css" media="screen">

	<link rel="stylesheet" href="css/zebra.css" type="text/css">

	<link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen">

    

    <link rel="stylesheet" href="css/datepicker.css" type="text/css" media="screen">

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

	<?php 

	include_once "includes/header.php";

	
	?>
	

	<!-- End Header -->

	 <!-- Slider -->

	<div class="slider" >

		<div class="flexslider">

		  <ul class="slides">

		    <li><img src="images/slider1.jpg" /></li>

			<li><img src="images/slider2.jpg" /></li>

            <li><img src="images/slider5.jpg" /></li>

			<li><img src="images/slider6.jpg" /></li>

		  </ul>

		</div>

	



	<!-- Book Apointment -->

	<div class="book-form mb30">

		<div class="inner-form">
<!-- Pstyle -->

		

		</div>

	</div>

	<!-- End Book Apointment -->

	</div>

	<!-- End SLider -->







	<!-- Container -->

	<div class="wrapper">

				

		<!-- Latest Deals -->

		<div class="latest mb30">

			<h3>Accommodation</h3>

			<div class="dark">

			<div class="column3 box">

				<div class="box-img">

					<img src="images/golden/gold2.jpg" alt="">

					<a href="booking.php" class="details">Book Now!</a>

				</div>

				<h4>Golden Arowana</h4>

				<p>The gracefully designed Golden Arowana is a very spacious, self-contained 3 bedroom chalets with a cozy and comfortable ambience.</p>

			

			</div>

			<div class="column3 box">

				<div class="box-img">

					<img src="images/blue/blue1.jpg" alt="">

					<a href="booking.php" class="details">Book Now!</a>

				</div>

				<h4>Blue Arowana</h4>

				<p>Blue Arowana I, II and III are a spacious, self-contained 2 bedroom chalets with a cozy and comfortable ambience.</p>

				

			</div>

			<div class="column3 box">

				<div class="box-img">

					<img src="images/harmony/har2.jpg" alt="">

					<a href="booking.php" class="details">Book Now!</a>

				</div>

				<h4>Harmony Rooms</h4>

				<p>Fifty twin-sharing standard rooms with modern and functional furnishing.</p>

				

			</div>

            <div class="column3 box">

				<div class="box-img">

					<img src="images/dormitory/dormitory1.jpg" alt="">

					<a href="booking.php" class="details">Book Now!</a>

				</div>

				<h4>Solidarity Dorms</h4>

				<p>The units most affordable for large groups; cozy and can be fun filled double-deck sleeping bunks.</p>

				

			</div>

            

             

       

			<div class="clear"></div>

			</div>

		</div>

       

         <div class="homereadmore">

        <a href="facilities.php" class="details">More Rooms</a>

        </div>

		<!-- End Latest Deals -->



		<div class="row3 dark mb30">

			<div class="accordion column6">

				<h3>NTC Features</h3>

				<div id="accordion-container"> 

				     <h2 class="accordion-header">Rooms</h2> 

				     <div class="accordion-content"> 

				          <p>Our 50 twin-sharing rooms are tastefully furnished with air-conditioning, television and the basic needs of guests to offer maximum comfort and warmth. Our rooms on the top most floors attract many for the scenic view of the deep blue sea. </p> 

				     </div> 

				     <h2 class="accordion-header">Chalet</h2> 

				     <div class="accordion-content"> 

				          <p>The gracefully designed unit conspicuously stands out to show your stay there is special. Housing twin-bedded spacious rooms, a living room accompanied with a kitchen and dining makes you feel truly at home.</p> 

				     </div>  

				     <h2 class="accordion-header">Dormitories</h2> 

				     <div class="accordion-content"> 

				          <p>Economical and comfortable lodging for big groups attending seminars/conventions or socials jamborees are made possible at our dormitories. Our dormitories are 10 and 12-bedded rooms fully furnished and air conditioned with common washrooms. </p> 

				     </div>

                      <h2 class="accordion-header">Multi Purpose Hall </h2> 

				     <div class="accordion-content"> 

				          <p>A spacious hall aptly used for various functions and easily caters up to 500 persons in theatre style seating. Our Multi Purpose Hall is often also used for private parties, dinner functions and indoor games.  </p> 

				     </div>

                      <h2 class="accordion-header">Auditoriums</h2> 

				     <div class="accordion-content"> 

				          <p>Our specialties are our 4 seminar auditoriums equipped with the latest training tools, an ideal destination for small business meetings or seminars and large conventions or events. The four auditoriums are suitably tailored for the different kinds of sessions planned and are able to cater for a capacity from 60 to 200 people. </p> 

				     </div>

                      <h2 class="accordion-header">NUBE Cafe </h2> 

				     <div class="accordion-content"> 

				          <p>Complementing our facilities is our NUBE Cafe' accompanied by our lounge and bar terrace overlooking the vast blue sea. It is just perfect to relax and enjoy the windy sea breeze along with family and friends to savor mouth watering delicacies from local to western cuisine twenty-four hours, seven days a week.</p> 

				     </div>

                    

				</div>

			</div>

			<!-- End Accordion -->



			<!-- Client Testimonials -->

			<!--<div  class="testimonials column6">

				<h3>Client Testimonials</h3>



				<ul class="bxslider fade p0 m0" data-autoslide="0" data-autoslide_on="0">

					<li>

						<blockquote class="speech-bubble">

			                <div class="quote-content">

			                    <p class="m0">Sed mattis pretium ligula quis egestas. Proin adipiscing ultricies tempor. Mauris fermentum velit sed orci suscipit ac tincidunt est euismod. Fusce faucibus felis ut odio ullamcorper in aliquam tortor sodales. Ut luctus nibh nec dui blandit quis laoreet libero facilisis.</p>

			                    <span class="quote-arrow"></span>

			                </div>

			                <div class="quote-meta"><strong>John Smith</strong>

			                    <span>- Web Designer</span>

			                </div>

			            </blockquote>

					</li>



					<li>

						<blockquote class="speech-bubble">

			                <div class="quote-content">

			                    <p class="m0">Sed mattis pretium ligula quis egestas. Proin adipiscing ultricies tempor. Fusce faucibus felis ut odio ullamcorper in aliquam tortor sodales. Ut luctus nibh nec dui blandit quis laoreet libero facilisis.</p>

			                    <span class="quote-arrow"></span>

			                </div>

			                <div class="quote-meta"><strong>Diego Berry</strong>

			                    <span>- happy buyer</span>

			                </div>

			            </blockquote>

					</li>



					<li>

						<blockquote class="speech-bubble">

			                <div class="quote-content">

			                    <p class="m0">Sed mattis pretium ligula quis egestas. Proin adipiscing ultricies tempor. Mauris fermentum velit sed orci suscipit ac tincidunt est euismod.</p>

			                    <span class="quote-arrow"></span>

			                </div>

			                <div class="quote-meta"><strong>Alex Orange</strong>

			                    <span>- happy customer</span>

			                </div>

			            </blockquote>

					</li>

				</ul>

	            

			</div> -->

			<!-- End Client Testimonials -->

			<div class="clear"></div>



		</div>

		<!-- End Row3 -->

			



	</div>

	<!-- End Wrapper -->



	<!-- Footer -->

	<?php include_once "includes/footer.php";?>





	<script type="text/javascript" src="js/jquery.min.js"></script>

	<script src="js/jquery.flexslider.js"></script>

	<script type="text/javascript" charset="utf-8">

  		$(window).load(function() {

  		  $('.flexslider').flexslider();
		  $("#myModal").modal('show');

  		});

	</script>

	<script type="text/javascript" src="js/jquery.superfish.js"></script>

  

    <script type="text/javascript" src="js/accordion.js"></script>

    <script src="js/jquery.bxslider.js"></script>

    <script type="text/javascript" src="js/zebra_datepicker.js"></script>

   

     <script src="js/bootstrap-datepicker.js"></script>
<script type= "text/javascript" src="validation/jquery.validate.min.js"></script>
    <script type= "text/javascript" src="validation/validation-init.js"></script>


     <script>

$('#index').addClass('current');

</script>

    

<script type="text/javascript">

$(document).ready(function() {

	$('#checkin').datepicker({

startDate: "-d",

format: "yyyy-mm-dd",

autoclose: true,

todayHighlight: true

});







	

});

</script>

    <script type="text/Javascript">

    $(document).ready(function(){

    		$('#checkin').change(function(){

    		$('#checkout').val('');

    		$('#checkout').datepicker("remove");

    		var a = $('#checkin').val();

    		

    		$('#checkout').datepicker({

    			

				startDate: a,

				format: "yyyy-mm-dd",

				autoclose: true,

				todayHighlight: true

				});

    		

    		

    		

    	})

    	

    	

    	

    })</script>



    <script type="text/Javascript">

	

	function validate(form)

  {

  

			if (form.checkin.value == "") {

		       	   alert('Please Choose a Check In Date!');

				   form.checkin.focus();

			   return false;

			   }

 			   

			if (form.checkout.value == "") {

		       	   alert('Please Choose a Check Out Date!');

				   form.checkout.focus();

			   return false;

			   }



			 if (form.roomtypeid.value == "") {

		       	   alert('Please select room type');

				   form.roomtypeid.focus();

			   return false;

			   }



			 if (form.room_no.value == "") {

		       	   alert('Please select no of room');

				   form.room_no.focus();

			   return false;

			   } 

			

			

		return true;

  

  }

  </script>


  <script type="text/javascript">
$(document).ready(function(){


   
    $('#roomtypeid').change(function(){
       // alert();
        var roomtypeid=$('#roomtypeid').val();
        



         $.post('indexroomcheck.php',{'roomtypeid':roomtypeid},function (data){

    $('.noofprooms').html(data);

    //alert(data);

  });








    });


// Create the dropdown base
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
 



  



<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-87359066-1', 'auto');
  ga('send', 'pageview');

</script>