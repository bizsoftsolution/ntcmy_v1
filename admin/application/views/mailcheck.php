<?php

		 foreach ($rep as $c) :

		echo'

<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td bgcolor="#9A0000"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">

<tr>
<td><img src="'.base_url().'assests/image/header_top.jpg" alt="" width="600" height="73" border="0" style="display:block" /> 

<!-- BEGIN LOGO DATE -->

<table width="600" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="10" bgcolor="#DEDEDE"></td>
<td width="227" bgcolor="#FFFFFF"><a href="#"><img src="'.base_url().'assests/image/logo.png" alt="" width="227" height="61" border="0" style="display:block" /></a></td>
<td width="167" bgcolor="#FFFFFF"></td>
<!-- <td width="186" bgcolor="#FFFFFF"><img src="'.base_url().'assests/image/logo_right.jpg" alt="" width="186" height="98" border="0" style="display:block" /></a></td>-->
<td width="10" bgcolor="#DEDEDE"></td>
</tr>
</table>

<!-- END LOGO DATE -->

<img src="'.base_url().'assests/image/header_bottom.jpg" alt="" width="600" height="25" border="0" style="display:block" /></td>
</tr>
<tr>
<td bgcolor="#EEEDE9">

<!-- BEGIN MAIN BANNER -->

<table width="530" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td><img src="'.base_url().'assests/image/spacer.gif" alt="" width="1" height="16" style="display:block" /><a href="#"><img src="'.base_url().'assests/image/main_image.jpg" alt="" width="510" height="103" border="0" /></a></td>
</tr>
</table>

<!-- END MAIN BANNER -->

<!-- BEGIN LINE -->

<div align="center"><img src="'.base_url().'assests/image/line.jpg" alt="" width="510" height="2" vspace="8" border="0" /></div>

<!-- END LINE -->

<!-- BEGIN COLUMN -->

<table width="530" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>

<td width="334" height="16" valign="top"><span style="font-family:Arial, Helvetica, sans-serif; font-size:15px; font-weight:bold;line-height: 31px;color:rgb(253, 152, 0);">Hi '.$c['name'].'</span><br />
</td>
</tr>
</table>

<!-- END COLUMN --> 

<!-- BEGIN LINE -->

<div align="center"><img src="'.base_url().'assests/image/line.jpg" alt="" width="510" height="2" vspace="8" border="0" /></div>

<!-- END LINE -->
<table width="530" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td>
<span style="font-family:Arial, Helvetica, sans-serif; font-size:15px; font-weight:bold;line-height: 31px;color:rgb(246, 17, 86);">Booking Details </span><br>
</td>
</tr>
</table>
<table width="520" border="0" align="center" cellpadding="0" cellspacing="0" >

<tr>
<!-- BEGIN COLUMN 1 -->
<td width="100" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">Check IN</td>
 <td width="5" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">:</td> 
 <td width="99" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">'. $a1=$c['datefrom']; $b1=date('d/m/Y',strtotime($a1)); echo $b1 .'</td>
 <td width="100" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">Check Out</td>
 <td width="5" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">:</td> 
 <td width="99" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">'.$a1=$c['dateto']; $b1=date('d/m/Y',strtotime($a1)); echo $b1.'</td>
</tr>
<tr>
<td  style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); "> Room No
 </td> 
 <td  style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">:</td> 
 <td  style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">'. $c['roomno'].'</td></tr>
<tr>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">Name </td>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">:</td> 
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">'. $c['name'].'</td></tr>
<tr>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">Email </td>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">:</td>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">'. $c['email'].'</td></tr>
<tr>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">Mobile No </td>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">:</td>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">'. $c['mobileno'].'</td></tr>
<tr>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">Number Of Adults</td>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">:</td>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); "> '. $c['noofadults'].'</td></tr>
<tr>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">Number Of Children</td>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">:</td>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">'. $c['children'].'</td></tr>
<tr>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">Extra Bed</td>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">:</td>';


 if($c['extrabed']=='')
 {
    echo'<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">Nill</td>';
 }
 else
 {
   echo'<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">'.$c['extrabed'].'</td>';
 }

 echo'</tr>


<!-- END COLUMN 1 -->




</table>
<!-- BEGIN FOOTER -->
<!-- BEGIN LINE -->

<div align="center"><img src="'.base_url().'assests/image/line.jpg" alt="" width="510" height="2" vspace="8" border="0" /></div>

<!-- END LINE -->
<table width="530" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td>
<span style="font-family:Arial, Helvetica, sans-serif; font-size:15px; font-weight:bold;line-height: 31px;color:rgb(246, 17, 86);">Your  Booking was Confirmed </span><br>
</td>
</tr>
</table>

<!-- BEGIN LINE -->

<div align="center"><img src="'.base_url().'assests/image/line.jpg" alt="" width="510" height="2" vspace="8" border="0" /></div>

<!-- END LINE -->
<table width="510" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>

<td width="160" align="center"><table border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="25"><a href="#"><img src="'.base_url().'assests/image/facebook_16.png" alt="facebook" width="16" height="16" border="0" /></a></td>
<td width="25"><a href="#"><img src="'.base_url().'assests/image/twitter_16.png" alt="twitter" width="16" height="16" border="0" /></a></td>
<td><a href="#"><img src="'.base_url().'assests/image/rss_16.png" alt="rss" width="16" height="16" border="0" /></a></td>
</tr>
</table></td>

</tr>
</table>

<!-- END FOOTER -->

</td>
</tr>
<tr>
<td><span style="background-color:#EEEDE9"><img src="'.base_url().'assests/image/footer1.jpg" alt="" width="600" height="30" border="0" style="display:block" /></span></td>
</tr>
<tr>
<td bgcolor="#EEEDE9"><table width="580" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td height="28" valign="bottom" style="background-color:#F90">

<!-- BEGIN CONTACT -->

<div align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#FFFFFF;"><st<strong>Anti Theft Club</strong> Copyright &copy; 2016 </div>

<!-- END CONTACT -->

</td>
</tr>
</table></td>
</tr>
<tr>
<td><span style="background-color:#EEEDE9"><img src="'.base_url().'assests/image/footer2.jpg" alt="" width="600" height="73" border="0" style="display:block" /></span></td>
</tr>
</table></td>
</tr>
</table>
';
 
endforeach;


		


	





	