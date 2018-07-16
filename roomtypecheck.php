<?php
include_once "db/connection.php";
$roomtype=$_POST['roomtype'];

 $type =mysql_query("SELECT * FROM roomtypes WHERE id='".$roomtype."'");

		 while($row = mysql_fetch_array($type))
  
		 {
		 		$roomtypes=$row['roomtype'];

		 		
		 }

		 echo $roomtypes;

?>