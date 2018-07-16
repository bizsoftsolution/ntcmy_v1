<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nube Hotel - Booking</title>

		
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
	<?php 
    include_once "includes/header.php";
    include_once "db/connection.php";

    $ry = $_REQUEST["ryd"];
    if($ry!='')
    {
    
    $query_update1 =mysql_query("SELECT * FROM demo_book ORDER BY id DESC LIMIT 1");
    $ff =mysql_fetch_array($query_update1)or die(mysql_error());
    $id =$ff["id"];
    $checkin =$ff["checkin"];
    $checkout =$ff["checkout"];
    $adults =$ff["adults"];
    $children =$ff["children"];

    }
    else
    {
    $query_update1 =mysql_query("SELECT * FROM demo_book ORDER BY id DESC LIMIT 1");
    $ff =mysql_fetch_array($query_update1);
    $id1 =$ff["id"];
    $id = $id1 +1 ;
    $checkin ="";
    $checkout ="";
    $lastname1 ="";
    $adults ="";
    $children ="";
    }


    ?>
	<!-- End Header -->
		<div class="banner">
		
	</div>
	

	<div class="inner-banner">
		<h4>Booking</h4>
		<div class="site_map">
			<a href="index.php">Home</a>    
			Booking
		</div>
		<div class="clear"></div>
	</div>	

	<!-- Container -->
    
    <div class="wrapper dark">
		<div class="contact-row column12">

		<div class="booking">
	<div class="col-md-12 padding-left" style="margin-top: 20px;">  
 
<form novalidate id="form_1" name="form1" method="post" action="#" >


  
    <div class="col-md-8">

   
    <div class="col-md-6">

<input  class="form-control" name="roomtype" id="roomtype"  placeholder="Check In" type="hidden" >


     <input  class="form-control" name="checkin" id="checkin" value="<?php echo $checkin;?>" placeholder="Check In" type="text" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()" >
     
    </div>

    <div class="col-md-6">
    <input class="form-control" name="checkout" id="checkout" value="<?php echo $checkout;?>" placeholder="Check Out" type="text" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()">
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
    <input value="" placeholder="Mobile No" class="form-control" name="mobile" id="mobile" type="text">
    </div>

    <div class="col-md-6">
    <select class="form-control" name="roomtypeid" id="roomtypeid" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()">
  <option value="">Select Room Type</option>
  <?php 
  $roomtyp =mysql_query("SELECT * FROM roomtypes");
  while($row = mysql_fetch_array($roomtyp))
  {

  ?>
     <option value="<?php echo $row['id'];?>"><?php echo $row['roomtype'];?></option> 
      <?php
      }
      ?>
     
  </select>
    </div>
    
    
    <div class="col-md-6">
    <select class="form-control" name="room_no" id="room_no" onchange="roomcheck()">
                <option value="">Number Of Rooms</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
    </select>
    </div>
    
     
    
    <div class="col-md-6">
    <select class="form-control" name="adults" id="adults">
    <option value="" <?php if($adults=='') echo 'selected';?>>Number Of Adults</option>
                <option value="0" <?php if($adults=='0') echo 'selected';?>>0</option>
                <option value="1" <?php if($adults=='1') echo 'selected';?>>1</option>
                <option value="2" <?php if($adults=='2') echo 'selected';?>>2</option>
                <option value="3" <?php if($adults=='3') echo 'selected';?>>3</option>
               
    </select>
    </div>
    
    
    <div class="col-md-6">
    <select class="form-control" name="children" id="children">
    <option value="" <?php if($children=='') echo 'selected';?>>Number Of Children</option>
     <option value="0" <?php if($children=='0') echo 'selected';?> >0</option>
                <option value="1" <?php if($children=='1') echo 'selected';?> >1</option>
                <option value="2" <?php if($children=='2') echo 'selected';?>>2</option>
                <option value="3" <?php if($children=='3') echo 'selected';?>>3</option>
    </select>
    </div>
    




    </div>
    
    <div class="col-md-4">   
    <textarea value="" placeholder="Additional Comments" style="height:253px;" name="comments" id="comments" class="form-control"></textarea>
    </div>

    <div class="col-md-4">
    <select class="form-control" name="extra_bed" id="extra_bed">
    <option value="">Extra Bed</option>
    <option value="0">0</option>
     <option value="1">1</option>
    <option value="2">2</option>
                            
                
    </select>
  
    
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

    <script type= "text/javascript" src = "validation/jquery.validate.min.js"></script>
    <script type= "text/javascript" src = "validation/validation-init.js"></script>
    <style type="text/css">
    .error{
        color:red;
    }
    </style>

     <script>
$('#booking').addClass('current');
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

 <script type="text/javascript">

  $(function(){
    $("#form_1").submit(function(){

      if( $("#form_1").valid())
      {

      dataString = $("#form_1").serialize();

      $.ajax({
        type: "POST",
        url: "rooms_book.php",
        data: dataString,

        // beforeSend: function(data){

        //   $('#world').show();
        // },

        success: function(data){

             $('#room_no').val('');
             $('#checkin').val('');
             $('#checkout').val('');
             $('#firstname').val('');
             $('#lastname').val('');
             $('#email').val('');
             $('#mobile').val('');
             $('#roomtypeid').val('');
             $('#room_no').val('');
             $('#adults').val('');
             $('#children').val('');
             $('#comments').val('');
             $('#extra_bed').val('');



        
             $('.succ').html(data); 

            //alert(data);

}

});

return false;  //stop the actual form post !important!
 }
});

   });
</script>


 <script type="text/javascript">
    $(document).ready(function(){
        $("#checkavailability").change(function(){

               var room_no=$('#room_no').val();
             var checkin=$('#checkin').val();
             var checkout=$('#checkout').val();
            var roomtypeid=$('#roomtypeid').val();

         $.post('roomcheck.php', {'checkin': checkin,'checkout':checkout,'roomtype':roomtypeid,'room_no':room_no}, function (datas) {
        
            if(datas)
                  {
                                              
                  }
             else
                {
                   alert(' rooms are not available');
                    $('#room_no').val('');
                    return false;
                }

           });


          $.post('roomtypecheck.php', {'roomtype':roomtypeid}, function(datas) {
            //alert(datas);
            $('#roomtype').val(datas);

                    

          });

            

         
        });
         
    });
</script>
<script type="text/javascript">
  function a1()
  {
   $('#room_no').val('');
  }
  function b1()
  {
   $('#room_no').val('');
  }
  function c1()
  {
   $('#room_no').val('');
  }
  function d1()
  {
   $('#room_no').val('');
  }
</script>

    
    
   
    

