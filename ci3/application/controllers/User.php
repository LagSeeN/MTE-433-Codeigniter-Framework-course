<?php

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        # code...
    }

    public function login()
    {
        $this->load->view("login.php");
    }
}
