<?php
/**
* 
*/
class Permintaan extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->load->model(array('M_permintaan','M_barang'));
	}
	function index(){
			if (isset($_POST['submit'])) {
			$part_name		=	$this->input->post('part_name');
			$qty_box		=	$this->input->post('qty_box');
			$box			=	$this->input->post('box');
			$qty_delivered	= 	$this->input->post('qty_delivered');
			$data 			= array('part_name' => $part_name,  
									'qty_box' => $qty_box, 
									'qty_delivered' => $qty_delivered);
			$this->M_permintaan->simpan_permintaan_detail($data);
			redirect('permintaan');
			}
		else{
			$data['kode'] 			= $this->M_permintaan->kode();	
			$data['bahanbaku'] 		= $this->M_barang->lihat_data()->result();
			$data['detail'] 		= $this->M_permintaan->tampilkan_permintaan();
			//menampilkan form input
			$this->template->content->view('Permintaan/Form_input',$data);
			$this->template->publish();	
     }
    }
	function Tampil_permintaan(){
		$data['record']			= $this->M_permintaan->Tampil_permintaan();
		$data['bahanbaku']		= $this->M_barang->lihat_data()->result();
		//$this->load->view('kategori/lihat_data', $data);
		$this->template->content->view('permintaan/Tampil_permintaan',$data);
		$this->template->publish();	
	}
	function lihat_data(){
		$data['record']		= $this->M_permintaan->Tampil_permintaan();
		$data['kode']		= $this->M_permintaan->kode();
		//$this->load->view('kategori/lihat_data', $data);
		$this->template->content->view('permintaan/lihat_data',$data);
		$this->template->publish();
	}

	function selesai(){
		// $data=array('id_permintaan'=>$hasilkode,'tanggal'=>$tanggal);
		$hasilkode = $this->M_permintaan->kode();
		$this->M_permintaan->simpan_permintaan($hasilkode);
		$this->M_permintaan->selesai($hasilkode);
		redirect('permintaan/lihat_data');
	
}

	function hapusitem(){
		  $id = $this->uri->segment(3);
		  $this->M_permintaan->hapusitem($id);
		  redirect('permintaan');
	}
	//menampilkan tabel detail dgn klik tombol detail
	
	function tampil_detail1(){

		$id_permintaan 	=$this->uri->segment(3);
		$data['record']  =	$this->M_permintaan->detail($id_permintaan)->result();
		$data['record2'] =	$this->M_permintaan->detail($id_permintaan)->row_array();
		$this->template->content->view('permintaan/detail',$data);
		$this->template->publish();

	}
	//untuk mengubah status proses
	function status(){
		$id_permintaan_detail 	=$this->uri->segment(3);
		$this->M_permintaan->status($id_permintaan_detail);
		redirect('Permintaan/Tampil_permintaan');
	}
	//mengubah data permintaan
	function edit(){
		$id 				= $this->uri->segment(3);
		$data['record'] 	= $this->M_permintaan->tampilkan_detail_id($id)->row_array();
		$data['bahanbaku'] 	= $this->M_barang->lihat_data()->result();
		$this->template->content->view('Permintaan/Form_edit',$data);
		$this->template->publish();
	}

	function update(){
		$id_permintaan_detail	= $this->input->post('id_permintaan_detail');
		$part_name 					= $this->input->post('part_name');
		$qty_box 				= $this->input->post('qty_box');
		$qty_delivered				= $this->input->post('qty_delivered');
		$data 					= array('qty_box' => $qty_box, 
										'qty_delivered' => $qty_delivered,
										'part_name' => $part_name);
		$this->M_permintaan->update($data,$id_permintaan_detail);
		redirect('permintaan/lihat_data');

	}
	//menghapus data ditabel permintaan
	function hapuspermintaan(){
	  $id = $this->uri->segment(3);
	  $this->M_permintaan->hapuspermintaan($id);
	  redirect('permintaan/lihat_data');
	}

}