<?php

class Master_Jabatan extends MY_Controller
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

    	$this->load->model('Master_Jabatan_model');
		
		$data['formheader'] = $this->Master_Jabatan_model->GetFormHeader();
	

		$this->load->view('master_jabatan_view',$data);
	}

	function simpan(){
		$this->load->model('Master_Jabatan_model');
		$this->Master_Jabatan_model->add();
	}

	function hapus(){
		$this->load->model('Master_Jabatan_model');
		$this->Master_Jabatan_model->hapus();
	}

	function editloaddata(){
		$this->load->model('Master_Jabatan_model');
		$this->Master_Jabatan_model->editloaddata();
	}

	function datatable(){
		$this->load->model('Master_Jabatan_model');
		$this->Master_Jabatan_model->loadtable();
	}


}