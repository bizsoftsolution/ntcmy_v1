 <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li><a href="#">Room Book</a></li>
                    <li class="active">Total Reports</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Total Reports</h2>
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
    <form name="form" id="from1" method="post" action="<?php echo base_url();?>hall_checkout/totalreports">
    <div class="from-group" >
    <label class="control-label col-sm-2"></label>
    <div class="col-sm-2">
      <input type="text" name="fromdate" class="form-control" id="fromdate" placeholder="From date">
    </div>
     <div class="col-sm-2">
      <input type="text" name="todate" class="form-control" id="todate" placeholder="To date">
    </div>
     <div class="col-sm-2">
      <input type="submit" name="submit" class="btn btn-primary" Value="Search">
    </div>
    </div>
<!--     <table  align="cenetr" >
    <tr>
    <td>From Date</td>
    <td>
        <input type="text" name="fromdate" class="form-control" id="fromdate" style="width:50%">
    </td>
    <td>To Date</td>
    <td>
      <input type="text" name="todate" class="form-control" id="todate"style="width:50%" >
    </td>
    <td><input type="submit" name="submit" class="btn btn-primary" value="Search"></td>
    </tr>
    </table> -->
        <table class="table datatable ">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>RN</th>
                    <th>C-In/Time</th>
                    <th>C-Out/Time</th>                   
                    <th>Hall Type</th>
                     <th>Slot</th>
                    <th>Name</th>
                    <th>Total Amount</th>
                    
                   
                    
                </tr>
            </thead>
              
            <tbody>
            <?php 
            $i=1;
            foreach ($out as $a) {
              $total[]= $a['totalamount'];
              $advance[]= $a['advanceamount'];
              if($a['balanceamount']=='Nill')
              {
                $balance[]='0';
              }
              else
              {
                 $balance[]=$a['balanceamount'];
              }
               if($a['returnamount']=='Nill')
              {
                $refund[]='0';
              }
              else
              {
                 $refund[]=$a['returnamount'];
              }
               ?>
                <tr>
                    <td><?php echo $i++;?></td>
                    <td><?php echo $a['pnrnumber'];?></td>
                    <td><?php echo date('d-m-Y',strtotime($a['checkindate']));?></td>                 
                    <td><?php echo date('d-m-Y',strtotime($a['checkoutdate']));?></td>                  
                    <td><?php echo $a['halltype'];?></td>
                    <td><?php echo $a['slot'];?></td>
                    <td><?php echo $a['firstname'];?></td>                    
                    <td><?php echo $a['totalamount'];?></td>
                    
                    
                                        
                </tr>
                <?php }?>
                
            </tbody>
             <tfoot>
               <th></th>
                    <th></th>
                    <th></th>
                    <th></th>                   
                    <th></th>
                    <th></th>
                     <th></th>
                    <th><?php if($out) echo $tot=array_sum($total);?></th>
                    
                   
               </tfoot>

        </table>
    </div>
</div>
                            <!-- END DEFAULT DATATABLE -->

   <?php 
            
            foreach ($out as $c) :
             $pnrnumber=$c['pnrnumber'];
           $data=$this->db->where('pnrnumber',$pnrnumber)->get('bookingroom')->result_array();
           foreach ($data as $dd) 
           {
             $roomtype=$dd['room_type'];
             $roomamount=$dd['roomamount'];
           }

               ?>
    <div class="modal fade" id="View<?php echo $c['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" align="center">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                    <h2 style="text-align: center;">Check Out Details</h2>

                </div>
                
                <!-- Begin # DIV Form -->
                <div id="div-forms">
                
                        <div class="modal-body" style="margin-top:-9px;">
                         
                           <table border="0" width="382">
             
                  <tbody>
                  <tr>
                    <td style="padding: 8px; font-size: 14px;">Room No-<?php echo $c['roomno'];?></span><br><?php echo $roomtype;?></td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;"><?php echo $roomamount;?>X<?php echo $c['noofroom'];?></span></td>
                  </tr >
                    <tr style="border-bottom: 1px solid rgb(225, 225, 225);">
                    <td style="font-size: 14px; padding: 8px 0px 8px 8px;">Sub Total</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;"><?php echo $c['subtotal'];?></td>
                  </tr> 
                  <tr>
                    <td style="font-size: 14px; padding: 0px 0px 8px 8px;">No of Days - <?php echo $c['noofdays'];?></td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;"><?php echo $c['subtotal'];?>X<?php echo $c['noofdays'];?></span></td>
                  </tr> 

                    <tr style="border-bottom: 1px solid rgb(225, 225, 225);">
                    <td style="font-size: 14px; padding: 8px 0px 8px 8px;"> Total</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;"><?php echo $c['total'];?></td>
                  </tr>  


                    <tr>
                    <td style="font-size: 14px; padding: 8px 0px 8px 8px;">Add-on Amount</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;"><?php echo $c['addonamount'];?></td>
                  </tr>  
                   <tr>
                    <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Service Tax @ 14%</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;"><?php echo $c['servicetaxamount'];?></td>
                  </tr> 
                  <tr style="border-bottom: 1px solid rgb(225, 225, 225);">
                    <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Swachh Bharat Cess @ 0.50%</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;"><?php echo $c['bharatcesstaxamount'];?></td>
                  </tr>
                  <tr>
                    <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Total Amount</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;"><?php echo $c['totalamount'];?></td>
                  </tr> 
                  <tr style="border-bottom: 1px solid rgb(225, 225, 225);">
                    <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Online Paid Amount</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;"><?php echo $c['advanceamount'];?></td>
                  </tr> 

                  <tr>
                    <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Balance Amount</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;"><?php echo $c['balanceamount'];?>

                   </td>
                  </tr>

                  

                  <tr>
                    <td style="font-size: 14px; padding: 0px 0px 8px 8px;">Return Amount</td>
                    <td style="padding: 8px 0px 8px; 0px">:</td>
                    <td style="font-size: 14px; font-weight: bold; padding: 8px 0px 8px 40px;"><?php echo $c['returnamount'];?></td>
                  </tr>   



                    


                 </tbody>
              </table>
                            
                      
                             
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
$('#halltotal_reports').addClass('active');
$( "#hall_books" ).removeClass( "xn-openable" ).addClass( "xn-openable active" );

</script>

 <script >
    $(document).ready(function(){
           
          
            $('#fromdate').datepicker({
                
               
                format: "yyyy-mm-dd",
                autoclose: true,
                todayHighlight: true,
                });
            
            
             $('#todate').datepicker({
                
               
                format: "yyyy-mm-dd",
                autoclose: true,
                todayHighlight: true,
                });
            
        });
    
            
            
        
        
        
        
  </script>
