 <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li><a href="#">Booking Reports</a></li>
                    <li class="active">Booking Reports</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Booking Reports</h2>
                </div>
                <!-- END PAGE TITLE --> 

                 <?php $msg = $this->session->flashdata('msg'); if((isset($msg)) && (!empty($msg))) { ?>

                     <div class="col-md-6">
                    <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <?php print_r($msg); ?>
                      </div>
                      </div>
                       <?php } ?>

                      <?php $msg = $this->session->flashdata('msg1'); if((isset($msg)) && (!empty($msg))) { ?>    
                       
                      <div class="col-md-6">          
                     <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                <?php print_r($msg); ?>
                            </div>
                        </div>    
                          <?php } ?>              

                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                
                    <div class="row">
                        <div class="col-md-12">

                            <!-- START DEFAULT DATATABLE -->
<div class="panel panel-default">
    <div class="panel-heading">                                
                                       
    </div>

    <div class="panel-body my-table table-responsive">
        <table class="table datatable ">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>PNR No</th>
                     <th>Date</th>
                    <th>C-In</th>
                    <th>C-Out</th>
                    <th>Name</th>
                    <th>Room Type</th>
                    <th>No of Rooms</th>
                    <th>Booking Type</th>
                    <th>Payment </th>
                    
                    <th>Nube Member</th>
                     <th>Using Promocode</th>
                     <th>Manage</th>
                    
                   
                </tr>
            </thead>
            <tbody>
            <?php 
            $i=1;
            foreach ($rep as $a) {
               ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $a['pnr_number'];?></td>
                        <td><?php echo date('d/m/Y',strtotime(str_replace('-','/', $a['date'])));?></td>
                    <td><?php echo date('d/m/Y',strtotime(str_replace('-','/', $a['checkin'])));?></td>
                    <td><?php echo date('d/m/Y',strtotime(str_replace('-','/', $a['checkout'])));?></td>
                    <td><?php echo $a['firstname'];?></td>
                   <td><?php echo $a['roomtype'];?></td>
                    <td><?php echo $a['room_no'];?></td>
                     <td><?php echo $a['bookingtype'];?><br><?php if( $a['bookingtype']=='Online Booking'){ if($a['ad_status']=='0'){echo '<span style="color:red; font-weight:bold;">(Not Paid)</span>';}else{echo '<span style="color:green; font-weight:bold;">(Paid)</span>';}}?></td>
                      <td><?php echo $a['onlinepayment'];?></td>
                     
                        <td><?php  if($a['nubememberid']=='')
                        { echo 'No'; } else { echo 'Yes'; }?></td>
                        <td><?php  if($a['promocode']=='')
                        { echo 'No'; } else { echo 'Yes'; }?></td>
                   <td>
                   <div class="btn-group dropdown">
                    
                    <button type="button" class="btn btn-default waves-light dropdown-toggle waves-effect" data-toggle="dropdown" aria-expanded="false">Manage &nbsp;<i class="caret"></i></button>
                    <ul class="dropdown-menu" role="menu">
                        <li> <a href="<?php echo base_url();?>reports/viewdetails/<?php echo $a['id'];?>">View</a></li>
                        <li><a data-toggle="modal" href="#movetopaid<?php echo $a['id'];?>">Move To Paid</a></li>
                        <li><a data-toggle="modal" href="#movetoreject<?php echo $a['id'];?>">Move To Reject</a></li>
                      
                    </ul>
                </div>

                   
                       </td>
                 
                    
                </tr>
                <?php }?>
                
            </tbody>
        </table>
    </div>
</div>
                            <!-- END DEFAULT DATATABLE -->

    <?php 
            
            foreach ($rep as $b) :
               ?>
                                <!-- BEGIN # MODAL LOGIN -->
