<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller {


	public function __construct()
	{

		parent::__construct();
		if($this->session->userdata('is_logged_in')=='')
		{
			 $this->session->set_flashdata('msg','Login To Continue');
			redirect('login');
		}

		
		$this->load->model('reportsmodel');
		

	}

	
	public function index()
	{

			$data['rep']=$this->reportsmodel->repo_rts();
			$this->load->view('includes/header',$data);
			$this->load->view('reports');
			$this->load->view('includes/footer');

		
	}

	public function unpaidreports()
	{

			$data['rep']=$this->reportsmodel->notbookingrepo_rts();
			$this->load->view('includes/header',$data);
			$this->load->view('unpaidreports');
			$this->load->view('includes/footer');

		
	}

	public function rejectedreports()
	{

			$data['rep']=$this->reportsmodel->rejected_reports();
			$this->load->view('includes/header',$data);
			$this->load->view('rejectedreports');
			$this->load->view('includes/footer');

		
	}

	public function confirmstatus()
	{
		$id=$this->input->post('id');
		$transcationid=$this->input->post('transcationid');


		$result=$this->reportsmodel->updateconfirmstatus($id,$transcationid);

		if($result==true)
		{

	   $s=$this->db->where('id',$id)->get('bookingrooms')->result_array();

		foreach ($s as $row) 
		{
				$pnr_numbers=$row['pnr_number'];
				$nubememberid=$row['nubememberid'];
				$firstname=$row['firstname'];
				$email=$row['email'];
                $mobile=$row['mobile'];
                 $checkin=$row['checkin'];
                  $checkout=$row['checkout'];
                  $roomtype=$row['roomtype'];
                   $room_no=$row['room_no'];
                    $numberofdays=$row['numberofdays'];
                     $total=$row['total'];
                  $internethandlingcharges=$row['internethandlingcharges'];
                  $item_price=$row['onlinepayments'];
                  $item_transaction=$row['transcation_id'];
			
		}

$date1 = str_replace('-', '/', $checkin);
  $checkind= date('d/m/Y', strtotime($date1));

  $date2 = str_replace('-', '/', $checkout);
  $checkoutd= date('d/m/Y', strtotime($date2));

		if($nubememberid)
           {
            $nume='YES';
           }
           else
           {
            $nume='NO';
           }

$message='	<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book My College </title>
</head>

<body>
<table width="600" border="2" align="center" cellpadding="0" cellspacing="0" style="border: 2px solid rgb(216, 216, 216);">
  <tr>
    <td align="left" valign="top" style="background-color: rgb(0, 123, 201);"><img src="http://ntc.my/images/logo.png" style="margin-left: 106px;"></td>
  </tr>
  <tr>
  <td>
 <table width="600" border="0" align="center">
  <tr>
 

          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Reservation Number</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$pnr_numbers.'</strong></td>
        </tr>

        <tr>
 

          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Nube Member</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$nume.'</strong></td>
        </tr>

        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Name</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$firstname.'</strong></td>
        </tr>
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Email</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$email.'</strong></td>
        </tr>
         <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Mobile No </td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$mobile.'</strong></td>
        </tr>
        <tr>
          <td width="178" style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Check IN</td>
          <td width="25" style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td width="397" style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$checkind.'</strong></td>
        </tr>


        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Check OUT</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$checkoutd.'</strong></td>
        </tr>
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Room Type</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$roomtype.'</strong></td>
        </tr>
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">No of Rooms</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$room_no.'</strong></td>
        </tr>
       
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">No of Nights</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$numberofdays.'</strong></td>
        </tr>

        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Total Room Rent</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.number_format($total,2).'</strong></td>
        </tr>
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Internet Handling Charges</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.number_format($internethandlingcharges,2).'</strong></td>
        </tr>
       
        <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Total Amount</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.number_format($item_price,2).'</strong></td>
        </tr>
          <tr>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">Your Payment Transcation Id</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;">:</td>
          <td style="border-bottom: 3px solid rgb(242, 242, 242);padding: 11px;"><strong>'.$item_transaction.'</strong></td>
        </tr>
       
        
          </table>
          </td>
          </tr>
      <tr>
      <td style="color: rgb(255, 255, 255); background-color: rgb(0, 123, 201); padding: 5px; text-align: center;">Copyright © ntc 2016.All rights reserved.</td>
      </tr>
        
               
  </table>

</body>
</html>';


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
     //$this->email->to('anitha.bizsoft@gmail.com');
        $this->email->to($email);
      $this->email->cc('');
      $this->email->bcc('');

      $this->email->subject('Room Booking Confirmation');

      $this->email->message($message);

      $this->email->send();









			
			$this->session->set_flashdata('msg1','Booking Confirmation Sucessfully');
			redirect('reports');
			


		}

		else
		{
			$this->session->set_flashdata('msg1','Booking Confirmation is Failed');
			redirect('reports/unpaidreports');
		}



		
	}

	public function cancelbooking()
	{
		$id=$this->input->post('id');
		
		$result=$this->reportsmodel->bookingcancel($id,$cancelreason);

		if($result==true)
		{
					
			$this->session->set_flashdata('msg','Booking Cancelled sucessfully');
			redirect('reports/unpaidreports');

		}

		else
		{
			$this->session->set_flashdata('msg1','Booking Confirmation is Failed');
			redirect('reports/unpaidreports');
			
		}

	}	

		public function cancelbookingreports()
	{

			$data['rep']=$this->reportsmodel->cancelrepo_rts();
			$this->load->view('includes/header',$data);
			$this->load->view('cancelreports');
			$this->load->view('includes/footer');

		
	}


	public function viewdetails()
{
  $id=$this->uri->segment('3');
  $data['details']=$this->db->where('id',$id)->get('bookingrooms')->result_array();
  $this->load->view('includes/header');
  $this->load->view('bookingdetails',$data);
  $this->load->view('includes/footer');
}



		
	



}	