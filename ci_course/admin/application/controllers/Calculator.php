<?php  

class Calculator extends CI_Controller {

	public function index()
	{
		echo "Index function in Calculator";
	}

	public function plus($a = 0,$b = 0)
	{
		// echo "<h1>$a + $b = ".($a+$b)."</h1>";
		
		$data = array('a'=>$a ,'b'=>$b );

		$this->load->view('plus',$data );
	}

	public function getProvince()
	{
		
		// Retrive data from province table 
		// $query = $this->db->query(" select * from province ");
		// $provinces = $query->result();
		$this->load->model('Province_model');

		$provinces = $this->Province_model->getAll();
		// echo $this->db->last_query();
		// exit();		
		// Prepare data to view
		$data['provinces'] = $provinces;


		// print_r($provinces);
		// exit();
		// $provinces[0]->province_name;
		$this->load->view('showProvince',$data);
	}

}
