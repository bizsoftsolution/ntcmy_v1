<?php

include_once "db/connection.php";

        $checkinddate=$_POST['checkindate'];
        $checkoutddate=$_POST['checkoutdate'];
        $numofdays=$_POST['numofdays'];
		$halltype=$_POST['halltype'];
        $auditorium=$_POST['auditorium'];
        
        $slot=$_POST['slot'];

        
		
        if($halltype=='')
        {

            echo '  <div class="table-responsive">
                <table class="table table-striped table-bordered table-striped">
                               
                <tbody>
                <tr>
                <td style="color: red; font-weight: bold; font-size: 16px;">Please Select Hall Type</td>
                </tr>
                </tbody>
                </table>
                </div>
                <script>
                    $(".submit_hide").hide();       
                </script>
                ';

        }
        else
        {

            $date1 = str_replace('/', '-', $checkinddate);
           $checkindates= date('Y-m-d', strtotime($date1));

             $date2 = str_replace('/', '-', $checkoutddate);
           $checkoutdates= date('Y-m-d', strtotime($date2));
	
	$chinmonth = date("m",strtotime($checkindates));
	$chotmonth = date("m",strtotime($checkoutddate));
	$chotidate = date("d",strtotime($checkindates));
	$chotodate = date("d",strtotime($checkoutdates));
	//echo $chinmonth;
	//echo $chotidate;
	$disc ="";
	if($chinmonth == '07' || (($chinmonth == '08') && ($chotidate <= '5')) || $chinmonth == '7' || (($chinmonth == '8') && ($chotidate <= '5')) )
	{
		 
                echo '  <div class="table-responsive">
                <table class="table table-striped table-bordered table-striped">
                               
                <tbody>
                <tr>
                <td style="color: red; font-weight: bold; font-size: 16px;">'.$halltype.' Hall Are Not Available in this '.$slot.' .</td>
                </tr>
                </tbody>
                </table>
                </div>
                <script>
                    $(".submit_hide").hide(); 

                          
                </script>
                ';
                 

                
            
	}
	else{

           

    $date11=date_create($checkindates);
    $date22=date_create($checkoutdates);
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


        $hallamt =mysql_query("SELECT * FROM halltypes where auditorium='".$auditorium."' and halltype='".$halltype."'")or die(mysql_error());

                                  while($row = mysql_fetch_array($hallamt))
                                  {

                                    $hallamount=$row['amount'];
                                    $seats=$row['seats'];

                                }
   


        $query_update1 =mysql_query("SELECT * FROM hallbooking WHERE ((checkindate between '".$checkindates."' AND '".$checkoutdates."') OR (checkoutdate between '".$checkindates."' AND '".$checkoutdates."')) and  halltype='".$halltype."' and slot='".$slot."' and ad_status='1' and check_out='0'");

         $count=mysql_num_rows($query_update1);

         //echo $count;
        


            if($count=='0')
            {
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
                

                echo '  <div class="table-responsive">
                <table class="table table-striped table-bordered table-striped">
                <thead>
                <tr>
                <th>Auditorium</th>
                <th>Hall Type</th>
                <th>Number of Days</th>
                <th>Amount</th>
                <th>Slot</th>
                <th>Total</th>
                </tr>
                </thead>
                
                <tbody>
                <tr>
                <td>'.$auditorium.'</td>
                <td>'.$halltype.'</td>
                <td>'.$resu.'</td>
                 <td>'.number_format($hallamount, 2, '.', '').' x '.$resu.'</td>
                 <td>'.$slot.'&nbsp;('.number_format($totala, 2, '.', '').' x '.$one.')</td>
                <td>RM : '.number_format($total, 2, '.', '').'</td>
                </tr>
                <tr>
                <thead>
                <th colspan="4">Other Facilities</th>
                <th >Rates</th>
                <th>Amount</th>
                </tr>
                </thead>
                <tr>
                <td colspan="4">LCD Projector with Screen</td>
                <td> 

                        <input id="facilities10"  name="facilitiess1[]"  type="radio" value="">
                        <label for="">None</label>
                
                <br>
                
                       <input id="facilities11"  name="facilitiess1[]"  type="radio" value="LCD Projector with Screen@300@4 hours">
                        <label for="">RM300 / 4 hours</label>
                
                <br>
               
                       <input id="facilities12" name="facilitiess1[]"  type="radio" value="LCD Projector with Screen@600@8 hours">
                        <label for="">RM600 / 8 hours</label>
              
                <br>
              
                       <input id="facilities13" name="facilitiess1[]"  type="radio" value="LCD Projector with Screen@900@12 hours">
                        <label for="">RM900 / 12 hours</label>
               
                <br>
                
                       <input id="facilities14" name="facilitiess1[]"  type="radio" value="LCD Projector with Screen@1200@16 hours">
                        <label for="">RM1200 / 16 hours</label>
               
                <br>
               
                       <input id="facilities15" name="facilitiess1[]"  type="radio" value="LCD Projector with Screen@1500@20 hours">
                        <label for="">RM1500 / 20 hours</label>
               
                     
                </td>
                <td ><div class="faciamount1"></div><input type="hidden" name="facilities[]"  class="facilities1" value=""><input type="hidden" name="facilitiesamounts[]"  class="faciamount1" value=""><input type="hidden" name="hours[]"  class="facihour1" value=""></td>
                </tr>



                <tr>
                <td colspan="4">OHP Projector with Screen</td>
                <td> 

                 <input id="facilities20"  name="facilitiess2[]"  type="radio" value="">
                        <label for="">None</label>
                
                <br>
               
                       <input id="facilities21" name="facilitiess2[]"  type="radio" value="OHP Projector with Screen@60@4 hours">
                        <label for="">RM60 / 4 hours</label>
                   <br>

                        <input id="facilities22" name="facilitiess2[]"  type="radio" value="OHP Projector with Screen@120@8 hours">
                        <label for="">RM120 / 8 hours</label>

                      <br>

                        <input id="facilities23" name="facilitiess2[]"  type="radio" value="OHP Projector with Screen@180@12 hours">
                        <label for="">RM180 / 12 hours</label>
                        
                      <br>

                        <input id="facilities24" name="facilitiess2[]"  type="radio" value="OHP Projector with Screen@240@16 hours">
                        <label for="">RM240 / 16 hours</label>
                        
                       <br>

                        <input id="facilities25" name="facilitiess2[]"  type="radio" value="OHP Projector with Screen@300@20 hours">
                        <label for="">RM300 / 20 hours</label>        
                     
                </td>
                 <td><div class="faciamount2"></div><input type="hidden" name="facilities[]"  class="facilities2" value=""><input type="hidden" name="facilitiesamounts[]"  class="faciamount2" value=""><input type="hidden" name="hours[]"  class="facihour2" value=""></td>
                </tr>

                <tr>
                <td colspan="4">PA System with 4 microphones<br><span class="pa1" style="color: red; font-weight: bold;"></span></td>
                <td> 

                       <input id="facilities30"  name="facilitiess3[]"  type="radio" value="">
                        <label for="">None</label>
                
                       <br>
                
                       <input id="facilities31" name="facilitiess3[]"  type="radio" value="PA System with 4 microphones@250@4 hours">
                        <label for="">RM250 / 4 hours</label>

                        <br>

                        <input id="facilities32" name="facilitiess3[]"  type="radio" value="PA System with 4 microphones@500@8 hours">
                        <label for="">RM500 / 8 hours</label>

                        <br>

                        <input id="facilities33" name="facilitiess3[]"  type="radio" value="PA System with 4 microphones@750@12 hours">
                        <label for="">RM750 / 12 hours</label>

                        <br>

                        <input id="facilities34" name="facilitiess3[]"  type="radio" value="PA System with 4 microphones@1000@16 hours">
                        <label for="">RM1000 / 16 hours</label>

                        <br>

                        <input id="facilities35" name="facilitiess3[]"  type="radio" value="PA System with 4 microphones@1250@20 hours">
                        <label for="">RM1250 / 20 hours</label>
                    
                     
                </td>
                 <td><div class="faciamount3"></div><input type="hidden" name="facilities[]"  class="facilities3" value=""><input type="hidden" name="facilitiesamounts[]"  class="faciamount3" value=""><input type="hidden" name="hours[]"  class="facihour3" value=""></td>
                </tr>

                <tr>
                <td colspan="4">PA System with 2 microphones &amp; 1 Wireless<br><span class="pa2" style="color: red; font-weight: bold;"></span></td>
               <td> 
                
                       <input id="facilities40"  name="facilitiess4[]"  type="radio" value="">
                        <label for="">None</label>
                
                       <br>

                       <input id="facilities41" name="facilitiess4[]"  type="radio" value="PA System with 2 microphones &amp; 1 Wireless@300@4 hours">
                        <label for="">RM300 / 4 hours</label>

                        <br>

                        <input id="facilities42" name="facilitiess4[]"  type="radio" value="PA System with 2 microphones &amp; 1 Wireless@600@8 hours">
                        <label for="">RM600 / 8 hours</label>

                        <br>

                        <input id="facilities43" name="facilitiess4[]"  type="radio" value="PA System with 2 microphones &amp; 1 Wireless@900@12 hours">
                        <label for="">RM900 / 12 hours</label>

                        <br>

                        <input id="facilities44" name="facilitiess4[]"  type="radio" value="PA System with 2 microphones &amp; 1 Wireless@1200@16 hours">
                        <label for="">RM1200 / 16 hours</label>

                        <br>

                        <input id="facilities45" name="facilitiess4[]"  type="radio" value="PA System with 2 microphones &amp; 1 Wireless@1500@20 hours">
                        <label for="">RM1500 / 20 hours</label>
                   
                     
                </td>
                 <td><div class="faciamount4"></div><input type="hidden" name="facilities[]"  class="facilities4" value=""><input type="hidden" name="facilitiesamounts[]"  class="faciamount4" value=""><input type="hidden" name="hours[]"  class="facihour4" value=""></td>
                </tr>

                <tr>
                <td colspan="4">Large PA System with 8 - 12 microphones<br><span class="pa3" style="color: red; font-weight: bold;"></span></td>
                <td> 


                       <input id="facilities50"  name="facilitiess5[]"  type="radio" value="">
                        <label for="">None</label>
                
                        <br>
                
                       <input id="facilities51" name="facilitiess5[]"  type="radio" value="Large PA System with 8 - 12 microphones@600@4 hours">
                        <label for="">RM600 / 4 hours</label>

                        <br>

                        <input id="facilities52" name="facilitiess5[]"  type="radio" value="Large PA System with 8 - 12 microphones@1200@8 hours">
                        <label for="">RM1200 / 8 hours</label>

                        <br>
                        
                        <input id="facilities53" name="facilitiess5[]"  type="radio" value="Large PA System with 8 - 12 microphones@1800@12 hours">
                        <label for="">RM1800 / 12 hours</label>

                        <br>
                        
                        <input id="facilities54" name="facilitiess5[]"  type="radio" value="Large PA System with 8 - 12 microphones@2400@16 hours">
                        <label for="">RM2400 / 16 hours</label>

                        <br>
                        
                        <input id="facilities55" name="facilitiess5[]"  type="radio" value="Large PA System with 8 - 12 microphones@3000@20 hours">
                        <label for="">RM3000 / 20 hours</label>
                   
                     
                </td>
                 <td><div class="faciamount5"></div><input type="hidden" name="facilities[]"  class="facilities5" value=""><input type="hidden" name="facilitiesamounts[]"  class="faciamount5" value=""><input type="hidden" name="hours[]"  class="facihour5" value=""></td>
                </tr>

                <tr>
                <td colspan="4">Karaoke Set</td>
                <td> 
                      
                       <input id="facilities60"  name="facilitiess6[]"  type="radio" value="">
                        <label for="">None</label>
                
                        <br>

                       <input id="facilities61" name="facilitiess6[]"  type="radio" value="Karaoke Set@350@4 hours">
                        <label for="">RM350 / 4 hours</label>

                        <br>

                        <input id="facilities62" name="facilitiess6[]"  type="radio" value="Karaoke Set@700@8 hours">
                        <label for="">RM700 / 8 hours</label>


                        <br>

                        <input id="facilities63" name="facilitiess6[]"  type="radio" value="Karaoke Set@1050@12 hours">
                        <label for="">RM1050 / 12 hours</label>


                        <br>

                        <input id="facilities64" name="facilitiess6[]"  type="radio" value="Karaoke Set@1400@16 hours">
                        <label for="">RM1400 / 16 hours</label>

                        <br>

                        <input id="facilities65" name="facilitiess6[]"  type="radio" value="Karaoke Set@1750@20 hours">
                        <label for="">RM1750 / 20 hours</label>


                   
                     
                </td>
                 <td><div class="faciamount6"></div><input type="hidden" name="facilities[]"  class="facilities6" value=""><input type="hidden" name="facilitiesamounts[]"  class="faciamount6" value=""><input type="hidden" name="hours[]"  class="facihour6" value=""></td>
                </tr>

                <tr>
                <td colspan="4">Disco Music with Lighting &amp; DJ</td>
                <td> 
               
                       <input id="facilities70"  name="facilitiess7[]"  type="radio" value="">
                        <label for="">None</label>
                
                       <br>

                       <input id="facilities71" name="facilitiess7[]"  type="radio" value="Disco Music with Lighting &amp; DJ@800@4 hours">
                        <label for="">RM800 / 4 hours</label>

                        <br>

                        <input id="facilities72" name="facilitiess7[]"  type="radio" value="Disco Music with Lighting &amp; DJ@1600@8 hours">
                        <label for="">RM1600 / 8 hours</label>

                         <br>

                        <input id="facilities73" name="facilitiess7[]"  type="radio" value="Disco Music with Lighting &amp; DJ@2400@12 hours">
                        <label for="">RM2400 / 12 hours</label>

                         <br>

                        <input id="facilities74" name="facilitiess7[]"  type="radio" value="Disco Music with Lighting &amp; DJ@3200@16 hours">
                        <label for="">RM3200 / 16 hours</label>

                         <br>

                        <input id="facilities75" name="facilitiess7[]"  type="radio" value="Disco Music with Lighting &amp; DJ@4000@20 hours">
                        <label for="">RM4000 / 20 hours</label>
                    
                     
                </td>
                 <td><div class="faciamount7"></div><input type="hidden" name="facilities[]"  class="facilities7" value=""><input type="hidden" name="facilitiesamounts[]"  class="faciamount7" value=""><input type="hidden" name="hours[]"  class="facihour7" value=""></td>
                </tr>

                <tr>
                <td colspan="4">Use of Business Centre</td>
                <td> 
                      
                       <input id="facilities80" name="facilitiess8[]"  type="radio" value="">
                        <label for="">None</label>

                        <br>

                         <input id="facilities81" name="facilitiess8[]"  type="radio" value="Use of Business Centre@10@1 hours">
                        <label for="">RM10 / 1 hour</label>

                        <br>

                         <input id="facilities82" name="facilitiess8[]"  type="radio" value="Use of Business Centre@20@2 hours">
                        <label for="">RM20 / 2 hour</label>

                        <br>

                         <input id="facilities83" name="facilitiess8[]"  type="radio" value="Use of Business Centre@30@3 hours">
                        <label for="">RM30 / 3 hour</label>

                        <br>

                         <input id="facilities84" name="facilitiess8[]"  type="radio" value="Use of Business Centre@40@4 hours">
                        <label for="">RM40 / 4 hour</label>
                        <br>


                         <input id="facilities85" name="facilitiess8[]"  type="radio" value="Use of Business Centre@50@5 hours">
                        <label for="">RM50 / 5 hour</label>
                    
                     
                </td>
                 <td><div class="faciamount8"></div><input type="hidden" name="facilities[]"  class="facilities8" value=""><input type="hidden" name="facilitiesamounts[]"  class="faciamount8" value=""><input type="hidden" name="hours[]"  class="facihour8" value=""></td>
                </tr>

                <tr>
                <td colspan="4">Badminton Hall</td>
                <td> 
              
                       <input id="facilities90" name="facilitiess9[]"  type="radio" value="">
                        <label for="">None</label>
                        
                        <br>

                        <input id="facilities91" name="facilitiess9[]"  type="radio" value="Badminton Hall@15@2 hours">
                        <label for="">RM15 / 2 hour</label>
                        
                        <br>

                        <input id="facilities92" name="facilitiess9[]"  type="radio" value="Badminton Hall@30@4 hours">
                        <label for="">RM30 / 4 hour</label>
                        
                        <br>

                        <input id="facilities93" name="facilitiess9[]"  type="radio" value="Badminton Hall@45@6 hours">
                        <label for="">RM45 / 6 hour</label>
                        
                        <br>

                        <input id="facilities94" name="facilitiess9[]"  type="radio" value="Badminton Hall@60@8 hours">
                        <label for="">RM60 / 8 hour</label>
                        
                        <br>

                        <input id="facilities95" name="facilitiess9[]"  type="radio" value="Badminton Hall@75@10 hours">
                        <label for="">RM75 / 10 hour</label>
                  
                     
                </td>
                 <td><div class="faciamount9"></div><input type="hidden" name="facilities[]"  class="facilities9" value=""><input type="hidden" name="facilitiesamounts[]"  class="faciamount9" value=""><input type="hidden" name="hours[]"  class="facihour9" value=""></td>
                </tr>
                 <tr>
                <td colspan="4">Chairs - ('.$seats.')</td>
                <td> 
              
                       <input id="facilities100" name="facilitiess10[]"  type="radio" value="">
                        <label for="">None</label>
                        
                        <br>

                        <input id="facilities101" name="facilitiess10[]"  type="radio" value="Chairs@0.20@4 hours@'.$seats.'">
                        <label for="">RM0.20 / 4 hour</label>
                        
                        <br>

                        <input id="facilities102" name="facilitiess10[]"  type="radio" value="Chairs@0.40@8 hours@'.$seats.'">
                        <label for="">RM0.40 / 8 hour</label>
                        
                        <br>

                        <input id="facilities103" name="facilitiess10[]"  type="radio" value="Chairs@0.60@12 hours@'.$seats.'">
                        <label for="">RM0.60 / 12 hour</label>
                        
                        <br>

                        <input id="facilities104" name="facilitiess10[]"  type="radio" value="Chairs@0.80@16 hours@'.$seats.'">
                        <label for="">RM0.80 / 16 hour</label>
                        
                        <br>

                        <input id="facilities105" name="facilitiess10[]"  type="radio" value="Chairs@1.00@20 hours@'.$seats.'">
                        <label for="">RM1.00 / 20 hour</label>
                  
                     
                </td>
                 <td><div class="faciamount10"></div><input type="hidden" name="facilities[]"  class="facilities10" value=""><input type="hidden" name="facilitiesamounts[]"  class="faciamount10" value=""><input type="hidden" name="hours[]"  class="facihour10" value=""></td>
                </tr>
                  <tr>
                <td colspan="4">Tables</td>
                <td> 
              
                       <input id="facilities110" name="facilitiess11[]"  type="radio" value="">
                        <label for="">None</label>
                        
                        <br>

                        <input id="facilities111" name="facilitiess11[]"  type="radio" value="Tables@2.00@4 hours">
                        <label for="">RM2.00 / 4 hour</label>
                        
                        <br>

                        <input id="facilities112" name="facilitiess11[]"  type="radio" value="Tables@4.00@8 hours">
                        <label for="">RM4.00 / 8 hour</label>
                        
                        <br>

                        <input id="facilities113" name="facilitiess11[]"  type="radio" value="Tables@6.00@12 hours">
                        <label for="">RM6.00 / 12 hour</label>
                        
                        <br>

                        <input id="facilities114" name="facilitiess11[]"  type="radio" value="Tables@8.00@16 hours">
                        <label for="">RM8.00 / 16 hour</label>
                        
                        <br>

                        <input id="facilities115" name="facilitiess11[]"  type="radio" value="Tables@10.00@20 hours">
                        <label for="">RM10.00 / 20 hour</label>
                  
                     
                </td>
                 <td><div class="faciamount11"></div><input type="hidden" name="facilities[]"  class="facilities11" value=""><input type="hidden" name="facilitiesamounts[]"  class="faciamount11" value=""><input type="hidden" name="hours[]"  class="facihour11" value=""></td>
                </tr>
                <tr>
                <thead>
                <th colspan="5" align="right">Grand Total</th>
                <th><div class="grandtotal"></div><input type="hidden" name="grandtotal"  class="grandtotal" value=""></th>
                </tr>
                
                 <tr>
                <thead>
                <th colspan="5" align="right">Cleaning Charge(RM 20.00)</th>
                <th><div class="cleaningcharge">20.00</div><input type="hidden" name="cleaningcharge"  class="cleaningcharge" value="20.00"></th>
                </tr>
                 <tr>
                <thead>
                <th colspan="5" align="right">Total Amount</th>
                <th><div class="totalamount"></div><input type="hidden" name="totalamount"  class="totalamount" value=""></th>
                </tr>
                </thead>
                
                                               
                </tbody>
                </table>
                </div>
                
                    <input type="hidden" name="hallamount" id="hallamount" class="hallamount" value="'.$hallamount.'">
                     <input type="hidden" name="seats" id="seats" class="seats" value="'.$seats.'">

                     <input type="hidden" name="total" id="total" class="" value="'.$total.'">
                   

                <script>
                    $(".submit_hide").show();

                </script>';
            }
            else
            {

                echo '  <div class="table-responsive">
                <table class="table table-striped table-bordered table-striped">
                               
                <tbody>
                <tr>
                <td style="color: red; font-weight: bold; font-size: 16px;">'.$halltype.' Hall Are Not Available in this '.$slot.' .</td>
                </tr>
                </tbody>
                </table>
                </div>
                <script>
                    $(".submit_hide").hide(); 

                          
                </script>
                ';
                 

                
            }

		}
     
		}
?>