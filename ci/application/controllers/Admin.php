<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();	

		if (!$this->session->userdata('isAdmin')) 
			redirect(base_url());

		if (!$this->session->userdata('isLogin') 
			&& !$this->session->userdata('isAdmin'))
			redirect('admin');
		
		
	}



	public function index()
	{
		$data['kullanici']=$this->db->select("isimsoyad")->from("kullanicilar")->where("id",$this->session->userdata("kulid"))->get()->row();
		$this->load->view('admin',$data);
	}

	
	public function getcustomers()
	{
		echo json_encode($this->db->select("*")->from("rezervasyon")->get()->result());
	}

}
