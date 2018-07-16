<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Hallcheckoutmodel extends CI_Model 
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

   public function checkouthall($data)
   {

   	// echo "<pre>";
   	// print_r($pnrnumber);
   	 $this->db->insert('checkouthall',$data);
return $this->db->affected_rows() !=1 ? false:true;

   }

   public function reportscheckout()
   {
      $this->db->select('*');
      $this->db->from('checkouthall');
      $this->db->order_by('id','DESC');
      return $this->db->get()->result_array();
   }

   Public function search()
   {
      if(@$_POST['fromdate']!='')
      {
        $fromdate=$_POST['fromdate'];
      }
      else
      {
        $fromdate='';
      }
       if(@$_POST['todate']!='')
      {
        $todate=$_POST['todate'];
      }
      else
      {
        $todate='';
      }


      //00
      if($fromdate!='' && $todate!='')
      {
          $this->db->select('*');
          $this->db->from('checkouthall');
          $this->db->where('checkoutdate >=',$fromdate);
          $this->db->where('checkoutdate <=',$todate);
         
          $query=$this->db->get();
      }
      //01
      else  if($fromdate!='' && $todate=='')
      {
          $this->db->select('*');
          $this->db->from('checkouthall');
          $this->db->where('checkoutdate >=',$fromdate);          
         
          $query=$this->db->get();
      }
      //10
      else  if($fromdate=='' && $todate!='')
      {
          $this->db->select('*');
          $this->db->from('checkouthall');      
          $this->db->where('checkoutdate <=',$todate);
          
          $query=$this->db->get();
      }
      else
      {
        $this->db->select('*');
        $this->db->from('checkouthall');
        
        $query=$this->db->get();
      }
        return $query->result_array();



   }
	




}

	