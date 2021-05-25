<?php 

class Dl extends CI_Controller{

	function __construct(){
 	parent::__construct();
 	$this->load->model(array('M_barang','M_po','M_do','M_pl'));
} 

function index()
	{
		$data['record'] = $this->M_do->tampilkan_data_do();
		$this->template->content->view('Do/Lihat_data',$data);
		$this->template->publish();
	}
	
	function data_do_masuk()
	{
		$data['record'] = $this->M_do->tampilkan_data_do();
		$this->template->content->view('Pl/Lihat_data_do_masuk',$data);
		$this->template->publish();
	}

function data_do_pl()
	{
		$data['record'] = $this->M_do->tampilkan_data_do_pl();
		$this->template->content->view('Do/Lihat_data',$data);
		$this->template->publish();
	}	
	

	function lihat_data(){

		$data['record'] = $this->M_do->tampilkan_data();
		$this->template->content->view('Do/Lihat_data',$data);
		$this->template->publish();
	}
	
	//untuk menampilkan data permintaan pembelian di purchasing
	function Tampil_pp(){

		$data['record'] = $this->M_do->tampilkan_data();
		$this->template->content->view('Do/Tampil_pp',$data);
		$this->template->publish();
	}
	
	function tampil_detail1(){

		$id_po 	=$this->uri->segment(3);
		$data['record']  =	$this->M_do->detail($id_po)->result();
		$data['record2'] =	$this->M_do->detail($id_po)->row_array();
		$data['record3'] =	$this->M_do->detail2($id_po)->row_array();
		$data['kode'] = $this->M_do->kode();
		$this->template->content->view('Do/form_input',$data);
		$this->template->publish();


	}
	
	function tampil_detail2(){

		$id_do 	=$this->uri->segment(3);
		$data['record']  =	$this->M_pl->detail($id_do)->result();
		$data['record2'] =	$this->M_pl->detail($id_do)->row_array();
		$data['record3'] =	$this->M_pl->detail2($id_do)->row_array();
	
		$data['kode'] = $this->M_pl->kode();
		$this->template->content->view('Pl/detail',$data);
		$this->template->publish();


	}


	
	function selesai(){
		
		$id_do = $this->M_do->kode();
		$id_po = $this->input->post('id_po');		
		$tgl_pembuatan = date('Y-m-d');
		$data = array('id_do' => $id_do, 'id_po' => $id_po,'tgl_pembuatan' => $tgl_pembuatan,'status'=>'PL Belum dibuat');
		$this->M_do->simpan_do($data);
		$this->M_do->ubah_status_po($id_do);
		redirect('Po/Tampil_po_receipt');

	}

	function form_input(){
		$data['kode'] = $this->M_do->kode();	
		$data['detail'] = $this->M_do->tampilkan_detail();
		$data['bahanbaku'] = $this->M_barang->lihat_data()->result();
		//$this->load->view('kategori/lihat_data', $data);
		$this->template->content->view('Do/form_input',$data);
		$this->template->publish();	
	}

	function hapusitem(){
		$id = $this->uri->segment(3);
		$this->M_do->delete($id);
		redirect('Do/form_input');
	}

	//menghapus data do
	//function hapus(){
		//$id = $this->uri->segment(3);
		//$this->M_do->delete($id);
		//redirect('Do/Lihat_data');
	//}

	function tampil_detail(){
		$id_pp 	=$this->uri->segment(3);
		$data['record']  =	$this->M_do->detail($id_pp)->result();
		$data['record2'] =	$this->M_do->detail($id_pp)->row_array();
		$this->template->content->view('Do/Detail',$data);
		$this->template->publish();

	}
	function detail(){
		$id_pp 	=$this->uri->segment(3);
		$data['record']  =	$this->M_do->detail($id_pp)->result();
		$data['record2'] =	$this->M_do->detail($id_pp)->row_array();
		$this->template->content->view('Do/Detail_pp',$data);
		$this->template->publish();
	}

	function edit(){
		$data['bahanbaku'] = $this->M_barang->lihat_data()->result();
		$id_pp_detail = $this->uri->segment(3);
		$data['record'] =	$this->M_do->get_data($id_pp_detail)->row_array();
		$this->template->content->view('Do/Form_edit',$data);
		$this->template->publish();
	}

	function update(){
		$id_pp_detail 		= $this->input->post('id_pp_detail');
		$id_bb 				= $this->input->post('id_bb');
		$jumlah 			= $this->input->post('jumlah');
		$request_schedule 	= $this->input->post('request_schedule');
		$keterangan 		= $this->input->post('keterangan');
		$data 				= array('id_bb' => $id_bb , 
									'jumlah' => $jumlah, 
									'keterangan' => $keterangan, 
									'request_schedule' => $request_schedule);
		$this->M_do->update($data,$id_pp_detail);
		redirect('Do/lihat_data');
	}

}
