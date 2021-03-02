<?php 

class WebCart extends CI_controller
{	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Products_model');
		if($this->session->userdata('language')==''){
			$this->session->set_userdata('language','TH');
		}
		$this->lang->load($this->session->userdata('language'), 'lang');
		
	}

	public function index()
	{
		$data['lang'] = $this->session->userdata('language');
		
		$this->load->view('watchshop/cart',$data);
	}

	public function add()
	{
		// foreach ($this->input->post() as $key => $value) {
		// 	// echo "$key = $value";
		// 	echo "\$$key = \$this->input->post('$key');<br>";
		// }
		$this->load->library('cart');

		$pro_id = $this->input->post('pro_id');		
		$qty = $this->input->post('qty');
		$product = $this->Products_model->getOne($pro_id);
		
		$data = array(
        'id'      => "$pro_id",
        'qty'     => "$qty",
        'price'   => "$pro_id",
        'name'    => $product->pro_name_en,
        'options' => array('TH'=>$product->pro_name_th,'EN'=>$product->pro_name_en), 
		);
		$this->cart->insert($data);
		redirect("WebCart/index");
	}

	public function edit()
	{
		$qty = $this->input->post('qty');
		$rowid = $this->input->post('rowid');
		$data = array();
		foreach ($qty as $key=>$qty_item) {
			$data[] = array(
				'rowid'=>$rowid[$key],
				'qty'=>$qty[$key],
			);
		}
		
		$this->cart->update($data);
		
		redirect("WebCart/index");
		
	}

	public function delete($rowid)
	{
		$this->cart->remove($rowid);
		redirect("WebCart/index");
	}

}
 ?>