<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkinmodel extends CI_Model 
{

	

	public function checkin_reports()
	{
		$this->db->order_by('datefrom','desc');
		$this->db->where('checkout',0);
		return $this->db->get('bookingroom')->result_array(); 
	}

   


	




}

	