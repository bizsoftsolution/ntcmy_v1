
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
     $noofrooms=$a['noofroom'];
     $nubememberid=$a['nubememberid'];
     $roomtypeid=$a['roomtypeid'];
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




            $typea =$this->db->get('publicholidays')->result_array();
     
            $holidaysdate[]=array();
           foreach ($typea as $rowa) 
  
            {
                 $holidaysdate[]=$rowa['holidaysdate'];

           }  

$checkind=$a['checkindate'];
$checkoutd=$a['checkoutdate'];

$date1 = str_replace('-', '/', $checkind);
  $checkina= date('d/m/Y', strtotime($date1));

  $date2 = str_replace('-', '/', $checkoutd);
  $checkouta= date('d/m/Y', strtotime($date2));



?>

<table width="650" border="0" align="center" style="border-top:1px solid black; border-left:1px solid black; border-right:1px solid black;  border-collapse: collapse;">


  
  <tr>
    <td width="340" height="25"style="font-family: arial; font-size: 14px;">Invoiced To:</td>
    <td width="146" align="right" style="font-family: arial; font-size: 14px;">Date</td>
    <td width="10">:</td>
    <td width="110" align="left"style="padding:3px;font-family: arial;"><strong><?php echo date('d/m/Y');?></strong></td>
  </tr>
  <tr>
    <td rowspan="4" valign="top" style="padding:3px;font-family: arial;"><strong><p style="margin-top:-5px; font-size: 14px;"></p>ATTN : <?php echo $a['name'];?> <br />
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
    <td align="left" valign="top" style="padding:3px;font-family: arial; font-size: 14px;"><strong><?php echo $checkina;?></strong></td>
  </tr>
  <tr>
    <td align="right" valign="top"style="font-family: arial; font-size: 14px;">Check Out Date</td>
    <td valign="top">:</td>
    <td align="left" valign="top" style="padding:3px;font-family: arial; font-size: 14px;"><strong><?php echo $checkouta;?></strong></td>
  </tr>
  <tr>
    <td height="24" align="right" valign="top"style="font-family: arial; font-size: 14px;"> Room Type</td>
    <td valign="top">:</td>
    <td align="left" valign="top" style="padding:3px;font-family: arial; font-size: 14px;"><strong><?php echo $a['room_type'];?></strong></td>
  </tr>
</table>

<table width="650" border="0" align="center" style="border-bottom:1px solid black; border-left:1px solid black; border-right:1px solid black;  border-collapse: collapse;">
<tr>
  <td style="width: 108px;">No of Units</td>
  <td>:</td>
  <td style="padding:3px;font-family: arial;"><strong><?php echo $a['noofroom'];?></strong></td>
  <td align="right">Room Inspected By</td>
  <td>:</td>
  <td style="padding:3px;font-family: arial;"><strong><?php echo $a['inspectedby'];?></strong></td>
  

</tr>
  
</table>



<table width="650" border="0" align="center" style="border-left: 1px solid rgb(0, 0, 0); border-right: 1px solid rgb(0, 0, 0); border-collapse: collapse;">
  <tr style="border-bottom: 1px solid black;">
  <td width="50" align="center" style="padding:10px;">
   <strong>Date </strong></div></td>
    <td width="500" align="center" style="padding:10px;">
   <strong>Description </strong></div></td>
    <td width="101"><div align="center">
    <div align="center"><strong>Total</strong></div></td>
  </tr>
</table>
   <table width="650" border="0" align="center" style="padding:10px;border-left: 1px solid rgb(0, 0, 0); border-right: 1px solid rgb(0, 0, 0); border-collapse: collapse;">
  <tr style="font-size: 12px;height:1px;">
    <td colspan="4">
      <?php



                       $checkout=$checkoutd;
                       $date_from = $checkind;   
                        $date_from = strtotime($date_from);  
                        $date_to = $checkout;  
                        $date_to = strtotime($date_to); 


