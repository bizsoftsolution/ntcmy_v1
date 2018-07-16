

<table width="650" border="0" align="center" style="padding:10px;">
  <tr>
  
    <td width="325">
      <div align="center"><img src="<?php echo base_url();?>assests/img/logo.png" />
    </div></td>
  <td width="325">
    <h2 align="right"> <strong>NUBE Training Centre (NTC)</strong></h2>
  <p align="right" style="font-size: 14px; line-height: 20px;">KM 13.5 Jalan Pantai, Teluk Kemang<br />
  71050 Port Dickson<br />
  [T] 606-6625207<br />
  info@ntc.my</p>
    </td>
  </tr>
  
</table> 
<?php foreach ($bb as $a) : 

    $pnrnumber=$a['pnrnumber'];
     $noofrooms=$a['noofroom'];
     $nubememberid=$a['nubememberid'];
           $data=$this->db->where('pnrnumber',$pnrnumber)->get('bookingroom')->result_array();
           foreach ($data as $dd) 
           {
             $roomtype=$dd['room_type'];
             $roomamount=$dd['roomamount'];
           }

           $type =$this->db->where('id',$a['roomtypeid'])->get('roomtypes')->result_array();
     

           foreach ($type as $row) 
  
            {
                $roomtype=$row['roomtype'];
                $memberweekdaysamount=$row['memberweekdaysamount'];
                $memberweekendamount=$row['memberweekendamount'];
                $publicweekdaysamount=$row['publicweekdaysamount'];
                $publicweekendamount=$row['publicweekendamount'];

           }  

$checkind=$a['checkindate'];
$checkoutd=$a['checkoutdate'];

$date1 = str_replace('-', '/', $checkind);
  $checkina= date('d/m/Y', strtotime($date1));

  $date2 = str_replace('-', '/', $checkoutd);
  $checkouta= date('d/m/Y', strtotime($date2));



?>
<table width="650" border="0" align="center" bgcolor="#efefef" style="padding:10px;">
  <tr>
    <td width="346" style="font-size:20px;"><strong>Invoice</strong></td></tr>
    <tr>
    <td style="font-size:14px;">
      <strong>Invoice No&nbsp;&nbsp;&nbsp; : <?php echo $a['billnumber'];?><br />
      Invoice Date : <?php echo date('d/m/Y');?>    </strong></td>
    <td width="293" style="font-size:14px;"><strong>Check In Date&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $checkina;?><br />
    Check Out Date&nbsp;: <?php echo $checkouta;?></strong></td>
  </tr>
</table>
<table width="650" border="0" align="center" style="padding:10px;">
  <tr>
    <td width="346" style="font-size:20px;"><strong>Invoiced To</strong>       </td>
       </tr>
       <tr>
       <td style="font-size: 14px; line-height: 20px;"> ATTN : <?php echo $a['name'];?> <br />
        <?php echo $a['email'];?><br />
      <?php echo $a['mobileno'];?><br />
       <br />
    </td>
      <td width="294" style="font-size: 14px; line-height: 20px;">
      Room Type&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $a['room_type'];?><br />
      No Of Units&nbsp;: <?php echo $a['noofroom'];?><br />
      Room Inspected By&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $a['inspectedby'];?>
      </td>
  </tr>
</table>
<table width="650" border="0" align="center" bgcolor="#efefef">
  <tr>
    <td width="539" align="center" style="padding:10px;">
   <strong>Description </strong></div></td>
    <td width="101"><div align="center">
    <div align="center"><strong>Total</strong></div></td>
  </tr>
</table>
   <table width="650" border="0" align="center" style="padding:10px;">
  <tr style="font-size: 14px; line-height: 20px;">
    <td colspan="4">
      <?php



                       $checkout=$checkoutd;
                       $date_from = $checkind;   
                        $date_from = strtotime($date_from);  
                        $date_to = $checkout;  
                        $date_to = strtotime($date_to); 

