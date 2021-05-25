<?php
/**
* 
*/
class Pengguna extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('M_pengguna');
	}
	
	function index(){
		$data['record']=$this->M_pengguna->lihat_data();
		$this->template->content->view('Pengguna/lihat_data',$data);
		$this->template->publish();
	}

function post(){

		if (isset($_POST['submit'])) {
			
			$nama_lengkap		=	$this->input->post('nama_lengkap');
			$no_telp			=	$this->input->post('no_telp');
			$username			=	$this->input->post('username');
			$password		 	= 	$this->input->post('password');
			$jabatan			= 	$this->input->post('jabatan');
			$data 				=	array('nama_lengkap'=>$nama_lengkap,
										'no_telp'=>$no_telp,
										'username'=>$username,
										'password'=>$password,
										'jabatan'=>$jabatan);
			
			$this->M_pengguna->post($data);
		
			redirect('Pengguna');
		}
		else {
			$this->template->content->view('Pengguna/form_input');

			$this->template->publish();
		}
	}

function edit (){
		if (isset($_POST['submit'])) {

			$id_pengguna		=	$this->input->post('id_pengguna');
			$nama_lengkap		=	$this->input->post('nama_lengkap');
			$no_telp			=	$this->input->post('no_telp');
			$username			=	$this->input->post('username');
			$password		 	= 	$this->input->post('password');
			$jabatan			= 	$this->input->post('jabatan');
			$data 				=	array('id_pengguna'=>$id_pengguna,
										'nama_lengkap'=>$nama_lengkap,
										'no_telp'=>$no_telp,
										'username'=>$username,
										'password'=>$password,
										'jabatan'=>$jabatan);
			
			$this->M_pengguna->edit($data,$id_pengguna);
			redirect('Pengguna');
		}
		else {
			$id=	$this->uri->segment(3);
			$this->load->model('M_pengguna');
			$data['Pengguna']=	$this->M_pengguna->lihat_data()->result();
			$data['record']=	$this->M_pengguna->get_one($id)->row_array();
			$this->template->content->view('Pengguna/Form_edit',$data);
			$this->template->publish();
		}
	}
function delete (){
			$id=	$this->uri->segment(3);
			$this->M_pengguna->delete($id);
			redirect('Pengguna');
	}
}