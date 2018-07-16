<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reportsmodel extends CI_Model 
{

	

	public function repo_rts()
	{
		
		$this->db->where('check_in',0);
		$this->db->where('ad_status',1);
		return $this->db->get('bookingrooms')->result_array(); 
	}

	public function notbookingrepo_rts()
	{
		
		$this->db->where('check_in',0);
		$this->db->where('ad_status',0);
		$this->db->where_not_in('reject_status',2);
		return $this->db->get('bookingrooms')->result_array(); 
	}

	public function rejected_reports()
	{
		
		$this->db->where('reject_status',2);
		return $this->db->get('bookingrooms')->result_array(); 
	}

   public function cancelrepo_rts()
	{		
		return $this->db->get('cancelbooking')->result_array(); 
	}

	public function updateconfirmstatus($id,$transcationid)
	{
		
		$s=$this->db->where('id',$id)->get('bookingrooms')->result_array();

		foreach ($s as $e) 
		{
				$onlinepayments=$e['onlinepayment']+$e['internethandlingcharges'];
			
		}


	

		$data=array('transcation_id'=>$transcationid,
					'onlinepayments'=>$onlinepayments,
			        'ad_status' =>1);
		// echo "<pre>";
		// print_r($data);

		$this->db->where('id',$id);
		$this->db->update('bookingrooms',$data);
		return $this->db->affected_rows() !=1 ? false:true;

	}

	


	public function bookingcancel($id)
	{
		


				$data=array(
					'status'=>0,
			        'ad_status' =>0,
			        'reject_status'=>2);
		// echo "<pre>";
		// print_r($data);

		$this->db->where('id',$id);
		$this->db->update('bookingrooms',$data);
		return $this->db->affected_rows() !=1 ? false:true;

			


	}



	




}

	