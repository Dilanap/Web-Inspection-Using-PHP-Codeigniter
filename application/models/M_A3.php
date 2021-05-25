<?php
	class M_A3 extends CI_Model
	{
		public function kode(){
			$q = $this->db->query("select MAX(RIGHT(Id_a3report,3)) as kode from a3_report");
		    $code = "";
		    if($q->num_rows()>0){
		        foreach($q->result() as $cd){
		            $tmp = ((int)$cd->kode)+1;
		            $code = sprintf("%03s", $tmp);
		        }
		    }else{
		        $code = "001";
		    }
		    return "A3R".$code;
		}
		
		public function PR_2($Id_rincian){
			$vans = array('Id_rincian' => $Id_rincian);
			return $this->db->get_where('tbl_rincian', $vans);
		}
		
		public function PR($Id_rincian){
			$akses = $this->session->userdata('Id_peg');
			$query = "select * from a3_report, pegawai, tbl_rincian where a3_report.Id_peg = pegawai.Id_peg and a3_report.Id_rincian = tbl_rincian.Id_rincian
			and pegawai.Id_peg = '".$akses."'";
			return $this->db->query($query);
		}
		function lihat_data(){
			return $this->db->get('a3_report');
		}
	
		function post($data){
			
			$this->db->insert('a3_report',$data);
		}
		function edit($data, $Id_a3report){
	
			$this->db->where('Id_a3report',$Id_a3report);
			$this->db->update('a3_report',$data);
		}
		function get_one($Id){
			$param	= array('Id_a3report'=>$Id);
			return $this->db->get_where('a3_report',$param); 
		}
		
		function update_rincian($data2, $Id_a3report){
			$this->db->where('Id_a3report',$Id_a3report);
			$this->db->update('a3_report',$data2);
		}
		
		function update_rincian2($data3, $Id_rincian){
			$this->db->where('Id_rincian',$Id_rincian);
			$this->db->update('tbl_rincian',$data3);
		}
		
		function delete($Id){
			$this->db->where('Id_a3report',$Id);
			$this->db->delete('a3_report');
		}
		function tampil_pr($Id){
			$query = "SELECT * FROM a3_report INNER JOIN tbl_rincian ON a3_report.Id_rincian=tbl_rincian.Id_rincian INNER JOIN tbl_detailcs ON tbl_rincian.Id_detailcs = tbl_detailcs.Id_detailcs INNER JOIN pegawai ON a3_report.Id_peg=pegawai.Id_peg;";
			return $this->db->query($query);
		}
	}
?>