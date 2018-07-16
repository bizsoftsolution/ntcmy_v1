<?php

include_once "db/connection.php";
         $checkind=$_POST['checkin'];
        $checkoutd=$_POST['checkout'];
        $roomtypeid=$_POST['roomtypeid'];
        $room_nos=$_POST['room_no'];
        // $checkoutday=$_POST['checkoutday'];
        // $checkinday=$_POST['checkinday'];
        $nubememberid=$_POST['nubememberid'];
        $drombed=$_POST['dormbed'];
        $adults=$_POST['adults'];
           
        if($room_nos=='')
        {
            $room_no=1;
        }
        else
        {
            $room_no=$room_nos;
        }

        

     // $checkind='15/02/2016';
     // $checkoutd='2016-02-16';
     // $roomtype='2';
     // $room_no='2';
        

    $date1 = str_replace('/', '-', $checkind);
    $checkin= date('Y-m-d', strtotime($date1));

   

    $date2 = str_replace('/', '-', $checkoutd);
    $checkout= date('Y-m-d', strtotime($date2));

 

    $date11=date_create($checkin);
    $date22=date_create($checkout);
    $diff=date_diff($date11,$date22);
    $resus= $diff->format("%a ");
   
    if($resus==0)
    {
        $resu='1';
    }
    else
    {
        $resu=$resus;
    }
     //echo $resu;

    $type =mysql_query("SELECT * FROM roomtypes WHERE id='".$roomtypeid."'");
     

            while($row = mysql_fetch_array($type))
  
            {
                $roomtype=$row['roomtype'];
                $memberweekdaysamount=$row['memberweekdaysamount'];
                $memberweekendamount=$row['memberweekendamount'];
                $publicweekdaysamount=$row['publicweekdaysamount'];
                $publicweekendamount=$row['publicweekendamount'];

           }

         if($roomtypeid==4) 
         {

                $query_update1 =mysql_query("SELECT * FROM bookingrooms WHERE ((checkin between '".$checkin."' AND '".$checkout."') OR (checkout between '".$checkin."' AND '".$checkout."')) and  roomtypeid='".$roomtypeid."' and  drombed='".$drombed."' and  ad_status='1' and check_out=0");

        
                 // $ff =mysql_fetch_array( $query_update1)or die(mysql_error());
                 $count=mysql_num_rows($query_update1);

                    //echo $count;

         } 
         else
         {

                $query_update1 =mysql_query("SELECT * FROM bookingrooms WHERE ((checkin between '".$checkin."' AND '".$checkout."') OR (checkout between '".$checkin."' AND '".$checkout."')) and  roomtypeid='".$roomtypeid."'  and  ad_status='1' and check_out=0");

        
                 // $ff =mysql_fetch_array( $query_update1)or die(mysql_error());
                 $count=mysql_num_rows($query_update1);

         }

            
        


        

     if($count=='0')
     {


        
              $type =mysql_query("SELECT * FROM roomnotable WHERE roomtypeid='".$roomtypeid."'");
       $types=mysql_num_rows($type);

         //echo $types;

          
         $result=$types-$room_no;

         
         //echo $result;

         if($result>=0)
         {


         
            $subtotal=$amount*$room_no;
            $subtotal1=$subtotal*$resu;
            $total=$subtotal1;


        $html= '    <div class="table-responsive">
                <table class="table table-striped table-bordered table-striped">
                <thead>
                <tr>
                 <th>Check In</th>
                 <th>Check Out</th>
                 <th>No of Units</th>
                 <th>No of Persons</th>
                <th>Details</th>
                <th style="text-align: center;">Total</th>
                </tr>
                </thead>
                
                <tbody>
               
                 
               <tr>
               <td>'.$checkind.'</td>
               <td>'.$checkoutd.'</td>
               <td>'.$room_no.'</td>
               <td>'.$adults.'</td>
                <td>
                    <p style="font-weight: bold; color: rgb(239, 6, 6); margin-bottom:0px;">'.$roomtype.'</p>
                ';
                        $date_from = $checkin;   
                        $date_from = strtotime($date_from);  
                        $date_to = $checkout;  
                        $date_to = strtotime($date_to); 
                         if($date_from==$date_to)
                        {

                            for ($i=$date_from; $i<=$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                         if($nubememberid=='')
                     {  
                        if($checkinday=='Sat' || $checkinday=='Sun')
                        {
                            $amount=$publicweekendamount;
                        }
                        else
                        {

                            $amount=$publicweekdaysamount;
                        }

                     }
                     else
                     {

                            if($checkinday=='Sat' || $checkinday=='Sun')
                        {
                            $amount=$memberweekendamount;
                        }
                        else
                        {

                            $amount=$memberweekdaysamount;
                        }


                     }



                      

                      //nubememberempty

                      if($nubemember=='')
                      {

                      $subtotal=$amount*$room_no;
                      $subtotals[]=$amount*$room_no;

                      $total=array_sum($subtotals);

                            $html.='<table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 110px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$room_no.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>';

                      }
                      //
                      else
                      {
                        //greaterthanone
                        if($room_no>1)
                        {
                            $romnos=$room_no-1;
                            $romnos1=1;

                            $html.='<table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 110px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$romnos1.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>';

                            $html.='<table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 110px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$romnos.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>';

                        }
                        else
                        {

                                $romnos1=1;

                            $html.='<table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 110px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$romnos1.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>';

                        }
                        //



                      }
                      //
                          
                      
                       }

                        }
                        else
                        {

                       

                        for ($i=$date_from; $i<$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                         if($nubememberid=='')
                     {  
                        if($checkinday=='Sat' || $checkinday=='Sun')
                        {
                            $amount=$publicweekendamount;
                        }
                        else
                        {

                            $amount=$publicweekdaysamount;
                        }

                     }
                     else
                     {

                            if($checkinday=='Sat' || $checkinday=='Sun')
                        {
                            $amount=$memberweekendamount;
                        }
                        else
                        {

                            $amount=$memberweekdaysamount;
                        }


                     }

                      
                      //nubememberempty

                      if($nubemember=='')
                      {

                      $subtotal=$amount*$room_no;
                      $subtotals[]=$amount*$room_no;

                      $total=array_sum($subtotals);

                            $html.='<table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 110px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$room_no.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>';

                      }
                      //
                      else
                      {
                        //greaterthanone
                        if($room_no>1)
                        {
                            $romnos=$room_no-1;
                            $romnos1=1;

                            $html.='<table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 110px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$romnos1.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>';

                            $html.='<table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 110px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$romnos.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>';

                        }
                        else
                        {

                                $romnos1=1;

                            $html.='<table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 110px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$romnos1.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>';

                        }
                        //



                      }
                      //
                      
                       }

                   }
                $html.='</td>
               
                <td align="center"  >MYR &nbsp;'.number_format($total, 2, '.', '').'</td>
                </tr>
                
                                               
                 </tbody>
                </table>
                </div>
                <input type="hidden" name="subtotal" id="subtotal" class="subtotal">
                <input type="hidden" name="subtotal1" id="subtotal1" class="subtotal1">
                 <input type="hidden" name="total" id="total" class="total" value="'.number_format($total, 2, '.', '').'" >

                <script>
                    $(".submit_hide").show();       
                </script>';

                echo $html;


         }
         else
         {

            echo '  <div class="table-responsive">
                <table class="table table-striped table-bordered table-striped">
                               
                <tbody>
                <tr>
                <td style="color: red; font-weight: bold; font-size: 16px;">'.$roomtype.' Rooms Are Not Available.</td>
                </tr>
                </tbody>
                </table>
                </div>
                <script>
                    $(".submit_hide").hide();       
                </script>
                ';
         
         //return false;
         }

         
            
    }

     else
     {
        

                while($row = mysql_fetch_array($query_update1))
      
             {
                    $roomno[]=$row['room_no'];

                    
             }

             $cc=array_sum($roomno);

        

        
         
        
                 $type =mysql_query("SELECT * FROM roomnotable WHERE roomtypeid='".$roomtypeid."'");
               $types=mysql_num_rows($type);
         

                 //echo $types;

                  $results=$types - $cc;
                 $result=$results-$room_no;

                 //echo $result;

         if($result>=0)
         {  


                $subtotal=$amount*$room_no;
            $subtotal1=$subtotal*$resu;
            $total=$subtotal1;


        $html= '    <div class="table-responsive">
                <table class="table table-striped table-bordered table-striped">
                <thead>
                <tr>
                <th>Check In</th>
                 <th>Check Out</th>
                 <th>No of Units</th>
                 <th>No of Persons</th>
                <th>Details</th>
                <th style="text-align: center;">Total</th>
                </tr>
                </thead>
                
                <tbody>
               
                 
               <tr>
              <td>'.$checkind.'</td>
               <td>'.$checkoutd.'</td>
               <td>'.$room_no.'</td>
               <td>'.$adults.'</td>
                <td>
                    <p style="font-weight: bold; color: rgb(239, 6, 6); margin-bottom:0px;">'.$roomtype.'</p>
                ';
                   $date_from = $checkin;   
                        $date_from = strtotime($date_from);  
                        $date_to = $checkout;  
                        $date_to = strtotime($date_to); 

                        if($date_from==$date_to)
                        {

                            for ($i=$date_from; $i<=$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                         if($nubememberid=='')
                     {  
                        if($checkinday=='Sat' || $checkinday=='Sun')
                        {
                            $amount=$publicweekendamount;
                        }
                        else
                        {

                            $amount=$publicweekdaysamount;
                        }

                     }
                     else
                     {

                            if($checkinday=='Sat' || $checkinday=='Sun')
                        {
                            $amount=$memberweekendamount;
                        }
                        else
                        {

                            $amount=$memberweekdaysamount;
                        }


                     }

                      //nubememberempty

                      if($nubemember=='')
                      {

                      $subtotal=$amount*$room_no;
                      $subtotals[]=$amount*$room_no;

                      $total=array_sum($subtotals);

                            $html.='<table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 110px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$room_no.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>';

                      }
                      //
                      else
                      {
                        //greaterthanone
                        if($room_no>1)
                        {
                            $romnos=$room_no-1;
                            $romnos1=1;

                            $html.='<table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 110px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$romnos1.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>';

                            $html.='<table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 110px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$romnos.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>';

                        }
                        else
                        {

                                $romnos1=1;

                            $html.='<table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 110px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$romnos1.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>';

                        }
                        //



                      }
                      //
                      
                       }

                        }
                        else
                        {

                       

                        for ($i=$date_from; $i<$date_to; $i+=86400) {  
                            $dd= date("Y-m-d", $i);
                            $dds= date("d M Y ", $i);  
                            
                           $timestamp = strtotime($dd);
                        $checkinday = date('D', $timestamp);

                         if($nubememberid=='')
                     {  
                        if($checkinday=='Sat' || $checkinday=='Sun')
                        {
                            $amount=$publicweekendamount;
                        }
                        else
                        {

                            $amount=$publicweekdaysamount;
                        }

                     }
                     else
                     {

                            if($checkinday=='Sat' || $checkinday=='Sun')
                        {
                            $amount=$memberweekendamount;
                        }
                        else
                        {

                            $amount=$memberweekdaysamount;
                        }


                     }

                      //nubememberempty

                      if($nubemember=='')
                      {

                      $subtotal=$amount*$room_no;
                      $subtotals[]=$amount*$room_no;

                      $total=array_sum($subtotals);

                            $html.='<table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 110px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$room_no.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>';

                      }
                      //
                      else
                      {
                        //greaterthanone
                        if($room_no>1)
                        {
                            $romnos=$room_no-1;
                            $romnos1=1;

                            $html.='<table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 110px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$romnos1.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>';

                            $html.='<table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 110px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$romnos.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>';

                        }
                        else
                        {

                                $romnos1=1;

                            $html.='<table><tr><td style="list-style: outside none none; color: rgb(122, 122, 122); margin-left: 10px; width: 150px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 110px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$romnos1.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>';

                        }
                        //



                      }
                      //
                      
                       }

                   }
                $html.='</td>
               
                <td align="center"  >MYR &nbsp;'.number_format($total, 2, '.', '').'</td>
                </tr>
                
                                               
                 </tbody>
                </table>
                </div>
                <input type="hidden" name="subtotal" id="subtotal" class="subtotal" >
                <input type="hidden" name="subtotal1" id="subtotal1" class="subtotal1" >
                 <input type="hidden" name="total" id="total" class="total" value="'.number_format($total, 2, '.', '').'" >

                <script>
                    $(".submit_hide").show();       
                </script>';

                echo $html;

                 

            
                
         }
         else
         {

            echo '  <div class="table-responsive">
                <table class="table table-striped table-bordered table-striped">
                               
                <tbody>
                <tr>
                <td style="color: red; font-weight: bold; font-size: 16px;">'.$roomtype.' Rooms Are Not Available.</td>
                </tr>
                </tbody>
                </table>
                </div>
                <script>
                    $(".submit_hide").hide();       
                </script>';
         
        
         }

        

            
    }

?>