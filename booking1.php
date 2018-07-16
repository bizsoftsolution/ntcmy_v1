<?php
include_once "db/connection.php";

    @$ry = $_REQUEST["ryd"];
    if($ry!='')
    {
    
    $query_update1 =mysql_query("SELECT * FROM demo_book ORDER BY id DESC LIMIT 1");
    $ff =mysql_fetch_array($query_update1)or die(mysql_error());
    $id =$ff["id"];
    $checkin =$ff["checkin"];
    $checkout =$ff["checkout"];
    $roomtypeid =$ff["roomtypeid"];
    $room_no =$ff["room_no"];

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
    $roomtypeid ="";
    $room_no ="";
    }

  if($checkin=='')
  {
    $checkins=date('d/m/Y');

  }
  else
  {
    $checkins=$checkin;
  }

  if($checkout=='')
  {
    $checkouts=date('d/m/Y', strtotime(' +1 day'));
  }
  else
  {
    $checkouts=$checkout;
  }

    ?>
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
    <link rel="stylesheet" href="css/ionicons.css" type="text/css">
    <link rel="stylesheet" href="css/responsive.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/ionicons.min.css" type="text/css" media="screen">
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    
    <link id="stylesheet" rel="stylesheet" type="text/css" href="css/zInput_default_stylesheet.css">
    
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Gafata" />
    <link id="stylesheet" rel="stylesheet" type="text/css" href="css/flat-form.css">
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
<body onbeforeunload=”HandleBackFunctionality()” >
<!-- <body onload="document.refresh();"> -->

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WLW9HDC"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

    <!-- Start Header -->

   <?php 
    include_once "includes/header.php";
    ?>


    
    <!-- End Header -->
        <div class="banner">
        
    </div>
    

    <div class="inner-banner">
        <h4>Room Booking</h4>
        <div class="site_map">
            <a href="index.html">Home</a>    
            Room Booking
        </div>
        <div class="clear"></div>
    </div>  

    <!-- Container -->
    
    <div class="wrapper dark">
    <div class="contact-row column9">
    
                    
                        <!-- START Registration form -->
                        
                        <div class="panel panel-form">
                            <!-- Form header -->
                            <div class="panel-body">
                            
                            
                            
                                <form role="form" id="form_1" name="form_1" method="post" action="rooms_book1.php" >
                                    <!-- Username -->
                                <div class="col-md-6">
                                <legend>Room Check Availability</legend>
                                
                                <fieldset>
                                <div class="form-group">
                                <label for="inputText" class="col-md-4 control-label">Check-in Date</label>
                                <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Check-in Date" name="checkin" id="checkin" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()" > <span style="color: #E6E4E4;">(DD/MM/YYYY)</span>
                                </div>
                                </div>
                                
                                
                                <div class="form-group">
                                <label for="inputText" class="col-md-4 control-label">Check-out Date</label>
                                <div class="col-md-8">
                                <input type="text" class="form-control" placeholder="Check-out Date" name="checkout" id="checkout" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()" ><span style="color: #E6E4E4;">(DD/MM/YYYY)</span>
                                </div>
                                </div>
                                
                                <div class="form-group">
                                <label for="inputText" class="col-md-4 control-label">Room Type</label>
                                <div class="col-md-8">
                                <select class="form-control" name="roomtypeid" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()"  id="roomtypeid">
                                <option value="">Select Room Type</option>
                                  <?php 
                                  $roomtyp =mysql_query("SELECT * FROM roomtypes");
                                  while($row = mysql_fetch_array($roomtyp))
                                  {

                                  ?>
                                     <option value="<?php echo $row['id'];?>"<?php if($roomtypeid==$row['id']) echo 'selected';?>><?php echo $row['roomtype'];?></option> 
                                      <?php
                                      }
                                      ?>
                                </select>
                               
                                <input type="hidden" name="roomtype" id="roomtype" class="roomtype">
                                 <input type="hidden" name="roomamount" id="roomamount" class="roomamount">
                                  <input type="hidden" name="numberofdays" id="numberofdays" class="numberofdays">
                                   <input type="hidden" name="bookingtype" id="" class="" value="Online Booking">

                                </div>
                                </div>

                                <div class="form-group">
                                <label for="inputText" class="col-md-4 control-label"></label>
                                <div class="col-md-8">
                                <div style="color:#ff0000;" class="romtyp"></div>

                                <select class="form-control romtyp1" id="dormbed" name="dormbed" style="display:none;" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()">
                                 <option value="0">Select Dorms</option>
                                <option value="10">10 Bed Per Dorm</option>
                                <option value="12">12 Bed Per Dorm</option>
                                <option value="22">22 Bed Per Dorm</option>
                                </select>

                                </div>

                                </div>

                                
                                

                                 <div class="form-group">
                                <label for="inputText" class="col-md-4 control-label">Number</label>
                                <div class="col-md-8">
                                <div id="load" style="text-align:center;"></div>
                                <div class="noofprooms">
                                 <select class="form-control" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()" name="room_no" id="room_no">
                                 <option value="">--Select--</option>
                                         
                                </select>

                                </div>
                                 <div style="color:#ff0000;" class="rombeds"></div>
                                </div>
                                </div>
                                
                                <div class="form-group">
                                <label for="inputText" class="col-md-4 control-label">Adult</label>
                                <div class="col-md-8">
                                <input type="text" value="" Placeholder="Number of Adults" class="form-control" name="adults" id="adults"  >
                                 <span class="sdfg"></span>                             
                                </div>
                                </div>
                                
                                <div class="form-group">
                                <label for="inputText" class="col-md-4 control-label">Children</label>
                                <div class="col-md-8">
                                <input type="text" placeholder="Number of Children"  class="form-control" name="children" id="children">
                                </div>
                                </div>
