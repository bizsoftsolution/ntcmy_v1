<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hallcheckinmodel extends CI_Model 
{

	

	public function checkin_reports()
	{
		$this->db->order_by('checkindate','desc');
		$this->db->where('checkout',0);
		return $this->db->get('hallcheckin')->result_array(); 
	}

   


	




}

	