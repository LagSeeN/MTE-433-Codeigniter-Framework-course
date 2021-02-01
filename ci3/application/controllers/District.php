<?php

class District extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Province_model');
        $this->load->model('Amphur_model_New');
        $this->load->model('District_model');
    }

    public function index()
    {
        $keyword = $this->input->get('keyword');
        $province_id = $this->input->get('province_id');
        $amphur_id = $this->input->get('amphur_id');

        $data['keyword'] = $keyword;
        $data['province_id'] = $province_id;
        $data['amphur_id'] = $amphur_id;

        $config['base_url'] = base_url('district/Index');
        $config['total_rows'] = $this->District_model->count($keyword, $province_id, $amphur_id);
        $config['per_page'] = 10;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'First';
        $config['last_link'] = 'Last';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active page-link"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        // ค้นหาเลือกจังหวัด
        $provinces = $this->Province_model->getAll(0, 100);
        $arr = array('--จังหวัด--');
        foreach ($provinces as $province) {
            $arr[$province->province_id] = $province->province_name;
        }
        $data['provinces'] = $arr;

        // ค้นหาเลือกจังหวัด
        // $amphurs = $this->Amphur_model_New->getAll(0, 999);
        // foreach ($amphurs as $amphur) {
        //     $arr[$amphur->amphur_id] = $amphur->amphur_name;
        // }
        // $data['amphurs_list'] = $arr;

        $start = $this->uri->segment(3) > 0 ? $this->uri->segment(3) : 0;
        if ($province_id > 0) {
            $data['links'] = "";
            $data['districts'] = $this->District_model->getAll($start, $config['total_rows'], $keyword, $province_id, $amphur_id);
        } else {
            $data['links'] = $this->pagination->create_links();
            $data['districts'] = $this->District_model->getAll($start, $config['per_page'], $keyword, $province_id, $amphur_id);
        }

        $data["total_rows"] = $config['total_rows'];

        $data['content'] = "district/show";
        $this->load->view("layout/main", $data);
    }

    public function add()
    {
        $this->form_validation->set_rules("province_id", "จังหวัด", "greater_than[0]", array("greater_than" => "กรุณาเลือก%s"));
        $this->form_validation->set_rules("amphur_id", "อำเภอ", "greater_than[0]", array("greater_than" => "กรุณาเลือก%s"));
        $this->form_validation->set_rules('district_code', 'รหัสตำบล', 'required|is_unique[districts.district_code]',
            array('required' => 'กรุณากรอก %s', 'is_unique' => '%s ถูกใช้งานไปแล้ว'));
        $this->form_validation->set_rules('district_name', 'ชื่อตำบล', 'required', array('trim|required' => 'กรุณากรอก %s'));
        if ($this->form_validation->run() == false) {
            //$data['errors'] = validation_errors();

            $this->session->set_flashdata("flash_errors", validation_errors());

            $provinces = $this->Province_model->getAll(0, 100);
            $arr = array('--จังหวัด--');
            foreach ($provinces as $province) {
                $arr[$province->province_id] = $province->province_name;
            }
            $data['provinces'] = $arr;

            $amphurs = $this->Amphur_model_New->getAll(0, 999);
            $arr = array('--อำเภอ--');
            foreach ($amphurs as $amphur) {
                $arr[$amphur->amphur_id] = $amphur->amphur_name;
            }
            $data['amphurs'] = $arr;

            $data['method'] = "add";

            $data['content'] = 'district/form';
            $this->load->view('layout/main', $data);
        } else {
            // save
            $province_id = $this->input->post('province_id');
            $amphur_id = $this->input->post('amphur_id');
            $district_code = $this->input->post('district_code');
            $district_name = $this->input->post('district_name');

            $param['province_id'] = $province_id;
            $param['amphur_id'] = $amphur_id;
            $param['district_code'] = $district_code;
            $param['district_name'] = $district_name;

            $this->db->insert('districts', $param);

            $this->session->set_flashdata('flash_success', 'ข้อมูลถูกบันทึกแล้ว');
            redirect(base_url('district/add'));
        }

    }

    public function edit($district_id)
    {
        $this->form_validation->set_rules("province_id", "จังหวัด", "greater_than[0]", array("greater_than" => "กรุณาเลือก%s"));
        $this->form_validation->set_rules("amphur_id", "อำเภอ", "greater_than[0]", array("greater_than" => "กรุณาเลือก%s"));
        $this->form_validation->set_rules('district_code', 'รหัสตำบล', 'required',
            array('required' => 'กรุณากรอก %s'));
        $this->form_validation->set_rules('district_name', 'ชื่อตำบล', 'required', array('trim|required' => 'กรุณากรอก %s'));
        if ($this->form_validation->run() == false) {
            //$data['errors'] = validation_errors();

            $this->session->set_flashdata("flash_errors", validation_errors());

            $provinces = $this->Province_model->getAll(0, 100);
            $arr = array('--จังหวัด--');
            foreach ($provinces as $province) {
                $arr[$province->province_id] = $province->province_name;
            }
            $data['provinces'] = $arr;

            $amphurs = $this->Amphur_model_New->getAll(0, 999);
            $arr = array('--อำเภอ--');
            foreach ($amphurs as $amphur) {
                $arr[$amphur->amphur_id] = $amphur->amphur_name;
            }
            $data['amphurs'] = $arr;

            $data['district'] = $this->District_model->getOne($district_id);
            $data['method'] = "edit";

            $data['content'] = 'district/form';
            $this->load->view('layout/main', $data);
        } else {
            // save
            $province_id = $this->input->post('province_id');
            $amphur_id = $this->input->post('amphur_id');
            $district_code = $this->input->post('district_code');
            $district_name = $this->input->post('district_name');

            $param['province_id'] = $province_id;
            $param['amphur_id'] = $amphur_id;
            $param['district_code'] = $district_code;
            $param['district_name'] = $district_name;
            
            

            $this->db->where('district_id', $district_id);
            $this->db->update('districts', $param);

            $this->session->set_flashdata('flash_success', 'ข้อมูลถูกบันทึกแล้ว');
            redirect("district/edit/$district_id");
        }
    }

    public function delete($district_id)
    {
        $this->db->where('district_id', $district_id);
        $this->db->delete('districts');

        $this->session->set_flashdata('flash_success', 'ข้อมูลถูกลบไปแล้วไม่สามารถกู้คืนได้อีก');
        redirect("district/index");
    }

}
