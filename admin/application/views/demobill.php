<div style="text-align: center;"><b>INVOICE</b></div>
<table width="650"  border="0" align="center" style="border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black;border-collapse: collapse;">
  <tr>
  
    <td width="255" align="left"style="font-family: arial;"><b><p style="padding-left:5px;margin-top:0px;padding-right:10px;"><strong>NUBE HOTEL<br> 
12, NUBE House, 3rd Floor,
Jalan Tun Sambanthan 3, 
Brickfields, 50470 Kuala Lumpur
+603-2274-9800
+603-2260-1800
info@nubehotel.com</p>
     </b></td>	
	 <td width="370"  align="right" style="padding: 3px;"><img style="width:242px;height:123px;" src="<?php echo base_url();?>assests/img/logo.png"></td>
  </tr>
</table>

<?php foreach ($bb as $a) : 

    $pnrnumber=$a['pnrnumber'];
           $data=$this->db->where('pnrnumber',$pnrnumber)->get('bookingroom')->result_array();
           foreach ($data as $dd) 
           {
             $roomtype=$dd['room_type'];
             $roomamount=$dd['roomamount'];
           }

$checkind=$a['checkindate'];
$checkoutd=$a['checkindate'];

$date1 = str_replace('-', '/', $checkind);
  $checkin= date('d/m/Y', strtotime($date1));

  $date2 = str_replace('-', '/', $checkoutd);
  $checkout= date('d/m/Y', strtotime($date2));



?>
<table width="650" border="0" align="center" style="border-top:1px solid black; border-left:1px solid black; border-right:1px solid black;  border-collapse: collapse;">


  
  <tr>
    <td width="340" height="25"style="font-family: arial; font-size: 14px;">To:</td>
    <td width="146" align="right" style="font-family: arial; font-size: 14px;">Bill No</td>
    <td width="10">:</td>
    <td width="110" align="left"style="padding:3px;font-family: arial;"><strong><?php echo $a['billnumber'];?></strong></td>
  </tr>
  <tr>
    <td rowspan="4" valign="top" style="padding:3px;font-family: arial;"><strong><p style="margin-top:-5px; font-size: 14px;"><?php echo $a['name'];?><br>
    <?php echo $a['email'];?><br>
    <?php echo $a['mobileno'];?><br>
</p> </strong></td>
    <td width="146" align="right" style="font-family: arial; font-size: 14px;">Check-in Date</td>
    <td width="10">:</td>
    <td width="110" align="left"style="padding:3px;font-family: arial; font-size: 14px;"><strong><?php echo $checkin;?></strong></td>
    </tr>
    <tr>
    <td align="right" valign="top" style="font-family: arial; font-size: 14px;">Check-in Time</td>
    <td valign="top">:</td>
    <td align="left" valign="top" style="padding:3px;font-family: arial; font-size: 14px;"><strong><?php echo $a['checkintime'];?></strong></td>
  </tr>
  <tr>
    <td align="right" valign="top"style="font-family: arial; font-size: 14px;">Check-out Date</td>
    <td valign="top">:</td>
    <td align="left" valign="top" style="padding:3px;font-family: arial; font-size: 14px;"><strong><?php echo $checkout;?></strong></td>
  </tr>
  <tr>
    <td height="24" align="right" valign="top"style="font-family: arial; font-size: 14px;">Check-out Time</td>
    <td valign="top">:</td>
    <td align="left" valign="top" style="padding:3px;font-family: arial; font-size: 14px;"><strong><?php echo $a['checkouttime'];?></strong></td>
  </tr>
</table>

<table width="650" border="0" align="center" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black;  border-collapse: collapse;">
<tr>
  <td>Room No</td>
  <td>:</td>
  <td style="padding:3px;font-family: arial;"><strong><?php echo $a['roomno'];?></strong></td>
  <td>Room Type</td>
  <td>:</td>
  <td style="padding:3px;font-family: arial;"><strong><?php echo $a['room_type'];?></strong></td>
  <td>No of Days</td>
  <td>:</td>
  <td style="padding:3px;font-family: arial;"><strong><?php echo $a['noofdays'];?></strong></td>

</tr>
  
</table>