<p style="text-align: center; font-size: 13px; color:#ff0000; background-color: rgba(0, 0, 0, 0.014); padding: 5px;">* Children above the age of seven years shall treated as adult for  accommodation</p>
                                  <div class="form-group">
                               
                                <input  class="checkboxs" type="checkbox" id="nubenumberid" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()" name="checkbox-toggle-language" value="de">
                                <span class="button-checkbox"></span>
                              
                                <label for="checkbox-toggle-lang-3">If Your are Nube Member</label>
                               
                              
                                
                                <div class="col-md-8 form-group nubemeb" style="display:none;">
                                <input type="text" class="form-control" id="nubememberid" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()" name="nubememberid" maxlength="12" placeholder="Nube Member ID" />
                                </div>
                                </div>
                                
                                                               
                                </fieldset>
                                </div>
                        



                        
                        
                                <div class="col-md-6" style="display:none;">
                                <legend>Room Information</legend>
                                <fieldset>
                                <div class="form-group">
                                <label for="inputText" class="col-md-4 control-label">Check In</label>
                                <div class="col-md-8">
                                <span class="checkin">-</span>
                                </div>
                                </div>
                                

                                
                                <div class="form-group">
                                <label for="inputText" class="col-md-4 control-label">Check Out</label>
                                <div class="col-md-8">
                                <span class="checkout">-</span>
                                </div>
                                </div>
                                
                                <div class="form-group">
                                <label for="inputText" class="col-md-4 control-label">No of Nights</label>
                                <div class="col-md-8">
                                <p class="noofdays">-</p>
                                </div>
                                 
                                </div>

                                <div class="form-group">
                                <label for="inputText" class="col-md-4 control-label">No. of Units</label>
                                <div class="col-md-8">
                                <p class="noofrooms">-</p>
                                </div>
                                <div class="dddd" style="display:none;"> </div>
                                </div>
                                
                                <div class="form-group">
                                <label for="inputText" class="col-md-4 control-label">Adult</label>
                                <div class="col-md-8">
                                <p class="adults">-</p>
                                </div>
                                </div>
                                
                                <div class="form-group">
                                <label for="inputText" class="col-md-4 control-label">children</label>
                                <div class="col-md-8">
                                <p class="children">-</p>
                                </div>
                                </div>


                               
                                
                                </fieldset>
                                </div>
                                <div class="col-md-12 text-center">
                                 <div class="form-group">
                                 <div id="checking"></div>
                                <button type="button" class="btn btn-danger" style="text-transform:uppercase;" id="checkavailability">Check Availability</button>

                                <button type="reset" class="btn btn-primary" style="text-transform:uppercase;" id="reset" >RESET</button>
                                </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-12">
                                <div class="dataslist">
                                </div>
                                </div>
                                
                                
                                <div class="clearfix"></div>
                                
                                <div class="col-md-12"> 
                                
                           
