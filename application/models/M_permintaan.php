<?php

class M_permintaan extends CI_Model
{
	public function kode(){
			$q = $this->db->query("select MAX(RIGHT(id_pl,3)) as kode from tb_pl");
		    $code = "";
		    if($q->num_rows()>0){
		        foreach($q->result() as $cd){
		            $tmp = ((int)$cd->kode)+1;
		            $code = sprintf("%03s", $tmp);
		        }
		    }else{
		        $code = "001";
		    }
		    return "PL".$code;
		}


	//fungsi untuk menampilkan detil permintaan di produksi dan inventory
	function tampilkan_detail(){
			$query = "SELECT * FROM td_do, tb_pl, tb_barang WHERE td_do.id_barang = tb_barang.id_barang AND td_do.id_pl = tb_pl.id_pl AND td_do.status = 0";
			return $this->db->query($query);
	}
	
	function Tampil_permintaan(){
			$query = "SELECT *, 
						case when td_do.status = '1' THEN 'Belum Diproses'
						when td_do.status = '2' THEN 'Sudah Diproses'
		                END as status
						FROM td_do, tb_barang, tb_pl WHERE td_do.id_pl = tb_pl.id_pl AND tb_barang.id_barang = td_do.id_barang AND td_do.status > 0

					" ;
			return $this->db->query($query);
	}

	//fungsi untuk form permintaan produksi	
	function simpan_permintaan_detail($data){
			$this->db->insert('td_barang',$data);
	}

	function simpan_permintaan($hasilkode){
			$tanggal=date('Y-m-d');		
    		$datainsert = array('tanggal' => $tanggal,
    							'id_pl' => $hasilkode);
 			$this->db->insert('tb_pl',$datainsert);
	}
	//fungsi ini masuk ke dalam tabel detail dibawah form input
	function tampilkan_permintaan(){
			$query = "SELECT * FROM td_do, tb_barang WHERE td_do.id_barang = tb_barang.id_barang AND td_do.status = 0";
			return $this->db->query($query);
    }

    //fungsi menampilkan permintaan yang belum di proses
	function permintaan_belumdiproses(){
			$query = "SELECT * FROM td_do, tb_barang WHERE td_do.id_barang = tb_barang.id_barang AND td_do.status = 1";
			return $this->db->query($query);
    }
	
//masuk kedalam textbox yang ke hidden
	function get_one($id_pl) {
        /*$param = array ('pbb_id'=>$pbbid);
        return $this->db->get_where('permintaan_detail',$param);*/
            $this->db->select('*');
            $this->db->from('td_do');
            $this->db->join('tb_barang', 'td_do.id_barang = tb_barang.id_barang');
            $this->db->where('td_do.id_pl', $id_pl);
            $query = $this->db->get();
            
            return $query;
        }

    function detail ($id_pl){
		 $query = "SELECT *
		 FROM td_do, tb_barang, tb_pl WHERE td_do.id_pl = tb_pl.id_pl AND tb_barang.id_barang = td_do.id_barang AND td_do.id_pl ='".$id_pl."'";
	    	return $this->db->query($query);
	}

	function selesai($hasilkode){
			$data 		= array('id_pl' => $hasilkode,
								 'status' => '1');
			$this->db->where('status','0');
			$this->db->update('td_do',$data);
	}

	function hapusitem($id){
		$this->db->where('id_pl_detail',$id);
		$this->db->delete('td_do');
	}
	function status($id_pl_detail){
		$data = array('status'=>'2');
		$this->db->where('id_pl_detail',$id_pl_detail);
		$this->db->update('td_do',$data);
	}

	function tampilkan_detail_id($id){
  	$query =  "SELECT * FROM td_do, tb_barang, tb_pl WHERE td_do.id_barang = tb_barang.id_barang AND td_do.id_pl_detail = '".$id."'";
  	return $this->db->query($query);
   }
    function hapuspermintaan($id){
        $this->db->where('id_pl_detail' ,$id);
        $this->db->delete('td_do');
    }
   
   function update($data,$id_pl_detail){
	    $this->db->where('id_pl_detail',$id_pl_detail);
	    $this->db->update('td_do',$data);
	} 
    
}