<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends MY_Controller
{	

	function index(){
		$this->form_validation->set_rules('nik', 'NIK', 'trim|required|numeric');
		$this->form_validation->set_rules('password', 'NIK', 'trim|required');

		if($this->form_validation->run() == FALSE) {
			$this->load->view('login.php');
		} else {
			$this->_ceklogin();
		}
		
	}

	private function _ceklogin(){
		$nik = $this->input->post('nik');
		$password = $this->input->post('password');		
	      
	    $this->db->select('*');
	    $this->db->from('secure_user_register');
	    $this->db->where('nik',$nik);
	    $this->db->where('status',1);
	    $user = $this->db->get()->row_array();	 

	    if($user) {
	    	$passstatus = password_verify($password, $user['password']);
	    	
	    	if($passstatus){

	    		$data = [
	    			'nik' => $user['nik'],
	    			'department' => $user['department'],
	    			'jabatan' => $user['jabatan']
	    		];

	    		$this->session->set_userdata($data);
	    		redirect('main');
	    	} else {
	    		$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">Password Salah!</div> ');
	    		redirect('login');
	    	}

	    } else {
	    	$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">NIK tidak terdaftar!</div> ');
	    	redirect('login');
	    }

	  
		
	}

	 public function logout(){
	 	$this->session->unset_userdata('nik');
	 	$this->session->unset_userdata('department');
	 	$this->session->unset_userdata('jabatan');

	 	$this->session->set_flashdata('message','<div class="alert alert-success" role="success">Anda Telah Log Out !</div> ');


	    redirect('login');

	 }
	
}