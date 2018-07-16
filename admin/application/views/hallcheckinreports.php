 <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li><a href="#">Check In Reports</a></li>
                    <li class="active">Check In Reports</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Check In Reports</h2>
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
                    <th>RN</th>
                    <th>C-In</th>
                    <th>Hall Type</th>
                    <th>Slot</th>
                    <th>Name</th>
                    <th>Mobile No</th>
                    <th>Online Paid Amount</th>
                   
                    
                </tr>
            </thead>
            <tbody>
            <?php 
            $i=1;
            foreach ($checkin as $a) {
               ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $a['pnrnumber'];?></td>
                    <td><?php echo $a['checkindate'];?></td>
                    <td><?php echo $a['halltype'];?></td>
                    <td><?php echo $a['slot'];?></td>
                    <td><?php echo $a['firstname'];?><?php echo $a['lastname'];?></td>
                    <td><?php echo $a['mobileno'];?></td>
                    <td><?php echo $a['advanceamount'];?></td>
                           
                </tr>
                <?php }?>
                
            </tbody>
        </table>
    </div>
</div>
                            <!-- END DEFAULT DATATABLE -->

   <?php 
            
            foreach ($checkin as $c) :
               ?>
    <div class="modal fade" id="View<?php echo $c['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" align="center">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                    <h2 style="text-align: center;">Check In Details</h2>

                </div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                        <div class="modal-body" style="margin-top:-9px;">
                         
                            <div class="col-md-3">
                            <label>Check IN :</label>
                            </div>

                            <div class="col-md-3">
                            <div style="font-weight: bold; font-size: 14px;"><?php echo $c['checkindate'];?></div>
                            </div>

                            <div class="col-md-3">
                            <label>Slot</label>
                            </div>

                            <div class="col-md-3">
                            <div style="font-weight: bold; font-size: 14px;"><?php echo $c['slot'];?></div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="col-md-3">
                            <label>Hall Type :</label>
                            </div>

                            <div class="col-md-9">
                            <div style="font-weight: bold; font-size: 14px;"><?php echo $c['halltype'];?></div>
                            </div>

                             <div class="clearfix"></div>

                            
                            <div style="margin-top:10px;"></div>

                            <div class="col-md-6">
                             <label>PNR NUMBER</label>
                            </div>
                            <div class="col-md-6">
                            <span style="font-weight: bold;"><?php echo $c['pnrnumber'];?></span>
                            </div>
                            <div class="clearfix"></div>

                             <div class="col-md-6">
                             <label>Name</label>
                            </div>
                            <div class="col-md-6">
                           <span style="font-weight: bold;"><?php echo $c['firstname'];?><?php echo $c['lastname'];?></span>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-6">
                            <label>Email</label>
                            </div>
                             <div class="col-md-6">
                            <span style="font-weight: bold;"><?php echo $c['email'];?></span>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-6">
                            <label>Mobile No</label>
                            </div>
                             <div class="col-md-6">
                            <span style="font-weight: bold;"><?php echo $c['mobileno'];?></span>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-md-3">
                             </div>
                                 <div class="col-md-6 text-center">
                               <label style="font-weight: bold; font-size: 17px; "> Payment Tariff</label>
                             </div>
                             <div class="col-md-3">
                             </div>
                            <div class="clearfix"></div>
                                                                             
                             <div class="col-md-12" style="font-weight: bold;">


           <table>
           <tbody>
           <tr>
           <tr>
           <th style="width:50%;">Facilities</th>
           <th>Rate</th>
           <?php 
           $features=explode(',',$c['features']);
           $rate=explode(',',$c['rate']);
           $count=count($rate);
           for ($i=0; $i <$count ; $i++) { 
             
           ?>
           </tr>
            <td style="width: 564px; padding: 0px 10px ! important;">
                <span style="font-weight: bold;"><?php echo $features[$i];?></span>
           </td>
          <td style="width: 130px; padding: 0px 10px ! important;">
           <span style="font-weight: bold;"><?php echo $rate[$i];?></span>
         </td>
        
       
                               
       
         </tr>
         <?php } ?>
         </tbody>
        

         </table>
         <div  class="col-md-6" style="text-align: right; margin-top: 10px;">
         Total Facilities Amount
        </div>
        <div  class="col-md-3" style="margin-top: 10px;">
         <div class="amount"><?php echo $c['amount'];?></div>
         
        </div>
        <div class="clearfix"></div> 

        <div  class="col-md-6" style="text-align: right;">
        Hall Amount
        </div>
        <div  class="col-md-3">
         <div class="hallamount"><?php echo $c['hallamount'];?></div>
        
        </div>
        <div class="clearfix"></div> 

        <div  class="col-md-6" style="text-align: right;">
        Total Amount
        </div>
        <div  class="col-md-3">
         <div class="totalamount"><?php echo $c['totalamount'];?></div>
        
        </div>
        <div class="clearfix"></div>


        <div  class="col-md-6" style="text-align: right;">
        Online Paid Amount
        </div>
        <div  class="col-md-3">
        <div class="totalamount"><?php echo $c['advanceamount'];?></div>
        </div>
        <div class="clearfix"></div>
        <div  class="col-md-6" style="text-align: right;">
        Balance Amount
        </div>
        <div  class="col-md-3">
        <div class="balanceamount"><?php echo $c['balanceamount'];?></div>
         
        </div>
        <div class="clearfix"></div>
        <div  class="col-md-6" style="text-align: right;">
        Excess Amount
        </div>
        <div  class="col-md-3">
        <div class="excessamount"><?php echo $c['excessamount'];?></div>
          
        </div>
        <div class="clearfix"></div>
       

      

    </div> 
                            <div class="clearfix"></div> 
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
$('#hallcheckinreports').addClass('active');
$( "#hall_books" ).removeClass( "xn-openable" ).addClass( "xn-openable active" );

</script>


