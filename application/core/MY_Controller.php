<?php
/* start of php file */
class MY_Controller extends CI_Controller {
    public function __construct() {
       parent::__construct();
       
       //$this->load->model('Main_model');
	   //$data['menu'] = $this->Main_model->GetMenu();
	   //$this->load->vars($data);

	   $this->load->model('Main_model');
	   $list_status = $this->Main_model->GetStatus();

	   
    }

}
