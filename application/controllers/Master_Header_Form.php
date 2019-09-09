<?php

class Master_Header_Form extends MY_Controller
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



    	$this->load->model('Master_Header_Form_model');
		$this->load->model('Main_model');
    	
    	$nama = $this->router->fetch_class();
    	$data['list_status'] = GetStatusList();
		$data['judul'] = GetJudul($nama);
		$data['formname'] = $nama;


		$this->load->view('master_header_form_view',$data);
	}

	function simpan(){
		$this->load->model('Master_Header_Form_model');
		$this->Master_Header_Form_model->add();
	}

	function hapus(){
		$this->load->model('Master_Header_Form_model');
		$this->Master_Header_Form_model->hapus();
	}

	function editloaddata(){
		$this->load->model('Master_Header_Form_model');
		$this->Master_Header_Form_model->editloaddata();
	}

	function datatable(){
		$this->load->model('Master_Header_Form_model');
		$this->Master_Header_Form_model->loadtable();
	}


}