<?php
function get_check_room_booked($roomno){

	$ci=& get_instance();
    $ci->load->database(); 

      $sql = "SELECT * FROM bookingroom  WHERE  find_in_set('".$roomno."',`roomno`) <> 0 AND checkin ='1'"; 
    
    $query = $ci->db->query($sql);
    $result = $query->result();
    return $query->num_rows();

}

// SELECT group_concat(bookingroom.roomno) FROM bookingroom WHERE ((datefrom  between '".$from."' AND '".$to."') OR (dateto between '".$from."' AND '".$to."')) and  roomtypeid='".$roomtype."'


?>