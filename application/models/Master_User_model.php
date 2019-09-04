<?php
	class Master_User_model extends CI_Model
	{
		
	  function add() {

	  	$error = false;
	  	$errmsg = "";

	  	$this->load->helper('date');
	  	$this->form_validation->set_rules('NIK', 'NIK', 'trim|required');
	  	$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
	  	$this->form_validation->set_rules('department', 'Department', 'trim|required');
	  	$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
	  	$this->form_validation->set_rules('status', 'Status', 'trim|required');



	  	

	  	$NIK = $this->input->post('NIK');	
  		//$tglmasuk = date('Y-m-d',strtotime($tglmasuk));	  		
		$nama = $this->input->post('nama');
		$department = $this->input->post('department');
		$jabatan = $this->input->post('jabatan');
		$status = $this->input->post('status');

		$query = $this->db->query("SELECT * FROM secure_user_register WHERE nik = '".$NIK."'");
		$jumlahdata = $query->num_rows();
	  	

		if($jumlahdata>0){
			$error = true;
			$errmsg .= "NIK Sudah Pernah Di Input";
		}

		if($this->form_validation->run() == FALSE) {
			$error = true;
			$errmsg .= validation_errors();	
		}		

	  	
	  	if($error) {
	  		echo "NO|".$errmsg;
	  	} else {
	  		$data = array(
				'nik' => $NIK,
				'nama' => $nama, 
				'password' => '', 
				'department' => $department, 
				'jabatan' => $jabatan,				
				'createtime' => '2018-01-01',
				'createuser' => 'testuser',
				'status' => $status
			);
				$result = $this->db->insert('secure_user_register', $data);	
				if($result){ echo "OK|Data Berhasil Di Input"; } else { echo "NO|Data Gagal Di Input"; }					
	  	}
			
	  	
		
			//$this->db->where('kodecbg', $kodecbg);
			//$this->db->update('cabang', $data);
			//echo "UPDATE";
		
	}




	function loadtable(){

	  $this->db->select('nik,nama,dept_name,jabatan_name,statusname');
      $this->db->from('secure_user_register');
      $this->db->join('master_department', 'secure_user_register.department = master_department.dept_id');
      $this->db->join('master_jabatan', 'secure_user_register.jabatan = master_jabatan.jabatan_id');
      $this->db->join('list_status', 'secure_user_register.status = list_status.id_status');
      $datatable = $this->db->get()->result();
      $datatable = '{"data":'.json_encode($datatable) .'}';
      echo $datatable;

	}


	function GetDepartment(){
	      $this->db->select('*');
	      $this->db->from('master_department');
	      $this->db->where('status','1');
	      $department = $this->db->get()->result_array();
	      return $department;
	  }


	function GetJabatan(){
	      $this->db->select('*');
	      $this->db->from('master_jabatan');
	      $this->db->where('status','1');
	      $jabatan = $this->db->get()->result_array();
	      return $jabatan;
	  } 



	
}


?>
