<?php

include_once "db/connection.php";

 
$roomtypeid=$_POST['roomtypeid'];
 $type =mysql_query("SELECT * FROM roomnotable WHERE roomtypeid='".$roomtypeid."'");
      

 $count=mysql_num_rows($type);
 $html='<select class="form-control" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()" name="room_no" id="room_no">
         <option value="">No of Units</option>';
        for ($i=0; $i <$count ; $i++) 
		{ 
			$j=$i+1;
		$html.='<option value="'.$j.'">'.$j.'-Units</option>';	
		}
            
       $html.='</select>';

       echo $html;