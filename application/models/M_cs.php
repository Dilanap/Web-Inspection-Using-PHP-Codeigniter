<?php

class M_cs extends CI_Model
{
	public function kode(){
			$q = $this->db->query("select MAX(RIGHT(Id_check,3)) as kode from tbl_cs");
		    $code = "";
		    if($q->num_rows()>0){
		        foreach($q->result() as $cd){
		            $tmp = ((int)$cd->kode)+1;
		            $code = sprintf("%03s", $tmp);
		        }
		    }else{
		        $code = "001";
		    }
		    return "CS".$code;
		}
 //fungsi menampilkan permintaan yang belum di proses
	function permintaan_belumdiproses(){
			$query = "SELECT * FROM tb_po_detail, tb_barang WHERE tb_po_detail.id_barang = tb_barang.id_barang AND tb_po_detail.status = 1";
			return $this->db->query($query);
    }
	
	

	
	
	//fungsi untuk menampilkan detil po 
	function tampilkan_detail(){
			$query = "SELECT * FROM tb_po_detail, tb_po, tb_barang WHERE tb_po_detail.id_barang = tb_barang.id_barang AND tb_po_detail.id_po = tb_po.id_po AND tb_po_detail.status = 0";
			return $this->db->query($query);
	}

function Tampil_po_receipt(){
			$query = "SELECT * FROM tb_po_detail, tb_barang, 
			tb_po WHERE tb_po_detail.id_po = tb_po.id_po 
			AND tb_barang.id_barang = tb_po_detail.id_barang AND tb_po_detail.status = 2

					" ;
			//$query2 ="SELECT * FROM tb_po_detail where id_pegguna='$_SESSION[id_pengguna]'"
			return $this->db->query($query);
	}

	
	function Tampil_cs_ok(){
			$query = "SELECT *
						FROM tbl_detailcs, part, jadwal, tbl_cs WHERE tbl_detailcs.Id_part = part.Id_part 
						AND tbl_detailcs.Id_jadwal = jadwal.Id_jadwal AND tbl_detailcs.Id_check = tbl_cs.Id_check
						AND tbl_cs.Id_peg='".$this->session->userdata('Id_peg')."' AND
						tbl_detailcs.remark = 'OK'
						

					" ;
			
			return $this->db->query($query);
		
	}
	
	function Tampil_cs(){
			$query = "SELECT *, 
						case when tbl_detailcs.status = '1' THEN 'Belum Diproses'
						when tbl_detailcs.status = '2' THEN 'Sedang Diproses'
						when tbl_detailcs.status = '3' THEN 'Diproses'
						when tbl_detailcs.status = '4' THEN 'Selesai'
		                END as status
						FROM tbl_detailcs, part, jadwal, tbl_cs WHERE tbl_detailcs.Id_part = part.Id_part 
						AND tbl_detailcs.Id_jadwal = jadwal.Id_jadwal AND tbl_detailcs.Id_check = tbl_cs.Id_check AND tbl_detailcs.status = 1 
						AND tbl_cs.Id_peg='".$this->session->userdata('Id_peg')."' AND
						tbl_detailcs.remark = 'NG'
						

					" ;
			
			return $this->db->query($query);
		
	}
	
	function Tampil_cpar(){
			$query = "SELECT *, 
						case when tbl_detailcs.status = '1' THEN 'Belum Diproses'
						when tbl_detailcs.status = '2' THEN 'Sedang Diproses'
						when tbl_detailcs.status = '3' THEN 'Tervalidasi'
						when tbl_detailcs.status = '4' THEN 'Diproses'
						when tbl_detailcs.status = '5' THEN 'Selesai'
		                END as status
						FROM tbl_detailcs, part, jadwal, tbl_cs WHERE tbl_detailcs.Id_part = part.Id_part 
						AND tbl_detailcs.Id_jadwal = jadwal.Id_jadwal AND tbl_detailcs.Id_check = tbl_cs.Id_check AND tbl_detailcs.status > 0
						AND tbl_cs.Id_peg='".$this->session->userdata('Id_peg')."' AND
						tbl_detailcs.remark = 'NG' 
						

					" ;
			
			return $this->db->query($query);
		
	}
	function hitung_rejeck(){
		 $this->db->select('*, count(tbl_detailcs.Id_part) as total, sum(part.jumlah) as total_ng'); 
		  $this->db->where('remark','NG');
		 $this->db->join('part','tbl_detailcs.Id_part = part.Id_part');
		 $this->db->group_by('nama_part');
		 $query = $this->db->get('tbl_detailcs');
		 if($query->num_rows()>0)
		 {
		 return $query->result();
		 }
		
				
	}
	
	public function hitungJumlahNG()
		{
		   $this->db->select_sum('jumlah');
		   $this->db->where('remark', 'NG');
		   $query = $this->db->get('tbl_detailcs');
		   if($query->num_rows()>0)
		   {
			 return $query->row()->jumlah;
		   }
		   else
		   {
			 return 0;
		   }
		}
	
	//untuk mengetahui jumlah rejeck
	function Tampil_rejeck(){
		//return $this->db->get('tbl_detailcs');
		$query = "SELECT Id_part, remark, jumlah, 
				SUM( IF( remark = 'OK', jumlah, Null ) ) AS GOOD, 
				SUM( IF( remark = 'NG', jumlah, NULL ) ) AS NOTGOOD, COUNT(*) AS FINAL FROM part GROUP BY Id_part";
		return $this->db->query($query);
	}
	
