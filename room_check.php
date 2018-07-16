<?php

include_once "db/connection.php";

        $roomtypeid=$_POST['roomtypeid'];
		
		


	 	
		 $type =mysql_query("SELECT * FROM roomtypes WHERE id='".$roomtypeid."'");
     

	 		while($row = mysql_fetch_array($type))
  
		 	{
		 		$roomtype=$row['roomtype'];
		 		$amount=$row['amount'];

		   }

		   echo'<span class="romtypss">'.$roomtype.'</span>
		        <span class="amnt">'.$amount.'</span>

		        <script>
		    		var romtypss=$(".romtypss").html();
		    		var amnt=$(".amnt").html();

		    		$(".roomtype").val(romtypss);
		    		$(".roomamount").val(amnt);
		        </script>


		        ';



		   

		

?>