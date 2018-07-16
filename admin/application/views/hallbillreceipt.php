<div style="text-align: center;"><b>INVOICE</b></div>
<table width="650"  border="0" align="center" style="border-left: 1px solid black; border-right: 1px solid black; border-top: 1px solid black;border-collapse: collapse;">
  <tr>
  
    <td width="255" align="left"style="font-family: arial;"><b><p style="padding-left:5px;margin-top:0px;padding-right:10px;"><strong>NUBE Training Centre (NTC)<br> 
KM 13.5 Jalan Pantai, Teluk Kemang<br />
  71050 Port Dickson<br />
  [T] 606-6625207<br />
  info@ntc.my</p></p>
     </b></td>  
   <td width="370"  align="right" style="padding: 3px;"><img src="<?php echo base_url();?>assests/img/logo.png"></td>
  </tr>
</table>
<?php foreach ($bb as $a) : 

 $pnrnumber=$a['pnrnumber'];
 $hallamount=$a['hallamount'];
$checkind=$a['checkindate'];
$checkoutd=$a['checkoutdate'];
$date1 = str_replace('-', '/', $checkind);
  $checkin= date('d/m/Y', strtotime($date1));

  $date2 = str_replace('-', '/', $checkoutd);
  $checkout= date('d/m/Y', strtotime($date2));

?>
<table width="650" border="0" align="center" style="border-top:1px solid black; border-left:1px solid black; border-right:1px solid black;  border-collapse: collapse;">


  
  <tr>
    <td width="340" height="25"style="font-family: arial; font-size: 14px;">Invoiced To:</td>
    <td width="146" align="right" style="font-family: arial; font-size: 14px;">Date</td>
    <td width="10">&nbsp;</td>
    <td width="110" align="left"style="padding:3px;font-family: arial;"><strong><?php echo date('d/m/Y');?></strong></td>
  </tr>
  <tr>
    <td rowspan="4" valign="top" style="padding:3px;font-family: arial;"><strong><p style="margin-top:-5px; font-size: 14px;"></p>ATTN : <?php echo $a['firstname'];?> <br />
        <?php echo $a['email'];?><br />
      <?php echo $a['mobileno'];?><br />
       <br />
   </strong></td>
     <td width="146" align="right" style="font-family: arial; font-size: 14px;">Invoice No</td>
    <td width="10">:</td>
    <td width="110" align="left"style="padding:3px;font-family: arial; font-size: 14px;"><strong><?php echo $a['billnumber'];?></strong></td>
    </tr>
    <tr>
    <td align="right" valign="top" style="font-family: arial; font-size: 14px;">Check In Date</td>
    <td valign="top">:</td>
    <td align="left" valign="top" style="padding:3px;font-family: arial; font-size: 14px;"><strong><?php echo $checkin;?></strong></td>
  </tr>
  <tr>
    <td align="right" valign="top"style="font-family: arial; font-size: 14px;">Check Out Date</td>
    <td valign="top">:</td>
    <td align="left" valign="top" style="padding:3px;font-family: arial; font-size: 14px;"><strong><?php echo $checkout;?></strong></td>
  </tr>
  <tr>
    <td height="24" align="right" valign="top"style="font-family: arial; font-size: 14px;">Auditorium</td>
    <td valign="top">:</td>
    <td align="left" valign="top" style="padding:3px;font-family: arial; font-size: 14px;"><strong><?php echo $a['auditorium'];?> </strong></td>
  </tr>
</table>


<table width="650"  border="0" align="center" style=" border-top:1px solid black; border-left:1px solid black; border-right:1px solid black;  border-collapse: collapse;">
  <tr style="height:1px;border-bottom:1px solid black;" >
    
       <td width="500" align="center" style="padding:10px;">
   <strong>Description </strong></div></td>
    <td width="101"><div align="center">
    <div align="center"><strong>Total</strong></div></td>
  </tr>
