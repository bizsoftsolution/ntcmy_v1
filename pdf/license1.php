<?php
require_once ('mpdf.php');
require_once ('../conn.php');

 $mpdf = new mPDF('win-1252', 'A4', '', '', 8, 8, 8, 8, '', '');
 //$mpdf -> useOnlyCoreFonts = true;
 $mpdf -> SetDisplayMode('fullpage');
 
  //$stylesheet = file_get_contents('s.css');
  //$mpdf->WriteHTML($stylesheet,1);
  
  
 
 $html = '
 <table width="100%" style="border-collapse:collapse; border:1px solid #00f;" >
    <tr>
      <td colspan="2" style="color:#00f;">Cell : 99423 57980</td>
      <td class="1" colspan="5" style="border-right:1px solid #00f; color:#00f; text-align:center;"><span style="font-size:24px;"><b>SUN  MILK  PRODUCTS</b></span></td>
      
      <td colspan="2" style="border-bottom:1px solid #00f; text-align:center; width:146px; background-color:#00f; color:#fff; height:25px;">INVOICE</td>
      
      
    </tr>
    <tr>
      <td colspan="2" style="color:#00f;">TIN : 33063065016</td>
      <td colspan="5" style="border-right:1px solid #00f; color:#00f; text-align:center;">63,Senthur Nagar, Ellapalayam Road, Periya Semur(Po),</td>
      
      <td style="color:#00f; height:25px;">No : </td>
	  <td style="color:#00f; height:25px;">'.$invoice.'</td>
    </tr>
    <tr style="border-bottom:1px solid #00f;">
      <td colspan="2" style="color:#00f;">CST No : 1044596</td>
      <td colspan="5" style="border-right:1px solid #00f; color:#00f; text-align:center;">ERODE - 638 004. e-mail : sunmilkproducts@gmail.com</td>
      
      <td style="color:#00f; height:25px;">Date : </td>
	  <td style="color:#00f; height:25px;">'.$date.'</td>
    </tr>
    
     </table>
     <table width="100%" style="border-collapse:collapse; border-right:1px solid #00f;border-bottom:1px solid #00f;border-left:1px solid #00f;" >
     <tr>
      <td colspan="3" width="520px" style="border-right:1px solid #00f; color:#00f; ">To : </td>
      
      <td colspan="4" style="color:#00f; width:111px; height:25px;">&nbsp;</td>
      <td colspan="1" style="color:#00f; width:362px;">&nbsp;</td>
      
      
    </tr>
    <tr>
      <td colspan="3" style="border-right:1px solid #00f;">'.$name.'</td>
      <td colspan="4" style="color:#00f; height:25px;">&nbsp;</td>
      <td colspan="1" style="color:#00f; width:362px;">&nbsp;</td>
    </tr>
	<tr>
      <td colspan="3" style="border-right:1px solid #00f;">&nbsp;	 </td>
      <td colspan="4" style="color:#00f; height:25px;">Tin No : </td>
      <td colspan="1" style="color:#00f; width:362px;">'.$tin_no.'</td>
    </tr>
    <tr>
      <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
      <td colspan="4" style="color:#00f; height:25px;">&nbsp;</td>
      <td colspan="1" style="color:#00f; width:362px;">&nbsp;</td>
    </tr>
    
    
    <tr  style="border-bottom:1px solid #00f;">
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
      <td colspan="4" style="color:#00f; height:25px;">&nbsp;</td>
      <td colspan="1" style="color:#00f; width:362px;">&nbsp;</td>
      </tr>
      
    </table>
    <table width="100%" style="border-collapse:collapse; border:1px solid #00f;" >
     <tr>
    <td colspan="1" style="border-right:1px solid #000; border-bottom:1px solid #00f; text-align:center; width:48px; background-color:#00f; color:#fff; height:30px;">S.No </td>
    <td colspan="3" style="border-right:1px solid #000; border-bottom:1px solid #00f; text-align:center; width:500px; background-color:#00f; color:#fff;">Particulars </td>
    
    <td colspan="1" style="border-right:1px solid #000; border-bottom:1px solid #00f; text-align:center; width:68px; background-color:#00f; color:#fff;">Qty </td>
    <td colspan="1" style="border-right:1px solid #000; border-bottom:1px solid #00f; text-align:center; width:135px; background-color:#00f; color:#fff;">Rate / No </td>
    <td colspan="2" style="border-right:1px solid #000; border-bottom:1px solid #00f; text-align:center; width:134px; background-color:#00f; color:#fff;">Amount </td>
    
    </tr>';
	 $l=0;
  for($k=0;$k<$j;$k++){
	$l++;
    $html .='<tr>
    <td colspan="1" style="border-right:1px solid #00f;">'.$l.'</td>
    <td colspan="3" style="border-right:1px solid #00f;">'.$itemname[$k].'</td>    
    <td colspan="1" style="border-right:1px solid #00f;">'.$rate[$k].'</td>
    <td colspan="1" style="border-right:1px solid #00f;">'.$qty[$k].'</td>
    <td colspan="2" style="border-right:1px solid #00f;">'.$amount3[$k].'</td>

    </tr>';
	
	}
  $html .='
    <tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>
    <tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>
    <tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>
    <tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>
    <tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>
    <tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>
    <tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>
    <tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>
    <tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>
    <tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>
	<tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>
	<tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>
	<tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>
	<tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr><tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>
	<tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>
	<tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>
	<tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>
	<tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>
	<tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>
	<tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>
    <tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>
    <tr>

    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>
    <tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>
    <tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>
    <tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>
    <tr>
    <td colspan="1" style="border-right:1px solid #00f; border-top:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f; border-top:1px solid #00f; text-align:right;  "> </td>
    
    <td colspan="4" style=" border-top:1px solid #00f; color:#00f; height:34px;">VAT 5%   :</td>
    <td style=" border-top:1px solid #00f; color:#00f; height:34px;">'.$vat3.'</td>
    </tr>
    <tr>
    <td colspan="1" style="border-right:1px solid #00f; border-top:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f; border-top:1px solid #00f; color:#00f;">E.&.O.E </td>
    <td colspan="4" style="border-right:1px solid #00f; border-top:1px solid #00f; color:#00f; height:34px;">Net Total  :</td>
	<td style="border-right:1px solid #00f; border-top:1px solid #00f; color:#00f; height:34px;">'.$gt3.'</td>
    

    </tr></table>
    <table width="100%" style="border-collapse:collapse; border-right:1px solid #00f; border-left:1px solid #00f;" >
     <tr>
    <td colspan="9" style="color:#00f; height:27px;">Rupees : </td>
    </tr></table>
     <table width="100%" style="border-collapse:collapse; border:1px solid #00f;" >
     <tr>
    <td colspan="5" style="color:#00f;">&raquo;&raquo;  Quality and Service are our Prime Motto.</td>
    <td colspan="4" style="color:#00f; width:100px; text-align:left; width:78px;">&raquo;&raquo;  Subject to Erode Jurisdiction.</td>
    </tr>
    <tr>
    <td colspan="5" style="border-bottom:1px solid #00f; color:#00f; width:500px;">&raquo;&raquo;  Goods once sold cannot be taken back.</td>
    <td colspan="4" style="border-bottom:1px solid #00f; color:#00f;">&nbsp;</td>
    </tr></table>
    <table width="100%" style="border-collapse:collapse; border-left:1px solid #00f;border-right:1px solid #00f;" >
     <tr>
    <td colspan="3" style="border-right:1px solid #00f; color:#00f;">Payment Received Please </td>
    <td colspan="3" style="border-right:1px solid #00f; color:#00f; text-align:center;">Delivered as per Invoice </td>
    
    <td colspan="3" style="text-align:center; color:#00f;">Received as per Invoice</td>
    </tr>
    <tr>
     
     
    <td colspan="3" style="border-right:1px solid #00f; color:#00f;">Deliver Goods as per Invoice </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
    <td colspan="3" style="border-right:1px solid #00f; color:#00f;">For SUN MILK PRODUCTS </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
        <td colspan="3" >&nbsp;</td>
    

    </tr>
    <tr>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="3" >&nbsp;</td>
    

    </tr>
    <tr>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="3" >&nbsp;</td>
    

    </tr>
    <tr>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="3" >&nbsp;</td>
    

    </tr>
    <tr>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="3" >&nbsp;</td>
    

    </tr>
    <tr>
    <td colspan="3" style="border-right:1px solid #00f; text-align:center; width:252px; color:#00f;">Manager</td>
    
    <td colspan="3" style="border-right:1px solid #00f; text-align:center; width:139px; color:#00f;">Godown Assistant</td>
    <td colspan="3" style="text-align:center; width:300px; color:#00f;">Receiver\'s Signature</td>
    </tr></table>
    <table width="100%" style="border:1px solid #00f;" >
    <tr>
    <td colspan="9" >&nbsp;</td>
    
   
    </tr>
     <tr>
    
    <td colspan="9" style="color:#00f; text-align:left;">Goods once sold cannot be taken back. </td>
    </tr></table>'; 
 	 
	 $mpdf -> WriteHTML($html);
	 

 
 $mpdf -> Output();
 
 
 exit; ?>