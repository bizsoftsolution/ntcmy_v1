<?php

include_once "db/connection.php";

        $halltype=$_POST['halltype'];
		$auditorium=$_POST['auditorium'];
		


	 	
		 $type =mysql_query("SELECT * FROM halltypes WHERE auditorium='".$auditorium."' and halltype='".$halltype."'");
     

	 		while($row = mysql_fetch_array($type))
  
		 	{
		 		
		 		$amount=$row['amount'];

		   }

		   echo'
		        <span class="amnt">'.$amount.'</span>

		        <script>
		    		
		    		var amnt=$(".amnt").html();

		    		
		    		$(".hallamount").val(amnt);
		        </script>


		        ';



		   

		

?>