if($date_from==$date_to)
{
        //nubememeberid empty

        if($nubememberid=='')
        {
                for ($i=$date_from; $i<=$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                        
                        if($checkinday=='Sat' || $checkinday=='Sun')
                        {
                            $amount=$publicweekendamount;
                        }
                        else
                        {

                            $amount=$publicweekdaysamount;
                        }


                                            

                     

                      $subtotal=$amount*$noofrooms;
                      $subtotals[]=$amount*$noofrooms;

                      $total=array_sum($subtotals);



                          echo' <div style="padding: 5px;  line-height: 13px;"><table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 170px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 170px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofrooms.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table></div>';
                      
                       }



        }
        //
        else
        {
            if($noofrooms>1)
                {


                     if($nubememberid=='')
                    {

                    }
                    else
                    {
                       echo'<p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center;"> Member Discount Room</p>';
                    }

                            //member per 1 room
                        for ($i=$date_from; $i<=$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                          
                        
                    

                            if($checkinday=='Sat' || $checkinday=='Sun')
                        {
                            $amount=$memberweekendamount;
                        }
                        else
                        {

                            $amount=$memberweekdaysamount;
                        }


                    

                     
                      $noofroomss=1;
                      $subtotal=$amount*$noofroomss;
                      $subtotals[]=$amount*$noofroomss;

                       $total=array_sum($subtotals);
                   
                          echo'
                          <div style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; padding: 5px; border-radius: 5px; line-height: 25px;">
                          <table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 170px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 170px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofroomss.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>
                           </div>';
                      
                       }

                        if($nubememberid=='')
                    {

                    }
                    else
                    {
                       echo'<p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center; border-bottom: 1px dotted;"> </p>';
                    }


                       //remainingroom


                       for ($i=$date_from; $i<=$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                        
                        if($checkinday=='Sat' || $checkinday=='Sun')
                        {
                            $amount=$publicweekendamount;
                        }
                        else
                        {

                            $amount=$publicweekdaysamount;
                        }

                     

                       $noofroomss1=$noofrooms-1;
                      $subtotal=$amount*$noofroomss1;
                      $subtotals[]=$amount*$noofroomss1;

                      $total=array_sum($subtotals);
                     
                          echo' <div style="padding: 5px;  line-height: 13px;"><table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 170px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 170px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofroomss1.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table></div>';
                      
                       }




                }
                //sinlgeroom
                else
                {

                            //member per 1 room
                        for ($i=$date_from; $i<=$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                          
                        
                    

                            if($checkinday=='Sat' || $checkinday=='Sun')
                        {
                            $amount=$memberweekendamount;
                        }
                        else
                        {

                            $amount=$memberweekdaysamount;
                        }


                    

                     

                       $noofroomss=1;

                      $subtotal=$amount*$noofroomss;
                      $subtotals[]=$amount*$noofroomss;

                      $total=array_sum($subtotals);

                          echo' <div style="padding: 5px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; line-height: 13px;"><table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 170px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 170px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofroomss.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table></div>';
                      
                       }


                }    

        }  
                       

}
else
{

                  //nubememeberid empty

        if($nubememberid=='')
        {
                for ($i=$date_from; $i<$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                        
                        if($checkinday=='Sat' || $checkinday=='Sun')
                        {
                            $amount=$publicweekendamount;
                        }
                        else
                        {

                            $amount=$publicweekdaysamount;
                        }


                                            

                     

                      $subtotal=$amount*$noofrooms;
                      $subtotals[]=$amount*$noofrooms;

                      $total=array_sum($subtotals);

                          echo' <div style="padding: 5px;  line-height: 13px;"><table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 170px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 170px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofrooms.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table></div>';
                      
                       }



        }
        //

        else
        {

             if($nubememberid=='')
                    {

                    }
                    else
                    {
                       echo'<p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center;"> Member Discount Room</p>';
                    }
            if($noofrooms>1)
                {
                            //member per 1 room
                        for ($i=$date_from; $i<$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                          
                        
                    

                            if($checkinday=='Sat' || $checkinday=='Sun')
                        {
                            $amount=$memberweekendamount;
                        }
                        else
                        {

                            $amount=$memberweekdaysamount;
                        }


                    

                     
                         $noofroomss=1;
                      $subtotal=$amount*$noofroomss;
                      $subtotals[]=$amount*$noofroomss;

                      $total=array_sum($subtotals);
                    

                          echo'
                          <div style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; padding: 5px;  line-height: 13px;">
                          <table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 170px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 170px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofroomss.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>
                          </div>';
                      
                       }


                       if($nubememberid=='')
                    {

                    }
                    else
                    {
                       echo'<p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center; border-bottom: 1px dotted;"> </p>';
                    }

                       //remainingroom


                       for ($i=$date_from; $i<$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                        
                        if($checkinday=='Sat' || $checkinday=='Sun')
                        {
                            $amount=$publicweekendamount;
                        }
                        else
                        {

                            $amount=$publicweekdaysamount;
                        }

                     


                      
                     $noofroomss1=$noofrooms-1;
                     $subtotal=$amount*$noofroomss1;
                      $subtotals[]=$amount*$noofroomss1;

                      $total=array_sum($subtotals);

                          echo' <div style="padding: 5px;  line-height: 13px;"><table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 170px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 170px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofroomss1.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table></div>';
                      
                       }




                }
                //sinlgeroom
                else
                {

                            //member per 1 room
                        for ($i=$date_from; $i<$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                          
                        
                    

                            if($checkinday=='Sat' || $checkinday=='Sun')
                        {
                            $amount=$memberweekendamount;
                        }
                        else
                        {

                            $amount=$memberweekdaysamount;
                        }


                    

                     

                      
                     $noofroomss=1;
                     $subtotal=$amount*$noofroomss;
                      $subtotals[]=$amount*$noofroomss;

                      $total=array_sum($subtotals);

                          echo' <div style="padding: 5px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; line-height: 13px;"><table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 170px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 170px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofroomss.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table></div>';
                      
                       }


                }    

        }
                        
                        

  } 


       ?>




    </td>
    
    <td width="101"><div align="right"><strong><?php echo $a['subtotal'];?></strong></div></td>
  </tr>
  <tr>
  <td> Add-on Amount</td>
    <td colspan="3">
      
       <?php 
       $adon=$this->db->where('pnr_number',$pnrnumber)->get('payadon')->result_array();
                       foreach ($adon as $adons) {
                         
                      
$adondate1 = str_replace('-', '/', $adons["date"]);
  $checkinaadon= date('d/m/Y', strtotime($adondate1));

                       echo'<table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 240px;">'.$checkinaadon.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 180px;" >'.$adons["particular"].'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($adons["amount"], 2, '.', '').'</td></tr></table>';

                         }
       ?>


    </td>
    
    <td width="101"><div align="right"><strong><?php echo $a['addonamount'];?></strong></div></td>
  </tr>
   
 
 
