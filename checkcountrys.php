<?php

include_once "db/connection.php";

       $country=$_POST['country'];
		
		


	 	
		 $type =mysql_query("SELECT * FROM country WHERE countryid='".$country."'");
     
		 while($row = mysql_fetch_array($type))
  
		 	  {

                 $countrys=$row['country'];
           
					
				}

				

				echo $countrys;
		

?>