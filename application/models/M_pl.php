
<?php
class M_pl extends CI_Model


{
    function kode(){
        $q = $this->db->query("select MAX(RIGHT(id_pl,3)) as code_max from tb_pl2");
        $code = "";
        if($q->num_rows()>0){
            foreach($q->result() as $cd){
                $tmp = ((int)$cd->code_max)+1;
                $code = sprintf("%03s", $tmp);
            }
        }else{
            $code = "001";
        }
        return "PL-".$code;
    }
	
	
	


//untuk menampilkan data 
  function tampilkan_data(){
	$query = "SELECT * FROM tb_pl2, tb_do, tb_do_detail2 WHERE tb_do_detail2.id_pl = tb_pl2.id_pl AND tb_do_detail2.id_do = tb_do.id_do";
		return $this->db->query($query);
   }
  function tampilkan_detail(){
  	$query =  "SELECT * FROM tb_pl2, tb_do WHERE tb_pl2.id_pl = tb_do.id_pl";
  	return $this->db->query($query);
  }

   function tampilkan_detail_id($id){
  	$query =  "SELECT * FROM tb_pl2, tb_do WHERE tb_pl2.id_pl = tb_do.id_pl AND tb_pl2.id_plmasuk_detail = '".$id."'";
  	return $this->db->query($query);
  }

    //fungsi tombol detail
	function detail ($id_po){
		  $query = "SELECT * FROM tb_po_detail, tb_po, tb_barang, tb_do
		  WHERE tb_po_detail.id_barang = tb_barang.id_barang AND tb_po.id_po = tb_po_detail.id_po AND tb_po.id_po=tb_do.id_po AND tb_po.id_po = '".$id_po."'";	
				return $this->db->query($query);
	}
	
	function detail2($id_po){
		$query = "SELECT * FROM tb_po_detail, tb_po, tb_pengguna WHERE tb_po.id_pengguna = tb_pengguna.id_pengguna AND tb_po.id_po = tb_po_detail.id_po AND tb_po.id_po = '".$id_po."'";	
				return $this->db->query($query);
	}
	
	//mencetak pl
	function cetak_pl($id_pl){
		$query = "SELECT * FROM tb_po_detail, tb_pengguna, tb_po, tb_barang, tb_do, tb_do_detail2, tb_pl2
		  WHERE tb_po.id_pengguna=tb_pengguna.id_pengguna AND tb_po_detail.id_barang = tb_barang.id_barang AND tb_po.id_po = tb_po_detail.id_po AND
		  tb_do.id_po =tb_po.id_po AND tb_do_detail2.id_do = tb_do.id_do AND tb_do_detail2.id_pl = tb_pl2.id_pl
		  AND tb_do_detail2.id_pl = '".$id_pl."'";	
		return $this->db->query($query);
			
	}
	
	 //fungsi tombol detail_pl
	function detail_pl ($id_pl){
		  $query = "SELECT * FROM tb_po_detail, tb_po, tb_barang, tb_do, tb_do_detail2, tb_pl2
		  WHERE tb_po_detail.id_barang = tb_barang.id_barang AND tb_po.id_po = tb_po_detail.id_po AND
		  tb_do.id_po =tb_po.id_po AND tb_do_detail2.id_do = tb_do.id_do AND tb_do_detail2.id_pl = tb_pl2.id_pl
		  AND tb_pl2.id_pl = '".$id_pl."'";	
				return $this->db->query($query);
	}
	
//menghapus data bb masuk
/*	function hapusbbmasuk($id_plmasuk,$id_plmasuk_detail){
		
		$this->db->where('id_plmasuk_detail',$id_plmasuk_detail);
		$this->db->delete('tb_pl2');

		$this->db->where('id_plmasuk',$id_plmasuk);
		$this->db->delete('tb_domasuk');
	}*/

	function delete($id_do){
	   	$query = "
		DELETE a.*, b.*, c.* FROM tb_po_detail a, tb_do b, tb_po c
		WHERE a.id_po = c.id_po AND b.id_po = c.id_po AND b.id_do = '".$id_do."'";
		
		
		return $this->db->query($query);
	}
	
	function ubah_status_pl($id){
			$data 		= array('status' => 'Validasi Tertolak');
			$this->db->where('id', $id);
			$this->db->update('tb_do_detail2',$data);
	}
	
	function update_do_tolak($id_do){
		$data 		= array('status' => 'Validasi Tertolak');
			$this->db->where('id_do', $id_do);
			$this->db->update('tb_do',$data);
	}

	function simpan_detail($data){
	   $this->db->insert('tb_pl2',$data);
	}

	function simpan($data){
	    $this->db->insert('tb_pl2',$data);	
	}
	
	function ubah_status($id){
			$data 		= array('status' => 'Tervalidasi');
			$this->db->where('id', $id);
			$this->db->update('tb_do_detail2',$data);
	}
	
	function update_do($id_do){
		$data 		= array('status' => 'Tervalidasi');
			$this->db->where('id_do', $id_do);
			$this->db->update('tb_do',$data);
	}

	function Tampil_pl_masuk(){
			$query = "SELECT *
						FROM tb_do_detail2, tb_do, tb_pl2, tb_po, tb_po_detail WHERE tb_do_detail2.id_do = tb_do.id_do 
						AND tb_pl2.id_pl = tb_do_detail2.id_pl AND tb_do.id_po=tb_po.id_po AND tb_po_detail.id_po=tb_po.id_po
						AND tb_do_detail2.status = 'PL Menunggu Validasi' 
						
					" ;
			//$query2 ="SELECT * FRO tb_po_detail where id_pegguna='$_SESSION[id_pengguna]'"
			return $this->db->query($query);
	}
	function status_pl(){
		$query = "select * from tb_do_detail2 where status='PL Menunggu Validasi'";
		return $this->db->query($query);
	}
	
	function selesai($id_pl){
	    $data = array('status' => 'PL Menunggu Validasi' );
		$this->db->where('status','PL Belum dibuat');
		$this->db->update('tb_do',$data);
	}
 
	function edit($data,$id_plmasuk_detail){
		$this->db->where('id_plmasuk_detail',$id_plmasuk_detail);
		$this->db->update('tb_pl2',$data);
	}


}