</table>
<table width="650" border="0" align="center" bgcolor="#efefef" style="padding:10px;">
  <tr>
    <td width="527" align="right" style="padding:10px;">
   <strong>Subtotal Total</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong><?php echo $a['grandtotal'];?></strong></div></td>
  </tr>
   <tr style="font-size: 14px; line-height: 20px;">
    <td width="527" align="right">
  GST @ 6%</td>
    <td width="107"><div align="center">
     <div align="right"><strong><?php echo $a['servicetaxamount'];?></strong></div></td>
  </tr>

  <tr>
    <td width="527" align="right">
   <strong>Grand Total</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong><?php echo $a['grandtotals'];?></strong></div></td>
  </tr>

  <tr>
    <td width="527" align="right">
   Service Tax @ 5%</td>
    <td width="107"><div align="center">
    <div align="right"><strong><?php echo $a['servicetaxamounts'];?></strong></div></td>
  </tr>
   
  <tr>
    <td width="527" align="right">
   <strong>Total Amount</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong><?php echo $a['totalamount'];?></strong></div></td>
  </tr>
  <tr>
    <td width="527" align="right">
   <strong>Online Paid Amount</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong><?php echo $a['advanceamount'];?></strong></div></td>
  </tr>
  
  <tr>
    <td width="527" align="right">
   <strong>Return Amount</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong><?php echo $a['returnamount'];?></strong></div></td>
  </tr>
   <tr>
    <td width="527" align="right">
   <strong>Refundable Deposit Amount</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong><?php echo $a['depositamount'];?></strong></div></td>
  </tr>
   <tr>
    <td width="527" align="right">
   <strong>Fine Amount</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong><?php echo $a['fineamount'];?></strong></div></td>
  </tr>
   <tr>
    <td width="527" align="right">
   <strong>Remarks</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong><?php echo $a['remarks'];?></strong></div></td>
  </tr>
   <tr>
    <td width="527" align="right">
   <strong>Deposit Refund Amount</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong><?php echo $a['refundamount'];?></strong></div></td>
  </tr>
  <tr>
    <td width="527" align="right">
   <strong>Balance Amount To Be Paid</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong><?php echo $a['balanceamount'];?></strong></div></td>
  </tr>
</table>


<?php endforeach;?>
