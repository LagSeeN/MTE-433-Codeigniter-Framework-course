<?php

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
    }

    public function index()
    {
        # code...
    }

    public function login()
    {
        $this->form_validation->set_rules("username", "Username", "required|alpha_numeric",
            array('required' => 'กรุณากรอก %s', 'alpha_numeric' => '%s allow alphabet and num only'));
        $this->form_validation->set_rules('pwd', 'Password', 'required', array('required' => 'กรุณากรอก %s'));

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata("flash_errors", validation_errors());
            $this->load->view("login.php");
        } else {

            $username = $this->input->post('username');
            $pwd = $this->input->post('pwd');

            if ($user = $this->Admin_model->checklogin($username, $pwd)) {
                // echo $this->db->last_query();
                // echo "Login OK 200";
                $session_data = array(
                    'ss_admin_id' => $user->admin_id,
                    'ss_admin_username ' => $user->username,
                    'ss_admin_fullname' => $user->fullname,
                    'ss_admin_dt' => date('d M Y H:i:s'),
                );
                $this->session->set_userdata($session_data);
                redirect('Home', 'refresh');

            } else {
                $this->session->set_flashdata("flash_errors", "Username or Password invalid");
                $this->load->view("login.php");
            }
        }

    }

    public function logout()
    {
        // $session_data = array(
        //     'ss_admin_id',
        //     'ss_admin_username ',
        //     'ss_admin_fullname',
        //     'ss_admin_dt',
        // );
        // $this->session->unset_userdata($session_data);
        $this->session->sess_destroy();

        redirect('Home', 'refresh');

    }

    public function changePassword()
    {
        $this->form_validation->set_rules('old_password', 'Old Password', 'required', array('required' => 'กรุณากรอก %s'));
        $this->form_validation->set_rules('new_password', 'New Password',
            'required|regex_match[/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/]',
            array('required' => 'กรุณากรอก %s',
                'regex_match' => '<ol>
                                    <li>At least one digit [0-9]</li>
                                    <li>At least one lowercase character [a-z]</li>
                                    <li>At least one uppercase character [A-Z]</li>
                                  </ol>'));
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]',
            array('required' => 'กรุณากรอก %s', 'matches' => 'กรุณากรอก Password ให้ตรงกัน'));

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata("flash_errors", validation_errors());
            $data['content'] = "user/changePassword";
            $this->load->view("layout/main", $data);
        } else {
            $admin_id = $this->session->userdata('ss_admin_id');
            $old_password = $this->input->post('old_password');
            $new_password = $this->input->post('new_password');

            $params['pwd'] = sha1($new_password);
            $this->db->where('admin_id', $admin_id);
            $this->db->update('admin', $params);
            redirect('Home', 'refresh');
        }
    }

    public function changeProfile()
    {
        $data['content'] = "user/changeProfile";
        $this->load->view("layout/main", $data);
    }
}
