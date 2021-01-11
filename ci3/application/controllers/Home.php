<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data['content'] = "home/index";
        $this->load->view('layout/main', $data);
    }
}
