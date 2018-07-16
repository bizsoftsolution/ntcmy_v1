<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class hallreschedulemodel extends CI_Model 
{

	
   public function payadons($data)
	{
		$this->db->insert('hall_payadon',$data);
		return $this->db->affected_rows() !=1 ? false:true;
 
	}

	 public function updatepayadons($dat,$pnr_number)
	{
		$this->db->where('pnr_number',$pnr_number);
		$this->db->update('hall_payadon',$dat);
		return $this->db->affected_rows() !=1 ? false:true;
 
	}


	




}

	