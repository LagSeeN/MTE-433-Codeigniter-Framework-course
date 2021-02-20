<?php

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('language') == '') {
            $this->session->set_userdata('language', 'TH');
        }
        $this->lang->load($this->session->userdata('language'), 'lang');
        $this->load->model('Products_model');

    }

    public function index()
    {
        $data['lang'] = $this->session->userdata('language');

        $config['base_url'] = base_url('Home/Index');
        $config['total_rows'] = $this->Products_model->count();
        $config['per_page'] = 18;

        $this->pagination->initialize($config);

        $data['links'] = $this->pagination->create_links();

        $start = $this->uri->segment(3) > 0 ? $this->uri->segment(3) : 0;
        $products = $this->Products_model->getAll($start, $config['per_page']);

        $data['total_rows'] = $config['total_rows'];
        $data['products'] = $products;

        $this->load->view('watchshop/index.php', $data);
    }

    public function productDetail($pro_id)
    {
        # code...
        $data['lang'] = $this->session->userdata('language');
        $data['product'] = $this->Products_model->getOne($pro_id);
        $this->load->view('watchshop/product_details', $data);
    }

    public function updatePrice()
    {
        $products = $this->Products_model->getAll(0, 10000);
        foreach ($products as $product) {
            # code...
            $this->db->where('pro_id', $product->pro_id);
            $params = array('pro_price' => rand(200, 1000));
            $this->db->update('products', $params);
        }
    }
}
