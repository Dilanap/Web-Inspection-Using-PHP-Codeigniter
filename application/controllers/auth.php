<?php
/**
* isset() digunakan untuk menyatakan variabel sudah diset atau tidak. 
*Jika variabel sudah diset makan variabel akan mengembalikan nilai true, 
*sebaliknya akan bernilai false (memesan tempat di memori) 
*
*/
class Auth extends CI_Controller
{

	function __construct(){
		parent::__construct();
		$this->load->model('Model_operator');
	}
	
	function login()
	{

		//jika button di klik (yg ada di view)
		if(isset($_POST['submit'])){
			//proses login disini
			$username	=	$this->input->post('username');
			$password	=	$this->input->post('password');
			$hasil =	$this->Model_operator->login($username,$password);
			$jabatan=$this->db->get_where('pegawai',array('username'=>$username))->row();
			

			
			if($hasil==1)
			{
				//session_start();
				//$_SESSION['id_pengguna'] = $row['id_pengguna'];
				//$this->db->query('select * from tb_pengguna');
				//$this->db->query('select * from tb_pengguna where jabatan="Pelanggan"');
				echo "SUKSES LOGIN";
				$this->session->set_userdata(array('status_login'=>'oke','Id_peg'=>$jabatan->Id_peg,'username'=>$username,'jabatan'=>$jabatan->jabatan));
				$this->session->set_flashdata('message','<div class="alert alert-success"><h3>Login Berhasil</h3>
				<p><font color="black">Selamat Anda Berhasil Login</font></p></div>');
				redirect('Dashboard');
				
				//untuk menampilkan data sesuai dengan user yang login
				
			}
			else{
				$this->session->set_flashdata('message','<div class="alert alert-danger"><h3>Login Gagal</h3>
				<p><font color="black">Username atau password yang anda input salah</font></p></div>');
				redirect();
			}
		}
		else{
			$this->load->view('tampilan_depan');

			}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect();
	}
}