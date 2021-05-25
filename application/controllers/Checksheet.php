 <?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Checksheet extends CI_Controller {

      function __construct(){

            parent::__construct();

            $this->load->model(array('M_cpar','M_cs','M_A3'));
      }  
	  function cpar(){
		$data['record'] = $this->M_cpar->cpar();
		$data['kode']		= $this->M_cs->kode();
		$this->template->content->view('Validasi/lihat_data1',$data);
		$this->template->publish();
	}

	function cpar1(){
		$data['record'] = $this->M_cpar->cpar();
		$data['kode']		= $this->M_cs->kode();
		
		$this->template->content->view('Validasi/lihat_cpar',$data);
		$this->template->publish();
	}
	  
	function cpar2(){
		$data['record'] = $this->M_cpar->cpar1();
		$data['kode']		= $this->M_cs->kode();
		$this->template->content->view('Validasi/lihat_cpar',$data);
		$this->template->publish();
	}
	
	function a3(){
		$Id_rincian 	= $this->uri->segment(3);
		$data['record2']=$this->M_A3->PR_2($Id_rincian)->row_array();
		$data['record'] = $this->M_A3->PR($Id_rincian);
		$data['kode']		= $this->M_A3->kode();
		
		$this->template->content->view('PR/form_input',$data);
		$this->template->publish();
	}
	  
	  public function validasi($Id_rincian, $Id_detailcs)
	{
		//$Id_detailcs 	=$this->uri->segment(3);
		$this->M_cpar->update_tgl($Id_rincian);
		$this->M_cpar->update_status($Id_detailcs);
		redirect('Cpar/validasi_cpar');
	}
	
	function edit2(){
		$data['Checksheet'] = $this->M_cpar->lihat_data()->result();
		$Id_rincian = $this->uri->segment(3);
		$data['record'] =	$this->M_cpar->get_data($Id_rincian)->row_array();
		$this->template->content->view('Validasi/Form_edit',$data);
		$this->template->publish();
	}
	
	function update(){
		$Id_rincian 	= $this->input->post('Id_rincian');
		$rincian_kerusakan		= $this->input->post('rincian_kerusakan');
		$penyebab			= $this->input->post('penyebab');
		$tgl_masalah			= $this->input->post('tgl_masalah');
		$tindakan		 	= 	$this->input->post('tindakan');
		$tgl_selesai	 	= 	$this->input->post('tgl_selesai');
		$tgl_verifikasi	 	= 	$this->input->post('tgl_verifikasi');
		$data 				=	array('Id_rincian'=>$Id_rincian,
									'rincian_kerusakan'=>$rincian_kerusakan,
									'penyebab'=>$penyebab,
									'tgl_masalah'=>$tgl_masalah,
									'tindakan'=>$tindakan,
									'tgl_selesai'=>$tgl_selesai,
									'tgl_verifikasi'=>$tgl_verifikasi);
		
		$this->M_cpar->edit($data,$Id_rincian);
		redirect('Checksheet/cpar1');
	}
	
function edit (){
	if (isset($_POST['submit'])) {

		$Id_rincian		=	$this->input->post('Id_rincian');
		$rincian_kerusakan		=	$this->input->post('rincian_kerusakan');
		$penyebab			=	$this->input->post('penyebab');
		$tgl_masalah			=	$this->input->post('tgl_masalah');
		$tindakan		 	= 	$this->input->post('tindakan');
		$tgl_selesai	 	= 	$this->input->post('tgl_selesai');
		$validasi	 	= 	$this->input->post('validasi');
		$data 				=	array('Id_rincian'=>$Id_rincian,
									'rincian_kerusakan'=>$rincian_kerusakan,
									'penyebab'=>$penyebab,
									'tgl_masalah'=>$tgl_masalah,
									'tindakan'=>$tindakan,
									'tgl_selesai'=>$tgl_selesai,
									'validasi'=>$validasi);
		
		$this->M_cpar->edit($data,$Id_rincian);
		redirect('Validasi/lihat_cpar');
	}
	else {
		$Id=	$this->uri->segment(3);
		//$this->load->model('M_cpar');
		$data['Checksheet']=	$this->M_cpar->edit()->result();
		$data['record']=	$this->M_cpar->get_one($Id)->row_array();
		$this->template->content->view('Validasi/form_edit',$data);
		$this->template->publish();
	}

}}