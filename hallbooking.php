
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Party, Event, Wedding Hall Booking in Port Dickson are Spacious Air Conditioned hall with Complete Furnished Setting for Training Programs, Conference.">
    <title>Party|Event|Wedding| Hall Booking in Port Dickson</title>

    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" media="screen">
    <link rel="stylesheet" href="fonts/Font-Awesome/css/font-awesome.css" type="text/css" media="screen">


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
<body onbeforeunload=”HandleBackFunctionality()”>

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
            <a href="index.html">Home</a>    
            Hall Booking
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
                            
                            
                            
                                <form role="form" id="form_hall" name="form_hall" method="post"  action="hall_book.php" >
                                    <!-- Username -->
                                <div class="col-md-6">
                                <legend>Hall Check Availability</legend>
                                
                                <fieldset>
                                <div class="form-group">
                                <label for="inputText" class="col-md-4 control-label">Check-in Date</label>
                                <div class="col-md-8">
                                <input type="text" placeholder="Check-in Date" class="form-control" name="checkindate" id="checkindate" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()"  value=""><span style="color: #E6E4E4;">(DD/MM/YYYY)</span>
                                </div>
                                </div>


                                <div class="form-group">
                                <label for="inputText" class="col-md-4 control-label">Check-out Date</label>
                                <div class="col-md-8">
                                <input type="text" placeholder="Check-out Date" class="form-control" name="checkoutdate" id="checkoutdate" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()"  value=""><span style="color: #E6E4E4;">(DD/MM/YYYY)</span>
                                </div>
                                </div>
                              
                                
                                <div class="form-group">
                                <label for="inputText" class="col-md-4 control-label">Auditorium </label>
                                <div class="col-md-8">
                                <select class="form-control" name="auditorium" id="auditorium" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()">
                                <option value="">Select Auditorium</option>
                                 <?php 
                                  $halltyp =mysql_query("SELECT * FROM halltypes  GROUP BY auditorium");
                                  while($row = mysql_fetch_array($halltyp))
                                  {
                                    $auditorium=$row['auditorium'];

                                  ?>
                                     <option value="<?php echo $row['auditorium'];?>"><?php echo $row['auditorium'];?></option> 
                                      <?php
                                      }
                                      ?>
                                </select>

                                 

                                </div>
                                </div>
                                
                                
                                <div class="form-group">
                                <label for="inputText" class="col-md-4 control-label">Hall Type</label>
                                <div class="col-md-8">
                                  <div id="load" style="text-align:center;"></div>   
                                <div class="halltypes">
                                <select class="form-control" name="halltype" id="halltype" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()">

                                <option value=""> Select Hall Type</option>
                                </select>
                                </div>
                              
                              

                                 <input type="hidden" name="bookingtype" id="" class="" value="Online Booking">
                                  <input type="hidden" name="numberofdays" id="numberofdays" class="numberofdays" value="">

                                </div>
                                </div>

                                 <div class="form-group">
                                <label for="inputText" class="col-md-4 control-label">Slots</label>
                                <div class="col-md-8">
                                <select class="form-control" name="slot" id="slot" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()">
                                <option value="">Select Slots</option>
                                <option value="Slot I">Slot I</option>
                                <option value="Slot II">Slot II</option>
                                <option value="Slot III">Slot III</option>
                                <option value="Slot I & II">Slot I & II</option>
                                <option value="Slot I & III">Slot I & III</option>
                                <option value="Slot II & III">Slot II & III</option>
                                <option value="Slot I & Slot II & III">Slot I & Slot II & III</option>
                                </select>
                                <br>
                                 <span class="slottime" style="color: green; font-weight: bold;"></span>
                                </div>

                                </div>
                                <!-- <div class="checkbox checkbox-primary">
                        <input id="checkbox2" checked="" type="checkbox">
                        <label for="checkbox2">
                            Primary
                        </label>
                    </div>

                                <div class="checkbox checkbox-info checkbox-circle">
                        <input id="checkbox8" checked="" type="checkbox">
                        <label for="checkbox8">
                            Me too
                        </label>
                    </div> -->
                                
                                 <div class="col-md-12 text-center">
                                <div class="form-group" >
                                 <div id="checking"></div>
                                <button type="button" class="btn btn-danger" style="text-transform:uppercase; margin-top:15px;" id="checkavailability">Check Availability</button>

                                 <button type="reset" class="btn btn-primary" style="text-transform: uppercase; margin-top: 14px;" id="reset" >RESET</button>
                                </div>
                                </div>
                                
                                </fieldset>
                                </div>
                        



                        
                        
                                <div class="col-md-6" style="display:none;">
                                <legend>Hall Information</legend>
                                <fieldset>
                                <div class="form-group">
                                <label for="inputText" class="col-md-4 control-label">Check IN</label>
                                <div class="col-md-8">
                                <p class="checkindate">-</p>
                                </div>
                                </div>


                                 <div class="form-group">
                                <label for="inputText" class="col-md-4 control-label">Check Out</label>
                                <div class="col-md-8">
                                <p class="checkoutdate">-</p>
                                </div>
                                </div>


                                <div class="form-group">
                                <label for="inputText" class="col-md-4 control-label">No of Days</label>
                                <div class="col-md-8">
                                <p class="noofdays">-</p>
                                </div>
                                 
                                </div>
                                

                               <div class="form-group">
                                <label for="inputText" class="col-md-4 control-label">Auditorium</label>
                                <div class="col-md-8">
                                <p class="auditorium">-</p>
                                </div>
                                 
                                </div>
                                
                                <div class="form-group">
                                <label for="inputText" class="col-md-4 control-label">Hall Type</label>
                                <div class="col-md-8">
                                <p class="halltype">-</p>
                                </div>
                                 
                                </div>

                                <div class="form-group">
                                <label for="inputText" class="col-md-4 control-label">Slots</label>
                                <div class="col-md-8">
                                <p class="slots">-</p>
                                </div>
                                <div class="dddd" style="display:none;"> </div>
                                </div>
                                
                                
                                
                                </fieldset>
                                </div>
                                
                                <div class="clearfix"></div>
                                <div class="col-md-12">
                                <div class="dataslist">
                                </div>
                                </div>
                                
                                
                                <div class="clearfix"></div>
                                
                                <div class="col-md-12"> 
                                
                                <!-- <p>The above rate are inclusive of 6% government service tax.<br>
