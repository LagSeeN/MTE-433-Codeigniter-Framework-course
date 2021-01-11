<?php
    class Calculator extends CI_Controller {

        public function index()
        {
            echo "Index function in Calculator";
        }

        public function plus($a = 0,$b = 0)
        {
            // echo "<h1>$a + $b = ".($a+$b)."</h1>";
            $data = array('a'=>$a, 'b'=>$b);
            $this->load->view("plus", $data);
        }

        public function getProvince()
        {
            //Do query from province table
            $this->load->model("Province_model");
            $provinces = $this->Province_model->getAll();

            // Show SQL Query
            // echo $this->db->last_query();
            // exit();

            //Prepare data for view
            $data["provinces"] = $provinces;

            // print_r($province);

            $this->load->view("showProvince", $data);
        }

    }
?>