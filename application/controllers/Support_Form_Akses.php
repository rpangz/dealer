<?php

class Support_Form_Akses extends MY_Controller
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
		/*
		$this->load->model('Main_model');	    
	    $list_status = $this->Main_model->GetStatus();
	    $nama = $this->router->fetch_class();
	    $judul = $this->Main_model->GetJudul($nama);
		*/
	}


	public function index(){

		//Jangan di ubah==================================================
		$this->load->model('Main_model');
    	$nama = $this->router->fetch_class();
    	$data['list_status'] = GetStatusList();
		$data['judul'] = GetJudul($nama);
		$data['formname'] = $nama;
		//================================================================

    	$this->load->model('Support_Form_Akses_model');		
		$data['menu'] = $this->Support_Form_Akses_model->GetMenu();	
		$data['department'] = $this->Support_Form_Akses_model->GetDepartment();
		$data['jabatan'] = $this->Support_Form_Akses_model->GetJabatan();
		$this->load->view('support_form_akses_view',$data);
	}

	function simpan(){
		$this->load->model('Support_Form_Akses_model');
		$this->Support_Form_Akses_model->add();
	}

	function hapus(){
		$this->load->model('Support_Form_Akses_model');
		$this->Support_Form_Akses_model->hapus();
	}

	function editloaddata(){
		$this->load->model('Support_Form_Akses_model');
		$this->Support_Form_Akses_model->editloaddata();
	}

	function datatable(){
		$this->load->model('Support_Form_Akses_model');
		$this->Support_Form_Akses_model->loadtable();
	}


}