<div class="modal fade" id="movetopaid<?php echo $b['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" align="center">
                    <img class="" id="img_logo" src="<?php echo base_url();?>assests/img/logo.png">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                      
                   
                    <form id="register-form" method="post" action="<?php echo base_url();?>reports/confirmstatus" >
                        <div class="modal-body">
                         <h2><p>Are you sure to Confirmed the Booking?</p></h2>
                            
                           
                            <input id="register_email" class="form-control" type="hidden" name="id" value="<?php echo $b['id'];?>" >
                            <div class="col-md-6">
                            <div class="form-group">
                            <label>Transcation Id</label>
                              <input id="transcationid" required="" class="form-control" required type="text" name="transcationid" value="" placeholder="Transcation Id" >
                            </div>

                            </div>
                            <div class="clearfix"></div>

                            
                           
                        </div>
                        
                        <div class="modal-footer">
                         <div class="col-md-6">
                                <button type="button" class="btn btn-danger btn-lg btn-block" data-dismiss="modal" aria-label="Close">No</button>
                            </div>
                         <div class="col-md-6">
                                <button type="submit" class="btn btn-success btn-lg btn-block">Yes</button>
                            </div>

                                                        
                        </div>
                    </form>
                    <!-- End | Register Form -->
                    
                </div>
                <!-- End # DIV Form -->
                
            </div>
        </div>
    </div>

<?php endforeach;?>
    <!-- END # MODAL LOGIN -->


<!-- cancellation -->
<?php 
            
            foreach ($rep as $d) :
               ?>
                                <!-- BEGIN # MODAL LOGIN -->
<div class="modal fade" id="movetoreject<?php echo $d['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" align="center">
                    <img class="" id="img_logo" src="<?php echo base_url();?>assests/img/logo.png">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                      
                   
                    <form id="register-form" method="post" action="<?php echo base_url();?>reports/cancelbooking" >
                        <div class="modal-body">
                         <h2><p>Are you sure to Reject the Booking ?</p></h2>
                            
                           
                            <input id="register_email" class="form-control" type="hidden" name="id" value="<?php echo $d['id'];?>" >

                           
                           
                        </div>
                        
                        <div class="modal-footer">
                         <div class="col-md-6">
                                <button type="button" class="btn btn-danger btn-lg btn-block" data-dismiss="modal" aria-label="Close">No</button>
                            </div>
                         <div class="col-md-6">
                                <button type="submit" class="btn btn-success btn-lg btn-block">Yes</button>
                            </div>

                                                        
                        </div>
                    </form>
                    <!-- End | Register Form -->
                    
                </div>
                <!-- End # DIV Form -->
                
            </div>
        </div>
    </div>

<?php endforeach;?>




<?php 
            
            foreach ($rep as $c) :
               ?>
    <div class="modal fade" id="View<?php echo $c['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" align="center">
                   
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                      <h2 style="text-align: center;">Booking Details</h2>
                </div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                        <div class="modal-body" style="margin-top: -21px;">
                        

                            <div class="col-md-3">
                            <label>Check IN :</label>
                            </div>

                            <div class="col-md-3">
                             <label><?php echo $c['checkin'];?></label>
                            </div>

                            <div class="col-md-3">
                            <label>Check Out :</label>
                            </div>

                            <div class="col-md-3">
                             <label><?php echo $c['checkout'];?></label>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-6">
                            <label>PNR Number</label>
                            </div>
                             <div class="col-md-6">
                             <label><?php echo $c['pnr_number'];?></label>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-6">
                            <label>Room Type</label>
                            </div>
                             <div class="col-md-6">
                             <label><?php echo $c['roomtype'];?></label>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-6">
                            <label>Number Of Rooms</label>
                            </div>
                             <div class="col-md-6">
                             <label><?php echo $c['room_no'];?></label>
                            </div>
                            <div class="clearfix"></div>
                                                         
                            
                             <div class="col-md-6">
                             <label>Name</label>
                            </div>
                            <div class="col-md-6">
                             <label><?php echo $c['firstname'];?> <?php echo $c['lastname'];?></label>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-6">
                            <label>Email</label>
                            </div>
                             <div class="col-md-6">
                             <label><?php echo $c['email'];?></label>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-6">
                            <label>Mobile No</label>
                            </div>
                             <div class="col-md-6">
                             <label><?php echo $c['mobile'];?></label>
                            </div>
                            <div class="clearfix"></div>

                              <div class="col-md-6">
                            <label>Address</label>
                            </div>
                             <div class="col-md-6">
                             <label><?php echo $c['address'];?></label>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-6">
                            <label>Number Of Adults</label>
                            </div>
                             <div class="col-md-6">
                             <label><?php echo $c['adults'];?></label>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-6">
                            <label>Number Of Children</label>
                            </div>
                             <div class="col-md-6">
                             <label><?php echo $c['children'];?></label>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-6">
                            <label>Extra Bed</label>
                            </div>
                             <div class="col-md-6">
                            <label><?php echo $c['extra_bed'];?></label>
                                                        </div>
                            <div class="clearfix"></div>

                            <?php 
                            if($c['nubememberid']=='')
                            {

                            }
                            else
                            {
                                $mem=$this->db->where('memberid',$c['nubememberid'])->get('memberid_list')->result_array();
                                foreach ($mem as $memb) {
                                   

                                ?>
                         <h4 style="text-align: center;">Member Details</h4>
                         <div class="col-md-6">
                             <label>Member Id</label>
                            </div>
                            <div class="col-md-6">
                             <label><?php echo $memb['memberid'];?> </label>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-6">
                             <label>Name</label>
                            </div>
                            <div class="col-md-6">
                             <label><?php echo $memb['name'];?> </label>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-6">
                             <label>Mobile No</label>
                            </div>
                            <div class="col-md-6">
                             <label><?php echo $memb['mobileno'];?> </label>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-6">
                             <label>Address</label>
                            </div>
                            <div class="col-md-6">
                             <label><?php echo $memb['address'];?> </label>
                            </div>
                            <div class="clearfix"></div>
                            <?php
                             }
                            }
                            ?>

                        </div>
                        
                    
                    <!-- End | Register Form -->
                    
                </div>
                <!-- End # DIV Form -->
                
            </div>
        </div>
    </div>
