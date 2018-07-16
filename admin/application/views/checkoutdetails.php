 <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>                    
                    <li><a href="#">Check-out Reports</a></li>
                    <li class="active">Check-out Details</li>
                </ul>
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Check Out Details</h2>
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
            $pnrnumber=$row['pnrnumber'];

            $dat=$this->db->where('pnr_number',$pnrnumber)->get('bookingrooms')->result_array();

           // echo "<pre>";
           // print_r($dat);
    
      foreach ($dat as $a) 
         {

         $adults=$a['adults'];
         $children=$a['children'];
         $state=$a['state'];
         $country=$a['country'];
         $icnumber=$a['icnumber'];
         $line1=$a['line1'];
         $line2=$a['line2'];
         $city=$a['city'];
         $postcode=$a['postcode'];
         $bookingtype=$a['bookingtype'];
         $transcation_id=$a['transcation_id'];
           
        //     $adults=$a['noofadults'];
        //     $children=$a['children'];                       
       }

       $dats=$this->db->where('pnrnumber',$pnrnumber)->get('bookingroom')->result_array();
       foreach ($dats as $b) 
         {

         $depositamount=$b['depositamount'];
         $advanceamount=$b['advance_amount'];
                    
                            
       }



?>
    <div class="panel-body my-table table-responsive" style="border: 1px solid black; height: auto; background: #474822 none repeat scroll 0% 0%; border-radius: 6px; color: white;">
        <table style="width: 100%;">
            <tr>
            <td align="center" colspan="6"><strong style="font-size: 20px;">Customer Details</strong></td>
            </tr>
            <tr style="font-size: 14px;">
                <td style="width: 115px;padding: 10px;">Name</td>
                <td style="padding: 10px;">:</td>
                <td style="width: 350px;padding: 10px;font-weight: bold;"><?php echo $row['name'];?></td>
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
                <td style="padding: 10px;font-weight: bold;"><?php echo $bookingtype;?></td>

            </tr>
            <tr style="font-size: 14px;">
                <td style="padding: 10px;">Mobile No</td>
                <td style="padding: 10px;">:</td>
                <td style="padding: 10px;font-weight: bold;"><?php echo $row['mobileno'];?></td>
                <td style="padding: 10px;">Transcation Id</td>
                <td style="padding: 10px;">:</td>
                <td style="padding: 10px;font-weight: bold;"><?php echo $transcation_id;?></td>

            </tr>
            
            <tr style="font-size: 14px;">
                <td>Nube Member</td>
                <td style="padding: 10px;">:</td>
                <td style="padding: 10px;font-weight: bold;"><?php if($row['nubememberid']==''){ echo 'No';}else{echo $row['nubememberid']; } ?></td>
                <td style="padding: 10px;">Check In Date</td>
                <td style="padding: 10px;">:</td>
                <td style="padding: 10px;font-weight: bold;"><?php $a=$row['checkindate']; $b=date('d/m/Y',strtotime($a)); echo $b;?>&nbsp;-&nbsp;<?php echo $row['checkintime'];?></td>

            </tr>

            <tr style="font-size: 14px;">
                <td style="padding: 10px;">Inspected By</td>
                <td style="padding: 10px;">:</td>
                <td style="padding: 10px;font-weight: bold;"><?php echo $row['inspectedby'];?></td>
                <td style="padding: 10px;">Check Out Date</td>
                <td style="padding: 10px;">:</td>
                <td style="padding: 10px;font-weight: bold;"><?php $a=$row['checkoutdate']; $b=date('d/m/Y',strtotime($a)); echo $b;?>&nbsp;-&nbsp;<?php echo $row['checkouttime'];?></td>

            </tr>

            <tr style="font-size: 14px;">
                <td style="padding: 10px;">Children</td>
                <td style="padding: 10px;">:</td>
                <td style="padding: 10px;font-weight: bold;"><?php echo $children;?></td>
                <td style="padding: 10px;">Bill Number</td>
                <td style="padding: 10px;">:</td>
                <td style="padding: 10px;font-weight: bold;"><?php echo $row['billnumber']; ?></td>

            </tr>

           

             <tr style="font-size: 14px;">
                <td style="padding: 10px;" valign="top">Address</td>
                <td style="padding: 10px;" valign="top">:</td>
                <td  style="padding: 10px;font-weight: bold;" valign="top">
                <p><?php echo $line1;?>,<?php echo $line2;?></p>
                <p><?php echo $city;?>,<?php echo $state;?></p>
                 <p><?php echo $country;?>-<?php echo $postcode;?></p>
                </td>
                <td style="padding: 10px;" valign="top">IC Number</td>
                <td style="padding: 10px;" valign="top">:</td>
                <td style="padding: 10px;font-weight: bold;" valign="top"><?php echo $icnumber;?></td>

            </tr>


            
        </table>
        

        <table style="width: 100%; border-bottom: 3px solid;">
            <tr style="font-size: 14px;">
            <td style="padding: 10px;">No of Units&nbsp;:&nbsp;</td>
            <td style="padding: 10px;width: 200px;font-weight: bold;"><?php echo $row['noofroom']; ?></td>
            <td style="padding: 10px;">Room Type&nbsp;:&nbsp;</td>
            <td style="padding: 10px;width: 220px;font-weight: bold;"><?php echo $row['room_type']; ?></td>
            <td style="padding: 10px;">No of Pax&nbsp;:&nbsp;</td>
            <td style="padding: 10px;font-weight: bold;"><?php echo $adults;?></td>
            </tr>
        </table>

         <?php 

     $datas001=$this->db->where('pnr_number',$pnrnumber)->get('bookingrooms')->result_array();

       
          foreach ($datas001 as $a001)
             {
                 $promocodea=$a001["promocode"];
             }

    ?>


        <table style="width: 100%;">
            <tr>
             <td align="center" colspan="6"><strong style="font-size: 20px;">Payment Details</strong></td>
             </tr>
             <tr style="font-size: 14px;">
                <td style="width: 140px;padding: 10px;"><!-- Refund Deposit Amount --></td>
                <td style="padding: 10px;"><!-- : --></td>
                <td style="width: 350px;padding: 10px;font-weight: bold;"></td>
                <td style="width: 170px;padding: 10px;"><?php if($promocodea!=''){?><span>(Using Promocode)</span><?php }?>&nbsp;Online Paid Amount</td>
                <td style="padding: 10px;">:</td>
                <td style="padding: 10px;font-weight: bold;"><?php echo $advanceamount;?></td>

            </tr>
        </table>
      
        <table style="width: 50%;" border="1" cellspacing="1" cellpadding="8" align="left">
            <tr>
             <td align="center" colspan="4"><strong style="font-size: 20px;">Add-on Advance Details</strong></td>
             </tr>
             <tr style="font-size: 14px;">
                <td style="width: 50px;">S.No</td>
                <td style="padding: 10px;width: 150px;">Date</td>
                <td style="width: 150px;padding: 10px;">Time</td>
                <td style="width: 170px;padding: 10px;">Amount</td>
             </tr>
             <?php 
             $data=$this->db->where('pnr_number',$pnrnumber)->get('payadvance')->result_array();
             if($data)
             {
                $i=1;
                foreach ($data as $c) {
                  
             ?>
             <tr style="font-size: 14px;">
                <td style="width: 50px;padding: 10px;"><?php echo $i++;?></td>
                <td style="padding: 10px;width: 150px;"><?php echo $c['date'];?></td>
                <td style="width: 150px;padding: 10px;"><?php echo $c['time'];?></td>
                <td style="width: 170px;padding: 10px;"><?php echo $c['advanceamount'];?></td>
             </tr>
             <?php }

             }?>

        </table>
      <!--   </div>
        <div class="col-md-6"> -->
        <table style="width: 50%;" border="1" cellspacing="1" cellpadding="8" align="right">
            <tr>
             <td align="center" colspan="4"><strong style="font-size: 20px;">Add-on Details</strong></td>
             </tr>
             <tr style="font-size: 14px;">
                <td style="width: 50px;">S.No</td>
                <td style="padding: 10px;width: 150px;">Date</td>
                <td style="width: 150px;padding: 10px;">Time</td>
                 <td style="width: 150px;padding: 10px;">Particular</td>
                <td style="width: 170px;padding: 10px;">Amount</td>
             </tr>
             <?php 
             $data1=$this->db->where('pnr_number',$pnrnumber)->get('payadon')->result_array();
             if($data1)
             {
                $i=1;
                foreach ($data1 as $d) {
                  
             ?>
             <tr style="font-size: 14px;">
                <td style="width: 50px;padding: 10px;"><?php echo $i++;?></td>
                <td style="padding: 10px;width: 150px;"><?php echo $d['date'];?></td>
                <td style="width: 150px;padding: 10px;"><?php echo $d['time'];?></td>
                <td style="width: 150px;padding: 10px;"><?php echo $d['particular'];?></td>
                <td style="width: 170px;padding: 10px;"><?php echo $d['amount'];?></td>
             </tr>
             <?php }

             }?>

        </table>
       <div></div>

         <table style="width: 100%;border-top: 3px solid;">
            <tr>
             <td align="center" ><strong style="font-size: 20px;">Billing Details</strong></td>
             </tr>
             
        </table>
        <table  align="center">
  <tr style="font-size: 15px; line-height: 20px;">
    <td colspan="4">
      <?php
      endforeach;
