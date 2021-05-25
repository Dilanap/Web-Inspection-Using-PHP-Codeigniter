<?php
/**
* 
*/
class M_pegawai extends CI_Model
{

	function lihat_data(){
		$query = "select * from pegawai where id_peg like 'CS%'";
		return $this->db->query($query);
	}

	function post ($data){ 
		
		$this->db->insert('pegawai',$data);
	}
	function edit($data, $Id_peg){

		$this->db->where('Id_peg',$Id_peg);
		$this->db->update('pegawai',$data);
	}
	function get_one($id){
		$param	= array('Id_peg'=>$id);
		return $this->db->get_where('pegawai',$param); 
	}
	function delete($id){
		$this->db->where('Id_peg',$id);
		$this->db->delete('pegawai');
	}
}