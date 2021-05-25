<?php
/**
* 
*/
class Pelanggan extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('M_pelanggan');
	}
	
	function index(){
		$data['record']=$this->M_pelanggan->lihat_data();
		
		
		$this->template->content->view('Pelanggan/lihat_data',$data);
		$this->template->publish();
	}

function post(){
    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['title'] = 'Create a new member';
	

    $this->form_validation->set_message('is_unique', '{field} sudah terpakai');
	$this->form_validation->set_rules('id_pengguna', 'ID Perusahaan', ['required', 'is_unique[tb_pengguna.id_pengguna]']);
    $this->form_validation->set_rules('nama_lengkap', 'Nama Perusahaan', 'required');
	$this->form_validation->set_rules('alamat', 'Alamat', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');
	$this->form_validation->set_rules('telp', 'Telepon', 'required');
	$this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
	 

    if ($this->form_validation->run() === FALSE)
    {
        $this->session->set_flashdata ('message', '<div class="alert alert-danger">
		 <h4>Opsss</H4>
		 <p><Font color="black">Anda belum berhasil Mendaftar </font></p>
		 </div>');
		 redirect();

    }
    else
    {
        $this->M_pelanggan->index();
         $this->session->set_flashdata ('message', '<div class="alert alert-success">
		 <h4>BERHASIL MENDAFTAR</H4>
		 <p><Font color="black"> Anda berhasil Mendaftar </font></p>
		 </div>');
		 redirect();
    }
}
function aksi_login(){
		$this->load->model('M_login');
        $login = $this->M_login->login($this->input->post('id_pelanggan'), ($this->input->post('password')));
        if ($login == 1) {
//          ambil detail data
            $row = $this->M_login->data_login($this->input->post('id_pelanggan'), ($this->input->post('password')));
//          daftarkan session
            $data = array(
                'logged' => TRUE,
                'id_pelanggan' => $row->id_pelanggan
            );
            $this->session->set_userdata($data);
//            redirect ke halaman sukses
            redirect(site_url('user'));
        } else {
//            tampilkan pesan error
            $error = 'id_pengguna / password salah';
            $this->index($error);
        }
}

function edit (){
		if (isset($_POST['submit'])) {

			$id_pengguna	=	$this->input->post('id_pengguna');
			$nama_lengkap=	$this->input->post('nama_lengkap');
			$alamat			=	$this->input->post('alamat');
			$email			=	$this->input->post('email');
			$telp		 	= 	$this->input->post('telp');
			$password			= 	$this->input->post('password');
			$data 				=	array('id_pengguna'=>$id_pengguna,
										'nama_lengkap'=>$nama_lengkap,
										'alamat'=>$alamat,
										'email'=>$email,
										'telp'=>$telp,
										'password'=>$password);
			
			$this->M_pelanggan->edit($data,$id_pengguna);
			redirect('pelanggan');
		}
		else {
			$id=	$this->uri->segment(3);
			$this->load->model('M_pelanggan');
			$data['pelanggan']=	$this->M_pelanggan->lihat_data()->result();
			$data['record']=	$this->M_pelanggan->get_one($id)->row_array();
			$this->template->content->view('pelanggan/Form_edit',$data);
			$this->template->publish();
		}
	}
function delete (){
			$id=	$this->uri->segment(3);
			$this->M_pelanggan->delete($id);
			redirect('Pelanggan');
	}
	
function lihat_data_pelanggan(){
		$data['record'] = $this->M_pelanggan->lihat_data();
		$this->template->content->view('Pelanggan/lihat_data',$data);
		$this->template->publish();
}	
}