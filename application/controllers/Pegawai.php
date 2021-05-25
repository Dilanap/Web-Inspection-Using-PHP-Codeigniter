<?php
/**
* 
*/
class Pengguna extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('M_pegawai');
	}
	
	function index(){
		$data['record']=$this->M_pengguna->lihat_data();
		$this->template->content->view('Pengguna/lihat_data',$data);
		$this->template->publish();
	}

function post(){

		if (isset($_POST['submit'])) {
			
			$nama_peg		=	$this->input->post('nama_peg');
			$JK		        =	$this->input->post('Jk');
			$alamat		        =	$this->input->post('alamat');
			$no_telp	        =	$this->input->post('no_telp');
			$jabatan			= 	$this->input->post('jabatan');
			$username			=	$this->input->post('username');
			$password		 	= 	$this->input->post('password');
			$data 				=	array('nama_lengkap'=>$nama_peg,
										'JK'=>$JK,
										'alamat'=>$alamat,
										'no_telp'=>$no_telp,
										'jabatan'=>$jabatan,
										'username'=>$username,
										'password'=>$password);
							
			
			$this->M_pegawai->post($data);
		
			redirect('Pengguna');
		}
		else {
			$this->template->content->view('Pengguna/form_input');

			$this->template->publish();
		}
	}

function edit (){
		if (isset($_POST['submit'])) {

			$Id_peg			=	$this->input->post('Id_peg');
			$nama_peg		=	$this->input->post('nama_peg');
			$JK 			=	$this->input->post('JK');
			$alamat  		=	$this->input->post('alamat');
			$no_telp  		=	$this->input->post('no_telp');
			$jabatan		= 	$this->input->post('jabatan');
			$username		=	$this->input->post('username');
			$password		= 	$this->input->post('password');
			$data 			=	array('Id_peg'=>$Id_peg,
										'nama_peg'=>$nama_peg,
										'JK'=>$JK,
										'alamat'=>$alamat,
										'no_telp'=>$no_telp,
										'username'=>$username,
										'password'=>$password,
										'jabatan'=>$jabatan);
			
			$this->M_pegawai->edit($data,$Id_peg);
			redirect('Pegawai');
		}
		else {
			$id=	$this->uri->segment(3);
			$this->load->model('M_pegawai');
			$data['Pegawai']=	$this->M_pegawai->lihat_data()->result();
			$data['record']=	$this->M_pegawai->get_one($id)->row_array();
			$this->template->content->view('Pengguna/Form_edit',$data);
			$this->template->publish();
		}
	}
function delete (){
			$id=	$this->uri->segment(3);
			$this->M_pengguna->delete($id);
			redirect('Pegawai');
	}
}