</p> -->
<div class="clearfix"></div>
   
                                    <legend>Personal Information</legend>
                                    
                               <div class="row">
                                <div class="col-md-4 form-group">
                                <label for="name" class="control-label">First Name<span class="required-field">*</span></label>
                                <input type="text" class="form-control" id="firstname" name="firstname" />
                                </div>
                                
                                <div class="col-md-4 form-group">
                                <label for="name" class="control-label">Last Name<span class="required-field">*</span></label>
                                <input type="text" class="form-control" id="lastname" name="lastname" />
                                </div>
                                
                                <div class="col-md-4 form-group">
                                <label for="name" class="control-label">Email Address<span class="required-field">*</span></label>
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
                                <label for="name" class="control-label">Address Line 1<span class="required-field">*</span></label>
                                <input type="text" class="form-control" id="line1" name="line1" />
                                </div>
                                
                                
                                
                                </div>
                                
                                <div class="row">

                                <div class="col-md-4 form-group">
                                <label for="name" class="control-label">Line 2<span class="required-field">*</span></label>
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
                                <label for="name" class="control-label">City<span class="required-field">*</span></label>
                                <input type="text" class="form-control" id="city" name="city" />
                                </div>
                                

                                  <div class="col-md-4 form-group">
                                <label for="name" class="control-label">Postcode<span class="required-field">*</span></label>
                                <input type="text" class="form-control" id="postcode" name="postcode" />
                                </div>
                                
                                <div class="col-md-4 form-group">
                                <label for="name" class="control-label">Contact No<span class="required-field">*</span></label>
                                <input type="text" class="form-control" id="mobile" name="mobile" />
                                </div>
                                
                                
                                
                                
                                </div>
                                
                                <div class="clearfix"></div>
                                
                               <!--  <div class="col-md-6">
                                <div class="checkboxs">
                                <label class="custom-option toggle" data-off="OFF" data-on="ON">
                                <input type="checkbox" id="nubenumberid" name="checkbox-toggle-language" value="de">
                                <span class="button-checkbox"></span>
                                </label>
                                <label for="checkbox-toggle-lang-3">If Yor are Nube Member</label>
                                </div>
                                </div>
                                
                                <div class="col-md-6 form-group nubemeb" style="display:none;">
                                <input type="text" class="form-control" id="nubememberid" name="nubememberid" placeholder="Nube Member ID" />
                                </div> -->
                                
                                <div class="col-md-12">
                                <div class="">
                              
                                <input type="checkbox" id="conditions" name="conditions" value="de">
                              
                                <label for="checkbox-toggle-lang-2">By Clicking on Proceed Booking, I acknowledge that i have understood the <a href="#" onclick='javascript:window.open("http://ntc.my/terms-condition.php", "_blank", "scrollbars=1,resizable=1,height=300,width=450");' style="font-weight: bold; color: rgb(0, 129, 255);">Terms and Conditions &  Agree </a> to be bound by them.</label>  
                                </div>
                                
                                
                                <div class="clearfix"></div>
                                
                                <div class="form-group text-center submit_hide" >
                                <input type="submit" value="Proceed Booking" class="btn btn-info" style="text-transform: uppercase; margin-top: 15px; background: rgb(128, 120, 204) none repeat scroll 0% 0%; color: white;">
                                </div>
                                </div>
                                
                                
                                </div>
                                
                                
                           <!--      <p style="color:red; text-align:center;">* All Booking Must Be Fully Paid</p> -->
                                    
                                </form>
                            </div>
                             <div class="succ"></div>
                            
                            <!-- Form footer -->
                           <!--  <div class="panel-footer">
                                <span class="required-field">*</span> - required field
                            </div> -->
                        </div>
                        
                        <!-- END Registration form -->
                    


    
    
    
    </div>
    
    <div class="column3">
   <table class="table table-bordered" border="1" cellspacing="1" cellpadding="8" align="center">
<tbody>
<tr>
<td align="center" bgcolor="#d4dfff" width="30%"><span style="font-weight: bold;">Slot</span></td>
<td align="center" bgcolor="#d4dfff" width="18%"><span style="font-weight: bold;"><em>Time</em></span></td>

</tr>
<tr>
<td>Slot I</td>
<td>08:00 AM - 12:00 PM</td>
</tr>
<tr>
<td>Slot II</td>
<td>2:00 PM - 06:00 PM</td>
</tr>
<tr>
<td>Slot III</td>
<td>07:00 PM - 11:00 PM</td>
</tr>

</tbody>
</table>
    <img src="images/side-bannerhall.jpg" class="img-responsive" >
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
        border-color:red;
    }
    .submit_hide
    {
        display: none;
    }
    </style>
    
 <script>
