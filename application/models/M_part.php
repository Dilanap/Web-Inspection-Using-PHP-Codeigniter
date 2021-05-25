<?php
/**
* 
*/
class M_part extends CI_Model
{
	function kode(){
        $q = $this->db->query("select MAX(RIGHT(Id_part,3)) as code_max from part");
        $code = "";
        if($q->num_rows()>0){
            foreach($q->result() as $cd){
                $tmp = ((int)$cd->code_max)+1;
                $code = sprintf("%03s", $tmp);
            }
        }else{
            $code = "001";
        }
        return "P-".$code;
    }
	function lihat_data()
	{
		return $this->db->get('part');
	}
	function post ($data){
		
		$this->db->insert('part',$data);
	}
	function edit($data, $Id_part){

		$this->db->where('Id_part',$Id_part);
		$this->db->update('part',$data);
	}
	function get_one($id){
		$param	= array('Id_part'=>$id);
		return $this->db->get_where('part',$param); 
	}
	function delete($id){
		$this->db->where('Id_part',$id);
		$this->db->delete('part');
	}
	function cetak_barang(){
			return $this->db->get('part');
	}
}