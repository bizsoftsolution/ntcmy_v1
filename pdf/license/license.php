<?php
require_once ('mpdf.php');
require_once ('../conn.php');
require_once ('../num_word.php');

function calc($val){
$whole[] = explode('.', $val);
$ff=strlen($whole[0][1]);
if($ff == 1){
	return "0";
	} else if($ff == 0){
		return ".00";
	}
}
 /*this is the constructor with different options :  mPDF([ string $mode [, mixed $format [, 
 *float $default_font_size [, string $default_font [, float $margin_left , float $margin_right ,
 *float $margin_top , float $margin_bottom , float $margin_header , float $margin_footer [,
 *string $orientation ]]]]]])*/
 
  $state_view = $_POST['state_view'];
 $name = $_POST['name'];
 $date = $_POST['date'];
 $address1 = $_POST['address'];
 $address = str_replace(',', ',<br>', $address1);
 $phone_no = $_POST['phone_no'];
 //$email = $_POST['email'];
 $cst_no = $_POST['cst_no'];
 $tin_no = $_POST['tin_no'];
 //$area_code = $_POST['a_code'];
 $invoice = $_POST['invoice'];
 $d_10 = $_POST['discount_10'];
 $d_3 = $_POST['discount_3'];
 $d_5 = $_POST['discount_5'];
 for($i=0;$i<=22;$i++)
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
				if($row['vat_145']==1){
					$itemname145[] = $row['id'];
				} else if($row['vat_5']==1){
					$itemname5[] = $row['id'];
				}
			}
			$rate[]=$_POST['rate_'.$t];
			$qty[]=$_POST['qty_'.$t];
			$amount[]=$_POST['amount_'.$t];
			$total[]=$_POST['total_'.$t];
		}
	}
}

foreach($itemname145 as $dd){
$key[] = array_search($dd, $itemname2);
}
foreach($itemname5 as $dd5){
$key1[] = array_search($dd5, $itemname2);
}
foreach ($key as $kk14){
	$v14_total[] = $total[$kk14];
}
foreach ($key1 as $kk5){
	$v5_total[] = $total[$kk5];
}
$j = count($total);
$f = 0;
	foreach($total as $e){
		$f = $f+$e;
		
	}
	
	$dec = calc($f);
	$f = $f.$dec;
	
if($state_view == 'State Sales'){
	$a = count($itemname145);
	$b = count($itemname5);
	$tot_14 = 0;
	$tot_5 = 0;
	if($a>0){
	for($c=0;$c<$a;$c++){
		$tot_14 = $tot_14+$v14_total[$c];
	}
	$ed14 = ($tot_14*12)/100;
	$ec14 = ($ed14*2)/100;
	$hc14 = $ec14/2;
	$v_14_total = $tot_14+$ed14+$ec14+$hc14;
	$v_14 = round((($v_14_total*14.5)/100),2);
	}
	if($b>0){
	for($d=0;$d<$b;$d++){
		$tot_5 = $tot_5 + $v5_total[$d];
	}
	
	$ed5 = ($tot_5*12)/100;
	$ec5 = ($ed5*2)/100;
	$hc5 = $ec5/2;
	$v_5_total = $tot_5+$ed5+$ec5+$hc5;
	
	$v_5 = round((($v_5_total*5)/100),2);
	$dec = calc($v_5);
	$v_5 = $v_5.$dec;
	}
	
	$ed =round((($f*12)/100),2);
	$dec = calc($ed);
	$ed = $ed.$dec;
	
	$ec = round((($ed*2)/100),2);
	$dec = calc($ec);
	$ec = $ec.$dec;
	
	$hc = round(($ec/2),2);
	$dec = calc($hc);
	$hc = $hc.$dec;
	
	$tdp = round(($ed+$ec+$hc),2);
	$dec = calc($tdp);
	$tdp = $tdp.$dec;
	
	$td = round(($f+$tdp),2);
	$dec = calc($td);
	$td = $td.$dec;
	
	$tot = round(($td),2);
	$dec = calc($tot);
	$tot = $tot.$dec;
	
	if($a>0){
		 $tot = $tot+$v_14;
		 $dec = calc($tot);
		 $tot = $tot.$dec;
	}
	if($b>0){
		$tot = $tot+$v_5;
		$dec = calc($tot);
		$tot = $tot.$dec;
	}
} 

