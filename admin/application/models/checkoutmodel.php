<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkoutmodel extends CI_Model 
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

   public function checkoutroom($data)
   {

   	// echo "<pre>";
   	// print_r($pnrnumber);
   	 $this->db->insert('checkoutroom',$data);
     return $this->db->affected_rows() !=1 ? false:true;

   }

   public function reportscheckout()
   {
      $this->db->select('*');
      $this->db->from('checkoutroom');
      $this->db->order_by('id','DESC');
      return $this->db->get()->result_array();
   }


   public function detailsroom()
   {
      $this->db->select('*');
      $this->db->from('bookingroom');
      $this->db->order_by('id','DESC');
      return $this->db->get()->result_array();
   }

   public function mailcheckoutroom($pnrnumber,$datefrom,$time,$room_type,$noofrooms,$adults,$children,$name,$email,$mobileno,$billnumber,$roomno)
{
   // $pnrnumber=$_POST['pnrnumber'];

   // $datas=$this->db->where('pnr_number',$pnrnumber)->get('bookingrooms')->result_array();
   // foreach ($datas as $row) {
   //    $noofpersons=$row['adults'];
   //    $noofchildrens=$row['children'];
   // }

   $message='  <html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>NTC </title>
</head>

<body>
<table width="600" border="2" align="center" cellpadding="0" cellspacing="0" style="border: 2px solid rgb(216, 216, 216);">
  <tr>
    <td align="left" valign="top" style="background-color: rgb(0, 123, 201);"><img src="'.base_url().'assests/img/logo.png" style="margin-left: 106px;"></td>
  </tr>
  <tr>
  <td>
 <table width="600" border="0" align="center">
     <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Bill Number</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$billnumber.'</strong></td>
        </tr>
       <tr>
       <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Reservation Number</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$pnrnumber.'</strong></td>
        </tr>
       <tr>
 
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Check In Date&nbsp;& &nbsp; Time</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$datefrom.'&nbsp;/&nbsp;'.$time.'</strong></td>
        </tr>

         <tr>
 
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Check Out Date&nbsp;& &nbsp; Time</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$_POST['checkoutdate'].'&nbsp;/&nbsp;'.$_POST['time'].'</strong></td>
        </tr>

        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Room Type</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$room_type.'</strong></td>
        </tr>
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">No Of Units</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$noofrooms.'</strong></td>
        </tr>
        

        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">No Of Adults</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$adults.'</strong></td>
        </tr>
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">No of Childrens</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$children.'</strong></td>
        </tr>
        
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Name</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$name.'</strong></td>
        </tr>
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Email </td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$email.'</strong></td>
        </tr>
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Mobile No </td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$mobileno.'</strong></td>
        </tr>
         
         <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Total Amount </td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$_POST["totalamount"].'</strong></td>
        </tr>
         <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Advance Amount</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$_POST["advanceamount"].'</strong></td>
        </tr>

        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Balance Amount</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$_POST["balanceamount"].'</strong></td>
        </tr>

        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Refund Amount</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$_POST["returnamount"].'</strong></td>
        </tr>
         
        
          </table>
          </td>
          </tr>
      <tr>
      <td style="color: rgb(255, 255, 255); background-color: rgb(0, 123, 201); padding: 5px; text-align: center;">Copyright © ntc.my 2016.All rights reserved.</td>
      </tr>
        
               
  </table>

</body>
</html>
         ';



           $this->load->library('email');
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'mail.ntc.my';
        $config['smtp_user'] = 'info@ntc.my';
        $config['smtp_pass'] = 'ntc!@#$';
        $config['smtp_port'] = 25;
        $config['mailtype']='html';
        $config['charset']='utf-8';
        $config['mailpath']='/usr/sbin/sendmail';
        $this->email->initialize($config);

        
        $this->email->set_newline("\r\n");
        $this->email->set_mailtype("html");
        $this->email->from('info@ntc.my','NTC');
      $this->email->to('nube_hq@nube.org.my');
      $this->email->cc('');
      $this->email->bcc('');

      $this->email->subject('Room Checkout Details');

      $this->email->message($message);

      $this->email->send();

         
         
          $this->session->set_flashdata('msg','Room checkout sucessfully');
          redirect('checkout/printbillreceipt');


}


public function totalcheck()
   {
      $this->db->select('*');
      $this->db->from('checkoutroom');
      
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
          $this->db->from('checkoutroom');
          $this->db->where('checkoutdate >=',$fromdate);
          $this->db->where('checkoutdate <=',$todate);
         
          $query=$this->db->get();
      }
      //01
      else  if($fromdate!='' && $todate=='')
      {
          $this->db->select('*');
          $this->db->from('checkoutroom');
          $this->db->where('checkoutdate >=',$fromdate);          
         
          $query=$this->db->get();
      }
      //10
      else  if($fromdate=='' && $todate!='')
      {
          $this->db->select('*');
          $this->db->from('checkoutroom');      
          $this->db->where('checkoutdate <=',$todate);
          
          $query=$this->db->get();
      }
      else
      {
        $this->db->select('*');
        $this->db->from('checkoutroom');
        
        $query=$this->db->get();
      }
        return $query->result_array();



   }
	




}

	