<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_login extends CI_Model {
//    untuk mengcek jumlah username dan password yang sesuai
    function login($username,$password) {
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->where('password', $password);
        $query =  $this->db->get('tb_pelanggan');
        return $query->num_rows();
    }
//    untuk mengambil data hasil login
    function data_login($id_pelanggan,$password) {
        $this->db->where('id_pelanggan', $id_pelanggan);
        $this->db->where('password', $password);
        return $this->db->get('tb_pelanggan')->row();
    }
}
/* End of file Auth_model.php */
/* Location: ./application/models/Auth_model.php */