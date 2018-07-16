<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signinmodel extends CI_Model 
{

	

	public function val_act($username,$password)
	{
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		return $this->db->get('login')->result(); 
	}



	public function val_id($username,$password)
	{
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		return $this->db->get('login')->result_array(); 
	}




}

	