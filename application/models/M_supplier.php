<?php
/**
* 
*/
class M_supplier extends CI_Model
{
	function kode(){
        $q = $this->db->query("select MAX(RIGHT(id_supplier,3)) as code_max from tb_supplier");
        $code = "";
        if($q->num_rows()>0){
            foreach($q->result() as $cd){
                $tmp = ((int)$cd->code_max)+1;
                $code = sprintf("%03s", $tmp);
            }
        }else{
            $code = "001";
        }
        return "SP-".$code;
    }
	function lihat_data()
	{
		return $this->db->get('tb_supplier');
	}
	function post ($data){
		
		$this->db->insert('tb_supplier',$data);
	}
	function edit($data, $id_supplier){

		$this->db->where('id_supplier',$id_supplier);
		$this->db->update('tb_supplier',$data);
	}
	function get_one($id){
		$param	= array('id_supplier'=>$id);
		return $this->db->get_where('tb_supplier',$param); 
	}
	function delete($id){
		$this->db->where('id_supplier',$id);
		$this->db->delete('tb_supplier');
	}
}