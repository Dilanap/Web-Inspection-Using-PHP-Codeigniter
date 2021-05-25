<?php
/**
* 
*/
class M_rincian extends CI_Model
{
	function kode(){
        $q = $this->db->query("select MAX(RIGHT(Id_rincian,3)) as code_max from tbl_rincian");
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
		return $this->db->get('tbl_rincian');
	}
	function post ($data){
		
		$this->db->insert('tbl_rincian',$data);
	}
	function edit($data, $Id_rincian){

		$this->db->where('Id_rincian',$Id_rincian);
		$this->db->update('tbl_rincian',$data);
	}
	function get_one($id){
		$param	= array('Id_rincian'=>$id);
		return $this->db->get_where('tbl_rincian',$param); 
	}
	function delete($id){
		$this->db->where('Id_rincian',$id);
		$this->db->delete('tbl_rincian');
	}
	
	function detail ($Id_check){
		  $query = "SELECT * FROM tbl_detailcs, part where tbl_detailcs.Id_part = part.Id_part and tbl_detailcs.remark = 'NG'
					AND tbl_detailcs.Id_check = '".$Id_check."'";	
				return $this->db->query($query);
	}
	
	function detail2(){
		$query = "SELECT * FROM tbl_rincian";	
				return $this->db->query($query);
	}
	
	function simpan_rincian($data){
	   $this->db->insert('tbl_rincian',$data);
	}
	
	function update_status($Id_detailcs){
		$data 		= array('status' => '2');
			$this->db->where('Id_detailcs',$Id_detailcs);
			$this->db->update('tbl_detailcs',$data);
}
}