<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('isLogIn'))

			redirect('admin');

	}

	public function index()
	{
		$this->load->view('login');
	}
	public function login()
	{  
		
		$user = $this->input->post("user");
		$pass  = $this->input->post("pass");
		

		$result = $this->db->select("*")->from("kullanicilar")->where("username='".md5($user)."' and Password='".md5($pass)."'")->get()->result();

		if (!empty($result)) {
			$this->session->set_userdata(["kulid"=>$result[0]->id,'isAdmin'=>1,'isLogIn'=>1]);
			
			echo "oldu";
		} else {
			echo "olmadi";
		}
	}

	public function logout()
	{ 
		$this->session->sess_destroy();
		//redirect(base_url());
	}

}
