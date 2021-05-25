<?php
/**
* 
*/
class M_ip extends CI_Model
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
        return "IP-".$code;
    }

	function lihat_data(){
			$query="select * from tb_pengiriman";
			return $this->db->query($query);
	}
	
	function detail_jp ($jalur,$tgl_pengiriman){
		$query = "SELECT * FROM tb_jp, tb_pengguna where tb_jp.id_pengguna=tb_pengguna.id_pengguna and jalur = '".$jalur."' and tgl_pengiriman = '".$tgl_pengiriman."'";	
			return $this->db->query($query);
	}
	
	
	function detail_tgl ($tgl_pengiriman){
		$query = "SELECT * FROM tb_jp, tb_pengguna where tb_jp.id_pengguna=tb_pengguna.id_pengguna and tgl_pengiriman = '".$tgl_pengiriman."'";	
			return $this->db->query($query);
	}

	function delete_jalur($jalur, $tgl_pengiriman){
		$query ="delete from tb_jp where jalur ='".$jalur."' and tgl_pengiriman = '".$tgl_pengiriman."'";
		return $this->db->query($query);
	}

	function jalur()
	{
		return $this->db->get('tb_jp');
	}
	
	function tgl_kirim()
	{
		return $this->db->get('tb_po_detail');
	}
	
	//mencetak informasi pengiriman
	function cetak_ip(){
		$query="SELECT * FROM tb_pengiriman";
			return $this->db->query($query);
			
	}
	
	function cetak_jp (){
		$query = "SELECT * FROM tb_jp, tb_pengguna where tb_jp.id_pengguna=tb_pengguna.id_pengguna";	
			return $this->db->query($query);
	}
	
	
	function post (){
    $this->load->helper('url');

    $slug = url_title($this->input->post('tgl_kirim'), 'dash', TRUE);

    $data = array(
        'id_pengiriman' => $this->input->post('id_pengiriman'),
		'id_jp' => $this->input->post('id_jp'),
		'pic' => $this->input->post('pic'),
		'driver' => $this->input->post('driver'),
		'no_polisi' => $this->input->post('no_polisi'),
		'jam_berangkat' => $this->input->post('jam_berangkat'),
		'status' => $this->input->post('status'));

    return $this->db->insert('tb_pengiriman', $data);
}
	function edit($data, $id_pengiriman){

		$this->db->where('id_pengiriman',$id_pengiriman);
		$this->db->update('tb_pengiriman',$data);
	}
	function get_one($id){
		$param	= array('id_pengiriman'=>$id);
		return $this->db->get_where('tb_pengiriman',$param); 
	}
	function delete($jalur, $tgl_pengiriman){
		$query ="delete from tb_pengiriman where jalur ='".$jalur."' and tgl_pengiriman = '".$tgl_pengiriman."'";
		return $this->db->query($query);
	}
	}