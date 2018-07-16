<?php

include_once "db/connection.php";

$country=$_POST['country'];

$type =mysql_query("SELECT * FROM state WHERE countryid='".$country."'");
     
$types =mysql_query("SELECT * FROM country WHERE countryid='".$country."'"); 
                  
                  	while($a = mysql_fetch_array($types))
  		 						{

  		 						$countrya=$a['country'];
  		 							
  		 						}
	 		
		 		 
		$html='
		                      <div class="form-group">
                                <label for="inputTextarea-2" class="control-label">State</label>
                                 <input type="text" name="country" value="'.$countrya.'" id="country">
                                <select class="custom-select" name="state" id="state">
                                <option value="">State</option>';
						while($b = mysql_fetch_array($type))
  
		 						{
                                  $html.='<option value="'.$b['statename'].'">'.$b['statename'].'</option>';
                              }
                                $html.='</select>
                                 </div>
                                ';

                  


		 

		  echo $html;



?>