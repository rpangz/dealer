<?php

class Transaksi_bank extends CI_Controller
{

	public function index(){
		$nama = $this->router->fetch_class();
		$this->load->model('Transaksi_bank_model');
		$data['judul'] = $this->Transaksi_bank_model->GetJudul($nama);
		$this->load->model('Transaksi_bank_model');
		$data['rekening'] = $this->Transaksi_bank_model->GetRekening()->result();
		$this->load->model('Main_model');
    	$data['menu'] = $this->Main_model->GetMenu()->result();
    	$data['menulaporan'] = $this->Main_model->GetMenuLaporan()->result();
    	$data['saldobank'] = $this->Main_model->GetSaldoBank();
    	$data['saldoCOH'] = $this->Main_model->GetSaldoCOH();
		$this->load->view('transaksi_bank',$data);
	}

	function simpan(){
		$this->load->model('Transaksi_bank_model');
		$this->Transaksi_bank_model->add();
	}

	function datatable(){
		$this->load->model('Transaksi_bank_model');
		$this->Transaksi_bank_model->loadtable();
	}


}