<?php endforeach;?>

    <style type="text/css">
       
@import url(http://fonts.googleapis.com/css?family=Roboto);

* {
    font-family: 'Roboto', sans-serif;
}

#login-modal .modal-dialog {
    width: 350px;
}

#login-modal input[type=text], input[type=password] {
    margin-top: 10px;
}

#div-login-msg,
#div-lost-msg,
#div-register-msg {
    border: 1px solid #dadfe1;
    height: 30px;
    line-height: 28px;
    transition: all ease-in-out 500ms;
}

#div-login-msg.success,
#div-lost-msg.success,
#div-register-msg.success {
    border: 1px solid #68c3a3;
    background-color: #c8f7c5;
}

#div-login-msg.error,
#div-lost-msg.error,
#div-register-msg.error {
    border: 1px solid #eb575b;
    background-color: #ffcad1;
}

#icon-login-msg,
#icon-lost-msg,
#icon-register-msg {
    width: 30px;
    float: left;
    line-height: 28px;
    text-align: center;
    background-color: #dadfe1;
    margin-right: 5px;
    transition: all ease-in-out 500ms;
}

#icon-login-msg.success,
#icon-lost-msg.success,
#icon-register-msg.success {
    background-color: #68c3a3 !important;
}

#icon-login-msg.error,
#icon-lost-msg.error,
#icon-register-msg.error {
    background-color: #eb575b !important;
}

#img_logo {
    max-height: 100px;
    max-width: 100px;
}

/* #########################################
   #    override the bootstrap configs     #
   ######################################### */

.modal-backdrop.in {
    filter: alpha(opacity=50);
    opacity: .8;
}



.modal-header {
    min-height: 16.43px;
    padding: 15px 15px 15px 15px;
    border-bottom: 0px;
}

.modal-body {
    position: relative;
    padding: 5px 15px 5px 15px;
}

.modal-footer {
    padding: 15px 15px 15px 15px;
    text-align: left;
    border-top: 0px;
}

.checkbox {
    margin-bottom: 0px;
}

.btn {
    border-radius: 0px;
}

.btn:focus,
.btn:active:focus,
.btn.active:focus,
.btn.focus,
.btn:active.focus,
.btn.active.focus {
    outline: none;
}

.btn-lg, .btn-group-lg>.btn {
    border-radius: 0px;
}

.btn-link {
    padding: 5px 10px 0px 0px;
    color: #95a5a6;
}

.btn-link:hover, .btn-link:focus {
    color: #2c3e50;
    text-decoration: none;
}

.glyphicon {
    top: 0px;
}

.form-control {
  border-radius: 0px;
}

    </style>

    


 <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/bootstrap/bootstrap.min.js"></script>

<script>
$('#unpaidbooking_report').addClass('active');
$( "#room_book" ).removeClass( "xn-openable" ).addClass( "xn-openable active" );

</script>


