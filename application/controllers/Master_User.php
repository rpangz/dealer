<?php

class Master_User extends MY_Controller
{

	/*
	public $list_status = $this->Main_model->GetStatus();
	public $nama = $this->router->fetch_class();
	public $judul = $this->Main_model->GetJudul($nama);
	*/

	public function __construct()
	{
		parent::__construct();
		
		/*
		$this->load->model('Main_model');	    
	    $list_status = $this->Main_model->GetStatus();
	    $nama = $this->router->fetch_class();
	    $judul = $this->Main_model->GetJudul($nama);
		*/
	}


	public function index(){



    	$this->load->model('Master_User_model');
		$this->load->model('Main_model');
    	
    	$nama = $this->router->fetch_class();

    	$data['list_status'] = $this->Main_model->GetStatus();
		$data['judul'] = $this->Main_model->GetJudul($nama);
		$data['formname'] = $nama;
		$data['department'] = $this->Master_User_model->GetDepartment();
		$data['jabatan'] = $this->Master_User_model->GetJabatan();

		$this->load->view('master_user_view',$data);
	}

	function simpan(){
		$this->load->model('Master_User_model');
		$this->Master_User_model->add();
	}

	function datatable(){
		$this->load->model('Master_User_model');
		$this->Master_User_model->loadtable();
	}


}