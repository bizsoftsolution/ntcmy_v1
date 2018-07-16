<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<div style="margin:0 auto;">
           
        

<table align="center" style="border:2px solid #222;border-radius:05px;padding:10px;font-family:Gotham, 'Helvetica Neue', Helvetica, Arial, sans-serif;"><tr><td>
<table width="810" >
  <tr>
    <td align="left" valign="top">
     <b>NUBE Training Centre (NTC)</b>

    </br>
    <span style="font-weight:bold;font-size:16px;">KM 13.5 Jalan Pantai, Teluk Kemang<br> 71050 Port Dickson <br>[T] 606-6625207</span><br>info@ntc.my
    </td>
    <td align="right" valign="top" >
      <img style="width:242px;height:123px;" valign="center" src="<?php echo base_url();?>assests/img/logo.png"></td>
  </tr>
</table>
<?php foreach ($bb as $a) : 

$checkind=$a['datefrom'];

$date1 = str_replace('-', '/', $checkind);
  $checkin= date('d/m/Y', strtotime($date1));



?>

 
<table align="center" width="810" style="border-top:2px solid #222;">
  <tr>
    <td width="300" ><div style="border-bottom:none;width:18%;float:left;">Date :</div><div style="border-bottom:1px solid#222;width:80%;float:left;text-align:center;"><b><?php echo $checkin;?> &nbsp;<?php echo $a['time'];?></b></div></td>

    <td width="300" align="center" valign="middle"><div style="background:#999;color:#222;width:102px;border-radius:5px;padding:5px;border:2px solid #222;"><b>Cash Receipt</b></div></td>
    <td width="300" style="text-align:right;">RN :&nbsp;<b><?php echo $a['pnrnumber'];?></b></td>
  </tr>
</table>
<table align="center" width="810" style="border-radius:05px;margin-top:10px;" >
  <tr style="height:35">
    <td><div style="border-bottom:none;float:left;">Name:&nbsp;</div> <div style="border-bottom:1px dotted#222;width:78%;float:left;"><b><?php echo $a['name'];?></b></div></td>
    <td><div style="border-bottom:none;float:left;">No of Units:&nbsp;</div> <div style="border-bottom:1px dotted#222;width:60%;float:left;"><b><?php echo $a['noofrooms'];?></b></div></td>
  </tr>
    <tr style="height:35">
    <td><div style="border-bottom:none;float:left;">Online Paid Amount :&nbsp;</div> <div style="border-bottom:1px dotted#222;width:41%;float:left;"><b>RM<?php echo $a['advance_amount'];?></b></div></td>

    <td><div style="border-bottom:none;float:left;">Extra Bed to be Provided:&nbsp;</div> <div style="border-bottom:1px dotted#222;width:42%;float:left;"><b><?php echo $a['extrabed'];?></b></div></td>
  </tr>
  
  <tr style="height:35" >
    <td colspan="2"><div style="border-bottom:none;float:left;">Amount in words:&nbsp;</div> <div style="border-bottom:1px dotted#222;width:78%;float:left;"><b><?php echo $aa;?></b></div></td>
   
  </tr>

    
    
 
  </table>

<?php endforeach;?>
<table  align="center" width="803" style="margin-top:35px;">
<tr>
<td width="280"><div style="border-bottom:none;width:45%;float:left;">Receiver's Sign:</div> <div style="border-bottom:2px dotted#222;width:55%;float:left;">&nbsp;&nbsp;&nbsp;</div></td>
<td width="273"><div style="border-bottom:none;width:48%;float:left;">Authorised Sign:</div>
 <div style="border-bottom:2px dotted#222;;width:52%;float:left;">&nbsp;&nbsp;&nbsp;</div></td></tr>
</table></td></tr>
</table>
<p>&nbsp;</p>





  <script type="text/javascript" src="<?php echo base_url();?>assests/js/plugins/jquery/jquery.min.js"></script>


   <script type="text/javascript">
       $(document).ready(function(){

        window.print();
        
       });
        </script>