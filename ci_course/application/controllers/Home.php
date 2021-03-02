<?php 

class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		if($this->session->userdata('language')==''){
			$this->session->set_userdata('language','TH');
		}
		// $this->load->helper('language');
		// $this->lang->load('TH', 'lang');
		$this->lang->load($this->session->userdata('language'), 'lang');
		$this->load->model('Products_model');
	}

	public function index()
	{
		
		$data['lang'] = $this->session->userdata('language');

		$config['base_url'] = base_url('Home/index/');	
		$config['total_rows'] = $this->Products_model->count();
		$config['per_page'] = 18;		
		$this->pagination->initialize($config);
		$data['links'] = $this->pagination->create_links();

		$start = $this->uri->segment(3)>0?$this->uri->segment(3):0;
		$products  = $this->Products_model->getAll($start, $config['per_page']);

		$data['total_rows'] = $config['total_rows'];
		$data['products'] = $products;

		$this->load->view('watchshop/index',$data);
	}

	public function Products()
	{
		echo "Products";
	}

	public function Aboutus()
	{
		echo "About us";
	}

	public function Contactus()
	{
		echo " Contact us ";
	}

	public function productDetail($pro_id)
	{
		$data['lang'] = $this->session->userdata('language');
		
		$data['product'] = $this->Products_model->getOne($pro_id);

		$this->load->view('watchshop/product_detail',$data);
	}

	public function updateprice()
	{
		$products  = $this->Products_model->getAll(0, 10000);
		foreach ($products as $product) {
			
			$this->db->where('pro_id',$product->pro_id);
			$params = array('pro_price' => rand(200,5000));
			$this->db->update('products',$params);
		}
	}
	
}
 ?>