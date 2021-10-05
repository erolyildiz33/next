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
		echo json_encode($this->db->select("*")->from("rezervasyon")->join('masalar', 'masalar.id = rezervasyon.masaid')->get()->result());
	}
	public function addrezervasyon()
	{
		$adsoy=$this->input->post("adsoyad");
		$tel=$this->input->post("tel");
		$masaid=$this->input->post("yetki");
		$tarih=explode(" ",$this->input->post("tarihsaat"))[0];
		$saat=explode(" ",$this->input->post("tarihsaat"))[1];
		$this->db->insert('rezervasyon',['adsoy'=>$adsoy,'tel'=>$tel,'masaid'=>$masaid,'tarih'=>$tarih,'saat'=>$saat,'kul_id'=>$this->session->userdata('kulid')
	]);
		echo "oldu";
		
	}

}
