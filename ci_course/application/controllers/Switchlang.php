<?php

class Switchlang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
    }

    public function changeTo($lang)
    {
        # code...
        $this->session->set_userdata('language', $lang);
        redirect('Home/index');

    }

}
