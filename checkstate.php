<?php

include_once "db/connection.php";

        $country=$_POST['country'];
		
		


	 	
		 $type =mysql_query("SELECT * FROM state WHERE countryid='".$country."'");
     

	 		
		   $html='<select name="state" class="form-control" id="state">
			<option value="">Select State</option>';

				while($row = mysql_fetch_array($type))
  
		 	  {
              $html.='<option value="'.$row['statename'].'">'.$row['statename'].'</option>';
					
				}

				$html.='</select>';

				echo $html;

		  



		   

		

?>