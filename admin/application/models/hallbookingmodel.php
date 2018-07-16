<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hallbookingmodel extends CI_Model 
{

	public function book_halls($data)
	{
		$this->db->insert('hallbooking',$data);
		return $this->db->affected_rows() !=1 ? false:true;
	}


	public function hallcheckin($data,$datas,$pnrnumber)
	{
		$this->db->insert('hallcheckin',$data);

		$this->db->where('pnrnumber',$pnrnumber);
	    $this->db->update('hallbooking',$datas);
		return $this->db->affected_rows() !=1 ? false:true;
	}

	
}

	