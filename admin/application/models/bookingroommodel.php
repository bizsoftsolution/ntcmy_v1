<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bookingroommodel extends CI_Model 
{



public function book_date($data)
{

	if($this->db->insert('bookingdate',$data))
	{
		return true;
	}
	else
	{
		return false;
	}
	

}






public function book_room($data,$datas,$pnrnumber)
{	
	//$this->db->where('id',$id);
	$this->db->insert('bookingroom',$data);

	$this->db->where('pnr_number',$pnrnumber);
	$this->db->update('bookingrooms',$datas);
	return $this->db->affected_rows() !=1 ? false:true;
}


public function book_rooms($data)
{	
	
	$this->db->insert('bookingrooms',$data);
	return $this->db->affected_rows() !=1 ? false:true;
}

public function booking_status($datefrom,$dateto)
{

	
	$this->db->select('*');
	$this->db->from('bookingroom');
	$this->db->where('datefrom >=',$datefrom);
	$this->db->where('dateto <=',$dateto);
	$this->db->where('status',1);

	return $this->db->get()->result_array();
}


public function sendmailbook_room()
{
	// $pnrnumber=$_POST['pnrnumber'];

	// $datas=$this->db->where('pnr_number',$pnrnumber)->get('bookingrooms')->result_array();
	// foreach ($datas as $row) {
	// 	$noofpersons=$row['adults'];
	// 	$noofchildrens=$row['children'];
	// }

	$message='	<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NTC </title>
</head>

<body>
<table width="600" border="2" align="center" cellpadding="0" cellspacing="0" style="border: 2px solid rgb(216, 216, 216);">
  <tr>
    <td align="left" valign="top" style="background-color: rgb(0, 123, 201);"><img src="'.base_url().'assests/img/logo.png" style="margin-left: 106px;"></td>
  </tr>
  <tr>
  <td>
 <table width="600" border="0" align="center">
 <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Reservation Number</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$_POST["pnrnumber"].'</strong></td>
        </tr>
  <tr>
 
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Check In Date&nbsp;& &nbsp; Time</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$_POST["date1"].'&nbsp;/&nbsp;'.$_POST["time"].'</strong></td>
        </tr>

        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Room Type</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$_POST["room_type"].'</strong></td>
        </tr>
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">No Of Units</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$_POST["noofrooms"].'</strong></td>
        </tr>
        


        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">No Of Adults</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$_POST["noofadults"].'</strong></td>
        </tr>
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">No of Childrens</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$_POST["children"].'</strong></td>
        </tr>
        
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Name</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$_POST["name"].'</strong></td>
        </tr>
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Email </td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$_POST["email"].'</strong></td>
        </tr>
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Mobile No </td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$_POST["mobileno"].'</strong></td>
        </tr>
         
         <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Amount </td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$_POST["totamount"].'</strong></td>
        </tr>
         <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Advance Amount</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$_POST["advance_amount"].'</strong></td>
        </tr>
         
        
          </table>
          </td>
          </tr>
      <tr>
      <td style="color: rgb(255, 255, 255); background-color: rgb(0, 123, 201); padding: 5px; text-align: center;">Copyright © ntc.my 2016.All rights reserved.</td>
      </tr>
        
               
  </table>

</body>
</html>
			';



			  $this->load->library('email');
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'mail.ntc.my';
        $config['smtp_user'] = 'info@ntc.my';
        $config['smtp_pass'] = 'ntc!@#$';
        $config['smtp_port'] = 25;
        $config['mailtype']='html';
        $config['charset']='utf-8';
        $config['mailpath']='/usr/sbin/sendmail';
        $this->email->initialize($config);

        
        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");
        $this->email->from('info@ntc.my','NTC');
     //$this->email->to('nube_hq@nube.org.my');
        $this->email->to('balaji@idreamdevelopers.org');
      $this->email->cc('');
      $this->email->bcc('');

      $this->email->subject('Room Booking Details');

      $this->email->message($message);

      $this->email->send();

			
			
$this->session->set_flashdata('msg','Room Booked Sucessfully');
redirect('bookingroom/printadvancereceipt');


}





}