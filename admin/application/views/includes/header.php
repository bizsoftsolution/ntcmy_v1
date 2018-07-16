<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>Nube</title>            
             
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url();?>assests/css/theme-default.css"/>
        <link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>assests/datepicker/datepicker.css"/>
        <!--  <link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>assests/timepicker/timepicki.css"/> -->

        <link rel="stylesheet" type="text/css" id="theme" href="http://www.javascriptkit.com/script/script2/css3clock.css"/>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container page-navigation-top-fixed">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="<?php echo base_url();?>dashboard">Nube</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    
                   
                    <li id="dashboard">
                        <a href="<?php echo base_url();?>dashboard"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                       
                    </li> 

                    <li id="room_book" class="xn-openable">
                        <a href="#"><span class="fa fa-sitemap"></span> <span class="xn-text">Room Book</span></a>
                        <ul>                            
                             <li id="booking_room"><a href="<?php echo base_url();?>roomsearch"><span class="fa fa-list-ul"></span>Booking Room</a></li>

                             <li id="booking_report"><a href="<?php echo base_url();?>reports"><span class="fa fa-list-ul"></span> Booking Report</a></li>

                               <li id="unpaidbooking_report"><a href="<?php echo base_url();?>reports/unpaidreports"><span class="fa fa-list-ul"></span>Un Paid Booking Report</a></li>

                               <li id="rejectbooking_report"><a href="<?php echo base_url();?>reports/rejectedreports"><span class="fa fa-list-ul"></span>Rejected Booking Report</a></li>

                             <li id="booking_cancel_report"><a href="<?php echo base_url();?>reports/cancelbookingreports"><span class="fa fa-list-ul"></span> Booking Cancel Report</a></li>

                            <li id="check_in"><a href="<?php echo base_url();?>bookingroom/checkin"><span class="fa fa-list-ul"></span>Check-in</a></li>

                            <li id="check_in_reports"><a href="<?php echo base_url();?>checkin"><span class="fa fa-list-ul"></span>Check-in Reports</a></li>


                           <li id="re_schedule"><a href="<?php echo base_url();?>reschedule"><span class="fa fa-list-ul"></span>Re-schedule </a></li>

                          <li id="check_outs"><a href="<?php echo base_url();?>checkout"><span class="fa fa-list-ul"></span>Check-out</a></li>

                         <li id="check_out_reports"><a href="<?php echo base_url();?>checkout/checkoutreports"><span class="fa fa-list-ul"></span>Checkout Reports</a></li>      
                            
                          <li id="total_reports"><a href="<?php echo base_url();?>checkout/totalreports"><span class="fa fa-list-ul"></span>Income Reports</a></li> 

                          <li id="roomdetails"><a href="<?php echo base_url();?>checkout/roomdetails"><span class="fa fa-list-ul"></span>Room Details</a></li>

                          <li id="overall_reports"><a href="<?php echo base_url();?>overallreports"><span class="fa fa-list-ul"></span>Over All Reports</a></li>                                                          
                                       
                                                               
                        </ul>
                    </li>  

                      <li id="hall_books" class="xn-openable">
                        <a href="#"><span class="fa fa-sitemap"></span> <span class="xn-text">Hall Book</span></a>
                        <ul>  

                            <li id="hall_bookings"><a href="<?php echo base_url();?>hallbooking"><span class="fa fa-list-ul"></span>Hall Booking </a></li>

                           <li id="hall_bookings_reports"><a href="<?php echo base_url();?>hallbookingreports"><span class="fa fa-list-ul"></span>Hall Booking Reports </a></li>

                           <li id="hall_cancel_reports"><a href="<?php echo base_url();?>hallbookingreports/cancelbookingreports"><span class="fa fa-list-ul"></span>Hall Cancel Reports </a></li>

<li id="hall_cancel_reports"><a href="<?php echo base_url();?>hallbooking/unpaid_list"><span class="fa fa-list-ul"></span>Hall unpaid List </a></li>

                            <li id="hall_check_in"><a href="<?php echo base_url();?>hall_checkin"><span class="fa fa-list-ul"></span>Hall Check-in </a></li>

                             <li id="hallcheckinreports"><a href="<?php echo base_url();?>hall_checkin/hallcheckinreports"><span class="fa fa-list-ul"></span>Hall Check-in Reports </a></li>

                              <li id="hall_re_schedule"><a href="<?php echo base_url();?>hall_reschedule"><span class="fa fa-list-ul"></span>Hall Re-schedule </a></li> 

                              <li id="hall_check_out"><a href="<?php echo base_url();?>hall_checkout"><span class="fa fa-list-ul"></span>Hall Check-out </a></li>

                              <li id="hall_check_out_reports"><a href="<?php echo base_url();?>hall_checkout/checkoutreports"><span class="fa fa-list-ul"></span>Hall Checkout Reports</a></li>                          
                            
                              <li id="halltotal_reports"><a href="<?php echo base_url();?>hall_checkout/totalreports"><span class="fa fa-list-ul"></span>Hall Income Reports</a></li> 

                              <li id="overall_reports1"><a href="<?php echo base_url();?>overallreports/halloverallreports"><span class="fa fa-list-ul"></span>Over All Reports</a></li>
                                                               
                        </ul>
                    </li>

                     <li id="customeremaildet">
                        <a href="<?php echo base_url();?>emaildetails"><span class="fa fa-desktop"></span> <span class="xn-text">Customer Email Details</span></a>                       
                    </li> 

                                          

                      <li id="settings" class="xn-openable">
                        <a href="#"><span class="fa fa-sitemap"></span> <span class="xn-text">Settings</span></a>
                        <ul>                            
                            <li id="add_roomtyp">
                                <a href="<?php echo base_url();?>addroom_type"><span class="fa fa-list-ul"></span>Add Room & Room Type</a>
                                </li>
                                <li id="upload_nube">
                                <a href="<?php echo base_url();?>add_nubemember"><span class="fa fa-list-ul"></span>Upload Nube Member</a>
                                </li>

                                <li id="member_reports">
                                <a href="<?php echo base_url();?>add_nubemember/reports"><span class="fa fa-list-ul"></span> Nube Member Reports</a>
                                </li>

                                 <li id="add_halltyp">
                                <a href="<?php echo base_url();?>addhall_type"><span class="fa fa-list-ul"></span>Add Hall Type</a>
                                </li>

                                 <li id="add_public">
                                <a href="<?php echo base_url();?>addpublic_holidays"><span class="fa fa-list-ul"></span>Add Public Holidays</a>
                                </li>
                                    
                                  <!--  <li id="add_discupon">
                                <a href="<?php echo base_url();?>add_discountcoupon"><span class="fa fa-list-ul"></span>Add Discount Coupon</a>
                                </li>   -->
                                                               
                        </ul>
                    </li>
                                          
                    
                   
                    
                </ul>
                <!-- END X-NAVIGATION -->
            </div>


           
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
                    
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>                        
                    </li> 
                    <!-- END SIGN OUT -->
                    </ul>
                <!-- END X-NAVIGATION VERTICAL -->   

                







 