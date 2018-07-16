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

$detail=$this->db->where('pnrnumber',$row['pnrnumber'])->get('hallbooking')->result_array();
foreach ($detail as $rowss) 
        


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
                <td style="padding: 10px;font-weight: bold;"><?php echo $rowss['transcation_id'];?></td>

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
                <td style="padding: 10px;font-weight: bold;"><?php $a=$rowss['date']; $b=date('d/m/Y',strtotime($a)); echo $b;?></td>
                <td style="padding: 10px;">Check Out Date</td>
                <td style="padding: 10px;">:</td>
                <td style="padding: 10px;font-weight: bold;"><?php $a=$row['checkoutdate']; $b=date('d/m/Y',strtotime($a)); echo $b;?></td>

            </tr>

            <tr style="font-size: 14px;">
                <td style="padding: 10px;">Passport Number</td>
                <td style="padding: 10px;">:</td>
                <td style="padding: 10px;font-weight: bold;"><?php echo $rowss['passportnumber'];?></td>
                 <td style="padding: 10px;" valign="top">IC Number</td>
                <td style="padding: 10px;" valign="top">:</td>
                <td style="padding: 10px;font-weight: bold;" valign="top"><?php echo $rowss['icnumber'];?></td>
            </tr>

           

             <tr style="font-size: 14px;">
                <td style="padding: 10px;" valign="top">Address</td>
                <td style="padding: 10px;" valign="top">:</td>
                <td  style="padding: 10px;font-weight: bold;" valign="top">
                <p><?php echo $rowss['line1'];?>,<?php echo $rowss['line2'];?></p>
                <p><?php echo $rowss['city'];?>,<?php echo $rowss['state'];?></p>
                 <p><?php echo $rowss['country'];?>-<?php echo $rowss['postcode'];?></p>
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
                <td style="padding: 10px;font-weight: bold;"><?php echo $rowss['totalamount'];?></td>

            </tr>

            
        </table>

 <table style="width: 100%;">
 <tr style="border-bottom: 1px dotted;">
             <td align="center" colspan="3"><strong style="font-size: 20px;">Checkout Details</strong></td>
             </tr>
  <tr style="border-bottom: 1px dotted;">
    
       <td width="500" align="left" style="padding:10px;">
   <strong>Description </strong></div></td>
    <td width="101" align="right">
   <strong>Total</strong></td>
  </tr>
<?php
    $data=$this->db->where('pnrnumber',$row['pnrnumber'])->get('hallcheckin')->result_array();

    $data1=$this->db->where('pnr_number',$row['pnrnumber'])->get('hall_payadon')->result_array();

    foreach ($data as $row11)
        {
          $checkindate=$row11['checkindate'];
          $slot=$row11['slot']; 
          $halltype=$row11['halltype']; 
          $auditorium=$row11['auditorium'];
          $advanceamount=$row11['advanceamount'];
          $name=$row11['firstname'];


        }
//$checkindate='2016-05-23';
       $total[]='0'; 
        foreach ($data1 as $row1)
        {
          $total[]=$row1["rate"];


        }

        $totalsa=array_sum($total);
        if($totalsa=='')
        {
          $totals='0';
        }
        else
        {
          $totals=$totalsa;
        }

        $checkoutdate=$row['checkoutdate'];

        $hallamt =mysql_query("SELECT * FROM halltypes where auditorium='".$auditorium."' and halltype='".$halltype."'")or die(mysql_error());

                                  while($rows = mysql_fetch_array($hallamt))
                                  {

                                    $hallamount=$rows['amount'];
                                    $seats=$rows['seats'];

                                }



                $date11=date_create($checkindate);
                $date22=date_create($checkoutdate);
                $diff=date_diff($date11,$date22);
                $resus= $diff->format("%a ");
                 if($resus==0)
                {
                    $resu='1';
                }
                else
                {
                    $resu=$resus+1;
                }


        if($slot=='Slot I')
                {
                  $totala=$hallamount*$resu; 
                   $total=$totala*1;
                   $one=1; 
                }
                else if($slot=='Slot II')
                {
                  $totala=$hallamount*$resu;
                  $total=$totala*1; 
                    $one=1; 
                }
                else if($slot=='Slot III')
                {
                  $totala=$hallamount*$resu; 
                  $total=$totala*1; 
                  $one=1;  
                }
                else if($slot=='Slot I & II')
                {
                  $totala=$hallamount*$resu; 
                  $total=$totala*2;
                  $one=2; 
                }
                else if($slot=='Slot I & III')
                {
                  $totala=$hallamount*$resu;
                  $total=$totala*2; 
                  $one=2;   
                }
                else if($slot=='Slot II & III')
                {
                  $totala=$hallamount*$resu;
                  $total=$totala*2;  
                  $one=2;  
                }

                 else if($slot=='Slot I & Slot II & III')
                {
                  $totala=$hallamount*$resu;
                  $total=$totala*3;  
                  $one=3;  
                }
  ?>
 
  <tr style="border-bottom: 1px dotted;">
   
   <?php echo'
   <td style="padding: 8px; font-size: 14px;">
                    Hall Type&nbsp;:&nbsp;<strong>'.$halltype.'</strong><br>
                    Number of Days&nbsp;:&nbsp;<strong>'.$resu.'</strong><br>
                    Amount&nbsp;:&nbsp;<strong>'.number_format($hallamount, 2, '.', '').' x '.$resu.'</strong><br>
                     Slot&nbsp;:&nbsp;<strong>'.$slot.'&nbsp;('.number_format($totala, 2, '.', '').' x '.$one.')</strong><br>


                    </td>';?>
   <td align="right"><strong><?php echo number_format($total, 2, '.', '');?></strong></td>
    
  </tr>
  <tr style="border-bottom: 1px dotted;">
  <td>
    <table  border="0" align="center" style="font-size:13px;">
 <tr >
    <td><b>Date</b></td>
    <td width="500" align="left" style="padding:5px;">
   <b>Add-on Facilities</b></td>
    <td width="101" align="center"><b>Hours</b></td>
    <td width="101" align="center"><b>Rate</b></td>
  </tr>
  
  
  <?php 
        $datasd=$this->db->where('pnr_number',$row['pnrnumber'])->get('hall_payadon')->result_array();
           foreach ($datasd as $dd) 
           {
       $date3 = str_replace('-', '/', $dd['date']);
  $date4= date('d/m/Y', strtotime($date3));              
              
  ?>

    <tr style="height: 1px;">
    <td><?php echo $date4;?></td>
    <td  align="left" style="padding: 5px;"><?php echo $dd['facilities'];?></td>
    <td align="center" ><?php echo $dd['hours'];?></td>
    <td align="center" ><?php echo $dd['rate'];?></td>
  </tr>
  <?php  

}
  ?>
    

 
 
  