$('#hallbooking').addClass('current');
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
    $('#checkindate').datepicker({
startDate: "d",
format: "dd/mm/yyyy",
autoclose: true,
todayHighlight: true
});
});

 $(document).ready(function(){
 var a = $('#checkindate').val();
 $('#checkoutdate').datepicker({
                
                startDate: a,
                format: "dd/mm/yyyy",
                autoclose: true,
                todayHighlight: true
                }); 


            $('#checkindate').change(function(){
            $('#checkoutdate').val('');
            $('#checkoutdate').datepicker("remove");
            var a = $('#checkindate').val();

            
            $('#checkoutdate').datepicker({
                
                startDate: a,
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
           
            

            
            var checkindate=$('#checkindate').val();
            var checkoutdate=$('#checkoutdate').val();
            var numofdays=$('#numberofdays').val();
            var halltype=$('#halltype').val();
            var auditorium=$('#auditorium').val();
            var slot=$('#slot').val();

           $('.auditorium').html(auditorium);
           $('.halltype').html(halltype);

                if (checkindate== "") {
                   alert('Please Choose a Check In Date!');
                    checkindate.focus();
                    return false;
               }
               else if(checkoutdate=="")
               {
                alert('Please Choose a Check Out Date!');
                    checkoutdate.focus();
                    return false;
               }
               
                        
               else
               {
                             $('#checking').show('slow');     
                             $('#checking').html('<img src="image/loading.png">');
                             $('#checkavailability').hide('slow');
         $.post('check_halltype.php', {'checkindate': checkindate,'checkoutdate': checkoutdate,'numofdays': numofdays,'halltype':halltype,'slot':slot,'auditorium':auditorium}, function (datas) {

                    $('#checking').hide('slow');
                     // $('#checkavailability').show('slow');
                      $('.dataslist').show('slow'); 
                    
                   $('.dataslist').html(datas);

                   var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);       
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });
                        var seats=$('#seats').val();

                        var set=parseFloat(seats)*parseFloat('2');
                        var seat=set.toFixed(2);
                        $('.chairsrental').html(seat);
                        $('.chairsrental').val(seat);

                         var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);

                        // var $selectAll = jQuery( "input:radio[name=cus]" );
                        // $selectAll.on( "change", function() {
                        //     var data=jQuery(this).val();
                        //     if(data=='oldcustomer')
                        //     {
                        //         alert('oldcustomer');
                        //     }
                           
                        // });

    //10

                    $('#facilities10').change(function(){


                         $('.faciamount1').html('');
                         $('.faciamount1').val('');
                          $('.facihour1').val('');
                         $('.facilities1').val('');
                          var sub_tot=0;
                         $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                         var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);

          
                   });



    //11

                    $('#facilities11').change(function(){


                    if($('#facilities11').prop("checked") == true)
                    {

                         var facilities1=$('#facilities11').val();
                         var arr = facilities1.split('@');
                            
                         $('.faciamount1').html(arr[1]);
                        $('.faciamount1').val(arr[1]);
                        $('.facilities1').val(arr[0]);
                        $('.facihour1').val(arr[2]);

                        var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);

                    }
                    else
                    {
                         $('.faciamount1').html('');
                         $('.faciamount1').val('');
                         $('.facilities1').val('');
                         $('.facihour1').val('');
                          var sub_tot=0;
                         $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                         var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });


    

 //12

                    $('#facilities12').change(function(){


                    if($('#facilities12').prop("checked") == true)
                    {

                         var facilities1=$('#facilities12').val();
                         var arr = facilities1.split('@');
                            
                         $('.faciamount1').html(arr[1]);
                        $('.faciamount1').val(arr[1]);
                        $('.facilities1').val(arr[0]);
                        $('.facihour1').val(arr[2]);

                        var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);

                    }
                    else
                    {
                         $('.faciamount1').html('');
                         $('.faciamount1').val('');
                         $('.facilities1').val('');
                         $('.facihour1').val('');
                          var sub_tot=0;
                         $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                         var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });

 //13

                    $('#facilities13').change(function(){


                    if($('#facilities13').prop("checked") == true)
                    {

                         var facilities1=$('#facilities13').val();
                         var arr = facilities1.split('@');
                            
                         $('.faciamount1').html(arr[1]);
                        $('.faciamount1').val(arr[1]);
                        $('.facilities1').val(arr[0]);
                        $('.facihour1').val(arr[2]);

                        var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);

                    }
                    else
                    {
                         $('.faciamount1').html('');
                         $('.faciamount1').val('');
                         $('.facilities1').val('');
                         $('.facihour1').val('');
                          var sub_tot=0;
                         $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                         var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });

 //14

                    $('#facilities14').change(function(){


                    if($('#facilities14').prop("checked") == true)
                    {

                         var facilities1=$('#facilities14').val();
                         var arr = facilities1.split('@');
                            
                         $('.faciamount1').html(arr[1]);
                        $('.faciamount1').val(arr[1]);
                        $('.facilities1').val(arr[0]);
                        $('.facihour1').val(arr[2]);

                        var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);

                    }
                    else
                    {
                         $('.faciamount1').html('');
                         $('.faciamount1').val('');
                         $('.facilities1').val('');
                         $('.facihour1').val('');
                          var sub_tot=0;
                         $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                         var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });

 //15

                    $('#facilities15').change(function(){


                    if($('#facilities15').prop("checked") == true)
                    {

                         var facilities1=$('#facilities15').val();
                         var arr = facilities1.split('@');
                            
                         $('.faciamount1').html(arr[1]);
                        $('.faciamount1').val(arr[1]);
                        $('.facilities1').val(arr[0]);
                        $('.facihour1').val(arr[2]);

                        var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);

                    }
                    else
                    {
                         $('.faciamount1').html('');
                         $('.faciamount1').val('');
                         $('.facilities1').val('');
                         $('.facihour1').val('');
                          var sub_tot=0;
                         $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                         var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });



//20

                    $('#facilities20').change(function(){


                         $('.faciamount2').html('');
                         $('.faciamount2').val('');
                         $('.facilities2').val('');
                         $('.facihour2').val('');
                          var sub_tot=0;
                         $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                         var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);

          
                   });



//21

                    $('#facilities21').change(function(){

                    if($('#facilities21').prop("checked") == true)
                    {

                         var facilities2=$('#facilities21').val();
                         var arr = facilities2.split('@');
                            
                         $('.faciamount2').html(arr[1]);
                          $('.faciamount2').val(arr[1]);
                          $('.facilities2').val(arr[0]);
                          $('.facihour2').val(arr[2]);
                           var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount2').html('');
                         $('.faciamount2').val('');
                         $('.facilities2').val('');
                         $('.facihour2').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });


//22

                    $('#facilities22').change(function(){

                    if($('#facilities22').prop("checked") == true)
                    {

                         var facilities2=$('#facilities22').val();
                         var arr = facilities2.split('@');
                            
                         $('.faciamount2').html(arr[1]);
                          $('.faciamount2').val(arr[1]);
                          $('.facilities2').val(arr[0]);
                          $('.facihour2').val(arr[2]);
                           var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount2').html('');
                         $('.faciamount2').val('');
                         $('.facilities2').val('');
                         $('.facihour2').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });

//23

                    $('#facilities23').change(function(){

                    if($('#facilities23').prop("checked") == true)
                    {

                         var facilities2=$('#facilities23').val();
                         var arr = facilities2.split('@');
                            
                         $('.faciamount2').html(arr[1]);
                          $('.faciamount2').val(arr[1]);
                          $('.facilities2').val(arr[0]);
                          $('.facihour2').val(arr[2]);
                           var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount2').html('');
                         $('.faciamount2').val('');
                         $('.facilities2').val('');
                         $('.facihour2').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });

//24

                    $('#facilities24').change(function(){

                    if($('#facilities24').prop("checked") == true)
                    {

                         var facilities2=$('#facilities24').val();
                         var arr = facilities2.split('@');
                            
                         $('.faciamount2').html(arr[1]);
                          $('.faciamount2').val(arr[1]);
                          $('.facilities2').val(arr[0]);
                          $('.facihour2').val(arr[2]);
                           var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount2').html('');
                         $('.faciamount2').val('');
                         $('.facilities2').val('');
                         $('.facihour2').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });

//25

                    $('#facilities25').change(function(){

                    if($('#facilities25').prop("checked") == true)
                    {

                         var facilities2=$('#facilities25').val();
                         var arr = facilities2.split('@');
                            
                         $('.faciamount2').html(arr[1]);
                          $('.faciamount2').val(arr[1]);
                          $('.facilities2').val(arr[0]);
                          $('.facihour2').val(arr[2]);
                           var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount2').html('');
                         $('.faciamount2').val('');
                         $('.facilities2').val('');
                         $('.facihour2').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });



//30

                    $('#facilities30').change(function(){


                         $('.faciamount3').html('');
                         $('.faciamount3').val('');
                         $('.facilities3').val('');
                        $('.facihour3').val('');
                        $('.pa1').html('');
                          var sub_tot=0;
                         $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                         var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);

          
                   });



//31
                     $('#facilities31').change(function(){

                    if($('#facilities31').prop("checked") == true)
                    {

                         var facilities3=$('#facilities31').val();
                         var arr = facilities3.split('@');
                            
                         $('.faciamount3').html(arr[1]);
                         $('.faciamount3').val(arr[1]);
                         $('.facilities3').val(arr[0]);
                         $('.facihour3').val(arr[2]);
                         $('.pa1').html('Minimum One Week Prior Booking Is Required');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount3').html('');
                         $('.faciamount3').val('');
                         $('.facilities3').val('');
                         $('.facihour3').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });


//32
                     $('#facilities32').change(function(){

                    if($('#facilities32').prop("checked") == true)
                    {

                         var facilities3=$('#facilities32').val();
                         var arr = facilities3.split('@');
                            
                         $('.faciamount3').html(arr[1]);
                         $('.faciamount3').val(arr[1]);
                         $('.facilities3').val(arr[0]);
                         $('.facihour3').val(arr[2]);
                         $('.pa1').html('Minimum One Week Prior Booking Is Required');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount3').html('');
                         $('.faciamount3').val('');
                         $('.facilities3').val('');
                         $('.facihour3').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });

//33
                     $('#facilities33').change(function(){

                    if($('#facilities33').prop("checked") == true)
                    {

                         var facilities3=$('#facilities33').val();
                         var arr = facilities3.split('@');
                            
                         $('.faciamount3').html(arr[1]);
                         $('.faciamount3').val(arr[1]);
                         $('.facilities3').val(arr[0]);
                         $('.facihour3').val(arr[2]);
                         $('.pa1').html('Minimum One Week Prior Booking Is Required');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount3').html('');
                         $('.faciamount3').val('');
                         $('.facilities3').val('');
                         $('.facihour3').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });

//34
                     $('#facilities34').change(function(){

                    if($('#facilities34').prop("checked") == true)
                    {

                         var facilities3=$('#facilities34').val();
                         var arr = facilities3.split('@');
                            
                         $('.faciamount3').html(arr[1]);
                         $('.faciamount3').val(arr[1]);
                         $('.facilities3').val(arr[0]);
                         $('.facihour3').val(arr[2]);
                         $('.pa1').html('Minimum One Week Prior Booking Is Required');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount3').html('');
                         $('.faciamount3').val('');
                         $('.facilities3').val('');
                         $('.facihour3').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });

//35
                     $('#facilities35').change(function(){

                    if($('#facilities35').prop("checked") == true)
                    {

                         var facilities3=$('#facilities35').val();
                         var arr = facilities3.split('@');
                            
                         $('.faciamount3').html(arr[1]);
                         $('.faciamount3').val(arr[1]);
                         $('.facilities3').val(arr[0]);
                         $('.facihour3').val(arr[2]);
                         $('.pa1').html('Minimum One Week Prior Booking Is Required');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount3').html('');
                         $('.faciamount3').val('');
                         $('.facilities3').val('');
                         $('.facihour3').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });


//40

                    $('#facilities40').change(function(){


                         $('.faciamount4').html('');
                         $('.faciamount4').val('');
                         $('.facilities4').val('');
                         $('.facihour4').val('');
                         $('.pa2').html('');
                          var sub_tot=0;
                         $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                         var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);

          
                   });


//41

                      $('#facilities41').change(function(){

                    if($('#facilities41').prop("checked") == true)
                    {

                         var facilities4=$('#facilities41').val();
                         var arr = facilities4.split('@');
                            
                         $('.faciamount4').html(arr[1]);
                         $('.faciamount4').val(arr[1]);
                         $('.facilities4').val(arr[0]);
                         $('.facihour4').val(arr[2]);
                         $('.pa2').html('Minimum One Week Prior Booking Is Required');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);

                       

                    }
                    else
                    {
                         $('.faciamount4').html('');
                         $('.faciamount4').val('');
                         $('.facilities4').val('');
                         $('.facihour4').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });


//42

                      $('#facilities42').change(function(){

                    if($('#facilities42').prop("checked") == true)
                    {

                         var facilities4=$('#facilities42').val();
                         var arr = facilities4.split('@');
                            
                         $('.faciamount4').html(arr[1]);
                         $('.faciamount4').val(arr[1]);
                         $('.facilities4').val(arr[0]);
                         $('.facihour4').val(arr[2]);
                         $('.pa2').html('Minimum One Week Prior Booking Is Required');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);

                       

                    }
                    else
                    {
                         $('.faciamount4').html('');
                         $('.faciamount4').val('');
                         $('.facilities4').val('');
                         $('.facihour4').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });


//43

                      $('#facilities43').change(function(){

                    if($('#facilities43').prop("checked") == true)
                    {

                         var facilities4=$('#facilities43').val();
                         var arr = facilities4.split('@');
                            
                         $('.faciamount4').html(arr[1]);
                         $('.faciamount4').val(arr[1]);
                         $('.facilities4').val(arr[0]);
                         $('.facihour4').val(arr[2]);
                         $('.pa2').html('Minimum One Week Prior Booking Is Required');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);

                       

                    }
                    else
                    {
                         $('.faciamount4').html('');
                         $('.faciamount4').val('');
                         $('.facilities4').val('');
                         $('.facihour4').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });

//44

                      $('#facilities44').change(function(){

                    if($('#facilities44').prop("checked") == true)
                    {

                         var facilities4=$('#facilities44').val();
                         var arr = facilities4.split('@');
                            
                         $('.faciamount4').html(arr[1]);
                         $('.faciamount4').val(arr[1]);
                         $('.facilities4').val(arr[0]);
                         $('.facihour4').val(arr[2]);
                         $('.pa2').html('Minimum One Week Prior Booking Is Required');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);

                       

                    }
                    else
                    {
                         $('.faciamount4').html('');
                         $('.faciamount4').val('');
                         $('.facilities4').val('');
                         $('.facihour4').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });

//45

                      $('#facilities45').change(function(){

                    if($('#facilities45').prop("checked") == true)
                    {

                         var facilities4=$('#facilities45').val();
                         var arr = facilities4.split('@');
                            
                         $('.faciamount4').html(arr[1]);
                         $('.faciamount4').val(arr[1]);
                         $('.facilities4').val(arr[0]);
                         $('.facihour4').val(arr[2]);
                         $('.pa2').html('Minimum One Week Prior Booking Is Required');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);

                       

                    }
                    else
                    {
                         $('.faciamount4').html('');
                         $('.faciamount4').val('');
                         $('.facilities4').val('');
                         $('.facihour4').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });


//50

                    $('#facilities50').change(function(){


                         $('.faciamount5').html('');
                         $('.faciamount5').val('');
                         $('.facilities5').val('');
                         $('.facihour5').val('');
                         $('.pa3').html('');
                          var sub_tot=0;
                         $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                         var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);

          
                   });



//51

                       $('#facilities51').change(function(){

                    if($('#facilities51').prop("checked") == true)
                    {

                         var facilities5=$('#facilities51').val();
                         var arr = facilities5.split('@');
                            
                         $('.faciamount5').html(arr[1]);
                         $('.faciamount5').val(arr[1]);
                         $('.facilities5').val(arr[0]);
                         $('.facihour5').val(arr[2]);
                          $('.pa3').html('Minimum One Week Prior Booking Is Required');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount5').html('');
                         $('.faciamount5').val('');
                         $('.facilities5').val('');
                         $('.facihour5').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });



//52

                       $('#facilities52').change(function(){

                    if($('#facilities52').prop("checked") == true)
                    {

                         var facilities5=$('#facilities52').val();
                         var arr = facilities5.split('@');
                            
                         $('.faciamount5').html(arr[1]);
                         $('.faciamount5').val(arr[1]);
                         $('.facilities5').val(arr[0]);
                         $('.facihour5').val(arr[2]);
                          $('.pa3').html('Minimum One Week Prior Booking Is Required');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount5').html('');
                         $('.faciamount5').val('');
                         $('.facilities5').val('');
                         $('.facihour5').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });



//53

                       $('#facilities53').change(function(){

                    if($('#facilities53').prop("checked") == true)
                    {

                         var facilities5=$('#facilities53').val();
                         var arr = facilities5.split('@');
                            
                         $('.faciamount5').html(arr[1]);
                         $('.faciamount5').val(arr[1]);
                         $('.facilities5').val(arr[0]);
                         $('.facihour5').val(arr[2]);
                          $('.pa3').html('Minimum One Week Prior Booking Is Required');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount5').html('');
                         $('.faciamount5').val('');
                         $('.facilities5').val('');
                         $('.facihour5').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });



//54

                       $('#facilities54').change(function(){

                    if($('#facilities54').prop("checked") == true)
                    {

                         var facilities5=$('#facilities54').val();
                         var arr = facilities5.split('@');
                            
                         $('.faciamount5').html(arr[1]);
                         $('.faciamount5').val(arr[1]);
                         $('.facilities5').val(arr[0]);
                         $('.facihour5').val(arr[2]);
                          $('.pa3').html('Minimum One Week Prior Booking Is Required');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount5').html('');
                         $('.faciamount5').val('');
                         $('.facilities5').val('');
                         $('.facihour5').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });



//55

                       $('#facilities55').change(function(){

                    if($('#facilities55').prop("checked") == true)
                    {

                         var facilities5=$('#facilities55').val();
                         var arr = facilities5.split('@');
                            
                         $('.faciamount5').html(arr[1]);
                         $('.faciamount5').val(arr[1]);
                         $('.facilities5').val(arr[0]);
                         $('.facihour5').val(arr[2]);
                          $('.pa3').html('Minimum One Week Prior Booking Is Required');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount5').html('');
                         $('.faciamount5').val('');
                         $('.facilities5').val('');
                         $('.facihour5').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });

//60

                    $('#facilities60').change(function(){


                         $('.faciamount6').html('');
                         $('.faciamount6').val('');
                         $('.facilities6').val('');
                         $('.facihour6').val('');
                          var sub_tot=0;
                         $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                         var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);

          
                   });


//61
                        $('#facilities61').change(function(){

                    if($('#facilities61').prop("checked") == true)
                    {

                         var facilities6=$('#facilities61').val();
                         var arr = facilities6.split('@');
                            
                         $('.faciamount6').html(arr[1]);
                         $('.faciamount6').val(arr[1]);
                          $('.facilities6').val(arr[0]);
                          $('.facihour6').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount6').html('');
                          $('.faciamount6').val('');
                           $('.facilities6').val('');
                           $('.facihour6').val('');
                           var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });



//62
                        $('#facilities62').change(function(){

                    if($('#facilities62').prop("checked") == true)
                    {

                         var facilities6=$('#facilities62').val();
                         var arr = facilities6.split('@');
                            
                         $('.faciamount6').html(arr[1]);
                         $('.faciamount6').val(arr[1]);
                          $('.facilities6').val(arr[0]);
                          $('.facihour6').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount6').html('');
                          $('.faciamount6').val('');
                           $('.facilities6').val('');
                           $('.facihour6').val('');
                           var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });

//63
                        $('#facilities63').change(function(){

                    if($('#facilities63').prop("checked") == true)
                    {

                         var facilities6=$('#facilities63').val();
                         var arr = facilities6.split('@');
                            
                         $('.faciamount6').html(arr[1]);
                         $('.faciamount6').val(arr[1]);
                          $('.facilities6').val(arr[0]);
                          $('.facihour6').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount6').html('');
                          $('.faciamount6').val('');
                           $('.facilities6').val('');
                           $('.facihour6').val('');
                           var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });

//64
                        $('#facilities64').change(function(){

                    if($('#facilities64').prop("checked") == true)
                    {

                         var facilities6=$('#facilities64').val();
                         var arr = facilities6.split('@');
                            
                         $('.faciamount6').html(arr[1]);
                         $('.faciamount6').val(arr[1]);
                          $('.facilities6').val(arr[0]);
                          $('.facihour6').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount6').html('');
                          $('.faciamount6').val('');
                           $('.facilities6').val('');
                           $('.facihour6').val('');
                           var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });



//65
                        $('#facilities65').change(function(){

                    if($('#facilities65').prop("checked") == true)
                    {

                         var facilities6=$('#facilities65').val();
                         var arr = facilities6.split('@');
                            
                         $('.faciamount6').html(arr[1]);
                         $('.faciamount6').val(arr[1]);
                          $('.facilities6').val(arr[0]);
                          $('.facihour6').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount6').html('');
                          $('.faciamount6').val('');
                           $('.facilities6').val('');
                           $('.facihour6').val('');
                           var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });


//70

                    $('#facilities70').change(function(){


                         $('.faciamount7').html('');
                         $('.faciamount7').val('');
                         $('.facilities7').val('');
                         $('.facihour7').val('');
                          var sub_tot=0;
                         $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                         var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);

          
                   });


//71
                         $('#facilities71').change(function(){

                    if($('#facilities71').prop("checked") == true)
                    {

                         var facilities7=$('#facilities71').val();
                         var arr = facilities7.split('@');
                            
                         $('.faciamount7').html(arr[1]);
                         $('.faciamount7').val(arr[1]);
                          $('.facilities7').val(arr[0]);
                          $('.facihour7').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount7').html('');
                         $('.faciamount7').val('');
                          $('.facilities7').val('');
                          $('.facihour7').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);

                    }

          
                   });


//72
                         $('#facilities72').change(function(){

                    if($('#facilities72').prop("checked") == true)
                    {

                         var facilities7=$('#facilities72').val();
                         var arr = facilities7.split('@');
                            
                         $('.faciamount7').html(arr[1]);
                         $('.faciamount7').val(arr[1]);
                          $('.facilities7').val(arr[0]);
                          $('.facihour7').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount7').html('');
                         $('.faciamount7').val('');
                          $('.facilities7').val('');
                          $('.facihour7').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);

                    }

          
                   });

//73
                         $('#facilities73').change(function(){

                    if($('#facilities73').prop("checked") == true)
                    {

                         var facilities7=$('#facilities73').val();
                         var arr = facilities7.split('@');
                            
                         $('.faciamount7').html(arr[1]);
                         $('.faciamount7').val(arr[1]);
                          $('.facilities7').val(arr[0]);
                          $('.facihour7').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount7').html('');
                         $('.faciamount7').val('');
                          $('.facilities7').val('');
                          $('.facihour7').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);

                    }

          
                   });

//74
                         $('#facilities74').change(function(){

                    if($('#facilities74').prop("checked") == true)
                    {

                         var facilities7=$('#facilities74').val();
                         var arr = facilities7.split('@');
                            
                         $('.faciamount7').html(arr[1]);
                         $('.faciamount7').val(arr[1]);
                          $('.facilities7').val(arr[0]);
                          $('.facihour7').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount7').html('');
                         $('.faciamount7').val('');
                          $('.facilities7').val('');
                          $('.facihour7').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);

                    }

          
                   });

//75
                         $('#facilities75').change(function(){

                    if($('#facilities75').prop("checked") == true)
                    {

                         var facilities7=$('#facilities75').val();
                         var arr = facilities7.split('@');
                            
                         $('.faciamount7').html(arr[1]);
                         $('.faciamount7').val(arr[1]);
                          $('.facilities7').val(arr[0]);
                          $('.facihour7').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount7').html('');
                         $('.faciamount7').val('');
                          $('.facilities7').val('');
                          $('.facihour7').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);

                    }

          
                   });




//80
                $('#facilities80').change(function(){

                    
                        $('.faciamount8').html('');
                         $('.faciamount8').val('');
                          $('.facilities8').val('');
                          $('.facihour8').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                  

          
                   });


//81
                          $('#facilities81').change(function(){

                    if($('#facilities81').prop("checked") == true)
                    {

                         var facilities8=$('#facilities81').val();
                         var arr = facilities8.split('@');
                            
                         $('.faciamount8').html(arr[1]);
                         $('.faciamount8').val(arr[1]);
                          $('.facilities8').val(arr[0]);
                          $('.facihour8').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);


                       

                    }
                    else
                    {
                         $('.faciamount8').html('');
                         $('.faciamount8').val('');
                          $('.facilities8').val('');
                          $('.facihour8').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });


//82
                          $('#facilities82').change(function(){

                    if($('#facilities82').prop("checked") == true)
                    {

                         var facilities8=$('#facilities82').val();
                         var arr = facilities8.split('@');
                            
                         $('.faciamount8').html(arr[1]);
                         $('.faciamount8').val(arr[1]);
                          $('.facilities8').val(arr[0]);
                           $('.facihour8').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);


                       

                    }
                    else
                    {
                         $('.faciamount8').html('');
                         $('.faciamount8').val('');
                          $('.facilities8').val('');
                           $('.facihour8').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });


//83
                          $('#facilities83').change(function(){

                    if($('#facilities83').prop("checked") == true)
                    {

                         var facilities8=$('#facilities83').val();
                         var arr = facilities8.split('@');
                            
                         $('.faciamount8').html(arr[1]);
                         $('.faciamount8').val(arr[1]);
                          $('.facilities8').val(arr[0]);
                           $('.facihour8').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);


                       

                    }
                    else
                    {
                         $('.faciamount8').html('');
                         $('.faciamount8').val('');
                          $('.facilities8').val('');
                           $('.facihour8').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });


//84
                          $('#facilities84').change(function(){

                    if($('#facilities84').prop("checked") == true)
                    {

                         var facilities8=$('#facilities84').val();
                         var arr = facilities8.split('@');
                            
                         $('.faciamount8').html(arr[1]);
                         $('.faciamount8').val(arr[1]);
                          $('.facilities8').val(arr[0]);
                           $('.facihour8').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);


                       

                    }
                    else
                    {
                         $('.faciamount8').html('');
                         $('.faciamount8').val('');
                          $('.facilities8').val('');
                           $('.facihour8').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });


//85
                          $('#facilities85').change(function(){

                    if($('#facilities85').prop("checked") == true)
                    {

                         var facilities8=$('#facilities85').val();
                         var arr = facilities8.split('@');
                            
                         $('.faciamount8').html(arr[1]);
                         $('.faciamount8').val(arr[1]);
                          $('.facilities8').val(arr[0]);
                           $('.facihour8').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                    var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);


                       

                    }
                    else
                    {
                         $('.faciamount8').html('');
                         $('.faciamount8').val('');
                          $('.facilities8').val('');
                           $('.facihour8').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });



//90
                           $('#facilities90').change(function(){

                    
                    
                         $('.faciamount9').html('');
                         $('.faciamount9').val('');
                         $('.facilities9').val('');
                          $('.facihour9').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                   

          
                   });




//91
                           $('#facilities91').change(function(){

                    if($('#facilities91').prop("checked") == true)
                    {

                         var facilities9=$('#facilities91').val();
                         var arr = facilities9.split('@');
                            
                         $('.faciamount9').html(arr[1]);
                         $('.faciamount9').val(arr[1]);
                          $('.facilities9').val(arr[0]);
                           $('.facihour9').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount9').html('');
                         $('.faciamount9').val('');
                         $('.facilities9').val('');
                          $('.facihour9').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });


//92
                           $('#facilities92').change(function(){

                    if($('#facilities92').prop("checked") == true)
                    {

                         var facilities9=$('#facilities92').val();
                         var arr = facilities9.split('@');
                            
                         $('.faciamount9').html(arr[1]);
                         $('.faciamount9').val(arr[1]);
                          $('.facilities9').val(arr[0]);
                          $('.facihour9').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount9').html('');
                         $('.faciamount9').val('');
                         $('.facilities9').val('');
                         $('.facihour9').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });


//93
                           $('#facilities93').change(function(){

                    if($('#facilities93').prop("checked") == true)
                    {

                         var facilities9=$('#facilities93').val();
                         var arr = facilities9.split('@');
                            
                         $('.faciamount9').html(arr[1]);
                         $('.faciamount9').val(arr[1]);
                          $('.facilities9').val(arr[0]);
                          $('.facihour9').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount9').html('');
                         $('.faciamount9').val('');
                         $('.facilities9').val('');
                         $('.facihour9').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });


//94
                           $('#facilities94').change(function(){

                    if($('#facilities94').prop("checked") == true)
                    {

                         var facilities9=$('#facilities94').val();
                         var arr = facilities9.split('@');
                            
                         $('.faciamount9').html(arr[1]);
                         $('.faciamount9').val(arr[1]);
                          $('.facilities9').val(arr[0]);
                          $('.facihour9').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount9').html('');
                         $('.faciamount9').val('');
                         $('.facilities9').val('');
                         $('.facihour9').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });


//95
                           $('#facilities95').change(function(){

                    if($('#facilities95').prop("checked") == true)
                    {

                         var facilities9=$('#facilities95').val();
                         var arr = facilities9.split('@');
                            
                         $('.faciamount9').html(arr[1]);
                         $('.faciamount9').val(arr[1]);
                          $('.facilities9').val(arr[0]);
                          $('.facihour9').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount9').html('');
                         $('.faciamount9').val('');
                         $('.facilities9').val('');
                         $('.facihour9').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });





//100



               
                           $('#facilities100').change(function(){

                    
                    
                         $('.faciamount10').html('');
                         $('.faciamount10').val('');
                         $('.facilities10').val('');
                          $('.facihour10').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                   

          
                   });




//101
                           $('#facilities101').change(function(){

                    if($('#facilities101').prop("checked") == true)
                    {

                         var facilities10=$('#facilities101').val();
                         var arr = facilities10.split('@');
                         var totta=parseFloat(arr[1])*parseFloat(arr[3]);
                         var ttta=totta.toFixed(2);  
                            
                         $('.faciamount10').html(ttta);
                         $('.faciamount10').val(ttta);
                         $('.facilities10').val(arr[0]);
                         $('.facihour10').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount10').html('');
                         $('.faciamount10').val('');
                         $('.facilities10').val('');
                          $('.facihour10').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });


//102
                           $('#facilities102').change(function(){

                    if($('#facilities102').prop("checked") == true)
                    {

                         var facilities10=$('#facilities102').val();
                         var arr = facilities10.split('@');
                         var totta=parseFloat(arr[1])*parseFloat(arr[3]);
                         var ttta=totta.toFixed(2);  
                            
                         $('.faciamount10').html(ttta);
                         $('.faciamount10').val(ttta);
                         $('.facilities10').val(arr[0]);
                         $('.facihour10').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount10').html('');
                         $('.faciamount10').val('');
                         $('.facilities10').val('');
                          $('.facihour10').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });


//103
                           $('#facilities103').change(function(){

                    if($('#facilities103').prop("checked") == true)
                    {

                         var facilities10=$('#facilities103').val();
                         var arr = facilities10.split('@');
                         var totta=parseFloat(arr[1])*parseFloat(arr[3]);
                         var ttta=totta.toFixed(2);  
                            
                         $('.faciamount10').html(ttta);
                         $('.faciamount10').val(ttta);
                         $('.facilities10').val(arr[0]);
                         $('.facihour10').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount10').html('');
                         $('.faciamount10').val('');
                         $('.facilities10').val('');
                          $('.facihour10').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });


//104
                           $('#facilities104').change(function(){

                    if($('#facilities104').prop("checked") == true)
                    {

                         var facilities10=$('#facilities104').val();
                         var arr = facilities10.split('@');
                         var totta=parseFloat(arr[1])*parseFloat(arr[3]);
                         var ttta=totta.toFixed(2);  
                            
                         $('.faciamount10').html(ttta);
                         $('.faciamount10').val(ttta);
                         $('.facilities10').val(arr[0]);
                         $('.facihour10').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount10').html('');
                         $('.faciamount10').val('');
                         $('.facilities10').val('');
                          $('.facihour10').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });

//105
                           $('#facilities105').change(function(){

                    if($('#facilities105').prop("checked") == true)
                    {

                         var facilities10=$('#facilities105').val();
                         var arr = facilities10.split('@');
                         var totta=parseFloat(arr[1])*parseFloat(arr[3]);
                         var ttta=totta.toFixed(2);  
                            
                         $('.faciamount10').html(ttta);
                         $('.faciamount10').val(ttta);
                         $('.facilities10').val(arr[0]);
                         $('.facihour10').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount10').html('');
                         $('.faciamount10').val('');
                         $('.facilities10').val('');
                          $('.facihour10').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });


//110
                           $('#facilities110').change(function(){

                    
                    
                         $('.faciamount11').html('');
                         $('.faciamount11').val('');
                         $('.facilities11').val('');
                          $('.facihour11').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                   

          
                   });




//111
                           $('#facilities111').change(function(){

                    if($('#facilities111').prop("checked") == true)
                    {

                         var facilities9=$('#facilities111').val();
                         var arr = facilities9.split('@');
                            
                         $('.faciamount11').html(arr[1]);
                         $('.faciamount11').val(arr[1]);
                          $('.facilities11').val(arr[0]);
                           $('.facihour11').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount11').html('');
                         $('.faciamount11').val('');
                         $('.facilities11').val('');
                          $('.facihour11').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });


//112
                           $('#facilities112').change(function(){

                    if($('#facilities112').prop("checked") == true)
                    {

                         var facilities9=$('#facilities112').val();
                         var arr = facilities9.split('@');
                            
                         $('.faciamount11').html(arr[1]);
                         $('.faciamount11').val(arr[1]);
                          $('.facilities11').val(arr[0]);
                           $('.facihour11').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount11').html('');
                         $('.faciamount11').val('');
                         $('.facilities11').val('');
                          $('.facihour11').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });


//113
                           $('#facilities113').change(function(){

                    if($('#facilities113').prop("checked") == true)
                    {

                         var facilities9=$('#facilities113').val();
                         var arr = facilities9.split('@');
                            
                         $('.faciamount11').html(arr[1]);
                         $('.faciamount11').val(arr[1]);
                          $('.facilities11').val(arr[0]);
                           $('.facihour11').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount11').html('');
                         $('.faciamount11').val('');
                         $('.facilities11').val('');
                          $('.facihour11').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });


//114
                           $('#facilities114').change(function(){

                    if($('#facilities114').prop("checked") == true)
                    {

                         var facilities9=$('#facilities114').val();
                         var arr = facilities9.split('@');
                            
                         $('.faciamount11').html(arr[1]);
                         $('.faciamount11').val(arr[1]);
                          $('.facilities11').val(arr[0]);
                           $('.facihour11').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount11').html('');
                         $('.faciamount11').val('');
                         $('.facilities11').val('');
                          $('.facihour11').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });


//115
                           $('#facilities115').change(function(){

                    if($('#facilities115').prop("checked") == true)
                    {

                         var facilities9=$('#facilities115').val();
                         var arr = facilities9.split('@');
                            
                         $('.faciamount11').html(arr[1]);
                         $('.faciamount11').val(arr[1]);
                          $('.facilities11').val(arr[0]);
                           $('.facihour11').val(arr[2]);
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                       

                    }
                    else
                    {
                         $('.faciamount11').html('');
                         $('.faciamount11').val('');
                         $('.facilities11').val('');
                          $('.facihour11').val('');
                          var sub_tot=0;
                  $('input[name^="facilitiesamounts"]').each(function(){
                           sub_tot +=Number($(this).val());          
                          var finas=sub_tot.toFixed(2);  
                          var total=$('#total').val(); 
                          var finaa=parseFloat(total)+parseFloat(finas); 
                           var fina=finaa.toFixed(2);         
                          $('.grandtotal').val(fina);
                          $('.grandtotal').html(fina); 
                                                                                 
                          });

                        var grandtotal=$('.grandtotal').val(); 

                        var totalamounts=parseFloat(grandtotal)+parseFloat('20');
                        var totalamount=totalamounts.toFixed(2);
                         $('.totalamount').html(totalamount);
                        $('.totalamount').val(totalamount);
                    }

          
                   });








           });

        }
         
        });


  $('#reset').click(function(){

  $('#checkavailability').show('slow');
  $('.dataslist').hide('slow');
    });


    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#checkavailability").click(function(){
//date----------
            var checkin=$('#checkindate').val();
            var checkout=$('#checkoutdate').val();
            var halltype=$('#halltype').val();
            var slot=$('#slot').val();
           
           
            $('.slots').html(slot);
          

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
         $(".checkindate").html(c+" "+b+" "+d+" "+a);

         //checkout------ 


        var a2 = new Date(checkoutdate);

        var dayss = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
           var as =dayss[a2.getDay()]; 

        var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
           var bs =months[a2.getMonth()];

         var cs=a2.getDate();
         var ds=a2.getFullYear();  
         $(".checkoutdate").html(cs+" "+bs+" "+ds+" "+as);

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
            $('.noofdays').html(diffDays+1); 
            $('.numberofdays').val(diffDays+1); 
        }

         //halltype-------------------------
        
       
        

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
            }
            else
            {
                $('.nubemeb').hide('slow');
            }

        });

    });
</script>
<script type="text/javascript">
$(document).ready(function(){


    $('#auditorium').change(function(){
        var auditorium=$('#auditorium').val();

        $('#load').show('slow');     
         $('#load').html('<img src="image/load.png">');
         $('.halltypes').hide('slow');
         $.post('hall_typecheck.php',{'auditorium':auditorium},function (data){
            $('#load').hide('slow'); 
             $('.halltypes').show('slow');    
            $('.halltypes').html(data);

        });



    });



    // $('.halltypes').change(function(){
    //     var halltype=$('#halltype').val();
    //     var auditorium=$('#auditorium').val();
    //    $.post('hall_check.php',{'halltype':halltype,'auditorium':auditorium},function (data){

    //         $('.dddd').html(data);

    //     });

    // });

    // $('#halltype').change(function(){
    //     var halltype=$('#halltype').val();
    //     var auditorium=$('#auditorium').val();
    //    $.post('hall_check.php',{'halltype':halltype,'auditorium':auditorium},function (data){

    //         $('.dddd').html(data);

    //     });

    // });
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



<script type="text/javascript">
    $(document).ready(function(){
        $('#slot').change(function(){

            var slot=$('#slot').val();
           

               if(slot=='Slot I')
                {
                  $('.slottime').html('08:00 AM - 12:00 PM');
                }
                else if(slot=='Slot II')
                {
                  $('.slottime').html('2:00 PM - 06:00 PM');
                }
                else if(slot=='Slot III')
                {
                  $('.slottime').html('07:00 PM - 11:00 PM');
                }
                else if(slot=='Slot I & II')
                {
                  $('.slottime').html('08:00 AM - 12:00 PM<br>2:00 PM - 06:00 PM');
                }
                else if(slot=='Slot I & III')
                {
                  $('.slottime').html('08:00 AM - 12:00 PM<br>07:00 PM - 11:00 PM');
                }
                else if(slot=='Slot II & III')
                {
                 $('.slottime').html('2:00 PM - 06:00 PM<br>07:00 PM - 11:00 PM');
                }
                else if(slot=='Slot I & Slot II & III')
                {
                  $('.slottime').html('08:00 AM - 12:00 PM<br>2:00 PM - 06:00 PM<br>07:00 PM - 11:00 PM');
                }
                else
                {
                  $('.slottime').html('');

                }
        });

    });
    </script>


<script type="text/javascript">

onload=function(){
$('#checkindate').val('');
$('#checkoutdate').val('');
$('#auditorium').val('');
$('#halltype').val('');
$('#slot').val('');
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
$('#conditions').val('');

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