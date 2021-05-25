<?php if(! defined('BASEPATH')) exit('Akses langsung tidak diperbolehkan');
class Simple_login {
 // SET SUPER GLOBAL
 var $CI = NULL;
 public function __construct() {
 $this->CI =& get_instance();
 }
 // Fungsi login
 public function login_user($id_pelanggan, $password) {
 $query = $this->CI->db->get_where('tb_pelanggan',array('id_pelanggan'=>$id_pelanggan,'password' => $password));
 if($query->num_rows() == 1) {
 $row = $this->CI->db->query('SELECT id_pelanggan FROM tb_pelanggan where id_pelanggan = "'.$id_pelanggan.'"');
 $admin = $row->row();
 $id = $admin->id_pelanggan;
 $this->CI->session->set_userdata('id_pelanggan', $id_pelanggan);
 //$this->CI->session->set_userdata('id_pelanggan', uniqid(rand()));
 $this->CI->session->set_userdata('id', $id);
 redirect(base_url('index.php/dasbor'));
 }else{
 $this->CI->session->set_flashdata('sukses','Oops... Username/password salah');
 redirect(base_url('index.php/login_user'));
 }
 return false;
 }
 // Proteksi halaman
 public function cek_login() {
 if($this->CI->session->userdata('id_pelanggan') == '') {
 $this->CI->session->set_flashdata('sukses','Anda belum login');
 redirect(base_url('index.php/login_user'));
 }
 }
 // Fungsi logout
 public function logout() {
 $this->CI->session->unset_userdata('id_pelanggan');
 $this->CI->session->unset_userdata('id_pelanggan');
 $this->CI->session->unset_userdata('id');
 $this->CI->session->set_flashdata('sukses','Anda berhasil logout');
 redirect(base_url('index.php/login_user'));
 }
}