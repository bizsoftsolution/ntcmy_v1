<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class hallbookingreportsmodel extends CI_Model 
{

	

	public function repo_rts()
	{
		$this->db->order_by('checkindate','desc');
		$this->db->where('check_in',0);
		return $this->db->get('hallbooking')->result_array(); 
	}

   public function cancelrepo_rts()
	{		
		return $this->db->get('cancelhallbooking')->result_array(); 
	}

	public function updateconfirmstatus($id)
	{
		$this->db->limit(1);
		$this->db->order_by('id desc');
		$s=$this->db->get('hallbooking')->result_array();

		$this->db->limit(1);
		$this->db->order_by('id desc');
		$s=$this->db->get('hallbooking')->result_array();

		@$bond_no = $s[0]['pnrnumber'];
				if(is_null($bond_no)){
					$new_bond_noo = 'NUBE_HALL00001'; 
				} else {
					$old_bond_noo = str_split($bond_no,1);
					@$va = (string)($old_bond_noo[9].$old_bond_noo[10].$old_bond_noo[11].$old_bond_noo[12].$old_bond_noo[13])+1;  
					$bond_length = strlen($va);
					if($bond_length == 1){
						$new_bond_noo = 'NUBE_HALL0000'.$va;  
					} else if($bond_length == 2){
						$new_bond_noo = 'NUBE_HALL000'.$va;	 
					} else if($bond_length == 3){	
						$new_bond_noo = 'NUBE_HALL00'.$va;	 
					} else if($bond_length == 4){	 
						$new_bond_noo = 'NUBE_HALL0'.$va; 
					}
					else if($bond_length == 5)
					{	 
						$new_bond_noo = 'NUBE_HALL'.$va; 
					}
				}
				$pnrnumber=$new_bond_noo;

		//echo $data['userid'];

		$data= array('pnrnumber'=>$pnrnumber,
			        'ad_status' =>1);

		$this->db->where('id',$id);
		$this->db->update('hallbooking',$data);
		return $this->db->affected_rows() !=1 ? false:true;

	}

	public function sendmail($data)
	{

		 foreach ($data as $c) :

		 	$a1=$c['checkindate']; 
		 $b1=date('d/m/Y',strtotime($a1)); 

$a2=$c['checkoutdate']; 
$b2=date('d/m/Y',strtotime($a2)); 

		$message='

<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td bgcolor="#9A0000"><table width="600" border="0" align="center" cellpadding="0" cellspacing="0">

<tr>
<td><img src="'.base_url().'assests/image/header_top.jpg" alt="" width="600" height="73" border="0" style="display:block" /> 

<!-- BEGIN LOGO DATE -->

<table width="600" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="10" bgcolor="#DEDEDE"></td>
<td width="227" bgcolor="#FFFFFF"><a href="#"><img src="'.base_url().'assests/image/logo.png" alt="" width="227" height="61" border="0" style="display:block" /></a></td>
<td width="167" bgcolor="#FFFFFF"></td>
<!-- <td width="186" bgcolor="#FFFFFF"><img src="'.base_url().'assests/image/logo_right.jpg" alt="" width="186" height="98" border="0" style="display:block" /></a></td>-->
<td width="10" bgcolor="#DEDEDE"></td>
</tr>
</table>

<!-- END LOGO DATE -->

<img src="'.base_url().'assests/image/header_bottom.jpg" alt="" width="600" height="25" border="0" style="display:block" /></td>
</tr>
<tr>
<td bgcolor="#EEEDE9">

<!-- BEGIN MAIN BANNER -->

<table width="530" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td><img src="'.base_url().'assests/image/spacer.gif" alt="" width="1" height="16" style="display:block" /><a href="#"><img src="'.base_url().'assests/image/main_image.jpg" alt="" width="510" height="103" border="0" /></a></td>
</tr>
</table>

<!-- END MAIN BANNER -->

<!-- BEGIN LINE -->

<div align="center"><img src="'.base_url().'assests/image/line.jpg" alt="" width="510" height="2" vspace="8" border="0" /></div>

<!-- END LINE -->

<!-- BEGIN COLUMN -->

<table width="530" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>

<td width="334" height="16" valign="top"><span style="font-family:Arial, Helvetica, sans-serif; font-size:15px; font-weight:bold;line-height: 31px;color:rgb(253, 152, 0);">Hi '.$c['firstname'].'</span><br />
</td>
</tr>
</table>

<!-- END COLUMN --> 

<!-- BEGIN LINE -->

<div align="center"><img src="'.base_url().'assests/image/line.jpg" alt="" width="510" height="2" vspace="8" border="0" /></div>

<!-- END LINE -->
<table width="530" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td>
<span style="font-family:Arial, Helvetica, sans-serif; font-size:15px; font-weight:bold;line-height: 31px;color:rgb(246, 17, 86);">Booking Details </span><br>
</td>
</tr>
</table>
<table width="520" border="0" align="center" cellpadding="0" cellspacing="0" >

<tr>
<!-- BEGIN COLUMN 1 -->
<td width="100" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">Check IN</td>
 <td width="5" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">:</td> 
 <td width="99" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">'. $b1 .'</td>
 <td width="100" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">Check Out</td>
 <td width="5" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">:</td> 
 <td width="99" style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">'. $b2.'</td>
</tr>

 <tr>
<td  style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); "> PNR Number
 </td> 
 <td  style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">:</td> 
 <td  style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">'. $c['pnrnumber'].'</td></tr>
<tr>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">Name </td>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">:</td> 
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">'. $c['firstname'].'</td></tr>
<tr>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">Email </td>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">:</td>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">'. $c['email'].'</td></tr>
<tr>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">Mobile No </td>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">:</td>
<td style="font-family:Arial, Helvetica, sans-serif; font-size:13px; color:rgb(93, 88, 88); ">'. $c['mobileno'].'</td></tr>



<!-- END COLUMN 1 -->




</table>
<!-- BEGIN FOOTER -->
<!-- BEGIN LINE -->

<div align="center"><img src="'.base_url().'assests/image/line.jpg" alt="" width="510" height="2" vspace="8" border="0" /></div>

<!-- END LINE -->
<table width="530" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td>
<span style="font-family:Arial, Helvetica, sans-serif; font-size:15px; font-weight:bold;line-height: 31px;color:rgb(246, 17, 86);">Your  Booking was Confirmed </span><br>
</td>
</tr>
</table>

<!-- BEGIN LINE -->

<div align="center"><img src="'.base_url().'assests/image/line.jpg" alt="" width="510" height="2" vspace="8" border="0" /></div>

<!-- END LINE -->
<table width="510" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>

<td width="160" align="center"><table border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="25"><a href="#"><img src="'.base_url().'assests/image/facebook_16.png" alt="facebook" width="16" height="16" border="0" /></a></td>
<td width="25"><a href="#"><img src="'.base_url().'assests/image/twitter_16.png" alt="twitter" width="16" height="16" border="0" /></a></td>
<td><a href="#"><img src="'.base_url().'assests/image/rss_16.png" alt="rss" width="16" height="16" border="0" /></a></td>
</tr>
</table></td>

</tr>
</table>

<!-- END FOOTER -->

</td>
</tr>
<tr>
<td><span style="background-color:#EEEDE9"><img src="'.base_url().'assests/image/footer1.jpg" alt="" width="600" height="30" border="0" style="display:block" /></span></td>
</tr>
<tr>
<td bgcolor="#EEEDE9"><table width="580" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td height="28" valign="bottom" style="background-color:#F90">

<!-- BEGIN CONTACT -->

<div align="center" style="font-family:Arial, Helvetica, sans-serif; font-size:11px; color:#FFFFFF;"><st<strong>Nube Hotel</strong> Copyright &copy; 2016 </div>

<!-- END CONTACT -->

</td>
</tr>
</table></td>
</tr>
<tr>
<td><span style="background-color:#EEEDE9"><img src="'.base_url().'assests/image/footer2.jpg" alt="" width="600" height="73" border="0" style="display:block" /></span></td>
</tr>
</table></td>
</tr>
</table>
';

 




		$config = Array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => 'balaji@idreamdevelopers.org',
				'smtp_pass' => 'idream001',
				'mailtype' => 'html'
				);



			$this->load->library('email', $config);

			$this->email->set_newline("\r\n");
			$this->email->set_mailtype("html");
			$this->email->from('balaji@idreamdevelopers.org');
			$this->email->to($c['email']);
			$this->email->cc('');
			$this->email->bcc('');

			$this->email->subject('Booking Confirmation');

			$this->email->message($message);

			$this->email->send();

			
       //echo $this->email->print_debugger();
			

			$this->session->set_flashdata("msg","Booking Confirmation is Success");
			redirect('hallbookingreports');

       endforeach;

	}


	public function bookingcancel($id,$cancelreason)
	{
		$data=$this->db->where('id',$id)->get('hallbooking')->result_array();

		foreach ($data as $a) {

			        $pnrnumber=$a['pnrnumber'];
					$checkindate=$a['checkindate'];
					$firstname=$a['firstname'];
					$lastname=$a['lastname'];
					$email=$a['email'];
					$mobileno=$a['mobileno'];
					$address=$a['address'];
					$country=$a['country'];
					$halltype=$a['halltype'];
					$halltypeid=$a['halltypeid'];
					$hallamount=$a['hallamount'];
					$slot=$a['slot'];
					$bookingtype=$a['bookingtype'];
					

						
		}


		$datas=array('date'=>date('Y-m-d'),
			        'pnrnumber'=>$pnrnumber,
					'checkindate'=>$checkindate,
					'firstname'=>$firstname,
					'lastname'=>$lastname,
					'email'=>$email,
					'mobileno'=>$mobileno,
					'address'=>$address,
					'country'=>$country,
					'halltype'=>$halltype,
					'halltypeid'=>$halltypeid,
					'hallamount'=>$hallamount,
					'slot' =>$slot,
					'bookingtype'=>$bookingtype,
					'cancelreason'=>$cancelreason,
										);

		       $this->db->insert('cancelhallbooking',$datas);


				$this->db->where('id',$id);
				$this->db->delete('hallbooking');

				return $this->db->affected_rows() !=1 ? false:true;


	}



	




}

	