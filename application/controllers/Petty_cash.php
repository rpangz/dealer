<?php

class Petty_Cash extends CI_Controller
{

	public function index(){
		$nama = $this->router->fetch_class();
		$this->load->model('Petty_cash_model');
		$namearr = explode("|",$this->Petty_cash_model->GetJudul($nama));
		$data['judul'] = $namearr[0];
		$data['formname'] = $namearr[1];
		$this->load->model('Petty_cash_model');
		$data['rekening'] = $this->Petty_cash_model->GetRekening();
		$this->load->model('Main_model');
		$data['jenismakanan'] = $this->Petty_cash_model->GetJenisMakanan();
		$this->load->model('Main_model');
		$data['supplier'] = $this->Petty_cash_model->GetSupplier();
		$this->load->model('Main_model');
    	$data['menu'] = $this->Main_model->GetMenu()->result();
    	$data['menulaporan'] = $this->Main_model->GetMenuLaporan()->result();
    	$data['saldobank'] = $this->Main_model->GetSaldoBank();
    	$data['saldoCOH'] = $this->Main_model->GetSaldoCOH();
		$this->load->view('petty_cash',$data);
	}

	function simpan(){
		$this->load->model('Petty_cash_model');
		$this->Petty_cash_model->add();
	}

	function datatable(){
		$this->load->model('Petty_cash_model');
		$this->Petty_cash_model->loadtable();
	}


}