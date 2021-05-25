<?php
/**
* 
*/
class M_reason extends CI_Model
{
	function kode(){
        $q = $this->db->query("select MAX(RIGHT(Id_reason,3)) as code_max from tbl_reason");
        $code = "";
        if($q->num_rows()>0){
            foreach($q->result() as $cd){
                $tmp = ((int)$cd->code_max)+1;
                $code = sprintf("%03s", $tmp);
            }
        }else{
            $code = "001";
        }
        return "R-".$code;
    }
	function lihat_data()
	{
		return $this->db->get('tbl_reason');
	}
	function post ($data){
		
		$this->db->insert('tbl_reason',$data);
	}
	function edit($data, $Id_reason){

		$this->db->where('Id_reason',$Id_reason);
		$this->db->update('tbl_reason',$data);
	}
	function get_one($id){
		$param	= array('Id_reason'=>$id);
		return $this->db->get_where('tbl_reason',$param); 
	}
	function delete($id){
		$this->db->where('Id_reason',$id);
		$this->db->delete('tbl_reason');
	}
	function cetak_alasan(){
			return $this->db->get('tbl_reason');
	}
}