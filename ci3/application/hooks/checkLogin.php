<?php
class checkLogin
{
    private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function check()
    {
        $classname = $this->CI->router->class;
        $methodname = $this->CI->router->method;
        if ($this->CI->session->userdata("ss_admin_id") == "" && $methodname != "login") {
            redirect("User/login");
        }
    }

}