	function update_po($id_po){
		 $data 		= array('status' => '5');
			$this->db->where('id_po', $id_po);
			$this->db->update('tb_po_detail',$data);
	}
	
	
	function Tampil_po_masuk(){
			$query = "SELECT *, 
						case when tb_po_detail.status = '1' THEN 'Belum Diproses'
						when tb_po_detail.status = '2' THEN 'Sudah Diproses'
		                END as status
						FROM tb_po_detail, tb_barang, tb_po WHERE tb_po_detail.id_po = tb_po.id_po 
						AND tb_barang.id_barang = tb_po_detail.id_barang AND tb_po_detail.status = 1

					" ;
			//$query2 ="SELECT * FROM tb_po_detail where id_pegguna='$_SESSION[id_pengguna]'"
			return $this->db->query($query);
	}

	
	//fungsi untuk form po
	 

	function simpan_cs($hasilkode){
			$tgl_check=date('Y-m-d');
			$Id_peg=$this->input->post('Id_peg');
    		$datainsert = array('tgl_check' => $tgl_check,
    							'Id_check' => $hasilkode,
								'Id_peg'=> $Id_peg);
 			$this->db->insert('tbl_cs',$datainsert);
	}
	//fungsi ini masuk ke dalam tabel detail dibawah form input
	function tampilkan_cs(){
			$query = "SELECT * FROM tbl_detailcs, part, jadwal WHERE tbl_detailcs.Id_part = part.Id_part AND tbl_detailcs.Id_jadwal = jadwal.Id_jadwal AND tbl_detailcs.status = 0";
			return $this->db->query($query);
    }

    //fungsi menampilkan po yang belum di proses
	function po_belumdiproses(){
			$query = "SELECT * FROM tb_po_detail, tb_barang WHERE tb_po_detail.id_barang = tb_barang.id_barang AND tb_po_detail.status = 1";
			return $this->db->query($query);
    }
	
//masuk kedalam textbox yang ke hidden
	function get_one($id_po) {
        /*$param = array ('pbb_id'=>$pbbid);
        return $this->db->get_where('po_detail',$param);*/
            $this->db->select('*');
            $this->db->from('tb_po_detail');
            $this->db->join('tb_barang', 'tb_po_detail.id_barang = tb_barang.id_barang');
            $this->db->where('tb_po_detail.id_po_detail', $id_po);
            $query = $this->db->get();
            
            return $query;
        }

    function detail ($id_po){
		 $query = "SELECT *
		 FROM tb_po_detail, tb_barang, tb_po, tb_do 
		 WHERE tb_po_detail.id_po = tb_po.id_po AND tb_barang.id_barang = tb_po_detail.id_barang 
		 AND tb_po.id_po = tb_do.id_po AND tb_po_detail.id_po ='".$id_po."'";
	    	
			return $this->db->query($query);
	}
	
	function detail2 ($id_po){
		 $query = "SELECT *
		 FROM tb_po_detail, tb_po, tb_pengguna, tb_barang WHERE tb_po_detail.id_po = tb_po.id_po 
		 AND tb_pengguna.id_pengguna = tb_po.id_pengguna AND tb_po_detail.id_barang = tb_barang.id_barang AND tb_po_detail.id_po ='".$id_po."'";
	    	return $this->db->query($query);
	}
	
	
	
	function selesai($hasilkode){
			$data 		= array('Id_check' => $hasilkode,
								 'status' => '1');
			$this->db->where('status','0');
			$this->db->update('tbl_detailcs',$data);
	}

	function hapusitem($id){
		$this->db->where('Id_detailcs',$id);
		$this->db->delete('tbl_detailcs');
	}
	function status($id_po_detail){
		$data = array('status'=>'2');
		$this->db->where('id_po_detail',$id_po_detail);
		$this->db->update('tb_po_detail',$data);
	}

	function tampilkan_detail_id($id){
  	$query =  "SELECT * FROM tbl_detailcs, part, tbl_cs WHERE tbl_detailcs.Id_part = part.Id_part 
	AND tbl_detailcs.Id_detailcs = '".$id."'";
  	return $this->db->query($query);
   }
   
    //menghapus data ditabel po
	function hapuscs(){
	  $Id_detailcs = $this->uri->segment(3);
		$Id_check = $this->uri->segment(4);
			$this->M_cs->hapuscs($Id_detailcs, $Id_check);
	  redirect('cs/lihat_data');
	}
	function inspeksi($id){
		$query = $this->db->get_where('part', array('check' => $id));
		return $query;
	}
	function get_inspeksi(){
		$query = $this->db->get('tb_inspeksi');
		return $query;	
	}
	
	function simpan_cs_detail($data){
	   $this->db->insert('tbl_detailcs',$data);
	}
	
   function edit($data, $id_po_detail){

		$this->db->where('id_po_detail',$id_po_detail);
		$this->db->update('tb_po_detail',$data);
	}
   
   function update($data,$id_po_detail){
	    $this->db->where('id_po_detail',$id_po_detail);
	    $this->db->update('tb_po_detail',$data);
	} 
    
}