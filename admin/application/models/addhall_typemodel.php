<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addhall_typemodel extends CI_Model 
{



public function type_add($data)
{

	$this->db->insert('halltypes',$data);
	return $this->db->affected_rows() !=1 ? false:true;

}

public function type_reports()
{

	
	$this->db->select('*');
	$this->db->from('halltypes');
	$this->db->where('status',1);

	return $this->db->get()->result_array();
}




}