if($state_view == 'Inter State Sales'){
if(($d_10 == 'on')&&($d_5 == '')&&($d_3 == '')){
	$f1 = ($f*10)/100;
	
	$f1=round(($f1),2);
	$dec = calc($f1);
	$f1 = $f1.$dec;
	
	$tot_10 = $f - $f1;
	$dec = calc($tot_10);
	$tot_10 = $tot_10.$dec;
	
	$t_ed = $tot_10;
}
if(($d_3 == 'on')&&($d_10 == '')&&($d_5 == '')){
	$f1 = ($f*3)/100;
	
	$f1=round(($f1),2);
	$dec = calc($f1);
	$f1 = $f1.$dec;
	
	$tot_3 = $f - $f1;
	$dec = calc($tot_3);
	$tot_3 = $tot_3.$dec;
	
	$t_ed = $tot_3;
}
if(($d_5 == 'on')&&($d_3 == '')&&($d_10 == '')){
	$f1 = ($f*5)/100;
	
	$f1=round(($f1),2);
	$dec = calc($f1);
	$f1 = $f1.$dec;
	
	$tot_5 = $f - $f1;
	$dec = calc($tot_5);
	$tot_5 = $tot_5.$dec;
	
	$t_ed = $tot_5;
}

if(($d_10 == 'on')&&($d_3 == 'on')&&($d_5 == '')){
	$f2 = ($f*10)/100;
	
	$f2=round(($f2),2);
	$dec = calc($f2);
	$f2 = $f2.$dec;
	
	$tot_10 = $f - $f2;
	$dec = calc($tot_10);
	$tot_10 = $tot_10.$dec;
	
	$f1 = ($tot_10*3)/100;
	
	$f1=round(($f1),2);
	$dec = calc($f1);
	$f1 = $f1.$dec;
	
	$tot_3 = $tot_10 - $f1;
	$dec = calc($tot_3);
	$tot_3 = $tot_3.$dec;
	
	$t_ed = $tot_3;
}

if(($d_10 == 'on')&&($d_5 == 'on')&&($d_3 == '')){
	$f2 = ($f*5)/100;
	
	$f2=round(($f2),2);
	$dec = calc($f2);
	$f2 = $f2.$dec;
	
	$tot_5 = $f - $f2;
	$dec = calc($tot_5);
	$tot_5 = $tot_5.$dec;
	
	$f1 = ($tot_5*10)/100;
	
	$f1=round(($f1),2);
	$dec = calc($f1);
	$f1 = $f1.$dec;
	
	$tot_10 = $tot_5 - $f1;
	$dec = calc($tot_10);
	$tot_10 = $tot_10.$dec;
	
	$t_ed = $tot_10;
}


if(($d_5 == 'on')&&($d_3 == 'on')&&($d_10 == '')){
	$f2 = ($f*5)/100;
	
	$f2=round(($f2),2);
	$dec = calc($f2);
	$f2 = $f2.$dec;
	
	$tot_5 = $f - $f2;
	$dec = calc($tot_5);
	$tot_5 = $tot_5.$dec;
	
	$f1 = ($tot_5*3)/100;
	
	$f1=round(($f1),2);
	$dec = calc($f1);
	$f1 = $f1.$dec;
	
	$tot_3 = $tot_5 - $f1;
	$dec = calc($tot_3);
	$tot_3 = $tot_3.$dec;
	
	$t_ed = $tot_3;
}

if(($d_5 == 'on')&&($d_3 == 'on')&&($d_10 == 'on')){
	$f2 = ($f*5)/100;
	
	$f2=round(($f2),2);
	$dec = calc($f2);
	$f2 = $f2.$dec;
	
	$tot_5 = $f - $f2;
	$dec = calc($tot_5);
	$tot_5 = $tot_5.$dec;
	
	$f3 = ($tot_5*10)/100;
	
	$f3=round(($f3),2);
	$dec = calc($f3);
	$f3 = $f3.$dec;
	
	$tot_10 = $tot_5 - $f3;
	$dec = calc($tot_10);
	$tot_10 = $tot_10.$dec;
	
	$f1 = ($tot_10*3)/100;
	
	$f1=round(($f1),2);
	$dec = calc($f1);
	$f1 = $f1.$dec;
	
	$tot_3 = $tot_10 - $f1;
	$dec = calc($tot_3);
	$tot_3 = $tot_3.$dec;
	
	$t_ed = $tot_3;
}


if(($d_10 == '')&&($d_3 == '')&&($d_5 == '')){
	$tot_3 = $f;
	$dec = calc($tot_3);
	$tot_3 = $tot_3.$dec;
	
	$t_ed = $tot_3;
}
	$ed = round((($t_ed*12)/100),2);
	$dec = calc($ed);
	$ed = $ed.$dec;
	
	$ec = round((($ed*2)/100),2);
	$dec = calc($ec);
	$ec = $ec.$dec;
	
	$hc = round(($ec/2),2);
	$dec = calc($hc);
	$hc = $hc.$dec;
	 
	$tdp = round(($ed+$ec+$hc),2);
	$dec = calc($tdp);
	$tdp = $tdp.$dec;
	
	$td = round(($t_ed+$tdp),2);
	$dec = calc($td);
	$td = $td.$dec;
	
	$cst_c = round((($td*2)/100),2);
	$dec = calc($cst_c);
	$cst_c = $cst_c.$dec;
	
	$tot = round(($td+$cst_c),2);
	$dec = calc($tot);
	$tot = $tot.$dec;
}

	$gt = round((ceil($tot)),2);
	$dec = calc($gt);
	$gt = $gt.$dec;
	
	$r = round(($gt - $tot),2);
	$dec = calc($r);
	$r = $r.$dec;
	
