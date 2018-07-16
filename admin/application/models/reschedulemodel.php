<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reschedulemodel extends CI_Model 
{

	

	public function payadvance($data)
	{
		$this->db->insert('payadvance',$data);
		return $this->db->affected_rows() !=1 ? false:true;
 
	}

   public function payadons($data)
	{
		$this->db->insert('payadon',$data);
		return $this->db->affected_rows() !=1 ? false:true;
 
	}
 public function deleteadon($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('payadon');
		return $this->db->affected_rows() !=1 ? false:true;
 
	}

	




}

	