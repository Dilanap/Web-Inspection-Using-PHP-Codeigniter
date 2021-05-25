<?php
/**
* 
*/
class M_jadwal1 extends CI_Model 
{

	function lihat_data(){
		return $this->db->get('jadwal');
	}

	function post ($data){
		
		$this->db->insert('jadwal',$data);
	}
	function edit($data, $Id_jadwal){

		$this->db->where('Id_jadwal',$Id_jadwal);
		$this->db->update('jadwal',$data);
	}
	function get_one($Id){
		$param	= array('Id_jadwal'=>$Id);
		return $this->db->get_where('jadwal',$param); 
	}
	function delete($Id){
		$this->db->where('Id_jadwal',$Id);
		$this->db->delete('jadwal');
	}
}