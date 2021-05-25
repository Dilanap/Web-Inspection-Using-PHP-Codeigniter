<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Dmodel extends CI_Model{

public function columname($table){

return $this->db->field_data($table);

}

function kode(){
        $q = $this->db->query("select MAX(RIGHT(id_jp,3)) as code_max from tb_jp");
        $code = "";
        if($q->num_rows()>0){
            foreach($q->result() as $cd){
                $tmp = ((int)$cd->code_max)+1;
                $code = sprintf("%03s", $tmp);
            }
        }else{
            $code = "001";
        }
        return "JP-".$code;
    }
	
	
	//SIMPAN JALUR
	function simpan_jalur($hasilkode2){
    		$datainsert = array('id_jp' => $hasilkode2,
								'jalur'=>$this->input->post('jalur'));
 			$this->db->insert('tb_jp',$datainsert);
	}
	
	function selesai(){
			$query = "truncate tb_pj4";
			return $this->db->query($query);
	}
	
// get data from model

function getdata(){

$hasil = $this->db->query("select * from tb_pj4, tb_pengguna where tb_pengguna.id_pengguna=tb_pj4.id_pengguna;");
return $hasil;

}

function edit($data,$id_tk){
		$this->db->where('id_tk',$id_tk);
		$this->db->update('tb_pj2',$data);
	}

function centroid($rand){

return $this->db->query("select * from tb_pj4, tb_pengguna where tb_pengguna.id_pengguna=tb_pj4.id_pengguna ORDER BY RAND() LIMIT $rand;");


}

public function columncount($table){

return $this->db->query("SELECT column_name FROM information_schema.columns WHERE table_name='$table';");

}

}