<?php
    $data=$this->db->where('pnrnumber',$pnrnumber)->get('hallcheckin')->result_array();

    $data1=$this->db->where('pnr_number',$pnrnumber)->get('hall_payadon')->result_array();

    foreach ($data as $row)
        {
          $checkindate=$row['checkindate'];
          $slot=$row['slot']; 
          $halltype=$row['halltype']; 
          $auditorium=$row['auditorium'];
          $advanceamount=$row['advanceamount'];
          $name=$row['firstname'];


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

        $checkoutdate=$a['checkoutdate'];

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
 
  <tr style="height: 1px; border-bottom: 1px dotted;">
   
   <?php echo'
   <td style="padding: 8px; font-size: 14px;">
                    Hall Type&nbsp;:&nbsp;<strong>'.$halltype.'</strong><br>
                    Number of Days&nbsp;:&nbsp;<strong>'.$resu.'</strong><br>
                    Amount&nbsp;:&nbsp;<strong>'.number_format($hallamount, 2, '.', '').' x '.$resu.'</strong><br>
                     Slot&nbsp;:&nbsp;<strong>'.$slot.'&nbsp;('.number_format($totala, 2, '.', '').' x '.$one.')</strong><br>


                    </td>';?>
   <td align="right"style="border-right: 1px solid black;padding: 24px 10px 4px 74px;font-family: arial; font-size: 14px;"><strong><?php echo number_format($total, 2, '.', '');?></strong></td>
    
  </tr>
  <tr style="border-bottom: 1px dotted black;">
  <td>
    <table width="" height="" border="0" align="center" style="font-size:13px;">
 <tr style="height:1px;border-bottom:1px dotted black;" >
    <td><b>Date</b></td>
    <td width="500" align="left" style="padding:5px;">
   <b>Add-on Facilities</b></td>
    <td width="101" align="center"><b>Hours</b></td>
    <td width="101" align="center"><b>Rate</b></td>
  </tr>
  
  
  <?php 
        $datas=$this->db->where('pnr_number',$pnrnumber)->get('hall_payadon')->result_array();
           foreach ($datas as $dd) 
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
  <td align="right"style="border-right: 1px solid black;padding: 24px 10px 4px 74px;font-family: arial; font-size: 14px;"><strong><?php echo number_format($totals, 2, '.', '');?></strong></td>
  </tr>
  </table>

  
<table width="650" border="0" align="center"  style="padding:10px;border-left: 1px solid black;border-right: 1px solid black;border-top: 1px dotted black; border-bottom: 1px solid black; font-size:12px;">

  <tr>
    <td></td>
    <td></td>
    <td  align="right" >
   <strong>Cleaning Charge</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong>RM20.00</strong></div></td>
  </tr>
  <tr>
    <td></td>
    <td></td>
    <td  align="right" >
   <strong>Sub Total</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong>RM<?php echo $a['subtotal'];?></strong></div></td>
  </tr>


  <tr>
  <td></td>
    <td></td>
    <td  align="right">
   <strong>Grand Total</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong>RM<?php echo $a['grandtotals'];?></strong></div></td>
  </tr>

  <tr>
  <td></td>
    <td></td>
    <td  align="right">
   Service Charge @ 5%</td>
    <td width="107"><div align="center">
    <div align="right"><strong>RM<?php echo $a['servicetaxamount'];?></strong></div></td>
  </tr>
   
  <tr>
  <td> </td>
    <td></td>
    <td  align="right">
   <strong>Total Amount</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong>RM<?php echo $a['totalamount'];?></strong></div></td>
  </tr>
  <tr>
  <td></td>
    <td></td>
    <td  align="right">
   <strong>Online Paid Amount</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong>RM<?php echo $a['advanceamount'];?></strong></div></td>
  </tr>
  
  <tr>
 <td></td>
    <td></td>
    <td  align="right">
   <strong>Non Return Amount</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong><?php if($a['returnamount']=="Nill"){}else{echo 'RM';}?><?php echo $a['returnamount'];?></strong></div></td>
  </tr>
   
   
   
   
  <tr>
    <td> </td>
    <td></td>
    <td  align="right">
   <strong>Balance Amount To Be Paid</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong><?php if($a['balanceamount']=="Nill"){}else{echo 'RM';}?><?php echo $a['balanceamount'];?></strong></div></td>
  </tr>
</table>

<table width="650" border="0" height="100" align="center" style="border-left: 1px solid black; border-right: 1px solid black; border-bottom: 1px solid black;border-collapse: collapse;">
 
  <tr>
  
    <td  valign="top" style="font-size: 14px; padding: 3px;font-family: arial; font-size: 12px;"><b></b></td>
    <!--<td height="22">Date&amp;Time</td>-->
  </tr>

 
   
   <tr>
    <td  valign="bottom" style=" padding: 3px;font-family: arial; ">Receiver's Sign</td>
    <td  align="right" valign="bottom" style="border-left: 0px solid black;   padding: 3px;font-family: arial; ">Authorised Sign</td>
</tr>

</table>
<?php endforeach;?>

 <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/jquery/jquery.min.js"></script>



                              <script>

                                // $(document).ready(function(){



                                //   window.print();



                                // });

                              </script>