foreach ($details as $a) : 
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
						
						 if(in_array($dd,$holidaysdate))
                           {
                            $pub='PUB';
                           }
                           else
                           {
                               $pub='';
                           }

                        
                        if($checkinday=='Sat' || $checkinday=='Sun' || $pub=='PUB')
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



                          echo' <div style="padding: 5px;  line-height: 13px;"><table><tr><td style="list-style: outside none none;  margin-left: 10px; width: 170px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 170px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofrooms.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table></div>';
                      
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
                          <div style="background:  #655E61 none repeat scroll 0% 0%; padding: 5px; border-radius: 5px; line-height: 25px;">
                          <table><tr><td style="list-style: outside none none;  margin-left: 10px; width: 170px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 170px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofroomss.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>
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
                     
                          echo' <div style="padding: 5px;  line-height: 13px;"><table><tr><td style="list-style: outside none none;  margin-left: 10px; width: 170px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 170px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofroomss1.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table></div>';
                      
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

                          echo' <div style="padding: 5px; background:  #655E61 none repeat scroll 0% 0%; line-height: 13px;"><table><tr><td style="list-style: outside none none;  margin-left: 10px; width: 170px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 170px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofroomss.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table></div>';
                      
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

                          echo' <div style="padding: 5px;  line-height: 13px;"><table><tr><td style="list-style: outside none none;  margin-left: 10px; width: 170px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 170px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofrooms.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table></div>';
                      
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
                          <div style="background:  #655E61 none repeat scroll 0% 0%; padding: 5px;  line-height: 13px;">
                          <table><tr><td style="list-style: outside none none;  margin-left: 10px; width: 170px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 170px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofroomss.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table>
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

                          echo' <div style="padding: 5px;  line-height: 13px;"><table><tr><td style="list-style: outside none none;  margin-left: 10px; width: 170px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 170px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofroomss1.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table></div>';
                      
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

                          echo' <div style="padding: 5px; background:  #655E61 none repeat scroll 0% 0%; line-height: 13px;"><table><tr><td style="list-style: outside none none;  margin-left: 10px; width: 170px;">'.$dds.'&nbsp;'.$checkinday.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td Style="width: 170px;" >(   MYR '.number_format($amount, 2, '.', '').'  ) X '.$noofroomss.'</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>=</td></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.number_format($subtotal, 2, '.', '').'</td></tr></table></div>';
                      
                       }


                }    

        }
                        
                        

  } 


       ?>




    </td>
    
    <td width="101"><div align="right"><strong><?php echo $a['subtotal'];?></strong></div></td>
  </tr>
 
   
 
 
