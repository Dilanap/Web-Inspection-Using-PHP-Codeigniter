<?php

class Cpar extends CI_Controller
{
	
	function __construct(){
 	parent::__construct();
 	$this->load->model(array('M_rincian','M_cpar','M_cs'));
} 

	public function index()
	{

		$data['record'] = $this->M_cpar->tampilkan_data();
		//$data['kode_bb'] = $this->M_cpar->get_data();
		$this->template->content->view('cpar/lihat_data' , $data);
		$this->template->publish();
	}

	public function datacpar()
	{

		$data['record'] = $this->M_cpar->tampilkan_data();
		$this->template->content->view('cpar/lihat_cpar1' , $data);
		$this->template->publish();
	}
	
	
	public function tambah()
	{
		$data['record']=$this->M_rincian->lihat_data();
		$this->template->content->view('Cpar/lihat_data',$data);
		$this->template->publish();
		
	}
	
		public function tambah_cpar()
	{
		$Id_check 	=$this->uri->segment(3);
		$data['kode'] = $this->M_rincian->kode();
		$data['record']=$this->M_rincian->detail($Id_check)->result();
		$data['record2'] =	$this->M_rincian->detail($Id_check)->row_array();
		$data['record3'] =	$this->M_rincian->detail2();
		$this->template->content->view('Cpar/form_input',$data);
		$this->template->publish();
		
	}
	
	function submit_cpar(){
			if (isset($_POST['submit'])) {
			$Id_rincian					=	$this->input->post('Id_rincian');
			$Id_reason					=	$this->input->post('Id_reason');
			$Id_detailcs				=	$this->input->post('Id_detailcs');
			$rincian_kerusakan			=	$this->input->post('rincian_kerusakan');
			$penyebab					=	$this->input->post('penyebab');
			$tgl_masalah				= 	$this->input->post('tgl_masalah');
			$status						=	'Belum dibuat A3';
			$data 						= array('Id_rincian' => $Id_rincian, 
												'Id_reason' => $Id_reason,  
											'Id_detailcs' => $Id_detailcs,
											'rincian_kerusakan' => $rincian_kerusakan,
											'penyebab' => $penyebab,
											'tgl_masalah' => $tgl_masalah,
											'status' => $status);
			$this->M_rincian->simpan_rincian($data);
			$this->M_rincian->update_status($Id_detailcs);
			redirect('Cpar/datacpar');
			}
	}
	
	public function detail($id)
	{
		$data['cpar'] = $this->M_rincian->tampilkan_data();
		$data['judul'] = 'Detail Data cpar';
		$data['cpar'] = $this->M_cpar->detail($id);
		$this->template->load('template', 'cpar/detail_data', $data);
	}

	public function simpan()
	{
		$id 				= $this->input->post('Id_rincian');
		$rincian_kerusakan			= $this->input->post('rincian_kerusakan');
		$penyebab			= $this->input->post('penyebab');
		$tgl_masalah			= $this->input->post('tgl_masalah');
		$tindakan		= $this->input->post('tindakan');
		$tgl_selesai			= $this->input->post('tgl_selesai');
		$validasi			= $this->input->post('validasi');
		$tgl_verifikasi			= $this->input->post('tgl_verifikasi');
	

		$data = array('Id_rincian' => $id, 'rincian_kerusakan' => $rincian_kerusakan, 'penyebab' => $penyebab, 'tgl_masalah' => $tgl_masalah, 'tindakan' => $tindakan, 'tgl_selesai' => $tgl_selesai, 'validasi' => $validasi, 'tgl_verifikasi	' => $tgl_verifikasi);

		$simpan = $this->M_rincian->simpan($data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Data Berhasil Di tambahkan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
				</button>
				</div>');
		redirect('cpar');
	}

	public function hapus($id)
	{
		$id = $this->uri->segment(3);
		$this->M_cpar->hapus($id);
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Data Berhasil Di Hapus <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
				</button>
				</div>');
		redirect('cpar');
	}

	public function ubah()
	{
		$id = $this->uri->segment(3);
		$data['record'] = $this->M_cpar->get_data($id)->row_array();
		$this->template->load('template', 'cpar/form_edit', $data);
	}

	public function validasi()
	{
		$id = $this->uri->segment(3);
		$data['record'] = $this->M_cpar->get_data($id)->row_array();
		$this->template->load('template', 'cpar/form_validasi', $data);
	}
	//tambahan
	function validasi_cpar(){
		$data['record'] = $this->M_cpar->tampilkan_validasi();
		$data['kode']		= $this->M_cs->kode();
		$this->template->content->view('Validasi/lihat_data',$data);
		$this->template->publish();
	}
	function detail1(){
		$id_pp 	=$this->uri->segment(3);
		$data['record']  =	$this->M_cpar->detail($Id_check)->result();
		$data['record2'] =	$this->M_cpar->detail($Id_check)->row_array();
		$this->template->content->view('Cpar/Detail_cpar',$data);
		$this->template->publish();
	}

	function detail_cpar(){
		$Id_detailcs 	=$this->uri->segment(3);
		//$Id_check 	=$this->uri->segment(4);
		$data['record']  =	$this->M_cpar->detailcpar($Id_detailcs)->result();
		$data['record2'] =	$this->M_cpar->detailcpar($Id_detailcs)->row_array();
		$this->template->content->view('Cpar/Detail_cpar',$data);
		$this->template->publish();
	}
	public function edit()

	{
		$id 				= $this->input->post('id_cs');
		$kode_bb			= $this->input->post('kode_bb');
		$no_sj				= $this->input->post('no_sj');
		$status 			= $this->input->post('status');
		$apperance			= $this->input->post('apperance');
		$width				= $this->input->post('width');
		$pitch_hole			= $this->input->post('pitch_hole');
		$length				= $this->input->post('length');
		$distance			= $this->input->post('distance');
		$hole_dia			= $this->input->post('hole_dia');
		$thread_m12			= $this->input->post('thread_m12');
		$chamfer			= $this->input->post('chamfer');
		$tgl_pemeriksaan	= $this->input->post('tgl_pemeriksaan');
		$ok					= $this->input->post('ok');
		$ng					= $this->input->post('ng');
		$jumlah				= $this->input->post('jumlah');

		$data = array('id_cs' => $id, 'kode_bb' => $kode_bb, 'no_sj' => $no_sj, 'status' => $status, 'apperance' => $apperance, 'width' => $width, 'pitch_hole' => $pitch_hole, 'length' => $length, 'distance' => $distance, 'hole_dia' => $hole_dia, 'thread_m12' => $thread_m12, 'chamfer' => $chamfer, 'tgl_pemeriksaan' => $tgl_pemeriksaan, 'ok' => $ok, 'ng' => $ng, 'jumlah' => $jumlah);


		$simpan = $this->M_cpar->update($data, $id);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Data Berhasil Di Ubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
				</button>
				</div>');
		redirect('cpar');

	}
}