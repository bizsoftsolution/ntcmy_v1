<?php
require_once ('mpdf.php');
require_once ('../conn.php');
require_once ('../num_word.php');

ini_set('memory_limit', '-1');

function calc($val){
$whole[] = explode('.', $val);
$valu = $whole[0][1];
$ff=strlen($whole[0][1]);
if($ff == 1){
	return $valu."0";
	} else if($ff == 0){
		return "00";
	}else {
		return "00";
	}
}

function calc1($val){
$whole[] = explode('.', $val);
$ff=$whole[0][0];
return $ff;
}
 /*this is the constructor with different options :  mPDF([ string $mode [, mixed $format [, 
 *float $default_font_size [, string $default_font [, float $margin_left , float $margin_right ,
 *float $margin_top , float $margin_bottom , float $margin_header , float $margin_footer [,
 *string $orientation ]]]]]])*/
 
$id = $_GET['id'];

$sql1 = "SELECT * FROM invoice WHERE id = $id";

$query1 =@mysql_query($sql1);

$n = @mysql_num_rows($query1);

if($n > 0){
	
	while($r = @mysql_fetch_array($query1)) {
$name = $r['name'];
$address = $r['address']; 
$tin_no = $r['tin_no'];
$cst_no = $r['cst_no'];
$date = $r['date'];
$invoice = $r['invoice'];
$state_view = $r['state_view'];
$phone_no = $r['phone_no'];
$itemname = explode('||',$r['product']);
$rate = explode('||',$r['rate']);
$qty = explode('||',$r['quantity']);
$amount = explode('||',$r['amount']);
$total = explode('||',$r['amount']);

echo $newstr = str_replace(',', ',<br />', $address);

/*for($i=0;$i<5;$i++)
{
	$t=$i+1;
	$y="total_".$t;
	if(isset($_POST[$y]))
	{
		if($_POST[$y]!="")
		{
			$itemname1=$_POST['itemname_'.$t];
			$itemname2[]=$_POST['itemname_'.$t];
			$select_query = "SELECT * FROM product WHERE id =$itemname1";
			$select = @mysql_query($select_query);
			while($row = @mysql_fetch_array($select)){
				$itemname[] = $row['product_name'];
			}
			$rate[]=$_POST['rate_'.$t];
			$qty[]=$_POST['qty_'.$t];
			$amount[]=$_POST['amount_'.$t];
			$total[]=$_POST['total_'.$t];
		}
	}
}*/ 
//print_r($qty);
	}
}
$itemname3 = implode('||',$itemname);
$rate3 = implode('||',$rate);
$qty3 = implode('||',$qty);
$amount3 = implode('||',$amount);
$j = count($total);
foreach($amount as $key => $v){
	$amount1[$key] = calc1($v);
	$dec[$key] = calc($v);
	$amount4[$key] = $amount1[$key].'.'.$dec[$key];
}

$tot = 0;

foreach($amount as $am){
	$tot += $am;
}

$vat_51 = round((($tot*5)/100),2);

$vat_5 = calc1($vat_51);
$vat_dec = calc($vat_51);
$vat3 = $vat_5.'.'.$vat_dec;

$gt_1 = $tot + $vat_51;

$gt = calc1($gt_1);
$gt_dec = calc($gt_1);
$gt3 = $gt.'.'.$gt_dec;
//echo $tot;
//print_r($amount1);

$word = decimal_to_words($gt3);

$r_time = date('h:i:s A');