</table>
<table  style="font-size:15px;">
<tr>
    <td width="640" align="right" style="padding:10px;">
   <strong>Add-on Amount</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong><?php echo $a['addonamount'];?></strong></div></td>
  </tr>
  <tr>
    <td width="640" align="right" style="padding:10px;">
   <strong>Sub Total</strong></td>
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
  <tr style="font-size: 14px; line-height: 20px;">
    <td width="527" align="right">
  Service Charge @ 5%</td>
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
   <strong>Balance Amount</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong><?php echo $a['balanceamount'];?></strong></div></td>
  </tr>
  <tr>
    <td width="527" align="right">
   <strong>Return Amount</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong><?php echo $a['returnamount'];?></strong></div></td>
  </tr>
  <!--  <tr>
    <td width="527" align="right">
   <strong>Refund Deposit Amount</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong><?php echo $a['depositamount'];?></strong></div></td>
  </tr> -->
   <tr>
    <td width="527" align="right">
   <strong>Extra Charges</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong><?php echo $a['fineamount'];?></strong></div></td>
  </tr>
   <tr>
    <td width="527" align="right">
   <strong>Remarks</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong><?php echo $a['remarks'];?></strong></div></td>
  </tr>
  <!--  <tr>
    <td width="527" align="right">
   <strong>Refund Amount</strong></td>
    <td width="107"><div align="center">
    <div align="right"><strong><?php echo $a['refundamount'];?></strong></div></td>
  </tr> -->
</table>
       



    </div>

<?php endforeach;?>
</div>
                            <!-- END DEFAULT DATATABLE -->

   

    
 







    


 <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/bootstrap/bootstrap.min.js"></script>




<script>
$('#check_out_reports').addClass('active');
$( "#room_book" ).removeClass( "xn-openable" ).addClass( "xn-openable active" );

</script>
