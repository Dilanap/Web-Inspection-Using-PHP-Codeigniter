<?php
//define('BASEPATH') or EXIT ('No Direct script access allowed');
class Login_user extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('M_pelanggan');
	}
	
	
	function index()
	{
		//$this->load->view('login_view');
		// Fungsi Login
		$valid = $this->form_validation;
		$id_pelanggan = $this->input->post('id_pelanggan');
		$password = $this->input->post('password');
		$valid->set_rules('id_pelanggan','id_pelanggan','required');
		$valid->set_rules('password','Password','required');
		if($valid->run()) {
		$this->simple_login->login_user($id_pelanggan,$password, base_url('index.php/dasbor'), base_url('login'));
		}
		// End fungsi login
		$data = array ('title'=>'Halaman Login Pelanggan');
		$this->load->view('login_view', $data);
	}
//logout
public function logout() {
$this->simple_login->logout(); 
}

	}
	

?>