<table width="650" height="460" border="0" align="center" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black;  border-collapse: collapse;">
  <tr style="height:1px;" >
    
    <td width="490"style=" border-bottom:1px solid black; border-right: 1px solid black;font-family: arial; font-size: 14px;padding-left:5px;text-align: center;"> Description</td>
   
   
    <td width="70" colspan="2" align="right"style=" border-bottom:1px solid black;font-family: arial; font-size: 14px;padding-right:5px;">Amount</td>
  </tr>
 
  <tr style="height: 1px;">
   
    <td align="left"style="font-family: arial; font-size: 16px; text-align: center; padding: 24px 0px 4px 74px;">Room Rent:  <?php echo $roomamount;?>X<?php echo $a['noofroom'];?> :<?php echo $a['subtotal'];?></td>
    <td align="left"style="border-right: 1px solid black;border-left: 1px solid black;padding: 3px;font-family: arial; font-size: 14px;"><strong></strong></td>
    
  </tr>

  <tr style="height: 1px;">
   
    <td align="left"style="padding: 3px;font-family: arial; font-size: 14px;"></td>
    <td align="right"style="border-right: 1px solid black;border-left: 1px solid black;padding: 3px; padding-right: 10px;font-family: arial; font-size: 14px;"><strong><?php echo $a['total'];?></strong></td>
    
  </tr>

  <tr style="height: 1px;">
   
    <td align="left"style="font-family: arial; font-size: 16px; padding: 0px 0px 4px 87px; text-align: center;">No of Days: <?php echo $a['noofdays'];?>X<?php echo $a['subtotal'];?>  : <?php echo $a['total'];?></td>
    <td align="left"style="border-right: 1px solid black;border-left: 1px solid black;padding: 3px;font-family: arial; font-size: 14px;"><strong></strong></td>
    
  </tr>
   <tr style="height: 1px;">
    
    <td align="center" style=""></td>
    <td align="right"style="border-right: 1px solid black;border-left: 1px solid black;"></td>
  
  
  </tr>
  <?php 
        $datas=$this->db->where('pnr_number',$pnrnumber)->get('payadon')->result_array();
           foreach ($datas as $dd) 
           {
                     

  ?>

    <tr style="height: 1px;">
    
    <td align="center" style=""><?php echo $dd['particular'];?></td>
    <td align="right"style="border-right: 1px solid black;border-left: 1px solid black;padding: 3px;font-family: arial; font-size: 14px; padding-right: 10px;"><strong><?php echo  number_format($dd['amount'], 2, '.', '');?></strong></td>
  
  
  </tr>
  <?php  


}


  ?>
    
  <tr>
    
    <td align="center" style="">&nbsp;</td>
    <td align="right" style="border-right: 1px solid black;border-left: 1px solid black;">&nbsp;</td>
	
	
  </tr>
 
  <tr style="height:1px;">
    
    <td align="right"style="font-family: arial; border-bottom: 1px solid black; font-size: 14px;padding-right:10px;" >Sub Total :</td>
   <!--  <td align="left"style="border-right: 1px solid black;border-left: 1px solid black;">&nbsp;</td>
    <td align="left"style="border-right: 1px solid black;">&nbsp;</td> -->
    
    <td  align="right"style="font-family: arial; border-right: 1px solid black;border-left: 1px solid black;border-bottom: 1px solid black; font-size: 14px;padding-right:10px;"><b><?php echo number_format($total, 2, '.', '');?></b></td>
  </tr>
  <tr style="height:1px;">
    
   <td align="right"style=" font-family: arial; font-size: 14px;padding-right:10px;" >Service Tax @ 14% :</td>
	
   
    <td  align="right"style="font-family: arial; border-right: 1px solid black;font-size: 14px;padding-right:10px;"><b><?php echo $a['servicetaxamount'];?></b></td>
  </tr>

  <tr style="height:1px;">
    
   <td align="right"style=" font-family: arial; border-bottom: 1px solid black; font-size: 14px;padding-right:10px;" >Swachh Bharat Cess @ 0.50%  % :</td>
  
   
    <td  align="right"style="font-family: arial;border-bottom: 1px solid black; border-right: 1px solid black;font-size: 14px;padding-right:10px;"><b><?php echo $a['bharatcesstaxamount'];?></b></td>
  </tr>

  <tr style="height:1px;">
    
   <td align="right"style=" font-family: arial; font-size: 14px;padding-right:10px;" >Total Amount :</td>
  
   
    <td  align="right"style="font-family: arial; border-right: 1px solid black;font-size: 14px;padding-right:10px;"><b><?php echo $a['totalamount'];?></b></td>
  </tr>

  <tr style="height:1px;">
    
   <td align="right"style=" font-family: arial; font-size: 14px;padding-right:10px;" >Online Paid Amount :</td>
  
   
    <td  align="right"style="font-family: arial; border-right: 1px solid black;font-size: 14px;padding-right:10px;"><b><?php echo $a['advanceamount'];?></b></td>
  </tr>

  <tr style="height:1px;">
    
   <td align="right"style=" font-family: arial; font-size: 14px;padding-right:10px;" >Balance Amount :</td>
  
   
    <td  align="right"style="font-family: arial; border-right: 1px solid black;font-size: 14px;padding-right:10px;"><b><?php echo $a['balanceamount'];?></b></td>
  </tr>
 
  <tr style="height:1px;">
    
    <td align="right"style=" font-family: arial; font-size: 14px;padding-right:10px;" >Return Amount :</td>
    
    <td  align="right"style="font-family: arial; border-right: 1px solid black; font-size: 14px;padding-right:10px;border-bottom:1px solid black;"><b><?php echo $a['returnamount'];?></b></td>
  </tr>
  
  
 
 
  
</table>
<table width="650" border="0" align="center" style="border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;border-collapse: collapse;">
  <tr>
    <td width="414" style="font-size: 14px; padding: 3px;font-family: arial; font-size: 13px;">Amount Chargeable (in words)</td>
    <td width="187" align="center" style="border-left: 0px solid black;border-right: 1px solid black;  font-size: 14px; padding: 3px;font-family: arial; font-size: 14px;"><strong></strong></td>
  </tr>
  <tr>
  
    <td  valign="top" style="font-size: 14px; padding: 3px;font-family: arial; font-size: 12px;"><b><?php echo $totalamounts;?></b></td>
    <!--<td height="22">Date&amp;Time</td>-->
  </tr>

 
   
   <tr>
    <td  valign="top" style="font-size: 14px; padding: 3px;font-family: arial; font-size: 12px;"><p>Declaration &nbsp;<br>We declare that this invoice shows the actual price of the<br>
    goods described and that all particulars are true and correct.</p></td>
    <td  align="center" valign="bottom" style="border-left: 0px solid black;  font-size: 14px; padding: 3px;font-family: arial; font-size: 14px;">Authorised Signatory</td>
</tr>

</table>
<?php endforeach;?>

 <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/jquery/jquery.min.js"></script>



                              <script>

                                $(document).ready(function(){



                                  window.print();



                                });

                              </script>