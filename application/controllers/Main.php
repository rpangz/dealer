<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller
{	
	function index(){
		$this->load->model('Main_model');
    	$data['menu'] = $this->Main_model->GetMenu()->result();    
    	$data['menulaporan'] = $this->Main_model->GetMenuLaporan()->result();   	
    	$data['saldobank'] = $this->Main_model->GetSaldoBank();
    	$data['saldoCOH'] = $this->Main_model->GetSaldoCOH();
		//$this->load->view('_partial/menu',$data);
		$this->load->view('main',$data);
	}

	function GetSaldoBankCoh(){
		$this->load->model('Main_model');
		$saldobank = $this->Main_model->GetSaldoBank();
    	$saldoCOH  = $this->Main_model->GetSaldoCOH();
    	echo $saldobank."|".$saldoCOH;
	}
	
}