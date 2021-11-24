<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	

	}

	public function index()
	{
	    	if ($this->session->isLogIn)
		redirect('admin');
		$this->load->view('login');
	}
	public function login()
	{  
		
		$user = $this->input->post("user");
		$pass  = $this->input->post("pass");
		

		$result = $this->db->select("*")->from("kullanicilar")->where("username='".md5($user)."' and Password='".md5($pass)."'")->get()->result();

		if (!empty($result)) {
		    $this->session->set_userdata(['isLogIn' 	  => true,
					'kulid' 	 => $result[0]->id,'role'=>$result[0]->yetki]);
					echo "oldu";
		} else {
			echo "olmadı";
		}
	}

	public function logout()
	{ 
        $this->session->sess_destroy();
		redirect(base_url());
	}

}