if($roomtypeid=='4')
{

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

                        
                        
                              if(in_array($dd,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }


                        
                        if($checkinday=='Fri' || $checkinday=='Sat' || $pub=='PUB')
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
                       echo'<p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center;"> Member Rate</p>';
                    }

                            //member per 1 room
                        for ($i=$date_from; $i<=$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                          
                        
                    

                            
                              if(in_array($dd,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }


                        
                        if($checkinday=='Fri' || $checkinday=='Sat' || $pub=='PUB')
                        {
                            $amount=$memberweekendamount;
                        }
                        else
                        {

                            $amount=$memberweekdaysamount;
                        }


                    

                     
                     
                      $subtotal=$amount*$noofrooms;
                      $subtotals[]=$amount*$noofrooms;

                       $total=array_sum($subtotals);
                   
                          echo'
                          <div style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; padding: 5px; border-radius: 5px; line-height: 25px;">
                          <table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 170px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 170px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofrooms.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>
                           </div>';
                      
                       }

                        if($nubememberid=='')
                    {

                    }
                    else
                    {
                       echo'<p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center; border-bottom: 1px dotted;"> </p><p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center;">Non Member Rate</p>';
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

                        
                        
                              if(in_array($dd,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }


                        
                        if($checkinday=='Fri' || $checkinday=='Sat' || $pub=='PUB')
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
                       echo'<p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center;"> Member Rate</p>';
                    }
            
                            //member per 1 room
                        for ($i=$date_from; $i<$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                          
                        
                    

                            
                              if(in_array($dd,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }


                        
                        if($checkinday=='Fri' || $checkinday=='Sat' || $pub=='PUB')
                        {
                            $amount=$memberweekendamount;
                        }
                        else
                        {

                            $amount=$memberweekdaysamount;
                        }


                    

                     
                        
                      $subtotal=$amount*$noofrooms;
                      $subtotals[]=$amount*$noofrooms;

                      $total=array_sum($subtotals);
                    

                          echo'
                          <div style="background: rgb(255, 255, 255) none repeat scroll 0% 0%; padding: 5px;  line-height: 13px;">
                          <table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 170px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 170px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofrooms.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>
                          </div>';
                      
                       }


                       if($nubememberid=='')
                    {

                    }
                    else
                    {
                       echo'<p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center; border-bottom: 1px dotted;"> </p><p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center;">Non Member Rate</p>';
                    }

                       




        }
                        
                        

  } 

}//-------------------------------------------------------------------


else
{
  //other--------------------------

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

                        
                        
                              if(in_array($dd,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }


                        
                        if($checkinday=='Fri' || $checkinday=='Sat' || $pub=='PUB')
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
                       echo'<p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center;"> Member Rate</p>';
                    }

                            //member per 1 room
                        for ($i=$date_from; $i<=$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                          
                        
                    

                            
                              if(in_array($dd,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }


                        
                        if($checkinday=='Fri' || $checkinday=='Sat' || $pub=='PUB')
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
                       echo'<p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center; border-bottom: 1px dotted;"> </p><p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center;">Non Member Rate</p>';
                    }


                       //remainingroom


                       for ($i=$date_from; $i<=$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                        
                        
                              if(in_array($dd,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }


                        
                        if($checkinday=='Fri' || $checkinday=='Sat' || $pub=='PUB')
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

                          
                        
                    

                            
                              if(in_array($dd,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }


                        
                        if($checkinday=='Fri' || $checkinday=='Sat' || $pub=='PUB')
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

                        
                        
                              if(in_array($dd,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }


                        
                        if($checkinday=='Fri' || $checkinday=='Sat' || $pub=='PUB')
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
                       echo'<p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center;"> Member Rate</p>';
                    }
            if($noofrooms>1)
                {
                            //member per 1 room
                        for ($i=$date_from; $i<$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                          
                        
                    

                            
                              if(in_array($dd,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }


                        
                        if($checkinday=='Fri' || $checkinday=='Sat' || $pub=='PUB')
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
                       echo'<p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center; border-bottom: 1px dotted;"> </p><p style="font-weight: bold; color: rgb(34, 117, 13); margin-bottom: 0px; text-align: center;">Non Member Rate</p>';
                    }

                       //remainingroom


                       for ($i=$date_from; $i<$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                        
                         
                              if(in_array($dd,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }


                        
                        if($checkinday=='Fri' || $checkinday=='Sat' || $pub=='PUB')
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

                          
                        
                    

                             
                              if(in_array($dd,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }


                        
                        if($checkinday=='Fri' || $checkinday=='Sat' || $pub=='PUB')
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

}//------------------------------------------------------------------------------------













       ?>




    </td>
    
    <td width="101" style="padding: 10px;"><div align="right"><strong>RM<?php echo $a['subtotal'];?></strong></div></td>
  </tr>
  <tr style="font-size: 12px;">
  <td> </td>
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
    
    <td width="101" style="padding: 10px;"><div align="right"><strong>RM<?php echo $a['addonamount'];?></strong></div></td>
  </tr>
   
 
 
</table>

<table width="650" height="300" border="0" align="center" style="border-left: 1px solid black;border-right: 1px solid black;">
  <tr>
  
  </tr>
</table>

<table width="650" border="0" align="center"  style="padding:10px;border-left: 1px solid black;border-right: 1px solid black;border-top: 1px dotted black; border-bottom: 1px solid black; font-size:12px;">
  <tr>
    <td></td>
    <td></td>
    <td  align="right" style="padding:10px;">
   <strong>Sub Total</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong>RM<?php echo $a['grandtotal'];?></strong></div></td>
  </tr>
  <!--  <tr style="font-size: 14px; line-height: 20px;">
   <td></td>
    <td></td>
    <td  align="right">
  GST @ 6%</td>
    <td width="107"><div align="center">
     <div align="right"><strong>RM<?php echo $a['servicetaxamount'];?></strong></div></td>
  </tr> -->

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
   Service Tax @ 5%</td>
    <td width="107"><div align="center">
    <div align="right"><strong>RM<?php echo $a['servicetaxamounts'];?></strong></div></td>
  </tr>
   
  <tr>
  <td> <!-- <strong>Refundable Deposit Amount</strong> --></td>
    <td><!-- <strong>RM<?php echo $a['depositamount'];?></strong> --></div></td>
    <td  align="right">
   <strong>Total Amount</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong>RM<?php echo $a['totalamount'];?></strong></div></td>
  </tr>
  <tr>
  <td><strong>Extra Charges</strong></td>
    <td><strong><?php if($a['fineamount']=="" || $a['fineamount']=="0"){}else{echo 'RM';}?><?php echo $a['fineamount'];?></strong></td>
    <td  align="right">
   <strong>Online Paid Amount</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong>RM<?php echo $a['advanceamount'];?></strong></div></td>
  </tr>
  
  <tr>
 <td> <strong>Remarks</strong></td>
    <td><strong><?php echo $a['remarks'];?></strong></td>
    <td  align="right">
   <strong>Non Return Amount</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong><?php if($a['returnamount']=="Nill"){}else{echo 'RM';}?><?php echo $a['returnamount'];?></strong></div></td>
  </tr>
   
   
   
   
  <tr>
    <td><!--  <strong>Deposit Refund Amount</strong> --></td>
    <td><!-- <strong>RM<?php echo $a['refundamount'];?></strong> --></td>
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

                                $(document).ready(function(){



                                  window.print();



                                });

                              </script>