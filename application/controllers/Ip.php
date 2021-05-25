<?php
/**
* 
*/
class Ip extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model('M_ip');
	}
	function index()
	{
		$data['record']=	$this->M_ip->lihat_data();
		$data['jalur_p'] 	= $this->M_ip->jalur()->result();
		$data['tgl_kirim'] 	= $this->M_ip->tgl_kirim()->result();
		$data['kode'] = $this->M_ip->kode();
		$this->template->content->view('Ip/lihat_data',$data);
		$this->template->publish();
	}
	function post(){
		if (isset($_POST['submit'])) {
			$id_pengiriman		=	$this->input->post('id_pengiriman');
			$id_jp		=	$this->input->post('id_jp');
			$pic	=	$this->input->post('pic');
			$driver			=	$this->input->post('driver');
			$no_polisi			= 	$this->input->post('no_polisi');
			$jam_berangkat		= 	$this->input->post('jam_berangkat');
			$jam_datang		= 	$this->input->post('jam_datang');
			$status		= 	$this->input->post('status');
			
			$data 			=	array('id_pengiriman'=>$id_pengiriman,
										'id_jp'=>$id_jp,
										'pic'=>$pic,
										'driver'=>$driver,
										'no_polisi'=>$no_polisi,
										'jam_berangkat'=>$jam_berangkat,
										'jam_datang'=>$jam_datang,
										'status'=>$status);
			$this->M_ip->post($data);
			redirect('ip');
		}
		else {
			$this->template->content->view('ip/form_input');
			$this->template->publish();
		}
	}
	
	
	function edit (){
		if (isset($_POST['submit'])) {

			$id_pengiriman			=	$this->input->post('id_pengiriman');
			$jalur	=	$this->input->post('jalur');
			$tgl_pengiriman	=	$this->input->post('tgl_pengiriman');
			$pic	=	$this->input->post('pic');
			$driver			=	$this->input->post('driver');
			$no_polisi		= 	$this->input->post('no_polisi');
			$jam_berangkat		= 	$this->input->post('jam_berangkat');
			$jam_datang		= 	$this->input->post('jam_datang');
			$status		= 	$this->input->post('status');
			$data 			=	array('id_pengiriman'=>$id_pengiriman,
										'jalur'=>$jalur,
										'tgl_pengiriman'=>$tgl_pengiriman,
										'pic'=>$pic,
										'driver'=>$driver,
										'no_polisi'=>$no_polisi,
										'jam_berangkat'=>$jam_berangkat,
										'jam_datang'=>$jam_datang,
										'status'=>$status);
			
			$this->M_ip->edit($data,$id_pengiriman);
			redirect('ip');
		}
		else {
			$id=	$this->uri->segment(3);
			$this->load->model('M_ip');
			$data['ip']=	$this->M_ip->lihat_data()->result();
			$data['jalur_p'] 	= $this->M_ip->jalur()->result();
			$data['record']=	$this->M_ip->get_one($id)->row_array();
			$this->template->content->view('Ip/form_edit',$data);
			$this->template->publish();
		}
	}
	
	//menampilkan detail di tombol detail
		function detail_jalur(){

		$jalur 	=$this->uri->segment(3);
		$tanggal 	=$this->uri->segment(4);
		$data['record']  =	$this->M_ip->detail_jp($jalur, $tanggal)->result();
		$data['record2'] =	$this->M_ip->detail_jp($jalur, $tanggal)->row_array();
		$this->template->content->view('Ip/Detail_jalur',$data);
		$this->template->publish();

	}
	//menampilkan detail di tombol tgl
		function detail_tgl(){

		$jalur 	=$this->uri->segment(3);
		$data['record']  =	$this->M_ip->detail_tgl($tanggal)->result();
		$data['record2'] =	$this->M_ip->detail_tgl($tanggal)->row_array();
		$this->template->content->view('Ip/Detail_tgl',$data);
		$this->template->publish();

	}
	
	function delete (){
			$jalur=	$this->uri->segment(3);
			$tgl_pengiriman=	$this->uri->segment(4);
			$this->M_ip->delete($jalur, $tgl_pengiriman);
			$this->M_ip->delete_jalur($jalur, $tgl_pengiriman);
			redirect('ip');
}
	function cetak_ip()
	{
		$data['record']=	$this->M_ip->cetak_ip();
		$data['record2']=	$this->M_ip->cetak_ip()->row_array();
		$data['kode'] = $this->M_ip->kode();
		$this->load->view('ip/cetak_ip',$data);
		//$this->template->publish();
	}
	
	
}