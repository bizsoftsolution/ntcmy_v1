<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {


	public function __construct()
	{
		parent::__construct();

		
		$this->load->model('signinmodel');
		

	}

	
	public function index()
	{

		if($this->session->userdata('is_logged_in')=='')
		{
			 $this->session->set_flashdata('msg','Login To Continue');
			$this->load->view('login/login');
		}
		else
		{
			redirect('dashboard');

		}
		
	}

	function validate()
   {
 	
 	
 	$username=$this->input->post('username');
 	$password=$this->input->post('password');

 	
 			
//echo "xcczx";
 				$getact=$this->signinmodel->val_act($username,$password);

		 			if($getact)
		 			{
			 				$getid=$this->signinmodel->val_id($username,$password);
			 				foreach ($getid as $row)
			 				 {

				 				
							 	$name=$row['name'];
					            $email=$row['email'];
					            $username=$row['username'];
					            $password=$row['password'];
					            $mobileno=$row['mobileno'];
					            $address=$row['address'];

			 			     }

			 			$data=array('name' => $name,
						            'email' => $email,
						            'username' => $username,
						            'password' => $password,
						            'mobileno' => $mobileno,
						            'address' =>  $address,
			 						'is_logged_in'=>true);

			 			$this->session->set_userdata($data);
			 			redirect('login');
		 			}
		 			else
		 			{
		 				$this->session->set_flashdata('msg1','Username password Incorrect');
		 			    redirect('login');
		 			}

 		

 }


 function logout()
    {
    	
    	$this->session->sess_destroy();

		redirect('login','refresh');
    }



}