$r_date = date('Y-m-d');
 
 $mpdf = new mPDF('win-1252', 'A4', '', '', 5, 5, 5, 5, '', '');
 //$mpdf -> useOnlyCoreFonts = true;
 $mpdf -> SetDisplayMode('fullpage');
 //$stylesheet = file_get_contents('stylesheet.css');
 //$mpdf->WriteHTML($stylesheet,1);
 $html = '<table width="100%" style="border-collapse:collapse; border:1px solid #00f;" >
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
      <td colspan="5" style="border-right:1px solid #00f; color:#00f; text-align:center;">Erode - 638 004. e-mail : sunmilkproducts@gmail.com</td>
      
      <td style="color:#00f; height:25px;" width="50">Date : </td>
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
      <td colspan="3" style="border-right:1px solid #00f;color:#00f; " rowspan="4" valign="top">  '.$name.'<br />'.$newstr.'</td>
      <td colspan="4" style="color:#00f; height:25px;">&nbsp;</td>
      <td colspan="1" style="color:#00f; width:362px;">&nbsp;</td>
    </tr>
	<tr>
      <!---<td colspan="3" style="border-right:1px solid #00f; color:#00f;" rowspan="3"></td>--->
      <td colspan="4" style="color:#00f; height:25px;">Tin No : </td>
      <td colspan="1" style="color:#00f; width:362px;">'.$tin_no.'</td>
    </tr>
    <tr>
      <!---<td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>--->
      <td colspan="4" style="color:#00f; height:25px;">&nbsp;</td>
      <td colspan="1" style="color:#00f; width:362px;">&nbsp;</td>
    </tr>
    
    
    <tr  style="border-bottom:1px solid #00f;">
    <!---<td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>--->
      <td colspan="4" style="color:#00f; height:25px;">&nbsp;</td>
      <td colspan="1" style="color:#00f; width:362px;">&nbsp;</td>
      </tr>
      
    </table>
    <table width="100%" style="border-collapse:collapse; border:1px solid #00f;" >
     <tr>
    <td colspan="1" style="border-right:1px solid #FFF; border-bottom:1px solid #00f; text-align:center; width:48px; background-color:#00f; color:#fff; height:30px;">S.No </td>
    <td colspan="3" style="border-right:1px solid #FFF; border-bottom:1px solid #00f; text-align:center; width:500px; background-color:#00f; color:#fff;">Particulars </td>
    
    <td colspan="2" style="border-right:1px solid #FFF; border-bottom:1px solid #00f; text-align:center; width:68px; background-color:#00f; color:#fff;">Qty </td>
    <td colspan="1" style="border-right:1px solid #FFF; border-bottom:1px solid #00f; text-align:center; width:135px; background-color:#00f; color:#fff;">Rate / No </td>
    <td colspan="2" style="border-right:1px solid #00F; border-bottom:1px solid #00f; text-align:center; width:134px; background-color:#00f; color:#fff;">Amount </td>
    
    </tr>';
	 $l=0;
  for($k=0;$k<$j;$k++){
	$l++;
    $html .='<tr>
    <td colspan="1" align="center" style="border-right:1px solid #00f;color:#00f;">'.$l.'</td>
    <td colspan="3" align="center" style="border-right:1px solid #00f;color:#00f;">'.$itemname[$k].'</td>    
    <td colspan="2" align="center" style="border-right:1px solid #00f;color:#00f;">'.$qty[$k].'</td>
    <td colspan="1" align="center" style="border-right:1px solid #00f;color:#00f;">'.$rate[$k].'</td>
    <td colspan="2" align="center" style="border-right:1px solid #00f;color:#00f;">'.$amount4[$k].'</td>

    </tr>';
	
	}
	
	$tc = 26 - $tr;
	for($f = 0; $f<$tc; $f++){
  $html .='
    <tr>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f;">&nbsp; </td>
    
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="1" style="border-right:1px solid #00f;">&nbsp; </td>
    <td colspan="2" style="border-right:1px solid #00f;">&nbsp; </td>

    </tr>';
	}
    $html .='<tr>
    <td colspan="1" style="border-right:1px solid #00f; border-top:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f; border-top:1px solid #00f; text-align:right;  "> </td>
    
    <td colspan="4" style=" border-top:1px solid #00f; color:#00f; height:34px;">VAT 5%   :</td>
    <td style=" border-top:1px solid #00f; color:#00f; height:34px;">'.$vat3.'</td>
    </tr>
    <tr>
    <td colspan="1" style="border-right:1px solid #00f; border-top:1px solid #00f;">&nbsp; </td>
    <td colspan="3" style="border-right:1px solid #00f; border-top:1px solid #00f; color:#00f;">E.&.O.E </td>
    <td colspan="4" style="color:#00f; border-top:1px solid #00f; height:34px;">Net Total  :</td>
	<td style="border-right:1px solid #00f; border-top:1px solid #00f; color:#00f; height:34px;">'.$gt3.'</td>
    

    </tr></table>
    <table width="100%" style="border-collapse:collapse; border-right:1px solid #00f; border-left:1px solid #00f;" >
     <tr>
    <td colspan="9" style="color:#00f; height:27px;">Rupees : '.$word.'</td>
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

/*$sql = "INSERT INTO invoice (name,address,date,phone_no,cst_no,tin_no,state_view,invoice,product,rate,quantity,amount,vat_5,grand_total,status) VALUES ('$name','$address','$date','$phone_no','$cst_no','$tin_no','$state_view','$invoice','$itemname3','$rate3','$qty3','$amount3','$vat3','$gt3',1)";

$query = @mysql_query($sql) or die(@mysql_error());

if($query == true){*/

 $mpdf -> WriteHTML($html,2);
 $mpdf -> Output();// this generates the pdf
 
/*}*/
 exit; ?>