<div class="clearfix"></div>
   
                                    <legend>Personal Information</legend>
                                    
                                <div class="row">
                                <div class="col-md-4 form-group">
                                <label for="name" class="control-label">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" />
                                </div>
                                
                                <div class="col-md-4 form-group">
                                <label for="name" class="control-label">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" />
                                </div>
                                
                                <div class="col-md-4 form-group">
                                <label for="name" class="control-label">Email Address</label>
                                <input type="text" class="form-control" id="email" name="email" />
                                </div>
                                
                                </div>
                                
                                
                                <div class="row">
                                
                                <div class="col-md-4 form-group">
                                <label for="name" class="control-label">IC number</label>
                                <input type="text" class="form-control" onkeypress="return isNumber(event)" id="icnumber" name="icnumber" />
                                </div>

                                <div class="col-md-4 form-group">
                                <label for="name" class="control-label">Passport number</label>
                                <input type="text" class="form-control" id="passportnumber" name="passportnumber" />
                                </div>
                                
                                <div class="col-md-4 form-group">
                                <label for="name" class="control-label">Address Line 1</label>
                                <input type="text" class="form-control" id="line1" name="line1" />
                                </div>
                                
                               
                                
                                </div>
                                
                                <div class="row">

                                 <div class="col-md-4 form-group">
                                <label for="name" class="control-label">Line 2</label>
                                <input type="text" class="form-control" id="line2" name="line2" />
                                </div>
                                
                               
                                
                                 
                                
                              

                                 <div class="col-md-4 form-group">
                                <label for="inputTextarea-2" class="control-label">Country</label>
                               
                                <select class="form-control" name="countrys" id="countrys">
                                <option value="">Select Country</option>
                                <?php 
                                  $country =mysql_query("SELECT * FROM country");
                                  while($a = mysql_fetch_array($country))
                                  {

                                  ?>
                                <option value="<?php echo $a['countryid'];?>"><?php echo $a['country'];?></option>
                                <?php
                                }?>
                                </select>
                                <input type="hidden" name="country" id="country">
                                </div>


                                    <div class="col-md-4 form-group">
                                <label for="name" class="control-label">State</label>
                                <div class="state">
                                <select class="form-control" name="state" id="state">
                                    <option value="">Select State</option>
                                </select>
                                </div>
                                </div>
                                
                                
                                </div>
                                
                                <div class="row">

                              

                                 <div class="col-md-4 form-group">
                                <label for="name" class="control-label">City</label>
                                <input type="text" class="form-control" id="city" name="city" />
                                </div>
                                
                                <div class="col-md-4 form-group">
                                <label for="name" class="control-label">Postcode</label>
                                <input type="text" class="form-control" id="postcode" name="postcode" />
                                </div>
                                
                                
                                
                                <div class="col-md-4 form-group">
                                <label for="name" class="control-label">Contact No</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" />
                                </div>
                                
                                
                                
                                
                                </div>
                                
                                
                                <div class="row">
                                
                                
                                <div class="col-md-6 form-group">
                                
                               
                                <input type="checkbox" id="promocodes" name="promocodes" value="1">
                               
                              
                                <label for="checkbox-toggle-lang-3">Do You have NTC Promo Code ?</label>
                              
                              
                                
                                <div class="col-md-8 form-group promem" style="display:none;">
                                <input type="text" class="form-control" id="promocode" name="promocode" maxlength="7" placeholder="PROMO Code" />
                                </div>

                              
                                </div>

                                
                                </div>
                                
                                <div class="clearfix"></div>


                                <div class="row">
                                
                                
                                <div class="col-md-6 form-group">
                                
                               
                              <input type="checkbox" id="conditions" name="conditions" value="de">
                              
                              
                                <label for="checkbox-toggle-lang-2">By Clicking on Proceed Booking, I acknowledge that i have understood the <a href="#" onclick='javascript:window.open("http://ntc.my/terms-condition.php", "_blank", "scrollbars=1,resizable=1,height=300,width=450");' style="font-weight: bold; color: rgb(0, 129, 255);">Terms and Conditions &  Agree </a> to be bound by them.</label> 
                              
                              
                                
                              

                              
                                </div>

                                
                                </div>


                                
                               
                                
                                <div class="col-md-12">

                                <!-- <div class="">
                              
                                <input type="checkbox" id="conditions" name="conditions" value="de">
                              
                              
                                <label for="checkbox-toggle-lang-2">By Clicking on Proceed Booking, I acknowledge that i have understood the Terms and Conditions &  Agree to be bound by them.</label> 
                                </div>
                                
                                
                                <div class="clearfix"></div> -->
                                <!--  -->
                                <div class="form-group text-center submit_hide" >
                             <!--    <a href="#myModal" id="modalsss"  class="btn btn-info modalfade" style="text-transform: uppercase; margin-top: 15px; background: rgb(128, 120, 204) none repeat scroll 0% 0%; color: white;">Confirm Booking</a> -->

                                <button type="submit" class="btn btn-success" >Proceed Booking</button>
                                </div>
                                </div>
                                
                                
                                </div>
                                </div>
                                
                              <!--   <p style="color:red; text-align:center;">* All Booking must be fully paid<br><strong>* Refundable Deposit :</strong> RM 50/- for Individuals, RM 100 for Family and RM 500.00 for Groups.</p> -->
                               <input type="hidden" id="refreshed" value="no">


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
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                           <button  class="btn btn-success disa11" >Proceed Booking</button>
                                        </div>
                                      </div>
                                      
                                    </div>
                                  </div>

                                   <!-- Modal -->

                                    
                                </form>
                            </div>
                             <div class="succ"></div>
                            
                            <!-- Form footer -->
                           <!--  <div class="panel-footer">
                                <span class="required-field">*</span> - required field
                            </div> -->
                     
                        
                        <!-- END Registration form -->
                    


    
    
    
    </div>
    
    <div class="column3">
    <img src="images/side-bannerroom.jpg" class="img-responsive" >
    </div>  
    <div class="clear"></div>
    </div>
    <!-- End Wrapper -->



   

 
    
    <!-- Footer -->
    <?php include_once "includes/footer.php";?>
    


 <script type="text/javascript" src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
     <script src="js/examples.modals.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    
    <script type="text/javascript" src="js/jquery.superfish.js"></script>
    <script type="text/javascript" src="js/zebra_datepicker.js"></script>
    <script type="text/javascript" src="js/core.js"></script>
    
    
        
    <script src="zInput.js"></script>
    
   

    <script type= "text/javascript" src = "validation/jquery.validate.min.js"></script>
    <script type= "text/javascript" src = "validation/validation-init.js"></script>

    
    <style type="text/css">
    .error{
        border-color:red;
    }
    .submit_hide
    {
        display: none;
    }
    </style>
    
 <script>
