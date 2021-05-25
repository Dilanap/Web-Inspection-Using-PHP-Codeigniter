<?php
/**
* 
*/
class M_customer extends CI_Model
{
	function kode(){
        $q = $this->db->query("select MAX(RIGHT(id_customer,3)) as code_max from tb_customer");
        $code = "";
        if($q->num_rows()>0){
            foreach($q->result() as $cd){
                $tmp = ((int)$cd->code_max)+1;
                $code = sprintf("%03s", $tmp);
            }
        }else{
            $code = "001";
        }
        return "CST-".$code;
    }
	function lihat_data()
	{
		return $this->db->get('tb_customer');
	}
	function post ($data){
		
		$this->db->insert('tb_customer',$data);
	}
	function edit($data, $id_customer){

		$this->db->where('id_customer',$id_customer);
		$this->db->update('tb_customer',$data);
	}
	function get_one($id){
		$param	= array('id_customer'=>$id);
		return $this->db->get_where('tb_customer',$param); 
	}
	function delete($id){
		$this->db->where('id_customer',$id);
		$this->db->delete('tb_customer');
	}
}