<?php
/**
* 
*/
class Jp extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('M_jp');
	}
	function index()
	{
		$data['record']=	$this->M_jp->lihat_data();
		$data['kode'] = $this->M_jp->kode();
		$this->template->content->view('Jp/lihat_data',$data);
		$this->template->publish();
	}
	function post(){
		if (isset($_POST['submit'])) {
			$id_jp			=	$this->input->post('id_jp');
			$jalur			=	$this->input->post('jalur');
			$pic			=	$this->input->post('pic');
			$driver			= 	$this->input->post('driver');
			$no_polisi		= 	$this->input->post('no_polisi');
			$jam_berangkat	= 	$this->input->post('jam_berangkat');
			$jam_datang		= 	$this->input->post('jam_datang');
			$status			= 	$this->input->post('status');
			
			
			$data 			=	array('id_jp'=>$id_jp,
										'jalur'=>$jalur,
										'pic'=>$pic,
										'driver'=>$driver,
										'no_polisi'=>$no_polisi,
									'jam_berangkat'=>$jam_berangkat,
									'jam_datang'=>$jam_datang,
									'status'=>$status);
			$this->M_jp->post($data);
			redirect('jp');
		}
		else {
			$this->template->content->view('jp/form_input');
			$this->template->publish();
		}
	}
	function edit (){
		if (isset($_POST['submit'])) {

			$id_jp			=	$this->input->post('id_jp');
			$jalur			=	$this->input->post('jalur');
			$pic			=	$this->input->post('pic');
			$driver			= 	$this->input->post('driver');
			$no_polisi		= 	$this->input->post('no_polisi');
			$jam_berangkat	= 	$this->input->post('jam_berangkat');
			$jam_datang		= 	$this->input->post('jam_datang');
			$info			= 	$this->input->post('info');			
			$data 			=	array('id_jp'=>$id_jp,
										'jalur'=>$jalur,
										'pic'=>$pic,
										'driver'=>$driver,
										'no_polisi'=>$no_polisi,
									'jam_berangkat'=>$jam_berangkat,
									'jam_datang'=>$jam_datang,
									'info'=>$info);
			
			$this->M_jp->edit($data,$id_jp);
			redirect('jp');
		}
		else {
			$id=	$this->uri->segment(3);
			$this->load->model('M_jp');
			$data['jp']=	$this->M_jp->lihat_data()->result();
			$data['record']=	$this->M_jp->get_one($id)->row_array();
			$this->template->content->view('jp/form_edit',$data);
			$this->template->publish();
		}
	}
	function delete (){
			$id=	$this->uri->segment(3);
			$this->M_jp->delete($id);
			redirect('jp');
}
	function cetak_jp()
	{
		$data['record']=	$this->M_jp->cetak_jp();
		$data['kode'] = $this->M_jp->kode();
		$this->load->view('jp/cetak_jp',$data);
		//$this->template->publish();
	}
	
	
}