if($r < 0.50){
	$r1 = $r;
	$gt = $gt;
} else if($r > 0.50){
	 $r1 = $r-1;
	 $dec = calc($r1);
	 $r1 = $r1.$dec;
	 $gt = $gt-1;
}


	$print_row = 23 - $j;


 
 $mpdf = new mPDF('win-1252', 'A4', '', '', 7, 7, 7, 7, '', '');
 $mpdf -> useOnlyCoreFonts = true;
 $mpdf -> SetDisplayMode('fullpage');
 //$stylesheet = file_get_contents('stylesheet.css');
 //$mpdf->WriteHTML($stylesheet,1);
 $html = "
<table border=0 cellpadding=0 cellspacing=0 width=896 style='border-collapse:
 collapse;table-layout:fixed;width:673pt;border-right:1px solid #000;border-left:1px solid #000;border-top:1px solid #000;border-bottom:1px solid #000;font-family:Arial Unicode MS; font-size:16px'>
 <col width=64 style='width:48pt'>
 <col width=147 style='mso-width-source:userset;mso-width-alt:5376;width:110pt'>
 <col width=145 style='mso-width-source:userset;mso-width-alt:5302;width:109pt'>
 <col width=77 style='mso-width-source:userset;mso-width-alt:2816;width:58pt'>
 <col width=166 style='mso-width-source:userset;mso-width-alt:6070;width:125pt'>
 <col width=85 style='mso-width-source:userset;mso-width-alt:3108;width:64pt'>
 <col width=95 style='mso-width-source:userset;mso-width-alt:3072;width:63pt'>
 <col width=128 style='mso-width-source:userset;mso-width-alt:4681;width:96pt'>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl65 colspan=4 width=480 style='height:15.0pt;mso-ignore:
  colspan;width:325pt;border-bottom:1px solid #000;'>(Removal of goods under rule 11 of Central excise rules
  2002)</td>
  <td class=xl66 width=166 style='width:150pt;border-bottom:1px solid #000;'>&nbsp;</td>
  <td class=xl67 width=95 style='width:64pt;border-bottom:1px solid #000;'>&nbsp;</td>
  <td class=xl68 width=100 style='border-left:1px solid #000;width:63pt;border-bottom:1px solid #000;'>&nbsp;</td>
  <td class=xl69 width=180 style='width:96pt;border-bottom:1px solid #000;'>&nbsp;</td>
 </tr>
 <tr height=27 style='height:20.25pt'>
  <td height=27 class=xl70 colspan=3 style='height:20.25pt;mso-ignore:colspan;border-right:1px solid #000;'><span style='font-size:25px;'>SRI
  BALAJI PLASTICS</span></td>
  <td class=xl72 style='border-top:none;border-right:1px solid #000;border-bottom:1px solid #000;'>ECC No</td>
  <td class=xl73 style='border-top:none;border-left:none;border-bottom:1px solid #000;'>AAVFS1382AEMOO1</td>
  <td class=xl67 style='border-top:none;border-right:1px solid #000;border-bottom:1px solid #000;'>&nbsp;</td>
  <td class=xl71 style='border-top:none;'>TIN No</td>
  <td class=xl74 align='center' style='border-top:none;'>33772025804</td>
 </tr>
 <tr height=20 style='height:15.0pt;'>
  <td height=20 class=xl75 colspan=3 style='height:15.0pt;mso-ignore:colspan;border-right:1px solid #000;'>1/414
  Kothari Nagar,<span style='mso-spacerun:yes'>&nbsp; </span>K. Vadamadurai
  Post</td>
  <td class=xl76 colspan='3' style='border-right:1px solid #000;border-bottom:1px solid #000;'>Range : COIMBATORE - I - C</td>
  <td>CST No</td>
  <td class=xl78 align='center'>859458</td>
 </tr>
 <tr style='height:15.0pt'>
  <td class=xl75 colspan=2 style='height:15.0pt;mso-ignore:colspan'>Coimbatore
  - 641017.</td>
  <td style='border-right:1px solid #000;'></td>
  <td class=xl79 colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;'>234-B/70, Samiyan nagar, PN Palayam.</td>
  <td>Date</td>
  <td class=xl81 align='center'>2002-09-11</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl82 colspan=2 style='height:15.0pt;mso-ignore:colspan;border-bottom:1px solid #000;'>Phone
  :0422- 6584521, 6571232</td>
  <td class=xl83 style='border-bottom:1px solid #000;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl75>&nbsp;</td>
  <td class=xl84 >Coimbatore-20.</td>
  <td class=xl85 style='border-right:1px solid #000;'>&nbsp;</td>
  <td style='border-bottom:1px solid #000;'>Area Code</td>
  <td class=xl78 align='center' style='border-bottom:1px solid #000;'>106</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl86 colspan=3 style='height:15.0pt;border-top:none;border-right:1px solid #000;'>To,<span
  style='mso-spacerun:yes;'>&nbsp;&nbsp;&nbsp; </span>M/s&nbsp;&nbsp;".$name."</td>
  <td class=xl87 colspan=2 style='mso-ignore:colspan'>Division: Coimbatore - I</td>
  <td class=xl85 style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl88>&nbsp;</td>
  <td class=xl80>&nbsp;</td>
 </tr>
 <tr height=24 style='height:18.0pt'>
  <td height=24 colspan=3 rowspan=2 class=xl75 style='height:18.0pt;border-right:1px solid #000;'><span>".$address."</span></td>
  <td class=xl90 colspan=2 style='mso-ignore:colspan;border-bottom:1px solid #000;'>Commissionarate:&nbsp;&nbsp;&nbsp;&nbsp;Coimbatore.</td>
  <td class=xl91 style='border-right:1px solid #000;border-bottom:1px solid #000;text-align:center;'>&nbsp;</td>
  <td class=xl92 colspan=2 style='mso-ignore:colspan;text-align:center;'><h2>TAX
  INVOICE</h2><span style='mso-spacerun:yes'>&nbsp;</span></td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td class=xl160 align='center' style='border-top:none;border-bottom:1px solid #000;border-right:1px solid #000;'>Invoice no</td>
  <td class=xl93 align='center' style='border-left:none;border-bottom:1px solid #000;border-right:1px solid #000;'>".$invoice."</td>
  <td style='border-bottom:1px solid #000;border-right:1px solid #000;text-align:center;'>CST no</td>
  <td class=xl94 style='border-top:1px solid #000;text-align:center;'>".$cst_no."</td>
  <td class=xl95 align='center' style='border-top:1px solid #000;border-left:1px solid #000;'>Authenticated By</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl75 style='height:15.0pt;'>&nbsp;</td>
  <td colspan=2 style='mso-ignore:colspan;border-right:1px solid #000;'></td>
  <td class=xl100 align='center' style='border-right:1px solid #000;'>Date</td>
  <td class=xl96 align='center' style='border-top:none;border-left:none;border-bottom:1px solid #000;border-right:1px solid #000;'>".$date."</td>
  <td align='center' style='mso-ignore:colspanl;border-bottom:1px solid #000;'>TIN No</td>
  <td class=xl97 align='center' style='border-left:1px solid #000;border-bottom:1px solid #000;border-top:1px solid #000;'>".$tin_no."</td>
  <td class=xl97 align='center' style='border-left:1px solid #000;'>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl72 style='height:15.0pt;border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000;'>&nbsp;</td>
  <td class=xl101 align='center' width=100 style='border-left:none;border-bottom:1px solid #000;border-top:1px solid #000;border-right:1px solid #000;'>Phone No.</td>
  <td class=xl100 colspan='2' style='border-bottom:1px solid #000;border-right:1px solid #000;border-top:1px solid #000; text-align:center;'>".$phone_no."</td>
  <td class=xl8 style='border-bottom:1px solid #000;border-right:1px solid #000;' colspan='2'>Party's Ecc No</td>
  <td class=xl100 style='border-top:none;border-left:none;border-bottom:1px solid #000;'>&nbsp;</td>
  <td class=xl76 align='center' style='border-left:1px solid #000;border-bottom:1px solid #000;'>Authorised Signatory</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 align='center' class=xl102 style='height:15.0pt;border-top:none;border-bottom:1px solid #000;border-right:1px solid #000;'>Sno</td>
  <td align='center' class=xl77 style='border-top:none;border-left:none;border-bottom:1px solid #000;'><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span>Particulars</td>
  <td colspan=3 style='mso-ignore:colspan;border-bottom:1px solid #000;border-right:1px solid #000;'></td>
  <td class=xl102 align='center' style='border-top:none;border-bottom:1px solid #000;border-right:1px solid #000;'>Quantity</td>
  <td class=xl101 align='center' style='border-top:none;border-left:none;border-bottom:1px solid #000;border-right:1px solid #000;'><span
  style='mso-spacerun:yes;'>&nbsp;&nbsp; </span>Rate in Rs</td>
  <td class=xl72 align='center' style='border-top:none;border-bottom:1px solid #000;border-right:1px solid #000;'><span
  style='mso-spacerun:yes'>&nbsp;</span>Amount in Rs<span
  style='mso-spacerun:yes'>&nbsp;</span></td>
 </tr>";
 
 $l=0;
  for($k=0;$k<$j;$k++){
	$l++; 
 $html .="<tr height=20 style='height:15.0pt'>
  <td height=20 align='center' class=xl103 style='height:15.0pt;border-right:1px solid #000;'>".$l."</td>
  <td class=xl104 colspan='3' style='border-top:none'>".$itemname[$k]."</td>
  <td class=xl71 align='center' style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl105 align='center' style='border-top:none;border-right:1px solid #000;'>".$qty[$k]."</td>
  <td class=xl106 align='center' style='border-left:none;border-right:1px solid #000;'>".$rate[$k]."</td>
  <td class=xl107 align='center'>".$amount[$k]."</td></tr>";
 }
 if($state_view == 'Inter State Sales'){
	if(($d_10 == 'on')&&($d_3 == 'on')&&($d_5 == 'on')){
		for($m=0;$m<2;$m++){
			$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;'></td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107>&nbsp;</td>
 </tr>";
		}
		$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;text-align:right;'>TOTAL</td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107 style='text-align:center;border-top:1px solid #000;border-bottom:1px solid #000;'>".$f."</td></tr>";
 		for($m=0;$m<2;$m++){
			$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;'></td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107>&nbsp;</td>
 </tr>";
		}
		$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;text-align:center;'>Less 5% Special Discount</td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107 style='text-align:center;'>".$f2."</td></tr>";
 		for($m=0;$m<2;$m++){
			$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;'></td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107>&nbsp;</td>
 </tr>";
		}
		$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;text-align:center;'>&nbsp;</td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107 style='text-align:center;border-top:1px solid #000;border-bottom:1px solid #000;'>".$tot_5."</td></tr>";
  for($m=0;$m<2;$m++){
			$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;'></td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107>&nbsp;</td>
 </tr>";
		}
		$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;text-align:center;'>Less 10% Special Discount</td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107 style='text-align:center;'>".$f3."</td></tr>";
 		for($m=0;$m<2;$m++){
			$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;'></td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107>&nbsp;</td>
 </tr>";
		}
		$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;text-align:center;'>&nbsp;</td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107 style='text-align:center;border-top:1px solid #000;border-bottom:1px solid #000;'>".$tot_10."</td></tr>";
 		for($m=0;$m<2;$m++){
			$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;'></td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107>&nbsp;</td>
 </tr>";
		}
		$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;text-align:center;'>Less 3% Cash Discount</td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107 style='text-align:center;'>".$f1."</td></tr>";	
 $pr = 18+$j;
 $pr1 = 22 - $pr;
 		for($m=0;$m<$pr1;$m++){
			$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;'></td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107>&nbsp;</td>
 </tr>";
		}
 		
 	}else if(($d_10 == 'on')&&($d_3 == 'on')){
			for($m=0;$m<2;$m++){
			$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;'></td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107>&nbsp;</td>
 </tr>";
		}
		$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;text-align:right;'>TOTAL</td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107 style='text-align:center;border-top:1px solid #000;border-bottom:1px solid #000;'>".$f."</td></tr>";
 		for($m=0;$m<2;$m++){
			$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;'></td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107>&nbsp;</td>
 </tr>";
		}
		$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;text-align:center;'>Less 10% Special Discount</td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107 style='text-align:center;'>".$f2."</td></tr>";
  for($m=0;$m<2;$m++){
			$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;'></td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107>&nbsp;</td>
 </tr>";
		}
		$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;text-align:center;'>&nbsp;</td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107 style='text-align:center;border-top:1px solid #000;border-bottom:1px solid #000;'>".$tot_10."</td></tr>";
 		for($m=0;$m<2;$m++){
			$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;'></td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107>&nbsp;</td>
 </tr>";
		}
		$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;text-align:center;'>Less 3% Special Discount</td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107 style='text-align:center;'>".$f1."</td></tr>";
 		$pr = 12+$j;
 $pr1 = 22 - $pr;
 		for($m=0;$m<$pr1;$m++){
			$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;'></td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107>&nbsp;</td>
 </tr>";
		}
	} else if(($d_3 == 'on')&&($d_5 == 'on')){
			for($m=0;$m<2;$m++){
			$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;'></td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107>&nbsp;</td>
 </tr>";
		}
		$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;text-align:right;'>TOTAL</td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107 style='text-align:center;border-top:1px solid #000;border-bottom:1px solid #000;'>".$f."</td></tr>";
 		for($m=0;$m<2;$m++){
			$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;'></td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107>&nbsp;</td>
 </tr>";
		}
		$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;text-align:center;'>Less 5% Cash Discount</td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107 style='text-align:center;'>".$f2."</td></tr>";
  for($m=0;$m<2;$m++){
			$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;'></td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107>&nbsp;</td>
 </tr>";
		}
		$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;text-align:center;'>&nbsp;</td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107 style='text-align:center;border-top:1px solid #000;border-bottom:1px solid #000;'>".$tot_5."</td></tr>";
  for($m=0;$m<2;$m++){
			$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;'></td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107>&nbsp;</td>
 </tr>";
		}
		$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;text-align:center;'>Less 3% Cash Discount</td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107 style='text-align:center;'>".$f1."</td></tr>";
 		$pr = 12+$j;
 $pr1 = 22 - $pr;
 		for($m=0;$m<$pr1;$m++){
			$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;'></td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107>&nbsp;</td>
 </tr>";
		}
	} 
	else if(($d_10 == 'on')&&($d_5 == 'on')){
			for($m=0;$m<2;$m++){
			$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;'></td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107>&nbsp;</td>
 </tr>";
		}
		$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;text-align:right;'>TOTAL</td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107 style='text-align:center;border-top:1px solid #000;border-bottom:1px solid #000;'>".$f."</td></tr>";
 		for($m=0;$m<2;$m++){
			$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;'></td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107>&nbsp;</td>
 </tr>";
		}
		$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;text-align:center;'>Less 5% Cash Discount</td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107 style='text-align:center;'>".$f2."</td></tr>";
  for($m=0;$m<2;$m++){
			$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;'></td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107>&nbsp;</td>
 </tr>";
		}
		$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;text-align:center;'>&nbsp;</td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107 style='text-align:center;border-top:1px solid #000;border-bottom:1px solid #000;'>".$tot_5."</td></tr>";
  for($m=0;$m<2;$m++){
			$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;'></td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107>&nbsp;</td>
 </tr>";
		}
		$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;text-align:center;'>Less 10% Cash Discount</td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107 style='text-align:center;'>".$f1."</td></tr>";
 		$pr = 12+$j;
 $pr1 = 22 - $pr;
 		for($m=0;$m<$pr1;$m++){
			$html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;'></td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107>&nbsp;</td>
 </tr>";
		}
	} else {
 for($m=0;$m<$print_row;$m++){
  $html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;'></td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107>&nbsp;</td>
 </tr>";
 }
 }
 } else {
 for($m=0;$m<$print_row;$m++){
  $html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl103 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111>&nbsp;</td>
  <td colspan=3 style='mso-ignore:colspan;border-right:1px solid #000;'></td>
  <td class=xl109  style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl106 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107>&nbsp;</td>
 </tr>";
 }
 }
 
 $html .="<tr height=20 style='height:15.0pt'>
  <td height=20 class=xl109 style='height:15.0pt;border-top:1px solid #000;'>&nbsp;</td>
  <td colspan=2 style='mso-ignore:colspan;border-top:1px solid #000;'></td>
  <td class=xl113 style='border-top:1px solid #000;'><b>Total</b></td>
  <td style='border-top:1px solid #000;border-right:1px solid #000;'></td>
  <td class=xl129 style='border-top:1px solid #000;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl130 style='border-top:1px solid #000;border-left:none;border-right:1px solid #000;'>&nbsp;</td>";
  if($state_view == 'State Sales'){
	  
  	$html .= "<td class=xl131 align='center' style='border-top:1px solid #000;border-left:none;border-bottom:1px solid #000;border-top:1px solid #000;'>".$f."</td>";
  } else {
	$html .=" <td class=xl131 align='center' style='border-top:1px solid #000;border-left:none;border-bottom:1px solid #000;border-top:1px solid #000;'>".$t_ed."</td>";
  }
 $html .="</tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 colspan='2' class=xl132 style='height:15.0pt;border-top:1px solid #000;border-right:1px solid #000;'><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span>Tariff Heading &nbsp;&amp;</td>
  <td>Excise duty</td>
  <td class=xl116 align=right>12.00%</td>
  <td style='border-right:1px solid #000;'></td>
  <td class=xl121 style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl121 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl123 align='center' style='border-left:none'>".$ed."</td>";
 $html .="</tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl134 colspan='2' style='height:15.0pt;border-bottom:1px solid #000;border-right:1px solid #000;'><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>subheading no - 39174000</span></td>
  <td>Edu. cess</td>
  <td class=xl135 align=right>2%</td>
  <td style='border-right:1px solid #000;'></td>
  <td class=xl136 style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl136 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl123 align='center' style='border-left:none;'>".$ec."</td>";
 $html .="</tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 colspan='2' class=xl137 style='height:15.0pt;border-right:1px solid #000;'>Name of the excisable commodity</span></td>
  <td class=xl113>Hr. cess</td>
  <td class=xl135 align=right>1%</td>
  <td style='border-right:1px solid #000;'></td>
  <td class=xl97 style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl97 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl107 align='center' style='border-left:none;'>".$hc."</td>";
 $html .="</tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl134 colspan='2' style='height:15.0pt;border-bottom:1px solid #000;border-right:1px solid #000;'><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp; </span>Plastic Pipes &amp; Fittings</span></td>
  <td class=xl83 style='border-bottom:1px solid #000;'>&nbsp;</td>
  <td class=xl83 colspan=2 style='mso-ignore:colspan;border-bottom:1px solid #000;border-right:1px solid #000;'>Total duty  payable</td>
  <td class=xl138 style='border-bottom:1px solid #000;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl139 style='border-left:none;border-bottom:1px solid #000;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl140 align='center' style='border-left:none;border-bottom:1px solid #000;'><b>".$tdp."</b></td>";
 $html .="</tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl109 style='height:15.0pt;border-right:1px solid #000;border-bottom:1px solid #000;'>&nbsp;</td>
  <td colspan=3 class=xl89 style='mso-ignore:colspan;border-bottom:1px solid #000;'></td>
  <td style='border-right:1px solid #000;border-bottom:1px solid #000;'>Total</td>
  <td class=xl141 style='border-top:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl141 style='border-top:none;border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl131 align='center' style='border-left:none;border-bottom:1px solid #000;'>".$td."</td>";
  $html .="</tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl109 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl65 style='border-left:none;border-bottom:1px solid #000;border-right:1px solid #000;'>Mode of Transport</td>
  <td class=xl86 style='border-bottom:1px solid #000;'>&nbsp;</td>
  <td class=xl71 style='border-bottom:1px solid #000;'>&nbsp;</td>
  <td class=xl80 style='border-bottom:1px solid #000;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl97 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl97 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl142 style='border-top:none;border-left:none'>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl109 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl65 style='border-top:none;border-left:none;border-bottom:1px solid #000;border-right:1px solid #000;'>Vehicle Reg no</td>
  <td class=xl77 style='border-bottom:1px solid #000;'>&nbsp;</td>
  <td class=xl66 style='border-bottom:1px solid #000;'>&nbsp;</td>
  <td class=xl67 style='border-bottom:1px solid #000;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl97 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>";
  if($state_view == 'State Sales'){
	  if($a>0){
  $html .= "<td class=xl97 align='center' style='border-left:none;border-right:1px solid #000;'>VAT 14.5%</td>
  <td class=xl97 align='center' style='border-left:none'>".$v_14."</td>";
	  } else {
	$html .= "<td class=xl97 align='center' style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl97 style='border-left:none'>&nbsp;</td>";
  }
  } else {
	$html .= "<td class=xl97 align='center' style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl97 style='border-left:none'>&nbsp;</td>";
  }
  
 $html .="</tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl143 style='height:15.0pt;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl65 style='border-top:none;border-left:none;border-bottom:1px solid #000;border-right:1px solid #000;'>Date &amp; Time of
  Removal</td>
  <td class=xl144 align='center' style='border-bottom:1px solid #000;'></td>
  <td class=xl145 align='center' style='border-bottom:1px solid #000;'></td>
  <td class=xl91 style='border-bottom:1px solid #000;border-right:1px solid #000;'>&nbsp;</td>";
  if($state_view == 'State Sales'){
	  if($b>0){
  $html .= "<td class=xl145 align='center' style='border-right:1px solid #000;'></td><td class=xl97 align='center' style='border-left:none;border-right:1px solid #000;'>VAT 5%</td>
  <td class=xl97 align='center' style='border-left:none'>".$v_5."</td>";
	  } else {
	 $html .= "<td class=xl145 align='center' style='border-right:1px solid #000;'></td><td class=xl97 align='center' style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl97 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>";
  }
  } else if($state_view == 'Inter State Sales') {
	$html .= "<td class=xl75 colspan=2 style='mso-ignore:colspan;border-right:1px solid #000;'><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp; </span>CST 2% against form C</td>
  <td class=xl123 align='center'>".$cst_c."</td>";
  } else {
	 $html .= "<td class=xl145 align='center' style='border-right:1px solid #000;'></td><td class=xl97 align='center' style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl97 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>";
  }
  
 $html .="</tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl146 style='height:15.0pt;border-right:1px solid #000;border-bottom:1px solid #000;'>&nbsp;</td>
  <td class=xl147 colspan=4 style='mso-ignore:colspan;border-bottom:1px solid #000;border-right:1px solid #000;'><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span><b>Subject to Coimbatore Jurisdiction only.</b></td>
  <td class=xl121 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl149 align='center' style='border-right:1px solid #000;'>Total</td>
  <td class=xl123 align='center'>".$tot."</td>";
 $html .="</tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl150 colspan='4' style='height:15.0pt;border-right:1px solid #000;'><font class='font16'>Declaration:</font><span><font class='font15'>We
  declare that this invoice shows the actual price</font></span></td>
  <td class=xl85 style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl151 style='border-bottom:1px solid #000;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl109 align='center' style='border-left:none;border-bottom:1px solid #000;border-right:1px solid #000;'>Roff</td>
  <td class=xl139 align='center' style='border-left:none;border-bottom:1px solid #000;'>".$r1."</td>";
 $html .=" </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20  colspan='4' class=xl152 style='height:15.0pt;border-right:1px solid #000;border-bottom:1px solid #000;'><font class='font15'>of the good's described and that all particulars are true &amp;
  correct</font></td>
  <td class=xl154 style='border-left:none;border-bottom:1px solid #000;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl147 colspan=2 style='mso-ignore:colspan;border-right:1px solid #000;border-bottom:1px solid #000;'><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span><b>TOTAL AMOUNT</b></td>
  <td class=xl155 align='center' style='border-left:none;border-bottom:1px solid #000;'><b>".$gt."</b></td>";
 $html .="</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl77 style='height:15.0pt;border-top:none;border-bottom:1px solid #000;'>&nbsp;</td>
  <td style='border-bottom:1px solid #000;'></td>
  <td class=xl66 style='border-top:none;border-bottom:1px solid #000;'>&nbsp;</td>
  <td class=xl71 style='border-top:none;border-bottom:1px solid #000;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl100 align='center' style='border-top:none;border-bottom:1px solid #000;border-right:1px solid #000;'>E &amp; OE</td>
  <td class=xl72 style='border-top:none;border-left:none;border-bottom:1px solid #000;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl86 style='border-top:none;border-left:none'>&nbsp;</td>
  <td class=xl80 style='border-top:none'>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl156 colspan='5' style='height:15.0pt;border-right:1px solid #000;'><b>Total duty payable in words</b></td>
  <td class=xl142 style='border-top:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl111 colspan=2 style='mso-ignore:colspan;'><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp; </span>For SRI BALAJI PLASTICS</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl111 colspan=5 style='height:15.0pt;mso-ignore:colspan;border-right:1px solid #000;border-bottom:1px solid #000;'>".ucfirst(decimal_to_words($tdp))."</td>
  <td class=xl75 style='border-left:none;border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl75>&nbsp;</td>
  <td class=xl85>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 class=xl157 colspan=5 style='height:15.0pt;mso-ignore:colspan;border-right:1px solid #000;'><b>Total
  amount in words</b></td>
  <td class=xl75 style='border-right:1px solid #000;'>&nbsp;</td>
  <td class=xl85>&nbsp;</td>
  <td class=xl85>&nbsp;</td>
 </tr>
 <tr height=20 style='height:15.0pt'>
  <td height=20 colspan='5' class=xl111 style='height:15.0pt;mso-ignore:colspan;border-right:1px solid #000;'>".ucfirst(decimal_to_words($gt))."</td>
  <td class=xl75 style='border-left:none;border-right:1px solid #000;'>Prepared by</td>
  <td class=xl85 colspan=2><span
  style='mso-spacerun:yes'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  </span>Authorised Signatory</td>
 </tr>
 
</table>
";
 $mpdf -> WriteHTML($html,2);
 $mpdf -> Output();// this generates the pdf
 exit; ?>