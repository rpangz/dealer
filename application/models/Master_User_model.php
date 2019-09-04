<?php
	class Master_User_model extends CI_Model
	{
		
	  function add() {
	  	$this->load->helper('date');
	  	$this->form_validation->set_rules('rekening', 'Rekening', 'trim|required');
	  	$this->form_validation->set_rules('jenistransaksi', 'Jenis Transaksi', 'trim|required');
	  	$this->form_validation->set_rules('nominal', 'Nominal', 'trim|required');
	  	$this->form_validation->set_rules('noref', 'Noref', 'trim|required');
	  	$this->form_validation->set_rules('tglmasuk', 'Tgl Masuk', 'trim|required');

	  	$tglmasuk = $this->input->post('tglmasuk');	
  		$tglmasuk = date('Y-m-d',strtotime($tglmasuk));	  		
		$rekening = $this->input->post('rekening');
		$jenistransaksi = $this->input->post('jenistransaksi');
		$nominal = $this->input->post('nominal');
		$keterangan = $this->input->post('keterangan');
		$noref = $this->input->post('noref');

	  	$scr = "SELECT SUM(debet)-SUM(credit) saldo FROM (
				SELECT CASE WHEN jenistrx = 'DEBET' THEN nominal ELSE 0 END debet,
				CASE WHEN jenistrx = 'CREDIT' THEN nominal ELSE 0 END credit 
				FROM tr_pemasukan_bank WHERE rekening = '".$rekening."' AND tglmasuk<='".$tglmasuk."') a";		
				$query = $this->db->query($scr);
				foreach ($query->result() as $row)
				{
				        $saldobank = $row->saldo;
				}

		if($saldobank<$nominal && $jenistransaksi=="CREDIT") {
			$errmsg = "NO|NOMINAL ADJUSTMEN KURANG DARI SALDO";
	  		echo $errmsg;
	  		exit;	
		}


	  	if ($this->form_validation->run() == FALSE) {
	  			$errmsg = validation_errors();
	  			echo $errmsg;
	  	} else {
	  		
			if($noref=="-") {
				$scr = "SELECT CASE WHEN ref IS NULL THEN 
		  			CONCAT('BK/',year(now()),'/00000000') 
		  		ELSE 
		  			CONCAT('BK/',year(now()),'/',ref) END ref FROM (
				SELECT LPAD(MAX(REPLACE(REPLACE(noref,'BK/',''),CONCAT(year(now()),'/'),''))+1,8,0) ref FROM tr_pemasukan_bank) a";		
				$query = $this->db->query($scr);
				foreach ($query->result() as $row)
				{
				        $noref = $row->ref;
				}	
			}

			$data = array(
				'noref' => $noref,
				'tglmasuk' => $tglmasuk, 
				'rekening' => $rekening, 
				'jenistrx' => $jenistransaksi, 
				'nominal' => $nominal,
				'keterangan' => $keterangan,
				'createtime' => '2018-01-01',
				'createuser' => 'testuser',
				'status' => '+'
			);
				$this->db->insert('tr_pemasukan_bank', $data);	
				echo "Berhasil";
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