$('#booking').addClass('current');


function isNumber(evt) {
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    return false;
  }
  return true;
}

    $('#form_1').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});

</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#icnumber').keyup(function(){
            var icnumber=$('#icnumber').val();
            if(icnumber!='')
            {
                $('#passportnumber').attr('disabled',true);
                $('#passportnumber').val('');
            }
            else
            {
                $('#passportnumber').attr('disabled',false);
                $('#passportnumber').val('');
            }


        });

        $('#passportnumber').keyup(function(){
            var passportnumber=$('#passportnumber').val();
            if(passportnumber!='')
            {
                $('#icnumber').attr('disabled',true);
                $('#icnumber').val('');
            }
            else
            {
                $('#icnumber').attr('disabled',false);
                $('#icnumber').val('');
            }


        });
//country master-----------------


        $('#countrys').change(function(){
            var country=$('#countrys').val();

            $.post('checkstate.php', {'country': country}, function(datas) {


                //alert(datas);
                     $('.state').html(datas);
                


            });


            $.post('checkcountrys.php', {'country': country}, function(datac) {


                //alert(data);
                $('#country').val(datac);
                    // $('.state').html(datas);
                


            });


        });






    });
</script>
    
<script type="text/javascript">
$(document).ready(function() {
    $('#checkin').datepicker({
startDate: "d",
format: "dd/mm/yyyy",
autoclose: true,
todayHighlight: true
});
});

 $(document).ready(function(){
 var a = $('#checkin').val();
 var datearray = a.split("/");

        var newdate1 = datearray[1] + '/' + datearray[0] + '/' + datearray[2];

        var date = new Date(newdate1);
        var newdate = new Date(date);

        newdate.setDate(newdate.getDate() + 1);
    
        var dd = newdate.getDate();
        var mm = newdate.getMonth() + 1;
        var y = newdate.getFullYear();

        var someFormattedDate = dd + '/' + mm + '/' + y;

 $('#checkout').datepicker({
                
                startDate: someFormattedDate,
                format: "dd/mm/yyyy",
                autoclose: true,
                todayHighlight: true
                }); 


            $('#checkin').change(function(){
            $('#checkout').val('');
            $('#checkout').datepicker("remove");
            var a = $('#checkin').val();

           
        var datearray = a.split("/");

        var newdate1 = datearray[1] + '/' + datearray[0] + '/' + datearray[2];

        var date = new Date(newdate1);
        var newdate = new Date(date);

        newdate.setDate(newdate.getDate() + 1);
    
        var dd = newdate.getDate();
        var mm = newdate.getMonth() + 1;
        var y = newdate.getFullYear();

        var someFormattedDate = dd + '/' + mm + '/' + y;



// // Add a day
// date.setDate(date.getDate() + 1)
            
            $('#checkout').datepicker({
                
                startDate: someFormattedDate,
                format: "dd/mm/yyyy",
                autoclose: true,
                todayHighlight: true
                }); 
        })
    });
    


