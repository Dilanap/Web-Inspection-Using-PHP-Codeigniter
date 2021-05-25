<?php
/**
* 
*/
class M_pj extends CI_Model
{
	
	function kode(){
        $q = $this->db->query("select MAX(RIGHT(id_pj,3)) as code_max from tb_pj");
        $code = "";
        if($q->num_rows()>0){
            foreach($q->result() as $cd){
                $tmp = ((int)$cd->code_max)+1;
                $code = sprintf("%03s", $tmp);
            }
        }else{
            $code = "001";
        }
        return "PJ-".$code;
    }
	
	
	
	

	//menampilkan data
function tampilkan_data(){
	$query = "SELECT * FROM tb_pj, tb_pelanggan, tb_pengiriman WHERE tb_pengiriman.id_pengiriman= tb_pj.id_pengiriman and tb_pj.id_pelanggan = tb_pelanggan.id_pelanggan 
	AND tb_pj.status = 1";
		return $this->db->query($query);
   }

function tampilkan_detail(){
  	$query =  "SELECT * FROM tb_pj, tb_pelanggan WHERE tb_pj.id_pelanggan = tb_pelanggan.id_pelanggan ";
  	return $this->db->query($query);
  }

 function tampilkan_detail_id($id){
  	$query =  "SELECT * FROM tb_pj, tb_pelanggan WHERE tb_pengiriman.id_pelanggan = tb_pelanggan.id_pelanggan ";
  	return $this->db->query($query);
  }

  function simpan($data){
	    $this->db->insert('tb_pengiriman',$data);	
	}
	
	function selesai($id_pengiriman){
	    $data = array('id_pengiriman' => $id_pengiriman,'status' => '1');
		$this->db->where('status','0');
		$this->db->update('tb_pj',$data);
	}
  
function simpan_detail($data){
	   $this->db->insert('tb_pj',$data);
	}

	function edit($data, $id_pj){

		$this->db->where('id_pj',$id_pj);
		$this->db->update('tb_pj',$data);
	}
	
	//menghapus data bb masuk
	function hapuspengiriman($id_pengiriman,$id_pj){
		
		$this->db->where('id_pj',$id_pj);
		$this->db->delete('tb_pj');

		$this->db->where('id_pengiriman',$id_pengiriman);
		$this->db->delete('tb_pengiriman');
	}
	
	function delete($id){
		$this->db->where('id_pj',$id);
		$this->db->delete('tb_pj');
	}
}