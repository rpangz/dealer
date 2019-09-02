<?php
class Main_model extends CI_Model
{
  function GetMenu()
  {
      $this->db->select('*');
      $this->db->from('secure_form_akses');
      $this->db->where('department', 'ADMIN');
      $this->db->where('jabatan', 'ADMIN');
      $this->db->where('nama_header', 'TRANSAKSI');
      $menu = $this->db->get();
      return $menu;
  }

  function GetMenuLaporan()
  {
      $this->db->select('*');
      $this->db->from('secure_form_akses');
      $this->db->where('department', 'ADMIN');
      $this->db->where('jabatan', 'ADMIN');
      $this->db->where('nama_header', 'LAPORAN');
      $menu = $this->db->get();
      return $menu;
  }

  function GetSaldoBank(){
      $scr = "SELECT CASE WHEN SUM(debet)-SUM(credit) IS NULL THEN 0 ELSE FORMAT(SUM(debet)-SUM(credit),0) END saldo FROM (
      SELECT CASE WHEN jenistrx = 'DEBET' THEN nominal ELSE 0 END debet,
      CASE WHEN jenistrx = 'CREDIT' THEN nominal ELSE 0 END credit 
      FROM tr_pemasukan_bank) a";    
      $query = $this->db->query($scr);
      foreach ($query->result() as $row)
      {
              $saldobank = $row->saldo;
      }

      return $saldobank;
  }

  function GetSaldoCOH(){
      $scr = "SELECT CASE WHEN SUM(debet)-SUM(credit) IS NULL THEN 0 ELSE FORMAT(SUM(debet)-SUM(credit),0) END saldo FROM (
      SELECT CASE WHEN jenistrx = 'DEBET' THEN nominal ELSE 0 END debet,
      CASE WHEN jenistrx = 'CREDIT' THEN nominal ELSE 0 END credit 
      FROM tr_petty_cash) a";    
      $query = $this->db->query($scr);
      foreach ($query->result() as $row)
      {
              $saldocoh = $row->saldo;
      }

      return $saldocoh;
  }
  
}


?>
