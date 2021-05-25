<?php

class M_cpar extends CI_model {

	public function tampilkan_data()
	{
		return $this->db->get('tbl_rincian');
	}
	
	public function tampilkan_validasi()
	{
		$query = "select * from tbl_rincian, tbl_detailcs where tbl_rincian.Id_detailcs = tbl_detailcs.Id_detailcs AND tbl_detailcs.status = '2'";
		return $this->db->query($query);
	}
	
	public function cpar()
	{
		$query = "select * from tbl_rincian, tbl_detailcs where tbl_rincian.Id_detailcs = tbl_detailcs.Id_detailcs And tbl_rincian.tindakan = ''";
		return $this->db->query($query);
	}

	public function cpar1()
	{
		$query = "select * from tbl_rincian, tbl_detailcs where tbl_rincian.Id_detailcs = tbl_detailcs.Id_detailcs and tbl_rincian.status = 'Belum dibuat A3'";
		return $this->db->query($query);
	}
	
	public function simpan($data)
	{
		$this->db->insert('tbl_rincian', $data);
	}

	public function hapus($id)
	{
		$this->db->delete('tbl_rincian', ['Id_rincian' => $id]);
	}

	public function get_data($id)
	{
		$vans = array('Id_rincian' => $id);
		return $this->db->get_where('tbl_rincian', $vans);
	}
	
	function lihat_data()
	{
		return $this->db->get('tbl_rincian');
	}
	
	public function update_status($Id_detailcs)
	{
		 $data 		= array('status' => '3');
			$this->db->where('Id_detailcs', $Id_detailcs);
			$this->db->update('tbl_detailcs',$data);
	}
	
	public function update_tgl($Id_rincian)
	{
		 $data 		= array('tgl_verifikasi'=>date('Y-m-d'));
			$this->db->where('Id_rincian', $Id_rincian);
			$this->db->update('tbl_rincian',$data);
	}
	
	function edit($data, $Id_rincian)
	{
		$this->db->where('Id_rincian', $Id_rincian);
		$this->db->update('tbl_rincian', $data);
	}
	
	function detail ($Id_check){
		  $query = "SELECT * FROM tbl_detailcs, part where tbl_detailcs.Id_part = part.Id_part and tbl_detailcs.remark = 'NG'";	
				return $this->db->query($query);
	}
	function detailcpar ($Id_detailcs){
		$query = "SELECT * FROM tbl_detailcs, part, tbl_rincian where 
						tbl_detailcs.Id_part = part.Id_part
						and tbl_detailcs.Id_detailcs = tbl_rincian.Id_detailcs
						and tbl_detailcs.remark = 'NG' and tbl_detailcs.Id_detailcs = '".$Id_detailcs."'";	
			  return $this->db->query($query);
  }
	
}