</table>

  </td>
  <td align="right"><strong><?php echo number_format($totals, 2, '.', '');?></strong></td>
  </tr>
  </table>
 <table style="width: 100%;border-bottom: 3px solid;">

  <tr>
    <td></td>
    <td></td>
    <td  align="right" style="padding: 10px;">
   <strong>Cleaning Charge</strong></td>
    <td width="107" style="padding: 10px;"><div align="center">
    <div align="right"><strong>RM20.00</strong></div></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td  align="right" style="padding: 10px;">
   <strong>Sub Total</strong></td>
    <td width="107" style="padding: 10px;"><div align="center">
    <div align="right"><strong>RM<?php echo $row['subtotal'];?></strong></div></td>
  </tr>


  <tr>
  <td></td>
    <td></td>
    <td  align="right" style="padding: 10px;">
   <strong>Grand Total</strong></td>
    <td width="107" style="padding: 10px;"><div align="center">
    <div align="right"><strong>RM<?php echo $row['grandtotals'];?></strong></div></td>
  </tr>

  <tr>
  <td></td>
    <td></td>
    <td style="padding: 10px;" align="right">
   Service Charge @ 5%</td>
    <td width="107" style="padding: 10px;"><div align="center">
    <div align="right"><strong>RM<?php echo $row['servicetaxamount'];?></strong></div></td>
  </tr>
   
  <tr>
  <td> </td>
    <td></td>
    <td  style="padding: 10px;" align="right">
   <strong>Total Amount</strong></td>
    <td width="107" style="padding: 10px;"><div align="center">
    <div align="right"><strong>RM<?php echo $row['totalamount'];?></strong></div></td>
  </tr>
  <tr>
  <td></td>
    <td></td>
    <td style="padding: 10px;" align="right">
   <strong>Online Paid Amount</strong></td>
    <td width="107" style="padding: 10px;"><div align="center">
    <div align="right"><strong>RM<?php echo $row['advanceamount'];?></strong></div></td>
  </tr>
  
  <tr>
 <td></td>
    <td></td>
    <td style="padding: 10px;" align="right">
   <strong>Non Return Amount</strong></td>
    <td width="107" style="padding: 10px;"><div align="center">
    <div align="right"><strong><?php if($row['returnamount']=="Nill"){}else{echo 'RM';}?><?php echo $row['returnamount'];?></strong></div></td>
  </tr>
   
   
   
   
  <tr>
    <td> </td>
    <td></td>
    <td style="padding: 10px;" align="right">
   <strong>Balance Amount To Be Paid</strong></td>
    <td width="107" style="padding: 10px;"><div align="center">
    <div align="right"><strong><?php if($row['balanceamount']=="Nill"){}else{echo 'RM';}?><?php echo $row['balanceamount'];?></strong></div></td>
  </tr>
</table>

  

    

 


       
   
 

        
    

       



    </div>

<?php endforeach;?>
</div>
                            <!-- END DEFAULT DATATABLE -->

   

    
 







    


 <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/bootstrap/bootstrap.min.js"></script>



<script>
$('#hall_check_out_reports').addClass('active');
$( "#hall_books" ).removeClass( "xn-openable" ).addClass( "xn-openable active" );

</script>