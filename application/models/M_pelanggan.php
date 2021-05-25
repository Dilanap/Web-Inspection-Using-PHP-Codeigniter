<?php
/**
* 
*/
class M_pelanggan extends CI_Model
{
	
	function index(){
    $this->load->helper('url');

    $slug = url_title($this->input->post('nama_lengkap'), 'dash', TRUE);

    $data = array(
        'id_pengguna' => $this->input->post('id_pengguna'),
		'nama_lengkap' => $this->input->post('nama_lengkap'),
		'alamat' => $this->input->post('alamat'),
		'email' => $this->input->post('email'),
		'telp' => $this->input->post('telp'),
		'username' => $this->input->post('username'),
		'password' => $this->input->post('password'),
		'jabatan' => $this->input->post('jabatan'),
    );

    return $this->db->insert('tb_pengguna', $data);
}
	
	function kode(){
        $q = $this->db->query("select MAX(RIGHT(id_pengguna,3)) as code_max from tb_pengguna");
        $code = "";
        if($q->num_rows()>0){
            foreach($q->result() as $cd){
                $tmp = ((int)$cd->code_max)+1;
                $code = sprintf("%03s", $tmp);
            }
        }else{
            $code = "001";
        }
        return "CS-".$code;
	}
/*	function login($username,$password)
	{
		$chek =	$this->db->get_where('tb_pelanggan',array('username'=>$username,'password'=>$password));
		
		// untuk check data username dan password ada atau tidak
		if ($chek->num_rows()>0) 
		{
			return 1;
		}
		else {
			return 0;
		}
	}*/

	function lihat_data(){
		//return $this->db->get('tb_pengguna');
		
		$query = "select * from tb_pengguna where id_pengguna like 'CS%'";
		return $this->db->query($query);
	}

	

//membuat dropdown untuk nama perusahaan
	function dd_pelanggan()
	{
		return $this->db->get('tb_pengguna');
	}
	
	function edit($data, $id_pengguna){

		$this->db->where('id_pengguna',$id_pengguna);
		$this->db->update('tb_pengguna',$data);
	}
	function get_one($id){
		$param	= array('id_pengguna'=>$id);
		return $this->db->get_where('tb_pengguna',$param); 
	}
	function delete($id){
		$this->db->where('id_pengguna',$id);
		$this->db->delete('tb_pengguna');
	}
}
