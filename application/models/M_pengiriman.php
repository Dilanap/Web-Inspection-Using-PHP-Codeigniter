<?php
class M_pengiriman extends CI_Model


{
    function kode(){
        $q = $this->db->query("select MAX(RIGHT(id_pengiriman,3)) as code_max from tb_pengiriman");
        $code = "";
        if($q->num_rows()>0){
            foreach($q->result() as $cd){
                $tmp = ((int)$cd->code_max)+1;
                $code = sprintf("%03s", $tmp);
            }
        }else{
            $code = "001";
        }
        return "PGM-".$code;
    }

	//untuk menampilkan data chained 
	function get_data_barang_bykode($id_pengguna){
		// $hsl=$this->db->query("SELECT * FROM tb_titik_koordinat WHERE id_pengguna='$id_pengguna'");
		// if($hsl->num_rows()>0){
		// 	foreach ($hsl->result() as $data) {
		// 		$hasil=array(
		// 			'id_pengguna' => $data->id_pengguna,
		// 			'bujur_x' => $data->bujur_x,
		// 			'lintang_x' => $data->lintang_x,
		// 			'bujur_y' => $data->bujur_y,
		// 			'lintang_y' => $data->lintang_y,
		// 			'bujur_z' => $data->bujur_z,
		// 			'lintang_z' => $data->lintang_z
		// 			);
		// 	}
		// } 
		// return $hasil;
		$query = "SELECT * FROM tb_titik_koordinat WHERE id_pengguna='$id_pengguna'";
		return $this->db->query($query);
	}	
	
//untuk menampilkan data 
  function tampilkan_data(){
	$query = "SELECT * FROM tb_pj4, tb_pengguna, tb_pengiriman WHERE tb_pengiriman.id_pengiriman = tb_pj4.id_pengiriman and tb_pj4.id_pengguna = tb_pengguna.id_pengguna AND tb_pj.status = 1";
		return $this->db->query($query);
   }
  function tampilkan_detail(){
  	$query =  "SELECT * FROM tb_pj4, tb_pengguna WHERE tb_pj4.id_pengguna = tb_pengguna.id_pengguna";
  	return $this->db->query($query);
  }

   function tampilkan_detail_id($id){
  	$query =  "SELECT * FROM tb_pj4, tb_pengguna WHERE tb_pj4.id_pengguna = tb_pengguna.id_pengguna AND tb_pj4.id_pengiriman_detail = '".$id."'";
  	return $this->db->query($query);
  }

    //fungsi tombol detail
	function detail ($id_pengiriman){
		$query = "SELECT * FROM tb_pj4, tb_pengguna, tb_pengiriman WHERE tb_pj4.id_pengguna = tb_pengguna.id_pengguna AND tb_pengiriman.id_pengiriman = tb_pj4.id_pengiriman AND tb_pj4.id_pengiriman = '".$id_pengiriman."'";	
			return $this->db->query($query);
	}
	
	function detail_jp ($jalur,$tgl_pengiriman){
		$query = "SELECT * FROM tb_jp, tb_pengguna where tb_jp.id_pengguna=tb_pengguna.id_pengguna and jalur = '".$jalur."' and tgl_pengiriman = '".$tgl_pengiriman."'";	
			return $this->db->query($query);
	}
	
//menghapus data bb masuk
	//function hapusbbmasuk($id_pengiriman,$id_pj){
		
		//$this->db->where('id_pj',$id_pj);
		//$this->db->delete('tb_pj');

		//$this->db->where('id_pengiriman',$id_pengiriman);
		//$this->db->delete('tb_pengiriman');
	//}

	function delete($id){
	    $this->db->where('id_pj',$id);
		$this->db->delete('tb_pj4');
	}

	function simpan_detail($data){
	   $this->db->insert('tb_pj4',$data);
	}

	function simpan($data){
	    $this->db->insert('tb_pengiriman',$data);	
	}

	function selesai($id_pengiriman){
	    $data = array('id_pengiriman' => $id_pengiriman,'status' => '1');
		$this->db->where('status','0');
		$this->db->update('tb_pj4',$data);
	}

	function edit($data,$id_pj){
		$this->db->where('id_pj',$id_pj);
		$this->db->update('tb_pj4',$data);
	}

	function update($jalur, $tgl_pengiriman){
		$query= "UPDATE tb_jp SET status ='1' WHERE
			jalur='".$jalur."' and tgl_pengiriman='".$tgl_pengiriman."'";
			return $this->db->query($query);
	}
	
	function post (){
    $this->load->helper('url');

    $slug = url_title($this->input->post('jalur'), 'dash', TRUE);

    $data = array(
		'id_pengiriman' => $this->input->post('id_pengiriman'),
		'jalur' => $this->input->post('jalur'),
		'tgl_pengiriman' => $this->input->post('tgl_pengiriman'),
		'pic' => $this->input->post('pic'),
		'driver' => $this->input->post('driver'),
		'no_polisi' => $this->input->post('no_polisi'),
		'jam_berangkat' => $this->input->post('jam_berangkat'),
		'jam_datang' => $this->input->post('jam_datang'),
		'status' => $this->input->post('status')
    );

    return $this->db->insert('tb_pengiriman', $data);
}

}