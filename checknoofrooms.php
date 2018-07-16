<?php

include_once "db/connection.php";

 $dormbed=$_POST['dormbed'];
$roomtypeid=$_POST['roomtypeid'];
 $type =mysql_query("SELECT * FROM roomnotable WHERE roomtypeid='".$roomtypeid."'");
 $counts=mysql_num_rows($type);     
if($roomtypeid=='4')
{

	if($dormbed=='10')
	{

		$count=5;
       $html='<select class="form-control" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()" name="room_no" id="room_no">
        <option value="">Select No of Dorms</option>';
        for ($i=0; $i <$count ; $i++) 
		{ 
			$j=$i+1;
		$html.='<option value="'.$j*$dormbed.'">'.$j*$dormbed.'</option>';	
		}
            
       $html.='</select>';

	}

	elseif($dormbed=='12')
	{

		$count=4;
       $html='<select class="form-control" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()" name="room_no" id="room_no">
        <option value="">Select No of Dorms</option>';
        for ($i=0; $i <$count ; $i++) 
		{ 
			$j=$i+1;
		$html.='<option value="'.$j*$dormbed.'">'.$j*$dormbed.'</option>';	
		}
            
       $html.='</select>';

	}

	elseif($dormbed=='22')
	{

		$count=1;
       $html='<select class="form-control" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()" name="room_no" id="room_no">
        <option value="">Select No of Dorms</option>';
        for ($i=0; $i <$count ; $i++) 
		{ 
			$j=$i+1;
		$html.='<option value="'.$j*$dormbed.'">'.$j*$dormbed.'</option>';	
		}
            
       $html.='</select>';

	}
	else
	{
		$html='<select class="form-control" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()" name="room_no" id="room_no">
        <option value="">Select No of Dorms</option></select>';

	}


	

}
elseif($roomtypeid=='1')
{
	$count=mysql_num_rows($type);
 $html='<select class="form-control" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()" name="room_no" id="room_no">
  <option value="">Select No of Chalet</option>';
        for ($i=0; $i <$count ; $i++) 
		{ 
			$j=$i+1;
		$html.='<option value="'.$j.'">'.$j.'</option>';	
		}
            
       $html.='</select>';

}

elseif($roomtypeid=='2')
{
	$count=mysql_num_rows($type);
 $html='<select class="form-control" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()" name="room_no" id="room_no">
  <option value="">Select No of Chalet</option>';
        for ($i=0; $i <$count ; $i++) 
		{ 
			$j=$i+1;
		$html.='<option value="'.$j.'">'.$j.'</option>';	
		}
            
       $html.='</select>';

}

elseif($roomtypeid=='3')
{
	$count=mysql_num_rows($type);
 $html='<select class="form-control" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()" name="room_no" id="room_no">
  <option value="">Select No of Rooms</option>';
        for ($i=0; $i <$count ; $i++) 
		{ 
			$j=$i+1;
		$html.='<option value="'.$j.'">'.$j.'</option>';	
		}
            
       $html.='</select>';

}
else
{
	$html='<select class="form-control" onblur="a1()" onchange="b1()" onclick="c1()" onkeyup="d1()" name="room_no" id="room_no">
  <option value="">--Select--</option></select>';
}

 

       echo $html;



       