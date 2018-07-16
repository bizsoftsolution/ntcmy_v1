
<table width="900" border="0" align="center" style="border-collapse:collapse; font-family: Arial, Helvetica, sans-serif;">
  <tr>
    <td height="117" align="center" style="border-bottom:1px solid black;"><p>
      <b><p style="padding-left:5px;margin-top:0px;padding-right:10px;"><strong>NUBE Training Centre (NTC)<br> 
KM 13.5 Jalan Pantai, Teluk Kemang<br />
  71050 Port Dickson<br />
  [T] 606-6625207<br />
  </p>
     </b></td>
  </tr>

</table>

<!-- <table width="900" border="0" align="center" style="border-collapse:collapse; font-family: Arial, Helvetica, sans-serif;">
  <tr style="font-size: 14px;">
    <td height="35" width="222" align="left" style="border-bottom:1px solid black;"><strong>   Report</strong></td>
    <td height="35" width="424" align="center" style="border-bottom:1px solid black;">&nbsp;</td>
    <td height="35" width="64" align="right" style="border-bottom:1px solid black;"><strong></strong></td>
  </tr>
</table> -->

<table width="900" border="0" align="center" style="border-collapse:collapse; font-family: Arial, Helvetica, sans-serif; font-size: 10px;">
  <tr style="font-size: 12px;">
    <td width="39" height="29" align="left" style="border-bottom:1px solid black;"><strong>S.No</strong></td>
    <td width="167" align="left" style="border-bottom:1px solid black;"><strong>Name</strong></td>
    <td width="103" align="center" style="border-bottom:1px solid black;"><strong>IC No</strong></td>
    <td width="88" align="center" style="border-bottom:1px solid black;"><strong>Date Of Booking</strong></td>
     <td width="135" align="center" style="border-bottom:1px solid black;"><strong>Nube/ Echo Park Memeber</strong></td>
     <td width="94" align="center" style="border-bottom:1px solid black;"><strong>Check In</strong></td>
     <td width="74" align="center" style="border-bottom:1px solid black;"><strong>Check Out</strong></td>
     <td width="89" align="center" style="border-bottom:1px solid black;"><strong>Booking Type</strong></td>
     <td width="73" align="right" style="border-bottom:1px solid black;"><strong>Amount Paid</strong></td>
  </tr>

    <?php 
            $i=1;
            $totalamount[]=array();
            foreach ($out as $a) {

                  

            $dat=$this->db->where('pnr_number',$a['pnrnumber'])->where('bookingtype','Direct booking')->get('bookingrooms')->result_array();

           // echo "<pre>";
           // print_r($dat);
    
      foreach ($dat as $b) 
         {

         $date=$b['date'];       
        $icnumber=$b['icnumber'];
        $bookingtype=$b['bookingtype'];


         $dat1=$this->db->where('pnrnumber',$b['pnr_number'])->get('checkoutroom')->result_array();
         
     
           foreach ($dat1 as $c) 
         {  

             $totalamount[]=$c['totalamount'];

               ?>

  <tr>

    <td height="22" align="left" style="border-bottom:1px dotted black;"><strong><?php echo $i++;?></strong></td>
    <td align="left" style="border-bottom:1px dotted black;"><strong><?php echo $c['name'];?></strong></td>
    <td align="center" style="border-bottom:1px dotted black;"><strong><?php echo $icnumber;?></strong></td>
    <td align="center" style="border-bottom:1px dotted black;"><strong><?php echo date('d/m/Y',strtotime(str_replace('-', '/', $date)));?></strong></td>
    <td align="center" style="border-bottom:1px dotted black;"><strong><?php if($c['nubememberid']==''){ echo 'No';}else{echo 'Yes'; } ?></strong></td>
    <td align="center" style="border-bottom:1px dotted black;"><strong><?php echo date('d/m/Y',strtotime(str_replace('-', '/', $c['checkindate'])));?></strong></td>
    <td align="center" style="border-bottom:1px dotted black;"><strong><?php echo date('d/m/Y',strtotime(str_replace('-', '/', $c['checkoutdate'])));?></strong></td>
    <td align="center" style="border-bottom:1px dotted black;"><strong><?php echo $bookingtype;?></strong></td>
    <td align="right" style="border-bottom:1px dotted black;"><strong><?php echo $c['totalamount'];?></strong></td>
  </tr>
     <?php 
   }

     }

     }?>

     <tr style="font-size: 15px;">

    <td height="22" align="left" style="border-bottom:1px dotted black;">&nbsp;</td>
    <td align="left" style="border-bottom:1px dotted black;">&nbsp;</td>
    <td align="center" style="border-bottom:1px dotted black;">&nbsp;</td>
    <td align="center" style="border-bottom:1px dotted black;">&nbsp;</td>
    <td align="center" style="border-bottom:1px dotted black;">&nbsp;</td>
    <td colspan="3" align="right" style="border-bottom:1px dotted black;"><strong>Total Amount</strong></td>
    <td align="right" style="border-bottom:1px dotted black;"><strong><?php echo array_sum($totalamount);?></strong></td>
  </tr>
 
</table>

 <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/jquery/jquery.min.js"></script>
 <script type="text/javascript">
  $(document).ready(function(){
    window.print();
  });
</script>
