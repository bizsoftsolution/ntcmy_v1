<?php
require_once ('mpdf.php');
require_once ('../conn.php');

ini_set('memory_limit', '-1');

$d = date('Y-m-d');
$pn = $_GET['s'];

 $mpdf = new mPDF('win-1252', 'A4-L', '', '', 10, 10, 40, 10, '', '');
 //$mpdf -> useOnlyCoreFonts = true;
 $mpdf -> SetDisplayMode('fullpage');
 
  //$stylesheet = file_get_contents('s.css');
  //$mpdf->WriteHTML($stylesheet,1);
  
  $sql = "select * from product_stock where";

if(!empty($_GET['n'])){
	
	$sql .= " product_name like '".$_GET['n']."%' and";
	
}

if(!empty($_GET['f']) && !empty($_GET['t'])){

	$sql .=" date between '".$_GET['f']."' and '".$_GET['t']."' and";
	
}

$sql .=" status='1' order by date asc";

$result=@mysql_query($sql);
 
 $html = '<table width="100%" style="border-collapse:collapse;border-bottom:1px solid #000;border-top:1px solid #000;border-right:1px solid #000;border-left:1px solid #000;">
 <tr>
 <th align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">S.No</th>
 <th align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">Date</th>
 <th align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">Opening Box</th>
 <th align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">Production Box</th>
 <th align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">Total Box</th>
 <th align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">Sales Box</th>
 <th align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">Closing Box</th>
 </tr>'; 
 
 $j=1;
	while($table=@mysql_fetch_array($result))
	{
		
		$html .= '<tr>
		<td align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">'.$j.'</td>
		<td align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">'.$table['date'].'</td>
		<td align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">'.$table['old_stocks'].'</td>				        <td align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">'.$table['new_stocks'].'</td>        <td align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">'.$table['total_stocks'].'</td>											        <td align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">'.$table['sales_box'].'</td>
		<td align="center" style="border-right:1px solid #000; border-bottom:1px solid #000;">'.$table['closing_box'].'</td>
		</tr>';
		$j++;
	}
 
 $html .= '</table>';
 
 
 

	 $mpdf->SetHTMLHeader('<div style="text-align:center"><h1>Sun Milk Products</h1></div>
 <div style="text-align:center"><h3>Prouct Stock Report</h3></div><div style="text-align:center"><b>'.$pn.'</b></div>');
	 $mpdf -> WriteHTML($html);
	 $mpdf->SetHTMLFooter('<div style="text-align:center"><h3>{PAGENO}</h3></div>');

 
 $mpdf -> Output();
 
 
 exit; ?>