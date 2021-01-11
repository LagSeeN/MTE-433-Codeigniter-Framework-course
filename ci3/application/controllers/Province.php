<?php

class Province extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->load->model("Province_model");
    }

    public function index()
    {

        $keyword = $this->input->get('keyword');
        $data['keyword'] = $keyword;
        // $data["provinces"] = $this->Province_model->getAll($keyword);

        // Pageination
        $config['base_url'] = base_url('Province/Index');
        $config['total_rows'] = $this->Province_model->count($keyword);
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

        $data['links'] = $this->pagination->create_links();

        $start = $this->uri->segment(3) > 0 ? $this->uri->segment(3) : 0;
        $data['provinces'] = $this->Province_model->getAll($start, $config['per_page'], $keyword);
        $data["total_rows"] = $config['total_rows'];

        // echo $this->db->last_query();
        // exit();

        $data['content'] = "province/show";

        $this->load->view("layout/main", $data);

    }

    public function addForm()
    {
        $data['method'] = '';
        $data['province'] = '';
        $data['content'] = "province/form";
        $this->load->view('layout/main', $data);
    }

    public function addSave()
    {
        $province_code = $this->input->post('province_code');
        $province_name = $this->input->post('province_name');

        $arr = array();
        $arr['province_code'] = $province_code;
        $arr['province_name'] = $province_name;

        $this->db->insert('province', $arr);

        redirect("Province/index");
    }

    public function editForm($province_id)
    {
        $data['method'] = 'edit';
        $data['province'] = $this->Province_model->getOne($province_id);
        $data['province_id'] = $province_id;
        $data['content'] = "province/form";
        $this->load->view('layout/main', $data);
    }

    public function editSave($province_id)
    {
        $province_code = $this->input->post('province_code');
        $province_name = $this->input->post('province_name');

        $arr = array();
        $arr['province_code'] = $province_code;
        $arr['province_name'] = $province_name;

        $this->db->where('province_id', $province_id);
        $this->db->update('province', $arr);

        redirect("Province/index");
    }

    public function delete($province_id)
    {
        $this->db->where('province_id', $province_id);
        $this->db->delete('province');

        redirect("Province/index");
    }
}
