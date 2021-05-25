<?php

class Jadwal2 extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_jadwal2');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['record'] = $this->M_jadwal2->lihat_data();
        $this->template->content->view('Jadwal2/lihat_data',$data);
        $this->template->publish();
	}

	public function post(){

		if (isset($_POST['submit'])) {

			$Id_jadwal	=	$this->input->post('Id_jadwal');
			$type_unit		=	$this->input->post('type_unit');
			$sequence			=	$this->input->post('sequence');
			$no_chasis			=	$this->input->post('no_chasis');
			$warna		 	= 	$this->input->post('warna');
			$data 				=	array( 'Id_jadwal'=>$Id_jadwal,
											'type_unit'=>$type_unit,
										'sequence'=>$sequence,
										'no_chasis'=>$no_chasis,
										'warna'=>$warna);
			
			$this->M_jadwal2->post($data);
		
			redirect('Jadwal2');
		}
		else {
			$this->template->content->view('Jadwal2/form_input');

			$this->template->publish();
		}
	}

	public function hapus($id)
	{
		$id = $this->uri->segment(3);
		$this->M_jadwal2->hapus($id);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Data Berhasil Di Hapus <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
				</button>
				</div>');
		redirect('jadwal2');
	}

	public function ubah()
	{
		$id = $this->uri->segment(3);
		$data['record'] = $this->M_jadwal2->get_data($id)->row_array();
		$this->template->content->view('Jadwal2/form_edit',$data);
		$this->template->publish();
	}

	public function edit()
	{
		$Id_jadwal		= $this->input->post('Id_jadwal');
		$type_unit		= $this->input->post('type_unit');
		$sequence				= $this->input->post('sequence');
		$no_chasis			= $this->input->post('no_chasis');
        $warna			= $this->input->post('warna');
		$data = array('Id_jadwal' => $Id_jadwal,'type_unit' => $type_unit, 'sequence' => $sequence, 'no_chasis' => $no_chasis, 'warna' => $warna);

		$simpan = $this->M_jadwal2->update($data, $Id_jadwal);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Data Berhasil Di Ubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
				</button>
				</div>');
		redirect('jadwal2');
	}
}