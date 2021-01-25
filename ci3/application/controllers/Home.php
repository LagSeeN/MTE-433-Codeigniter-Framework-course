<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata("ss_admin_id") == "") {
        //     redirect('User/login', 'refresh');
        // }
    }

    public function index()
    {
        // $this->session->userdata("ss_admin_id");
        $data['content'] = "home/index";
        $this->load->view('layout/main', $data);
    }
}
