 <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                   <li><a href="#">Home</a></li>                    
                    <li><a href="#">Hall Booking Reports</a></li>
                    <li class="active">Hall Booking Details</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span>Hall Booking Details</h2>
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
    
<?php foreach ($details as $row) :
                


?>
    <div class="panel-body my-table table-responsive" style="border: 1px solid black; height: auto; background: #474822 none repeat scroll 0% 0%; border-radius: 6px; color: white;">
        <table style="width: 100%;">
            <tr>
            <td align="center" colspan="6"><strong style="font-size: 20px;">Customer Details</strong></td>
            </tr>
            <tr style="font-size: 14px;">
                <td style="width: 115px;padding: 10px;">Name</td>
                <td style="padding: 10px;">:</td>
                <td style="width: 350px;padding: 10px;font-weight: bold;"><?php echo $row['firstname'];?>&nbsp;<?php echo $row['lastname'];?></td>
                <td style="width: 170px;padding: 10px;">Reservation Number</td>
                <td style="padding: 10px;">:</td>
                <td style="padding: 10px;font-weight: bold;"><?php echo $row['pnrnumber'];?></td>

            </tr>
            <tr style="font-size: 14px;">
                <td style="padding: 10px;">Email</td>
                <td style="padding: 10px;">:</td>
                <td style="padding: 10px;font-weight: bold;"><?php echo $row['email'];?></td>
                <td style="padding: 10px;">Booking Type</td>
                <td style="padding: 10px;">:</td>
                <td style="padding: 10px;font-weight: bold;"><?php echo $row['bookingtype'];?></td>

            </tr>
            <tr style="font-size: 14px;">
                <td style="padding: 10px;">Mobile No</td>
                <td style="padding: 10px;">:</td>
                <td style="padding: 10px;font-weight: bold;"><?php echo $row['mobileno'];?></td>
                <td style="padding: 10px;">Transcation Id</td>
                <td style="padding: 10px;">:</td>
                <td style="padding: 10px;font-weight: bold;"><?php echo $row['transcation_id'];?></td>

            </tr>
            
            <tr style="font-size: 14px;">
                <td>Nube Member</td>
                <td style="padding: 10px;">:</td>
                <td style="padding: 10px;font-weight: bold;"><?php if($row['nubememberid']==''){ echo 'No';}else{echo $row['nubememberid']; } ?></td>
                <td style="padding: 10px;">Check In Date</td>
                <td style="padding: 10px;">:</td>
                <td style="padding: 10px;font-weight: bold;"><?php $a=$row['checkindate']; $b=date('d/m/Y',strtotime($a)); echo $b;?></td>

            </tr>

            <tr style="font-size: 14px;">
                <td style="padding: 10px;">Booking Date</td>
                <td style="padding: 10px;">:</td>
                <td style="padding: 10px;font-weight: bold;"><?php $a=$row['date']; $b=date('d/m/Y',strtotime($a)); echo $b;?></td>
                <td style="padding: 10px;">Check Out Date</td>
                <td style="padding: 10px;">:</td>
                <td style="padding: 10px;font-weight: bold;"><?php $a=$row['checkoutdate']; $b=date('d/m/Y',strtotime($a)); echo $b;?></td>

            </tr>

            <tr style="font-size: 14px;">
                <td style="padding: 10px;">Passport Number</td>
                <td style="padding: 10px;">:</td>
                <td style="padding: 10px;font-weight: bold;"><?php echo $row['passportnumber'];?></td>
                 <td style="padding: 10px;" valign="top">IC Number</td>
                <td style="padding: 10px;" valign="top">:</td>
                <td style="padding: 10px;font-weight: bold;" valign="top"><?php echo $row['icnumber'];?></td>
            </tr>

           

             <tr style="font-size: 14px;">
                <td style="padding: 10px;" valign="top">Address</td>
                <td style="padding: 10px;" valign="top">:</td>
                <td  style="padding: 10px;font-weight: bold;" valign="top">
                <p><?php echo $row['line1'];?>,<?php echo $row['line2'];?></p>
                <p><?php echo $row['city'];?>,<?php echo $row['state'];?></p>
                 <p><?php echo $row['country'];?>-<?php echo $row['postcode'];?></p>
                </td>
                <td style="padding: 10px;" valign="top"></td>
                <td style="padding: 10px;" valign="top"></td>
                <td style="padding: 10px;font-weight: bold;" valign="top"></td>

            </tr>


            
        </table>
        

        <table style="width: 100%; border-bottom: 3px solid;">
            <tr style="font-size: 14px;">
            <td style="padding: 10px;">Auditorium Type&nbsp;:&nbsp;</td>
            <td style="padding: 10px;width: 200px;font-weight: bold;"><?php echo $row['auditorium']; ?></td>
            <td style="padding: 10px;">Hall Type&nbsp;:&nbsp;</td>
            <td style="padding: 10px;width: 220px;font-weight: bold;"><?php echo $row['halltype']; ?></td>
            <td style="padding: 10px;">Slots&nbsp;:&nbsp;</td>
            <td style="padding: 10px;font-weight: bold;"><?php echo $row['slot'];?></td>
            </tr>
        </table>

        <table style="width: 100%; border-bottom: 3px solid;" >
            <tr>
             <td align="center" colspan="6"><strong style="font-size: 20px;">Payment Details</strong></td>
             </tr>
             <tr style="font-size: 14px;">
                <td style="width: 140px;padding: 10px;"><!-- Refund Deposit Amount --></td>
                <td style="padding: 10px;"></td>
                <td style="width: 350px;padding: 10px;font-weight: bold;"></td>
                <td style="width: 170px;padding: 10px;">Online Paid Amount</td>
                <td style="padding: 10px;">:</td>
                <td style="padding: 10px;font-weight: bold;"><?php echo $row['totalamount'];?></td>

            </tr>

            
        </table>

  

        <table style="width: 100%;">
  <tr>
    <td colspan="3" align="center"><strong style="font-size: 20px;">Other Facilities Details</strong></td>
  </tr>
  <tr style="font-size: 14px;border-bottom: 1px dotted;">
    <td width="75" style="padding: 10px;" align="left">Other Facilities</td>
    <td width="13" style="padding: 10px;" align="center">Hours</td>
    <td width="12" style="padding: 10px;" align="center">Rates</td>
  </tr>
<?php 
$facilities=explode('|', $row['facilities']);
$facilitiesamount=explode('|', $row['facilitiesamount']);
$hours=explode('|', $row['hours']);
$count=count($facilities);

for ($i=0; $i < $count; $i++) { 
   
?>

  <tr style="font-size: 14px;">
    <td style="padding: 10px;" align="left"><?php echo $facilities[$i];?></td>
    <td style="padding: 10px;" align="center"><?php echo $facilitiesamount[$i];?></td>
    <td style="padding: 10px;" align="center"><?php echo $hours[$i];?></td>
  </tr>

  <?php }?>
</table>
       
   
 

        
    

       



    </div>

<?php endforeach;?>
</div>
                            <!-- END DEFAULT DATATABLE -->

   

    
 







    


 <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/bootstrap/bootstrap.min.js"></script>




<script>
$('#hall_bookings_reports').addClass('active');
$( "#hall_books" ).removeClass( "xn-openable" ).addClass( "xn-openable active" );

</script>
