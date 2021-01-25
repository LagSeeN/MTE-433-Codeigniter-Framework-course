<?php

class Amphur_New extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Province_model');
        $this->load->model('Amphur_model_New');
    }

    public function index()
    {
        $keyword = $this->input->get('keyword');
        $province_id = $this->input->get('province_id');

        $data['keyword'] = $keyword;
        $data['province_id'] = $province_id;

        $config['base_url'] = base_url('Amphur_New/Index');
        $config['total_rows'] = $this->Amphur_model_New->count($keyword, $province_id);
        $config['per_page'] = 10;

        $this->pagination->initialize($config);

        $data['links'] = $this->pagination->create_links();

        $provinces = $this->Province_model->getAll(0, 100);
        $arr = array('--จังหวัด--');
        foreach ($provinces as $province) {
            $arr[$province->province_id] = $province->province_name;
        }
        $data['provinces'] = $arr;

        $start = $this->uri->segment(3) > 0 ? $this->uri->segment(3) : 0;
        $data['amphurs'] = $this->Amphur_model_New->getAll($start, $config['per_page'], $keyword, $province_id);
        $data["total_rows"] = $config['total_rows'];

        $data['content'] = "amphur_new/show";
        $this->load->view("layout/main", $data);
    }

    public function add()
    {
        $this->form_validation->set_rules("province_id", "จังหวัด", "greater_than[0]", array("greater_than" => "กรุณาเลือก%s"));
        $this->form_validation->set_rules('amphur_code', 'รหัสอำเภอ', 'required|is_unique[amphur.amphur_code]',
            array('required' => 'กรุณากรอก %s', 'is_unique' => '%s ถูกใช้งานไปแล้ว'));
        $this->form_validation->set_rules('amphur_name', 'ชื่ออำเภอ', 'required', array('required' => 'กรุณากรอก %s'));
        if ($this->form_validation->run() == false) {
            //$data['errors'] = validation_errors();

            $this->session->set_flashdata("flash_errors", validation_errors());

            $provinces = $this->Province_model->getAll(0, 100);
            $arr = array('--จังหวัด--');
            foreach ($provinces as $province) {
                $arr[$province->province_id] = $province->province_name;
            }
            $data['provinces'] = $arr;

            $data['method'] = "add";

            $data['content'] = 'amphur_new/form';
            $this->load->view('layout/main', $data);
        } else {
            // save
            $province_id = $this->input->post('province_id');
            $amphur_code = $this->input->post('amphur_code');
            $amphur_name = $this->input->post('amphur_name');

            $param['province_id'] = $province_id;
            $param['amphur_code'] = $amphur_code;
            $param['amphur_name'] = $amphur_name;

            $this->db->insert('amphur', $param);

            $this->session->set_flashdata('flash_success', 'ข้อมูลถูกบันทึกแล้ว');
            redirect(base_url('Amphur_New/add','refresh'));
        }

    }

    public function edit($amphur_id)
    {
        $this->form_validation->set_rules("province_id", "จังหวัด", "greater_than[0]", array("greater_than" => "กรุณาเลือก%s"));
        $this->form_validation->set_rules('amphur_code', 'รหัสอำเภอ', 'required',
            array('required' => 'กรุณากรอก %s'));
        $this->form_validation->set_rules('amphur_name', 'ชื่ออำเภอ', 'required', array('trim|required' => 'กรุณากรอก %s'));
        if ($this->form_validation->run() == false) {
            //$data['errors'] = validation_errors();

            $this->session->set_flashdata("flash_errors", validation_errors());

            $provinces = $this->Province_model->getAll(0, 100);
            $arr = array('--จังหวัด--');
            foreach ($provinces as $province) {
                $arr[$province->province_id] = $province->province_name;
            }
            $data['provinces'] = $arr;

            $data['amphur'] = $this->Amphur_model_New->getOne($amphur_id);
            $data['method'] = "edit";

            $data['content'] = 'amphur_new/form';
            $this->load->view('layout/main', $data);
        } else {
            // save
            $province_id = $this->input->post('province_id');
            $amphur_code = $this->input->post('amphur_code');
            $amphur_name = $this->input->post('amphur_name');

            $param['province_id'] = $province_id;
            $param['amphur_code'] = $amphur_code;
            $param['amphur_name'] = $amphur_name;

            $this->db->where('amphur_id', $amphur_id);
            $this->db->update('amphur', $param);

            $this->session->set_flashdata('flash_success', 'ข้อมูลถูกบันทึกแล้ว');
            redirect("Amphur_New/edit/$amphur_id");
        }
    }

    public function delete($amphur_id)
    {
        $this->db->where('amphur_id', $amphur_id);
        $this->db->delete('amphur');

        $this->session->set_flashdata('flash_success', 'ข้อมูลถูกลบไปแล้วไม่สามารถกู้คืนได้อีก');
        redirect("Amphur_New/index");
    }

}