</script>
 <script type="text/javascript">
    $(document).ready(function(){
        $("#checkavailability").click(function(){
           var nubememberid=$('#nubememberid').val();

           if(nubememberid=='')
           {

            var room_no=$('#room_no').val();
            var checkin=$('#checkin').val();
            var checkout=$('#checkout').val();
            var roomtypeid=$('#roomtypeid').val();
            var checkinday=$('#checkinday').val();
            var checkoutday=$('#checkoutday').val();
            var nubememberid=$('#nubememberid').val();
            var dormbed=$('#dormbed').val();
            var adults=$('#adults').val();

           

                if (checkin== "") {
                   alert('Please Choose a Check In Date!');
                    checkin.focus();
                    return false;
               }
               
              if (checkout== "") {
                   alert('Please Choose a Check Out Date!');
                   checkout.focus();
               return false;
               }
           
               else
               {      



                                                     $('#checking').show('slow');     
                                                 $('#checking').html('<img src="image/loading.png">');
                                                 $('#checkavailability').hide('slow');
                             $.post('roomcheck.php', {'checkin': checkin,'checkout':checkout,'roomtypeid':roomtypeid,'room_no':room_no,'checkinday':checkinday,'checkoutday':checkoutday,'nubememberid':nubememberid,'dormbed':dormbed,'adults':adults}, function (datas) {
                                         $('#checking').hide('slow');
                                          $('#checkavailability').show('slow');
                                        $('.dataslist').show('slow'); 
                                      $('.dataslist').html(datas);
                                      //alert(datas);
                                       

                                   });

                            



          

            }

           }
           else
           {
             var nubememberid=$('#nubememberid').val();
              var checkin=$('#checkin').val();
            var checkout=$('#checkout').val();

           

                $.post('memberidcheck.php', {'checkin': checkin,'checkout':checkout,'nubememberid':nubememberid}, function (datas) {
                    

                 
                    if(datas!='')
                    {
                       $('#nubememberid').val('');
                       // alert(datas);
                       alert(datas);
                           var room_no=$('#room_no').val();
                            var checkin=$('#checkin').val();
                            var checkout=$('#checkout').val();
                            var roomtypeid=$('#roomtypeid').val();
                            var checkinday=$('#checkinday').val();
                            var checkoutday=$('#checkoutday').val();
                            var nubememberid=$('#nubememberid').val();
                            var dormbed=$('#dormbed').val();
                            var adults=$('#adults').val();

                           

                                if (checkin== "") {
                                   alert('Please Choose a Check In Date!');
                                    checkin.focus();
                                    return false;
                               }
                               
                              if (checkout== "") {
                                   alert('Please Choose a Check Out Date!');
                                   checkout.focus();
                               return false;
                               }
                           
                               else
                               {

                          
                                                     $('#checking').show('slow');     
                                                 $('#checking').html('<img src="image/loading.png">');
                                                 $('#checkavailability').hide('slow');
                             $.post('roomcheck.php', {'checkin': checkin,'checkout':checkout,'roomtypeid':roomtypeid,'room_no':room_no,'checkinday':checkinday,'checkoutday':checkoutday,'nubememberid':nubememberid,'dormbed':dormbed,'adults':adults}, function (datas) {
                                         $('#checking').hide('slow');
                                          $('#checkavailability').show('slow');
                                        $('.dataslist').show('slow'); 
                                      $('.dataslist').html(datas);
                                      //alert(datas);
                                       

                                   });


                            }


                    }
                    else
                    {

                       

                            var room_no=$('#room_no').val();
                            var checkin=$('#checkin').val();
                            var checkout=$('#checkout').val();
                            var roomtypeid=$('#roomtypeid').val();
                            var checkinday=$('#checkinday').val();
                            var checkoutday=$('#checkoutday').val();
                            var nubememberid=$('#nubememberid').val();
                            var dormbed=$('#dormbed').val();
                            var adults=$('#adults').val();

                           

                                if (checkin== "") {
                                   alert('Please Choose a Check In Date!');
                                    checkin.focus();
                                    return false;
                               }
                               
                              if (checkout== "") {
                                   alert('Please Choose a Check Out Date!');
                                   checkout.focus();
                               return false;
                               }
                           
                               else
                               {

                              if(roomtypeid=='4')
                              {
                                    $('#checking').show('slow');   
                                 $('#checking').html('<img src="image/loading.png">');
                                 $('#checkavailability').hide('slow');
                               $.post('roomcheckdrom.php', {'checkin': checkin,'checkout':checkout,'roomtypeid':roomtypeid,'room_no':room_no,'checkinday':checkinday,'checkoutday':checkoutday,'nubememberid':nubememberid,'dormbed':dormbed,'adults':adults}, function (datas) {
                                         $('#checking').hide('slow');
                                          $('#checkavailability').show('slow');
                                         $('.dataslist').show('slow');
                                      $('.dataslist').html(datas);
                                      //alert(datas);
                                       

                                   });
                              }
                              else
                              {

                                    $('#checking').show('slow');   
                                 $('#checking').html('<img src="image/loading.png">');
                                 $('#checkavailability').hide('slow');
                               $.post('roomcheck.php', {'checkin': checkin,'checkout':checkout,'roomtypeid':roomtypeid,'room_no':room_no,'checkinday':checkinday,'checkoutday':checkoutday,'nubememberid':nubememberid,'dormbed':dormbed,'adults':adults}, function (datas) {
                                         $('#checking').hide('slow');
                                          $('#checkavailability').show('slow');
                                         $('.dataslist').show('slow');
                                      $('.dataslist').html(datas);
                                      //alert(datas);
                                       

                                   });

                              }  
                             

                            }



                    }


               });

           }
            

            
         
        });


    $('#reset').click(function(){

  $('#checkavailability').show('slow');
  $('.dataslist').hide('slow');
    });

// //onload----------------

//        // alert(room_no);
//             var room_no=$('#room_no').val();
//             var checkin=$('#checkin').val();
//             var checkout=$('#checkout').val();
//             var roomtypeid=$('#roomtypeid').val();
//             var checkinday=$('#checkinday').val();
//             var checkoutday=$('#checkoutday').val();
//             var nubememberid=$('#nubememberid').val();
//             var dormbed=$('#dormbed').val();
//             var adults=$('#adults').val();
//           // alert(dormbed);

//          $.post('roomcheck.php', {'checkin': checkin,'checkout':checkout,'roomtypeid':roomtypeid,'room_no':room_no,'checkinday':checkinday,'checkoutday':checkoutday,'nubememberid':nubememberid,'dormbed':dormbed,'adults':adults}, function (datas) {
                    
//                    $('.dataslist').html(datas);
//                     //alert(datas);

//            });


           
         
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#checkavailability").click(function(){
//date----------
            var checkin=$('#checkin').val();
            var checkout=$('#checkout').val();
            var room_nos=$('#room_no').val();
            var adults=$('#adults').val();
            var children=$('#children').val();
            if(room_nos=='')
            {
               room_no=1; 
            }
            else
            {
                room_no=room_nos;
            }
            $('.noofrooms').html(room_no);
            $('.adults').html(adults);
            $('.children').html(children);

            var checkindate = checkin.split("/").reverse().join("/");
            var checkoutdate = checkout.split("/").reverse().join("/");

          //checkin---- 
          
          var a1 = new Date(checkindate);

        var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
           var a =days[a1.getDay()]; 

        var month = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
           var b =month[a1.getMonth()];

         var c=a1.getDate();
         var d=a1.getFullYear();  
         $(".checkin").html(c+" "+b+" "+d+" "+a+" -3:00 PM");
        

        //checkout------ 


        var a2 = new Date(checkoutdate);

        var dayss = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
           var as =dayss[a2.getDay()]; 

        var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
           var bs =months[a2.getMonth()];

         var cs=a2.getDate();
         var ds=a2.getFullYear();  
         $(".checkout").html(cs+" "+bs+" "+ds+" "+as+" -12:00PM");
        

     //number of days---------------

     var checkindates = checkin.split("/").reverse().join(",");
    var checkoutdates = checkout.split("/").reverse().join(",");

                 var oneDay = 24 * 60 * 60 * 1000;  
                var firstDate = new Date(checkindates);
                var secondDate = new Date(checkoutdates);
 
    var diffDays = Math.round(Math.abs((firstDate.getTime() - secondDate.getTime()) / (oneDay)));
     
        
        if(diffDays=='0') 
        {
           $('.noofdays').html('1'); 
           $('.numberofdays').val('1'); 
        }
        else
        {
            $('.noofdays').html(diffDays); 
            $('.numberofdays').val(diffDays); 
        }
        
        

//--------------end--------------------------

//roomtype-------------------------
        
        var roomtypeid=$('#roomtypeid').val();
        $.post('room_check.php',{'roomtypeid':roomtypeid},function (data){

            $('.dddd').html(data);

        });
        

        });


    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.checkboxs').click(function(){
          var lfckv = document.getElementById("nubenumberid").checked
            if(lfckv)
            {
                $('.nubemeb').show('slow');
                $('#nubememberid').val('');
                $('.submit_hide').hide('slow');
            }
            else
            {
                $('.nubemeb').hide('slow');
                 $('#nubememberid').val('');
                  $('.submit_hide').show('slow');
            }

        });


         $('#promocodes').click(function(){
          var lfckv = document.getElementById("promocodes").checked
            if(lfckv)
            {
                $('.promem').show('slow');
                $('#promocode').val('');
               
            }
            else
            {
                $('.promem').hide('slow');
                 $('#promocode').val('');
                  
            }

        });

    });
