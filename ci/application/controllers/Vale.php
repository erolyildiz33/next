<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vale extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->isLogIn)
            redirect(base_url());
        

    }


    public function index()
    {
        echo "demee";

    }
     public function arachazirla($masaid=null)
    {
       $data['masaid']=$masaid;
       $this->load->view('aracgetir',$data);
    }
}