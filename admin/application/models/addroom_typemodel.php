<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addroom_typemodel extends CI_Model 
{



public function type_add($data)
{

	$this->db->insert('roomtypes',$data);
	return $this->db->affected_rows() !=1 ? false:true;

}

public function type_reports()
{

	
	$this->db->select('*');
	$this->db->from('roomtypes');
	$this->db->where('status',1);

	return $this->db->get()->result_array();
}

public function type_update($data,$id)
{
	$this->db->where('id',$id);
	$this->db->update('roomtypes',$data);
	return $this->db->affected_rows() !=1 ? false:true;

}

public function type_delete($id)
{
	$this->db->where('id',$id);
	$this->db->delete('roomtypes');
	return $this->db->affected_rows() !=1 ? false:true;

}





public function room_add($data)
{

	$this->db->insert('roomnotable',$data);
	return $this->db->affected_rows() !=1 ? false:true;

}


public function room_reports()
{

	
	$this->db->select('*');
	$this->db->from('roomnotable');
	$this->db->where('status',1);

	return $this->db->get()->result_array();
}

public function room_update($data,$id)
{
	$this->db->where('id',$id);
	$this->db->update('roomnotable',$data);
	return $this->db->affected_rows() !=1 ? false:true;

}

public function room_delete($id)
{
	$this->db->where('id',$id);
	$this->db->delete('roomnotable');
	return $this->db->affected_rows() !=1 ? false:true;

}


}