</script>

<?php
 if($ry!='')
    {
    ?>

    <script type="text/javascript">
$(document).ready(function(){

    
       // alert();
        var roomtypeid=$('#roomtypeid').val();
        if(roomtypeid==1)
        {
            $('.romtyp').show('slow');
            $('.romtyp1').hide('slow');
            $('#dormbed').val('');
            $('.romtyp').html('Standard 3 Twin-sharing Rooms');
        }
        else if(roomtypeid==2)
        {
            $('.romtyp').show('slow');
            $('.romtyp1').hide('slow');
            $('#dormbed').val('');
            $('.romtyp').html('Standard 2 Twin-sharing Rooms');
        }
        else if(roomtypeid==3)
        {
            $('.romtyp').show('slow');
            $('.romtyp1').hide('slow');
            $('#dormbed').val('');
            $('.romtyp').html('Standard 49 Twin-sharing Rooms');
        }
        else if(roomtypeid==4)
        {
            $('.romtyp1').show('slow');
            $('.romtyp').hide('slow');
        }



        
    

});
  
</script>

<?php
    }
    else
    {

  ?>


<script type="text/javascript">
$(document).ready(function(){


    var roomtypeid=$('#roomtypeid').val();
    var dormbed=$('#dormbed').val();
        if(roomtypeid==1)
        {
            $('.romtyp').show('slow');
            $('.romtyp1').hide('slow');
            $('#dormbed').val('');
            $('.romtyp').html('Standard 3 Twin-sharing Rooms');
        }
        else if(roomtypeid==2)
        {
            $('.romtyp').show('slow');
            $('.romtyp1').hide('slow');
            $('#dormbed').val('');
            $('.romtyp').html('Standard 2 Twin-sharing Rooms');
        }
        else if(roomtypeid==3)
        {
            $('.romtyp').show('slow');
            $('.romtyp1').hide('slow');
            $('#dormbed').val('');
            $('.romtyp').html('Standard 49 Twin-sharing Rooms');
        }
        else if(roomtypeid==4)
        {
            $('.romtyp1').show('slow');
            $('.romtyp').hide('slow');
        }

                            
 // $.post('checknoofrooms.php',{'roomtypeid':roomtypeid,'dormbed':dormbed},function (data){

 //    $('.noofprooms').html(data);

 //    //alert(data);

 //  });


});
  
</script>

<?php
}?>

