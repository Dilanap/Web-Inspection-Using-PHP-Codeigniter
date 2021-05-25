<?php
class M_pp extends CI_Model


{
    function kode(){
        $q = $this->db->query("select MAX(RIGHT(id_pp,3)) as code_max from tb_pp");
        $code = "";
        if($q->num_rows()>0){
            foreach($q->result() as $cd){
                $tmp = ((int)$cd->code_max)+1;
                $code = sprintf("%03s", $tmp);
            }
        }else{
            $code = "001";
        }
        return "PP-".$code;
    }


//untuk menampilkan data 
  function tampilkan_data(){
		$query = "SELECT tb_do.id_do, tb_po.id_po, id_pl, tgl_persiapan, tgl_kirim FROM tb_do_detail2, tb_po_detail, tb_do, tb_po
		WHERE tb_do_detail2.id_do=tb_do.id_do AND tb_do.id_po=tb_po.id_po AND tb_po.id_po=tb_po_detail.id_po AND tb_do_detail2.status='Tervalidasi'
		AND tb_do_detail2.status_persiapan=''";
			return $this->db->query($query);
   }
  
   function tampilkan_po_detail(){
		$query = "SELECT * FROM tb_po, tb_barang , tb_pelanggan, tb_po_detail
		WHERE tb_po_detail.id_po=tb_po.id_po AND tb_po_detail.id_barang=tb_barang.id_barang 
		AND tb_po_detail.id_pelanggan=tb_pelanggan.id_pelanggan AND tb_po_detail.status='3'";
			return $this->db->query($query);
   }
  
  function tampilkan_detail(){
	  	$query =  "SELECT * FROM tb_bb, tb_pp_detail WHERE tb_bb.id_bb = tb_pp_detail.id_bb AND tb_pp_detail.status = 0";
	  	return $this->db->query($query);
  }

// //fungsi tombol detail
	 function detail ($id_pl){
		 $query = "SELECT *
		 FROM tb_po_detail, tb_barang, tb_po, tb_do, tb_pl2, tb_do_detail2
		 WHERE tb_po_detail.id_po = tb_po.id_po AND tb_barang.id_barang = tb_po_detail.id_barang 
		 AND tb_po.id_po = tb_do.id_po AND tb_do.id_do=tb_do_detail2.id_do AND tb_pl2.id_pl=tb_do_detail2.id_pl
		 AND tb_do_detail2.id_pl='".$id_pl."'";
	    	
			return $this->db->query($query);
	}
	
	function detail2 ($id_pl){
		 $query = "SELECT *
		 FROM tb_po_detail, tb_po, tb_pengguna, tb_do, tb_pl2, tb_do_detail2  
		 WHERE tb_po_detail.id_po = tb_po.id_po 
		 AND tb_pengguna.id_pengguna = tb_po.id_pengguna AND tb_po.id_po = tb_do.id_po AND tb_do.id_do=tb_do_detail2.id_do
		 AND tb_pl2.id_pl=tb_do_detail2.id_pl AND tb_do_detail2.id_pl='".$id_pl."'";
	    	return $this->db->query($query);
	}



	function selesai($id_pl){
	  $data 		= array('status_persiapan' => 'prepared');
			$this->db->where('id_pl', $id_pl);
			$this->db->update('tb_do_detail2',$data);
	}

	
}