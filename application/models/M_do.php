
<?php
class M_do extends CI_Model


{
    function kode(){
        $q = $this->db->query("select MAX(RIGHT(id_do,3)) as code_max from tb_do");
        $code = "";
        if($q->num_rows()>0){
            foreach($q->result() as $cd){
                $tmp = ((int)$cd->code_max)+1;
                $code = sprintf("%03s", $tmp);
            }
        }else{
            $code = "001";
        }
        return "DO-".$code;
    }

	

   
   //untuk menampilkan data do yang akan dibuat pl
  function tampilkan_data_do(){
		$query = "
		SELECT * FROM 
		tb_po_detail, tb_do , tb_po 
		WHERE tb_po_detail.id_po = tb_po.id_po 
		AND 
		tb_do.id_po = tb_po.id_po AND tb_do.status='PL Belum dibuat'
		;
		";
		return $this->db->query($query);
   }
   
    function tampilkan_data_do_pl(){
		$query = "SELECT * FROM tb_po_detail, tb_do , tb_po WHERE tb_po_detail.id_po = tb_po.id_po AND tb_do.id_po = tb_po.id_po 
		AND tb_po_detail.status=3 AND tb_do.id_pl is not null";
			return $this->db->query($query);
   }
   
   
   
  //fungsi untuk menampilkan detil po 
	function tampilkan_detail(){
			$query = "SELECT * FROM tb_po_detail, tb_po, tb_bb WHERE tb_po_detail.id_barang = tb_barang.id_barang AND tb_po_detail.id_po = tb_po.id_po AND tb_po_detail.status = 0";
			return $this->db->query($query);
	}
   
 
// //fungsi tombol detail
	function detail ($id_po){
		  $query = "SELECT * FROM tb_po_detail, tb_po , tb_barang WHERE tb_po_detail.id_barang = tb_barang.id_barang AND tb_po.id_po = tb_po_detail.id_po AND tb_po.id_po = '".$id_po."'";	
				return $this->db->query($query);
	}

	function detail2($id_po){
		$query = "SELECT * FROM tb_po_detail, tb_po, tb_pengguna WHERE tb_po.id_pengguna = tb_pengguna.id_pengguna AND tb_po.id_po = tb_po_detail.id_po AND tb_po.id_po = '".$id_po."'";	
				return $this->db->query($query);
	}
	
	
	
	function get_data($id_pp_detail){
		$param	= array('id_pp_detail'=>$id_pp_detail);
		return $this->db->get_where('tb_po_detail',$param); 
	}


	function delete($id){
	    $this->db->where('id_do',$id);
		$this->db->delete('tb_do');
	}

	function simpan_detail($data){
	   $this->db->insert('tb_do',$data);
	}

	function simpan_do($data){
 			$this->db->insert('tb_do',$data);
	}
	
	function ubah_status_po ($id_po){
		$query = "update tb_po_detail, tb_po, tb_do set tb_po_detail.status=3 where tb_po_detail.id_po=tb_po.id_po AND tb_po.id_po=tb_do.id_po";
		return $this->db->query($query);
	}
	
	function selesai($hasilkode){
			$data 		= array('id_do' => $hasilkode,
								 'status' => '2');
			$this->db->where('status','0');
			$this->db->update('tb_do',$data);
	}

	

	function update($data, $id_do){
		$this->db->where('id_do',$id_do);
		$this->db->update('tb_do',$data);
	}
}
