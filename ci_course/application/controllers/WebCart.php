<?php

class WebCart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('Products_model');
    }

    public function index()
    {
        # code...
        $cart = $this->cart->contents();
        print_r($cart);
    }

    public function add()
    {
        # code...
        // foreach ($this->input->post() as $key => $value) {
        //     # code...
        //     //echo "$key = $value";
        //     echo "\$key = \$this->input->post('$key');<br>";
        // }
        $pro_id = $this->input->post('pro_id');
        $qty = $this->input->post('qty');
        $product = $this->Products_model->getOne($pro_id);
        $data = array(
            'id' => "$pro_id",
            'qty' => "$qty",
            'price' => "$pro_id",
            'name' => $product->pro_name_en,
            'options' => array('TH' => $product->pro_name_th, 'EN' => $product->pro_name_en),
        );
        $this->cart->insert($data);
        redirect('WebCart/index');

    }

    public function edit()
    {
        # code...
    }

    public function delete($pro_id)
    {
        # code...
    }

}