<script type="text/javascript">
$(document).ready(function(){

$('#roomtypeid').change(function(){
   var roomtypeid=$('#roomtypeid').val();
   var dormbed=$('#dormbed').val();
   var room_no=$('#room_no').val();
     $('#adults').val('');
     $('#children').val('');
        if(roomtypeid==1)
        {
            $('.romtyp').show('slow');
            $('.romtyp1').hide('slow');
            $('#dormbed').val('');
            $('.romtyp').html('Standard 3 Twin-sharing Rooms');
            $('#adults').attr('readonly',false);
            $('#children').attr('disabled',false);
             $('.rombeds').html('');
        }
        else if(roomtypeid==2)
        {
            $('.romtyp').show('slow');
            $('.romtyp1').hide('slow');
            $('#dormbed').val('');
            $('.romtyp').html('Standard 2 Twin-sharing Rooms');
            $('#adults').attr('readonly',false);
            $('#children').attr('disabled',false);
             $('.rombeds').html('');
        }
        else if(roomtypeid==3)
        {
            $('.romtyp').show('slow');
            $('.romtyp1').hide('slow');
            $('#dormbed').val('');
            $('.romtyp').html('Standard 49 Twin-sharing Rooms');
            $('#adults').attr('readonly',false);
            $('#children').attr('disabled',false);
            $('.rombeds').html('');
        }
        else if(roomtypeid==4)
        {
            $('.romtyp1').show('slow');
            $('.romtyp').hide('slow');
            $('#adults').attr('readonly',true);
            $('#children').attr('disabled',true);
            $('#children').val('');
            $('.rombeds').html('*Units Measured By Beds');
        }

                             $('#load').show('slow');     
                             $('#load').html('<img src="image/load.png">');
                             $('.noofprooms').hide('slow');

 $.post('checknoofrooms.php',{'roomtypeid':roomtypeid,'dormbed':dormbed},function (data){

    $('.noofprooms').html(data);

                             $('#load').hide('slow');     
                             $('.noofprooms').show('slow');

  });
});

$('#dormbed').change(function(){
   var roomtypeid=$('#roomtypeid').val();
   var dormbed=$('#dormbed').val();
   $('#adults').val('');
   
          $('#load').show('slow');     
                             $('#load').html('<img src="image/load.png">');
                             $('.noofprooms').hide('slow');
 $.post('checknoofrooms.php',{'roomtypeid':roomtypeid,'dormbed':dormbed},function (data){

    $('.noofprooms').html(data);
                             $('#load').hide('slow');     
                             $('.noofprooms').show('slow');
    //alert(data);

  });
});

$('#room_no').change(function(){
   var roomtypeid=$('#roomtypeid').val();
   var room_no=$('#room_no').val();
  $('#adults').val('');
  $('#children').val('');
   if(roomtypeid==1)
        {
            
            $('#adults').val(1);
             $('#adults').attr('readonly',false);
             $('#children').attr('disabled',false);
        }
        else if(roomtypeid==2)
        {
           
            $('#adults').val(1);
             $('#adults').attr('readonly',false);
              $('#children').attr('disabled',false);
        }
        else if(roomtypeid==3)
        {
            
            $('#adults').val(1);
            $('#adults').attr('readonly',false);
             $('#children').attr('disabled',false);
        }
        else if(roomtypeid==4)
        {
            
            $('#adults').val(room_no);
            $('#adults').attr('readonly',true);
             $('#children').attr('disabled',true);
              $('#children').val('');
        }
        
 
});

$('.noofprooms').change(function(){
   var roomtypeid=$('#roomtypeid').val();
   var room_no=$('#room_no').val();
  $('#adults').val('');
  $('#children').val('');
   if(roomtypeid==1)
        {
            
            $('#adults').val(1);
             $('#adults').attr('readonly',false);
             $('#children').attr('disabled',false);
        }
        else if(roomtypeid==2)
        {
           
            $('#adults').val(1);
             $('#adults').attr('readonly',false);
             $('#children').attr('disabled',false);
        }
        else if(roomtypeid==3)
        {
            
            $('#adults').val(1);
            $('#adults').attr('readonly',false);
            $('#children').attr('disabled',false);
        }
        else if(roomtypeid==4)
        {
            
            $('#adults').val(room_no);
            $('#adults').attr('readonly',true);
            $('#children').attr('disabled',true);
             $('#children').val('');
        }
        
 
});


});
  
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#adults').keyup(function(){
            var roomtypeid=$('#roomtypeid').val();
            var adults=$('#adults').val();
            var room_no=$('#room_no').val();

            if(roomtypeid==1)
        {
            var limit=parseFloat(room_no)*parseFloat(8)
            if(adults>limit)
            {
                alert('Only '+limit+' Adults for '+room_no+' Units');
                $('#adults').val('');
            }
            else
            {
                
            }
            
        }
        else if(roomtypeid==2)
        {
           var limit=parseFloat(room_no)*parseFloat(4)
            if(adults>limit)
            {
                alert('Only '+limit+' Adults for '+room_no+' Units');
                $('#adults').val('');
            }
            else
            {
                
            }

        }
        else if(roomtypeid==3)
        {
            
            var limit=parseFloat(room_no)*parseFloat(2)
            if(adults>limit)
            {
                alert('Only '+limit+' Adults for '+room_no+' Units');
                $('#adults').val('');
            }
            else
            {
                
            }

        }
        

        });

     $('#children').keyup(function(){
            var roomtypeid=$('#roomtypeid').val();
            var children=$('#children').val();
            var room_no=$('#room_no').val();

            if(roomtypeid==1)
        {
            var limit=parseFloat(room_no)*parseFloat(3)
            if(children>limit)
            {
                alert('Only '+limit+' Children for '+room_no+' Units');
                $('#children').val('');
            }
            else
            {
                
            }
            
        }
        else if(roomtypeid==2)
        {
           var limit=parseFloat(room_no)*parseFloat(2)
            if(children>limit)
            {
                alert('Only '+limit+' Children for '+room_no+' Units');
                $('#children').val('');
            }
            else
            {
                
            }

        }
        else if(roomtypeid==3)
        {
            
            var limit=parseFloat(room_no)*parseFloat(1)
            if(children>limit)
            {
                alert('Only '+limit+' Children for '+room_no+' Units');
                $('#children').val('');
            }
            else
            {
                
            }

        }
        

        });
    });
