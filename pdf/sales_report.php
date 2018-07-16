<?php
require_once ('mpdf.php');
require_once ('../conn.php');

ini_set('memory_limit', '-1');

$d = date('Y-m-d');

 $mpdf = new mPDF('win-1252', 'A4-L', '', '', 10, 10, 30, 10, '', '');
 //$mpdf -> useOnlyCoreFonts = true;
 $mpdf -> SetDisplayMode('fullpage');
 
  //$stylesheet = file_get_contents('s.css');
  //$mpdf->WriteHTML($stylesheet,1);
  
  $sql = "select * from invoice where";

if(!empty($_GET['n'])){
	
	$sql .= " name like '".$_GET['n']."%' and";
	
}

if(!empty($_GET['f']) && !empty($_GET['t'])){

	$sql .=" date between '".$_GET['f']."' and '".$_GET['t']."' and";
	
}

$sql .=" status='1'";

$result=@mysql_query($sql);
 
 $html = '<table width="100%" style="border-collapse:collapse;border-bottom:1px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-left:1px solid #000;">
 <tr>
 <th align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">S.no</th>
 <th align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">Name</th>
 <th align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">Address</th>
 <th align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">Phone Number</th>
 <th align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">Tin No</th>
 <th align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">CST No</th>
 <th align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">Date</th>
 <th align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">Invoice No</th>
 <th align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">Bill Amount</th>
 </tr>
 '; 
 
 $j=1;
	while($table=@mysql_fetch_array($result))
	{
		
		$html .= '<tr>
		<td align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">'.$j++.'</td>
		<td align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">'.$table['name'].'</td>
		<td align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">'.$table['address'].'</td>
		<td align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">'.$table['phone_no'].'</td>
		<td align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">'.$table['tin_no'].'</td>
		<td align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">'.$table['cst_no'].'</td>
		<td align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">'.$table['date'].'</td>
		<td align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">'.$table['invoice'].'</td>
		<td align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">'.$table['grand_total'].'</td>
		</tr>';
		
		if($j == 28){$html .='a';}
		
	}
 
 $html .= '</table>';
 
 
 

	 $mpdf->SetHTMLHeader('<div style="text-align:center"><h1>Sun Milk Products</h1></div>
 <div ><h3 style="text-align:center">Invoice Report</h3></div>');
	 $mpdf -> WriteHTML($html);
	 $mpdf->SetHTMLFooter('<div style="text-align:center"><h3>{PAGENO}</h3></div>');

 
 $mpdf -> Output();
 
 
 exit; ?>