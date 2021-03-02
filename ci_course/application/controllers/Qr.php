<?php

class Qr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('MyQrcode');
    }

    public function index()
    {
        $this->myqrcode->png('https://shop.lagseen.me');
    }

    public function demo1()
    {
        //  $this->myqrcode->png('http://www.brandexdirectory.com',false,'QR_ECLEVEL_L',2);
        $this->myqrcode->png('http://www.brandexdirectory.com', false, 'QR_ECLEVEL_M', 6);
        //  $this->myqrcode::png('http://www.brandexdirectory.com/',false,'QR_ECLEVEL_Q',8);
        //  $this->myqrcode->png('http://www.brandexdirectory.com',false,'QR_ECLEVEL_H',10);
    }

}
