<?php

include_once "db/connection.php";

        $auditorium=$_POST['auditorium'];
		
		


	 	
		 $type =mysql_query("SELECT * FROM halltypes WHERE auditorium='".$auditorium."'");
     

	 	$html=' <select class="form-control" name="halltype" id="halltype" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()">
                                 <option value="">Select Hall Type</option>'; 
                                 
                                  while($row = mysql_fetch_array($type))
                                  {


                                 $html.='<option value="'. $row['halltype'].'">'. $row['halltype'].'</option>'; 
                                      
                                      }
                                     
                                $html.='</select>

                              
                                ';


                                echo $html;
		   

		

?>