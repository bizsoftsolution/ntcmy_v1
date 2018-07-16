<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Overallmodel extends CI_Model 
{

	

	
   public function reportscheckout()
   {
      $this->db->select('*');
      $this->db->from('checkoutroom');
      return $this->db->get()->result_array();
   }
	




}

	