</script>

<script type="text/javascript">
  function a1()
  {
   $('.submit_hide').hide('slow');
  }
  function b1()
  {
   $('.submit_hide').hide('slow');
  }
  function c1()
  {
   $('.submit_hide').hide('slow');
  }
  function d1()
  {
   $('.submit_hide').hide('slow');
  }
  function asdf()
  {
    
  }
</script>

<script>
$(document).ready(function(){
    $("#adults").focusin(function(){
        var adults=$('#adults').val();
       
             $('.sdfg').html('<div style="color:red;">Enter No of Pax</div>');
       
       
    });
    $("#adults").focusout(function(){
       $('.sdfg').html('');
    });
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

          $('#sending').show('slow');
          $('#send').hide('slow');
        },

        success: function(data){

            $('#sending').hide('slow');
          $('#send').show('slow');
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
onload=function(){
    $('#checkin').val('');
    $('#checkout').val('');
    $('#roomtypeid').val('');
    $('#dormbed').val('');
    $('#room_no').val('');
    $('#adults').val('');
    $('#children').val('');
    $('#nubenumberid').val('');
    $('#nubememberid').val('');
    $('#firstname').val('');
    $('#lastname').val('');
    $('#email').val('');
    $('#icnumber').val('');
    $('#passportnumber').val('');
    $('#line1').val('');
    $('#line2').val('');
    $('#countrys').val('');
    $('#country').val('');
    $('#state').val('');
    $('#city').val('');
    $('#postcode').val('');
    $('#mobile').val('');
    // $('#promocodes').val('');
    // $('#promocode').val('');
    $('#conditions').val('');
}


</script>



<script type="text/javascript">
     function HandleBackFunctionality()
    {
           if(window.event) //Internet Explorer
           {
                     alert(“Browser back button is clicked on Internet Explorer…”);
           }
          else //Other browsers e.g. Chrome
           {
                     alert(“Browser back button is clicked on other browser…”);
            }
     }
</script>
    
<script type="text/javascript" src="js/fancySelect.js"></script>
    <script>
    $(document).ready(function() {

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

        
    $('.custom-select').fancySelect(); // Custom select
    $('[data-toggle="tooltip"]').tooltip() // Tooltip
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