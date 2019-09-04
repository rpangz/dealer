<?php

class Master_User extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		
	}


	public function index(){
		/*
		
		$this->load->model('Transaksi_bank_model');		
		$this->load->model('Transaksi_bank_model');
		$data['rekening'] = $this->Transaksi_bank_model->GetRekening()->result();
		$this->load->model('Main_model');
    	$data['menu'] = $this->Main_model->GetMenu()->result();
    	$data['menulaporan'] = $this->Main_model->GetMenuLaporan()->result();
    	$data['saldobank'] = $this->Main_model->GetSaldoBank();
    	$data['saldoCOH'] = $this->Main_model->GetSaldoCOH();
		
		*/

    	$this->load->model('Master_User_model');
		$this->load->model('Main_model');
    	$nama = $this->router->fetch_class();
		$data['judul'] = $this->Main_model->GetJudul($nama);
		$data['formname'] = $nama;
		$data['department'] = $this->Master_User_model->GetDepartment();
		$data['jabatan'] = $this->Master_User_model->GetJabatan();

		$this->load->view('master_user_view',$data);
	}

	function simpan(){
		$this->load->model('Transaksi_bank_model');
		$this->Transaksi_bank_model->add();
	}

	function datatable(){
		$this->load->model('Master_User_model');
		$this->Master_User_model->loadtable();
	}


}