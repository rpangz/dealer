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

		cek_login();
		//if(!$this->session->userdata('nik')) header("location: ".base_url('login'));
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

    	$data['list_status'] = GetStatusList();
		$data['judul'] = GetJudul($nama);
		$data['formname'] = $nama;
		$data['department'] = $this->Master_User_model->GetDepartment();
		$data['jabatan'] = $this->Master_User_model->GetJabatan();

		$this->load->view('master_user_view',$data);
	}

	function simpan(){
		$this->load->model('Master_User_model');
		$this->Master_User_model->add();
	}

	function hapus(){
		$this->load->model('Master_User_model');
		$this->Master_User_model->hapus();
	}

	function resetpassword(){
		$this->load->model('Master_User_model');
		$this->Master_User_model->resetpassword();
	}

	function editloaddata(){
		$this->load->model('Master_User_model');
		$this->Master_User_model->editloaddata();
	}

	function datatable(){
		$this->load->model('Master_User_model');
		$this->Master_User_model->loadtable();
	}


}