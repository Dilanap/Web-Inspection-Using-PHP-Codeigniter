<?php
/**
* 
*/
class M_jp extends CI_Model
{
	
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
	
	

	function lihat_data(){
		$query="select *from tb_pengguna, tb_jp where tb_pengguna.id_pengguna=tb_jp.id_pengguna and status=0";
		return $this->db->query($query);
	}

	function post (){
    $this->load->helper('url');

    $slug = url_title($this->input->post('jalur'), 'dash', TRUE);

    $data = array(
        'id_jp' => $this->input->post('id_jp'),
		'jalur' => $this->input->post('jalur'),
		'pic' => $this->input->post('pic'),
		'driver' => $this->input->post('driver'),
		'no_polisi' => $this->input->post('no_polisi'),
		'jam_berangkat' => $this->input->post('jam_berangkat'),
		'jam_datang' => $this->input->post('jam_datang'),
		'info' => $this->input->post('info')
    );

    return $this->db->insert('tb_jp', $data);
}
	function edit($data, $id_jp){
		$this->db->where('id_jp',$id_jp);
		$this->db->update('tb_jp',$data);
	}
	function get_one($id){
		$param	= array('id_jp'=>$id);
		return $this->db->get_where('tb_jp',$param); 
	}
	function delete($id){
		$this->db->where('id_jp',$id);
		$this->db->delete('tb_jp');
	}
	
}