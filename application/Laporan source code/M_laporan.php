<?php

class M_laporan extends CI_Model
{

	//fungsi ini untuk menampilkan laporan
	

	function laporan_pemeriksaan($bulan,$tahun){
			$query = "SELECT * FROM tbl_cs, tbl_detailcs, part, jadwal WHERE tbl_detailcs.Id_check = tbl_cs.Id_check AND tbl_detailcs.Id_part = part.Id_part AND tbl_detailcs.Id_jadwal = jadwal.Id_jadwal 
			AND MONTH(tbl_cs.tgl_check) = '".$bulan."' AND YEAR(tbl_cs.tgl_check) ='".$tahun."'";
			return $this->db->query($query);
	}
	
	function view_by_date($date){
		$this->db->where('date(tgl_check)', $date);
		return $this->db->get('tbl_cs')->result();
	}
	
	public function view_by_month($month, $year){
        $this->db->where('MONTH(tgl_check)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tgl_check)', $year); // Tambahkan where tahun
        
    return $this->db->get('tbl_cs')->result(); // Tampilkan data tb_pengiriman sesuai bulan dan tahun yang diinput oleh user pada filter
  }
    
  public function view_by_year($year){
        $this->db->where('YEAR(tgl_check)', $year); // Tambahkan where tahun
        
    return $this->db->get('tbl_cs')->result(); // Tampilkan data tb_pengiriman sesuai tahun yang diinput oleh user pada filter
  }
    
  public function view_all(){
    return $this->db->get('tbl_cs')->result(); // Tampilkan semua data tb_pengiriman
  }
    
    public function option_tahun(){
        $this->db->select('YEAR(tgl_check) AS tahun'); // Ambil Tahun dari field tgl_pengiriman
        $this->db->from('tbl_cs'); // select ke tabel tb_pengiriman
        $this->db->order_by('YEAR(tgl_check)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tgl_check)'); // Group berdasarkan tahun pada field tgl_pengiriman
        
        return $this->db->get()->result(); // Ambil data pada tabel tb_pengiriman sesuai kondisi diatas
    }
	
 
}