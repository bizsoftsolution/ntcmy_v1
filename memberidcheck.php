<?php

include_once "db/connection.php";

        $nubememberid=$_POST['nubememberid'];
		
		$checkind=$_POST['checkin'];
        $checkoutd=$_POST['checkout'];
      $date1 = str_replace('/', '-', $checkind);
      $checkin= date('Y-m-d', strtotime($date1));

   

      $date2 = str_replace('/', '-', $checkoutd);
      $checkout= date('Y-m-d', strtotime($date2));


// echo $checkout;
	 	
		 $type =mysql_query("SELECT * FROM memberid_list WHERE memberid='".$nubememberid."'");
		
		 	$count=mysql_num_rows($type);
		 	if($count>0)
		 	{

				 	//$a="yes";

				 	$query_update1 =mysql_query("SELECT * FROM bookingrooms WHERE ((checkin between '".$checkin."' AND '".$checkout."') OR (checkout between '".$checkin."' AND '".$checkout."')) and  nubememberid='".$nubememberid."'and  ad_status='1'");
				 	$counts=mysql_num_rows($query_update1);

				 	if($counts>0)
				 	{
				 		$a="Not elgible for using this Member";
				 	}
				 	else
				 	{
				 		$a="";
				 	}




		 	}
		 	else
		 	{

		 		$a="In Valid Member Id";

		 	}

		 	

		

		 // echo $data['name'];

		 // echo "<pre>";
		 // print_r($rows);

		echo $a;