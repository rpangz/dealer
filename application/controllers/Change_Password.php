<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_Password extends MY_Controller
{	

	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('nik')) header("location: ".base_url('login'));
		
	}

	function index(){

		/*		
    	$data['menu'] = $this->Main_model->GetMenu()->result();    
    	$data['menulaporan'] = $this->Main_model->GetMenuLaporan()->result();   	
    	$data['saldobank'] = $this->Main_model->GetSaldoBank();
    	$data['saldoCOH'] = $this->Main_model->GetSaldoCOH();
		//$this->load->view('_partial/menu',$data);
		$data['menu'] = $this->Main_model->GetMenu();   
		*/		 
		
		$this->load->view('change_password_view');
	}

	function update_password(){
		$error =false;

		$this->load->helper('date');
		$this->form_validation->set_rules('oldpass', 'Old Password', 'trim|required');
		$this->form_validation->set_rules('newpass', 'New Password', 'trim|required');
		$this->form_validation->set_rules('confpass', 'Re-type New Password', 'required|matches[newpass]');
	

		$oldpass  = $this->input->post('oldpass');
		$newpass  = $this->input->post('newpass');
		$passconf = $this->input->post('passconf');
		$nik      = $this->session->userdata('nik');

		
		



		if($this->form_validation->run() == false ) {
			$error  = true;
			$errmsg = "";
			$errmsg .= validation_errors();	
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">'.$errmsg.'</div> ');
			redirect('Change_Password');
		} 

		$statusoldpass = $this->cek_exist_data($nik,$oldpass);
		if(!$statusoldpass){
			$error  = true;
			$errmsg = "Wrong Old Password!";
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">'.$errmsg.'</div> ');
			redirect('Change_Password');
		}

	

		if(!$error) {
			$newpassdecrypt =  password_hash($newpass, PASSWORD_DEFAULT);	
			$data = array(					
				'password' => $newpassdecrypt 
			);
			$this->db->set('createtime', 'NOW()', FALSE);
			$result = $this->db->where('nik', $nik)
						   	   ->update('secure_user_register', $data);

		    $this->session->unset_userdata('nik');
		 	$this->session->unset_userdata('department');
		 	$this->session->unset_userdata('jabatan');

		 	$this->session->set_flashdata('message','<div class="alert alert-success" role="success">Ubah Password Berhasil, Harap Login Kembali</div> ');


		    redirect('login');					   	   
		}

	}

	private function cek_exist_data($nik,$oldpass){
		$this->db->select('*');
	    $this->db->from('secure_user_register');
	    $this->db->where('nik',$nik);
	    $user = $this->db->get()->row_array();
	    if($user){	    	
	    	$passstatus = password_verify($oldpass, $user['password']);
	    	if($passstatus) {
	    		return true;
	    	} else {
	    		return false;
	    	}
	    } else {
	    	return false;
	    }
	}


	
}