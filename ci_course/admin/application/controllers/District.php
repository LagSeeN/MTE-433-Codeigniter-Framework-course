<?php 

class District extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();	

		$this->load->model('Province_model');
		$this->load->model('Amphur_model');
	}

	public function index()
	{
		$keyword = $this->input->get('keyword');
		$province_id = $this->input->get('province_id');
		$data['keyword'] = $keyword;
		$data['province_id'] = $province_id;


		$config['base_url'] = base_url("Amphur/index/");
		$config['total_rows'] = $this->Amphur_model->count($keyword,$province_id);
		$config['per_page'] = 10;

		$this->pagination->initialize($config);

		$data['links'] =  $this->pagination->create_links();

		$provinces = $this->Province_model->getAll(0,100);

		$arr = array('--Province--');
		foreach ($provinces as $province) {
			$arr[$province->province_id] = $province->province_name;
		}
		$data['provinces'] = $arr;


		$start = $this->uri->segment(3)>0?$this->uri->segment(3):0;
		$amphurs  = $this->Amphur_model->getAll($start, $config['per_page'] ,$keyword,$province_id);
		$data['total_rows'] = $config['total_rows'];
		$data['amphurs'] = $amphurs;
		$data['content'] = "amphur/show";
		$this->load->view("layout/main",$data);
	}

	public function add()
	{	
		$this->form_validation->set_rules('province_id','จังหวัด','greater_than[0]',array('greater_than'=>'กรุณาเลือก %s'));
		$this->form_validation->set_rules(
			'amphur_code', 
			' รหัสอำเภอ ', 
			'required|is_unique[amphur.amphur_code]', 
			array('required'=> ' กรุณากรอก %s ','is_unique'=>' %s ถูกใช้งานไปแล้ว'));

		$this->form_validation->set_rules('amphur_name', ' ชื่ออำเภอ ', 'required' , array('required'=> ' กรุณากรอก %s '));

		if($this->form_validation->run() == FALSE ){

			// Load form
			// $data['errors'] = validation_errors();
			$this->session->set_flashdata('flash_errors',validation_errors());
			
			$data['amphur'] = ''; 
			$data['method'] = "add";	

			$provinces = $this->Province_model->getAll(0,100);
			$arr = array('--Province--');
			foreach ($provinces as $province) {
				$arr[$province->province_id] = $province->province_name;
			}
			$data['provinces'] = $arr;

			$data["content"] = 'amphur/form';
			$this->load->view('layout/main',$data);
		}
		else{
			// SAVE
			// assign to variable
			$province_id = $this->input->post('province_id');
			$amphur_code = $this->input->post('amphur_code');
			$amphur_name = $this->input->post('amphur_name');

			// Prepare Query builder
			$params['province_id'] = $province_id;
			$params['amphur_code'] = $amphur_code;
			$params['amphur_name'] = $amphur_name;

			$this->db->insert('amphur',$params);

			$this->session->set_flashdata('flash_success','ข้อมูลถูกบันทึกแล้ว');

			redirect("Amphur/add");
		}

		
	}
	
	public function edit($amphur_id)
	{
		$this->form_validation->set_rules('province_id','จังหวัด','greater_than[0]',array('greater_than'=>'กรุณาเลือก %s'));
		$this->form_validation->set_rules(
			'amphur_code', 
			' รหัสอำเภอ ', 
			'trim|required', 
			array('required'=> ' กรุณากรอก %s '));

		$this->form_validation->set_rules('amphur_name', ' ชื่ออำเภอ ', 'required' , array('trim|required'=> ' กรุณากรอก %s '));

		if($this->form_validation->run() == FALSE ){
			
			// Load form
			// $data['errors'] = validation_errors();
			$this->session->set_flashdata('flash_errors',validation_errors());
			
			$provinces = $this->Province_model->getAll(0,100);
			$arr = array('--Province--');
			foreach ($provinces as $province) {
				$arr[$province->province_id] = $province->province_name;
			}
			$data['provinces'] = $arr;

			$data['amphur'] = $this->Amphur_model->getOne($amphur_id); 
			$data['method'] = "edit";			

			$data["content"] = 'amphur/form';
			$this->load->view('layout/main',$data);
		}
		else{
			// SAVE
			// assign to variable
			$province_id = $this->input->post('province_id');
			$amphur_code = $this->input->post('amphur_code');
			$amphur_name = $this->input->post('amphur_name');

			// Prepare Query builder
			$params['province_id'] = $province_id;
			$params['amphur_code'] = $amphur_code;
			$params['amphur_name'] = $amphur_name;

			$this->db->where('amphur_id',$amphur_id);
			$this->db->update('amphur',$params);

			$this->session->set_flashdata('flash_success','ข้อมูลถูกบันทึกแล้ว');

			redirect("Amphur/edit/$amphur_id",'refresh');
		}
	}

	public function delete($amphur_id)
	{
		$this->session->set_flashdata('flash_success','ข้อมูลถูกลบแล้วไม่สามารถย้อนกลับได้อีก');

		$this->db->where('amphur_id',$amphur_id);
		$this->db->delete('amphur');

		redirect("Amphur/index");
	}

	

}
 ?>